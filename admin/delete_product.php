<!-- sweetalert -->
<script src="../sweetalert/dist/sweetalert2.all.min.js"></script>

<?php
session_start();
if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 0) {
    require_once('../condb.php');
    if (isset($_GET['product_id'])) {
        $id = $_GET['product_id'];
        $sql = "DELETE FROM products WHERE product_id='$id'";
        if ($result = $conn->query($sql) == true) {
            
            // alert('การลบสำเร็จ');
            // echo " $id";
            // ถ้าไม่ใส่อะไรในหน้า sweetalert จะไม่ทำงาน
            // echo "<script>
            // Swal.fire({
            //     icon:'success',
            //     title:'Delete Complete!',
            //     showConfirmButton: false,
            //     timer: 1500
            // })</script>";
            // header('refresh:2;url=../admin.php');
            header('location:../admin.php');
        } else {
            // alert('การลบผิดพลาด');
            // echo " $id";
            // echo "<script>
            // Swal.fire({
            //     icon:'error',
            //     title:'Delete error!',
            //     showConfirmButton: false,
            //     timer: 1500
            // })</script>";
            // header('refresh:2;url=../admin.php');
            header('location:../admin.php');
        }
    } else {
        header('location: ../admin.php');
    }
} else {
    header('location: ../index.php');

}
?>