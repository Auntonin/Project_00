<?php
session_start();

if(isset($_SESSION['user_name']))
{
    header("location: ../login/login.php");
}
else
{
    
    require_once "../condb.php";
    $uname=$_POST['usernames'];
    $upasswd=$_POST['Password'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];

    if(trim($uname)!= "")
    {
    $sql="INSERT INTO user VALUES(0,'$uname','$upasswd','$firstname','$lastname','1')";
    if($conn->query($sql))
    {
        $_SESSION["login_name"]=$uname;
        header("location: ../index.php");
    }
    elseif(trim($upasswd)!= "")
    {
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