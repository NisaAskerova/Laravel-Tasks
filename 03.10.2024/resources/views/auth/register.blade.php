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
    <h2>Register</h2>
    <form action="{{route('user.register')}}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        @error('name')
        <span class="error">{{$message}}</span>
        @enderror
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
        <button>Register</button>
    </form>
    @endsection
</body>
</html>