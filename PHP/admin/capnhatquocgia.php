<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cap nhat quoc gia</title>

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
    $quocGia = $_GET["ten_quoc_gia"];
    $sql = "SELECT * FROM `quoc_gia` WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    ?>
    <div class="container">
        <form action="index.php?page_layout=capnhatquocgia&id=<?php echo $id ?>" method="post">
            <h1>Cập nhật quốc gia</h1>
            <div>
                <input type="text" name="ten-quoc-gia" placeholder="Tên quốc gia"
                    value="<?php echo $quocGia ?>">
            </div>
            <div class="box">
                <input type="submit" value="Cập nhật">
            </div>
        </form>
    </div>
    <?php
    if (
        !empty($_POST["ten-quoc-gia"])
    ) {
        $tenQuocGia = $_POST["ten-quoc-gia"];

        $sql = "UPDATE `quoc_gia` SET `ten_quoc_gia`='$tenQuocGia' WHERE id ='$id'";
        $result = mysqli_query($conn, $sql);
        header('location: index.php?page_layout=quocgia');

    } else {
        echo "<p class= 'warning'> Vui lòng nhập đầy đủ thông tin ! </p>";
    }


    ?>

</body>

</html>