<?php
session_start();
require_once "condb.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book_shop</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="blue">Hello</div>
    <?php
    if(isset($_SESSION["user_name"])) {
        
        
        echo '<a href="logout.php">Logout</a> ';
    }
    else{
        echo "<a href='login.php'>เข้าสู่ระบบ</a> | <a href='add.php'>Add</a><br><br>";
    }
    ?>

    
      <!-- JavaScript Bundle with Popper -->
<script src="bootstrap/js/bootstrap.min.js" ></script>
</body>
</html>