<?php
session_start();
if (isset($_SESSION['login_name'])) {
  require_once('../../condb.php');
  if (isset($_SESSION["intLine"]) != "") {
    //รับ id สินค้า
    // $pid = $_GET['p_id'];
    // $sql = "SELECT * FROM product WHERE product_id='$pid' ";
    // $result = $conn->query($sql);
    // $rs = $result->fetch_array();
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <!-- CSS only -->
      <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
      <script src="../../bootstrap/js/jquery-3.5.1.js"></script>
      <script src="../../bootstrap/js/jquery.dataTables.min.js"></script>

    </head>

    <body>

      <div class="container">

        <!-- nav_bar -->
        <?php require_once('../../menu.php'); ?>
        <!-- end_nav_bar -->



        <form action="" method="POST">
          <div class="row">
            <div class="col-md -10">
              <table id="product_list" class="table table-hover">

                <tr>
                  <th>ลำดับที่</th>
                  <th>ชื่อสินค้า</th>
                  <th>ราคา</th>
                  <th>จำนวน</th>
                  <th>ราคารวม</th>
                  <th>ลบรายการ</th>
                </tr>

                <?php
                $Total = 0;
                $sumall = 0;
                $ord = 1;
                $sumall = 0;
                for ($i = 0; $i <= (int) $_SESSION["intLine"]; $i++) {
                  if (($_SESSION["strProductID"][$i]) != "") {
                    $sql1 = "SELECT * FROM products WHERE product_id='" . $_SESSION["strProductID"][$i] . "' ";
                    $result1 = $conn->query($sql1);
                    $rs_pro = $result1->fetch_array();

                    $_SESSION["price"][$i] = $rs_pro['product_price'];
                    $Total = $_SESSION["strQty"][$i];
                    $sump = $Total * $_SESSION['price'][$i];
                    $sumall = $sumall + $sump;
                    ?>
                    <tr>
                      <td>
                        <?= $ord ?>
                      </td>
                      <td>
                        <?= $rs_pro['product_name'] ?>
                      </td>
                      <td>
                        <?= $rs_pro['product_price'] ?>
                      </td>
                      <td><input style="text-align:center;" value="<?= $_SESSION["strQty"][$i] ?>" type="number" id="p_qty">
                        <input id="p_id<?= $i ?>" type="text" value="<?= $_SESSION["strProductID"][$i] ?>">

                      </td>
                      <td>
                        <?= $sump ?>
                      </td>
                      <td><a href="order/pro_delete.php?Line=<?= $i ?>">Delete</a></td>
                    </tr>
                    <?php
                    $ord++;
                  }
                }
                ?>
                <tr>
                  <td>รวมเป็นเงิน</td>
                  <td></td>
                  <td></td>
                  <td></td>

                  <td>
                    <?= $sumall ?>
                  </td>
                  <td>บาท</td>

                </tr>
              </table>
            </div>
          </div>
        </form>
        <div style="text-align:right">
          <a href="index.php"><button type="button" class="btn btn-outline-primary me-2">เลือกสินค้า</button></a>
          <button type="button" class="btn btn-primary me-2">ยืนยันคำสั่งซื้อ</button>
        </div>
      </div>
      <!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
      <script>
        $(document).ready(function () {
          $('#product_list').on('change', 'input[id^="p_qty"]', function () {
            var lineNo = $(this).closest('tr').index();
            var quantity = $(this).val();
            var productId = $('#p_id' + lineNo).val(); // use the unique identifier to get the product id
            $.ajax({
              url: 'order/order.php',
              type: 'POST',
              data: {
                quantity: quantity,
                product_id: productId
              },
              success: function (response) {
                console.log(response); // do something with the response from the server
              },
              error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
              }
            });
          });
        });

      </script>
    </body>

    </html>
    <?php
  } else {
    header('location:index.php');
  }
} else {
  header('location:login/login_user.php');
}
?>