<?php
session_start();
if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 0) {
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
  require_once("menu.php")
      ?>
    <div class="alert alert-primary" role="alert">Product</div>
    <table class="table table-striped">
      <tr>
        <th>ชื่อสินค้า</th>
        <th>ประเภทสินค้า</th>
        <th>ราคาสินค้า</th>
        <th>จำนวนสินค้า</th>
      </tr>
      <?php
  $sql = "SELECT * FROM products ORDER BY product_name";
  $result = $conn->query($sql);
  while ($rs = $result->fetch_array()) {
    $cid = $rs['cate_id'];
      ?>

      <tr>
        <td>
          <?= $rs['product_name']; ?>
        </td>
        <td>
          <?php
    $sqli = "SELECT cate_name FROM category WHERE cate_id = '" . $cid . "'";
    $resulti = $conn->query($sqli);
    $rsi = $resulti->fetch_array();
    echo $rsi['cate_name'];
          ?>
        </td>
        <td>
          <?= $rs['product_price']; ?>
        </td>
        <td>
          <?= $rs['product_qty']; ?>
        </td>
      </tr>


      <?php
  }
} else {

}
$conn->close();
      ?>
  
        <td><a type='button' class='btn btn-outline-primary me-2' href='admin/add_product.php'>add-product</a>
      </td>
<td><a type='button' class='btn btn-outline-primary me-2' href='admin/add_cate.php'>add-caetgory</a></td>
<td></td>
<td></td>
  </div>

  <!-- JavaScript Bundle with Popper -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>