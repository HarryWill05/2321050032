<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them quoc gia</title>

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
        <form action="index.php?page_layout=themquocgia" method="post">
            <h1>Thêm quốc gia</h1>

            <div>
                <input type="text" name="ten-quoc-gia" placeholder="Tên quốc gia">
            </div>
            <div class="box">
                <input type="submit" value="Thêm mới">
            </div>

        </form>
    </div>
    <?php
    if (
        !empty($_POST["ten-quoc-gia"])
    ) {
        $tenQuocGia = $_POST["ten-quoc-gia"];

        $sql = "INSERT INTO `quoc_gia`(`ten_quoc_gia`) VALUES ('$tenQuocGia')";
        $result = mysqli_query($conn, $sql);
        header('location: index.php?page_layout=quocgia');

    } else {
        echo "<p class= 'warning'> Vui lòng nhập đầy đủ thông tin ! </p>";
    }


    ?>

</body>

</html>