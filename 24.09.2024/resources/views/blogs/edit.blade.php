<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: auto;
}

label {
    display: block;
    margin: 10px 0 5px;
    font-weight: bold;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 10px;
    font-size: 16px;
}

textarea {
    height: 150px;
    resize: vertical;
}

button {
    background-color: #007bff;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3;
}

</style>
<body>
    <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
        @csrf 
        <label for="name">User Name</label>
        <input type="text" name="name" id="name" value="{{ $blog->name }}" >
        
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $blog->title }}" >
        
        <label for="content">Content</label>
        <textarea name="content" id="content" >{{ $blog->content }}</textarea>
        
        <button type="submit">Update</button>
    </form>
</body>
</html>
