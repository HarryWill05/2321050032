<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cap nhat phim</title>

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
    ob_start();
    $id = $_GET["id"];
    $sql = "SELECT * FROM phim_the_loai WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $phimTheLoai = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <form action="index.php?page_layout=capnhatphimtheloai&id=<?php echo $phimTheLoai["id"] ?>" method="post">
            <h1>Cập nhật phim thể loại</h1>
            <div>

                <select id="phim" name="phim">
                    <?php
                    $sql = "SELECT * FROM phim";
                    $result = mysqli_query($conn, $sql);
                    while ($Phim = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value=<?php echo $Phim['id'] ?> <?php echo ($phimTheLoai['phim_id'] == $Phim['id']) ? 'selected' : ''; ?>><?php echo $Phim['ten_phim'] ?></option>
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
                        <option value=<?php echo $TheLoai['id'] ?> <?php echo ($phimTheLoai['the_loai_id'] == $TheLoai['id']) ? 'selected' : ''; ?>><?php echo $TheLoai['ten_the_loai'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="box">
                <input type="submit" value="Cập nhật">
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

        $sql = "UPDATE `phim_the_loai` SET `phim_id`='$phim',`the_loai_id`='$theLoai' WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        header('location: index.php?page_layout=phimtheloai');
        ob_end_flush(); //Xả bộ nhớ đệm ra để gửi về trình duyệt

    } else {
        echo "<p class= 'warning'> Vui lòng nhập đầy đủ thông tin ! </p>";
    }


    ?>

</body>

</html>