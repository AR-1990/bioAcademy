<!DOCTYPE html>
<html>
<head>
    <title>New Student Message</title>
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
            <h2>New Student Message</h2>
        </div>
        <div class="content">
            <p>A new message has been received from a student:</p>
            
            <div class="details">
                <p><strong>Student Name:</strong> {{ $userDetails['first_name'] }}</p>
                <p><strong>Email:</strong> {{ $userDetails['email'] }}</p>
                <p><strong>Phone:</strong> {{ $userDetails['phone_number'] }}</p>
                <p><strong>Message:</strong></p>
                <p>{{ $userDetails['message'] }}</p>
            </div>
        </div>
        <div class="footer">
            <p>This is an automated message from the Biopharma Academy Of Clinical Research system.</p>
        </div>
    </div>
</body>
</html> 