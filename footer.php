</div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      
      <p style="color: navy;">ส่วนงานพัฒนาเทคโนโลยีดิจิทัล สำนักเทคโนโลยีดิจิทัล</p>
    </div>
    <strong style="color: navy;">องค์การคลังสินค้า กระทรวงพาณิชย์ &copy; 2567</strong> 
   <b style="color: navy;">| Version 1 . 2 </b>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->


<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="assets/plugins/bootstrap-tagsinput/tagsinput.js?v=1"></script>
<!-- Select2 -->
<script src="assets/plugins/select2/js/select2.full.min.js"></script>

<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="assets/dist/js/demo.js"></script> -->


<script>
  $(document).ready(function () {
    //$('.sidebar-menu').tree();
    //$('.select2').select2();
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    })
  })
</script>




<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

