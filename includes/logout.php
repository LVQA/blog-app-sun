<?php
include('../database/database.php');
//Xóa token trên database
$email = $_SESSION['email'];
$query = "
    UPDATE users SET token = ''
    WHERE email = '$email'
";
mysqli_query($cnn,$query);
//Xóa dữ liệu session
$_SESSION = array();
//Xóa cokie
if(isset($_COOKIE['session_name()'] )){
    setcookie(session_name(),time()-3600);
}
if(isset($_COOKIE['token'] )){
    setcookie('token',time()-3600);
}

session_destroy();
header('location:../index.php');
?>