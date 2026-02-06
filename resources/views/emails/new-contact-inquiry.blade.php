<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background-color: #F97316; padding: 20px; text-align: center; border-radius: 8px 8px 0 0;">
        <h1 style="color: #fff; margin: 0; font-size: 24px;">Liên hệ mới từ website</h1>
    </div>

    <div style="background-color: #f9f9f9; padding: 24px; border: 1px solid #e0e0e0; border-top: none; border-radius: 0 0 8px 8px;">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="padding: 10px 0; font-weight: bold; color: #555; width: 140px; vertical-align: top;">Số điện thoại:</td>
                <td style="padding: 10px 0;">
                    <a href="tel:{{ $inquiry->phone }}" style="color: #F97316; text-decoration: none; font-weight: bold;">{{ $inquiry->phone }}</a>
                </td>
            </tr>
            <tr>
                <td style="padding: 10px 0; font-weight: bold; color: #555; vertical-align: top;">Nội dung:</td>
                <td style="padding: 10px 0;">{{ $inquiry->message }}</td>
            </tr>
            <tr>
                <td style="padding: 10px 0; font-weight: bold; color: #555; vertical-align: top;">Thời gian:</td>
                <td style="padding: 10px 0;">{{ $inquiry->created_at->format('d/m/Y H:i:s') }}</td>
            </tr>
            <tr>
                <td style="padding: 10px 0; font-weight: bold; color: #555; vertical-align: top;">Địa chỉ IP:</td>
                <td style="padding: 10px 0;">{{ $inquiry->ip_address }}</td>
            </tr>
        </table>

        <div style="margin-top: 24px; text-align: center;">
            <a href="{{ url('/admin/inquiries/' . $inquiry->id) }}" style="display: inline-block; background-color: #F97316; color: #fff; text-decoration: none; padding: 12px 24px; border-radius: 6px; font-weight: bold;">Xem trong trang quản trị</a>
        </div>
    </div>

    <div style="text-align: center; margin-top: 16px; color: #999; font-size: 12px;">
        <p>Email này được gửi tự động từ {{ config('app.name') }}.</p>
    </div>
</body>
</html>
