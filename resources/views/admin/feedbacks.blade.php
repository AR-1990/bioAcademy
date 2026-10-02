@extends('admin.main')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />

<style>
    thead {
        background: #1c3866;
        color: #fff;
    }

    table.dataTable thead th {
        text-align: left !important;
    }

    .feedback-chip {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
        background: #edf4ff;
        color: #1c3866;
    }

    .feedback-modal-label {
        font-size: 12px;
        font-weight: 700;
        color: #6b7280;
        text-transform: uppercase;
        margin-bottom: 4px;
    }

    .feedback-modal-value {
        color: #111827;
        word-break: break-word;
    }

    .feedback-modal-card {
        background: #f8fafc;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 14px;
        height: 100%;
    }

    .feedback-modal-content {
        border: 0;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 18px 50px rgba(15, 23, 42, 0.18);
    }

    .feedback-modal-header {
        background: #1c3866;
        color: #fff;
        padding: 18px 24px;
        border-bottom: 0;
        align-items: center;
    }

    .feedback-modal-header .modal-title {
        color: #fff;
        font-size: 20px;
        font-weight: 700;
    }

    .feedback-modal-header .close {
        color: #fff;
        opacity: 1;
        text-shadow: none;
        font-size: 24px;
    }

    .feedback-modal-body {
        background: #f3f6fb;
        padding: 24px;
    }

    .feedback-summary-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 14px;
        margin-bottom: 20px;
    }

    .feedback-summary-card {
        background: #fff;
        border: 1px solid #dbe3ee;
        border-radius: 14px;
        padding: 16px 18px;
    }

    .feedback-summary-title {
        font-size: 12px;
        text-transform: uppercase;
        color: #64748b;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .feedback-summary-value {
        font-size: 16px;
        font-weight: 700;
        color: #0f172a;
        line-height: 1.5;
    }

    .feedback-section-title {
        font-size: 15px;
        font-weight: 700;
        color: #1c3866;
        margin: 20px 0 12px;
    }

    .feedback-question-card {
        background: #fff;
        border: 1px solid #dbe3ee;
        border-radius: 14px;
        padding: 18px;
        margin-bottom: 14px;
    }

    .feedback-question-title {
        font-size: 15px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 10px;
        line-height: 1.6;
    }

    .feedback-answer-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 12px 14px;
        color: #334155;
        line-height: 1.7;
        font-size: 14px;
    }

    .feedback-answer-box .feedback-chip {
        margin-right: 6px;
        margin-bottom: 6px;
    }
</style>

