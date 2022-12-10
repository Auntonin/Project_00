<?php
session_start();
require_once('../condb.php');
$pid = $_POST['product_buy'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
   <?php
   echo "id สินค้า" . "$pid";
   
   ?>
</body>
</html>