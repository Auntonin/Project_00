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
   <!-- sweetalert -->
   <script src="sweetalert/dist/sweetalert2.all.min.js"></script>

<?php
function alert($txt)
{?>

 <script> Swal.fire(
  '<?=$txt?>',
  'You clicked the button!',
  '<a href="index.php">"success"</a>'
) </script>

  <?php
}
?>
 