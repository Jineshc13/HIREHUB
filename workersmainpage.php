<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="workersmainpage.css">
    <script src="https://kit.fontawesome.com/c5dca0dece.js" crossorigin="anonymous"></script>
    <title>H-H | |Workers-Mainpage</title>
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <div class="container">
                <h1 class=" logo lg-heading">H-H</h1>
                <ul class="navitems">
                    <li class="navitem"><a href="front-page.html">Home</a></li>
                    <!--<li class="navitem"><a href="#">&nbsp;&nbsp;My Account</a></li>-->
                    <!--<li class="navitem"><a href="./contact.html">Contact Us</a></li>-->
                    <input type="checkbox" id="check">
                    <label for="check">
                        <i class="fas fa-bars" id="btn"></i>
                        <i class="fas fa-times" id="cancel"></i>
                    </label>

                     <?php
                    include 'connection3.php';

                   

                    $rand1 = $_SESSION['rand1'];
                    $query = "SELECT *  FROM towork where rand='$rand1' " ;
                    $query_run = mysqli_query($configure,$query);

                   
                if(mysqli_num_rows($query_run) > 0) {

                    
                    foreach($query_run as $items){?>


                        <div class="sidebar">
                            <h2>My Account</h2>
                            <ul>
                                <label for="pic" class="md-heading"><i class="fas fa-portrait"></i>&nbsp;&nbsp;Profile Photo:</label>
                                <div class="profile-img">
                                    <img src="<?= $items['photo'] ?>" alt="profilepic" width="100px">
                                </div>
                                <hr>
    
                                <li><a href="#"><i class="fas fa-sort-alpha-down"></i><?= $items['uname'] ?></i></a></li>
                                 <li><a href="#"><i class="fas fa-phone"></i><?= $items['number'] ?></i></a></li>
                                <li><a href="#"><i class="far fa-envelope"></i><?= $items['email'] ?></i></a></li>
                                 <li><a href="#"><i class="fas fa-house-user"></i><?= $items['address'] ?></i></a></li>
    
                                 <form action="editworker.php">
            <button name="esubmit" type="esubmit" class=" submit1 md-heading" ><i class="fas fa-user-edit"></i> Edit</button>
        </form>
        <form action="logout1.php">
            <button  name="lsubmit" type="submit" class=" submit1 md-heading" ><i class="fas fa-user-edit"></i> Logout</button>
        </form>
                            </ul>
                        </div>
                    </ul>
                </div>
            </nav>
                        <?php
            $token1 = $items['token'];
    
    $query4 = "SELECT *  FROM tohire where token='$token1'  " ;
   
    $query_run4 = mysqli_query($configure,$query4);
    
    if(mysqli_num_rows($query_run4) > 0  ){

     foreach($query_run4 as $items ){?>
  <div class="container2">
               
               <br><br><br><br>
              <br><br>
<div class="profiles">
            <p class="msg md-heading">
                <b>
                    Congragulations!!<i class="far fa-handshake"></i>
                    <br> You've been hired by:
                </b>
                
            </p>
               <div class="profile1">
                   <div class="profile-card">
                       <div class="image-container">
                           <img src="<?= $items['photo'] ?>" alt="Profile Picture" width="100%">
                           <div class="title">
                               <h2>HIRER</h2>
                               <br><br><br><br>
                               &nbsp;&nbsp;
                               &nbsp;&nbsp;
                               &nbsp;&nbsp;
                              <!---- <input name="submit" type="submit" class=" submit md-heading" value= "HIRE">-->
                           </div>
                       </div>
       
                       <div class="main-container">
                           <p><i class="fas fa-sort-alpha-down info"></i><?= $items['name'] ?></p>
                           <p><i class="fas fa-house-user info"></i><?= $items['address'] ?></p>
                           <p><i class="fas fa-phone info"></i><?= $items['number'] ?></p>
                           <p><i class="far fa-envelope info"></i><?= $items['email'] ?></p>
                           <br>
                            <!----<p><i class="fas fa-briefcase info"></i>Type of work</p>-->
                           <hr>
       
                           <p><i class="fas fa-asterisk info"></i></p>
                           <p><?= $items['jobtype'] ?></p>
                           <p>"<?= $items['jobd'] ?>"</p>
                       </div>
                   </div>
                   
                   <?php
     }
    }
    else
    {?>
        <p class="msg md-heading">
        <b>
            Wait until you are Hired !!<i class="far fa-handshake"></i>
            <br> 
        </b>
        
    </p>
    </header>
 <?php   }





            
                }
            }
                
                
                
                
                
                
                ?>

           
           
    


   
    
</body>
</html>