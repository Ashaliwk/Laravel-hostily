<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Verify Your Hostily Booking</title>
    <style>
        body {
            font-family: 'Outfit', 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }
        .header {
            background: linear-gradient(135deg, #1e3a8a 0%, #0d9488 100%);
            padding: 40px 20px;
            text-align: center;
            color: #ffffff;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        .content {
            padding: 40px 30px;
            color: #374151;
            line-height: 1.6;
        }
        .content p {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 16px;
        }
        .code-container {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 24px;
            text-align: center;
            margin: 30px 0;
        }
        .verification-code {
            font-size: 36px;
            font-weight: 800;
            letter-spacing: 6px;
            color: #0d9488;
            margin: 0;
        }
        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            border-top: 1px solid #e5e7eb;
        }
        .details-table td {
            padding: 12px 0;
            border-bottom: 1px solid #e5e7eb;
            font-size: 15px;
        }
        .details-table td.label {
            color: #6b7280;
            font-weight: 500;
            width: 35%;
        }
        .details-table td.value {
            color: #111827;
            font-weight: 600;
            text-align: right;
        }
        .footer {
            background-color: #f9fafb;
            padding: 24px 30px;
            text-align: center;
            border-top: 1px solid #e5e7eb;
            font-size: 13px;
            color: #9ca3af;
        }
        .footer a {
            color: #0d9488;
            text-decoration: none;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Verify Your Booking</h1>
        </div>
        <div class="content">
            <p>Dear {{ $booking->guest_name }},</p>
            <p>Thank you for choosing <strong>Hostily</strong>! We've received a request for a room booking using this email address. To complete and secure your reservation, please use the 6-digit verification code below:</p>
            
            <div class="code-container">
                <p style="font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #6b7280; margin-bottom: 8px; font-weight: 600;">Verification Code</p>
                <div class="verification-code">{{ $booking->verification_code }}</div>
                <p style="font-size: 12px; color: #9ca3af; margin-top: 8px; margin-bottom: 0;">This code is valid for a limited time. Please do not share it with anyone.</p>
            </div>

            <h3 style="font-size: 18px; margin-top: 30px; margin-bottom: 10px; color: #111827;">Booking Summary</h3>
            <table class="details-table">
                <tr>
                    <td class="label">Room Type</td>
                    <td class="value">{{ $booking->room->name ?? 'Deluxe Room' }}</td>
                </tr>
                <tr>
                    <td class="label">Check-in Date</td>
                    <td class="value">{{ $booking->check_in->format('M d, Y') }}</td>
                </tr>
                <tr>
                    <td class="label">Check-out Date</td>
                    <td class="value">{{ $booking->check_out->format('M d, Y') }}</td>
                </tr>
                <tr>
                    <td class="label">Total Price</td>
                    <td class="value">{{ number_format($booking->total_price) }} PKR</td>
                </tr>
            </table>

            <p style="margin-top: 30px; margin-bottom: 0; font-size: 15px;">If you did not initiate this booking, please disregard this email or contact support.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Hostily Hotels. All rights reserved.</p>
            <p>Need help? <a href="#">Contact Support</a></p>
        </div>
    </div>
</body>
</html>
