<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('nav')
    
    @section('navbar') 
    <h2>Login</h2>
    <form action="{{route('user.login')}}" method="POST">
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        @error('email')
        <span class="error">{{$message}}</span>
        @enderror
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        @error('password')
        <span class="error">{{$message}}</span>
        @enderror
        <button>Login</button>
    </form>
    @endsection
</body>
</html>