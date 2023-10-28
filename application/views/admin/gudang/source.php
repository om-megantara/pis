  <!-- Bootstrap Core JavaScript -->
  <!-- <script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/jquery.js"></script>
  <script src="<?= base_url('assets/'); ?>js/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/bootstrap-datepicker.js"></script>
  <script src="<?= base_url('assets/'); ?>js/jquery.min.js"></script> -->


  <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
  <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>

  <script>
      $(".input-group.date").datepicker({
          autoclose: true,
          todayHighlight: true
      });
  </script>

  <script>
      $(document).ready(function() {
          $('#data-table').dataTable();
      });
  </script>