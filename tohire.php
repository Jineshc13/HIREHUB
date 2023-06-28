<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <script src="https://kit.fontawesome.com/c5dca0dece.js" crossorigin="anonymous"></script>
    <title>Register to Hire</title>
</head>
<body>
    <section>
        <div class="heading">
            <div class="conatiner">
               <!---- <div class="signup">-->
                    <h2 class="lg-heading">register to hire</h2><hr>
                    <br><br>
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                        <label for="email" class="md-heading"><i class="far fa-envelope"></i>&nbsp;&nbsp;E-mail ID: </label>
                        <input type="email" name="email" id="email" placeholder="&nbsp;&nbsp;hirehub@gmail.com" value="<?php if(isset($_COOKIE['email'])) {echo $_COOKIE['email'];}?>" required>
                        <br><br>
                        <label for="password" class="md-heading"><i class="fas fa-user-lock"></i>&nbsp;&nbsp;Password: </label>
                        <input type="password" name="password" id="password" placeholder="&nbsp;&nbsp;Min. 8 characters" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>" required>
                        <br><br><br>
                        <input name="rem" type="checkbox" id="remember">
                         <!--<label for="remember">Remember Me</label>-->
                         <span class="small-heading" ><b>&nbsp;&nbsp;Remember Me</b></span>
                       <!---- <input type="radio" id="remember">
                        <span class="small-heading" id="remember">Remember Me</span>-->
                       <!--  <span  class="small-heading" name="rem" id="remember">Remember Me</span>  -->
                        
                        <br><br><br>
                        <a href="recover.php" class=" forgot">Forgot Password?</a>
                        <br><br>
                        <br><br>
                        <input type="submit" name="submit" class="submit md-heading" value="Register">
                        
                    </form>
                  
                   <!--</div>-->
        
            </div> 
        </div>
    </section>

    <?php

    include 'connection3.php';

    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $email_search = " SELECT * from emailphp where email='$email' and status='active'  " ;
        $query = mysqli_query($configure,$email_search);
        $emailcount = mysqli_num_rows($query);
        

        if($emailcount)
        {
            $pass = mysqli_fetch_assoc($query); 
            $dbpass = $pass['password'];
            $pass_decode = password_verify($password,$dbpass);

            if($pass_decode)
        {
                
             $email_search = " SELECT * from tohire where email='$email' " ;
             $query1 = mysqli_query($configure,$email_search);
             $emailcount1 = mysqli_num_rows($query1);
        
            


             if($emailcount1)
            {

                if(isset($_POST['rem']))
                 {
                     setcookie('email',$email);
                     setcookie('password',$password);
                     
                 }

                    foreach($query1 as $items ){
                        $ids = $items['id'];
                        $_SESSION['ids'] = $ids ;
                    }
                
             ?>
                    <script>
                            alert('login successful');
                    </script>
                    <?php
                 header('location: workers1.php');

                 
             }
             else
             {
                header('location: formtohire.php');
             }
        }  
        else
        {
            ?>
            <script>
                    alert('password incorrect');
            </script>
            <?php
        }
        }
        else
        {
            ?>
            <script>
                    alert('email invalid');
                </script>
        <?php
        }
    }

    ?>



</body>
</html>