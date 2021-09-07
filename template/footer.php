</main>

    </div>
    <footer class="app-footer">
      <div>
        <span>BAYU DWI SUPRIATNA &copy; 2018</span>
      </div>
    </footer>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body text-center"><h5>Klik Logout Untuk Keluar</h5></div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <a class="btn btn-primary" href="action/logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
            <!-- Konfirmasi Hapus Data -->
            <script type="text/javascript" language="JavaScript">
        function konfirmasi()
        {
            var jawab = confirm("Anda Yakin Akan Menghapus Data ?");
            if (jawab == true) 
                return true;
            else 
                return false;
        }
        </script>

    <!-- Bootstrap and necessary plugins-->
    <script src="<?=BASE_URL;?>vendors/popper.js/js/popper.min.js"></script>
    <script src="<?=BASE_URL;?>vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=BASE_URL;?>vendors/pace-progress/js/pace.min.js"></script>
    <script src="<?=BASE_URL;?>vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
    <script src="<?=BASE_URL;?>vendors/@coreui/coreui/js/coreui.min.js"></script>

    <script src="<?=BASE_URL;?>vendors/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?=BASE_URL;?>vendors/datatables/js/dataTables.bootstrap4.js"></script>
    <script src="<?=BASE_URL;?>vendors/datatables/js/dataTables.responsive.min.js"></script>
    <script src="<?=BASE_URL;?>vendors/datatables/js/responsive.bootstrap4.min.js"></script>
    
    <script src="<?=BASE_URL;?>vendors/gijgo/js/gijgo.min.js"></script>
    <script src="<?=BASE_URL;?>vendors/jasny/js/jasny-bootstrap.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="<?=BASE_URL;?>vendors/@coreui/coreui-plugin-chartjs-custom-tooltips/js/custom-tooltips.min.js"></script>
    
    <script src="<?=BASE_URL;?>node_modules/jquery-form-validator/form-validator/jquery.form-validator.min.js">"></script>
  
<script>
  $.validate({
    modules : 'html5 file security'
  });
</script>

    <!-- Datatable -->
    <script type="text/javascript">
      $(document).ready(function () {
        $('#table_id').dataTable();
      });
    </script>
    
    </script>
  </body>
</html>