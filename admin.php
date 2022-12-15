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
  <!-- sweetalert -->
  <script src="sweetalert/dist/sweetalert2.all.min.js"></script>

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
        <th>รูปสินค้า</th>
        <th>ประเภทสินค้า</th>
        <th>ราคาสินค้า</th>
        <th>จำนวนสินค้า</th>
        <th>แก้ไข,ลบ</th>
      </tr>
      <?php
  $sql = "SELECT p.*,c.cate_name 
  FROM products p 
  LEFT JOIN category c ON p.cate_id = c.cate_id 
  ORDER BY product_name";
  $result = $conn->query($sql);
  while ($rs = $result->fetch_array()) {
    $cid = $rs['cate_id'];
    $pid = $rs['product_id'];
      ?>

      <tr>
        <td>
          <?= $rs['product_name']; ?>
        </td>
        <td>
          <img src="img/product/<?= $rs['image'] ?>" width="120" height="80">
        </td>
        <td>
          <?php
    echo $rs['cate_name'];
          ?>
        </td>
        <td>
          <?= $rs['product_price']; ?>
        </td>
        <td>
          <?= $rs['product_qty']; ?>
        </td>
        <td>
          <?php
    echo "<a type='button'  class='btn btn-outline-primary ' href='admin/edit_product.php?product_id=$pid'>EDIT</a>";
    echo " ";
    echo "<a  type='button'  class='btn btn-primary 'href='admin/delete_product.php?product_id=$pid'>DELETE</a>";

          ?>

        </td>

      </tr>


      <?php
  }




      ?>

      <td><a type='button' class='btn btn-outline-primary me-2' href='admin/add_product.php'>add-product</a>
      </td>
      <td></td>
      <td>
        <a type='button' class='btn btn-outline-primary me-2' href='admin/add_cate.php'>add-caetgory</a>
        <a type='button' class='btn btn-primary ' href='admin/delete_cate.php?caet_id=$pid'>EDIT-DELETE</a>
      </td>
      <td></td>
      <td></td>
      <td></td>
  </div>
  <script>
// function ConfirmDelete()
// {
//   Swal.fire({
//   title: 'Are you sure?',
//   text: "You won't be able to revert this!",
//   icon: 'warning',
//   showCancelButton: true,
//   confirmButtonColor: '#3085d6',
//   cancelButtonColor: '#d33',
//   confirmButtonText: '<a 'href=admin/delete_product.php?product_id=<?= $pid ?>'>DELETE</a>'
// }).then((result) => {
//   if (result.isConfirmed) {
//     url =""
//   }
// })
// }
// </script>


  <!-- JavaScript Bundle with Popper -->
  <script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
<?php

  $conn->close();
} else {
  header('location: index.php');

}
?>