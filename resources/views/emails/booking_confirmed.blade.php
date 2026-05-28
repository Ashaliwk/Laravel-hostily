<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Your Booking is Confirmed! 🎉</title>
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
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
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
        .header p {
            margin: 10px 0 0 0;
            font-size: 16px;
            opacity: 0.9;
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
        .booking-card {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 24px;
            margin: 25px 0;
        }
        .booking-card h3 {
            margin-top: 0;
            margin-bottom: 15px;
            color: #111827;
            font-size: 18px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 10px;
        }
        .details-table {
            width: 100%;
            border-collapse: collapse;
        }
        .details-table td {
            padding: 10px 0;
            border-bottom: 1px solid #f1f5f9;
            font-size: 15px;
        }
        .details-table tr:last-child td {
            border-bottom: none;
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
        .success-badge {
            background-color: #d1fae5;
            color: #065f46;
            padding: 6px 12px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 700;
            display: inline-block;
            text-transform: uppercase;
        }
        .button {
            display: inline-block;
            background-color: #10b981;
            color: #ffffff;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            text-align: center;
            margin: 20px auto;
            display: block;
            width: fit-content;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
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
            color: #10b981;
            text-decoration: none;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Booking Confirmed!</h1>
            <p>Your stay is officially locked in. See you soon!</p>
        </div>
        <div class="content">
            <p>Dear {{ $booking->guest_name }},</p>
            <p>We are delighted to confirm your room reservation at <strong>Hostily</strong>. Your email has been verified, and your booking is successfully finalized. Below you'll find the complete details of your stay.</p>
            
            <div class="booking-card">
                <h3>Booking Reference: #{{ $booking->id }}</h3>
                <table class="details-table">
                    <tr>
                        <td class="label">Status</td>
                        <td class="value"><span class="success-badge">Confirmed</span></td>
                    </tr>
                    <tr>
                        <td class="label">Room</td>
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
                        <td class="label">Guests</td>
                        <td class="value">{{ $booking->guests }} Person(s)</td>
                    </tr>
                    <tr>
                        <td class="label">Total Price</td>
                        <td class="value" style="color: #059669; font-size: 18px;">{{ number_format($booking->total_price) }} PKR</td>
                    </tr>
                    <tr>
                        <td class="label">Payment Method</td>
                        <td class="value">Cash on Arrival</td>
                    </tr>
                </table>
            </div>

            <p style="font-size: 15px;">Please keep this email and booking reference ID handy, as you'll need it upon check-in and if you'd like to leave a review after your checkout.</p>
            
            <a href="http://localhost" class="button">Visit Hostily website</a>
            
            <p style="margin-top: 30px; margin-bottom: 0; font-size: 14px; color: #6b7280;">If you need to make changes or cancel your booking, please reply directly to this email or get in touch with our front desk team.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Hostily Hotels. All rights reserved.</p>
            <p>Need help? <a href="#">Contact Support</a></p>
        </div>
    </div>
</body>
</html>
