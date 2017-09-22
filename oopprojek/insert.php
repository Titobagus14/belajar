<?php
  require("koneksi.php");
  require ("Crud.class.php");
  require("session.class.php");

  $db = Database::connect();
  $data_siswa = new Siswa($db);

  $totalSiswa = $data_siswa->totalSiswa()->fetchObject();
  $siswaLaki = $data_siswa->laki_laki()->fetchObject();
  $siswaPerempuan = $data_siswa->Perempuan()->fetchObject();

  include "header.php";
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="IMG_8110.JPG" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Terbuka</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.php"><i class="fa fa-circle-o"></i> ChartJS</a></li>
          </ul>
          </li>
          <li class="active treeview">
          <a href="insert.php">
            <i class="fa fa-plus" aria-hidden="true"></i><span>Tambah Siswa</span>
          </a>
        </li>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

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
          <div class="info-box bg-red">
            <span class="info-box-icon">
            <i class="fa fa-male"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Data Mahasiswa Laki-laki </span>
              <span class="info-box-number"><?php
                      echo($siswaLaki->jumlahLaki);
                    ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-blue">
            <span class="info-box-icon"><i class="fa fa-male"></i>
            <i class="fa fa-female"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Data Semua Mahasiswa</span>
              <span class="info-box-number"><?php 
                      echo ($totalSiswa->total); 
                    ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
           <span class="info-box-icon"><i class="fa fa-female"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Data Mahasiswa Perempuan</span>
              <span class="info-box-number"><?php
                      echo($siswaPerempuan->jumlahPerempuan);
                    ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
<div class="box box-primary" style="width: 550px;">
    <div class="box-header with-border">
        <i class="fa fa-graduation-cap"></i> 
        <h3 class="box-title">Tambah Mahasiswa</h3>
    </div>
     <!-- form start -->
     <form action="crud.php" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label" for="nis"</td>NIS</label>
                  <input type="text" name="id_mahasiswa" class="form-control" id="id_mahasiswa" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="nama">Nama</label>
                  <input type="text" name="nama" class="form-control" id="nama" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="nama">Tanggal Lahir</label>
                  <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir">
                </div>
                <div class="form-group">
                  <label class="control-label" for="">Jenis Kelamin</label>
                  <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="">Jurusan</label>
                  <input type="text" name="jurusan" class="form-control" id="jurusan" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="nama">Alamat</label>
                  <input type="text" name="alamat" class="form-control" id="alamat" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Upload Foto</label>
                  <input type="file" name="foto">
                </div>
                <div class="modal-foster">
                  <button type="Reset" class="btn btn-danger">Reset</button>
                  <input type="submit" name="insert" class="btn btn-success" value="insert">
                </div>
              </div>
            </form>
          </div>
<?php
  include "fooster.php";
?>