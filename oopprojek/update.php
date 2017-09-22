<?php
   require("koneksi.php");
   require("Crud.class.php");
   include"header.php";

   $db = Database::connect();
   $siswa = new Siswa($db);        
   $siswa->id_mahasiswa = $_GET['id_mahasiswa'];
   $rows = $siswa->select_by_npm()->fetchObject();

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
<div class="box box-primary" style="width: 550px;">
    <div class="box-header with-border">
        <i class="fa fa-graduation-cap"></i> 
        <h3 class="box-title">Update Mahasiswa</h3>
    </div>
     <!-- form start -->
     <form action="crud.php" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
               <div class="box-body">                       
                  <input type="hidden" class="form-control" id="id_mahasiswa" name="id_mahasiswa" value=<?php echo ($rows->id_mahasiswa);?>>
                <div class="form-group">
                  <label class="control-label" for="nama">Nama</label>
                  <input type="text" name="nama" class="form-control" id="nama" value = <?php echo($rows->nama);?>>
                </div>
                <div class="form-group">
                  <label class="control-label" for="nama">Tanggal Lahir</label>
                  <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value = <?php echo($rows->tanggal_lahir);?>>
                </div>
                <div class="form-group">
                  <label class="control-label" for="">Jenis Kelamin</label>
                  <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin" value = <?php echo($rows->jenis_kelamin);?>>
                </div>
                <div class="form-group">
                  <label class="control-label" for="">Jurusan</label>
                  <input type="text" name="jurusan" class="form-control" id="jurusan" value = <?php echo($rows->jurusan);?>>
                </div>
                <div class="form-group">
                  <label class="control-label" for="nama">Alamat</label>
                  <input type="text" name="alamat" class="form-control" id="alamat" value = <?php echo($rows->alamat);?> >
                </div>
                <div class="form-group">
                    <label class="control-label">Upload Foto</label>
                  <input type="file" name="foto">
                </div>
                <div class="modal-foster">
                  <button type="Reset" class="btn btn-danger">Reset</button>
                  <input type="submit" name="update" class="btn btn-success" value="update">
                </div>
              </div>
            </form>
          </div>
<?php
  include "fooster.php";