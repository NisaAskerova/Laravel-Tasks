<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{route('blogs.store')}}" method="POST">
        @csrf
        <label for="title">Blogs Title</label>
        <input type="text" name="title" id="title">
        <label for="content">Blogs Content</label>
        <textarea name="content" id="content"></textarea>
        <label for="category_id">Categories</label>
        <select name="category_id" id="category_id">
            @isset($categories)
            @if (count($categories))
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            @endif
            @endisset
        </select>
        <button>Create</button>

    </form>
</body>

</html>