
<?php
session_start();
if(isset($_SESSION['user_level']) && $_SESSION['user_level']==0)
{ 
  require_once('condb.php');

  ?>
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
            
            <td>category</td>
        </tr>
        
        <?php
$sql="SELECT * FROM category ORDER BY cate_name";
$result=$conn->query($sql);
while($rs=$result->fetch_array())
  {
    ?>
        <tr>
           
         
          <td> <?=  $cn=$rs['cate_name'];?> </td>
          <td> <?= $cid=$rs['cate_id'];?> </td>
          <td> <?php  echo "<a type='button' class='btn btn-outline-primary me-2' href='admin/edit_cate.php?cate_id=$cid'>edit</a></td>"; ?></td>
            
           
        </tr>
    <?php
    }
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>
    <tr>
    <td><a type='button' class='btn btn-outline-primary me-2' href='admin/add_cate.php'>add-product</a></td>
</tr>
    </table>
      </div>
    

      </div>
      
       <!-- JavaScript Bundle with Popper -->
<script src="bootstrap/js/bootstrap.min.js" ></script>
        </body>
        </html>
        

