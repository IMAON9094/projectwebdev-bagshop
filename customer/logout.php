<?php
    session_start();
    /*if(empty($_SESSION['username'])){
        header("location:login.php");
    }*/
    $cookie_username_logout=$_SESSION["username"];
    setcookie($cookie_username_logout,"",time()-3600);
    session_destroy();
    header("location:login.php");
?>