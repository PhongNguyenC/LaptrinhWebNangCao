<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Welcome, {{ Auth::user()->name }}!</h1>
    <form method="POST" action="{{ route('Logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
