<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them the loai</title>

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
    ?>
    <div class="container">
        <form action="index.php?page_layout=themtheloai" method="post">
            <h1>Thêm thể loại</h1>

            <div>
                <input type="text" name="ten-the-loai" placeholder="Tên thể loại">
            </div>
            <div class="box">
                <input type="submit" value="Thêm mới">
            </div>

        </form>
    </div>
    <?php
    if (
        !empty($_POST["ten-the-loai"])
    ) {
        $tenTheLoai = $_POST["ten-the-loai"];

        $sql = "INSERT INTO `the_loai`(`ten_the_loai`) VALUES ('$tenTheLoai')";
        $result = mysqli_query($conn, $sql);
        header('location: index.php?page_layout=theloai');

    } else {
        echo "<p class= 'warning'> Vui lòng nhập đầy đủ thông tin ! </p>";
    }


    ?>

</body>

</html>