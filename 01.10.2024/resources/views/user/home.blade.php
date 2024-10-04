<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        @guest
        <li><a href="{{route('show-login')}}">Login</a> </li>
        <li><a href="{{route('show-register')}}">Register</a> </li>
        @endguest
        @auth
        <li><a href="{{route('me')}}">Profile</a> </li>
        @endauth
    </ul>
</body>
</html>