<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edithirer.css">
    <script src="https://kit.fontawesome.com/c5dca0dece.js" crossorigin="anonymous"></script>
    <title>Edit Profile || Hirer</title>
</head>
<body>
   

            <?php

            include 'connection3.php' ;
            
            $hid = $_SESSION['hid'];
            $query10 = "SELECT *  FROM tohire where id='$hid' " ; 
            $query_run10 = mysqli_query($configure,$query10);

            if(mysqli_num_rows($query_run10)  > 0){

                foreach($query_run10 as $items ){?>


<section>
        <div class="heading">
            <div class="conatiner">
                    <h2 class="lg-heading"><i class="fas fa-user-edit"></i>&nbsp;&nbsp;Edit</h2><hr>
                    <br><br>
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" >
                        <label for="pic" class="md-heading"><i class="fas fa-portrait"></i>Profile pic</label>
                        <input value="<?= $items['photo'] ?>" name="photo" class="file-upload" id="file" type="file" onchange="readURL(this)" accept="Image/*">
                        <br><br>
                        <br><br>

                        <label for="name" class="md-heading"><i class="fas fa-sort-alpha-down"></i>Name</label>
                        <input value="<?= $items['name'] ?>" name="name" type="text"id="name" placeholder="&nbsp;&nbsp;HireHub" required>
                        <br><br>
                        <br><br>

                        <label for="address" class="md-heading"><i class="fas fa-house-user"></i>Address</label>
                        <input value="<?= $items['address'] ?>" name="address" type="text" id="address" placeholder="&nbsp;&nbsp;HireHub"  required>
                        <!--<textarea name="adress" id="" cols="30" rows="10"></textarea>-->
                        <br><br>
                        <br><br>

                        <label for="email" class="md-heading"><i class="far fa-envelope"></i>Email</label>
                        <input value="<?= $items['email'] ?>" name="email" type="email" id="email" placeholder="&nbsp;&nbsp;hirehub@gmail.com" required> 
                        <br><br>
                        <br><br>
                        
                        <label for="number" class="md-heading"><i class="fas fa-phone"></i>Number</label>
                        <input value="<?= $items['number'] ?>" name="number" type="number" id="number" placeholder="&nbsp;&nbsp;Eg-9000000009" required>
                        <br><br>
                        <br><br>
                        <form >
                            <input name="update" type="submit" class=" submit md-heading" value="Submit">
                        </form>
                        
                    </div> 
                </div>
            </section>





              <?php  }
            }

            if(isset($_POST['update'])){

                $photo = $_POST["photo"] ;
                $name = $_POST["name"] ;
                $address = $_POST['address'];
                $email = $_POST['email'];
                $number = $_POST['number'];
                
    
                
                $query = "update tohire set photo='$photo' ='$name', address='$address', email='$email' , number='$number' where id='$hid' ";
                $res = mysqli_query($configure,$query) ;

                if($res){
                    ?>
                    <script>
                        alert('data updated properly');
                        window.location = "workers.php";
                        </script>
                    <?php
                }else{
                    ?>
                    <script>
                        alert('data not updated properly');
                        </script>
                    <?php
                }
            }

            


            ?>
</body>
</html>