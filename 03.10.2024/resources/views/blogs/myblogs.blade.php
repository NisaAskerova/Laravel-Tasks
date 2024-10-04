@extends('nav')

@section('navbar')
    <div class="container">
        <h1>My Blogs</h1>

        @if($blogs->isEmpty())
            <p>Heç bir blogunuz yoxdur.</p>
        @else
            @foreach($blogs as $blog)
                <div>
                    <h2>{{ $blog->title }}</h2>
                    <p>{{ $blog->content }}</p>

                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Şəkili" style="max-width: 300px;">
                    @endif

                    <a href="{{ route('blogs.edit', $blog->id) }}">
                        <button>Edit</button>
                    </a>

                    <form action="{{ route('blogs.delete', $blog->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            @endforeach
        @endif
    </div>
@endsection
