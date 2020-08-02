  <!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url("assets/")?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url("assets/")?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url("assets/")?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url("assets/")?>dists/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url("assets/")?>dists/js/demo.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url("assets/")?>dists/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url("assets/")?>dists/js/demo.js"></script>
<!-- page script -->
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url("assets/")?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url("assets/")?>plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url("assets/")?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url("assets/")?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url("assets/")?>plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url("assets/")?>dists/js/pages/dashboard2.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url("assets/")?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url("assets/")?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url("assets/")?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url("assets/")?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>