<!--<script src="js/jquery.js"></script>-->

<!-- Bootstrap Core JavaScript -->
<!--<script src="js/bootstrap.min.js"></script>-->
<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap-datepicker.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery.min.js"></script>


<script>
  $(document).ready(function() {
    $('#data-table').dataTable();
  });
</script>
<script>
  $(".input-group.date").datepicker({
    autoclose: true,
    todayHighlight: true
  });
</script>