<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('categories.update', ['id'=>$category->id])}}" method="POST">
        @csrf
        <label for="name">Category Name</label>
        <input type="text" name="name" id="name">
        <button>Update</button>
    </form>
</body>
</html>