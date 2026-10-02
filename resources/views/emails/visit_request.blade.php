<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visit Request</title>
    <!-- Inline styles for broad email client support -->
    <style>
        body { margin:0; padding:0; background:#f5f7fb; font-family: Arial, Helvetica, sans-serif; color:#333; }
        .wrapper { width:100%; background:#f5f7fb; padding:24px 0; }
        .container { width:100%; max-width:640px; margin:0 auto; background:#ffffff; border-radius:8px; overflow:hidden; }
        .brand { background:#0d6efd; color:#fff; padding:16px 24px; }
        .brand h1 { margin:0; font-size:20px; font-weight:600; }
        .header { padding:20px 24px; border-bottom:1px solid #e9ecef; }
        .header h2 { margin:0 0 6px; font-size:18px; color:#111; }
        .header p { margin:0; color:#6c757d; font-size:13px; }
        .content { padding:16px 24px; }
        .data-table { width:100%; border-collapse:collapse; }
        .data-table th { text-align:left; width:40%; padding:10px 0; color:#6c757d; font-weight:600; font-size:13px; }
        .data-table td { padding:10px 0; font-size:14px; color:#212529; }
        .cta { padding:8px 24px 24px; }
        .button { display:inline-block; background:#0d6efd; color:#fff; text-decoration:none; padding:10px 16px; border-radius:6px; font-size:14px; }
        .footer { padding:14px 24px; border-top:1px solid #e9ecef; color:#6c757d; font-size:12px; }
        @media (max-width: 480px) { .brand, .header, .content, .cta, .footer { padding-left:16px; padding-right:16px; } }
    </style>
    <!--[if mso]>
    <style type="text/css">
      .button { font-family: Arial, Helvetica, sans-serif !important; }
    </style>
    <![endif]-->
    </head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="brand">
                <h1>Biopharma Academy</h1>
            </div>
            <div class="header">
                <h2>New Visit Request</h2>
                <p>Submitted via Plan a Visit form</p>
            </div>
            <div class="content">
                <table class="data-table">
                    <tr>
                        <th>First Name</th>
                        <td>{{ $data['first_name'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td>{{ $data['last_name'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $data['email'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $data['phone_number'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Preferred Date</th>
                        <td>{{ $data['visit_date'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Preferred Time</th>
                        <td>{{ $data['visit_time'] ?? '-' }}</td>
                    </tr>
                </table>
            </div>
            <!--<div class="cta">-->
            <!--    <a class="button" href="{{ url('/admin/visits') }}" target="_blank" rel="noopener">View Visits in Admin</a>-->
            <!--</div>-->
            <div class="footer">
                <div>Biopharma Academy — Visit Request Notification</div>
            </div>
        </div>
    </div>
</body>
</html>