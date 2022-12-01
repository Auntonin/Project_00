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

    <form class="form-signup" action="adduser.php" method="post">

<h1 class="h3 mb-3 fw-normal">Please Sign Up</h1>

<div class="form-floating" >
  <input type="text" class="form-control"   name="usernames" >
  <label for="floatingInput">UserName</label>
</div>
<div class="form-floating" >
  <input type="password" class="form-control"  name="Password">
  <label for="floatingPassword">Password</label>
</div>
<div class="form-floating" >
  <input type="text" class="form-control" id="floatingPassword" name="firstname">
  <label for="floatingPassword">firstname</label>
</div>
<div class="form-floating" >
  <input type="text" class="form-control"  name="lastname">
  <label for="floatingPassword">lastname</label>
</div>
<br>

<button class="w-100 btn btn-lg btn-primary" type="submit" value="ok">Sign-Up</button>
<br>
<?php
echo "<br>";
echo "<center><a type='button' class='btn btn-outline-primary me-2' href='../login/login.php'>Sing-in</a></center>";
?>
</form>
<br>



</div>
</body>
</html>