<div class="pt-32pt">
    <div class="page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Dashboard</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin_dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Feedback</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="page__container page-section">
    <div class="table-responsive">
        <table id="feedbackTable" class="datatable w-100">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Enrolled</th>
                    <th>Program Clarity</th>
                    <th>Shadow Day</th>
                    <th>Contact Method</th>
                    <th>Contact Information</th>
                    <th>Team Contact</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feedbackResponses as $feedback)
                    <tr>
                        <td>{{ $feedback->id }}</td>
                        <td>{{ $feedback->respondent_name }}</td>
                        <td><span class="feedback-chip">{{ $feedback->enrolled }}</span></td>
                        <td>{{ $feedback->program_clarity }}</td>
                        <td>{{ $feedback->shadow_day }}</td>
                        <td>{{ $feedback->contact_method ?: 'N/A' }}</td>
                        <td>{{ $feedback->contact_information ?: 'N/A' }}</td>
                        <td>{{ $feedback->team_contact }}</td>
                        <td>{{ optional($feedback->created_at)->format('M/d/Y') }}</td>
                        <td>
                            <button type="button"
                                class="btn btn-sm btn-primary view-feedback"
                                data-toggle="modal"
                                data-target="#feedbackModal"
                                data-feedback-id="{{ $feedback->id }}">
                                View
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content feedback-modal-content">
            <div class="modal-header feedback-modal-header">
                <h5 class="modal-title">Feedback Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body feedback-modal-body">
                <div id="feedbackDetails"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    var feedbackMap = @json($feedbackMap);

    function escapeHtml(value) {
        return $('<div>').text(value ?? 'N/A').html();
    }

    function formatList(value) {
        if (Array.isArray(value) && value.length) {
            return value.map(function(item) {
                return '<span class="feedback-chip mr-1 mb-1">' + escapeHtml(item) + '</span>';
            }).join(' ');
        }

        return escapeHtml(value || 'N/A');
    }

    function detailCard(label, value, isList) {
        return '<div class="feedback-question-card">' +
            '<div class="feedback-question-title">' + escapeHtml(label) + '</div>' +
            '<div class="feedback-answer-box">' + (isList ? formatList(value) : escapeHtml(value || 'N/A')) + '</div>' +
            '</div>';
    }

    function formatSubmittedDate(value) {
        if (!value) {
            return 'N/A';
        }

        var date = new Date(value);
        if (isNaN(date.getTime())) {
            return escapeHtml(value);
        }

        var month = date.toLocaleString('en-US', { month: 'short' });
        var day = String(date.getDate()).padStart(2, '0');
        var year = date.getFullYear();

        return month + '-' + day + '-' + year;
    }

    function containsOther(value) {
        return Array.isArray(value) && value.indexOf('Other') !== -1;
    }

    $(document).ready(function () {
        $('#feedbackTable').DataTable({
            pageLength: 50,
            scrollX: true,
            order: [[0, 'desc']]
        });

        $(document).on('click', '.view-feedback', function () {
            var feedbackId = String($(this).data('feedback-id'));
            var feedback = feedbackMap[feedbackId] || {};
            var createdAt = formatSubmittedDate(feedback.created_at);
            var enrolledYes = feedback.enrolled === 'Yes';
            var enrolledNo = feedback.enrolled === 'No';
            var convincedOtherText = containsOther(feedback.convinced)
                ? (feedback.convinced_other || 'Other selected, but no details were provided.')
                : 'Not applicable';
            var notEnrolledReasonText = enrolledNo
                ? (feedback.not_enrolled_reason || 'No reason selected.')
                : 'Not applicable';
            var notEnrolledOtherText = enrolledNo && feedback.not_enrolled_reason === 'Other'
                ? (feedback.not_enrolled_other || 'Other selected, but no details were provided.')
                : 'Not applicable';
            var likelyOtherText = containsOther(feedback.likely_to_enroll)
                ? (feedback.likely_to_enroll_other || 'Other selected, but no details were provided.')
                : 'Not applicable';
            var contactMethodText = feedback.shadow_day === 'Yes'
                ? (feedback.contact_method || 'No contact method provided.')
                : 'Not applicable';
            var contactInformationText = feedback.shadow_day === 'Yes'
                ? (feedback.contact_information || 'No contact information provided.')
                : 'Not applicable';
            var html = '';

            html += '<div class="feedback-summary-grid">';
            html += '<div class="feedback-summary-card"><div class="feedback-summary-title">Name</div><div class="feedback-summary-value">' + escapeHtml(feedback.respondent_name || 'N/A') + '</div></div>';
            html += '<div class="feedback-summary-card"><div class="feedback-summary-title">Submitted At</div><div class="feedback-summary-value">' + escapeHtml(createdAt) + '</div></div>';
            html += '<div class="feedback-summary-card"><div class="feedback-summary-title">Enrolled</div><div class="feedback-summary-value">' + escapeHtml(feedback.enrolled || 'N/A') + '</div></div>';
            html += '<div class="feedback-summary-card"><div class="feedback-summary-title">Team Contact</div><div class="feedback-summary-value">' + escapeHtml(feedback.team_contact || 'N/A') + '</div></div>';
            html += '</div>';

            html += '<div class="feedback-section-title">Submitted Questionnaire</div>';
            html += detailCard('1. Did you decide to enroll in the program?', feedback.enrolled);
            html += detailCard('If yes, what convinced you about the program?', enrolledYes ? feedback.convinced : 'Not applicable', enrolledYes);
            html += detailCard('If yes, Other - Please specify', convincedOtherText);
            html += detailCard("2. If not, what is the main reason you haven't enrolled in the program?", notEnrolledReasonText);
            html += detailCard('If not, Other - Please specify', notEnrolledOtherText);
            html += detailCard('3. What would make you more likely to enroll?', feedback.likely_to_enroll, true);
            html += detailCard('Question 3 Other - Please specify', likelyOtherText);
            html += detailCard('4. How clear is your understanding of what the program offers?', feedback.program_clarity);
            html += detailCard('5. Would you be interested in spending a day with one of our clinical research coordinators to get a better understanding of the day-to-day work and hands-on experience in clinical research?', feedback.shadow_day);
            html += detailCard('If yes, what is the best way to contact you?', contactMethodText);
            html += detailCard('Contact Information', contactInformationText);
            html += detailCard('6. Would you like someone from our team to contact you with more information about the program?', feedback.team_contact);
            html += detailCard('Additional Comments or Feedback', feedback.comments);

            $('#feedbackDetails').html(html);
        });
    });
</script>
@endsection
