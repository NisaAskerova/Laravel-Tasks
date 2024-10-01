<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $role->name }} - Users</title>
</head>
<body>
    <h2>Role: {{ $role->name }}</h2>
    @if($users->isEmpty())
        <p>No users found for this role.</p>
    @else
        <ul>
            @foreach($users as $user)
                <li>{{ $user->name }} ({{ $user->email }})</li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('roles.index') }}"><button>Back to roles list</button></a>
</body>
</html>
