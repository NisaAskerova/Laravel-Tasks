<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog</title>
    <link rel="stylesheet" href="styles.css">
    <style>body {
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

.error {
    color: red;
    font-size: 14px;
    margin-top: -5px;
    margin-bottom: 10px;
    display: block;
}
</style>
</head>
<body>
    <form action="{{ route('blog.store') }}" method="POST">
        @csrf
        <label for="name">User Name</label>
        <input type="text" name="name" id="name">
        @error('name')
        <span class="error">{{ $message }}</span>
        @enderror
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        @error('title')
        <span class="error">{{ $message }}</span>
        @enderror
        <label for="content">Content</label>
        <textarea name="content" id="content"></textarea>
        @error('content')
        <span class="error">{{ $message }}</span>
        @enderror
        <button type="submit">Submit</button>
    </form>
</body>
</html>
