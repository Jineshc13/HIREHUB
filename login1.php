
<?php
session_start();
$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login1.css">
    <title>Hire Hub</title>
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <div class="container">
                <h1 class=" logo lg-heading">H-H</h1>
                <ul class="navitems">
                    <li class="navitem"><a href="front-page.html">Home</a></li>
                    <li class="navitem"><a href="./about.html">About US</a></li>
                    <li class="navitem"><a href="./contact.html">Contact Us</a></li>
                </ul>
            </div>
        </nav>
        <div class="heading-content">
            <h1 class="lg-heading text-light text-black">HIRE Hub</h1>
            <p class="text-black">People are hired to give results, not reasons!!</p>
            <a href="signup.php" class="button button-primary md-heading " >Sign Up</a>
            <br><br><br><br>
            <div class="login">
            <p class="unique"><?php include 'connection3.php'; $_SESSION['msg']="HELLO,WELCOME TO HIREHUB"; echo $_SESSION['msg'];?> <p>
            <a href="towork.php" class="towork button button-secondary text-black" >Register to work</a>
            <a href="tohire.php" class="tohire button button-secondary text-black" >Register to hire</a>

            </div>
            
        </div>
        
        
    </header>
    <?php
    echo("<meta http-equiv='refresh' content='300'>");
     echo date('H:i:s Y-m-d');
?>
</body>
</html>
    



 <!--    <?php


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
                if(isset($_POST['rem']))
                {
                    setcookie('email',$email,time()+86400);
                    setcookie('password',$password,time()+86400);
                }
                ?>
                    <script>
                            alert('login successful');
                    </script>
                    <?php
                 
                
            }else
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
</html> -->