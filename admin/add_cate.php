<?php
session_start();
if(isset($_SESSION['user_level']) && $_SESSION['user_level']==0)
{
    require_once('../condb.php');
    if(isset($_POST['cate_name']) && trim($_POST['cate_name']) != "")
    {
        $sql="SELECT cate_name FROM category WHERE cate_name = '".trim($_POST['cate_name'])."'";
        $result=$conn->query($sql);
        if($result->num_rows==0)
        {
            $sql="INSERT INTO category(cate_name) VALUES('".trim($_POST['cate_name'])."')";
            $result=$conn->query($sql);
            alert('OK\nสำเร็จ');
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

        <form class="form " action="" method="post">
            <div class="form-inline">
                <label for="cate_name">ประเภทสินค้า</label>
                <input type="text" class="form-control" name="cate_name" id="cate_name" placeholder="กรุณาป้อนชื่อประเภทสินค้า">
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" value="ok">Add</button>
            <br>
        </form>
        <?php
        $sql="SELECT * FROM category ORDER BY cate_name";
        $result=$conn->query($sql);
        while($rs=$result->fetch_array())
        {
            $cid=$rs['cate_id'];
            $cn=$rs['cate_name'];
            echo "<br>$cid ==> <a href='edit_cate.php?cate_id=$cid'>$cn</a>";
        }       
        ?>

    </div>
</body>

</html>
<?php
}
else{
    header('location: ../index.php');

}
?>