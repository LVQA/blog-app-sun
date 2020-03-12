<?php
    session_start();
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'blog-app-sun';
    $cnn = mysqli_connect($host,$username,$password,$database) or die("không thể kết nối");
    mysqli_query($cnn,"SET NAMES 'UTF8'");
?>