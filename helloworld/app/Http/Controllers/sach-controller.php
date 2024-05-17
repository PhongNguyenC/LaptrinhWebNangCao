<?php
require_once 'D:\phong\Documents\Xampp\htdocs\Github\LaptrinhWebNangCao\helloworld/app/Models/sach-model.php';

try {
    $db = new PDO($conn, $fields["user"], $fields["pass"]);
    session_start();
    // Truy vấn dữ liệu sách từ cơ sở dữ liệu (chỉ lấy 5 bản ghi đầu tiên)
    $stmt = $db->query("SELECT * FROM Sach LIMIT 5");
    $sachList = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>