<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them nguoi dung</title>

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
        <form action="index.php?page_layout=themnguoidung" method="post">
            <h1>Thêm người dùng</h1>

            <div>
                <input type="text" name="ten-dang-nhap" placeholder="Tên đăng nhập">
            </div>
            <div>
                <input type="password" name="password" placeholder="Mật khẩu">
            </div>
            <div>
                <input type="text" name="ho-ten" placeholder="Họ tên">
            </div>
            <div>
                <input type="email" name="email" placeholder="Email">
            </div>
            <div>
                <input type="text" name="so-dien-thoai" placeholder="Số điện thoại">
            </div>
            <div>
                <select id="vai-tro" name="vai-tro">
                    <option value="1">Admin</option>
                    <option value="2">Đạo diễn</option>
                    <option value="3">Diễn viên</option>
                    <option value="4">Người dùng</option>
                </select>
            </div>
            <div>
                <input type="datetime" name="ngay-sinh" placeholder="Ngày sinh">
            </div>
            <div class="box">
                <input type="submit" value="Thêm mới">
            </div>


        </form>
    </div>
    <?php
    if (
        !empty($_POST["ten-dang-nhap"]) &&
        !empty($_POST["password"]) &&
        !empty($_POST["ho-ten"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["so-dien-thoai"]) &&
        !empty($_POST["vai-tro"]) &&
        !empty($_POST["ngay-sinh"])
    ) {
        $tenDangNhap = $_POST["ten-dang-nhap"];
        $matKhau = $_POST["password"];
        $hoTen = $_POST["ho-ten"];
        $email = $_POST["email"];
        $soDienThoai = $_POST["so-dien-thoai"];
        $vaiTro = $_POST["vai-tro"];
        $ngaySinh = $_POST["ngay-sinh"];

        $sql = "INSERT INTO `nguoi_dung`(`ten_dang_nhap`, `mat_khau`, `ho_ten`, `email`, `sdt`, `vai_tro_id`, `ngay_sinh`) VALUES ('$tenDangNhap','$matKhau','$hoTen','$email','$soDienThoai','$vaiTro','$ngaySinh')";
        $result = mysqli_query($conn, $sql);
        header('location: index.php?page_layout=nguoidung');

    } else {
        echo "<p class= 'warning'> Vui lòng nhập đầy đủ thông tin ! </p>";
    }


    ?>

</body>

</html>