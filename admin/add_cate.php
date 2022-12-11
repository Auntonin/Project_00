<?php
session_start();
if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 0) {
    require_once('../condb.php');
    if (isset($_POST['cate_name']) && trim($_POST['cate_name']) != "") {
        $sql = "SELECT cate_name FROM category WHERE cate_name = '" . trim($_POST['cate_name']) . "'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $sql = "INSERT INTO category(cate_name) VALUES('" . trim($_POST['cate_name']) . "')";
            $result = $conn->query($sql);
            alert('OK\nสำเร็จ');
            header("loaction:../admin.php");
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

        <form class="form-signin" action="" method="post">
            <div class="form-inline">
                <label for="cate_name">ประเภทสินค้า</label>
                <input type="text" class="form-control" name="cate_name" id="cate_name"
                    placeholder="กรุณาป้อนชื่อประเภทสินค้า">
            </div>
            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit" value="ok">Add</button>

            <br><br>
            <a type='button' class='btn btn-outline-primary me-2' href="../admin.php">Close</a>
        </form>


    </div>
</body>

</html>
<?php
} else {
    header('location: ../index.php');

}
?>