<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student Enrolment Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .email-container {
            background: #fff;
            padding: 30px;
            max-width: 600px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #6c63ff;
            color: #fff;
            padding: 15px;
            text-align: center;
            font-size: 20px;
            border-radius: 8px 8px 0 0;
        }
        .content {
            margin-top: 20px;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            text-align: center;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            Student Enrolment Confirmation
        </div>
        <div class="content">
            <p>First Name {{ $data['first_name'] ?? 'Student' }},</p>
 			<p>Last Name {{ $data['last_name'] ?? 'Student' }},</p>
			<p>Email {{ $data['email'] ?? 'Student' }},</p>
			<p>Phone {{ $data['phone_number'] ?? 'Student' }},</p>
            <p>Source: {{ $data['source_label'] ?? \App\Models\User::getSourceLabel($data['source'] ?? null) }}</p>
            @if(!empty($data['postal']))
            <p>ZIP: {{ $data['postal'] }}</p>
            @endif
        </div>
       
    </div>
</body>
</html>
