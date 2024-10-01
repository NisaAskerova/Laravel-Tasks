<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->title }}</title>
    <style>
        /* Ümumi bədən tərzi */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9; /* Açıq fon */
        }

        /* Detallı səhifə konteyneri */
        .container {
            max-width: 800px; /* Maksimum genişlik */
            margin: auto; /* Mərkəzləşdirmək */
            background: white; /* Ağ fon */
            padding: 20px; /* İç boşluq */
            border-radius: 10px; /* Kənar yuvarlaqlaşdırma */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Kölgə */
        }

        /* Başlıq tərzi */
        h1 {
            color: #333; /* Tünd rəng */
            margin-bottom: 15px; /* Alt marj */
            text-align: center; /* Mərkəzləşdirmək */
        }

        /* Şəkil tərzi */
        img {
            max-width: 100%; /* Maksimum genişlik */
            height: auto; /* Hündürlük avtomatik */
            border-radius: 10px; /* Kənar yuvarlaqlaşdırma */
            margin-bottom: 20px; /* Alt marj */
        }

        /* Məzmun tərzi */
        strong {
            color: #555; /* Tünd boz rəng */
        }

        p {
            line-height: 1.6; /* Sətir hündürlüyü */
            color: #666; /* Boz rəng */
            margin-bottom: 15px; /* Alt marj */
        }

        /* Geri dönmək üçün bağlantı tərzi */
        a {
            display: inline-block; /* Block tipinə çevir */
            text-decoration: none; /* Xətləri sil */
            color: #ffffff; /* Ağ rəng */
            background-color: #007bff; /* Mavi fon */
            padding: 10px 15px; /* Daxili boşluq */
            border-radius: 5px; /* Kənar yuvarlaqlaşdırma */
            transition: background-color 0.3s; /* Rəng keçidi */
            text-align: center; /* Mərkəzləşdirmək */
        }

        /* Bağlantıya hover effekti */
        a:hover {
            background-color: #0056b3; /* Qaranlıq mavi fon */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $blog->title }}</h1>
        <div>
            <span>{{ 'storage/' . $blog->image }} </span>
            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
        </div>
        <div>
            <strong>Content:</strong>
            <p>{{ $blog->content }}</p>
        </div>
        <div>
            <strong>Created blog</strong>
            <p>{{ $blog->created_at}}</p>
        </div>
        <a href="{{ route('blog.index') }}">Back</a>
    </div>
</body>
</html>
