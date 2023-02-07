<header class=" flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
  <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
      <use xlink:href="#bootstrap"></use>
    </svg>
  </a>

  <ul   class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
    <li><a href="index.php" class="nav-link px-2 link-secondary">Home</a></li>
    <li><a href="shop.php" class="nav-link px-2 link-dark">Shop</a></li>
    <li><a href="cart.php" class="nav-link px-2 link-dark">Cart</a></li>
    <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
    <li><a href="#" class="nav-link px-2 link-dark">Contact</a></li>
    <li style="margin-left: 280px;">
    <form class="mx-2" role="search" action="shop.php" method="post">
          <input type="search" name="keyword" id="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form></li>
      
        <!-- <li> <button class="btn mx-3 btn-outline-primary  ">Search</button> </li> -->
        <div class="text-end">

        <!-- <div class="dropdown mx-2 text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle show" data-bs-toggle="dropdown" aria-expanded="true">
            <img src="https://cdn-icons-png.flaticon.com/512/1946/1946429.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small show" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 34.4444px);" data-popper-placement="bottom-end">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div> -->
    <?php
    if (isset($_SESSION["login_name"])) {
      echo "<strong> $_SESSION[login_name] </strong>";
      if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 0) {
        echo "<a type='button' class='btn btn-outline-primary me-2' href='admin.php'>admin</a>";
      }

      echo "<a type='button' class='btn btn-outline-primary me-2' href='logout.php'>Logout</a>";

    } else {

      echo "<a type='button' class='btn btn-outline-primary me-2' href='login/login.php'>Login</a>";
      ?>
      <div class="modal">
        <div class="modal-bg"></div>
        <div class="modal-card">
          
        </div>
      </div>
      <?php
      echo "<a type='button' class='btn btn-primary' href='adduser/add.php'>Sign-up</a>";

    }
    ?>
  </div>  
  </ul>
  



  
</header>