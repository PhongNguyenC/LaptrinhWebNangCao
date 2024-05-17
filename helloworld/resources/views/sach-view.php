<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sách</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Danh sách sách</h2>
    <table>
        <thead>
            <tr>
                <th>Mã sách</th>
                <th>Tên sách</th>
                <th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        require_once '../../app/Http/Controllers/sach-controller.php';

        // Kiểm tra nếu $sachList có tồn tại và không rỗng
        if (isset($sachList) && !empty($sachList)):
            foreach ($sachList as $sach):
        ?>
            <tr>
                <td><?php echo htmlspecialchars($sach['MaSach']); ?></td>
                <td><?php echo htmlspecialchars($sach['TenSach']); ?></td>
                <td><?php echo htmlspecialchars($sach['SoLuong']); ?></td>
            </tr>
        <?php 
            endforeach; 
        else:
        ?>
            <tr>
                <td colspan="3">Không có dữ liệu sách</td>
            </tr>
        <?php endif; ?>
