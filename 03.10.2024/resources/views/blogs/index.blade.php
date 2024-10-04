@extends('nav')

@section('navbar') 


    <h2>Bloglar</h2>

    @foreach($blogs as $blog)
        <div>
            <h2>{{ $blog->title }}</h2>
            <p>{{ $blog->content }}</p>

            @if($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Şəkili" style="max-width: 300px;">
            @endif

           
        </div>
    @endforeach
@endsection
