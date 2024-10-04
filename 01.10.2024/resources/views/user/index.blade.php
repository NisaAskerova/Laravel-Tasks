<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Welcome</h2>
    <h3>User: {{auth()->user()->name}}</h3>
    <a href="{{route('logout')}}"><button>Log Out</button></a>
    
</body>
</html>