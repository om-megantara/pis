<div class="page-content">
    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Input Data Perijinan
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
                <form id="frm_csdijin" name="frm_csdgalv" action="<?= base_url('csd/simpan-perijinan'); ?>" method="POST" onSubmit="return cek();">
                    <!-- ----------------------------------------------------Header------------------------------------------ -->
                    <!--<div class="col-lg-8">-->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Nama Berkas/Surat Perijinan</label>
                            <input class="form-control" name="txtnama_berkas" id="txtnama_berkas" required placeholder="Nama Berkas">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>No. Kendaraan/Nomor Surat</label>
                            <input class="form-control" name="txtno_kendaraan" id="txtno_kendaraan" required placeholder="Nomor Surat atau Nomor Kendaraan">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Jenis Berkas</label>
                            <select class="form-control" onchange="pengawas()" id="txtjns_berkas" name="txtjns_berkas">
                                <option>-Pilih Jenis Berkas-</option>
                                <option>Surat Usaha</option>
                                <option>Sertifikasi</option>
                                <option>Surat Lingkungan</option>
                                <option>Surat Kendaraan</option>
                            </select>

                        </div>
                    </div>
                    <!--</div>-->
                    <div class="row"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Nama Lembaga Penerbit</label>
                            <input class="form-control" name="txtnm_lembaga" id="txtnm_lembaga" required placeholder="Lembaga/Instansi Penerbit Surat/Ijin">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Tanggal Terbit</label>
                            <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                <!--<input class="form-control" type="text" name="txttgl" readonly="readonly">-->
                                <input class="form-control date-picker" readonly="readonly" name="txttgl_terbit" id="txttgl_terbit" type="text" data-date-format="yyyy-mm-dd" placeholder="Tanggal Produksi" />
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Masa Berlaku</label>
                            <input class="form-control" name="txtmasa_berlaku" id="txtmasa_berlaku" required placeholder="Masa Berlaku Berkas/Surat">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Satuan</label>
                            <select class="form-control" name="txtsatuan" id="txtsatuan">
                                <option>-Satuan-</option>
                                <option>Minggu</option>
                                <option>Bulan</option>
                                <option>Tahun</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Tanggal Expired</label>
                            <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                <input class="form-control date-picker" readonly="readonly" name="txttgl_expired" id="txttgl_expired" type="text" data-date-format="yyyy-mm-dd" placeholder="Tanggal Expired" />
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Status Berkas</label>
                            <input class="form-control" name="txtstatus_berkas" id="txtstatus_berkas" placeholder="Status Berkas">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                            <select class="form-control" name="txtstatus_berkas" id="txtstatus_berkas">
                                <option>-Status Berkas-</option>
                                <option>Aktif</option>
                                <option>Expired</option>
                                <option>Pengurusan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Lama Pengurusan</label>
                            <input class="form-control" id="txtlama_urus" name="txtlama_urus" placeholder="Perkiraan waktu pengurusan berkas">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input class="form-control" id="txt_keterangan" name="txt_keterangan" placeholder="Keterangan">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <!--<div class="row"></div>-->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Tanggal Mulai Notifikasi</label>
                            <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                <input class="form-control date-picker" readonly="readonly" name="txttgl_notif" id="txttgl_notif" type="text" data-date-format="yyyy-mm-dd" placeholder="Tanggal mulai notifikasi" />
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                    </div>
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
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>

        <script src="assets/js/jquery.min.js"></script>
        <script type="text/javascript">
            function cek_kd() {
                //var sup=document.getElementById("frm_galv").txt_kdzn.value;
                var nom = document.getElementById("frm_galv").txt_kdzn.value;
                //document.getElementById('txt_kode1').value=sup+nom;
                //document.getElementById('txttgl').focus();
                var txt_kdzn = $("#txt_kdzn").val();
                $.ajax({
                    url: 'ajax_gkd_zn.php',
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
                    url: 'ajax_gkd_pb.php',
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

        <script>
            $(".input-group.date").datepicker({
                autoclose: true,
                todayHighlight: true
            });
        </script>