<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{route('blogs.update', ['id'=>$blog->id])}}" method="POST">
        @csrf
        <label for="title">Blogs Title</label>
        <input type="text" value="{{$blog->title}}" name="title" id="title">
        <label for="content">Blogs Content</label>
        <input name="content" value="{{$blog->content}}" id="content"></İ>
        <select name="category_id" id="category_id">
            @isset($categories)
            @if (count($categories))
            @foreach ($categories as $category)
            <option
            @if($category->id==$blog->category_id) selected @endif
            value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            @endif
            @endisset
        </select>
        <button>Update</button>
    </form>
</body>

</html>