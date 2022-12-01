
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
            <title>admin</title>
            <!-- CSS only -->
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">  
        </head>
        <body>
        <div class="container">
    <!-- nav bar -->
    <?php
      require_once ("manu.php")
    ?>
      <h1>admin</h1>
      <table class="border border-secondary" >
        <tr>
            
            <td>product_type</td>
        </tr>
        <?php
$sql = "SELECT * FROM product";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) 
  {
    ?>
        <tr>
            
            <td><?=$row['p_type']?></td>
            <td><a type='button' class='btn btn-outline-primary me-2' href='admin/edit_product_type.php?id=<?=$row['p_type']?>'>edit</a></td>

           
        </tr>
    <?php
    }
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>
    <tr>
    <td><a type='button' class='btn btn-outline-primary me-2' href='admin/add_product_type.php'>add-product</a></td>
</tr>
    </table>
      </div>
    

      </div>
      
       <!-- JavaScript Bundle with Popper -->
<script src="bootstrap/js/bootstrap.min.js" ></script>
        </body>
        </html>
        <?php
    }
   
?>

