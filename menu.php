<header class=" flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
  <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
      <use xlink:href="#bootstrap"></use>
    </svg>
  </a>

  <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
    <li><a href="index.php" class="nav-link px-2 link-secondary">Home</a></li>
    <li><a href="shop.php" class="nav-link px-2 link-dark">Shop</a></li>
    <?php
    if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 1) {
      echo "<li><a href='cart.php' class='nav-link px-2 link-dark'>Cart</a></li>";
    } elseif ((isset($_SESSION['user_level']) && $_SESSION['user_level'] == 2)) {
      echo "<li><a href='my_shop/shop.php' class='nav-link px-2 link-dark'>My Shop</a></li>";
    }


    ?>


    <li><a href="#" class="nav-link px-2 link-dark">Contact</a></li>
    <li style="margin-left: 280px;">
      <form class="mx-2" role="search" action="shop.php" method="post">
        <input type="search" name="keyword" id="search" class="form-control" placeholder="Search..."
          aria-label="Search">
      </form>
    </li>

    <!-- <li> <button class="btn mx-3 btn-outline-primary  ">Search</button> </li> -->
    <div class="text-end">



      <?php
      if (isset($_SESSION["login_name"])) {
        ?>
        <div class="dropdown mx-2 text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle show" data-bs-toggle="dropdown"
            aria-expanded="true">
            <img src="https://cdn-icons-png.flaticon.com/512/1946/1946429.png" alt="mdo" width="32" height="32"
              class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small">
            <li>
              <p class="dropdown-item justify-content-center" href="#">
                <?php
                echo "<strong>$_SESSION[login_name]</strong>"; ?>
              </p>
            </li>
            <li>
              <hr class="dropdown-divider">
              <?php
              if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 0) {
                echo " <li><a class='dropdown-item' href='admin.php'>admin</a></li>";
              }elseif(isset($_SESSION['user_level']) && $_SESSION['user_level'] == 2){
                echo " <li><a class='dropdown-item' href='my_shop/shop.php'>My Shop</a></li>";
              }else{
                echo " <li><a class='dropdown-item' href='order/order.php'>My Cart</a></li>";
              }
              ?>
            </li>
            <li><a class="dropdown-item" href="#">Settings</a></li>


            <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
          </ul>
        </div>
        <?php
      } else {
        // echo "<a type='button' class='btn btn-outline-primary me-2' href='login/login.php'>Login</a>";
        ?>
        <!-- Button trigger modal Login-->
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Login
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <center>
                  <a type='button' class='btn btn-outline-primary m-2 col-3'
                    href='login/login_user.php'>Login-User</a><br>
                  <a type='button' class='btn btn-outline-primary m-2 col-3' href='login/login_shop.php'>Login-Shop</a>
                </center>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Button trigger modal sign-up-->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
          Sign-up
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign-up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <center>
                  <a type='button' class='btn btn-outline-primary m-2 col-4'
                    href='adduser/add_user.php'>Sign-up-User</a><br>
                  <a type='button' class='btn btn-outline-primary m-2 col-4' href='adduser/add_shop.php'>Singn-up-Shop</a>
                </center>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>


        <?php
        // echo "<a type='button' class='btn btn-primary' href='adduser/add.php'>Sign-up</a>";
      
      }
      ?>
    </div>
  </ul>





</header>