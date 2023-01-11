<?php
session_start();
if (isset($_SESSION['login_name'])) 
{
  require_once('../condb.php');
  if (isset($_SESSION["intLine"]) != "")
   {
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
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  </head>

  <body>

    <div class="container">

      <!-- nav_bar -->
      <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="../index.php" class="nav-link px-2 link-secondary">Home</a></li>
          <li><a href="../index.php" class="nav-link px-2 link-dark">Shop</a></li>
          <li><a href="cart.php" class="nav-link px-2 link-dark">Cart</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Contact</a></li>
        </ul>

        <div class="col-md-3 text-end">

          <?php
          if (isset($_SESSION["login_name"])) {
            echo "<strong> $_SESSION[login_name] </strong>";
            if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 0) {
              echo "<a type='button' class='btn btn-outline-primary me-2' href='admin.php'>admin</a>";
            }

            echo "<a type='button' class='btn btn-outline-primary me-2' href='../logout.php'>Logout</a>";
          } else {

            echo "<a type='button' class='btn btn-outline-primary me-2' href='login/login.php'>Login</a>";
            echo "<a type='button' class='btn btn-primary' href='adduser/add.php'>Sign-up</a>";
          }
          ?>
      </header>
      <!-- end_nav_bar -->


     
        <form action="" method="POST">
          <div class="row">
            <div class="col-md -10">
              <table class="table table-hover">

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
                  <td><?= $ord ?></td>
                  <td><?= $rs_pro['product_name'] ?></td>
                  <td><?= $rs_pro['product_price'] ?></td>
                  <td><?= $_SESSION["strQty"][$i] ?></td>
                  <td><?= $sump ?></td>
                  <td><a href="pro_delete.php?Line=<?= $i ?>">Delete</a></td>
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
                
                <td><?= $sumall ?></td>
                <td>บาท</td>
                
              </tr>
              </table>
            </div>
          </div>
        </form>
        <div style="text-align:right">
          <a href="../index.php"><button type="button" class="btn btn-outline-primary me-2">เลือกสินค้า</button></a>
          <button type="button" class="btn btn-primary me-2">ยืนยันคำสั่งซื้อ</button>
        </div>
    </div>
  </body>

  </html>
<?php
  }else{
    header('location:../index.php');
  }
} else {
  header('location:../login/login.php');
}
?>