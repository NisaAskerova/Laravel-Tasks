<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* Font stili */
            background-color: #f4f4f4;
            /* Arxa fon rəngi */
            margin: 0;
            padding: 20px;
        }

        .container {
            display: flex;
            /* Kartları yan-yana düz */
            flex-wrap: wrap;
            /* Kartlar sığmadıqda yeni sətirə keç */
            gap: 20px;
            /* Kartlar arasında boşluq */
        }

        .card {
            background-color: #ffffff;
            /* Kartın arxa fonu */
            border-radius: 8px;
            /* Künclərin yuvarlanması */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            /* Kölgə effekti */
            padding: 15px;
            /* İç boşluq */
            width: 300px;
            /* Kartın genişliyi */
        }

        img {
            max-width: 100%;
            /* Şəkil genişliyini konteynerə uyğunlaşdır */
            border-radius: 8px;
            /* Şəklin künclərinin yuvarlanması */
        }

        h3 {
            margin: 10px 0;
            /* Başlıq ilə mətni arasındakı boşluq */
            font-size: 1.5em;
            /* Başlıq boyu */
            font-weight: bold;
            /* Qalın başlıq */
        }

        p {
            color: #333;
            /* Mətinin rəngi */
            line-height: 1.5;
            /* Sətir hündürlüyü */
        }

        .buttons {
            display: flex;
            /* Düymələri yan-yana düz */
            gap: 10px;
            /* Düymələr arasında boşluq */
            margin-top: 10px;
            /* Düymələrin üstündə boşluq */
        }

        button {
            background-color: #007bff;
            /* Düymə arxa fonu */
            color: #ffffff;
            /* Düymə yazı rəngi */
            border: none;
            /* Çərçivəni gizlə */
            border-radius: 5px;
            /* Künclərin yuvarlanması */
            padding: 10px 15px;
            /* İç boşluq */
            cursor: pointer;
            /* Maus göstəricisi */
            transition: background-color 0.3s;
            /* Hover effekti üçün keçid */
        }

        button:hover {
            background-color: #0056b3;
            /* Hover zamanı rəng dəyişməsi */
        }
    </style>
</head>

<body>
    <a href="{{route('blog.create')}}"><button>Add Blog</button></a>
    <div class="container">
        @isset($blogs)
        @if($blogs->isNotEmpty())
        @foreach ($blogs as $blog)
        <div class="card">
        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
        <h3>{{ $blog->title }}</h3>
            <p>{{ $blog->content }}</p>
            <div class="buttons">
                <a href="{{ route('blog.view', ['id' => $blog->id]) }}"><button>View</button></a>
                <a href="{{ route('blog.edit', ['id' => $blog->id]) }}"><button>Update</button></a>
                <a href="{{ route('blog.delete', ['id' => $blog->id]) }}"><button>Delete</button></a>
                
            </div>
        </div>
        @endforeach
        @else
        <p>No blogs found.</p>
        @endif
        @endisset
    </div>
</body>

</html>