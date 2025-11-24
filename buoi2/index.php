<?php
    //cokkie
    #lưu ở phía người dùng
    #dùng cho những thông tin ít quan trọng
    $cookieName = "user";
    $cookieValue = "TheHuy";

    //86400 = 30 ngày
    setcookie($cookieName, $cookieValue, time() + (86400), "/");

    if (isset($_COOKIE[$cookieName])){
        echo "Cokkie tồn tại";
    }else{
        echo "Cokkie ko tồn tại";
    }


    //session 
    #Thông tin đăng nhập, giỏ hàng,...
    session_start();
    $_SESSION["name"] = $_SERVER["Admin 123"];
    echo $_SESSION["name"];
?>