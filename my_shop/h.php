<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head> 
<?php 
    //print_r($_SESSION);
    require_once('../condb.php');
    if (isset($_SESSION['user_level']) != 2) {
    header("location../index.php"); 
    }
    ?>
      <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY_shop</title>
  <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <script src="../bootstrap/js/jquery-3.5.1.js"></script>
<script src="../bootstrap/js/jquery.dataTables.min.js"></script>
<script src="../bootstrap/js/sidebers.js"></script>
   <link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="../bootstrap/css/s_style.css">
  <link href="sidebars.css" rel="stylesheet">
    </head>