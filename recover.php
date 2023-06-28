<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recover account</title>
</head>
<body>
    <h1>Recover account</h1><br>
    <p>fill the data correctly</p>

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

    <input type="email" name="email" placeholder="enter your email">
<br><br>
    <input type="submit" name="done" value="send mail" >

    </form>

    <?php
    include 'connection3.php';

    if(isset($_POST['done'])){
        $email = $_POST['email'];

        
        $emailquery = " SELECT * FROM emailphp WHERE email='$email' ";
        $query= mysqli_query($configure,$emailquery);
        $emailcount = mysqli_num_rows($query);
        
                  
                
        if($emailcount)
        {
                    $user_search = " SELECT * from emailphp WHERE email='$email'" ;
                    $query = mysqli_query($configure,$user_search);
                    $userfetch = mysqli_fetch_assoc($query);
                    $username = $userfetch['username'];
                    $token = $userfetch['token'];

                    $to_email = $email ;
                    $subject = "PASSWORD RESEST";
                    $body = "Hi $username, Click here to reset your account password http://localhost/jinesh/SIGNUP/reset.php?token=$token";
                    $headers = "From: jineshchudasma0@gmail.com";
    
                    
    
                    if (mail($to_email, $subject, $body, $headers)) {
                        
                        
                        $_SESSION['msg']= "check your mail to reset your password";
                        header('location: login1.php');
                    } 
                    else {
                        echo 'retry';
                    }
    }else{
        echo "No email found";
    }


    }















?>
</body>
</html>