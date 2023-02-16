<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>เวรประจำเดือน</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <link rel="stylesheet" href="toastr.min.css" />

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <span class="brand-text font-weight-light">เวรประจำเดือน</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <br>
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Fixed Layout</h1> -->
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Fixed Layout</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-6">
            <div class="card card-outline card-warning shadow">
                  <div class="card-header">
                  <h3 class="card-title">เลือกแผนก</h3>
                </div>
                <div class="card-body"> 
                      <div class="row">
                        <div class="col-12">
                            <select class="form-control select2" style="width: 100%;" id="PlaceCode" onchange="place();otmain()">
                            <?php
                                include 'connect.php';
                                $sql = "SELECT Description,PlaceCode FROM tbl_place order by Description" ;
                                $result = $conn->query($sql);
                              ?>
                              <option selected >--กรุณาเลือก--</option>
                              <?php while($row = $result->fetch_assoc()) { ?>
                                <option value="<?=$row['PlaceCode']?>"><?=$row['Description'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
              </div>
            </div>

            <div class="col-6">
            <div class="card card-outline card-warning shadow">
                  <div class="card-header">
                  <h3 class="card-title">เจ้าหน้าที่</h3>
                </div>
                <div class="card-body"> 
                      <div class="row">
                        <div class="col-12">
                            <select class="form-control select2" style="width: 100%;" id="otmain2" name="otmain2" onchange="otmain3();">
                            <option selected value="">--เจ้าหน้าที่--</option>";
                            </select>
                        </div>
                    </div>
                </div>
              </div>    
            </div>

        </div>
        
          <div class="row">
            <div class="col-6">
            <div class="card card-outline card-warning shadow">
                  <div class="card-header">
                  <h3 class="card-title">เลือกแผนกย่อย</h3>
                </div>
                <div class="card-body"> 
                      <div class="row">
                        <div class="col-12">
                            <select class="form-control select2" style="width: 100%;" id="Subplace" name="Subplace">
                                <option selected value="0">--เลือกแผนกย่อย--</option>
                            </select>
                        </div>
                    </div>
                </div>
              </div>    
            </div>
            <div class="col-6">
            <div class="card card-outline card-warning shadow">
                  <div class="card-header">
                  <h3 class="card-title">ประเภทเวร</h3>
                </div>
                <div class="card-body"> 
                      <div class="row">
                        <div class="col-12">
                            <select class="form-control select2" style="width: 100%;" id="otmain3" name="otmain3" onchange="ppot()">
                            <option selected value="">--เลือกประเภทเวร--</option>";
                            </select>
                        </div>
                    </div>
                </div>
              </div>
                  
            </div>
          </div>

          <div class="row">
            <div class="col-6">
            <div class="card card-outline card-warning shadow">
                  <div class="card-header">
                  <h3 class="card-title">เวรประจำเดือน</h3>
                </div>
                <div class="card-body"> 
                      <div class="row">
                        <div class="col-12">
                            <select class="form-control select2" style="width: 100%;" id="otmain" name="otmain" onchange="otmain2();">
                                <option selected value="0">--เลือกเวรประจำเดือน--</option>
                            </select>
                        </div>
                    </div>
                </div>
              </div>    
            </div>

            <div class="col-6">
            <div class="card card-outline card-warning shadow">
                  <div class="card-header">
                  <h3 class="card-title">เดือนและวันที่</h3>
                </div>
                <div class="card-body"> 
                      <div class="row">
                        <div class="col-6">
                            <select class="form-control select2" style="width: 100%;" id="mount" name="mount"  onchange="mount()">
                                <option selected value="0">--เลือกเดือน--</option>
                                <?php 

                                    $txt_year = date('Y')+542;
                                    $txt_year1 = date('Y')+543;

                                  ?>
                                  
                                    <option selected value="0">--เลือกเดือน--</option>";
                                    <option value="<?=$txt_year."01" ?>"><?=$txt_year." / "."01"?></option>";
                                    <option value="<?=$txt_year."02" ?>"><?=$txt_year." / "."02"?></option>";
                                    <option value="<?=$txt_year."03" ?>"><?=$txt_year." / "."03"?></option>";
                                    <option value="<?=$txt_year."04" ?>"><?=$txt_year." / "."04"?></option>";
                                    <option value="<?=$txt_year."05" ?>"><?=$txt_year." / "."05"?></option>";
                                    <option value="<?=$txt_year."06" ?>"><?=$txt_year." / "."06"?></option>";
                                    <option value="<?=$txt_year."07" ?>"><?=$txt_year." / "."07"?></option>";
                                    <option value="<?=$txt_year."08" ?>"><?=$txt_year." / "."08"?></option>";
                                    <option value="<?=$txt_year."09" ?>"><?=$txt_year." / "."09"?></option>";
                                    <option value="<?=$txt_year."10" ?>"><?=$txt_year." / "."10"?></option>";
                                    <option value="<?=$txt_year."11" ?>"><?=$txt_year." / "."11"?></option>";
                                    <option value="<?=$txt_year."12" ?>"><?=$txt_year." / "."12"?></option>";
                                    <option value="<?=$txt_year1."01" ?>"><?=$txt_year1." / "."01"?></option>";
                                    <option value="<?=$txt_year1."02" ?>"><?=$txt_year1." / "."02"?></option>";
                                    <option value="<?=$txt_year1."03" ?>"><?=$txt_year1." / "."03"?></option>";
                                    <option value="<?=$txt_year1."04" ?>"><?=$txt_year1." / "."04"?></option>";
                                    <option value="<?=$txt_year1."05" ?>"><?=$txt_year1." / "."05"?></option>";
                                    <option value="<?=$txt_year1."06" ?>"><?=$txt_year1." / "."06"?></option>";
                                    <option value="<?=$txt_year1."07" ?>"><?=$txt_year1." / "."07"?></option>";
                                    <option value="<?=$txt_year1."08" ?>"><?=$txt_year1." / "."08"?></option>";
                                    <option value="<?=$txt_year1."09" ?>"><?=$txt_year1." / "."09"?></option>";
                                    <option value="<?=$txt_year1."10" ?>"><?=$txt_year1." / "."10"?></option>";
                                    <option value="<?=$txt_year1."11" ?>"><?=$txt_year1." / "."11"?></option>";
                                    <option value="<?=$txt_year1."12" ?>"><?=$txt_year1." / "."12"?></option>";
                                    
                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-control select2" style="width: 100%;" id = "date" onchange="qty();">
                                <option selected value="0">--เลือกวันที่--</option>
                                
                            </select>
                        </div>
                    </div>
                </div>
              </div>    
            </div>
          </div>
                    
          <div class="row">
            <div class="col-12">
            <div class="card card-outline card-warning shadow">
                  <div class="card-header">
                  <h3 class="card-title">รายชื่อ</h3>
                </div>
                <div class="card-body"> 
                      <div class="row">
                        <div class="col-12" id="show">
                            
                        </div>
                    </div>
                </div>
              </div>    
            </div>
            
          </div>
          

      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="toastr.min.js"></script>

<?php
  include "script2.php";
?>

</body>
</html>
