<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog</title>
</head>

<body>
    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        @error('title')
        <span>{{ $message }}</span>
        @enderror

        <label for="content">Content</label>
        <input type="text" name="content" id="content">
        @error('content')
        <span>{{ $message }}</span>
        @enderror

        <label for="category">Category</label>
        <select name="category_id" id="category">
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
        <span>{{ $message }}</span>
        @enderror

        <label for="tag">Tag</label>
        <select name="tag_id" id="tag">
            <option value="">Select Tag</option>
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
        @error('tag_id')
        <span>{{ $message }}</span>
        @enderror

        <label for="image">Image</label>
        <input type="file" name="image" id="image">
        @error('image')
        <span>{{ $message }}</span>
        @enderror

        <button type="submit">Add</button>
    </form>
</body>

</html>
