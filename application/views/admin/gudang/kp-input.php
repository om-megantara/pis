<div class="page-content">
    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Input Data Kawat Paku
                    </h1>
                    <ol class="breadcrumb">
                        <!--<li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Forms
                            </li>-->
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <form id="inpkp-simpan" name="inpkp-simpan" action="<?= base_url('gudang/simpan-kp'); ?>" method="POST" onSubmit="return cek();">
                    <!-- ----------------------------------------------------Header------------------------------------------ -->
                    <div class="col-lg-12">

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Tanggal Produksi</label>
                                <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                    <!--<input class="form-control" type="text" name="txttgl" readonly="readonly">-->
                                    <input class="form-control date-picker" readonly="readonly" name="txttgl" id="txttgl" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Produksi" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                        </div>


                        <div class="row"></div>

                        <!-- ----------------------------------------------------kolom ke-1------------------------------------------ -->
                        <div class="row"></div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Diameter (desimal, gunakan "." (titik)</label>
                                <input class="form-control" name="txtdiameter" id="txtdiameter" placeholder="Diameter Hasil">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>
                        </div>

                        <!-- ----------------------------------------------------kolom ke-2------------------------------------------ -->
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Kode/Nomor Barang</label>
                                <input class="form-control" name="txtkode_barang" id="txtkode_barang" onchange="totalx()" placeholder="Masukkan Kode/Nomor">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Berat</label>
                                <input class="form-control" name="txtberat" id="txtberat" onchange="totalx()" placeholder="Masukkan Berat">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>
                        </div>
                        <div class="row"></div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Jenis Barang</label>
                                <select class="form-control" onchange="pengawas()" id="txtjenis_barang" name="txtjenis_barang">
                                    <Option>OK</Option>
                                    <Option>NG</Option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Status Barang</label>
                                <select class="form-control" onchange="pengawas()" id="txtstatus_barang" name="txtstatus_barang">
                                    <Option>Baru</Option>
                                    <Option>Sisa</Option>
                                </select>
                            </div>
                        </div>
                        <div class="row"></div>
                        <div class="col-lg-6">
                            <!--<a href="?p=gal-simpan" class="btn btn-default">Simpan</a> <br/><br/>-->
                            <button type="submit" class="btn btn-default">Simpan</button>
                            <!--<button type="reset" class="btn btn-default">Reset Button</button>-->
                        </div>
                </form>
                <!--</div>-->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <script>
            function conv2desimal(num) {
                num = "" + Math.floor(num * 100.0 + 0.5) / 100.0;

                var i = num.indexOf(".");

                if (i < 0) num += ".00";
                else {
                    num = num.substring(0, i) + "." + num.substring(i + 1);
                    i = (num.length - i) - 1;
                    if (i == 0) num += "00";
                    else if (i == 1) num += "0";
                    else if (i > 2) num = num.substring(0, i + 3);
                }

                return num;
            }

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

            function cek() {

                var tim = document.getElementById("tim").value;
                var shif = document.getElementById("shif").value;
                var unit = document.getElementById("txtunit").value;
                var diameter = document.getElementById("txtdiameter").value;
                var jml_opt = document.getElementById("txtjml_opt").value;
                var tgl = document.getElementById("txttgl").value;
                var jam_kerja = document.getElementById("txtjml_jam").value;

                if (tim == "-Pilih Tim-") {
                    alert('Tim belum dipilih, silakan Pilih Tim A, B, atau C..!');
                    return false;
                } else if (shif == "-Pilih Shif-") {
                    alert('Shif belum dipilih, silakan Pilih Shif 1, 2, atau 3..!');
                    return false;
                } else if (tgl == "") {
                    alert('Tanggal masih kosong, masukkan tanggal produksi..!');
                    return false;
                } else if (unit == "-Unit-") {
                    alert('Unit belum dipilih, silakan Pilih Unit PA1, PA2, atau PB..!');
                    return false;
                } else if (diameter == "") {
                    alert('Diameter belum diisi, silakan diisi diameter yang dikerjakan..!');
                    return false;
                } else if (jml_opt == "") {
                    alert('Jumlah Operator belum diisi, silakan diisi operator yang bekerja dalam 1 shif..!');
                    return false;
                } else if (jam_kerja == "") {
                    alert('Durasi jam kerja per diameter harus diisi, isi dengan lama pengerjaan tiap diameter dalam 1 shif..!');
                    return false;
                } else {
                    return true;
                }
            }


            function totalx() {
                var bahan_bawl = document.getElementById("frm_galv").bahan_baw.value;
                var bahan_bakh = document.getElementById("frm_galv").bahan_bak.value;
                document.getElementById("tot_bahanb").value = conv2desimal(Number(bahan_bawl) + Number(bahan_bakh));

                var hasil_bk_rol = document.getElementById("frm_galv").txthasilbaik_rol.value;
                //var hasil_sb_rol=document.getElementById("frm_galv").txthasilsb_rol.value;
                //document.getElementById("total_roll").value = conv2desimal(Number(hasil_bk_rol)+Number(hasil_sb_rol)); 

                var hasil_bk_berat = document.getElementById("frm_galv").txthasilbaik_berat.value;
                //var hasil_sb_berat=document.getElementById("frm_galv").txthasilsb_berat.value;
                //document.getElementById("total_berat").value = conv2desimal(Number(hasil_bk_berat)+Number(hasil_sb_berat)); 

                var aval_baik = document.getElementById("frm_galv").txtaval_baik.value;
                var aval_ruwet = document.getElementById("frm_galv").txtaval_ruwet.value;
                document.getElementById("txttotal_aval").value = conv2desimal(Number(aval_baik) + Number(aval_ruwet));

                document.getElementById("txttotal_pakai").value = conv2desimal(Number(hasil_bk_berat) + Number(aval_baik) + Number(aval_ruwet));
                document.getElementById("txtsisa_sesudah").value = conv2desimal((Number(bahan_bawl) + Number(bahan_bakh)) - (Number(hasil_bk_berat) + Number(aval_baik) + Number(aval_ruwet)));

            }
        </script>
        <script type="text/javascript">
            function cek_kd() {
                //var sup=document.getElementById("frm_galv").txt_kdzn.value;
                var nom = document.getElementById("frm_galv").txt_kdzn.value;
                //document.getElementById('txt_kode1').value=sup+nom;
                //document.getElementById('txttgl').focus();
                var txt_kdzn = $("#txt_kdzn").val();
                $.ajax({
                    url: '<?= base_url('gudang/ajax_gkd_zn'); ?>',
                    data: "txt_kdzn=" + txt_kdzn,
                }).success(function(data) {
                    var json = data,
                        obj = JSON.parse(json);

                    $('#txtzn').val(obj.txtzn);
                    //$('#txt_berat').val(obj.txt_berat);
                    //$('#txt_berat_nsm').val(obj.txt_berat_nsm);


                });
            }
        </script>
        <script type="text/javascript">
            function cek_kdpb() {
                //var sup=document.getElementById("frm_galv").txt_kdzn.value;
                //var nom=document.getElementById("frm_galv").txt_kdpb.value;
                //document.getElementById('txt_kode1').value=sup+nom;
                //document.getElementById('txttgl').focus();
                var txt_kdpb = $("#txt_kdpb").val();
                $.ajax({
                    url: '<?= base_url('assets/'); ?>ajax_gkd_pb.php',
                    data: "txt_kdpb=" + txt_kdpb,
                }).success(function(data) {
                    var json = data,
                        obj = JSON.parse(json);

                    $('#txtpb').val(obj.txtpb);
                    //$('#txt_berat').val(obj.txt_berat);
                    //$('#txt_berat_nsm').val(obj.txt_berat_nsm);


                });
            }
        </script>