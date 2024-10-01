<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Blog</title>
    <style>
        body {
            font-family: Arial, sans-serif; /* Font stili */
            background-color: #f4f4f4; /* Arxa fon rəngi */
            margin: 0;
            padding: 20px; /* İç boşluq */
        }

        .container {
            max-width: 600px; /* Maksimum genişlik */
            margin: 0 auto; /* Ortaya düz */
            background-color: #ffffff; /* Fon rengi */
            border-radius: 8px; /* Künclərin yuvarlanması */
            padding: 20px; /* İç boşluq */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Kölgə effekti */
        }

        h2 {
            text-align: center; /* Mərkəzləşdirmək */
            margin-bottom: 20px; /* Aşağı boşluq */
        }

        label {
            display: block; /* Blok elementi */
            margin-bottom: 5px; /* Aşağı boşluq */
            font-weight: bold; /* Qalın yazı */
        }

        input[type="text"],
        input[type="file"] {
            width: 100%; /* Tam genişlik */
            padding: 10px; /* İç boşluq */
            margin-bottom: 15px; /* Aşağı boşluq */
            border: 1px solid #ccc; /* Sərhəd */
            border-radius: 4px; /* Künclərin yuvarlanması */
        }

        button {
            width: 100%; /* Tam genişlik */
            padding: 10px; /* İç boşluq */
            background-color: #007bff; /* Arxa fon rengi */
            color: #ffffff; /* Yazı rengi */
            border: none; /* Çərçivə */
            border-radius: 5px; /* Künclərin yuvarlanması */
            cursor: pointer; /* Maus göstəricisi */
            transition: background-color 0.3s; /* Hover effekti üçün keçid */
        }

        button:hover {
            background-color: #0056b3; /* Hover zamanı rəng dəyişməsi */
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h2>Update Blog</h2>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $blog->title }}" required>

            <label for="content">Content</label>
            <input type="text" name="content" id="content" value="{{ $blog->content }}" required>

            <label for="img">Image</label>
            <input type="file" name="image" id="img">

            <button type="submit">Update</button> 
        </form>
    </div>
</body>
</html>
