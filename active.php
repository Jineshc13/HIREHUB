<?php

session_start();

include 'connection3.php';

if(isset($_GET['token'])){

    $token = $_GET['token'];

    $updatequey = "UPDATE emailphp set status='active' where token='$token'";

    $query = mysqli_query($configure,$updatequey);

    if($query){
        if(isset($_SESSION['msg'])){
        $_SESSION['msg']= "account activated, now you can register";
        header('location:login1.php');
           }
    }

}