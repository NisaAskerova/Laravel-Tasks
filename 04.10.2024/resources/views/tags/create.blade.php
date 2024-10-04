<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('tags.store')}}" method="POST">
        @csrf
        <label for="tag">Tag</label>
        <input type="text" name="name" id="tag">
        <button>Submit</button>
    </form>
</body>
</html>