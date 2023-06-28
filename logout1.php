<?php

session_start();


?>


<?php


                setcookie('email','NULL',time()-86400);
                setcookie('password','NULL',time()-86400); 
                session_destroy();
                header('location: login1.php');




?>



</body>
</html>