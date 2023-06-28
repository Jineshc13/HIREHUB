<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editworker.css">
    <script src="https://kit.fontawesome.com/c5dca0dece.js" crossorigin="anonymous"></script>
    <title>Edit Profile || Worker</title>
</head>
<body>
    <section>
        <div class="heading">
            <div class="conatiner">
                    <h2 class="lg-heading"><i class="fas fa-user-edit"></i>&nbsp;&nbsp;Edit</h2><hr>
                    <br><br>
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" >
                        <label for="pic" class="md-heading"><i class="fas fa-portrait"></i>&nbsp;&nbsp;Profile Photo:</label>
                        <input name="photo" class="file-upload" id="file" type="file" onchange="readURL(this)" accept="Image/*">
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
                        <form action="workersmainpage.html">
                            <input name="submit" type="submit" class=" submit md-heading" value="Submit">
                        </form>
                        
                    </div> 
                </div>
            </section>
</body>
</html>