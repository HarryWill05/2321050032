<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phim</title>
    <style>
        table {
            width: 100%;
        }

        .xoa {
            background-color: red;
        }
    </style>
</head>

<body>
    <h1>Thông tin phim</h1>

    <table border=1>
        <tr>
            <th>Tên phim</th>
            <th>Đạo diễn</th>
            <th>Năm phát hành</th>
            <th>Poster</th>
            <th>Quốc gia</th>
            <th>Số tập</th>
            <th>Trailer</th>
            <th>Mô tả</th>
        </tr>
        <?php
        include("connect.php");
        $sql = "SELECT p.*, nd.ho_ten, qg.ten_quoc_gia FROM `phim` p JOIN nguoi_dung nd ON nd.id = p.dao_dien_id JOIN quoc_gia qg ON qg.id = p.quoc_gia_id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row["ten_phim"] ?></td>
                <td><?php echo $row["ho_ten"] ?></td>
                <td><?php echo $row["nam_phat_hanh"] ?></td>
                <td><?php echo $row["poster"] ?></td>
                <td><?php echo $row["ten_quoc_gia"] ?></td>
                <td><?php echo $row["so_tap"] ?></td>
                <td><?php echo $row["trailer"] ?></td>
                <td><?php echo $row["mo_ta"] ?></td>
                <td>
                    <button>Sửa</button>
                    <a class="xoa" href="index.php?id=<?php echo $row["id"] ?>">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>