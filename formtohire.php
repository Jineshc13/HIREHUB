<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formtohire.css">
    <script src="https://kit.fontawesome.com/c5dca0dece.js" crossorigin="anonymous"></script>
    <title>Details || To Hire</title>
</head>
<body>
    <section>
        <div class="heading">
            <div class="conatiner">
                    <h2 class="lg-heading">details</h2><hr>
                    <br><br>
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                        <label for="pic" class="md-heading"><i class="fas fa-portrait"></i>&nbsp;&nbsp;Profile Photo:</label>
                        <input name="photo" class="file-upload" id="file" type="file" >
                        <br><br>
                        <br><br>

                        <label for="name" class="md-heading"><i class="fas fa-sort-alpha-down"></i>&nbsp;&nbsp;Name:</label>
                        <input name="name" type="text"id="name" placeholder="&nbsp;&nbsp;HireHub" required>
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
                        <input name="gender" type="radio" value="male" id="male">
                        <span class="md-heading" id="male">Male&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input name="gender" type="radio" value="female" id="female">
                        <span class="md-heading" id="male">Female&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input name="gender" type="radio" value="other" id="other">
                        <span class="md-heading" id="male">Other</span>
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

                        <label for="name" class="md-heading">&nbsp;&nbsp;Job Description</label>
                        <input name="jobd" type="text"id="name" placeholder="&nbsp;&nbsp;to repair a tap,etc." required>
                        <br><br>
                        <br><br>



                        <input name="submit" type="submit" class=" submit md-heading" value="Submit">
                        <br><br>
                        <br><br>



                        
            </div> 
        </div>

        <?php
        
        include 'connection3.php';


        if(isset($_POST['submit'])){
            
            
            $photo= $_FILES['photo'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $number = $_POST['number'];
            $gender = $_POST['gender'];
            $jobtype = $_POST['jobtype'];
            $jobd = $_POST['jobd'];

            $ran = bin2hex(random_bytes(5));

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
        
 
            $insertquery = " insert into tohire(photo,name,address,email,number,gender,jobtype,jobd,token,ran) values('$destfile','$name','$address','$email','$number','$gender','$jobtype','$jobd','Not generated yet','$ran')" ;
            $res = mysqli_query($configure,$insertquery);

            if($res){
                

              $_SESSION['ran1'] = $ran ;
                
        
                ?>
                <script>
            
                    alert('details saved successfully'); 
                     window.location = "workers.php";
                   </script>
                    <?php
                    
                    
            }

        }
    ?>
</body>
</html>