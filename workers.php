<?php

session_start();

?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="workers.css">
    <script src="https://kit.fontawesome.com/c5dca0dece.js" crossorigin="anonymous"></script>
    <title>H-H || Hirer-Mainpage</title>
</head>
<body>
     <header class="header">
        <nav class="navbar">
            <div class="container">
                <h1 class=" logo lg-heading">H-H</h1>
                
                 <ul class="navitems"> 
                     <li class="navitem"><a href="front-page.html">Home</a></li> 
                    <input type="checkbox" id="check">
                    <label for="check">
                        <i class="fas fa-bars" id="btn"></i>
                        <i class="fas fa-times" id="cancel"></i>
                    </label>
                  

                    <?php
    include 'connection3.php';
 


$ran1 = $_SESSION['ran1'] ; 
    $query = "SELECT *  FROM tohire where ran='$ran1' " ;
    $query_run = mysqli_query($configure,$query);

  
if(mysqli_num_rows($query_run) > 0){

    foreach($query_run as $items ){
        $_SESSION['iid'] = $items['id'];
        ?>

<div class="sidebar">
    <h2>My Account</h2>
    <ul>
        <label for="pic" class="md-heading"><i class="fas fa-portrait"></i>&nbsp;&nbsp;Profile Photo:</label>
        <div class="profile-img">
            <img src="<?= $items['photo'] ?>" alt="Profile Picture" alt="profilepic" width="100px">
        </div>
        <hr>
        
       <!--<input name="photo" class="file-upload" id="file" type="file" > <br><br> <hr>-->
        <li><a href="#"><i class="fas fa-sort-alpha-down"></i><?= $items['name'] ?></i></a></li>
        <li><a href="#"><i class="fas fa-phone"></i><?= $items['number'] ?></i></a></li>
        <li><a href="#"><i class="far fa-envelope"></i><?= $items['email'] ?></i></a></li>
        <li><a href="#"><i class="fas fa-house-user"></i><?= $items['address'] ?></i></a></li>
        <!--<li><a href="#"><i class="fas fa-qrcode">Dashboard</i></a></li>
        <li><a href="#"><i class="fas fa-qrcode">Dashboard</i></a></li>
        <li><a href="#"><i class="fas fa-qrcode">Dashboard</i></a></li>-->
        <form action="edithirer.php">
            <button name="esubmit" type="submit" class=" submit1 md-heading" ><i class="fas fa-user-edit"></i> Edit</button>
        </form>
        <form action="logout1.php">
            <button  name="lsubmit" type="submit" class=" submit1 md-heading" ><i class="fas fa-user-edit"></i> Logout</button>
        </form>
        
        <!--<i class="fas fa-user-edit"></i><input name="submit" type="submit" class=" submit md-heading"  value="Edit">-->
        
    </ul>
</div>

</ul>
            </div>
        </nav>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" >
                <div class="container2">
                <div class="search">
            <input name="search" type="text" class="search2" value="<?php if(isset($_POST['search'])){echo $_POST['search'];}  ?>" placeholder="search here..">
            <button  type="submit" class="button button-secondary"> <i class="fas fa-search"></i></button> 
        </div> 
</div> 
                    
                  
             </form>


<?php
   
if(isset($_POST['search'])){
    $filtervalues = $_POST['search'];
    $query8 = "SELECT *  FROM towork WHERE CONCAT(jobtype) LIKE '%$filtervalues%'  " ;
   
    $query_run8 = mysqli_query($configure,$query8);

  

    
    if(mysqli_num_rows($query_run8) > 0){

     foreach($query_run8 as $result ){?>
         <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" >
             <div class="container2">
                     <div class="profiles">
         <div class="profile1">
             <div class="profile-card">
                 <div class="image-container">
                     <img src="<?= $result['photo'] ?>" alt="Profile Picture" width="100%" >
                     <div class="title">
                         <h2><?= $result['jobtype'] ?></h2>
                         <br><br><br><br>
                         &nbsp;&nbsp;
                         &nbsp;&nbsp;
                         &nbsp;&nbsp;
                         <form action="#">
                            <!--  <button name="hsubmit" type="submit" class=" submit md-heading" >HIRE</button> -->
                             <a href="updatess1.php?id=<?php echo $result['id'];?>">HIRE</a>
                         </form>
                        
                     </div>
                 </div>
 
                 <div class="main-container">
                     <p><i class="fas fa-sort-alpha-down info"></i><?= $result['uname'] ?></p>
                     <p><i class="fas fa-house-user info"></i><?= $result['address'] ?></p>
                     <p><i class="fas fa-phone info"></i> <?= $result['number'] ?></p>
                     <p><i class="far fa-envelope info"></i><?= $result['email'] ?></p>
                     <p><i class="fas fa-briefcase info"></i><?= $result['jobtype'] ?></p>
                     <hr>
 
                     <p><i class="fas fa-asterisk info"></i></p>
                     <p><?= $result['worke'] ?></p>
                     <p>"<?= $result['bio'] ?>"</p>
                 </div>
             </div>
             </div>
                     </div>
                     <br><br>
    <?php
     }
    }
    else{
     ?>

     <script>
         alert('no data found');
         </script>
         <?php
    }
}else{
 
 $query9 = "SELECT *  FROM towork " ;

 $query_run9 = mysqli_query($configure,$query9);


 
 

 
 if(mysqli_num_rows($query_run9) > 0){

  foreach($query_run9 as $result ){?>


      
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" >
             <div class="container2">
                  <div class="profiles">
      <div class="profile2">
          <div class="profile-card">
              <div class="image-container">
                  <img src="<?= $result['photo'] ?>" alt="Profile Picture" width="100%" >
                  <div class="title">
                      <h2><?= $result['jobtype'] ?></h2>
                      <br><br><br><br>
                      &nbsp;&nbsp;
                      &nbsp;&nbsp;
                      &nbsp;&nbsp;
                      <form action="#">
                         <!-- <button name="hsubmit" type="submit" class=" submit md-heading" >HIRE</button> -->
                         <a href="updatess1.php?id=<?php echo $result['id'];?>">HIRE</a>
                      </form>
                      
                  </div>
              </div>

              <div class="main-container">
                  <p><i class="fas fa-sort-alpha-down info"></i><?= $result['uname'] ?></p>
                  <p><i class="fas fa-house-user info"></i><?= $result['address'] ?></p>
                  <p><i class="fas fa-phone info"></i> <?= $result['number'] ?></p>
                  <p><i class="far fa-envelope info"></i><?= $result['email'] ?></p>
                  <p><i class="fas fa-briefcase info"></i><?= $result['jobtype'] ?></p>
                  <hr>

                  <p><i class="fas fa-asterisk info"></i></p>
                  <p><?= $result['worke'] ?></p>
                  <p>"<?= $result['bio'] ?>"</p>
              </div>
          </div>
      </div>
    
 <?php
  }
}
}
}
}

?>
                
           

            
            
    
    
   







</header>
</body>
</html>