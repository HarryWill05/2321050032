<?php
    $id = $_GET["id"];
    include("connect.php");
    $sql = "DELETE FROM nguoi_dung WHERE id = '$id' ";
    $result = mysqli_query($conn, $sql);
    header("location: index.php?page_layout=nguoidung");








?>