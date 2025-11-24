<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buổi 2</title>

    <style>
        .warning {
            color: red;
        }
    </style>
</head>

<body>

    <form action="login.php" method="post">
        <h1>Đăng nhập</h1>
        <div>
            <input type="text" name="username" placeholder="Tên đăng nhập">
        </div>
        <div>
            <input type="password" name="password" placeholder="Mật khẩu">
        </div>
        <div>
            <input type="submit" value="Đăng Nhập">
        </div>
    </form>
    <?php
    if (isset($_POST['username']) && isset($_POST['password'])) {


        $tenDangNhap = $_POST['username'];
        $matKhau = $_POST['password'];


        if ($tenDangNhap === 'admin' && $matKhau === '123') {
            session_start();
            $_SESSION["username"] = $tenDangNhap;

            header('Location: trangChu.php');

        } else {
            echo "<p class='warning'>Sai thông tin đăng nhập</p>";
        }
    }
    ?>


</body>

</html>