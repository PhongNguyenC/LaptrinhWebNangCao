<?php
// Kết nối đến CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";


$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Truy vấn dữ liệu từ bảng SinhVien, MonHoc và DangKy sử dụng INNER JOIN
$sql = "SELECT SinhVien.MSSV, SinhVien.HoTen, MonHoc.MaMH, MonHoc.TenMH, DangKy.Ky
        FROM SinhVien
        INNER JOIN DangKy ON SinhVien.MSSV = DangKy.MSSV
        INNER JOIN MonHoc ON MonHoc.MaMH = DangKy.MaMH";

$result = $conn->query($sql);

// Đóng kết nối
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Giao diện PHP</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h1>Tìm sách</h1>
        <form action="TH1.php" Method="GET" >
            Từ khóa : <input type="text" name="txtTukhoa"/>
            <input type="submit" value="Tìm"/>
        </form>
        <?php
            $sTukhoa = $_REQUEST["txtTukhoa"];
            if (isset($sTukhoa))
            {
                print "Từ khóa tìm sách là : $sTukhoa";
                echo "<br>Kết quả tìm là : ";
                $sach = array(
                    array("id" => 1, "ten" => "None", "mo_ta" => "Phong"),
                    array("id" => 2, "ten" => "None", "mo_ta" => "21011415"),
                    array("id" => 3, "ten" => "No None", "mo_ta" => "Mô tả")
                );
                $ketqua = array_filter($sach, function($item) use ($sTukhoa) {
                    return strpos(strtolower($item['ten']), strtolower($sTukhoa)) !== false;
                });
                echo "<ul>";
                foreach ($ketqua as $s) {
                    echo "<li>{$s['ten']}: {$s['mo_ta']}</li>";
                }
                echo "</ul>";
            }
        ?>
    <table>
        <tr>
            <th>MSSV</th>
            <th>Họ và tên</th>
            <th>Mã môn học</th>
            <th>Tên môn học</th>
            <th>Kỳ</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['MSSV']; ?></td>
                <td><?php echo $row['HoTen']; ?></td>
                <td><?php echo $row['MaMH']; ?></td>
                <td><?php echo $row['TenMH']; ?></td>
                <td><?php echo $row['Ky']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
        <a href="login.htm" style="margin: 15px;">
            <input type="submit" value="Đăng xuất">
        </a>
    
</body>
</html>