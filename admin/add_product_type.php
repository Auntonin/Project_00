
<?php
session_start();
require_once "../condb.php";

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
            <title>add_product_type</title>
            <!-- CSS only -->
            <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">  
           
        </head>
        <body>
        <div class="container">
    <!-- nav bar -->
    <?php
      require_once ("../manu.php")
    ?>
    
      <h1>add_product</h1>
      <form class="form" >


<div class="form-floating" action="add_product_type_p.php" method="post" >
  <input type="text" class="form-control"   name="product_type_name" >
  <label for="floatingInput">product-type-name</label>
</div>

<br>

<button class="w-100 btn btn-lg btn-primary" type="submit" value="ok">Sign-Up</button>
<a class="w-100 btn btn-lg btn-primary" href="admin.php">Closs</a>
<br>
<?php
echo "<br>";
echo "<center><a type='button' class='btn btn-outline-primary me-2' href='../login/login.php'>Sing-in</a></center>";
?>
</form>
    

      </div>
      
       <!-- JavaScript Bundle with Popper -->
<script src="bootstrap/js/bootstrap.min.js" ></script>
        </body>
        </html>
        <?php
    }
   
?>

