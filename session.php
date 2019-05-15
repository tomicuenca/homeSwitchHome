<?php 

include('config.php');
session_start();
   
$user_check = $_SESSION['login_user'];
$session_sql = mysqli_query($dbConnect,"select username from admin where username = '$user_check' ");
$row = mysqli_fetch_array($session_sql, MYSQLI_ASSOC);
$login_session = $row['username'];
   
if(!isset($_SESSION['login_user'])){
    header("location:login.php");
    die();
}

?>