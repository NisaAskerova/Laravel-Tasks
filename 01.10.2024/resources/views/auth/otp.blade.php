<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{ route('verify-otp') }}" method="POST">
    @csrf
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>
    
    <label for="otp">OTP</label>
    <input type="text" name="otp" id="otp" required>
    
    <button type="submit">Verify OTP</button>
</form>

</body>
</html>