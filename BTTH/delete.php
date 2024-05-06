<?php
// Đường dẫn đến thư mục upload
$target_dir = "upload/";

if (isset($_GET['file'])) {
    $file_name = $_GET['file'];
    $file_path = $target_dir . $file_name;

    // Xoá tệp từ ổ đĩa
    if (unlink($file_path)) {
        echo "Tệp $file_name đã được xoá thành công.";
    } else {
        echo "Có lỗi xảy ra khi xoá tệp.";
    }
}

// Redirect người dùng về trang chính
header("Location: upload.php");
exit();
?>
