<?php include('h.php');?>
<body class="hold-transition skin-purple sidebar-mini">
  <div class="wrapper">
    <!-- Main Header -->
    <?php include('menu.php');?>
    <!-- Left side column. contains the logo and sidebar -->
    

      
    <div class="content-wrapper">
      <section class="content-header">
      <h1>
        <i class="glyphicon glyphicon-user hidden-xs"></i> <span class="hidden-xs">ข้อมูลบุคคลในระบบ</span>
        <a href="member.php?act=add" class="btn btn-primary btn-sm">เพิ่มผู้ใช้งาน</a>
        </h1>
        
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="row">
                <div class="col-sm-12">
                  <div class="box-body">
                  <?php include('manage_shop.php');?>   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </body>
  </html>
<?php include('footer_js.php');?>