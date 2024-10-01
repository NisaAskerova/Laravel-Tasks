<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        /* Tag stili */
        .role-tag {
            display: inline-block;
            background-color: #007bff; /* Mavi arxa plan */
            color: white; /* Ağ mətn */
            padding: 5px 10px; /* İç boşluq */
            border-radius: 5px; /* Künclərin yumruluğu */
            margin: 2px; /* Taglar arası məsafə */
        }
        /* Başlıq stili */
        h1 {
            margin-bottom: 20px;
        }
        /* Cədvəl stili */
        table {
            width: 100%;
            border-collapse: collapse; /* Sərhədlərin birləşməsi */
        }
        th, td {
            padding: 10px; /* İç boşluq */
            text-align: left; /* Soldan hizalama */
        }
        th {
            background-color: #f2f2f2; /* Başlıq arxa planı */
        }
    </style>
</head>
<body>
    <h1>User List</h1>

    <a href="{{ route('users.create') }}"><button>Create User</button></a>
    <a href="{{ route('roles.create') }}"><button>Create Role</button></a>
    <a href="{{ route('roles.index') }}"><button>Create Role</button></a>


    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach($user->roles as $role)
                        <span class="role-tag">{{ $role->name }}</span> <!-- Taglar -->
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('users.edit', ['id' => $user->id]) }}"><button>Edit</button></a>
                    <a href="{{ route('users.delete', ['id' => $user->id]) }}"><button>Delete</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
