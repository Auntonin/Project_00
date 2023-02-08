<?php
session_start();
if (isset($_SESSION['login_naem'])) {
  header("location : ../index.php");
}
else if (isset($_POST['sname'])) {

    require_once "../condb.php";
    $sname = $_POST['sname'];
    $email = $_POST['email'];
    $password = $_POST['Password'];
    $detail = $_POST['detail'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $subdistrict = $_POST['subdistrict'];
   

    if (trim($sname) != "") {
        $sql = "INSERT INTO shop VALUES(0,'$sname','$email','$password','$detail','$province','$district','$subdistrict','2')";
        if ($conn->query($sql)) {
            $_SESSION["login_name"] = $sname;
            header("location: ../index.php");
            echo $sql;
        } elseif (trim($password) != "") {
            header("location: add_shop.php");
            echo 5;
        } else {
            echo "No!";
            header("location: add_shop.php");
        }
    } else {
        echo "3!";
        header("location: add_shop.php");
    }
} else { echo "4";
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        crossorigin="anonymous">
        <script src="../bootstrap/js/jquery-3.5.1.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
<div>
    <form class="form-signin" action="" method="post">

      <h1 class="h3 mb-3 fw-normal">Please Sign Up</h1>

      <div class="form-floating">
        <input type="text" class="form-control my-2" name="sname">
        <label for="ShopName">ShopName</label>
      </div>
      <div class="form-floating">
        <input type="email" class="form-control my-2" name="email">
        <label for="Email">Email</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control my-2" name="Password">
        <label for="Password">Password</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control my-2" name="detail">
        <label for="detail">Detail</label>
      </div>
     
      <div class="container" style="margin-top: 25px;">
       
       <div class="row">

           <div class="col-12">
               <label class="control-label">จังหวัด</label>
               <select class="form-control" placeholder="จังหวัด" name="province" id="province"></select>
           </div>
           <div class="col-12">
               <label class="control-label">อำเภอ/เขต</label>
               <select class="form-control" placeholder="อำเภอ/เขต" name="district" id="district">
                   <option value="">เลือก</option>
               </select>

           </div>
           <div class="col-12">
               <label class="control-label">ตำบล/แขวง</label>
               <select class="form-control" placeholder="ตำบล/แขวง" name="subdistrict" id="subdistrict">
                   <option value="">เลือก</option>
               </select>
           </div>

       </div>

</div>

      <br>
      <center>
      <a type="button" class='btn btn-lg btn-primary me-2' href='../login/login_shop.php'>Sing-in</a>
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
  </div>
  <script>
        $(document).ready(function () {
            // $('#district').hide();
            $('#province').empty().append('<option value="">เลือก</option>');
            // $('#province').empty();
            $.ajax({
                dataType: "json",
                type: 'POST',
                url: '../service/ajax.province.php',
                success: function (data) {
                    $.each(data, function (key, val) {
                        $('#province').append('<option value=' + val.code + '>' + val.name + '</option>');
                    });
                    $('#province').select2();
                    $('#district').select2();
                    $('#subdistrict').select2();
                }
            });

            /****** เลือกจังหวัด *******/
            $('#province').on('change', function () {
                // $('#district').show();
                if ($('#district').length > 0) {
                    callDistrict($(this).val(), null);
                }
            });

            /****** เลือกอำเภอ *******/
            $('#district').on('change', function () {
                if ($('#subdistrict').length > 0) {
                    callSubDistrict($(this).val(), null);
                }
            });
        });

        function callDistrict(proVinceId, selector) {
            $('#district').empty().append('<option value="">เลือก</option>');
            if ($('#subdistrict').length > 0) {
                $('#subdistrict').empty().append('<option value="">เลือก</option>');
            }

            $.ajax({
                dataType: "json",
                type: 'POST',
                url: '../service/ajax.district.php',
                data: {
                    'id': proVinceId
                },
                success: function (data) {
                    $.each(data, function (key, val) {
                        selected = (val.code == selector) ? 'selected' : '';
                        $('#district').append('<option value=' + val.code + ' ' + selected + '>' + val.name + '</option>');
                    });
                    $('#district').select2();
                }
            });
        }

        function callSubDistrict(disTrictId, selector) {
            $('#subdistrict').empty().append('<option value="">เลือก</option>');

            $.ajax({
                dataType: "json",
                type: 'POST',
                url: '../service/ajax.subdistrict.php',
                data: {
                    'id': disTrictId
                },
                success: function (data) {
                    $.each(data, function (key, val) {
                        selected = (val.code == selector) ? 'selected' : '';
                        $('#subdistrict').append('<option value=' + val.code + ' ' + selected + '>' + val.name + '</option>');
                    });
                    $('#subdistrict').select2();
                }
            });
        }
    </script>
</body>

</html>

<?php
}
?>