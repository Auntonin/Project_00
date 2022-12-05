<?php
session_start();
if (isset($_SESSION['login_naem'])) {
  header("location : ../index.php");
} else if (isset($_POST['usernames'])) {

  require_once "../condb.php";
  $uname = $_POST['usernames'];
  $upasswd = $_POST['Password'];
  $_SESSION['login_name'] = "";


  $sql = "SELECT * FROM user WHERE user_name='$uname' AND user_password='$upasswd' ";

  $result = $conn->query($sql);
  if ($result->num_rows == 1) {
    $rs = $result->fetch_array();
    $_SESSION['user_id'] = (int) $rs['user_id'];
    $_SESSION['user_level'] = (int) $rs['user_level'];
    $_SESSION['login_name'] = $rs['user_name'];
    $_SESSION['full_name'] = $rs['user_firstname'] . " " . $rs['user_lastname'];

    if ($rs['user_level'] == 1) {
      header("location: ../index.php");
    } else if ($rs['user_level'] == 0) {
      header("location: ../admin.php");
    } else {
      header("location: login.php");
    }

  } else {
    echo "No!";
    header("location: login.php");
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
  <link href="../bootstrap/css/signin.css" rel="stylesheet">
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
      <input type="text" class="form-control" name="usernames">
      <label for="floatingInput">UserName</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <br>

    <button class="w-100 btn btn-lg btn-primary" type="submit" value="ok">Sign-in</button>
    <br>
    <?php
  echo "<br>";
  echo "<a type='button' class='btn btn-outline-primary me-2' href='../adduser/add.php'>Sing-up</a>";
    ?>
  </form>





  <!-- JavaScript Bundle with Popper -->
  <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

<?php
}
?>