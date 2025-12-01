<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nguoi Dung</title>
    <style>
        table {
            width: 100%;
        }

        .xoa {
            background-color: red;
            padding: 0 10px;
            color: #fff;
        }

        td {
            padding: 10px;
        }

        .chuc-nang {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .sua {
            color: black;

        }

        .btn {
            border-radius: 3px;
            border: 1px solid gray;
            padding: 5px;
        }

        .them {
            color: black;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1>Thông tin người dùng</h1>
        <div>
            <a class="btn them" href="index.php?page_layout=themnguoidung">Thêm người dùng</a>
        </div>
    </div>

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
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row["ten_dang_nhap"] ?></td>
                <td><?php echo $row["ho_ten"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td><?php echo $row["sdt"] ?></td>
                <td><?php echo $row["ten_vai_tro"] ?></td>
                <td><?php echo $row["ngay_sinh"] ?></td>
                <td class="chuc-nang">
                    <a class="btn sua" href="index.php?page_layout=capnhatnguoidung&id=<?php echo $row["id"] ?>">Cập nhật</a>
                    <a class="btn xoa" href="xoanguoidung.php?id=<?php echo $row["id"] ?>">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>