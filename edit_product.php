
<?php
session_start();
require_once "condb.php";

$sql="SELECT * FROM user ";
$result=$conn->query($sql);
$rs=$result->fetch_array();
$_SESSION['user_level']=(int)$rs['user_level'];
    
    if($rs['user_level'] == 1)
    {
        header("location: index.php");
    }
    
    elseif($rs['user_level'] == 0)
    { ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>edit_product</title>
            <!-- CSS only -->
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">  
        </head>
        <body>
        <div class="container">
    <!-- nav bar -->
    <?php
      require_once ("manu.php")
    ?>
      <h1>edit_product</h1>
      </div>
      
       <!-- JavaScript Bundle with Popper -->
<script src="bootstrap/js/bootstrap.min.js" ></script>
        </body>
        </html>
        <?php
    }
   
?>

