<?php
session_start();
if(isset($_SESSION['user_level']) && $_SESSION['user_level']==0)
{
    require_once('../condb.php');
    if(isset($_POST['product_name']) && trim($_POST['product_name']) != "")
    {   
        $cate_id = $_POST['cate_id'];
        $product_qty=$_POST['product_qty'];
        $product_price=$_POST['product_price'];

        // if (is_uploaded_file($_FILES['file_p']['tmp_name'])) {
        //     $new_image_name = 'pro_'.pathinfo(basename($_FILES['file_p']['name']),PATHINFO_EXTENSION);
        //     $image_upload_path = "img/product/".$new_image_name;
        //     move_uploaded_file($_FILES['file_p']['tmp_name'],$image_upload_path);
        //     } else {
        //     $new_image_name = "";
        //     }

        
            error_reporting(0);
            $filename = $_FILES["uploadfile"]["name"];
            $tempname = $_FILES["uploadfile"]["tmp_name"];
            $folder = "img/product/".$filename;
            move_uploaded_file($tempname,$folder);
            echo "<img src='$folder' height=100 width=100 />";

      
        $sql="SELECT product_name FROM products WHERE product_name = '".trim($_POST['product_name'])."'";
      
        $result=$conn->query($sql);
        if($result->num_rows==0)
        {
            $sql="INSERT INTO products VALUES(0,$cate_id,'".trim($_POST['product_name'])."',".$product_price.",".$product_qty.",'$filename')";
           $result=$conn->query($sql);
          
             alert('OK\nสำเร็จ');
            // header("location:../admin.php");
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
<body class="text-center">
    <div class="container">

        <form class="form " action="" method="post" enctype="multipart/form-data">
            
            <div class="form-inline">
                <label for="cate_id">ประเภทสินค้า</label>
                <select name="cate_id" id="cate_id">
                    <?php
                    $sql = "SELECT * FROM category";
    $result = $conn->query($sql);
    while($rs=$result->fetch_array())
    {
        echo "<option value='".$rs['cate_id']."'>".$rs['cate_name']."</option>";
    }
                    ?>
                
                </select>
                <input type="text" name="product_name" placeholder="ชิ่อสินค้า" require>
                <input type="number" name="product_price" min="1" max="1000" placeholder="ราคา" require>
                <input type="number" name="product_qty" placeholder="จำนวน" min="1" require>
                <br>
                <input type="file" name="uploadfile" require>

            </div>
            <br>
            <button class="w-50 btn btn-lg btn-primary" type="submit" value="ok">Add</button>
           
            <br><br>
            <a type='button' class='btn btn-outline-primary me-2' href="../admin.php">Close</a>
        </form>
      

    </div>
</body>

</html>
<?php
}
else{
    header('location: ../index.php');

}
?>