@extends('admin.main')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
<style>
    @media (min-width: 992px) {
        .mdk-drawer-layout .container {
            max-width: 1600px;
        }
    }

    /* Table Header Styling */
    table.dataTable thead th {
        background: #1c3866 !important;
        color: white !important;
        text-align: center !important;
        /*padding: 12px 8px !important;*/
        padding: 10px 5px 2px 11px !important;
        border: none !important;
        white-space: nowrap !important;
        position: relative !important;
    }

    /* First three columns (Student Name, Email, Phone) */
    table.dataTable thead th:nth-child(1),
    table.dataTable thead th:nth-child(2),
    table.dataTable thead th:nth-child(3) {
        text-align: left !important;
        min-width: 150px !important;
        padding-right: 30px !important;
    }

    /* Module columns */
    table.dataTable thead th:nth-child(n+4):not(:last-child) {
        min-width: 120px !important;
        padding-right: 30px !important;
    }

    /* Action column */
    table.dataTable thead th:last-child {
        min-width: 100px !important;
    }

    /* Table Body Styling */
    table.dataTable tbody td {
        padding: 12px 8px !important;
        border: none !important;
        vertical-align: middle !important;
    }

    /* First three columns (Student Name, Email, Phone) */
    table.dataTable tbody td:nth-child(1),
    table.dataTable tbody td:nth-child(2),
    table.dataTable tbody td:nth-child(3) {
        text-align: left !important;
    }

    /* Module columns */
    table.dataTable tbody td:nth-child(n+4):not(:last-child) {
        text-align: center !important;
    }

    /* Action column */
    table.dataTable tbody td:last-child {
        text-align: center !important;
    }

    /* DataTables Info and Pagination */
    div#moduleTable_info {
        background: #f8f9fa !important;
        color: #333 !important;
        width: 100%;
        padding: 10px;
    }

    div#moduleTable_paginate {
        position: relative;
        bottom: 47px;
    }

    a#moduleTable_previous,
    a#moduleTable_next {
        color: #333 !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        color: #333 !important;
    }

    /* Badge Styling */
    .badge {
        padding: 8px 12px;
        font-size: 12px;
        display: inline-block;
        min-width: 100px;
    }

    .badge-success {
        background-color: #28a745;
    }

    .badge-secondary {
        background-color: #6c757d;
    }

    .progress-cell {
        min-width: 150px;
    }

    .progress-clickable {
        cursor: pointer;
    }

    .progress-clickable:hover .progress-percent {
        color: #152a4d;
    }

    .progress-percent {
        font-size: 12px;
        font-weight: 600;
        color: #1c3866;
        margin-bottom: 6px;
    }

    .progress-track {
        width: 100%;
        height: 8px;
        background: #e9ecef;
        border-radius: 999px;
        overflow: hidden;
    }

    .progress-fill {
        height: 100%;
        background: #1c3866;
        border-radius: 999px;
    }

    .progress-meta {
        display: block;
        font-size: 11px;
        margin-top: 6px;
        color: #6c757d;
    }

    .details-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
        margin-bottom: 16px;
    }

    .details-card {
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 12px;
        background: #fafbfc;
    }

    .details-card strong {
        display: block;
        color: #1c3866;
        margin-bottom: 4px;
    }

    #progressDetailsModal .modal-content {
        background: #ffffff;
        color: #1f2937;
        border: 0;
        border-radius: 12px;
        overflow: hidden;
    }

    #progressDetailsModal .modal-header {
        border-bottom: 0;
    }

    #progressDetailsModal .modal-title,
    #progressDetailsModal .modal-header strong,
    #progressDetailsModal .modal-header span {
        color: #ffffff !important;
    }

    #progressDetailsModal .close {
        color: #ffffff !important;
        opacity: 1;
        text-shadow: none;
    }

    #progressDetailsModal .modal-body {
        background: #f8fafc;
        color: #1f2937;
        padding: 20px;
    }

    #progressDetailsModal .modal-body strong,
    #progressDetailsModal .modal-body h6,
    #progressDetailsModal .modal-body span,
    #progressDetailsModal .modal-body div,
    #progressDetailsModal .modal-body p {
        color: inherit;
    }

    .session-history {
        max-height: 280px;
        overflow-y: auto;
        background: #f8fafc;
    }

    .session-item {
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 12px;
        margin-bottom: 10px;
        background: #ffffff;
        color: #1f2937;
        box-shadow: 0 1px 2px rgba(15, 23, 42, 0.06);
    }

    .session-item strong,
    .session-item div,
    .session-item span {
        color: #1f2937 !important;
    }

    .timeline-item {
        border-left: 3px solid #1c3866;
        padding: 10px 12px;
        margin-bottom: 10px;
        background: #ffffff;
        border-radius: 0 8px 8px 0;
        color: #1f2937;
        box-shadow: 0 1px 2px rgba(15, 23, 42, 0.06);
    }

    .timeline-item strong {
        color: #1c3866;
        display: block;
        margin-bottom: 4px;
    }

    .timeline-item div,
    .timeline-item span {
        color: #1f2937 !important;
    }

    /* Button Styling */
    .btn-primary {
        background-color: #1c3866;
        border-color: #1c3866;
    }

    .btn-primary:hover {
        background-color: #152a4d;
        border-color: #152a4d;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    /* Table Container */
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    /* Ensure table takes full width */
    .datatable {
        width: 100% !important;
        margin-bottom: 1rem;
        border-collapse: collapse;
    }

    /* Remove DataTables default borders and blue colors */
    table.dataTable.no-footer {
        border-bottom: none !important;
    }

    .dataTables_wrapper .dataTables_scroll,
    .dataTables_wrapper .dataTables_scrollBody {
        border: none !important;
    }

    /* Search and Length Menu Styling */
    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #ddd !important;
        border-radius: 4px !important;
        padding: 6px 12px !important;
        margin-left: 8px !important;
        background: #fff !important;
        color: #333 !important;
    }

    .dataTables_wrapper .dataTables_length select {
        border: 1px solid #ddd !important;
        border-radius: 4px !important;
        padding: 6px 12px !important;
        margin: 0 8px !important;
        background: #fff !important;
        color: #333 !important;
    }

    /* Remove blue focus outline */
    .dataTables_wrapper .dataTables_filter input:focus,
    .dataTables_wrapper .dataTables_length select:focus {
        outline: none !important;
        border-color: #ddd !important;
        box-shadow: none !important;
    }

    /* Pagination button styling */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border: 1px solid #ddd !important;
        background: #fff !important;
        color: #333 !important;
        margin: 0 2px !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #f5f5f5 !important;
        border-color: #ddd !important;
        color: #333 !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #f5f5f5 !important;
        border-color: #ddd !important;
        color: #333 !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
        color: #999 !important;
        border-color: #ddd !important;
    }

    /* Search and Length Menu Labels */
    .dataTables_wrapper .dataTables_filter label,
    .dataTables_wrapper .dataTables_length label {
        color: #333 !important;
    }
    
    .modal-dialog {
  margin-left: auto;
  margin-right: auto;
}

