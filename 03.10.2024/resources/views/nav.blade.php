<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <ul>
        @guest
            <li><a href="{{ route('user.show-register') }}">Register</a></li>
            <li><a href="{{ route('user.show-login') }}">Login</a></li>
        @endguest
            @auth
            <li><a href="">Profile</a></li>
            <li><a href="{{route('blogs.create')}}">Add Blog</a></li>
            <li><a href="{{route('blogs.index')}}">Blogs</a></li>
            <li><a href="{{route('blogs.myblogs')}}">My Blogs</a></li>
            <li><a href="{{route('user.logout')}}">Logout</a></li>
            @endauth
        </ul>
    </nav>

    @yield('navbar')
</body>

</html>