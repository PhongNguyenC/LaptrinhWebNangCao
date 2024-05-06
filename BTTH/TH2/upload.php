<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

$target_dir = "upload/";


if ($_FILES['fileToUpload']['size'] > 2097152) {
    echo "Kích thước tệp quá lớn.";
} else {

    $file_name = $_FILES['fileToUpload']['name'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_size = $_FILES['fileToUpload']['size'];

    
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $new_file_name = date("YmdHis") . "_" . sha1($file_name) . "." . $file_extension;
    $target_file = $target_dir . $new_file_name;

    if (move_uploaded_file($file_tmp, $target_file)) {
        echo "Tệp $file_name đã được tải lên thành công.";
    } else {
        echo "Có lỗi xảy ra khi tải lên tệp.";
    }
}


$files = glob($target_dir . "*");

echo "<h2>Thông tin chi tiết của các tập tin đã tải lên:</h2>";
echo "<table border='1'>";
echo "<tr><th><a href='upload.php?sort=name'>Tên tập tin</a></th><th><a href='upload.php?sort=date'>Ngày tải lên</a></th><th>Loại</th><th>Kích thước</th><th>Xoá</th></tr>";


if (isset($_GET['sort']) && $_GET['sort'] == 'date') {
    usort($files, function($a, $b) {
        return filemtime($b) - filemtime($a);
    });
} elseif (isset($_GET['sort']) && $_GET['sort'] == 'name') {
    usort($files, function($a, $b) {
        return strcmp(basename($a), basename($b));
    });
}


foreach ($files as $file) {
    echo "<tr>";
    echo "<td>" . basename($file) . "</td>"; 
    echo "<td>" . date("Y-m-d H:i:s", filemtime($file)) . "</td>"; 
    echo "<td>" . mime_content_type($file) . "</td>"; 
    echo "<td>" . filesize($file) . " bytes</td>"; 
    echo "<td><a href='delete.php?file=" . urlencode(basename($file)) . "'>Xoá</a></td>"; // Liên kết để xoá tệp
    echo "</tr>";
}
echo "</table>";
?>
