
<body>
  <div class="container">
  
  <input  type="hidden"  id="s_id"  value=" <?= $_SESSION["shop_id"]?> ">

   
    <div class="table-responsive">
      <table id="product_list" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>รหัสสินค้า</th>
            <th>ประเภทสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>ราคาสินค้า</th>
            <th>จำนวน</th>
            <th>รูปภาพ</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
          <tr>
            <th>รหัสสินค้า</th>
            <th>ประเภทสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>ราคาสินค้า</th>
            <th>จำนวน</th>
            <th>รูปภาพ</th>
          </tr>
        </tfoot>
      </table>
    </div>

  </div>
  <script>
    $(document).ready(function () {
        // var cid=$(this).attr("id");
        var url = 'product_list.php'; // ระบุไฟล์ที่ต้องการให้ส่งข้อมูลไปเพื่อตอบกลับมา
        table = $('#product_list').DataTable({
          "destroy": true,
          "paging": true,
          "lengthChange": true,
          "processing": true,
          //"serverSide": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "responsive": true,
          "autoWidth": false,
          "pageLength": 25,
          // ส่งข้อมูล แบบ POST ไปยังไฟล์ ที่กำหนดไว้ใน url

          "ajax": {
            "url": url,
            "type": "POST",
            "data": function (d) {
              d.id = $('#s_id').val();
            }
          },
          "columns": [
            { "data": "product_id" },
            { "data": "cate_id" },
            { "data": "product_name" },
            { "data": "product_price" },
            { "data": "product_qty" },
            { "data": "images" },
          ],
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
        return false;
     

    });

  </script>
</body>

    