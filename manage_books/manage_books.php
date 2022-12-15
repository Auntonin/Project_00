<?php
session_start();
require_once('db_connect.php');
if($_SESSION['member_id']!="")
{
  if(isset($_POST['process']))
  {
    try
    {
          $db->autocommit ( false );
          $db->begin_transaction(); 
          $as_code = $_POST["as_code"];
          $as_name = $_POST["as_name"];
          $cate = $_POST["cate"];
          $source = $_POST["source"];
          $as_qty = $_POST["as_qty"];
          $as_unit = $_POST["as_unit"];
          $as_price = $_POST["as_price"];
          $nowtime = date('Y-m-d H:i:s');
          $as_detail = $_POST["as_detail"];
          $sql = 'INSERT INTO book (as_code, as_name, cate_id, src_id, as_qty, as_unit, as_price, as_create, as_modify, as_detail) VALUES(?,?,?,?,?,?,?,?,?,?)';
          $stmt = $db->prepare($sql);
          $stmt->bind_param("ssiiisdsss", $as_code, $as_name, $cate,$source,
          $as_qty, $as_unit, $as_price, $nowtime, $nowtime, $as_detail);
          if($stmt->execute())  // ถ้านำข้อมูลเข้าสำเร็จ
          {
            $id = $stmt->insert_id;  // หา Auto ID ล่าสุด
            if(!empty($_FILES["as_picture"]["name"]))
            {
                $targetDir = "imgs/"; // File upload path
                chmod($targetDir, 777); 
                $userfile_extn = substr($_FILES['as_picture']['name'], strrpos($_FILES['as_picture']['name'], '.'));
                $fileName = $id.$userfile_extn;
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                // Allow certain file formats
                $allowTypes = array('jpg','png','jpeg');
                if(in_array($fileType, $allowTypes))
                {
                    if(move_uploaded_file($_FILES["as_picture"]["tmp_name"], $targetFilePath)) // Upload file to server
                    {
                        $images = $targetFilePath;
                        $new_images = $targetDir."resize/".$fileName;
                        $width=150; //*** Fix Width & Heigh (Auto caculate) ***//
                        $size=GetimageSize($images);
                        $height=round($width*$size[1]/$size[0]);
                        $images_orig = ImageCreateFromJPEG($images);
                        $photoX = ImagesX($images_orig);
                        $photoY = ImagesY($images_orig);
                        $images_fin = ImageCreateTrueColor($width, $height);
                        ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                        ImageJPEG($images_fin,$new_images);
                        ImageDestroy($images_orig);
                        ImageDestroy($images_fin);
                        // Insert image file name into database
                        $update = $db->query("UPDATE asset SET as_picture='$fileName' WHERE as_id=$id");
                        if($update)
                        {
                          alert("เพิ่มรูปภาพสำเร็จ");  
                        }
                        else
                        { 
                            alert("เพิ่มรูปภาพไม่สำเร็จ");
                        }
                    }
                    else
                    {
                      alert("Sorry, cannot move upload file.");
                    }
                }
                else
                {
                  alert('Sorry, only JPG, JPEG, PNG files are allowed to upload.');
                }
            }
            // $db->query("COMMIT");
            $db->commit();   
          }
    }
    catch (Exception $ex)
    {
      // $db->query("ROLLBACK");
      $db->rollback();
      echo "ไม่สามารถดำเนินการได้ ! ".$ex->getMessage();
    }
    finally
    {
      $db->autocommit (true);
    }
  } // End post process
} // End isset session



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Book</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="fonts/thsarabunnew.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="jquery.dataTables.min.js"></script>
</head>
<body>
<?php require_once('nav.php'); ?>

<div class="container-fluid">
<br>
<button type="button" class="btn btn-outline-info my-2 my-sm-0" data-toggle="modal"  data-target="#insertAsset"><i class="fa fa-reorder"></i> เพิ่มข้อมูล</button>

