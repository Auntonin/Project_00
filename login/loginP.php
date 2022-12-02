<?php
session_start();
require_once "../condb.php";
$uname=$_POST['usernames'];
$upasswd=$_POST['Password'];
$_SESSION['login_name']="";


$sql="SELECT * FROM user WHERE user_name='$uname' AND user_password='".md5($upasswd)."' ";

$result=$conn->query($sql);
if($result->num_rows == 1)
{
    $rs=$result->fetch_array();
    $_SESSION['user_id']=(int)$rs['user_id'];
    $_SESSION['user_level']=(int)$rs['user_level'];
    $_SESSION['login_name']=$rs['user_name'] ;
    $_SESSION['full_name']=$rs['user_firstname']." ".$rs['user_lastname'];

    if($rs['user_level'] == 1)
    {
        header("location: ../index.php");
    }
    
    else if($rs['user_level'] == 0)
    {
        header("location: ../admin.php");
    }
    
    else
    {
        header("location: login.php");
    }
    
}
else
{
    header("location: login.php");
}
?>
