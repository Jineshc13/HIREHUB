<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reset password</title>
</head>
<body>
    <form method="POST">
     <p><?php if(isset($_POST['submit'])){ echo $_SESSION['passmsg'];}?></p>
     <input type="password" name="password" placeholder="new password" required >
     <br><br>
     <input type="password" name="cpassword" placeholder="confirm password" required >
     <br><br>
     <button name="submit">submit</button>
     <br>
     <br>
    </form>


    <?php
    
    include 'connection3.php';
    if(isset($_POST['submit']))
    {
        if(isset($_GET['token'])){
            $token = $_GET['token'];
        }

        $str_pass = $_POST['password'];
        $str_pass1 =$_POST['cpassword'];

       
        $newpassword  = password_hash($str_pass,PASSWORD_BCRYPT);
        $cpassword  = password_hash($str_pass1,PASSWORD_BCRYPT);

        if($str_pass==$str_pass1)
        {
      
            $updatequery = " UPDATE emailphp set password='$newpassword',cpassword='$cpassword' where token='$token' "  ;
            $res = mysqli_query($configure,$updatequery);

            if($res){
                
                $_SESSION['msg']= "your password updated successfully";
                header('location: login1.php');
                
            }else{
                
             $_SESSION['passmsg']= "not updated ";
            }
            
        }else{
            
            
             $_SESSION['passmsg']= "password is not matching";
            
        }

    }



















?>
</body>
</html>