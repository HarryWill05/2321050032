<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nguoi Dung</title>
    <style>
        table{
            width: 100%;
        }

        .xoa{
            background-color: red;
        }

    </style>
</head>
<body>
    <h1>Thông tin người dùng</h1>

    <table border=1>
        <tr>
            <th>Tên đăng nhập</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Vai trò</th>
            <th>Ngày sinh</th>
        </tr>
        <?php 
        include("connect.php");
        $sql = "SELECT nd.*, vt.ten_vai_tro FROM `nguoi_dung` nd JOIN vai_tro vt on nd.vai_tro_id = vt.id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row["ten_dang_nhap"]?></td>
            <td><?php echo $row["ho_ten"]?></td>
            <td><?php echo $row["email"]?></td>
            <td><?php echo $row["sdt"]?></td>
            <td><?php echo $row["ten_vai_tro"]?></td>
            <td><?php echo $row["ngay_sinh"]?></td>
            <td>
                <button>Sửa</button>
                <a class="xoa" href="xoanguoidung.php?id=<?php echo $row["id"] ?>">Xóa</a>
            </td>
        </tr>
        <?php }?>
    </table>
</body>
</html>