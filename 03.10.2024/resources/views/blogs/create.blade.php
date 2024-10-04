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
    
<form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="title">Başlıq</label>
        <input type="text" name="title" id="title">
    </div>

    <div>
        <label for="content">Məzmun</label>
        <textarea name="content" id="content"></textarea>
    </div>

    <div>
        <label for="image">Şəkil Yüklə</label>
        <input type="file" name="image" id="image" accept="image/*">
    </div>


    <button type="submit">Blog Yarat</button>
</form>
@endsection
</body>
</html>