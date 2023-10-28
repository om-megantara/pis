<script src="<?= base_url('assets/'); ?>js/dual/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>dual/jquery.bootstrap-duallistbox.js"></script>

<script>
    var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox();
    $("#demoform5m").submit(function() {
        var lok = $('[name="lokasi"]').val();
        var isi = $('[name="duallistbox_demo1[]"]').val();
        var tgl = $('[name="txttgl"]').val();
        //alert (lok);
        if (tgl == "") {
            alert('Tanggal masih kosong, belum dipilih!');
            return false;
        } else if (lok == "0") {
            alert('Lokasi belum dipilih!');
            return false;
        } else if (isi <= 0) {
            alert('Tidak ada kode barang yang dipilih!');
            return false;
        } else {
            return true;
        }
    });
</script>


<script>
    var demo1 = $('select[name="duallistbox_demo2[]"]').bootstrapDualListbox();
    $("#demoform5p").submit(function() {
        //window.location.href="?p=mut-gdgkp-proses&kd="+$('[name="duallistbox_demo2[]"]').val();
        var sts = $('[name="status_brgp"]').val();
        var isi = $('[name="duallistbox_demo2[]"]').val();
        var tgl = $('[name="txttgl"]').val();
        //alert (sts);
        if (tgl == "") {
            alert('Tanggal masih kosong, belum dipilih!');
            return false;
        } else if (sts == "0") {
            alert('Status Barang belum dipilih!');
            return false;
        } else if (isi <= 0) {
            alert('Tidak ada kode barang yang dipilih!');
            return false;
        } else {
            return true;
        }
    });
</script>
<script type="text/javascript">
    function cek_lok() {
        var sup = document.getElementById("frm_gdgzn").lokasi.value;
        var lokasi = $("#lokasi").val();
        $.ajax({
            url: '<?= base_url('gudang/ajax_zn'); ?>',
            data: "lokasi=" + lokasi,
        }).success(function(data) {
            var json = data,
                obj = JSON.parse(json);

            $('#duallistbox_demo2[]').val(obj.duallistbox_demo2);
            //$('#txt_berat').val(obj.txt_berat);
            //$('#txt_berat_nsm').val(obj.txt_berat_nsm);


        });
    }
</script>