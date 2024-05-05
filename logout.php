<?php
session_start();

// Đặt trạng thái login là false
$_SESSION["IsLogin"] = false;

// Redirect về trang đăng nhập sau khi logout
header("Location: login.htm");
exit();
?>
