
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
  
    
  <form class="form-signin" action="loginP.php" method="post">

    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating" >
      <input type="text" class="form-control"   name="usernames" >
      <label for="floatingInput">UserName</label>
    </div>
    <div class="form-floating" >
      <input type="password" class="form-control" id="floatingPassword" name="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <br>
    
    <button class="w-100 btn btn-lg btn-primary" type="submit" value="ok">Sign in</button>
  </form>
<br>



    <!-- JavaScript Bundle with Popper -->
<script src="../bootstrap/js/bootstrap.min.js" ></script>
  </body>
</html>
