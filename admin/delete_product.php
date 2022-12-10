<?php
use LDAP\Result;
session_start();
if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 0) {
    require_once('../condb.php');
    if (isset($_GET['product_id']))
    {
        $id = $_GET['product_id'];
        $sql = "DELETE FROM products WHERE product_id='$id'";
        if( $result = $conn->query($sql)==true)
        {
        alert('การลบสำเร็จ');
        header('location:../admin.php');
        } else {
        alert('การลบผิดพลาด');
        header('location:../admin.php');
        }
    }
    else
    {
        header('location: ../admin.php');
    }
}else{
    header('location: ../index.php');

}
?>