<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Feedback Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f7;
            color: #1f2937;
            margin: 0;
            padding: 24px 12px;
        }

        .email-container {
            background: #ffffff;
            max-width: 820px;
            margin: auto;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 16px 44px rgba(15, 23, 42, 0.12);
        }

        .header {
            background: linear-gradient(135deg, #102f5c 0%, #1c3866 55%, #2b5b9a 100%);
            color: #ffffff;
            padding: 28px 32px;
        }

        .eyebrow {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.3px;
            text-transform: uppercase;
            opacity: 0.85;
            margin-bottom: 10px;
        }

        .header-title {
            font-size: 28px;
            font-weight: 700;
            line-height: 1.25;
            margin: 0 0 8px;
        }

        .header-subtitle {
            font-size: 14px;
            line-height: 1.7;
            opacity: 0.92;
            margin: 0;
        }

        .content {
            padding: 28px 32px 32px;
        }

        .section-title {
            font-size: 15px;
            font-weight: 700;
            color: #1c3866;
            margin: 0 0 14px;
        }

        .summary-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 10px;
            margin: 0 0 22px;
            table-layout: fixed;
        }

        .summary-card {
            background: #f8fafc;
            border: 1px solid #dbe3ee;
            border-radius: 14px;
            padding: 16px;
            vertical-align: top;
        }

        .summary-label {
            font-size: 11px;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 6px;
        }

        .summary-value {
            font-size: 16px;
            font-weight: 700;
            color: #0f172a;
            line-height: 1.5;
        }

        .question-card {
            background: #ffffff;
            border: 1px solid #dbe3ee;
            border-radius: 14px;
            padding: 18px;
            margin-bottom: 14px;
        }

        .question-title {
            font-size: 15px;
            font-weight: 700;
            color: #0f172a;
            line-height: 1.7;
            margin-bottom: 10px;
        }

        .answer-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 12px 14px;
            color: #334155;
            font-size: 14px;
            line-height: 1.7;
            word-break: break-word;
        }

        .tag {
            display: inline-block;
            margin: 3px 6px 3px 0;
            padding: 5px 10px;
            background: #edf4ff;
            color: #1c3866;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
        }

        .footer {
            padding: 0 32px 28px;
            color: #64748b;
            font-size: 12px;
            line-height: 1.7;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="eyebrow">Biopharma Academy</div>
            <div class="header-title">Feedback Form Submission</div>
            <p class="header-subtitle">
                A new feedback response has been submitted from the website. Review the details below.
            </p>
        </div>
        <div class="content">
            <div class="section-title">Response Summary</div>
            <table class="summary-table" role="presentation">
                <tr>
                    <td class="summary-card">
                        <div class="summary-label">Respondent Name</div>
                        <div class="summary-value">{{ $data['respondent_name'] ?? 'N/A' }}</div>
                    </td>
                    <td class="summary-card">
                        <div class="summary-label">Enrollment Decision</div>
                        <div class="summary-value">{{ $data['enrolled'] ?? 'N/A' }}</div>
                    </td>
                </tr>
                <tr>
                    <td class="summary-card">
                        <div class="summary-label">Shadow Day Interest</div>
                        <div class="summary-value">{{ $data['shadow_day'] ?? 'N/A' }}</div>
                    </td>
                    <td class="summary-card">
                        <div class="summary-label">Team Follow-Up</div>
                        <div class="summary-value">{{ $data['team_contact'] ?? 'N/A' }}</div>
                    </td>
                </tr>
            </table>

            <div class="section-title">Submitted Answers</div>

            <div class="question-card">
                <div class="question-title">1. Did you decide to enroll in the program?</div>
                <div class="answer-box">{{ $data['enrolled'] ?? 'N/A' }}</div>
            </div>

            <div class="question-card">
                <div class="question-title">If yes, what convinced you about the program?</div>
                <div class="answer-box">
                    @forelse(($data['convinced'] ?? []) as $item)
                        <span class="tag">{{ $item }}</span>
                    @empty
                        N/A
                    @endforelse
                </div>
            </div>

            <div class="question-card">
                <div class="question-title">If yes, Other - Please specify</div>
                <div class="answer-box">{{ $data['convinced_other'] ?? 'N/A' }}</div>
            </div>

            <div class="question-card">
                <div class="question-title">2. If not, what is the main reason you haven't enrolled in the program?</div>
                <div class="answer-box">{{ $data['not_enrolled_reason'] ?? 'N/A' }}</div>
            </div>

            <div class="question-card">
                <div class="question-title">If not, Other - Please specify</div>
                <div class="answer-box">{{ $data['not_enrolled_other'] ?? 'N/A' }}</div>
            </div>

            <div class="question-card">
                <div class="question-title">3. What would make you more likely to enroll?</div>
                <div class="answer-box">
                    @forelse(($data['likely_to_enroll'] ?? []) as $item)
                        <span class="tag">{{ $item }}</span>
                    @empty
                        N/A
                    @endforelse
                </div>
            </div>

            <div class="question-card">
                <div class="question-title">Question 3 Other - Please specify</div>
                <div class="answer-box">{{ $data['likely_to_enroll_other'] ?? 'N/A' }}</div>
            </div>

            <div class="question-card">
                <div class="question-title">4. How clear is your understanding of what the program offers?</div>
                <div class="answer-box">{{ $data['program_clarity'] ?? 'N/A' }}</div>
            </div>

            <div class="question-card">
                <div class="question-title">5. Would you be interested in spending a day with one of our clinical research coordinators to get a better understanding of the day-to-day work and hands-on experience in clinical research?</div>
                <div class="answer-box">{{ $data['shadow_day'] ?? 'N/A' }}</div>
            </div>

            <div class="question-card">
                <div class="question-title">If yes, what is the best way to contact you?</div>
                <div class="answer-box">{{ $data['contact_method'] ?? 'N/A' }}</div>
            </div>

            <div class="question-card">
                <div class="question-title">Contact Information</div>
                <div class="answer-box">{{ $data['contact_information'] ?? 'N/A' }}</div>
            </div>

            <div class="question-card">
                <div class="question-title">6. Would you like someone from our team to contact you with more information about the program?</div>
                <div class="answer-box">{{ $data['team_contact'] ?? 'N/A' }}</div>
            </div>

            <div class="question-card">
                <div class="question-title">Additional Comments or Feedback</div>
                <div class="answer-box">{{ $data['comments'] ?? 'N/A' }}</div>
            </div>
        </div>
        <div class="footer">
            This email was generated automatically from the Biopharma Academy website feedback form.
        </div>
    </div>
</body>
</html>
