<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs List</title>
</head>

<body>
    <div>
        <div>
            @foreach ($blogs as $blog)
            <h3>{{ $blog->title }}</h3>
            <p>{{ $blog->content }}</p>
            @if($blog->image)
            <img src="{{ asset('images/' . $blog->image) }}" alt="{{ $blog->title }}" style="max-width: 300px;">
            @else
            @endif
            @endforeach
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <div>
            @foreach ($blogs as $blog)
            <h3>{{ $blog->title }}</h3>
            <p>{{ $blog->content }}</p>
            <p> {{ $blog->category->name ?? 'No category' }}</p>
            <p> {{ $blog->tag->name ?? 'No tag' }}</p>
            <img src="{{ asset('images/' . $blog->image) }}" alt="{{ $blog->title }}" style="max-width: 300px;">
            @endforeach
        </div>
    </div>
</body>

</html>