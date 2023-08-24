<?php
session_start();
if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 0) {
  require_once('../condb.php');
  if (isset($_GET['cate_id'])) {
    $id = $_GET['cate_id'];
    $sql = "DELETE FROM category WHERE cate_id='$id'";
    if ($result = $conn->query($sql) == true) {
      alert('การลบสำเร็จ');
      header('location:../admin.php');
    } else {
      alert('การลบผิดพลาด');
      header('location:../admin.php');
    }
  } else { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>admin</title>
      <!-- CSS only -->
      <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    </head>
    <body class="text-center">
      <div class="container">
        <div class="alert alert-primary mt-3" role="alert">Category</div>
        <table class="table table-striped">
          <tr>
            <th>ประเภทสินค้า</th>
            <th></th>
            <th>แก้ไข,ลบ</th>
            <th></th>
          </tr>
          <?php
          $sql = "SELECT * FROM category ORDER BY cate_id";
          $result = $conn->query($sql);
          while ($rs = $result->fetch_array()) {
            $cid = $rs['cate_id'];
            ?>
              <tr>
                <td>
                  <?php echo $rs['cate_name'];?>
                </td>
                  <td></td>
                <td>
                  <?php
                  echo "<a type='button'  class='btn btn-outline-primary ' href='edit_cate.php?cate_id=$cid'>EDIT</a>";
                  echo " ";
                  echo "<a type='button'  class='btn btn-primary ' href='delete_cate.php?cate_id=$cid'>DELETE</a>";
                  ?>
                </td>
                  <td></td>
              </tr>
            <?php
          }
          ?>
          <td>
            <a type='button' class='btn btn-outline-primary me-2' href='add_cate.php'>add-caetgory</a>
            <a type='button' class='btn btn-primary me-2' href="../admin.php">Close</a>
          </td>
          <td></td>
          <td></td>
          <td></td>
      </div>
      <!-- JavaScript Bundle with Popper -->
      <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>

    </html>
    <?php
  }
} else {
  header('location: ../index.php');

}
?>