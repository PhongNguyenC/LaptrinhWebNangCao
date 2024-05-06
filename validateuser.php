<?php
session_start();


$servername = "localhost";  
$username = "root";        
$password = "";            
$dbname = "test";          

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_input = $_POST["username"];
    $password_input = sha1($_POST["password"]);

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE username='$username_input' AND password='$password_input'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION["IsLogin"] = true;
        $conn->close(); 
        header("Location: TH1.php");
        exit();
    } else {
        $conn->close(); 
        header("Location: login.htm");
        exit();
    }
} else {
    header("Location: login.htm");
    exit();
}
?>
