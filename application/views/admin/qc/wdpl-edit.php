<div class="page-content">
    <!-- ----------------------------------------------------Header------------------------------------------ -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Update Data wdpl
                    </h1>
                    <!--<ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Forms
                            </li>
                        </ol>-->
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <form id="frm_qc_wdpl" name="frm_qc_wdpl" action="<?= base_url('qc/simpan_wdpl'); ?>" method="POST" onSubmit="return cek()">
                    <?php foreach ($input_wdpl as $iw) : ?>
                        <input type="hidden" name="kd_galv" class="form-control" value="<?= $iw->kd ?>">
                        <input type="hidden" name="no_order" class="form-control" value="<?= $iw->no_orker ?>">

                        <!-- ----------------------------------------------------Header------------------------------------------ -->
                        <!--<div class="col-lg-4">
						<!--<div class="form-group">
							<label>No. Order Kerja</label>
							<input class="form-control" name="txtno_orker" id="txtno_orker" value="<?php //echo $no_order; 
                                                                                                    ?>" hidden="hidden">
						</div>-->
                        <!--<div class="form-group">
							<label>Team (Pilih Team)</label>
							<select class="form-control" onchange="pengawas()" id="tim" name="tim">
								<option><selected><?php //echo $team; 
                                                    ?></selected></option>
								
								<option>A</option>
								<option>B</option>
								<option>C</option>
							</select>
						</div>-->
                        <!--<div class="form-group">
								<label>Nama Pengawas</label>
								<input class="form-control" id="nama_pengawas" name="nama_pengawas" disabled="" value="<?php //echo $nama_pengawas; 
                                                                                                                        ?>">
								
						</div>-->
                        <!--</div>-->
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Tanggal Produksi</label>
                                <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                    <!--<input class="form-control" type="text" name="txttgl" readonly="readonly">-->
                                    <input class="form-control" readonly="readonly" name="txttgl" id="txttgl" type="text" value="<?php echo $iw->tanggal;
                                                                                                                                    ?>" />

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Shiff</label>
                                <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                    <input class="form-control" readonly="readonly" name="txtshif" id="txtshif" type="text" value="<?php echo $iw->shif;
                                                                                                                                    $no_order ?>" />

                                </div>
                            </div>
                        </div>



                        <div class="row"></div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Bagian/Unit</label>
                                <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                    <!--<input class="form-control" type="text" name="txttgl" readonly="readonly">-->
                                    <input class="form-control" readonly="readonly" name="txtunit" id="txtunit" type="text" value="<?php echo $iw->Unit
                                                                                                                                    ?>" />
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Diameter</label>
                                <input class="form-control" name="txtdiameter" id="txtdiameter" value="<?php echo $iw->diameter;
                                                                                                        ?>" readonly="readonly">
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>
                        </div>
                        <div class="row"></div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Hasil Produksi (Coil)</label>
                                <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                    <!--<input class="form-control" type="text" name="txttgl" readonly="readonly">-->
                                    <input class="form-control" readonly="readonly" name="txthasil_baik_roll" id="txthasil_baik_roll" type="text" value="<?php echo $iw->hasil_baik_roll;
                                                                                                                                                            ?>" />

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Hasil Produksi (Berat/Kg)</label>
                                <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                    <!--<input class="form-control" type="text" name="txttgl" readonly="readonly">-->
                                    <input class="form-control" readonly="readonly" name="txthasil_baik_berat" id="txthasil_baik_berat" type="text" value="<?php echo $iw->hasil_baik_berat;
                                                                                                                                                            ?>" />

                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <div class="row"></div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Passed (Coil)</label>
                            <input class="form-control" name="txtpas_rol" id="txtpas_rol" value="<?php //echo $pas_rol; 
                                                                                                    ?>">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Passed (Berat/Kg)</label>
                            <input class="form-control" name="txtpas_berat" id="txtpas_berat" value="<?php //echo $pas_berat; 
                                                                                                        ?>">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <!---------------------------------------tambahan jenis NG	-->
                    <div class="row"></div><b>Jenis NG</b>
                    <hr>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>NG Kasar (Coil)</label>
                            <input class="form-control" name="txtng_kasar_rol" id="txtng_kasar_rol" value="<?php //echo $kasar_rol; 
                                                                                                            ?>">

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>NG Kusam (Coil)</label>
                            <input class="form-control" name="txtng_kusam_rol" id="txtng_kusam_rol" value="<?php //echo $kusam_rol; 
                                                                                                            ?>">

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>NG Gosong (Coil)</label>
                            <input class="form-control" name="txtng_gosong_rol" id="txtng_gosong_rol" value="<?php //echo $gosong_rol; 
                                                                                                                ?>">

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>NG Merah (Coil)</label>
                            <input class="form-control" name="txtng_merah_rol" id="txtng_merah_rol" value="<?php //echo $merah_rol; 
                                                                                                            ?>">

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>NG Tatanan Ruwet (Coil)</label>
                            <input class="form-control" name="txtng_ruwet_rol" id="txtng_ruwet_rol" value="<?php //echo $ruwet_rol; 
                                                                                                            ?>">

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>NG Diameter Oval (Coil)</label>
                            <input class="form-control" name="txtng_dia_oval_rol" id="txtng_dia_oval_rol" value="<?php //echo $oval_rol; 
                                                                                                                    ?>">

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>NG Diameter Outspec (Coil)</label>
                            <input class="form-control" name="txtng_dia_osp_rol" id="txtng_dia_osp_rol" value="<?php //echo $osp_rol; 
                                                                                                                ?>">

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>NG Kaku (Coil)</label>
                            <input class="form-control" name="txtng_kaku_rol" id="txtng_kaku_rol" value="<?php // echo $kaku_rol; 
                                                                                                            ?>">

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>NG CW di Bawah Standart (Coil)</label>
                            <input class="form-control" name="txtng_cw_rol" id="txtng_cw_rol" value="<?php //echo $cw_rol; 
                                                                                                        ?>">

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>NG Lengket (Coil)</label>
                            <input class="form-control" name="txtng_lengket_rol" id="txtng_lengket_rol" value="<?php // echo $lengket_rol; 
                                                                                                                ?>">

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>NG Berkarat (Coil)</label>
                            <input class="form-control" name="txtng_karat_rol" id="txtng_karat_rol" value="<?php // echo $karat_rol; 
                                                                                                            ?>">

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>NG Banyak Sambungan (Coil)</label>
                            <input class="form-control" name="txtng_sambungan_rol" id="txtng_sambungan_rol" value="<?php //echo $sambungan_rol; 
                                                                                                                    ?>">

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>NG Gelombang (Coil)</label>
                            <input class="form-control" name="txtng_gelombang_rol" id="txtng_gelombang_rol" value="<?php //echo $gelombang_rol; 
                                                                                                                    ?>">

                        </div>
                    </div>

                    <div class="row"></div>
                    <hr>
                    <!--garis horisontal tutup jenis NG-->
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>NG (Coil)</label>
                            <input class="form-control" name="txtng_rol" id="txtng_rol" value="<?php //echo $ng_rol; 
                                                                                                ?>">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>NG (Berat)</label>
                            <input class="form-control" name="txtng_berat" id="txtng_berat" value="<?php //echo $ng_berat; 
                                                                                                    ?>">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Reject (Coil)</label>
                            <input class="form-control" name="txtrejek_rol" id="txtrejek_rol" value="<?php // echo $rejek_rol; 
                                                                                                        ?>">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Reject (Berat)</label>
                            <input class="form-control" name="txtrejek_berat" id="txtrejek_berat" value="<?php // echo $rejek_berat; 
                                                                                                            ?>">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="col-lg-6">
                        <?php $num_rows = 0;
                        if ($num_rows >= 1) { ?>

                            <button type="submit" class="btn btn-default" name="btn_proses" id="btn_proses" value="Update">Update</button></a>

                        <?php } else { ?>
                            <button type="submit" class="btn btn-default">Simpan</button>
                        <?php } ?>


                    </div>
                </form>
                <!--</div>-->

            </div>
            <!-- /#page-wrapper -->
        </div>
        <?php //} 
        ?>
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



            function cek() {

                var pas_rol = document.getElementById("txtpas_rol").value;
                var ng_rol = document.getElementById("txtng_rol").value;
                var rejek_rol = document.getElementById("txtrejek_rol").value;
                var pas_berat = document.getElementById("txtpas_berat").value;
                var ng_berat = document.getElementById("txtng_berat").value;
                var rejek_berat = document.getElementById("txtrejek_berat").value;

                var hasil_baik_roll = conv2desimal(document.getElementById("txthasil_baik_roll").value);
                var hasil_baik_berat = document.getElementById("txthasil_baik_berat").value;

                total_rol = conv2desimal(Number(pas_rol) + Number(ng_rol) + Number(rejek_rol));
                total_berat = conv2desimal(Number(pas_berat) + Number(ng_berat) + Number(rejek_berat));

                if (pas_rol == "") {
                    alert("Passed (Coil) tidak boleh kosong. Jika tidak ada, isi dengan angka 0!");
                    return false;
                } else if (ng_rol == "") {
                    alert("NG (Coil) tidak boleh kosong. Jika tidak ada, isi dengan angka 0!");
                    return false;
                } else if (rejek_rol == "") {
                    alert("Reject (Coil) tidak boleh kosong. Jika tidak ada, isi dengan angka 0!");
                    return false;
                } else if (pas_berat == "") {
                    alert("Passed (Berat) tidak boleh kosong. Jika tidak ada, isi dengan angka 0!");
                    return false;
                } else if (ng_berat == "") {
                    alert('NG (Berat) tidak boleh kosong. Jika tidak ada, isi dengan angka 0!');
                    return false;
                } else if (rejek_berat == "") {
                    alert("Reject (Berat) tidak boleh kosong. Jika tidak ada, isi dengan angka 0!");
                    return false;
                } else if ((total_rol != hasil_baik_roll) || (total_berat != hasil_baik_berat)) {
                    alert("Total Rol/Coil atau Total Berat tidak sama dengan hasil Produksi, Silahkan di CEK ulang!");
                    //alert(total_rol);
                    //alert(total_berat);
                    return false;
                } else {
                    return true;
                }
            }