<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Yarat</title>
    <style>
        /* Ümumi bədən tərzi */
        body {
            font-family: Arial, sans-serif; /* Font tipi */
            margin: 0; /* Kənar boşluq */
            padding: 20px; /* İç boşluq */
            background-color: #f9f9f9; /* Açıq fon */
        }

        /* Forma konteyneri */
        .container {
            max-width: 600px; /* Maksimum genişlik */
            margin: auto; /* Mərkəzləşdirmək */
            background: white; /* Ağ fon */
            padding: 20px; /* İç boşluq */
            border-radius: 10px; /* Kənar yuvarlaqlaşdırma */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Kölgə */
        }

        /* Başlıq tərzi */
        h2 {
            text-align: center; /* Mərkəzləşdirmək */
            color: #333; /* Tünd rəng */
            margin-bottom: 20px; /* Alt marj */
        }

        /* Etiket tərzi */
        label {
            display: block; /* Block elementi */
            margin-bottom: 5px; /* Alt marj */
            color: #555; /* Boz rəng */
        }

        /* Giriş sahəsi tərzi */
        input[type="text"],
        input[type="file"] {
            width: 100%; /* Tam genişlik */
            padding: 10px; /* Daxili boşluq */
            margin-bottom: 15px; /* Alt marj */
            border: 1px solid #ccc; /* Çərçivə */
            border-radius: 5px; /* Kənar yuvarlaqlaşdırma */
            box-sizing: border-box; /* Çərçivə daxilində ölçü */
        }

        /* Xəta mesajı tərzi */
        .error {
            color: red; /* Qırmızı rəng */
            font-size: 0.9em; /* Kiçik ölçü */
            margin-top: -10px; /* Yuxarı marj */
            margin-bottom: 10px; /* Alt marj */
        }

        /* Düğme tərzi */
        button {
            background-color: #007bff; /* Mavi fon */
            color: white; /* Ağ yazı */
            border: none; /* Çərçivəni sil */
            padding: 10px 15px; /* Daxili boşluq */
            border-radius: 5px; /* Kənar yuvarlaqlaşdırma */
            cursor: pointer; /* İmleci göstərici */
            transition: background-color 0.3s; /* Rəng keçidi */
            width: 100%; /* Tam genişlik */
        }

        /* Düğmeye hover effekti */
        button:hover {
            background-color: #0056b3; /* Qaranlıq mavi fon */
        }

        /* Geri dönmək üçün bağlantı tərzi */
        a {
            display: inline-block; /* Block tipinə çevir */
            text-decoration: none; /* Xətləri sil */
            text-align: center; /* Mərkəzləşdirmək */
            margin-top: 20px; /* Yuxarı marj */
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h2>Create Blog</h2>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" >
            @error('title')
            <span class="error">{{ $message }}</span>
            @enderror

            <label for="content">Content</label>
            <input type="text" name="content" id="content" >
            @error('content')
            <span class="error">{{ $message }}</span>
            @enderror

            <label for="img">Image</label>
            <input type="file" name="image" id="img" >
            @error('image')
            <span class="error">{{ $message }}</span>
            @enderror

            <button type="submit">Submit</button>
        </form>
        <a href="{{ route('blog.index') }}"><button>All Blog</button></a>
    </div>
</body>
</html>
