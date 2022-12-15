<?php
session_start();
if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 0) {
    require_once('../condb.php');
    if (isset($_POST['product_name']) && trim($_POST['product_name']) != "") {
        $pid = $_POST['product_id'];
        $pn = trim($_POST['product_name']);
        $pp = $_POST['product_price'];
        $cid = $_POST['cate_id'];
        $pqty = $_POST['product_qty'];

       

        $sql = "SELECT product_name FROM products WHERE product_id = '" . $pid . "'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {

            $sql = "UPDATE products SET cate_id = '" . $cid . "',product_name = '" . $pn . "',product_price = '" . $pp . "',product_qty = '" . $pqty . "',image = '".i."' WHERE product_id=$pid";
            $result = $conn->query($sql);
            alert('OK\nแก้ไขสำเร็จ');
            header("location: ../admin.php");
        } else {
            alert("เฮ้ย! ชื่อสินค้ามีอยู่แล้ว");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/signin.css">
    <title>Document</title>


</head>

<body class="text-center">
    <div class="container">
        <?php
    $pid = $_GET['product_id'];
    $sql = "SELECT p.* FROM products p WHERE product_id=$pid";
    $result = $conn->query($sql);
    $rs = $result->fetch_array();
    $pid = $rs['product_id'];
    $pn = $rs['product_name'];
    $pp = $rs['product_price'];
    $pqty = $rs['product_qty'];
   


    ?>
        <form class="form " action="" method="post" enctype="multipart/form-data">
            <div class="form-inline">
                <label for="cate_id">ชื่อสินค้า</label>
                <input type="text" name="product_name" placeholder="ชิ่อสินค้า" value="<?= $pn ?>" require>
                <select name="cate_id" id="cate_id">
                    <?php
    $sqli = "SELECT * FROM category ORDER BY cate_name";
    $resulti = $conn->query($sqli);
    while ($rsi = $resulti->fetch_array()) {
        echo "<option value='".$rsi['cate_id']."' >" . $rsi['cate_name'] . "</option>";
    }

                    ?>
                </select>
                <input type="number" name="product_price" placeholder="ราคา" value="<?= $pp ?>" min="1" max="1000"
                    require>
                <input type="number" name="product_qty" placeholder="จำนวน" value="<?= $pqty ?>" min="1" require>
                <input type="hidden" name="product_id" value="<?= $pid ?>">
                <br>
                <input type="file" name="file_p" require>
            </div>
            <br>
            <button class="w-50 btn btn-lg btn-outline-primary" type="submit" value="ok">Add</button>
            <br><br>
            <a class="w-10 btn btn-lg btn-primary" href="../admin.php">Close</a>
            <br>
        </form>





    </div>
</body>

</html>
<?php
} else {
    header('location: ../index.php');

}
?>