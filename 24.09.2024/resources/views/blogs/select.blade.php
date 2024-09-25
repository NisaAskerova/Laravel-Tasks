<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; 
            margin: 0;
            padding: 20px;
        }

        div {
            max-width: 600px; 
            margin: 20px auto; 
            padding: 20px;
            background-color: white; 
            border-radius: 8px; 
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); 
        }

        h2 {
            text-align: center;
            color: #333;
        }

        h4 {
            color: #007bff; 
        }

        p {
            color: #555; 
        }

        span {
            display: block;
            font-size: 0.9em; 
            color: #888; 
            margin-top: 10px; 
        }

        .button-container {
            display: flex; 
            justify-content: flex-start; 
            margin-top: 10px; 
        }

        button {
            background-color: #007bff; 
            color: white; 
            border: none; 
            border-radius: 4px;
            padding: 10px 15px;
            margin-right: 10px; 
            cursor: pointer; 
            transition: background-color 0.3s; 
        }

        button:hover {
            background-color: #0056b3; 
        }
    </style>
</head>
<body>
    <div>
        <h2>Blogs</h2>
        <a href="{{route('blogs.create')}}"><button>Add Blog</button></a>
        @if(isset($blogs) && count($blogs))
            @foreach ($blogs as $blog)
                <div>
                    <h4>{{ $blog->title }}</h4>
                    <p>{{ Str::limit($blog->content, 30, '...') }}</p>
                    <span>{{ $blog->name }}</span>
                    <div class="button-container">
                        <a href="{{route('blogs.edit', $blog->id)}}"><button>Update</button></a>
                        <a href="{{ route('blogs.delete', $blog->id) }}"><button>Delete</button></a>
                    </div>
                </div>
            @endforeach
        @else
            <p>No blogs available.</p>
        @endif
    </div>
</body>
</html>
