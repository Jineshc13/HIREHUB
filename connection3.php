<?php

$username = "root";
$password = "" ;
$server = "localhost" ;
$db = "form" ;


$configure = mysqli_connect($server,$username,$password,$db);

if($configure){
  /*   echo "connection successful" ; */
 ?>
  <script>
      alert("connection successful");
  </script>

  <?php

}
else{
    die("no connection" . mysqli_connect_error());
}





?>