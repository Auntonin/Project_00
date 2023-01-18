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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


</head>

<body>
    <div class="container">
        <!-- nav bar -->
        <?php
        require_once("menu.php")
        ?>
        <div class="alert alert-primary" role="alert">Product</div>
        <div class="col-4">
            <label class="control-label m-2">ประเภทสินค้า</label>

            <select class="form-control" placeholder="cate" name="cate" id="cate"></select>
            <button class="btn m-2 col-3 btn-primary">All</button>

        </div>
        <br>

        <br>
        <table class="table table-striped">
            <tr>
                <th>
                    <button id="action-btn">click   </button>
                </th>
            </tr>
            <tr>
                <th class="w-25">ชื่อสินค้า</th>
                <th>รูปสินค้า</th>
                <th>ประเภทสินค้า</th>
                <th>ราคาสินค้า</th>
                <th>จำนวนสินค้า</th>
                <th>สั่งซื้อสินค้า</th>
            </tr>
            <?php
            // $a = 1;
            $key_word = @$_POST['keyword'];
            if ($key_word != "") {
                $sql = "SELECT p.*,c.cate_name
                FROM products p INNER JOIN category c 
                ON p.cate_id = c.cate_id 
                WHERE product_id='$key_word' OR product_name like '%$key_word%'
                ORDER BY product_name";
            } else if (isset($_POST['cid']) != "") {
                // elseif( $a==1){
                $cate_id = $_POST['cid'];
                // $cate_id = 3;
                $sql = "SELECT p.*,c.cate_name
                FROM products p INNER JOIN category c 
                ON p.cate_id = c.cate_id 
                AND p.cate_id='$cate_id'
                ORDER BY product_name";
            } else {
                $sql = "SELECT p.*,c.cate_name
                FROM products p INNER JOIN category c 
                ON p.cate_id = c.cate_id 
                ORDER BY product_name";
            }

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
                        <a type="submit" name="product_order" href="order/order.php?p_id=<?= $pid ?>" class='btn btn-outline-primary me-2'>add to cart</a>
                    </td>
                </tr>


            <?php
            }



            $conn->close();
            ?>
        </table>

    </div>


<!-- <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script> -->
<!-- <script src="service/category.service.js"></script> -->
<script>

$(document).ready(function() {
  $('#cate').empty().append('<option value="">---เลือก---</option>');
  $.ajax({
      dataType: "json",
      type: 'POST',
      url: 'service/ajax.category.php',
      success: function (data) {
          $.each(data, function (key, val) {
              $('#cate').append('<option value=' + val.id + '>' + val .name+ '</option>');
          });
          $('#cate').select2();
        //   $('#district').select2();
        //   $('#subdistrict').select2();
      }
  });

  /****** เลือกประเภทสินค้า *******/
  $('#cate').on('change',function(){
   
  });
});
$('#action-btn').click(()=>{
  console.log('clicked!');
});
</script>

    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>