<?php
  require("koneksi.php");
  require ("Crud.class.php");
  require("session.class.php");
  require("paginator.class.php");

  $db = Database::connect();
  $user = new Admin($db);

  if(!$user->loggedin()){
    header("location:index_login.php");
  }

  $data_siswa = new Siswa($db);
  $rows = $data_siswa->select();
  $totalSiswa = $data_siswa->totalSiswa()->fetchObject();
  $siswaLaki = $data_siswa->laki_laki()->fetchObject();
  $siswaPerempuan = $data_siswa->Perempuan()->fetchObject();

  $limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 10;
  $page  = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
  $links = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 5;
  $like  = ( isset( $_GET['q'] ) ) ? $_GET['q'] : 0;

  $query = "SELECT * FROM murid WHERE id_mahasiswa LIKE '%$like%' or nama LIKE '%$like%' or tanggal_lahir LIKE '%$like%' or jenis_kelamin LIKE '%$like%' or alamat LIKE '%$like%'";

  $Paginator = new Paginator($db, $query);
  $results = $Paginator->getData($page, $limit );

   include("header.php");
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
	<div class="box box-success">
       <div class="box-header with-border">
		<div class="row">
			<div class="col-sm-6">
				<i class="fa fa-graduation-cap"></i>
				<h3 class="box-title">Tabel Mahasiswa</h3>
			</div>
	<div class="col-sm-6">
		<div class="col-sm-offset-8">
      		<td>
          <button type="button" class="btn btn-blocks btn-success btn-flat" data-toggle="modal" data-target="#tambah" style="width: 175px;">
      <i class="fa fa-plus"></i> Tambah Data</button>
      </td> 
		 </div>
	</div>
	</div>
<div class="box-body">
	<div class="example1_wrapper" class="dataTable_wrapper form-inline dt-booststrap">
		<div class="row">
			<div class="col-sm-6">
				<div class="dataTable_length" id="example1_length">
				<br>
				<label>Show
          <select name="limit" style="cursor:pointer" class="form-control input-sm" onchange="this.form.submit()">
              <option value="10"
              <?php 
                if($limit == 10){ 
                    echo " selected"; 
                 }
                  ?>>10
                 </option>
                  <option value="25"
              <?php 
                if($limit == 25){
                    echo " selected"; 
                  }?>>25
                </option>
                  <option value="50"
              <?php 
                if($limit == 50){
                    echo " selected"; 
                  }?>>50
                 </option>
                   <option value="100"
              <?php 
                if($limit == 100){
                    echo " selected"; 
                  }?>>100
                </option>
          </select> entries</label>		
			</div> 
		</div>
                <br>
		<div class="col-sm-6">
			<div id="example1_filter" class="dataTable_filter">
				<div class="col-sm-offset-8">
				<form action="" method="GET">
					<label>Search:
					 <input type="text" id="q" name="q" class="from-control input-sm" placeholder="">
				</form>
				</div>
			</div>
		</div>
	</div>
<br>
	<div class="row">
		<div class="col-sm-12">
			<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 130px;">Foto</th>
                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 150px;">NIS</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 160px;">Nama</th>
                <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" aria-sort="descending" style="width: 150px;">Tanggal_lahir</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 150px;" >Jenis kelamin</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 150px;">Jurusan</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 200px;">Alamat</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="CSS grade: activate to sort column ascending" style="width: 100px;">Action</th>
                </tr>
                </thead>
               <tbody>
              <?php
					while($aksi = $results->data->fetchObject()){
					echo "<tr>";
					echo "<td><img style='width:90px;height:90px;'src='file/".$aksi->foto."'></td>
					<td>".$aksi->id_mahasiswa."
					</td><td>".$aksi->nama."
					</td><td>".$aksi->tanggal_lahir."
					</td><td>".$aksi->jenis_kelamin."
					</td><td>".$aksi->jurusan."
					</td><td>".$aksi->alamat."
			   </td>";
			   echo '<td><a href=crud.php?id_mahasiswa='.$aksi->id_mahasiswa.'&&hapus class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></td>';	 
			   echo '<td><a href=update.php?id_mahasiswa='.$aksi->id_mahasiswa.' class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-pencil"></i></td>';	 
			   echo"</tr>";
			}
		?>
				</tbody>
				</table>				
		</div>		
	</div>
	<div class="row">
		<div class="col-sm-5">
			<div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
            <span class="pagination-info" style="margin-left: 20px;"><?php echo "Showing ". (( $results->total == 0
                ) ? 0 : (($results->page-1)*$results->limit)+1)." to ". (($results->page*$results->limit > $results
                ->total) ? $results->total : $results->page*$results->limit ) ." of ".$results->total ." rows"; ?>
             </span>   
      </div></div>
				<div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                <!--<div class="col-sm-offset-5">-->
                    <div class="fixed-table-pagination" style="display: block; margin-top: 25px">
                      <form action="" method="get">
                        <div class="pull-left pagination-detail">
                      </div>
                      <div class="pull-right pagination" style="margin-right: 20px;">
                        <div class="pull-right pagination" style="margin-right: 20px;">
                          <?php 
                            echo $Paginator->createLinks( $links); 
                          ?>
                        </div>
                      </form>
                    </div>

                    <div class="clearfix"></div>

                </div>
              </div>
		</div>
</form>
	</br>
		</div>
	</div>
	</div>	
<?php
  include "fooster.php";
?>
