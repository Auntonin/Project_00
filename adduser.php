<?php
session_start();

if(isset($_SESSION['user_name']))
{
    header("location: login.php");
}
else
{
    
    require_once "condb.php";
    $uname=$_POST['usernames'];
    $upasswd=$_POST['Password'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];

    if(trim($uname)!= "")
    {
    $sql="INSERT INTO user VALUES(0,'$uname','$upasswd','$firstname','$lastname')";
    if($conn->query($sql))
    {
        header("location: login.php");
    }elseif(trim($upasswd)!= ""){
    
        header("location: add.php");
    }
    else
    {
        echo "No!";
        header("location: add.php");
    }
  }
else
{
    
    header("location: add.php");
}
}
?>