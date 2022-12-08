<?php
session_start();
require_once "condb.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>book_shop</title>
  <!-- CSS only -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>

<body>
  <div class="container">
    <!-- nav bar -->
    <?php
    require_once("menu.php")
      ?>
    <table border="1">
      <tr>

        <td>category</td>
      </tr>
      <?php
        $sql = "SELECT * FROM category";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
      <tr>
        <td>
          <<= $row['cate_id'] ?>
        </td>
        <td>
          <?= $row['cate_name'] ?>
        </td>

      </tr>
      <?php
          }
        } else {
          echo "0 results";
        }
        $conn->close();
        ?>
    </table>
  </div>




  <!-- JavaScript Bundle with Popper -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>