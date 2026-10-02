<!DOCTYPE html>
<html>
<head>
    <title>New Inbound SMS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #1c3866;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
            background-color: #f9f9f9;
        }
        .details {
            margin: 20px 0;
            padding: 15px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Inbound SMS Received</h2>
        </div>
        <div class="content">
            <p>You have received a new SMS message:</p>
            
            <div class="details">
                <p><strong>From:</strong> {{ $smsDetails['from'] }}</p>
                @if(!empty($smsDetails['student_name']))
                <p><strong>Student Name:</strong> {{ $smsDetails['student_name'] }}</p>
                @endif
                <p><strong>Message:</strong></p>
                <p style="background-color: #eee; padding: 10px; border-radius: 4px;">{{ $smsDetails['body'] }}</p>
            </div>
            
            <p>You can reply to this message from the admin dashboard.</p>
        </div>
        <div class="footer">
            <p>This is an automated message from the Biopharma Academy Of Clinical Research system.</p>
        </div>
    </div>
</body>
</html>