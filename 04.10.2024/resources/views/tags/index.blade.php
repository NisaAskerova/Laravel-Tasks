<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        <label for="category">Tag</label>
        <select name="tag_id" id="tag">
            <option value="">Select a tag</option>
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
    </form>
</body>
</html>
