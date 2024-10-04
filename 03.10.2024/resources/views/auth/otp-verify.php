<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
       <form action="{{ route('user.otp.verify') }}" method="POST">
        <input type="hidden" name="email" value="{{ session('email') }}">

        <label for="otp">OTP:</label>
        <input type="text" name="otp" required>

        <button type="submit">OTP Doğrula</button>
    </form>
</body>
</html>