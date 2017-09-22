<?php
  require("koneksi.php");
  require ("Crud.class.php");
  require("session.class.php");  
	
  include"header.php";
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
        </div>
        <!-- /.col -->
        <!-- fix for small devices only -->
        <div class="col-md-4 col-sm-6 col-xs-12">
        </div>
        <!-- /.col -->
      </div>
<div class="box box-primary" style="width: 400px;">
   <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" img src="IMG_8110.JPG" alt="User profile picture">

              <h3 class="nama text-center"><?php echo ($_SESSION['id_mahasiswa']) ?></h3>

              <p class="text-muted text-center">Software Engineer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
          </div> 
<?php
  include "fooster.php";
?>