</style>

<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Module Assignments</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin_dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Module Assignments</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class='container mt-5'>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id='moduleTable' class='datatable w-100'>
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Overall Progress</th>
                            @foreach($allModules as $module)
                                <th>Module {{ $module->lesson_number }}</th>
                            @endforeach
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($enrolledStudents as $student)
                            <tr>
                                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->phone_number }}</td>
                                <td class="progress-cell">
                                    <div class="progress-percent">{{ $studentOverallProgress[$student->id] ?? 0 }}%</div>
                                    <div class="progress-track">
                                        <div class="progress-fill" style="width: {{ $studentOverallProgress[$student->id] ?? 0 }}%;"></div>
                                    </div>
                                </td>
                                @foreach($allModules as $module)
                                    <td>
                                        @if(in_array($module->id, $moduleAssignments[$student->id] ?? []))
                                            @php
                                                $progress = $moduleProgress[$student->id][$module->id] ?? null;
                                                $percent = round((float) ($progress['percent'] ?? 0), 2);
                                            @endphp
                                            <div
                                                class="progress-cell progress-clickable view-progress-details"
                                                data-student-name="{{ $student->first_name }} {{ $student->last_name }}"
                                                data-module-name="Module {{ $module->lesson_number }}: {{ $module->lesson_name }}"
                                                data-progress='@json($progress ?? [])'
                                                data-sessions='@json($moduleSessionDetails[$student->id][$module->id] ?? [])'
                                                data-events='@json($moduleRecentEvents[$student->id][$module->id] ?? [])'
                                                data-toggle="modal"
                                                data-target="#progressDetailsModal">
                                                <div class="progress-percent">{{ $percent }}%</div>
                                                <div class="progress-track">
                                                    <div class="progress-fill" style="width: {{ $percent }}%;"></div>
                                                </div>
                                                <span class="progress-meta">
                                                    {{ !empty($progress['completed']) ? 'Completed' : 'Assigned' }}
                                                </span>
                                                <span class="progress-meta">Click progress for details</span>
                                            </div>
                                        @else
                                            <span class="badge">Not Assigned</span>
                                        @endif
                                    </td>
                                @endforeach
                                <td>
                                    <button class='btn btn-sm btn-primary assign-modules' 
                                            data-student-id="{{ $student->id }}"
                                            data-student-name="{{ $student->first_name }} {{ $student->last_name }}"
                                            data-toggle="modal" 
                                            data-target="#assignModuleModal">
                                        <i class='fa fa-edit'></i> Assign
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Assign Module Modal -->
<div class="modal fade" id="assignModuleModal" tabindex="-1" role="dialog" aria-labelledby="assignModuleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #1c3866; color: white;">
                <h5 class="modal-title" id="assignModuleModalLabel">Assign Modules</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="assignModuleForm">
                    <input type="hidden" id="studentId" name="student_id">
                    <div class="form-group">
                        <label>Student: <span id="studentName"></span></label>
                    </div>
                    <div class="form-group">
                        <label>Select Modules:</label>
                        <div class="row">
                            @foreach($allModules as $module)
                                <div class="col-md-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" 
                                               class="custom-control-input module-checkbox" 
                                               id="module{{ $module->id }}" 
                                               name="modules[]" 
                                               value="{{ $module->id }}">
                                        <label class="custom-control-label" for="module{{ $module->id }}">
                                            Module {{ $module->lesson_number }}: {{ $module->lesson_name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveAssignments">Save Assignments</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="progressDetailsModal" tabindex="-1" role="dialog" aria-labelledby="progressDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #1c3866; color: white;">
                <h5 class="modal-title" id="progressDetailsModalLabel">Module Watch Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <strong>Student:</strong> <span id="detailsStudentName">-</span><br>
                    <strong>Module:</strong> <span id="detailsModuleName">-</span>
                </div>
                <div class="details-grid" id="progressSummaryGrid"></div>
                <h6 class="mb-2">Recent Sessions</h6>
                <div class="session-history" id="sessionHistory"></div>
                <h6 class="mb-2 mt-3">Activity Timeline</h6>
                <div class="session-history" id="activityTimeline"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $(document).ready(function() {
        $('#moduleTable').DataTable({
            "pageLength": 50,
            "processing": true,
            "scrollX": true,
            "ordering": false,  // Disable sorting
            "language": {
                "search": "Search:",
                "lengthMenu": "Show _MENU_ entries per page",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "Showing 0 to 0 of 0 entries",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "zeroRecords": "No matching records found",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Next",
                    "previous": "Previous"
                }
            }
        });

        var moduleAssignments = {!! json_encode($moduleAssignments) !!};

        // Handle Assign Modules button click
        $(document).on('click', '.assign-modules', function() {
            var studentId = $(this).data('student-id');
            var studentName = $(this).data('student-name');

            if (!studentId) {
                alert('Student not found for module assignment.');
                return;
            }
            
            $('#studentId').val(studentId);
            $('#studentName').text(studentName);
            $('#assignModuleModal').attr('data-student-id', studentId);
            
            // Reset checkboxes
            $('.module-checkbox').prop('checked', false);
            
            // Check already assigned modules
            var assignedModules = moduleAssignments[studentId] || [];
            assignedModules.forEach(function(moduleId) {
                $('#module' + moduleId).prop('checked', true);
            });
        });

        // Handle Save Assignments
        $(document).on('click', '#saveAssignments', function() {
            var studentId = $('#assignModuleModal').attr('data-student-id') || $('#studentId').val();
            var selectedModules = [];

            if (!studentId) {
                alert('Student ID missing. Please close the popup and click Assign again.');
                return;
            }
            
            $('#assignModuleForm .module-checkbox:checked').each(function() {
                selectedModules.push($(this).val());
            });

            $.ajax({
                url: '{{ route("update-module-assignments") }}',
                method: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    student_id: studentId,
                    modules: selectedModules
                },
                success: function(response) {
                    if(response.status === 200) {
                        moduleAssignments[studentId] = selectedModules.map(function(moduleId) {
                            return Number(moduleId);
                        });
                        $('#assignModuleModal').modal('hide');
                        location.reload();
                    }
                },
                error: function(xhr) {
                    var message = xhr.responseJSON && xhr.responseJSON.message
                        ? xhr.responseJSON.message
                        : 'Error updating module assignments';
                    alert(message);
                }
            });
        });

        $('#assignModuleModal').on('hidden.bs.modal', function() {
            $('#studentId').val('');
            $('#studentName').text('');
            $(this).removeAttr('data-student-id');
            $('#assignModuleForm .module-checkbox').prop('checked', false);
        });

        function formatDateTime(value) {
            if (!value) {
                return 'N/A';
            }

            var date = new Date(value.replace(' ', 'T'));
            if (isNaN(date.getTime())) {
                return value;
            }

            return date.toLocaleString();
        }

        function formatSeconds(seconds) {
            seconds = Number(seconds || 0);
            var hrs = Math.floor(seconds / 3600);
            var mins = Math.floor((seconds % 3600) / 60);
            var secs = Math.floor(seconds % 60);

            return [hrs, mins, secs]
                .map(function(part) {
                    return String(part).padStart(2, '0');
                })
                .join(':');
        }

        function getEventLabel(event) {
            if (event.event_type === 'seeked') {
                return event.meta && event.meta.seek_direction === 'backward' ? 'Back Play / Rewind' : 'Forward Seek';
            }

            var labels = {
                play: 'Started Playing',
                pause: 'Paused',
                ended: 'Completed Video',
                pagehide: 'Screen Closed/Hidden'
            };

            return labels[event.event_type] || event.event_type;
        }

        $(document).on('click', '.view-progress-details', function() {
            var studentName = $(this).data('student-name');
            var moduleName = $(this).data('module-name');
            var progress = $(this).data('progress') || {};
            var sessions = $(this).data('sessions') || [];
            var events = $(this).data('events') || [];

            $('#detailsStudentName').text(studentName || '-');
            $('#detailsModuleName').text(moduleName || '-');

            var summaryItems = [
                ['First Started', formatDateTime(progress.first_started_at)],
                ['Last Started', formatDateTime(progress.last_started_at)],
                ['Last End/Pause', formatDateTime(progress.last_ended_at)],
                ['Completed At', formatDateTime(progress.completed_at)],
                ['Completion', (progress.percent || 0) + '%'],
                ['Total Watch Time', formatSeconds(progress.watch_seconds)],
                ['Unique Watch Time', formatSeconds(progress.unique_watch_seconds)],
                ['Video Duration', formatSeconds(progress.video_duration_seconds)],
                ['Last Position', formatSeconds(progress.last_position_seconds)],
                ['Max Position', formatSeconds(progress.max_position_seconds)],
                ['Play Count', progress.play_count || 0],
                ['Pause Count', progress.pause_count || 0],
                ['Screen Close Count', progress.pagehide_count || 0]
            ];

            var summaryHtml = '';
            summaryItems.forEach(function(item) {
                summaryHtml += '<div class="details-card"><strong>' + item[0] + '</strong><span>' + item[1] + '</span></div>';
            });
            $('#progressSummaryGrid').html(summaryHtml);

            var sessionsHtml = '';
            if (sessions.length) {
                sessions.forEach(function(session, index) {
                    sessionsHtml += ''
                        + '<div class="session-item">'
                        +   '<strong>Session ' + (index + 1) + '</strong>'
                        +   '<div>Start: ' + formatDateTime(session.started_at) + '</div>'
                        +   '<div>End: ' + formatDateTime(session.ended_at) + '</div>'
                        +   '<div>End Reason: ' + (session.end_reason || 'N/A') + '</div>'
                        +   '<div>Started Position: ' + formatSeconds(session.started_position_seconds) + '</div>'
                        +   '<div>Last Position: ' + formatSeconds(session.last_position_seconds) + '</div>'
                        +   '<div>Max Position: ' + formatSeconds(session.max_position_seconds) + '</div>'
                        +   '<div>Watch Time: ' + formatSeconds(session.watch_seconds) + '</div>'
                        +   '<div>Session Completion: ' + (session.completion_percent || 0) + '%</div>'
                        + '</div>';
                });
            } else {
                sessionsHtml = '<div class="session-item">No detailed session history available yet.</div>';
            }

            $('#sessionHistory').html(sessionsHtml);

            var eventHtml = '';
            if (events.length) {
                events.forEach(function(event) {
                    var movementText = '';
                    if (event.event_type === 'seeked') {
                        movementText = 'From ' + formatSeconds(event.from_position_seconds) + ' to ' + formatSeconds(event.to_position_seconds);
                    } else if ((event.watch_delta_seconds || 0) > 0) {
                        movementText = 'Watched ' + formatSeconds(event.watch_delta_seconds);
                    } else {
                        movementText = 'Position ' + formatSeconds(event.to_position_seconds);
                    }

                    eventHtml += ''
                        + '<div class="timeline-item">'
                        +   '<strong>' + getEventLabel(event) + '</strong>'
                        +   '<div>When: ' + formatDateTime(event.event_at) + '</div>'
                        +   '<div>' + movementText + '</div>'
                        + '</div>';
                });
            } else {
                eventHtml = '<div class="session-item">No activity timeline available yet.</div>';
            }

            $('#activityTimeline').html(eventHtml);
        });
    });
</script>
@endsection
