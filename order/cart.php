<?php
session_start();
if (isset($_SESSION['login_name'])) {
      require_once('../condb.php');
      // $pid = $_GET['p_id'];
// $sql = "SELECT * FROM product WHERE product_id='$pid' ";
// $result = $conn->query($sql);
// $rs = $result->fetch_array();
// ?>

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
    <?php
      require_once('../menu.php');
    ?>
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
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
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
}
else{
      header('location:../login/login.php');
}
?>