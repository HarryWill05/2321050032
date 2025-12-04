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
        <h1>Thông tin phim</h1>
        <div>
            <a class="btn them" href="index.php?page_layout=themphim">Thêm phim</a>
        </div>
    </div>

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
                <td class="chuc-nang">
                    <a class="btn sua" href="index.php?page_layout=capnhatphim&id=<?php echo $row["id"] ?>">Cập nhật</a>
                    <a class="btn xoa" href="xoaphim.php?id=<?php echo $row["id"] ?>">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>