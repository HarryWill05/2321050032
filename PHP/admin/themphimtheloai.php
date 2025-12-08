<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them phim</title>

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

        form div {
            width: 65%;
            margin: auto;
        }
    </style>
</head>

<body>
    <?php
    include("connect.php");
    ob_start(); // Bắt đầu lưu vào bộ nhớ đệm
    ?>
    <div class="container">
        <form action="index.php?page_layout=themphimtheloai" method="post">
            <h1>Thêm phim thể loại</h1>

            
            <div>
                
                <select id="phim" name="phim">
                    <?php
                        $sql = "SELECT * FROM phim";
                        $result = mysqli_query($conn, $sql);
                        while ($Phim = mysqli_fetch_assoc($result)) {
            ?>
                    <option value=<?php echo $Phim['id']?>><?php echo $Phim['ten_phim'] ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <div>
                <select id="the-loai" name="the-loai">
                    <?php
                        $sql = "SELECT * FROM `the_loai`";
                        $result = mysqli_query($conn, $sql);
                        while ($TheLoai = mysqli_fetch_assoc($result)) {
            ?>
                    <option value=<?php echo $TheLoai['id']?>><?php echo $TheLoai['ten_the_loai'] ?></option>
                    <?php } ?>
                </select>
            </div>
            
           
            <div class="box">
                <input type="submit" value="Thêm mới">
            </div>


        </form>
    </div>
    <?php
    if (
        !empty($_POST["phim"]) &&
        !empty($_POST["the-loai"])
    ) {
        $phim = $_POST["phim"];
        $theLoai = $_POST["the-loai"];

        $sql = "INSERT INTO `phim_the_loai`(`phim_id`, `the_loai_id`) VALUES ('$phim','$theLoai')";
        $result = mysqli_query($conn, $sql);
        header('location: index.php?page_layout=phimtheloai');
        ob_end_flush(); //Xả bộ nhớ đệm ra để gửi về trình duyệt

    } else {
        echo "<p class= 'warning'> Vui lòng nhập đầy đủ thông tin ! </p>";
    }


    ?>


</body>

</html>