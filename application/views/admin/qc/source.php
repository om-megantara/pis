<link rel="stylesheet" href="<?= base_url('assets/'); ?>tabel-qc.css" />
<script src="<?= base_url('assets/'); ?>js/jquery.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap-datepicker.js"></script>
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

<script>
    function pengawas() {
        var timx = document.getElementById("frm_galv").tim.value;
        if (timx == "A") {
            document.getElementById("nama_pengawas").value = 'Andik';
        } else if (timx == "B") {
            document.getElementById("nama_pengawas").value = 'Komari';
        } else {
            document.getElementById("nama_pengawas").value = 'Sari';

        }
    }

    function total_bahan() {
        var bahan_bawl = document.getElementById("frm_galv").bahan_baw.value;
        var bahan_bakh = document.getElementById("frm_galv").bahan_bak.value;

        document.getElementById("tot_bahanb").value = Number(bahan_bawl) + Number(bahan_bakh);

    }
</script>

<script>
    /*function pengawas(){
  var timx=document.getElementById("frm_wdpl2").tim.value;
  if (timx=="A")
    {
        document.getElementById("nama_pengawas").value = 'Andik'; 
    }
  else if (timx=="B")
    {
       document.getElementById("nama_pengawas").value = 'Komari';
    }
	else
    {
       document.getElementById("nama_pengawas").value = 'Sari';
      
    }
}*/
    function total_bahan() {
        var bahan_bawl = document.getElementById("frm_wdpl2").bahan_baw.value;
        var bahan_bakh = document.getElementById("frm_wdpl2").bahan_bak.value;

        document.getElementById("tot_bahanb").value = Number(bahan_bawl) + Number(bahan_bakh);

    }
</script>

<script>
    function pengawas() {
        var timx = document.getElementById("frm_qckd").tim.value;
        if (timx == "A") {
            document.getElementById("nama_pengawas").value = 'Andik';
        } else if (timx == "B") {
            document.getElementById("nama_pengawas").value = 'Komari';
        } else {
            document.getElementById("nama_pengawas").value = 'Sari';

        }
    }

    function total_bahan() {
        var bahan_bawl = document.getElementById("frm_qckd").bahan_baw.value;
        var bahan_bakh = document.getElementById("frm_qckd").bahan_bak.value;

        document.getElementById("tot_bahanb").value = Number(bahan_bawl) + Number(bahan_bakh);

    }
</script>