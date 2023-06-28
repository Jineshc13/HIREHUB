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
            
            print_r($photo);
          
  
            $insertquery = " insert into towork(photo,jobtype,uname,address,email,number,gender,worke,bio,location) values('$destfile','$jobtype','$uname','$address','$email','$number','$gender','$worke','$bio','$location' )" ;
            $res = mysqli_query($configure,$insertquery);

            if($res){
                ?>
                <script>
                    
                    alert('details saved successfully');
                    header('location: workers.php');

                    </script>
                    <?php
            }

        }
    ?>