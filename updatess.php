<?php

session_start();
include 'connection3.php';


$token = bin2hex(random_bytes(15));
$token1 = $token  ;

$ids = $_GET['id'];
$ids1 = $_SESSION['iid'];


$updatequery5 = "UPDATE towork set status='Hired' where id='$ids' ";
$updatequery6 = "UPDATE towork set token='$token1' where id='$ids' ";
$updatequery7 = "UPDATE tohire set token='$token1' where id='$ids1' ";
 
$query5 = mysqli_query($configure,$updatequery5);
$query6 = mysqli_query($configure,$updatequery6);
$query7 = mysqli_query($configure,$updatequery7);


if($query5 && $query6 && $query7){
 // header('location: workers1.php');   
 ?>
 <script>

     alert('You Hired a Worker'); 
      window.location = "workers1.php";
    </script>
     <?php
}

 
?>