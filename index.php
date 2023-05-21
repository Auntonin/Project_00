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
      <title>shop</title>
      <!-- CSS only -->
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="bootstrap/css/modal.css">
</head>

<body>
      
      <div class="container">

            <!-- nav bar -->
            <?php
            require_once("menu.php")
                  ?>
            <div class="modal">
                  <div class="modal-bg"></div>
                  <div class="modal-card">

                  </div>
            </div>
            <div class="alert alert-primary" role="alert">Product</div>
            <table class="table table-striped">
                  <tr>
                        <th class="w-25">ชื่อสินค้า</th>
                        <th>รูปสินค้า</th>
                        <th>ประเภทสินค้า</th>
                        <th>ราคาสินค้า</th>
                        <th>จำนวนสินค้า</th>
                        <th>สั่งซื้อสินค้า</th>
                  </tr>
                  <?php
                  $sql = "SELECT p.*,c.cate_name
              FROM products p INNER JOIN category c 
              ON p.cate_id = c.cate_id 
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
                                    <img src="img/product/<?= $rs['images'] ?>" width="120" height="110">
                              </td>
                              <td>
                                    <?= $rs['cate_name'] ?>
                              </td>
                              <td>
                                    <?= number_format($rs['product_price']); ?>
                              </td>
                              <td>
                                    <?= $rs['product_qty']; ?>
                              </td>
                              <td>
                                    <a name="product_order" href="order/order.php?p_id=<?= $pid ?>"
                                          class='btn btn-outline-primary me-2'>add to cart</a>
                              </td>
                        </tr>


                        <?php
                  }



                  $conn->close();
                  ?>
            </table>

      </div>





      <!-- JavaScript Bundle with Popper -->
      <!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
</body>

</html>