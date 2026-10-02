<!DOCTYPE html>
<html>
<head>
    <title>Catalog Form Lead</title>
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
            color: #fff;
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
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
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
            <h2>New Catalog Form Lead</h2>
        </div>
        <div class="content">
            <p>A new lead has submitted the program catalog form.</p>

            <div class="details">
                @if(!empty($leadDetails['title']))
                    <p><strong>Title:</strong> {{ $leadDetails['title'] }}</p>
                @endif
                <p><strong>Name:</strong> {{ $leadDetails['first_name'] }} {{ $leadDetails['last_name'] }}</p>
                <p><strong>Email:</strong> {{ $leadDetails['email'] }}</p>
                @if(!empty($leadDetails['phone']))
                    <p><strong>Phone:</strong> {{ $leadDetails['phone'] }}</p>
                @endif
                @if(!empty($leadDetails['address']))
                    <p><strong>Address:</strong> {{ $leadDetails['address'] }}</p>
                @endif
                <p><strong>Communication Preference:</strong>
                    {{ $leadDetails['communication'] === 'email' ? 'Interested in receiving future program information by email.' : 'No follow-up communication requested.' }}
                </p>
            </div>
        </div>
        <div class="footer">
            <p>This is an automated message from the Biopharma Academy website.</p>
        </div>
    </div>
</body>
</html>
