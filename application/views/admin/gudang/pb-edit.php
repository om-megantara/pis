<html lang="en">
<!-- <head>
<?php
// include "koneksi.php";
include "header.php";
// $kd_edit =mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_GET['kd'],ENT_QUOTES))));
// $qcdata=mysql_fetch_array(mysql_query("SELECT * FROM gdg_pb where kd_pb='$kd_edit'")) or die(mysql_error());

// $tgl = $qcdata['tanggal_masuk'];
// $kode = $qcdata['kode'];
// $no_kode = $qcdata['no_kode'];
// $berat = $qcdata['Berat'];
// $ket = $qcdata['keterangan'];
?>
</head> -->

<body>


    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try {
                ace.settings.check('breadcrumbs', 'fixed')
            } catch (e) {}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="dash.php?hp=home">Home</a>
            </li>
            <li class="active">Input Zn</li>
            <!--<li class="active">Input Data Bahan Drawing</li>-->
        </ul><!-- /.breadcrumb -->
    </div>

    <div class="page-content">
        <!-- #section:settings.box -->
        <?php //include "container.php"; 
        ?>

        <!-- /section:settings.box -->
        <div class="page-header">
            <h1>
                Input Zn
            </h1>
        </div><!-- /.page-header -->
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading 
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Input Data Bahan Drawing
                        </h1>
                        <!--<ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Forms
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <form id="frm_gdgpb" name="frm_gdgpb" action="<?= base_url('gudang/update-pb'); ?>" method="POST">
                        <?php foreach ($tampilpb as $tpb) : ?>
                            <input type="hidden" name="kd_pb" class="form-control" value="<?= $tpb->kd_pb ?>">
                            <!-- ----------------------------------------------------Header------------------------------------------ -->
                            <div class="col-lg-12">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Supplier</label>
                                        <select class="form-control" onchange="cek_database()" id="txt_sup" name="txt_sup" disabled="">
                                            <option value="<?php echo $tpb->kode; ?>"><?php echo $tpb->kode; ?></option>
                                            <option value="AZ">AZ</option>
                                            <option value="KZ">KZ</option>
                                            <!--<option value="1">1</option>
									<option value="2">2</option>-->
                                        </select>
                                    </div>
                                </div>
                                <!--<tr><td>NIP</td><td> <select onchange="cek_database()" id="nip2" name="nip2">
							<option value='' selected>- Pilih -</option>
							<?php
                            //include "koneksi.php";
                            //include "auth/koneksi.php";
                            // $pegawai = mysql_query("SELECT * FROM galvanis");
                            // while ($row = mysql_fetch_array($pegawai)) {
                            echo "<option value='$row[kd]'>$row[kd]</option>";

                            ?>
							</select></td></tr>-->

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Kode Barang</label>
                                        <input class="form-control" id="txt_kode" name="txt_kode" onchange="SelisihBerat()" readonly value="<?php echo $tpb->no_kode; ?>">
                                        <!--<p class="help-block">Example block-level help text here.</p>-->
                                    </div>
                                </div>

                                <div class="row"></div>
                                <div class="col-lg-3">
                                    <label>Tanggal Masuk Gudang</label>
                                    <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                        <!--<input class="form-control" type="text" name="txttgl" readonly="readonly">-->
                                        <input class="form-control date-picker" name="txttgl" id="txttgl" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Masuk Gudang" value="<?php echo $tpb->tanggal_masuk; ?>" />
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Berat Barang</label>
                                        <input class="form-control" id="txt_berat" name="txt_berat" required value="<?php echo $tpb->Berat; ?>">
                                        <!--<p class="help-block">Example block-level help text here.</p>-->
                                    </div>
                                </div>
                                <div class="row"></div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input class="form-control" id="txt_keterangan" name="txt_keterangan" value="<?php echo $tpb->keterangan; ?>">
                                        <!--<p class="help-block">Example block-level help text here.</p>-->
                                    </div>
                                </div>


                            </div>

                            <div class="col-lg-6">
                                <!--<a href="?p=gal-simpan" class="btn btn-default">Simpan</a> <br/><br/>-->
                                <button type="submit" class="btn btn-default">Simpan</button>
                                <!--<button type="reset" class="btn btn-default">Reset Button</button>-->

                            </div>

                        <?php endforeach; ?>

                    </form>
                    <!--</div>-->

                </div>
                <!-- /#page-wrapper -->

                <script>
                    function bahan() {
                        var bhnx = document.getElementById("frm_gdgpb").txt_sup.value;
                        if (bhnx == "WR") {
                            document.getElementById("txt_diameter").value = '5.50';
                            document.getElementById("txt_diameter").setAttribute("readonly", true);
                            document.getElementById("txt_sup").removeAttribute("readonly");
                            document.getElementById("txt_sup").options[0].selected = 'select';
                        } else if (bhnx == "KP") {
                            document.getElementById("txt_diameter").value = '2.80';
                            document.getElementById("txt_diameter").setAttribute("readonly", true);
                            document.getElementById("txt_sup").setAttribute("readonly", true);
                            document.getElementById("txt_sup").options[3].selected = 'select';
                        } else if (bhnx == "KPL") {

                            document.getElementById("txt_diameter").removeAttribute("readonly");
                            document.getElementById("txt_diameter").value = "";
                            document.getElementById("txt_diameter").focus();
                            document.getElementById("txt_sup").options[3].selected = 'select';
                            document.getElementById("txt_sup").setAttribute("readonly", true);


                        } else {
                            document.getElementById("txt_diameter").setAttribute("readonly", true);
                            document.getElementById("txt_diameter").value = '0';
                            document.getElementById("txt_sup").setAttribute("readonly", true);
                            document.getElementById("txt_sup").options[0].selected = 'select';
                        }
                    }

                    function SelisihBerat() {
                        //var berat_label=document.getElementById("frm_drwwr").txt_berat_label.value;
                        //var berat_nsm=document.getElementById("frm_drwwr").txt_berat_nsm.value;
                        //document.getElementById("txt_selisih_berat").value = Number(berat_label)-Number(berat_nsm); 
                        //var asd=document.getElementById("frm_gdgpb").txt_kode.value;
                        //var kode2=document.getElementById("frm_drwwr").txt_kode.value;
                        //document.getElementById("txt_kode1").value = Number(asd)+Number(asd); 

                    }
                </script>
                <script type="text/javascript">
                    function cek_database() {
                        var sup = document.getElementById("frm_gdgpb").txt_sup.value;
                        var nom = document.getElementById("frm_gdgpb").txt_kode.value;
                        //document.getElementById('txt_kode1').value=sup+nom;
                        document.getElementById('txttgl').focus();
                        var txt_sup = $("#txt_sup").val();
                        $.ajax({
                            url: '<?= base_url('gudang/ajax_pb'); ?>',
                            data: "txt_sup=" + txt_sup,
                        }).success(function(data) {
                            var json = data,
                                obj = JSON.parse(json);

                            $('#txt_kode').val(sup + obj.txt_kode);
                            //$('#txt_berat').val(obj.txt_berat);
                            //$('#txt_berat_nsm').val(obj.txt_berat_nsm);


                        });
                    }
                </script>
                <script>
                    $(".input-group.date").datepicker({
                        autoclose: true,
                        todayHighlight: true
                    });
                </script>