<br>
<font size="2">
<?php
?>
<h1>รายการหนังสือเรียนฟรี</h1>
<?php
  $data="SELECT pub_id,pub_name FROM publisher ORDER BY pub_name";
  $sel=isset($_SESSION['src_show'])?$_SESSION['src_show']:0;
?>
<form> <select name="cate" onchange='document.location.href="change_src.php?page=manage_books&src_id="+this.options[this.selectedIndex].value;'>
<option value="0">ทั้งหมด</option>
<?php gen_select($data, $sel); ?></select>
</form>

<table id="example" class="display table-bordered table-striped thsarabunnew" style="width:100%">
<thead class="thead-light">
    <tr align="middle">
    <th>ลำดับที่</th>
        <th>ข้อมูลการอนุญาต</th>
        <th>รหัสวิชา</th>
        <th>ชื่อวิชา</th>
        <th>ชื่อผู้แต่ง</th>
        <th>สำนักพิมพ์</th>
        <th>กระดาษ</th>
        <th>พิมพ์</th>
        <th>ขนาด</th>
        <th>จำนวนหน้า</th>
        <th>ราคา</th>
        <th>แก้ไข</th>
        <th>ลบ</th>
    </tr>
</thead>
<tbody>
<?php
$sql="SELECT
books.book_id,
books.book_code,
books.book_name,
books.book_author,
publisher.pub_name,
paper_type.paper_type_name,
paper_size.paper_size_name,
print_type.print_type_name,
books.book_page,
books.book_price,
books.book_image,
books.book_file,
books.allow_no,
books.allow_year
FROM
books
INNER JOIN publisher ON books.pub_id = publisher.pub_id
INNER JOIN paper_type ON books.paper_type_id = paper_type.paper_type_id
INNER JOIN paper_size ON books.paper_size_id = paper_size.paper_size_ie
INNER JOIN print_type ON books.print_type_id = print_type.print_type_id ";

if($_SESSION['src_show']!='0')
  $sql.=" WHERE books.pub_id = ".$_SESSION['src_show'];
$sql.=" ORDER BY 2,3";
$as_result = $db->query($sql);
$cnt_as=1;
while($rs=mysqli_fetch_assoc($as_result))
{
?>
    <tr align="middle">
    <td><?=$cnt_as?></td>
        <td><?=$rs['allow_no']."/".$rs['allow_year']?></td>
        <td><?=$rs['book_code']?></td>
        <td><?=$rs['book_name']?></td>
        <td><?=$rs['book_author']?>
        <td><?=$rs['pub_name']?></td>
        <td><?=$rs['paper_type_name']?></td>
        <td><?=$rs['paper_size_name']?>
        <td><?=$rs['print_type_name']?></td>
        <td><?=$rs['book_page']?></td>
        <td><?=number_format($rs['book_price'])?></td>
        <td><button type="button" class="btn btn-outline-warning my-2 my-sm-0" data-toggle="modal"  data-target="#editAsset" onclick="return show_edit_asset(<?php echo $rs['book_id']?>);" ><i class="fa fa-reorder"></i> Update</button>
        </td>
        <td><button type="button" class="btn btn-outline-danger my-2 my-sm-0" data-toggle="modal"  data-target="#deleteAsset" onclick="return delete_asset(<?php echo $rs['book_id']?>);" ><i class="fa fa-reorder"></i> Delete</button>
        </td>
    </tr>
<?php
}
?>
</tbody>
</table>
</font>
</div>

<script>
  function show_edit_asset(id){
	$.ajax({
		type:"POST",
		url:"edit.php",
		data:{asset_id:id},
		success:function(data){
			$("#editdata").html(data);
		}
	});
	return false;
}

function delete_asset(id){
	$.ajax({
		type:"POST",
		url:"edit.php",
		data:{delete_asset:id},
		success:function(data){
			$("#deletedata").html(data);
		}
	});
	return false;
}

