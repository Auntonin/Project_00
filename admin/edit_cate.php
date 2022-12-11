<?php
session_start();
if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 0) {
    require_once('../condb.php');
    if (isset($_POST['cate_name']) && trim($_POST['cate_name']) != "") {
        $id = $_POST['cate_id'];
        $cn = trim($_POST['cate_name']);
        $sql = "SELECT cate_name FROM category WHERE cate_id = '" . $id . "'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            
            $sql = "UPDATE category SET cate_name = '" . $cn . "' WHERE cate_id=$id";
            $result = $conn->query($sql);
            alert('OK\nแก้ไขสำเร็จ');
            header("location: ../admin.php");
        } else {
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

<body class="text-center">
    <div class="container">
        <?php
    $cid = $_GET['cate_id'];
    $sql = "SELECT * FROM category WHERE cate_id=$cid";
    $result = $conn->query($sql);
    $rs = $result->fetch_array();
    $cid = $rs['cate_id'];
    $cn = $rs['cate_name'];

        ?>
        <form class="form-signin" action="" method="post">
            <div class="form-inline">
                <label for="cate_name">ประเภทสินค้า</label>
                <input type="text" class="form-control" name="cate_name" id="cate_name"
                    placeholder="กรุณาป้อนชื่อประเภทสินค้า" value="<?= $cn ?>">
                <input type="hidden" name="cate_id" value="<?= $cid ?>">
            </div>
            <br>
            <button class="w-100 btn btn-lg btn-outline-primary" type="submit" value="ok">Add</button>
            <br><br>
            <a type='button' class='btn btn-primary me-2' href="delete_cate.php">Close</a>

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