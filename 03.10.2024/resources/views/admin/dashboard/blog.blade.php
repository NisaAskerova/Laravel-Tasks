@extends('admin.nav')

@section('admin_navbar')
<div class="container">
    <h1>Blogs</h1>

    <table class="table" border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Author</th> <!-- İstifadəçinin adını göstərmək üçün sütun -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>{{ $blog->created_at->format('d-m-Y') }}</td>
                    <td>{{ $blog->user->name ?? 'Unknown' }}</td> <!-- İstifadəçinin adını göstər -->
                    <td>
                        <form action="{{ route('admin.toggleBlogStatus', $blog->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning">
                                {{ $blog->is_active ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
