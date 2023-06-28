<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formtowork.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <script src="https://kit.fontawesome.com/c5dca0dece.js" crossorigin="anonymous"></script>
    
    <title>Details || To Work</title>
</head>
<body>
    <section>
        <div class="heading">
            <div class="conatiner">
               <!---- <div class="signup"> -->
                    <h2 class="lg-heading">details</h2><hr>
                    <br><br>
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                        <label for="pic" class="md-heading"><i class="fas fa-portrait"></i>&nbsp;&nbsp;Profile Photo:</label>
                        <input name="photo" class="file-upload" id="file" type="file" >
                        <br><br>
                        <br><br>
                       

                        <label for="job" class="md-heading"><i class="fas fa-briefcase"></i>&nbsp;&nbsp;Desired Job Type:</label>
                        <select name="jobtype" autofocus required>
                            <option value="">none</option>
                            <option value="plumber">plumber</option>
                            <option value="carpenter">carpenter</option>
                            <option value="barber">barber</option>
                            <option value="electrician">electrician</option>
                            <option value="mechanic">mechanic</option>
                            <!--<option value="doc">barber</option>-->
                        </select>
                        <br><br>
                        <br><br>

                        <label for="name" class="md-heading"><i class="fas fa-sort-alpha-down"></i>&nbsp;&nbsp;Name:</label>
                        <input name="uname"type="text"id="name" placeholder="&nbsp;&nbsp;HireHub" required>
                        <br><br>
                        <br><br>

                        <label for="address" class="md-heading"><i class="fas fa-house-user"></i>&nbsp;&nbsp;Address:</label>
                        <input name="address" type="text" id="address" placeholder="&nbsp;&nbsp;HireHub"  required>
                        <!--<textarea name="adress" id="" cols="30" rows="10"></textarea>-->
                        <br><br>
                        <br><br>

                        <label for="email" class="md-heading"><i class="far fa-envelope"></i>&nbsp;&nbsp;E-mail ID: </label>
                        <input name="email" type="email" id="email" placeholder="&nbsp;&nbsp;hirehub@gmail.com" required> 
                        <br><br>
                        <br><br>
                        
                        <label for="number" class="md-heading"><i class="fas fa-phone"></i>&nbsp;&nbsp;Mobile No: </label>
                        <input name="number" type="number" id="number" placeholder="&nbsp;&nbsp;Eg-9000000009" required>
                        <br><br>
                        <br><br>

                        <label for="gender" class="md-heading"><i class="fas fa-venus"></i>&nbsp;<i class="fas fa-mars"></i>&nbsp;<i class="fas fa-transgender"></i>&nbsp;&nbsp;Gender:</label>  
                        <input type="radio" name="gender" value="male" id="male">
                        <span class="md-heading" id="male">Male&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input type="radio" name="gender" value="female" id="female">
                        <span class="md-heading" id="male">Female&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input type="radio" name="gender" value="other" id="other">
                        <span class="md-heading" id="male">Other</span>
                        <br><br>
                        <br><br>

                        <label for="experience" class="md-heading"><i class="fas fa-briefcase"></i>&nbsp;&nbsp;Work-Experience:</label>
                        <input name="worke" type="radio" value="beginner" name="experience" id="beginner">
                        <span class="md-heading" id="male">Beginner&nbsp;&nbsp;</span>
                        <input name="worke" type="radio" value="intermediate" name="experience" id="intermediate">
                        <span class="md-heading" id="male">Intermediate&nbsp;&nbsp;</span>
                        <input name="worke" type="radio" value="expert" name="experience" id="expert">
                        <span class="md-heading" id="male">Expert</span>
                        <br><br>
                        <br><br>

                        <label for="name" class="md-heading"><i class="fas fa-sort-alpha-down"></i>&nbsp;&nbsp;Bio:</label>
                        <textarea name="bio" class="bio" placeholder="Type something here..." required></textarea>
                        <br><br>
                        <br><br>

                        <label for="shift" class="md-heading"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Preferred Location:</label>
                        <input name="location" type="text"id="name" placeholder="&nbsp;&nbsp;landmark" required>
                        <br><br>
                        <br><br>


                        <input name="submit" type="submit" class=" submit md-heading" value="Submit">
                        <br><br>
                        <br><br>

                        







                    
                        
                   
                   <!--</div> -->
        
            </div> 
        </div>

        <?php
        
        include 'connection3.php';


        if(isset($_POST['submit'])){
            
            $photo= $_FILES['photo'];
            $jobtype = $_POST['jobtype'];
            $uname = $_POST['uname'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $number = $_POST['number'];
            $gender = $_POST['gender'];
            $worke = $_POST['worke'];
            $bio = $_POST['bio'];
            $location = $_POST['location'];

            $rand = bin2hex(random_bytes(5));

            $email_search = " SELECT * from emailphp where email='$email' and status='active'  " ;
            $query = mysqli_query($configure,$email_search);
            $emailcount = mysqli_num_rows($query);

            $filename =$photo['name'];
            $fileerror = $photo['error'];
            $filetmp = $photo['tmp_name'];

            $fileext = explode('.',$filename);
            $filecheck = strtolower(end($fileext));

            $fileextstored = array('png','jpg','jpeg');

            if(in_array($filecheck,$fileextstored)){
                
                $destfile = 'upload/'.$filename ;
                move_uploaded_file($filetmp,$destfile);
            }
  
            $insertquery = " insert into towork(photo,jobtype,uname,address,email,number,gender,worke,bio,location,status,token,rand) values('$destfile','$jobtype','$uname','$address','$email','$number','$gender','$worke','$bio','$location','Not hired','Not Generated','$rand')" ;
            $res = mysqli_query($configure,$insertquery);

            

            if($res && $fileerror == 0 && $emailcount>0 ){

                $_SESSION['rand1'] = $rand ;
                
                ?>
                <script>
                    
                    alert('details saved successfully');
                    window.location = "workersmainpage.php";

                    </script>
                    <?php
                    
            }else{
                ?>
                <script>
                    
                    alert('Check your Email is registered or not OR upload profile photo in proper format');
                    

                    </script>
                    <?php
            }
        }
        
    ?>

        
</body>
</html>