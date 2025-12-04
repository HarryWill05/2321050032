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

        form div{
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
    $sql = "SELECT * FROM phim WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $phim = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <form action="index.php?page_layout=capnhatphim&id=<?php echo $phim["id"] ?>" method="post">
            <h1>Cập nhật phim</h1>
            <div>
                <input type="text" name="ten-phim" placeholder="Tên phim" value="<?php echo $phim['ten_phim'] ?>">
            </div>
            <div>
                
                <select id="dao-dien" name="dao-dien">
                    <?php
                        $sql = "SELECT nd.*, vt.ten_vai_tro FROM `nguoi_dung` nd JOIN vai_tro vt on nd.vai_tro_id = vt.id WHERE vt.id = 2";
                        $result = mysqli_query($conn, $sql);
                        while ($daoDien = mysqli_fetch_assoc($result)) {
            ?>
                    <option value=<?php echo $daoDien['id']?> <?php echo ($phim['dao_dien_id'] == $daoDien['id']) ? 'selected' : ''; ?>><?php echo $daoDien['ho_ten'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <input type="number" name="nam-phat-hanh" placeholder="Năm phát hành" value="<?php echo $phim['nam_phat_hanh'] ?>">
            </div>
            <div>
                <input type="text" name="poster" placeholder="Poster" value="<?php echo $phim['poster'] ?>">
            </div>
            <div>
                
                <select id="quoc-gia" name="quoc-gia">
                    <?php
                        $sql = "SELECT * FROM `quoc_gia`";
                        $result = mysqli_query($conn, $sql);
                        while ($quocGia = mysqli_fetch_assoc($result)) {
            ?>
                    <option value=<?php echo $quocGia['id']?> <?php echo ($phim['quoc_gia_id'] == $quocGia['id']) ? 'selected' : ''; ?>><?php echo $quocGia['ten_quoc_gia'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <input type="number" name="so-tap" placeholder="Số tập" value="<?php echo $phim['so_tap'] ?>">
            </div>
            <div>
                <input type="text" name="trailer" placeholder="Trailer" value="<?php echo $phim['trailer'] ?>">
            </div>
            <div>
                <input type="text" name="mo-ta" placeholder="Mô tả" value="<?php echo $phim['mo_ta'] ?>">
            </div>
            <div class="box">
                <input type="submit" value="Cập nhật">
            </div>
        </form>
    </div>
    <?php
    if (
        !empty($_POST["ten-phim"]) &&
        !empty($_POST["dao-dien"]) &&
        !empty($_POST["nam-phat-hanh"]) &&
        !empty($_POST["poster"]) &&
        !empty($_POST["quoc-gia"]) &&
        !empty($_POST["so-tap"]) &&
        !empty($_POST["trailer"]) &&
        !empty($_POST["mo-ta"])
    ) {
        $tenPhim = $_POST["ten-phim"];
        $daoDien = $_POST["dao-dien"];
        $namPhatHanh = $_POST["nam-phat-hanh"];
        $poster = $_POST["poster"];
        $quocGia = $_POST["quoc-gia"];
        $soTap = $_POST["so-tap"];
        $trailer = $_POST["trailer"];
        $moTa = $_POST["mo-ta"];

        $sql = "UPDATE `phim` SET `ten_phim`='$tenPhim',`dao_dien_id`='$daoDien',`nam_phat_hanh`='$namPhatHanh',`poster`='$poster',`quoc_gia_id`='$quocGia',`so_tap`='$soTap',`trailer`='$trailer',`mo_ta`='$moTa' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        header('location: index.php?page_layout=phim');
        ob_end_flush();
    } else {
        echo "<p class= 'warning'> Vui lòng nhập đầy đủ thông tin ! </p>";
    }


    ?>

</body>

</html>