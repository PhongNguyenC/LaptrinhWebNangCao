<?php
session_start();

// Thay đổi thông tin kết nối tới CSDL
$servername = "localhost";  // Tên máy chủ MySQL
$username = "root";         // Tên người dùng MySQL
$password = "";             // Mật khẩu MySQL
$dbname = "test";           // Tên cơ sở dữ liệu

// Kiểm tra xem người dùng đã gửi thông tin đăng nhập chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin đăng nhập từ form
    $username_input = $_POST["username"];
    $password_input = $_POST["password"];

    // Kết nối CSDL
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Truy vấn CSDL để kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM users WHERE username='$username_input' AND password='$password_input'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Nếu thông tin đúng, đặt biến session và chuyển hướng người dùng đến trang chính
        $_SESSION["IsLogin"] = true;
        $conn->close(); // Đóng kết nối trước khi chuyển hướng
        header("Location: TH1.php");
        exit();
    } else {
        // Nếu thông tin không đúng, chuyển hướng người dùng trở lại trang đăng nhập
        $conn->close(); // Đóng kết nối trước khi chuyển hướng
        header("Location: login.htm");
        exit();
    }
} else {
    // Nếu không phải là phương thức POST, chuyển hướng người dùng trở lại trang đăng nhập
    header("Location: login.htm");
    exit();
}
?>
