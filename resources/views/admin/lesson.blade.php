@extends('admin.main')
@section('content')

<div class="pt-5">
    <div class="container page__container">
        <div class="js-player embed-responsive embed-responsive-16by9 mb-32pt">
            <div class="player embed-responsive-item">
                <div class="player__content">
                    <div class="player__image" style="--player-image: url({{ asset('admin/images/illustration/player.svg') }})">
                    </div>

                    <a href="{{ route('show-lesson', ['lessonId' => $lesson->id]) }}" class="player__play">
                        <span class="material-icons">play_arrow</span>
                    </a>
                </div>
                <div class="player__embed d-none">
                    <video width="100%" height="auto" controls data-lesson-id="{{ $lesson->id }}">
                        <source src="{{ asset('videos/' . $lesson->url) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>

        <div class="d-flex flex-wrap align-items-end mb-16pt">
            <h1 class="flex m-0">{{ $lesson->lesson_name }}</h1>
        </div>

        <p class="hero__lead measure-hero-lead mb-24pt">
            {{ $lesson->description }}
        </p>
   
    </div>
</div>


@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const video = document.querySelector('video[data-lesson-id]');
        if (!video) {
            return;
        }

        const lessonId = video.dataset.lessonId;
        const trackUrl = '{{ route("lesson.played") }}';
        const csrfToken = '{{ csrf_token() }}';
        let sessionKey = null;
        let watchedRanges = [];
        let watchDelta = 0;
        let lastTrackedTime = null;
        let lastSentAt = 0;
        let seekFromTime = null;

        function createSessionKey() {
            return 'lesson_' + lessonId + '_' + Date.now() + '_' + Math.random().toString(36).slice(2, 10);
        }

        function getDuration() {
            return Number.isFinite(video.duration) ? Number(video.duration.toFixed(2)) : 0;
        }

        function mergeRanges(ranges) {
            if (!ranges.length) {
                return [];
            }

            const sorted = ranges
                .map(function (range) {
                    return [Math.max(0, Number(range[0]) || 0), Math.max(0, Number(range[1]) || 0)];
                })
                .filter(function (range) {
                    return range[1] > range[0];
                })
                .sort(function (a, b) {
                    return a[0] - b[0];
                });

            const merged = [sorted[0]];
            for (let i = 1; i < sorted.length; i++) {
                const current = sorted[i];
                const last = merged[merged.length - 1];

                if (current[0] <= last[1]) {
                    last[1] = Math.max(last[1], current[1]);
                } else {
                    merged.push(current);
                }
            }

            return merged.map(function (range) {
                return [Number(range[0].toFixed(2)), Number(range[1].toFixed(2))];
            });
        }

        function addRange(start, end) {
            if (end <= start) {
                return;
            }

            watchedRanges = mergeRanges(watchedRanges.concat([[start, end]]));
        }

        function captureProgress() {
            if (video.paused || video.seeking) {
                return;
            }

            const currentTime = Number(video.currentTime.toFixed(2));
            if (lastTrackedTime === null) {
                lastTrackedTime = currentTime;
                return;
            }

            const delta = currentTime - lastTrackedTime;
            if (delta > 0 && delta <= 5) {
                watchDelta += delta;
                addRange(lastTrackedTime, currentTime);
            }

            lastTrackedTime = currentTime;
        }

        function buildPayload(eventType, extra) {
            extra = extra || {};
            const formData = new FormData();
            formData.append('_token', csrfToken);
            formData.append('lesson_id', lessonId);
            formData.append('event_type', eventType);
            formData.append('session_key', sessionKey || '');
            formData.append('current_time', Number(video.currentTime.toFixed(2)));
            formData.append('duration', getDuration());
            formData.append('watch_delta', Number(watchDelta.toFixed(2)));
            formData.append('watched_ranges', JSON.stringify(watchedRanges));
            const fromTime = Number(Number(extra.fromTime || 0).toFixed(2));
            formData.append('from_time', fromTime);
            if (extra.seekDirection) {
                formData.append('seek_direction', extra.seekDirection);
            }
            return formData;
        }

        function sendTracking(eventType, useBeacon, extra) {
            if (!sessionKey) {
                return;
            }

            const payload = buildPayload(eventType, extra);
            if (useBeacon && navigator.sendBeacon) {
                navigator.sendBeacon(trackUrl, payload);
            } else {
                fetch(trackUrl, {
                    method: 'POST',
                    body: payload,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                }).catch(function (error) {
                    console.error('Lesson tracking failed:', error);
                });
            }

            watchDelta = 0;
            lastSentAt = Date.now();
        }

        function flushProgress(eventType, useBeacon, extra) {
            captureProgress();
            sendTracking(eventType, useBeacon, extra);

            if (['pause', 'ended', 'pagehide'].includes(eventType)) {
                sessionKey = null;
                lastTrackedTime = null;
            }
        }

        video.addEventListener('play', function () {
            if (!sessionKey) {
                sessionKey = createSessionKey();
            }

            lastTrackedTime = Number(video.currentTime.toFixed(2));
            sendTracking('play', false);
        });

        video.addEventListener('timeupdate', function () {
            captureProgress();

            if (sessionKey && Date.now() - lastSentAt >= 5000 && watchDelta > 0) {
                sendTracking('progress', false);
            }
        });

        video.addEventListener('pause', function () {
            if (video.ended) {
                return;
            }

            flushProgress('pause', false);
        });

        video.addEventListener('ended', function () {
            const duration = getDuration();
            if (duration > 0) {
                addRange(Math.max(0, duration - 1), duration);
            }

            flushProgress('ended', false);
        });

        video.addEventListener('seeking', function () {
            captureProgress();
            seekFromTime = lastTrackedTime !== null ? lastTrackedTime : Number(video.currentTime.toFixed(2));
            lastTrackedTime = null;
        });

        video.addEventListener('seeked', function () {
            const newTime = Number(video.currentTime.toFixed(2));
            if (sessionKey && seekFromTime !== null && Math.abs(newTime - seekFromTime) >= 1) {
                sendTracking('seeked', false, {
                    fromTime: seekFromTime,
                    seekDirection: newTime < seekFromTime ? 'backward' : 'forward'
                });
            }

            seekFromTime = null;
            lastTrackedTime = newTime;
        });

        window.addEventListener('pagehide', function () {
            if (sessionKey) {
                flushProgress('pagehide', true);
            }
        });

        document.addEventListener('visibilitychange', function () {
            if (document.visibilityState === 'hidden' && sessionKey) {
                flushProgress('pagehide', true);
            }
        });
    });
</script>
