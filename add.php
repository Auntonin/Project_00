<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="bootstrap/css/signin.css" rel="stylesheet">
</head>
<body>
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

    <form class="form-signin" action="adduser.php" method="post">

<h1 class="h3 mb-3 fw-normal">Please Sign Up</h1>

<div class="form-floating" >
  <input type="text" class="form-control"   name="usernames" >
  <label for="floatingInput">UserName</label>
</div>
<div class="form-floating" >
  <input type="password" class="form-control" id="floatingPassword" name="Password">
  <label for="floatingPassword">Password</label>
</div>
<div class="form-floating" >
  <input type="text" class="form-control" id="floatingPassword" name="firstname">
  <label for="floatingPassword">firstname</label>
</div>
<div class="form-floating" >
  <input type="text" class="form-control" id="floatingPassword" name="lastname">
  <label for="floatingPassword">lastname</label>
</div>
<br>

<button class="w-100 btn btn-lg btn-primary" type="submit" value="ok">Sign Up</button>
</form>
<br>
<iframe width="560" height="315" src="https://www.youtube.com/embed/5oH9Nr3bKfw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<br>



</body>
</html>
