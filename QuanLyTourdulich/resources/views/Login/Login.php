<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <div class="container">
        <h2>Đăng nhập</h2>
        <form action="../Controller/user-controller.php" method="post">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username">
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="Đăng nhập">
        </form>
    </div>
</body>
</html>
