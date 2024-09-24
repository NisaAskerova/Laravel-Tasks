<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User Form</title>
</head>
<style>
    label,button{
        display: block;
        margin-top: 10px;
    }
</style>
<body>
    <form action="{{route('user.store')}}" method="POST">
        @csrf
        <h2>Login</h2>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="passwrod">
        <button>Submit</button>
    </form>
    <ul>
        @isset($users)
        @if(count($users))
        @foreach ($users as $user )
        <li>{{$user->id}}-{{$user->name}}-{{$user->email}}</li>
        <a href="{{route('user.delete', ['id'=>$user->id])}}"><button>Delete</button></a>
        @endforeach
        @endif
        @endisset
    </ul>
</body>
</html>