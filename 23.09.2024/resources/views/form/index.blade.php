<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    label,
    button {
        display: block;
        margin-top: 10px;
    }

    .error {
        display: block;
        color: red;
        font-size: 0.875em;
    }
</style>

<body>

    <form action="{{ route('form.submit') }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        @error('name')
        <span class="error">{{ $message }}</span>
        @enderror

        <label for="surname">Surname</label>
        <input type="text" name="surname" id="surname">
        @error('surname')
        <span class="error">{{ $message }}</span>
        @enderror

        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        @error('email')
        <span class="error">{{ $message }}</span>
        @enderror

        <label for="age">Age</label>
        <input type="number" name="age" id="age">
        @error('age')
        <span class="error">{{ $message }}</span>
        @enderror

        <label for="gender">Gender</label>
        <select name="gender" id="gender">
            <option value="f">Female</option>
            <option value="m">Male</option> 
        </select>
        @error('gender')
        <span class="error">{{ $message }}</span>
        @enderror

        <button type="submit">Submit</button>
    </form>

    @isset($data)
    <ul>
        <li>{{ $data['name'] }}</li>
        <li>{{ $data['surname'] }}</li> 
        <li>{{ $data['email'] }}</li>
        <li>{{ $data['age'] }}</li>
        <li>
            @if($data['gender'] == 'f')
            <span>Female</span>
            @else
            <span>Male</span>
            @endif
        </li>
    </ul>
    @endisset

</body>

</html>
