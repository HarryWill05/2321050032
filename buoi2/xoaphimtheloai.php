<?php
    include "connect.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM phim_the_loai WHERE id = $id";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("location: index.php?page_layout=phimtheloai");
?>