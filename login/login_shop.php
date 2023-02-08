<?php
session_start();
if (isset($_SESSION['login_naem'])) {
  header("location : ../index.php");
} else if (isset($_POST['email']) && trim($_POST['email']) != "")  {

  require_once "../condb.php";

  $eamil = $_POST['email'];
  $spasswd = $_POST['Password'];
  $_SESSION['login_name'] = "";


  $sql = "SELECT * FROM shop WHERE email='$eamil' AND password_shop='$spasswd'";
  $result = $conn->query($sql);
  if ($result->num_rows == 1) {
    $rs = $result->fetch_array();
    $_SESSION['shop_id'] = (int) $rs['id_shop'];
    $_SESSION['user_level'] = (int) $rs['user_level'];
    $_SESSION['login_name'] = $rs['name_shop'];
    
    if ($rs['user_level'] == 1) {
      header("location: ../index.php");
    // echo 1;
    } else if ($rs['user_level'] == 0) {
      header("location: ../admin.php");
    // echo 2;
    } else if ($rs['user_level'] == 2) {
        header("location: ../shop.php");
        // echo 3;
    } else {
      header("location: login_shop.php");
    // echo 4;
    }

  } else {
    echo "No!";
    header("location: login_shop.php");
  }

} else { 
?>




<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.104.2">
  <title>Signin</title>
  <!-- CSS only -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link  rel="stylesheet" href="../bootstrap/css/signin.css">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
</head>

<body class="text-center">


  <form class="form-signin" action="" method="post">

    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" class="form-control my-3" name="email">
      <label for="Email">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control my-3" id="floatingPassword" name="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <br>
    <center>
    <a type='button' class='btn btn-lg btn-outline-primary me-2' href='../adduser/add_shop.php'>Sing-up</a>
    <button class="btn btn-lg btn-primary" type="submit" value="ok">Sign-in</button>
  </center>
    <br>
    <?php
  echo "<br>";

  echo "<center><a type='button' class='btn btn-primary me-2' href='../index.php'>Close</a></center>";
    ?>
  </form>





  <!-- JavaScript Bundle with Popper -->
  <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

<?php
}


?>