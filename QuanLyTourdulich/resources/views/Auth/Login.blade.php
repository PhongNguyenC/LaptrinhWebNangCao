<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('Login') }}">
        @csrf
        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password">
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button type="button">Login</button>
        </div>
    </form>
    <a href="{{ route('Register') }}">
        <button type="button">Register</button>
    </a>
</body>
</html>
