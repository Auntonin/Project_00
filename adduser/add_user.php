<?php
session_start();
if (isset($_SESSION['login_naem'])) {
  header("location : ../index.php");
}
else if (isset($_POST['usernames'])) {

    require_once "../condb.php";
    $uname = $_POST['usernames'];
    $upasswd = $_POST['Password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    if (trim($uname) != "") {
        $sql = "INSERT INTO user VALUES(0,'$uname','$upasswd','$firstname','$lastname','1')";
        if ($conn->query($sql)) {
            $_SESSION["login_name"] = $uname;
            header("location: ../index.php");
        } elseif (trim($upasswd) != "") {
            header("location: add_user.php");
        } else {
            echo "No!";
            header("location: add_user.php");
        }
    } else {

        header("location: add_user.php");
    }
} else {
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>sing-up</title>
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

<body>
  <div class="container">

    <form class="form-signin" action="" method="post">

      <h1 class="h3 mb-3 fw-normal">Please Sign Up</h1>

      <div class="form-floating">
        <input type="text" class="form-control my-2" name="usernames">
        <label for="floatingInput">UserName</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control my-2" name="Password">
        <label for="floatingPassword">Password</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control my-2" id="floatingPassword" name="firstname">
        <label for="floatingPassword">firstname</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control my-2" name="lastname">
        <label for="floatingPassword">lastname</label>
      </div>
      <br>
      <center>
      <a type="button" class='btn btn-lg btn-primary me-2' href='../login/login_user.php'>Sing-in</a>
      <button class="btn btn-lg btn-outline-primary me-2" type="submit" value="ok">Sign-Up</button>
      <br>
  </center>
      <?php
  echo "<br>";
  echo "<center><a type='button' class='btn btn-primary me-2' href='../index.php'>Close</a></center>";
      ?>
    </form>
    <br>


    <script src="../bootstrap/js/bootstrap.min.js"></script>
  </div>
</body>

</html>

<?php
}
?>