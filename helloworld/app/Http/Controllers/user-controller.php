<?php

require_once '../../Models/user-model.php';

try {
    // Connect to the database
    $db = new PDO($conn, $fields["user"], $fields["pass"]);
    
    // Start session
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve username and password from login form
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Check if username and password are correct
        $stmt = $db->prepare("SELECT * FROM User WHERE TenUser = ? AND MatKhau = ?");
        $stmt->execute([$username, $password]);
        $user = $stmt->fetch();

        if ($user) {
            // Set session variables
            $_SESSION["username"] = $username;

            // Redirect to sach.php
            header("Location: ../../../resources/views/sach-view.php");
            exit();
        } else {
            header("Location: ../../../resources/views/login-view.php");
            exit();
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>