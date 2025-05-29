<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Verify Your Email Address</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8fafc;
            color: #333333;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .button {
            background-color: #3b82f6;
            color: white !important;
            padding: 14px 24px;
            text-decoration: none;
            border-radius: 6px;
            display: inline-block;
            margin-top: 20px;
            font-weight: bold;
        }
        .footer {
            margin-top: 40px;
            font-size: 12px;
            color: #888888;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hello {{ $user->name }},</h2>
        <p>Thank you for registering with us! Please verify your email address by clicking the button below:</p>

        <a href="{{ $url }}" class="button" target="_blank" rel="noopener">Verify Email Address</a>

        <p>If you did not create an account, no further action is required.</p>

        <p>Best regards,<br>Your Company Name</p>
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} Your Company Name. All rights reserved.
    </div>
</body>
</html>