<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        /* Ümumi bədən stili */
        body {
            font-family: Arial, sans-serif; /* Şrift */
            background-color: #f4f4f4; /* Arxa fon rəngi */
            margin: 0; /* Marjını sıfırlamaq */
            padding: 20px; /* Daxili boşluq */
        }

        /* Başlıq stili */
        h1 {
            color: #333; /* Başlıq mətn rəngi */
            margin-bottom: 20px; /* Başlıq alt boşluğu */
        }

        /* Formanın stili */
        form {
            background-color: #fff; /* Formanın arxa fonu */
            padding: 20px; /* Daxili boşluq */
            border-radius: 5px; /* Künclərin yumruluğu */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Kölgə */
        }

        /* Form elementlərinin stili */
        label {
            display: block; /* Blok halında göstər */
            margin-bottom: 5px; /* Alt boşluq */
            font-weight: bold; /* Qalın mətn */
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%; /* Tam genişlik */
            padding: 10px; /* Daxili boşluq */
            margin-bottom: 15px; /* Alt boşluq */
            border: 1px solid #ccc; /* Sərhəd */
            border-radius: 4px; /* Künclərin yumruluğu */
            font-size: 16px; /* Şrift ölçüsü */
        }

        button {
            background-color: #007bff; /* Düymə arxa fonu */
            color: white; /* Düymə mətn rəngi */
            border: none; /* Sərhəd olmadan */
            padding: 10px 15px; /* Daxili boşluq */
            border-radius: 4px; /* Künclərin yumruluğu */
            cursor: pointer; /* Siçan göstəricisi */
            font-size: 16px; /* Şrift ölçüsü */
        }

        button:hover {
            background-color: #0056b3; /* Hover zamanı arxa fon rəngi */
        }

        /* Xətaların stili */
        .error {
            color: red; /* Xəta mətn rəngi */
            margin-top: -10px; /* Üst boşluğu azalt */
            margin-bottom: 10px; /* Alt boşluğu artır */
            font-size: 14px; /* Şrift ölçüsü */
        }
    </style>
</head>

<body>
    <h1>Edit User</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
        @error('name')
        <span class="error">{{ $message }}</span>
        @enderror

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
        @error('email')
        <span class="error">{{ $message }}</span>
        @enderror

        <label for="roles">Select Roles</label>
        <select name="role_ids[]" id="roles" multiple required>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" 
                    @if(in_array($role->id, $userRoles)) selected @endif>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>
        @error('role_ids')
        <span class="error">{{ $message }}</span>
        @enderror

        <button type="submit">Update</button>
    </form>
</body>

</html>
