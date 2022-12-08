<?php
session_start();
if(isset($_SESSION['user_level']) && $_SESSION['user_level']==0)
{
    require_once('../condb.php');
    if(isset($_POST['product_name']) && trim($_POST['product_name']) != "")
    {   $pid=$_POST['product_id'];
        $pn=trim($_POST['product_name']);
        
        $sql="SELECT cate_name FROM category WHERE cate_id = '".$pid."'";
        $result=$conn->query($sql);
        if($result->num_rows==1)
        {
            
            $sql="UPDATE products SET product_name = '".$pn."' WHERE product_id=$pid";
            $result=$conn->query($sql);
            alert('OK\nแก้ไขสำเร็จ');
            header("location: add_product.php");
        }
        else
        {
            alert("เฮ้ย! ชื่อประเภทสินค้ามีอยู่แล้ว");
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
    <link href="../bootstrap/css/signin.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <?php
        $pid=$_GET['product_id'];
        $sql="SELECT * FROM products WHERE product_id=$pid";
        $result=$conn->query($sql);
        $rs=$result->fetch_array();
        $pid=$rs['product_id'];
        $pn=$rs['product_name'];
        $pp = $rs['product_price'];
        $pqty=$rs['product_qty'];
        $cid = $rs['cate_id'];
      
        ?>
        <form class="form " action="" method="post">
            <div class="form-inline">
                <label for="cate_id">ชื่อสินค้า</label>
                <select name="cate_id" id="cate_id">
                    <?php
    $sql = "SELECT * FROM category";
    $result = $conn->query($sql);
    while ($rs = $result->fetch_array()) {
        echo "<option value='" . $cid . "'>" . $rs['cate_name'] . "</option>";
    }
                    ?>
                </select>
                <input type="text" name="product_name" placeholder="ชิ่อสินค้า" value="<?=$pn?>" require>
                <input type="number" name="product_price" placeholder="ราคา" value="<?=$pp?>" min="1" max="1000" require>
                <input type="number" name="product_qty" placeholder="จำนวน" value="<?=$pqty?>" min="1" require>
                <input type="hidden" name="cate_id" value="<?=$pid?>">
            </div>
            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit" value="ok">Add</button>
            <br>
        </form>

        


    </div>
</body>

</html>
<?php
}
else{
    header('location: ../login/index.php');

}
?>