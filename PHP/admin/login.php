<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buổi 2</title>

    <style>
        .custom-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #ff4444;
            color: white;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            font-size: 16px;
            font-weight: 500;
            z-index: 9999;


            display: flex;
            align-items: center;


            animation: slideIn 0.5s ease-in-out;
            transition: opacity 0.5s ease;
        }


        .custom-alert::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 5px;
            background-color: rgba(255, 255, 255, 0.4);
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }

        @keyframes slideIn {
            from {
                transform: translateX(120%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        input {
            border: 1px solid #bfbfbf;
            padding: 20px;
            border-radius: 15px;
            margin: 15px 0;
        }

        input[type="submit"] {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="box">
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
    </div>

    <?php
    include("connect.php");
    if (isset($_POST['username']) && isset($_POST['password'])) {


        $tenDangNhap = $_POST['username'];
        $matKhau = $_POST['password'];


        $sql = "select * from nguoi_dung where ten_dang_nhap = '$tenDangNhap' and mat_khau = '$matKhau'";

        $result = mysqli_query($conn, $sql);


        if (mysqli_num_rows($result) > 0) {
            session_start();
            $_SESSION["username"] = $tenDangNhap;

            header('location: index.php');

        } else {
            echo "
                <div class='custom-alert' id='errorAlert'>
                    Sai thông tin đăng nhập!
                </div>
                
                <script>
                    // Tự động ẩn thông báo sau 3 giây
                    setTimeout(function() {
                        var alertBox = document.getElementById('errorAlert');
                        if(alertBox) {
                            // Bước 1: Làm mờ dần
                            alertBox.style.opacity = '0';
                            
                            // Bước 2: Ẩn hẳn sau khi đã mờ (500ms sau)
                            setTimeout(function(){
                                alertBox.style.display = 'none';
                            }, 500);
                        }
                    }, 3000); 
                </script>
            ";
        }
    }
    ?>


</body>

</html>