$(document).ready(function() {
    $('#example').DataTable( {
        "destroy": true,
        "paging": true,
        "lengthChange": true,
        "processing": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "responsive": true,
        "autoWidth": false,
        "pageLength": 25,
        "language": {
          "processing": '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">กำลังค้นหาข้อมูล...</span> ',
          "lengthMenu": "แสดง _MENU_ แถวต่อหน้า",
          "zeroRecords": "ไม่มีข้อมูล",
          "info": "กำลังแสดงข้อมูล _START_ ถึง _END_ จาก _TOTAL_ รายการ",
          "search": "ค้นหา:",
          "infoEmpty": "ไม่มีข้อมูลแสดง",
          "infoFiltered": "(ค้นหาจาก _MAX_ total records)",
          "paginate": {
            "first": "หน้าแรก",
            "last": "หน้าสุดท้าย",
            "next": "หน้าต่อไป",
            "previous": "หน้าก่อน"
          }
        }
    });
} );
</script>

<!-- Insert Modal -->
<div class="modal fade" id="insertAsset" tabindex="-1" role="dialog" aria-labelledby="viewAssetTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle"><b>แบบฟอร์มเพิ่มข้อมูล</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form action="#" method="POST" enctype="multipart/form-data">
<div class="form-group">
        <label for="as_code">รหัสวิชา</label>
        <input type="text" class="form-control" id="as_code" name="as_code">
    </div>
    <div class="form-group">
        <label for="as_name">ชื่อวิชา</label>
        <input type="text" class="form-control" id="as_name" name="as_name" required>
    </div>
    <div class="form-group">
        <label for="as_name">ชื่อผู้แต่ง</label>
        <input type="text" class="form-control" id="as_name" name="as_name" required>
    </div>
    <div class="form-group">
        <label for="publisher">สำนักพิมพ์</label>
        <select class="form-control" name="publisher" id="publisher">
            <?php
            $data="SELECT pub_id as id,pub_name as text FROM publisher";
            gen_select($data, $sel); ?>
        </select>
    </div>
    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label for="paper_type">ประเภทกระดาษ</label>
                <select class="form-control" name="paper_type" id="paper_type">
                    <?php
                    $data="SELECT paper_type_id as id,paper_type_name as text FROM paper_type";
                    gen_select($data, $sel); ?>
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="print_type">ระบบสี</label>
                <select class="form-control" name="print_type" id="print_type">
                <?php
                $data="SELECT print_type_id as id,print_type_name as text FROM print_type";
                gen_select($data, 3); ?>
                </select>
            </div>
        </div>
        <div class="col">
          <div class="form-group">
              <label for="paper_size">ขนาดกระดาษ</label>
              <select class="form-control" name="paper_size" id="paper_size">
            <?php
            $data="SELECT paper_size_id as id,paper_size_name as text FROM paper_size";
            gen_select($data, 1); ?>
        </select>
        </div>
    </div>
</div>
    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label for="book_page">จำนวนหน้า</label>
                <input type="number" class="form-control" id="book_page" name="book_page" required>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="as_unit">หน่วยครุภัณฑ์</label>
                <input type="text" class="form-control" id="as_unit" name="as_unit" required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="as_price">ราคาต่อหน่วยครุภัณฑ์</label>
        <input type="number" class="form-control" id="as_price" name="as_price" required>
    </div>
    <div class="form-group">
        <label for="as_detail">รายละเอียด</label>
        <textarea class="form-control" name="as_detail" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label for="as_picture">รูปภาพ</label>
        <input type="file" id="as_picture" name="as_picture">
    </div>
    <input type="hidden" id="process" name="process" value="add">
    
    <br><input type="submit" class="btn btn-primary" value="ส่งข้อมูล"> <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
</form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editAsset" tabindex="-1" role="dialog" aria-labelledby="viewAssetTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">แบบฟอร์มแก้ไขข้อมูล</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="editdata"></div>
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteAsset" tabindex="-1" role="dialog" aria-labelledby="viewAssetTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">แบบฟอร์มแก้ไขข้อมูล</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="deletedata"></div>
      </div>
    </div>
  </div>
</div>

</body>

</html>


<?php
}
else
{
  alert('กรุณาเข้าสู่ระบบก่อน');
  go("login.php");
  exit ();

}
?>