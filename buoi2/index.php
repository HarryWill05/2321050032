<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        a {
            text-decoration: none;
            color: white;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            margin: 0;
            padding: 0;
            
        }

        ul {
            list-style: none;
            display: flex;
            gap: 30px;
            padding: 0 40px;
        }

        header nav {
            display: flex;
            justify-content: space-between;
        }

        header {
            background-color: crimson;
            padding: 0;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
        }
        main{
            width: 95%;
            margin: 50px auto;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header("location: login.php");
    }
    ?>
    <header>
        <nav>
            <ul>
                <li><a href="index.php?page_layout=trangchu">Trang chủ</a></li>
                <li><a href="index.php?page_layout=phim">Phim</a></li>
                <li><a href="index.php?page_layout=theloai">Thể loại</a></li>
                <li><a href="index.php?page_layout=quocgia">Quốc gia</a></li>
                <li><a href="index.php?page_layout=nguoidung">Người dùng</a></li>
            </ul>
            <ul>
                <li><?php echo "Xin chào " . $_SESSION["username"]; ?></li>
                <li><a href="index.php?page_layout=dangxuat">Đăng xuất</a></li>
            </ul>
        </nav>
        

    </header>
    <main>
        
        <?php
        if (isset($_GET['page_layout'])) {
            switch ($_GET['page_layout']) {
                case 'trangchu':
                    include "trangchu.php";
                    break;
                case 'phim':
                    include "phim.php";
                    break;
                case 'theloai':
                    include "theloai.php";
                    break;
                case 'quocgia':
                    include "quocgia.php";
                    break;
                case 'nguoidung':
                    include "nguoidung.php";
                    break;
                case 'dangxuat':
                    break;
            }
        }


        ?>
    </main>
</body>

</html>