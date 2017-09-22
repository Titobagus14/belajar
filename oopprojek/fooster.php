  <div id="tambah" class="modal fade" role="dialog">
        <div class="modal-dialog">
           <div class="modal-content"> 
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Tambah Data Mahasiswa</h4>
              </div>
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
          </div>
      </div>
</section>
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> Terbaru
    </div>
    <strong>Copyright &copy; 2017-2018 <a href="http://almsaeedstudio.com">TitoBagus Studio</a>.</strong> DEVITAAP.
  </footer>
  <!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
