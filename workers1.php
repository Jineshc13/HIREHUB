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
    <style>
a {
  color: white;
}
</style>
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
  
     $rand2 = $_SESSION['ids'];
     $query2 = "SELECT *  FROM tohire where id='$rand2' " ;
     $query_run2 = mysqli_query($configure,$query2);


    if(mysqli_num_rows($query_run2) > 0){

    foreach($query_run2 as $items ) {
        $_SESSION['iid'] = $items['id'];
        $_SESSION['hid'] = $items['id'];
        ?>
    <div class="sidebar">
    <h2>My Account</h2>
    <ul>
        <label for="pic" class="md-heading"><i class="fas fa-portrait"></i>&nbsp;&nbsp;Profile Photo:</label>
        <div class="profile-img">
            <img src="<?= $items['photo'] ?>" alt="Profile Picture" alt="profilepic" width="100px">
        </div>
        <hr>
        
      
        <li><a href="#"><i class="fas fa-sort-alpha-down"></i><?= $items['name'] ?></i></a></li>
        <li><a href="#"><i class="fas fa-phone"></i><?= $items['number'] ?></i></a></li>
        <li><a href="#"><i class="far fa-envelope"></i><?= $items['email'] ?></i></a></li>
        <li><a href="#"><i class="fas fa-house-user"></i><?= $items['address'] ?></i></a></li>
     
        <form action="edithirer.php">
            <button name="esubmit" type="submit" class=" submit1 md-heading" ><i class="fas fa-user-edit"></i> Edit</button>
        </form>
        <form action="logout1.php">
            <button  name="lsubmit" type="submit" class=" submit1 md-heading" ><i class="fas fa-user-edit"></i> Logout</button>
        </form>
        
       
       
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
    $query3 = "SELECT *  FROM towork WHERE CONCAT(jobtype) LIKE '%$filtervalues%'  " ;
   
    $query_run3 = mysqli_query($configure,$query3);

    if(mysqli_num_rows($query_run3)  > 0){

     foreach($query_run3 as $result ){
       
         ?>
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
                            <!--  <button name="hsubmit" type="submit" class=" submit md-heading" >HIRE</button>  -->
                            <button class=" submit md-heading">
                              <a href="updatess.php?id=<?php echo $result['id'];?>">HIRE</a> 
                            </button>
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
 
 $query4 = "SELECT *  FROM towork " ;

 $query_run4 = mysqli_query($configure,$query4);

 if(mysqli_num_rows($query_run4)  > 0){

  foreach($query_run4 as $result ){?>
      
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
                            <!--  <button name="hsubmit" type="submit" class=" submit md-heading" >HIRE</button>  -->
                            <button class=" submit md-heading">
                              <a href="updatess.php?id=<?php echo $result['id'];?>">HIRE</a> 
                           </button>
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