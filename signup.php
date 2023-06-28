<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="./signup.css ">
    <script src="https://kit.fontawesome.com/c5dca0dece.js" crossorigin="anonymous"></script>
    <title>Sign Up || HireHub</title>
</head>
<body>
    <section>
        <div class="heading">
            <div class="conatiner">
                <div class="signup">
                    <h2 class="lg-heading">Sign Up</h2><hr>
                    <br><br>
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

                   
                      
                    <br><br><br>
                    <p>--------or Sign in with Email-------</p>
                    <br><br>
                    <label for="username" class="md-heading"><i class="fas fa-user"></i>&nbsp;&nbsp;Username: </label>
                    <input type="text" name="username" id="username" placeholder="&nbsp;&nbsp;HireHub09" required>
                    <br><br>
                    <label for="number" class="md-heading"><i class="fas fa-phone"></i>&nbsp;&nbsp;Mobile No: </label>
                    <input type="number" name="number" id="number" placeholder="&nbsp;&nbsp;Eg-9000000009" required>
                    <br><br>
                   <label for="email" class="md-heading"><i class="far fa-envelope"></i>&nbsp;&nbsp;E-mail ID: </label>
                   <input type="email" name="email" id="email" placeholder="&nbsp;&nbsp;hirehub@gmail.com" required>
                   <br><br>
                   <label for="password" class="md-heading"><i class="fas fa-user-lock"></i>&nbsp;&nbsp;Password: </label>
                   <input type="password" name="password" id="password" placeholder="&nbsp;&nbsp;Min. 8 characters" required>
                   <br><br>
                   <label for="cpassword" class="md-heading">&nbsp;&nbsp;Confirm Password: </label>
                   <input type="password" name="cpassword" id="confirm" placeholder="&nbsp;&nbsp;Min. 8 characters" required>
                   <br><br>
                   <br><br>
                   <input type="submit" name="submit" class="submit md-heading" value="Create Account">
                    </form>
                    
                   </div>
        
            </div> 
        </div>
    </section>

    <?php
    
   include 'connection3.php';
    if(isset($_POST['submit']))
    {
       
        $username =$_POST['username'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $str_pass = $_POST['password'];
        $str_pass1 =$_POST['cpassword'];

       
        $password  = password_hash($str_pass,PASSWORD_BCRYPT);
        $cpassword  = password_hash($str_pass1,PASSWORD_BCRYPT);

        $token = bin2hex(random_bytes(15));
    
        $emailquery = " SELECT * FROM emailphp WHERE email='$email' ";
        $query= mysqli_query($configure,$emailquery);
        $emailcount = mysqli_num_rows($query);
        
                  
                
        if($emailcount>0)
        {
            echo "email already exists";

        }else
        {
            if($str_pass==$str_pass1)
            {
          
                $insertquery = " insert into emailphp(username,email,password,cpassword,token,status) values('$username','$email','$password','$cpassword','$token','inactive')" ;
                $res = mysqli_query($configure,$insertquery);

                if($res)
                {
                    /* $email_search = " SELECT * from signup where email='$email1' " ;
                    $query = mysqli_query($configure,$email_search);
                    $emailfetch = mysqli_fetch_assoc($query);
                    $emailid = $emailfetch['email']; */
    
           /*          $user_search = " SELECT * from signup " ;
                    $query = mysqli_query($configure,$user_search);
                    $userfetch = mysqli_fetch_assoc($query);
                    $user = $userfetch['username']; */
    
                    $to_email = $email ;
                    $subject = "EMAIL ACTIVATION";
                    $body = "Hi $username, Click here to activate your account http://localhost/jinesh/SIGNUP/active.php?token=$token";
                    $headers = "From: jineshchudasma0@gmail.com";
    
                    
    
                    if (mail($to_email, $subject, $body, $headers)) {
                        $_SESSION['msg'] = 'check your mail to activate your account !!' ;
                        header('location: login1.php');
                    } else {
                        echo "Email sending failed...";
                    }

    
                }

            }
            else
            {
                ?>
                <script>
                    alert('password not matching');
                    </script>
                    <?php
            }

        }
    
    }

   ?>

       



</body>
</html>

<!-- $login_button = '<a href="'.$google_client->createAuthUrl().'" class="button button-primary small-heading" ><i class="fab fa-google"></i>&nbsp;&nbsp;sign in with Google</a>'; -->