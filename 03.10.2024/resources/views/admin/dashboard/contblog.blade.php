@extends('admin.nav')

@section('admin_navbar')
    <h1>User Blog Counts</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Blog Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->blogs_count }}</td> 
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
