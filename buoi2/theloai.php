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
    <h1>Thông tin thể loại</h1>

    <table border=1>
        <tr>
            <th>Thể loại</th>
            
        </tr>
        <?php 
        include("connect.php");
        $sql = "SELECT * FROM the_loai";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row["ten_the_loai"]?></td>
            
            <td>
                <button>Sửa</button>
                <a class="xoa" href="index.php?id=<?php echo $row["id"] ?>">Xóa</a>
            </td>
        </tr>
        <?php }?>
    </table>
</body>
</html>