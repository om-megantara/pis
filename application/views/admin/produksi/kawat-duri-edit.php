<div class="page-content">
    <!-- ----------------------------------------------------Header------------------------------------------ -->
    <!-- Page Heading -->
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
            <li class="active">Update Hasil Produksi</li>
            <li class="active">Hasil Kawat Duri</li>
        </ul><!-- /.breadcrumb -->
    </div>

    <div class="page-content">
        <!-- #section:settings.box -->
        <?php //include "container.php"; 
        ?>

        <!-- /section:settings.box -->
        <div class="page-header">
            <h1>
                Update Hasil Produksi Kawat Duri
            </h1>
        </div><!-- /.page-header -->
        <div class="page-content">
            <!--<div id="page-wrapper">
			<!--<div class="container-fluid">-->

            <!-- Page Heading -->
            <!--<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Input Data Kawat Duri
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Forms
                            </li>
                        </ol>
                    </div>
                </div>-->
            <!-- /.row -->

            <div class="row">
                <form id="frm_kd" name="frm_kd" action="<?= base_url('produksi/update-kd'); ?>" method="POST" onSubmit="return cek(this);">
                    <?php foreach ($produksi_kd as $pkd) : ?>
                        <input type="hidden" name="kd" class="form-control" value="<?= $pkd->kd ?>">
                        <!-- ----------------------------------------------------Header------------------------------------------ -->
                        <div class="col-lg-12">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>No. Order Kerja</label>
                                    <input class="form-control" name="txtno_orker" id="txtno_orker" value="<?php echo $pkd->no_orker; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Pengawas (Pilih Pengawas)</label>
                                    <select class="form-control" id="txtpengawas" name="txtpengawas" required>
                                        <option>
                                            <selected><?php echo $pkd->pengawas; ?></selected>
                                        </option>
                                        <option>Andik</option>
                                        <option>Komari</option>
                                        <option>Sari</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Operator (Pilih Operator)</label>
                                    <select class="form-control" name="txtoperator" id="txtoperator" required>
                                        <option>
                                            <selected><?php echo $pkd->operator; ?></selected>
                                        </option>
                                        <?php
                                        // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                        include "application/config/database.php";
                                        $opt = mysqli_query($link, "SELECT * FROM operator where bagian='kadu' AND status_del='0'") or die(mysqli_error($link));
                                        while ($data = mysqli_fetch_array($opt)) {
                                            $kd = $data["kd_opt"];
                                            $nama = $data["nama_karyawan"];

                                            //echo $pkd->nama;
                                            echo "<option>$nama</option>";
                                        } ?>
                                        <!--<option>Aon</option>
									<option>Isa Sebastian</option>
									<option>Suhartanto</option>
									<option>Vicky S.</option>
									<option>Ardian Kris</option>
									<option>Hadi</option>
									<option>Novian Khoiril Amin</option>
									<option>Muchammad Fajar</option>
									<option>A. Saroni</option>
									<option>M. Solikin</option>-->
                                    </select>
                                </div>
                            </div>
                            <div class="row"></div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Unit</label>
                                    <select class="form-control" name="txtunit" id="txtunit">
                                        <option value="<?php echo $pkd->Unit; ?>">
                                            <selected><?php echo "Unit " . $pkd->Unit; ?></selected>
                                        </option>
                                        <option value="01">Unit 01</option>
                                        <option value="02">Unit 02</option>
                                        <option value="03">Unit 03</option>
                                        <option value="04">Unit 04</option>
                                        <option value="05">Unit 05</option>
                                        <option value="06">Unit 06</option>
                                        <option value="07">Unit 07</option>
                                        <option value="08">Unit 08</option>
                                        <option value="09">Unit 09</option>
                                        <option value="10">Unit 10</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Shif (Pilih Shif)</label>
                                    <select class="form-control" name="txtshif" id="txtshif" required>
                                        <option>
                                            <selected><?php echo $pkd->shif; ?></selected>
                                        </option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                        <!--<input class="form-control" type="text" name="txttgl" readonly="readonly">-->
                                        <input class="form-control date-picker" readonly="readonly" name="txttgl" id="txttgl" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Produksi" value="<?php echo $pkd->tanggal; ?>" required />
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                                <!--</div>-->
                            </div>

                            <div class="row"></div>

                            <!-- ----------------------------------------------------kolom ke-1------------------------------------------ -->
                            <div class="row"></div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Ukuran</label>
                                    <input class="form-control" name="txtukuran" id="txtukuran" placeholder="Ukuran Berat" required value="<?php echo $pkd->ukuran; ?>">
                                    <!--<p class="help-block">Example block-level help text here.</p>-->
                                </div>
                            </div>
                            <!--<div class="col-lg-3">
							<div class="form-group">
								<label>Jumlah Operator</label>
								<input class="form-control" name="txtjml_opt" id="txtjml_opt" placeholder="Jumlah Operator yang mengerjakan" required>
								<!--<p class="help-block">Example block-level help text here.</p>-->
                            <!--</div>
						</div>-->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Jumlah Jam Kerja</label>
                                    <input class="form-control" name="txtjml_jam" id="txtjml_jam" placeholder="Lama mengerjakan per diameter" required value="<?php echo $pkd->jam_kerja; ?>">
                                    <!--<p class="help-block">Example block-level help text here.</p>-->
                                </div>
                            </div>
                            <div class="row"></div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Bahan Baku Awal</label>
                                    <input class="form-control" id="bahan_baw" name="bahan_baw" onchange="totalx()" value="<?php echo $pkd->bahan_baku_aw; ?>">
                                    <!--<p class="help-block">Example block-level help text here.</p>-->
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Bahan Baku Masuk</label>
                                    <input class="form-control" id="bahan_bak" name="bahan_bak" onchange="totalx()" value="<?php echo $pkd->bahan_baku_ak; ?>">
                                    <!--<p class="help-block">Example block-level help text here.</p>-->
                                </div>
                            </div>
                            <!--<div class="row"></div>-->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Total Bahan Baku</label>
                                    <input class="form-control" id="tot_bahanb" name="tot_bahanb" disabled="" value="<?php echo $pkd->bahan_baku_tot; ?>">
                                    <!--<p class="help-block">Example block-level help text here.</p>-->
                                </div>
                            </div>


                            <!-- ----------------------------------------------------kolom ke-2------------------------------------------ -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Hasil Baik Roll</label>
                                    <input class="form-control" name="txthasilbaik_rol" id="txthasilbaik_rol" onchange="totalx()" value="<?php echo $pkd->hasil_baik_roll; ?>">
                                    <!--<p class="help-block">Example block-level help text here.</p>-->
                                </div>
                            </div>
                            <!--<div class="col-lg-4">
							<div class="form-group">
								<label>Hasil Hold Roll</label>
								<input class="form-control" name="txthasilsb_rol" id="txthasilsb_rol" onchange="totalx()" value="<?php echo $pkd->hasil_sb_roll; ?>">
								
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Total Roll</label>
								<input class="form-control" name="total_roll" id="total_roll" disabled="" value="<?php echo $pkd->total_rol; ?>">
								
							</div>
						</div>-->
                            <!--<div class="row"></div>-->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Hasil Baik Berat</label>
                                    <input class="form-control" name="txthasilbaik_berat" id="txthasilbaik_berat" onchange="totalx()" value="<?php echo $pkd->hasil_baik_berat; ?>">
                                    <!--<p class="help-block">Example block-level help text here.</p>-->
                                </div>
                            </div>
                            <!--<div class="col-lg-4">
							<div class="form-group">
								<label>Hasil Hold Berat</label>
								<input class="form-control" name="txthasilsb_berat" id="txthasilsb_berat" onchange="totalx()" value="<?php echo $pkd->hasil_sb_berat; ?>">
								
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Total Berat</label>
								<input class="form-control" name="total_berat" id="total_berat" disabled="" value="<?php echo $pkd->total_berat; ?>">
								
							</div>
						</div>-->
                            <div class="row"></div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Aval Baik</label>
                                    <input class="form-control" name="txtaval_baik" id="txtaval_baik" onchange="totalx()" value="<?php echo $pkd->aval_baik; ?>">
                                    <!--<p class="help-block">Example block-level help text here.</p>-->
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Aval Ruwet</label>
                                    <input class="form-control" name="txtaval_ruwet" id="txtaval_ruwet" onchange="totalx()" value="<?php echo $pkd->aval_ruwet; ?>">
                                    <!--<p class="help-block">Example block-level help text here.</p>-->
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Total Aval</label>
                                    <input class="form-control" name="txttotal_aval" id="txttotal_aval" disabled="" value="<?php echo $pkd->aval_baik + $pkd->aval_ruwet; ?>">
                                    <!--<p class="help-block">Example block-level help text here.</p>-->
                                </div>
                            </div>
                            <div class="row"></div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Total Pemakaian</label>
                                    <input class="form-control" name="txttotal_pakai" id="txttotal_pakai" disabled="" value="<?php echo $pkd->total_pemakaian; ?>">
                                    <!--<p class="help-block">Example block-level help text here.</p>-->
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Sisa Sesudah</label>
                                    <input class="form-control" name="txtsisa_sesudah" id="txtsisa_sesudah" disabled="" value="<?php echo $pkd->sisa_sesudah; ?>">
                                    <!--<p class="help-block">Example block-level help text here.</p>-->
                                </div>
                            </div>
                            <div class="row"></div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input class="form-control" name="txtketerangan" id="txtketerangan" value="<?php echo $pkd->ket; ?>">
                                    <!--<p class="help-block">Example block-level help text here.</p>-->
                                </div>
                            </div>

                            <div class="row"></div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>KWH Meter</label>
                                    <input class="form-control" name="txtkwh" id="txtkwh" placeholder="KWH selama 1 Shif" value="<?php echo $pkd->kwh_meter; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row"></div>
                        <div class="col-lg-6">
                            <!--<a href="?p=gal-simpan" class="btn btn-default">Simpan</a> <br/><br/>-->
                            <button type="submit" class="btn btn-default">Simpan</button>
                            <!--<button type="reset" class="btn btn-default">Reset Button</button>-->

                        </div>

                    <?php endforeach; ?>

                </form>
            </div>

            <!--</div>-->
            <!--</div>-->
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


            /*function pengawas(){
              var timx=document.getElementById("frm_galv").tim.value;
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

            function cek() {

                var pengawas = document.getElementById("txtpengawas").value;
                var operator = document.getElementById("txtoperator").value;
                var unit = document.getElementById("txtunit").value;
                var ukuran = document.getElementById("txtukuran").value;
                var shif = document.getElementById("txtshif").value;
                var tgl = document.getElementById("txttgl").value;
                var jam_kerja = document.getElementById("txtjml_jam").value;

                if (pengawas == "-Pilih Pengawas-") {
                    alert('Pengawas belum dipilih, silakan Pilih Pengawas..!');
                    return false;
                } else if (operator == "-Pilih Operator-") {
                    alert('Operator belum dipilih, silakan Pilih Operator..!');
                    return false;
                } else if (unit == "-Unit-") {
                    alert('Unit belum dipilih, silakan Pilih Unit PA1, PA2, atau PB..!');
                    return false;
                } else if (shif == "-Pilih Shif-") {
                    alert('Shif belum dipilih, silakan Pilih Shif 1, 2, atau 3..!');
                    return false;
                } else if (ukuran == "") {
                    alert('Diameter belum diisi, silakan diisi diameter yang dikerjakan..!');
                    return false;
                } else if (tgl == "") {
                    alert('Tanggal masih kosong, masukkan tanggal produksi..!');
                    return false;
                } else if (jam_kerja == "") {
                    alert('Durasi jam kerja per diameter harus diisi, isi dengan lama pengerjaan tiap diameter dalam 1 shif..!');
                    return false;
                } else {
                    //return true;
                }
            }


            function totalx() {
                var bahan_bawl = document.getElementById("frm_kd").bahan_baw.value;
                var bahan_bakh = document.getElementById("frm_kd").bahan_bak.value;
                document.getElementById("tot_bahanb").value = conv2desimal(Number(bahan_bawl) + Number(bahan_bakh));

                var hasil_bk_rol = document.getElementById("frm_kd").txthasilbaik_rol.value;
                var hasil_sb_rol = document.getElementById("frm_kd").txthasilsb_rol.value;
                document.getElementById("total_roll").value = conv2desimal(Number(hasil_bk_rol) + Number(hasil_sb_rol));

                var hasil_bk_berat = document.getElementById("frm_kd").txthasilbaik_berat.value;
                var hasil_sb_berat = document.getElementById("frm_kd").txthasilsb_berat.value;
                document.getElementById("total_berat").value = conv2desimal(Number(hasil_bk_berat) + Number(hasil_sb_berat));

                var aval_baik = document.getElementById("frm_kd").txtaval_baik.value;
                var aval_ruwet = document.getElementById("frm_kd").txtaval_ruwet.value;
                document.getElementById("txttotal_aval").value = conv2desimal(Number(aval_baik) + Number(aval_ruwet));

                document.getElementById("txttotal_pakai").value = conv2desimal(Number(hasil_bk_berat) + Number(hasil_sb_berat) + Number(aval_baik) + Number(aval_ruwet));
                document.getElementById("txtsisa_sesudah").value = conv2desimal((Number(bahan_bawl) + Number(bahan_bakh)) - (Number(hasil_bk_berat) + Number(hasil_sb_berat) + Number(aval_baik) + Number(aval_ruwet)));
                //totalpakai=tonasebaik+sb+aval_baik+aval_ruwet

                //sisasesudah=totalbahan-totalpakai

            }
        </script>