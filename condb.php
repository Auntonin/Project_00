<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop_db";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>


<?php
function alert($txt)
{
  echo "<script> alert($txt);</script>";
}
function nl(){
  echo "<br>";
}

?>
 