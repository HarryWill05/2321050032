<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quoc gia</title>
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
        <h1>Thông tin quốc gia</h1>
        <div>
            <a class="btn them" href="index.php?page_layout=themquocgia">Thêm quốc gia</a>
        </div>
    </div>

    <table border=1>
        <tr>
            <th>Thể loại</th>
            
        </tr>
        <?php 
        include("connect.php");
        $sql = "SELECT * FROM quoc_gia";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row["ten_quoc_gia"]?></td>
            
            <td class="chuc-nang">
                    <a class="btn sua" href="index.php?page_layout=capnhatquocgia&id=<?php echo $row["id"] ?>&ten_quoc_gia=<?php echo $row["ten_quoc_gia"] ?>">Cập nhật</a>
                    <a class="btn xoa" href="xoaquocgia.php?id=<?php echo $row["id"] ?>">Xóa</a>
            </td>
        </tr>
        <?php }?>
    </table>
</body>
</html>