<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cap nhat the loai</title>

    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .warning {
            color: red;
            display: flex;
            justify-content: center;
        }

        form div{
            width: 65%;
            margin: auto;
        }
    </style>
</head>

<body>
    <?php
    include("connect.php");
    $id = $_GET["id"];
    $theLoai = $_GET["ten_the_loai"];
    $sql = "SELECT * FROM `the_loai` WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    ?>
    <div class="container">
        <form action="index.php?page_layout=capnhattheloai&id=<?php echo $id ?>" method="post">
            <h1>Cập nhật thể loại</h1>
            <div>
                <input type="text" name="ten-the-loai" placeholder="Tên thể loại"
                    value="<?php echo $theLoai ?>">
            </div>
            <div class="box">
                <input type="submit" value="Cập nhật">
            </div>
        </form>
    </div>
    <?php
    if (
        !empty($_POST["ten-the-loai"])
    ) {
        $tenTheLoai = $_POST["ten-the-loai"];

        $sql = "UPDATE `the_loai` SET `ten_the_loai`='$tenTheLoai' WHERE id ='$id'";
        $result = mysqli_query($conn, $sql);
        header('location: index.php?page_layout=theloai');

    } else {
        echo "<p class= 'warning'> Vui lòng nhập đầy đủ thông tin ! </p>";
    }


    ?>

</body>

</html>