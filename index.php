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
  <div class="container">
    <!-- nav bar -->
    <?php
    require_once("menu.php")
      ?>
    <div class="alert alert-primary" role="alert">Product</div>
    <table class="table table-striped">
      <tr>
        <th>ชื่อสินค้า</th>
        <th>ประเภทสินค้า</th>
        <th>ราคาสินค้า</th>
        <th>จำนวนสินค้า</th>
        <th>สั่งซื้อสินค้า</th>
      </tr>
      <?php
      $sql = "SELECT p.*,c.cate_name 
              FROM products p 
              INNER JOIN category c ON p.cate_id = c.cate_id 
              ORDER BY product_name";
      $result = $conn->query($sql);
      while ($rs = $result->fetch_array()) {
        $cn = $rs['cate_name'];
        $pid = $rs['product_id'];
      ?>

      <tr>
        <td>
          <?= $rs['product_name']; ?>
        </td>
        <td>
          <?=$rs['cate_name']?>
        </td>
        <td>
          <?= $rs['product_price']; ?>
        </td>
        <td>
          <?= $rs['product_qty']; ?>
        </td>
        <td>
          <form action="buy/buy.php" method="post">
          <button type="submit" name="product_buy" value="<?=$pid?>"class='btn btn-outline-primary me-2' >buy</button>
          </form>
        </td>
      </tr>


      <?php
      }

    

      $conn->close();
      ?>

  </div>
 




  <!-- JavaScript Bundle with Popper -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>