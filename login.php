
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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   
  </head>
  <body class="text-center">
    

  <form action="loginP.php" method="post">

    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating" >
      <input type="text" class="form-control"   name="usernames" >
      <label for="floatingInput">UserName</label>
    </div>
    <div class="form-floating" >
      <input type="password" class="form-control" id="floatingPassword" name="uPassword">
      <label for="floatingPassword">Password</label>
    </div>
    <br>
    <a href="index.php" type="submit" name="submit" value="ok" >lllll</a>
    <button class="w-100 btn btn-lg btn-primary" type="submit" value="ok">Sign in</button>
  </form>
<br>
<form action="loginP.php" method="post" >
        Username: <input type="text" name="usernames"><br>
        Password: <input type="password" name="passwords"><br>
        <input type="submit" value="OK">
    </form>


    <!-- JavaScript Bundle with Popper -->
<script src="bootstrap/js/bootstrap.min.js" ></script>
  </body>
</html>
