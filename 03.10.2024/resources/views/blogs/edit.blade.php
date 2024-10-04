
@extends('nav')

@section('navbar') 

<form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="title">Blog Başlığı:</label>
        <input type="text" id="title" name="title" value="{{ old('title', $blog->title) }}" required>
        @error('title')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="description">Təsvir:</label>
        <textarea id="description" name="content" required>{{ old('content', $blog->content) }}</textarea>
        @error('content')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="image">Şəkil Yüklə:</label>
        <input type="file" id="image" name="image" accept="image/*">
        @error('image')
            <div>{{ $message }}</div>
        @enderror
        @if($blog->image)
            <p>Hazırda Yüklənmiş Şəkil: <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Şəkili" style="max-width: 200px;"></p>
        @endif
    </div>

    <button type="submit">Yenilə</button>
</form>
@endsection


