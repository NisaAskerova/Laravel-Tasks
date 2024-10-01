<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #fff;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin-left: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            text-decoration: none;
        }

        .add-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            text-align: center;
            width: fit-content;
            cursor: pointer;
        }

        .add-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Roles</h1>

    <ul>
        @isset($roles)
        @if(count($roles))
        @foreach($roles as $role)
            <li>
                {{ $role->name }}
                <div>
                    <a href="{{ route('roles.edit', ['id' => $role->id]) }}"><button>Edit</button></a>
                    <a href="{{ route('roles.view', ['id' => $role->id]) }}"><button>View</button></a>
                </div>
            </li>
        @endforeach
        @endif
        @endisset
    </ul>

    <a href="{{ route('roles.create') }}" class="add-button">Add New Role</a>
</body>
</html>
