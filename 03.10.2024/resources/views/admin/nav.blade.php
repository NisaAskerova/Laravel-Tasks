<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <nav>
        <ul>
            @guest
                <li><a href="{{ route('user.register') }}">Qeydiyyat</a></li>
                <li><a href="{{ route('user.login') }}">Giriş</a></li>
            @endguest

            @auth
                <li><a href="{{ route('admin.dashboard') }}">Admin Panel</a></li>
                <li><a href="{{ route('admin.users') }}">Users</a></li>
                <li><a href="{{ route('admin.blogs') }}">Blogs</a></li>
                <li><a href="{{ route('admin.blogs.users.count') }}">Blog Count</a></li>
                <li><a href="{{ route('user.logout') }}">Logout</a></li>
            @endauth
        </ul>
    </nav>

    @yield('admin_navbar')

</body>
</html>
