<style>
    .tables {
        /* border: 1px solid green;
	border-collapse: collapse; */
        margin: 0;
        padding: 0;
        width: 100%;
    }

    .tables td {
        padding: 0;
        /* width: 100%; */
        text-align: center;
        height: 15px;

    }

    .tengah {
        text-align: center;
    }

    .kiri {
        text-align: left;
    }

    .kanan {
        text-align: right;
    }

    .table td {
        margin: 0px;
        padding: 0px;

    }

    body {
        font-size: 13px !important;
    }

    @page {
        size: auto;
        /* auto is the initial value */
        margin: 0mm;
        /* this affects the margin in the printer settings */
    }
</style>

<?php
include "application/config/database.php";
?>

<?php if (isset($_POST["btn_proses"]) == "") { ?>
    <div class="page-content">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-12">
            <h3>Tentukan Periode:</h3>
            <form method="POST" action="?p=rekap-egalv">
                <div class="row"></div>
                <div id="page-wrapper">
                    <div class="container-fluid">
                        <div class="col-lg-12">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Tanggal Awal</label>
                                    <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                        <input class="form-control date-picker" name="txttgl_aw" id="txttgl_aw" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Mulai" />
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Tanggal Akhir</label>
                                    <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                        <input class="form-control date-picker" name="txttgl_ak" id="txttgl_ak" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Akhir" />
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Team (Pilih Team)</label>
                                    <select class="form-control" id="tim" name="tim">
                                        <option>Semua Tim</option>
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                        <!--<option>4</option>
								<option>5</option>-->
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label>Setelah menentukan periode klik Proses</label>
                                <button type="submit" class="btn btn-default" name="btn_proses" id="btn_proses">Proses</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php } else {
?>
    <div class="page-content">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-12">
            <h3>Tentukan Periode:</h3>
            <?php $aw = $_POST["txttgl_aw"];
            $ak = $_POST["txttgl_ak"];
            $tim = $_POST["tim"]; ?>
            <form method="POST" action="?p=rekap-egalv">
                <div class="row"></div>
                <div id="page-wrapper">
                    <div class="container-fluid">
                        <div class="col-lg-12">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Tanggal Awal</label>
                                    <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                        <input class="form-control date-picker" name="txttgl_aw" id="txttgl_aw" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Mulai" value="<?php echo $aw; ?>" />
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Tanggal Akhir</label>
                                    <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                        <input class="form-control date-picker" name="txttgl_ak" id="txttgl_ak" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Akhir" value="<?php echo $ak; ?>" />
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Team (Pilih Team)</label>
                                    <select class="form-control" id="tim" name="tim">
                                        <option>
                                            <selected><?php echo $tim; ?></selected>
                                        </option>
                                        <option>Semua Tim</option>
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                        <!--<option>4</option>
								<option>5</option>-->
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label>Setelah menentukan periode klik Proses</label>
                                <button type="submit" class="btn btn-default" name="btn_proses" id="btn_proses">Proses</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--<style>-->
        <div class="col-lg-2">
        </div>
        <div class="col-lg-12">
            <div class="row"></div>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <h2>Laporan Rekapitulasi Produksi Galvanis: <?php echo $_POST["txttgl_aw"] . " sampai " . $_POST["txttgl_ak"]; ?></h2>
                        <div id="print-area-1" class="print-area">
                            <div class="row">
                                <table class="tables table-hover" border="1" rules="all">
                                    <thead>
                                        <?php //echo $r_diameter."|".$tanggal;
                                        ?>
                                        <tr class="tengah">
                                            <th style="font-size:10px;" rowspan="3" width="6%" class="tengah">Tanggal</th>
                                            <th style="font-size:10px;" rowspan="3" width="5%" class="tengah">Diameter</th>
                                            <th style="font-size:10px;" colspan="8" width="13%" class="tengah">Hasil dari QC</th>
                                            <th style="font-size:10px;" colspan="4" width="13%" class="tengah">Dari Produksi</th>
                                            <th style="font-size:10px;" colspan="2" rowspan="2" width="13%" class="tengah">Rasio</th>
                                            <th style="font-size:10px;" colspan="3" rowspan="2" width="21%" class="tengah">Target dan Capaian</th>

                                        </tr>
                                        <tr class="tengah">
                                            <th style="font-size:10px;" colspan="2" width="13%" class="tengah">Hasil Baik</th>
                                            <th style="font-size:10px;" colspan="2" width="13%" class="tengah">Hasil Hold</th>
                                            <th style="font-size:10px;" colspan="2" width="13%" class="tengah">Hasil Reject</th>
                                            <th style="font-size:10px;" colspan="2" width="13%" class="tengah">Total Hasil</th>
                                            <th style="font-size:10px;" colspan="2" width="13%" class="tengah">Hasil Produksi</th>
                                            <th style="font-size:10px;" colspan="2" width="13%" class="tengah">Aval</th>
                                        </tr>
                                        <tr>
                                            <th style="font-size:10px;" width="5%" class="tengah">Roll</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Berat (Kg)</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Roll</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Berat (Kg)</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Roll</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Berat (Kg)</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Roll</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Berat (Kg)</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Roll</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Berat (Kg)</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Aval Baik</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Aval Ruwet</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Rasio Baik</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Rasio SB</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Target</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Durasi Kerja</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Capaian</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    $no1 = 0;
                                    $brol = 0;
                                    $bkg = 0;
                                    $srol = 0;
                                    $skg = 0;
                                    $trol = 0;
                                    $tkg = 0;
                                    $rb = 0;
                                    $rs = 0;
                                    $avb = 0;
                                    $avr = 0;
                                    $ttgt = 0;
                                    $tavalx = 0;
                                    $jam_kerjax = 0;

                                    $qc_rol = 0;
                                    $qc_brt = 0;
                                    $qcng_rol = 0;
                                    $qcng_brt = 0;
                                    $qcrj_rol = 0;
                                    $qcrj_brt = 0;
                                    $totqc_rol = 0;
                                    $tqc_brt = 0;
                                    $capx = 0;

                                    $no = 1;
                                    $tgl_aw = date_format(date_create($_POST["txttgl_aw"]), "Y-m-d");
                                    $tgl_ak = date_format(date_create($_POST["txttgl_ak"]), "Y-m-d");
                                    if ($tim == "Semua Tim") {
                                        $syarat_tim = "";
                                    } else {

                                        $syarat_tim = "AND team='$tim'";
                                    }
                                    $r_tgl1 = mysqli_query($link, "SELECT * FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak'" . $syarat_tim . " AND status_del='0' group by tanggal order by tanggal asc") or die(mysqli_error($link));

                                    /*if (($tgl_aw=="")||($tgl_ak=="")){
								$r_tgl1=mysqli_query($link, "SELECT * FROM galvanis where status_del='0' group by tanggal order by tanggal") or die(mysqli_error($link));
						}else{
							$r_tgl1=mysqli_query($link, "SELECT * FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak'  AND status_del='0' group by tanggal order by tanggal") or die(mysqli_error($link));
						}*/
                                    while ($r_tgl2 = mysqli_fetch_array($r_tgl1)) {
                                        $tanggal2 = date_format(date_create($r_tgl2["tanggal"]), "Y-m-d");
                                        //echo $tanggal2."<br>";

                                        //$r_tgl=mysqli_query($link, "SELECT * FROM galvanis where tanggal='$tanggal1' group by diameter order by tanggal") or die(mysqli_error($link));
                                        $r_tgl = mysqli_query($link, "SELECT * FROM galvanis where tanggal like '$tanggal2'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal,diameter desc") or die(mysqli_error($link));
                                        while ($row = mysqli_fetch_array($r_tgl)) {

                                            //$jam_kerja=$row["jam_kerja"];
                                            $r_diameter = $row["diameter"];
                                            if ($r_diameter <= 1.67) {
                                                //$target=11500;
                                                $target = 438; //per jam
                                            } elseif ($r_diameter <= 2.18) {
                                                //$target=12500;
                                                $target = 521; //per jam
                                            } elseif ($r_diameter <= 2.88) {
                                                //$target=15000;
                                                $target = 625; //per jam
                                            } elseif ($r_diameter <= 3.50) {
                                                //$target=18000;
                                                $target = 750; //per jam
                                            } else {
                                                //$target=18000;
                                                $target = 750; //per jam
                                            }
                                            $tanggal = $row["tanggal"];


                                            $hasil_prod = mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_baik_roll) as 'hasil_baik_rol',sum(hasil_baik_berat) as 'hasil_baik_berat', sum(aval_baik) as 'aval_baik',sum(aval_ruwet) as 'aval_ruwet',sum(total_berat) as 'total_berat' FROM galvanis where tanggal like '$tanggal2' and diameter='$r_diameter'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                            $prod_roll = $hasil_prod['hasil_baik_rol'];
                                            $prod_berat = $hasil_prod['hasil_baik_berat'];
                                            $prod_avalb = $hasil_prod['aval_baik'];
                                            $prod_avalr = $hasil_prod['aval_ruwet'];
                                            $prod_total = $hasil_prod['total_berat'];

                                            $hasil_qc = mysqli_fetch_array(mysqli_query($link, "SELECT sum(pas_rol) as 'pas_rol',sum(pas_berat) as 'pas_berat',sum(ng_rol) as 'ng_rol',sum(ng_berat) as 'ng_berat',sum(rejek_rol) as 'rj_rol',sum(rejek_berat) as 'rj_berat' FROM qc_galv where tgl_produksi like '$tanggal2' and diameter='$r_diameter'" . $syarat_tim . "  group by diameter order by tgl_produksi"));
                                            //$hasil_qc=mysqli_fetch_array(mysqli_query($link, "SELECT sum(qc_galv.pas_rol) as 'pas_rol',sum(qc_galv.pas_berat) as 'pas_berat',sum(qc_galv.ng_rol) as 'ng_rol',sum(qc_galv.ng_berat) as 'ng_berat'  FROM qc_galv LEFT JOIN galvanis ON qc_galv.kd_galv=galvanis.kd WHERE galvanis.status_del='0' tgl_produksi like '$tanggal2' and diameter='$r_diameter'".$syarat_tim));
                                            $qc_roll = $hasil_qc['pas_rol'];
                                            $qc_berat = $hasil_qc['pas_berat'];
                                            $qcng_roll = $hasil_qc['ng_rol'];
                                            $qcng_berat = $hasil_qc['ng_berat'];
                                            $qcrj_roll = $hasil_qc['rj_rol'];
                                            $qcrj_berat = $hasil_qc['rj_berat'];

                                            $tqc_rol = $qc_roll + $qcng_roll + $qcrj_roll;
                                            $tqc_berat = $qc_berat + $qcng_berat + $qcrj_berat;

                                            if ($tqc_rol <> $prod_roll) {
                                                $warnac = "color:red";
                                            } else {
                                                $warnac = "";
                                            }
                                            /*$baik_roll=mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_baik_roll) as 'hasil_baik_rol' FROM galvanis where tanggal like '$tanggal2' and diameter='$r_diameter'".$syarat_tim." AND status_del='0' group by diameter order by tanggal"));
									$baik_roll=$baik_roll['hasil_baik_rol'];
									$baik_kg=mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_baik_berat) as 'hasil_baik_berat' FROM galvanis where tanggal like '$tanggal2' and diameter='$r_diameter'".$syarat_tim." AND status_del='0' group by diameter order by tanggal"));
									$baik_berat=$baik_kg['hasil_baik_berat'];
									
									$sb_rol=mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_sb_roll) as 'hasil_sb_roll' FROM galvanis where tanggal like '$tanggal2' and diameter='$r_diameter'".$syarat_tim." AND status_del='0' group by diameter order by tanggal"));
									$sb_rol=$sb_rol['hasil_sb_roll'];
									$sb_kg=mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_sb_berat) as 'hasil_sb_berat' FROM galvanis where tanggal like '$tanggal2' and diameter='$r_diameter'".$syarat_tim." AND status_del='0' group by diameter order by tanggal"));
									$sb_berat=$sb_kg['hasil_sb_berat'];
									
									$tot_rol=mysqli_fetch_array(mysqli_query($link, "SELECT sum(total_rol) as 'total_roll' FROM galvanis where tanggal like '$tanggal2' and diameter='$r_diameter'".$syarat_tim." AND status_del='0' group by diameter order by tanggal"));
									$total_rol=$tot_rol['total_roll'];
									
									$tot_kg=mysqli_fetch_array(mysqli_query($link, "SELECT sum(total_berat) as 'total_berat' FROM galvanis where tanggal like '$tanggal2' and diameter='$r_diameter'".$syarat_tim." AND status_del='0' group by diameter order by tanggal"));
									$total_berat=$tot_kg['total_berat'];
									
									$aval_b=mysqli_fetch_array(mysqli_query($link, "SELECT sum(aval_baik) as 'aval_baik' FROM galvanis where tanggal like '$tanggal2' and diameter='$r_diameter'".$syarat_tim." AND status_del='0' group by diameter order by tanggal"));
									$aval_baik=$aval_b['aval_baik'];
									$aval_r=mysqli_fetch_array(mysqli_query($link, "SELECT sum(aval_ruwet) as 'aval_ruwet' FROM galvanis where tanggal like '$tanggal2' and diameter='$r_diameter'".$syarat_tim." AND status_del='0' group by diameter order by tanggal"));
									$aval_ruwet=$aval_r['aval_ruwet'];
									*/
                                            $jam = mysqli_fetch_array(mysqli_query($link, "SELECT sum(jam_kerja) as 'jam_kerja' FROM galvanis where tanggal like '$tanggal2' and diameter='$r_diameter'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                            $jam_kerja = $jam['jam_kerja'];


                                            $team = $row["team"];
                                            $shif = $row["shif"];
                                            $jml_opt = $row["jml_opt"];
                                            $baku_awal = $row["bahan_baku_aw"];
                                            $baku_akir = $row["bahan_baku_ak"];
                                            $total_bahan = $row["bahan_baku_tot"];
                                            $diameter = $row["diameter"];
                                            $total_pemakaian = $row["total_pemakaian"];
                                            $sisa_sesudah = $row["sisa_sesudah"];
                                            $keterangan = $row["ket"];
                                            $targetx = $target * $jam_kerja;

                                            $rasio_baik = number_format(($qc_berat / $tqc_berat) * 100, 2, '.', ',');
                                            $rasio_sb = number_format(($qcng_berat / $tqc_berat) * 100, 2, '.', ',');
                                            $capaian = number_format(($total_berat / $targetx) * 100, 2, '.', ',');

                                            $cap = number_format(($prod_total / $targetx) * 100, 2, '.', ',');
                                    ?>


                                            <tbody>
                                                <tr class="tengah">
                                                    <td style="font-size:11px;"><?php echo $tanggal;
                                                                                $no ?></td>
                                                    <td style="font-size:11px;"><?php echo $diameter; ?></td>
                                                    <td style="font-size:11px;" align="right"><?php echo number_format($qc_roll, 2, '.', ','); ?>&nbsp;</td>
                                                    <td style="font-size:11px;" align="right"><?php echo number_format($qc_berat, 2, '.', ','); ?>&nbsp;</td>
                                                    <td style="font-size:11px;" align="right"><?php echo number_format($qcng_roll, 2, '.', ','); ?>&nbsp;</td>
                                                    <td style="font-size:11px;" align="right"><?php echo number_format($qcng_berat, 2, '.', ','); ?>&nbsp;</td>
                                                    <td style="font-size:11px;" align="right"><?php echo number_format($qcrj_roll, 2, '.', ','); ?>&nbsp;</td>
                                                    <td style="font-size:11px;" align="right"><?php echo number_format($qcrj_berat, 2, '.', ','); ?>&nbsp;</td>
                                                    <td style="font-size:11px;" align="right"><?php echo number_format($tqc_rol, 2, '.', ','); ?>&nbsp;</td>
                                                    <td style="font-size:11px;" align="right"><?php echo number_format($tqc_berat, 2, '.', ','); ?>&nbsp;</td>
                                                    <td style="font-size:11px;" align="right"><?php echo number_format($prod_roll, 2, '.', ','); ?>&nbsp;</td>
                                                    <td style="font-size:11px;" align="right"><?php echo number_format($prod_berat, 2, '.', ','); ?>&nbsp;</td>
                                                    <td style="font-size:11px;" align="right"><?php echo number_format($prod_avalb, 2, '.', ','); ?>&nbsp;</td>
                                                    <td style="font-size:11px;" align="right"><?php echo number_format($prod_avalr, 2, '.', ','); ?>&nbsp;</td>
                                                    <td style="font-size:11px;" align="right"><?php echo number_format((float) $rasio_baik, 2, '.', ',') . "%"; ?>&nbsp;</td>
                                                    <td style="font-size:11px;" align="right"><?php echo number_format((float) $rasio_sb, 2, '.', ',') . "%"; ?>&nbsp;</td>
                                                    <td style="font-size:11px;" align="right"><?php echo number_format($targetx, 2, '.', ','); ?>&nbsp;</td>
                                                    <td style="font-size:11px;" align="right"><?php echo number_format($jam_kerja, 2, '.', ','); ?> Jam &nbsp;</td>
                                                    <td style="font-size:11px;" align="right"><?php echo number_format((float) $cap, 2, '.', ',') . "%"; ?>&nbsp;</td>
                                                </tr>
                                                <div class="row">


                                            <?php
                                            $no = $no + 1;

                                            $brol = $brol + $prod_roll;
                                            $bkg = $bkg + $prod_berat;
                                            $avb = $avb + $prod_avalb;
                                            $avr = $avr + $prod_avalr;


                                            $qc_rol = $qc_rol + $qc_roll;
                                            $qc_brt = $qc_brt + $qc_berat;
                                            $qcng_rol = $qcng_rol + $qcng_roll;
                                            $qcng_brt = $qcng_brt + $qcng_berat;

                                            $qcrj_rol = $qcrj_rol + $qcrj_roll;
                                            $qcrj_brt = $qcrj_brt + $qcrj_berat;



                                            $totqc_rol = $totqc_rol + $tqc_rol;
                                            $tqc_brt = $tqc_brt + $tqc_berat;

                                            $prod_totalx = $prod_totalx + $prod_total;
                                            $targetx2 = $targetx2 + $targetx;
                                            $capx = number_format(($prod_totalx / $targetx2) * 100, 2, '.', ',') . " %";

                                            $rb = number_format(($qc_brt / $tqc_brt) * 100, 2, '.', ',') . " %";
                                            $rs = number_format(($qcng_brt / $tqc_brt) * 100, 2, '.', ',') . " %";

                                            $tot_av = $avb + $avr;
                                            $ttgt = $ttgt + $targetx;
                                            $taval = $aval_baik + $aval_ruwet;
                                            $tavalx = $taval + $tavalx;
                                            $jam_kerjax = $jam_kerja + $jam_kerjax;
                                        }
                                        //$no1=$no1+1; 
                                        //$brol=$brol+$baik_roll;
                                    }
                                            ?>
                                            <tr>
                                                <td style="font-size:12px;color:blue" colspan="2" class="tengah"><b>Total<br><?php echo $aw . " sampai " . $ak; ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format($qc_rol, 2, '.', ','); ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format($qc_brt, 2, '.', ','); ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format($qcng_rol, 2, '.', ','); ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format($qcng_brt, 2, '.', ','); ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format($qcrj_rol, 2, '.', ','); ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format($qcrj_brt, 2, '.', ','); ?></b></td>

                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format($totqc_rol, 2, '.', ','); ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format($tqc_brt, 2, '.', ','); ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format($brol, 2, '.', ','); ?>&nbsp;</b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format($bkg, 2, '.', ','); ?>&nbsp;</b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format($avb, 2, '.', ','); ?>&nbsp;</b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format($avr, 2, '.', ','); ?>&nbsp;</b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format((float) $rb, 2, '.', ','); ?>%&nbsp;</b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format((float) $rs, 2, '.', ','); ?>%&nbsp;</b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format($ttgt, 2, '.', ','); ?>&nbsp;</b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format($jam_kerjax, 2, '.', ','); ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format((float) $capx, 2, '.', ','); ?>%&nbsp;</b></td>
                                            </tr>


                                            </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row"> <br>
                        <div class="col-lg-12">
                            <div class="container-fluid">
                                <h2>Rekap dan Effisiensi Per Diameter</h2>
                                <?php
                                $tgl1 = strtotime($tgl_aw);
                                $tgl2 = strtotime($tgl_ak);
                                $hari = floor(($tgl2 - $tgl1) / (60 * 60 * 24));
                                if ($hari == 0) {
                                    $hari = 1;
                                }

                                $diau = mysqli_query($link, "SELECT * FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak'" . $syarat_tim . " AND status_del='0' group by Unit order by diameter asc") or die(mysqli_error($link));
                                while ($rowdu = mysqli_fetch_array($diau)) {
                                    $unit = $rowdu['Unit'];
                                    if ($unit == "PA 1") {
                                        $unitx = "A";
                                    } elseif ($unit == "PA 2") {
                                        $unitx = "B";
                                    } else {
                                        $unitx = "C";
                                    }

                                    echo "<b>Unit " . $unit . "</b>";

                                ?>
                                    <table class="tables table-hover" border="1" rules="all">
                                        <tr>
                                            <th style="font-size:10px;" rowspan="2" width="8%" class="tengah">Diameter</th>
                                            <th style="font-size:10px;" colspan="2" width="16%" class="tengah">Baik</th>
                                            <th style="font-size:10px;" colspan="2" width="16%" class="tengah">Hold</th>
                                            <th style="font-size:10px;" colspan="2" width="16%" class="tengah">Total Hasil</th>
                                            <th style="font-size:10px;" colspan="2" width="16%" class="tengah">Total Aval</th>
                                            <th style="font-size:10px;" rowspan="2" width="13%" class="tengah">Effisiensi I</th>
                                            <th style="font-size:10px;" rowspan="2" width="13%" class="tengah">Effisiensi II</th>

                                        </tr>
                                        <tr>
                                            <th style="font-size:10px;" width="8%" class="tengah">Roll</th>
                                            <th style="font-size:10px;" width="8%" class="tengah">Berat (Kg)</th>
                                            <th style="font-size:10px;" width="8%" class="tengah">Roll</th>
                                            <th style="font-size:10px;" width="8%" class="tengah">Berat (Kg)</th>
                                            <th style="font-size:10px;" width="8%" class="tengah">Total Roll</th>
                                            <th style="font-size:10px;" width="8%" class="tengah">Total Berat (Kg)</th>
                                            <th style="font-size:10px;" width="8%" class="tengah">Aval Baik (Kg)</th>
                                            <th style="font-size:10px;" width="8%" class="tengah">Aval Ruwet (Kg)</th>
                                        </tr>
                                        <?php
                                        $dia = mysqli_query($link, "SELECT * FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak'" . $syarat_tim . " AND status_del='0' and Unit='$unit' group by diameter order by diameter asc") or die(mysqli_error($link));
                                        while ($rowd = mysqli_fetch_array($dia)) {
                                            $diam = $rowd['diameter'];
                                            $diamu = $rowd['diameter'];
                                            //$unit=$rowd['Unit'];

                                            $rolb = mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_baik_roll) as 'hasil_baik_roll' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and Unit='$unit' AND diameter='$diam'" . $syarat_tim . "  AND status_del='0'"));
                                            $totald_rolb = $rolb['hasil_baik_roll'];

                                            $rols = mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_sb_roll) as 'hasil_sb_roll' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and Unit='$unit' AND diameter='$diam'" . $syarat_tim . "  AND status_del='0'"));
                                            $totald_rols = $rols['hasil_sb_roll'];

                                            $kgb = mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_baik_berat) as 'hasil_baik_berat' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and Unit='$unit' AND diameter='$diam'" . $syarat_tim . "  AND status_del='0'"));
                                            $totald_kgb = $kgb['hasil_baik_berat'];

                                            $kgs = mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_sb_berat) as 'hasil_sb_berat' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and Unit='$unit' AND diameter='$diam'" . $syarat_tim . "  AND status_del='0'"));
                                            $totald_kgs = $kgs['hasil_sb_berat'];

                                            $totr = mysqli_fetch_array(mysqli_query($link, "SELECT sum(total_rol) as 'total_roll' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and Unit='$unit' AND diameter='$diam'" . $syarat_tim . "  AND status_del='0'"));
                                            $totald_trol = $totr['total_roll'];

                                            $totb = mysqli_fetch_array(mysqli_query($link, "SELECT sum(total_berat) as 'total_berat' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and Unit='$unit' AND diameter='$diam'" . $syarat_tim . "  AND status_del='0'"));
                                            $totald_tkg = $totb['total_berat'];

                                            $taval_b = mysqli_fetch_array(mysqli_query($link, "SELECT sum(aval_baik) as 'aval_baik' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and Unit='$unit' AND diameter='$diam'" . $syarat_tim . "  AND status_del='0'"));
                                            $taval_b = $taval_b['aval_baik'];

                                            $taval_s = mysqli_fetch_array(mysqli_query($link, "SELECT sum(aval_ruwet) as 'aval_ruwet' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and Unit='$unit' AND diameter='$diam'" . $syarat_tim . "  AND status_del='0'"));
                                            $taval_s = $taval_s['aval_ruwet'];

                                            //$kgb=mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_baik_berat) as 'hasil_baik_berat' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and Unit='$unit' AND diameter='$diam'".$syarat_tim."  AND status_del='0'"));
                                            //$totald_kgb=$kgb['hasil_baik_berat'];

                                            $kgs = mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_sb_berat) as 'hasil_sb_berat' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and Unit='$unit' AND diameter='$diam'" . $syarat_tim . "  AND status_del='0'"));
                                            $totald_kgs = $kgs['hasil_sb_berat'];

                                            $jam = mysqli_fetch_array(mysqli_query($link, "SELECT sum(jam_kerja) as 'jam_kerja' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and Unit='$unit'  AND diameter='$diam'" . $syarat_tim . "  AND status_del='0'"));
                                            $jam_kerja = $jam['jam_kerja'];
                                            $opt = mysqli_fetch_array(mysqli_query($link, "SELECT sum(jml_opt) as 'jml_opt' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and Unit='$unit' AND diameter='$diam'" . $syarat_tim . "  AND status_del='0'"));
                                            $jml_opt = $opt['jml_opt'];

                                            if (($diam == "1.60") and ($unitx = "A")) {
                                                $speed = 25.90;
                                            } elseif (($diam == "2.10") and ($unitx = "A")) {
                                                $speed = 17.85;
                                            } elseif (($diam == "2.80") and ($unitx = "A")) {
                                                $speed = 12.25;
                                            } elseif (($diam == "3.40") and ($unitx = "A")) {
                                                $speed = 10.15;
                                            } elseif (($diam == "4.20") and ($unitx = "A")) {
                                                $speed = 6.48;
                                            } elseif (($diam == "1.60") and ($unitx = "B")) {
                                                $speed = 21.53;
                                            } elseif (($diam == "2.10") and ($unitx = "B")) {
                                                $speed = 16.98;
                                            } elseif (($diam == "2.80") and ($unitx = "B")) {
                                                $speed = 10.68;
                                            } elseif (($diam == "3.40") and ($unitx = "B")) {
                                                $speed = 8.75;
                                            } elseif (($diam == "4.20") and ($unitx = "B")) {
                                                $speed = 5.78;
                                            } elseif (($diam == "1.60") and ($unitx = "C")) {
                                                $speed = 21.53;
                                            } elseif (($diam == "2.10") and ($unitx = "C")) {
                                                $speed = 16.98;
                                            } elseif (($diam == "2.80") and ($unitx = "C")) {
                                                $speed = 10.68;
                                            } elseif (($diam == "3.40") and ($unitx = "C")) {
                                                $speed = 8.75;
                                            } elseif (($diam == "4.20") and ($unitx = "C")) {
                                                $speed = 5.78;
                                            }



                                            //echo $hari->days;

                                            $eff = $totald_kgb / ($jam_kerja * $jml_opt);
                                            $eff2 = $totald_kgb / (0.37 * $diam * $diam * $speed * $jam_kerja) * $hari * 24;
                                            $thasil = $totald_kgb + $totald_kgs;

                                        ?>

                                            <tr>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $diam; ?></b>&nbsp;</td>
                                                <td style="font-size:12px;color:blue" class="kanan"><b><?php echo number_format($totald_rolb, 2, '.', ','); ?></b>&nbsp;</td>
                                                <td style="font-size:12px;color:blue" class="kanan"><b><?php echo number_format($totald_kgb, 2, '.', ','); ?></b>&nbsp;</td>
                                                <td style="font-size:12px;color:blue" class="kanan"><b><?php echo number_format($totald_rols, 2, '.', ','); ?></b>&nbsp;</td>
                                                <td style="font-size:12px;color:blue" class="kanan"><b><?php echo number_format($totald_kgs, 2, '.', ','); ?></b>&nbsp;</td>
                                                <td style="font-size:12px;color:blue" class="kanan"><b><?php echo number_format($totald_trol, 2, '.', ','); ?></b>&nbsp;</td>
                                                <td style="font-size:12px;color:blue" class="kanan"><b><?php echo number_format($totald_tkg, 2, '.', ','); ?></b>&nbsp;</td>
                                                <td style="font-size:12px;color:blue" class="kanan"><b><?php echo number_format($taval_b, 2, '.', ','); ?></b>&nbsp;</td>
                                                <td style="font-size:12px;color:blue" class="kanan"><b><?php echo number_format($taval_s, 2, '.', ','); ?></b>&nbsp;</td>
                                                <td style="font-size:12px;color:blue" class="kanan"><b><?php echo number_format($eff, 2, '.', ','); ?></b> Kg/ManHour &nbsp;</td>
                                                <td style="font-size:12px;color:blue" class="kanan"><b><?php echo number_format($eff2, 2, '.', ','); ?> %</b>&nbsp;</td>
                                            </tr>
                                            <tr>&nbsp;</tr>
                                        <?php } ?>
                                    </table>
                                <?php }
                                ?>

                            </div>
                        </div>
                        <div class="row"> <br></div>


                        <br>
                        <div class="col-lg-6">
                            <div class="container-fluid">
                                <h2>Penilaian</h2>
                                <table class="tables table-hover" border="1" rules="all">
                                    <tr>
                                        <th style="font-size:12px;" width="20%" class="tengah"><b>Aspek Penilaian</b></th>
                                        <th style="font-size:12px;" width="20%" class="tengah"><b>Prosentase Hasil</b></th>
                                        <th style="font-size:12px;" width="10%" class="tengah"><b>Index</b></th>
                                        <th style="font-size:12px;" width="10%" class="tengah"><b>Nilai</b></th>
                                    </tr>
                                    <tr>
                                        <td style="font-size:11px;color:black" class="tengah"><b>Pencapaian Target Produksi</td>
                                        <?php
                                        $hsl = $capx;
                                        ($tkg / $ttgt) * 100;
                                        //$hsl=70;
                                        if ($hsl > 105) {
                                            $index = 5;
                                        } elseif ($hsl >= 95) {
                                            $index = 4;
                                        } elseif ($hsl >= 85) {
                                            $index = 3;
                                        } elseif ($hsl >= 75) {
                                            $index = 2;
                                        } elseif ($hsl >= 65) {
                                            $index = 1;
                                        } else {
                                            $index = 0;
                                        }
                                        $bobot = $index / 5 * 70;
                                        ?>
                                        <td style="font-size:11px;color:black" class="kanan"><?php echo number_format((float) $hsl, 2, '.', ',') . "%"; ?>&nbsp;</td>
                                        <td style="font-size:11px;color:black" class="kanan"><?php echo $index; ?>&nbsp;</td>
                                        <td style="font-size:11px;color:black" class="kanan"><?php echo $bobot; ?>&nbsp;</td>
                                        <!--<td style="font-size:12px;color:blue" class="kanan" rowspan="2">&nbsp;</td>-->
                                    </tr>
                                    <tr>
                                        <td style="font-size:11px;color:black" class="tengah"><b>Downtime Produksi</td>
                                        <?php
                                        $baik_roll = mysqli_fetch_array(mysqli_query($link, "SELECT sum(dt_putus_bahan) as 'dt_putus_bahan' FROM galvanis where tanggal like '$tanggal2' and diameter='$r_diameter'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                        $dt_putus_bahan = $baik_roll['dt_putus_bahan'];
                                        $baik_kg = mysqli_fetch_array(mysqli_query($link, "SELECT sum(dt_putus_hcl) as 'dt_putus_hcl' FROM galvanis where tanggal like '$tanggal2' and diameter='$r_diameter'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                        $dt_putus_hcl = $baik_kg['dt_putus_hcl'];
                                        $sb_rol = mysqli_fetch_array(mysqli_query($link, "SELECT sum(dt_putus_timah) as 'dt_putus_timah' FROM galvanis where tanggal like '$tanggal2' and diameter='$r_diameter'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                        $dt_putus_timah = $sb_rol['dt_putus_timah'];
                                        $sb_kg = mysqli_fetch_array(mysqli_query($link, "SELECT sum(dt_ganti_size) as 'dt_ganti_size' FROM galvanis where tanggal like '$tanggal2' and diameter='$r_diameter'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                        $dt_ganti_size = $sb_kg['dt_ganti_size'];

                                        $tot_rol = mysqli_fetch_array(mysqli_query($link, "SELECT sum(dt_tunggu_bahan) as 'dt_tunggu_bahan' FROM galvanis where tanggal like '$tanggal2' and diameter='$r_diameter'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                        $dt_tunggu_bahan = $tot_rol['dt_tunggu_bahan'];
                                        $tot_kg = mysqli_fetch_array(mysqli_query($link, "SELECT sum(dt_mesin_rusak) as 'dt_mesin_rusak' FROM galvanis where tanggal like '$tanggal2' and diameter='$r_diameter'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                        $dt_mesin_rusak = $tot_kg['dt_mesin_rusak'];

                                        $aval_b = mysqli_fetch_array(mysqli_query($link, "SELECT sum(dt_lain2) as 'dt_lain2' FROM galvanis where tanggal like '$tanggal2' and diameter='$r_diameter'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                        $dt_lain2 = $aval_b['dt_lain2'];

                                        $tdt = $dt_putus_bahan + $dt_putus_hcl + $dt_putus_timah + $dt_ganti_size + $dt_tunggu_bahan + $dt_mesin_rusak + $dt_lain2;
                                        $hsl2 = ($tdt / ($jam_kerjax * 60)) * 100;
                                        //$hsl2=1;
                                        if ($hsl2 <= 1) {
                                            $index2 = 5;
                                        } elseif ($hsl2 >= 1) {
                                            $index2 = 4;
                                        } elseif ($hsl2 >= 2) {
                                            $index2 = 3;
                                        } elseif ($hsl2 >= 3) {
                                            $index2 = 2;
                                        } elseif ($hsl2 >= 4) {
                                            $index2 = 1;
                                        } elseif ($hsl2 > 5) {
                                            $index2 = 0;
                                        } else {
                                            $index2 = 0;
                                        }
                                        $bobot2 = $index2 / 5 * 30;
                                        ?>
                                        <td style="font-size:11px;color:black" class="kanan"><?php echo number_format($hsl2, 2, '.', ',') . "%"; ?>&nbsp;</td>
                                        <td style="font-size:11px;color:black" class="kanan"><?php echo $index2; ?>&nbsp;</td>
                                        <td style="font-size:11px;color:black" class="kanan"><?php echo $bobot2; ?>&nbsp;</td>
                                        <!--<td style="font-size:12px;color:blue" class="kanan" rowspan>&nbsp;</td>-->
                                    </tr>
                                    <tr>
                                        <td style="font-size:14px;color:blue" class="tengah" colspan="2"><b>Total Nilai (Kuantitas)</td>
                                        <!--<td style="font-size:12px;color:blue" class="kanan"><b><?php echo number_format($hsl, 2, '.', ',') . "%"; ?>&nbsp;</b></td>-->
                                        <td style="font-size:14px;color:blue" class="kanan"><b><?php echo $index + $index2; ?>&nbsp;</b></td>
                                        <?php
                                        $nilai = $bobot + $bobot2;
                                        if ($nilai >= 90) {
                                            $huruf = 5;
                                        } elseif ($nilai >= 80) {
                                            $huruf = 4;
                                        } elseif ($nilai >= 70) {
                                            $huruf = 3;
                                        } elseif ($nilai >= 60) {
                                            $huruf = 2;
                                        } elseif ($nilai >= 50) {
                                            $huruf = 1;
                                        } else {
                                            $huruf = 0;
                                        }
                                        ?>
                                        <td style="font-size:14px;color:blue" class="kanan"><b><?php echo $nilai . " --> " . $huruf; ?>&nbsp;</b></td>
                                        <!--<td style="font-size:12px;color:blue" class="kanan" rowspan>&nbsp;</td>-->
                                    </tr>

                                </table>
                                <br>
                                <table class="tables table-hover" border="1" rules="all">
                                    <tr>
                                        <th style="font-size:12px;" width="20%" class="tengah"><b>Aspek Penilaian</b></th>
                                        <th style="font-size:12px;" width="20%" class="tengah"><b>Prosentase Hasil</b></th>
                                        <th style="font-size:12px;" width="10%" class="tengah"><b>Index</b></th>
                                        <th style="font-size:12px;" width="10%" class="tengah"><b>Nilai</b></th>
                                    </tr>
                                    <tr>
                                        <td style="font-size:11px;color:black" class="tengah"><b>Komplain Pelanggan</td>
                                        <?php
                                        //$hsl=($tkg/$ttgt)*100;
                                        $hsl = 1;
                                        if ($hsl <= 0) {
                                            $index = 5;
                                        } elseif ($hsl <= 1) {
                                            $index = 4;
                                        } elseif ($hsl <= 2) {
                                            $index = 3;
                                        } elseif ($hsl <= 3) {
                                            $index = 2;
                                        } elseif ($hsl <= 4) {
                                            $index = 1;
                                        } else {
                                            $index = 0;
                                        }
                                        $bobot = $index / 5 * 10;
                                        ?>
                                        <td style="font-size:11px;color:black" class="kanan"><?php echo $hsl; ?>&nbsp;</td>
                                        <td style="font-size:11px;color:black" class="kanan"><?php echo $index; ?>&nbsp;</td>
                                        <td style="font-size:11px;color:black" class="kanan"><?php echo $bobot; ?>&nbsp;</td>
                                        <!--<td style="font-size:12px;color:blue" class="kanan" rowspan="2">&nbsp;</td>-->
                                    </tr>
                                    <tr>
                                        <td style="font-size:11px;color:black" class="tengah"><b>Prosentase Baik</td>
                                        <?php

                                        $hsl2 = $rb;
                                        //$hsl2=1;
                                        if ($hsl2 >= 95) {
                                            $index2 = 5;
                                        } elseif ($hsl2 >= 90) {
                                            $index2 = 4;
                                        } elseif ($hsl2 >= 85) {
                                            $index2 = 3;
                                        } elseif ($hsl2 >= 80) {
                                            $index2 = 2;
                                        } elseif ($hsl2 >= 75) {
                                            $index2 = 1;
                                        } else {
                                            $index2 = 0;
                                        }
                                        $bobot2 = $index2 / 5 * 40;
                                        ?>
                                        <td style="font-size:11px;color:black" class="kanan"><?php echo number_format((float) $hsl2, 2, '.', ',') . "%"; ?>&nbsp;</td>
                                        <td style="font-size:11px;color:black" class="kanan"><?php echo $index2; ?>&nbsp;</td>
                                        <td style="font-size:11px;color:black" class="kanan"><?php echo $bobot2; ?>&nbsp;</td>
                                        <!--<td style="font-size:12px;color:blue" class="kanan" rowspan>&nbsp;</td>-->
                                    </tr>
                                    <tr>
                                        <td style="font-size:11px;color:black" class="tengah"><b>Aval</td>
                                        <?php
                                        //number_format($tkg,2,'.',',')
                                        $hsl3 = ($tot_av / $tkg) * 100;
                                        //$hsl2=1;
                                        if ($hsl3 < 0.80) {
                                            $index3 = 5;
                                        } elseif ($hsl3 < 1.50) {
                                            $index3 = 3;
                                        } elseif ($hsl3 >= 1.50) {
                                            $index3 = 1;
                                        } else {
                                            $index3 = 0;
                                        }
                                        $bobot3 = $index3 / 5 * 50;
                                        ?>
                                        <td style="font-size:11px;color:black" class="kanan"><?php echo number_format($hsl3, 2, '.', ',') . "%"; ?>&nbsp;</td>
                                        <td style="font-size:11px;color:black" class="kanan"><?php echo $index3; ?>&nbsp;</td>
                                        <td style="font-size:11px;color:black" class="kanan"><?php echo $bobot3; ?>&nbsp;</td>
                                        <!--<td style="font-size:12px;color:blue" class="kanan" rowspan>&nbsp;</td>-->
                                    </tr>

                                    <tr>
                                        <td style="font-size:14px;color:blue" class="tengah" colspan="2"><b>Total Nilai (Kualitas)</td>
                                        <!--<td style="font-size:12px;color:blue" class="kanan"><b><?php echo number_format($hsl, 2, '.', ',') . "%"; ?>&nbsp;</b></td>-->
                                        <td style="font-size:14px;color:blue" class="kanan"><b><?php echo $index + $index2 + $index3; ?>&nbsp;</b></td>
                                        <?php
                                        $nilai = $bobot + $bobot2 + $bobot3;
                                        if ($nilai >= 90) {
                                            $huruf = 5;
                                        } elseif ($nilai >= 80) {
                                            $huruf = 4;
                                        } elseif ($nilai >= 70) {
                                            $huruf = 3;
                                        } elseif ($nilai >= 60) {
                                            $huruf = 2;
                                        } elseif ($nilai >= 50) {
                                            $huruf = 1;
                                        } else {
                                            $huruf = 0;
                                        }
                                        ?>
                                        <td style="font-size:14px;color:blue" class="kanan"><b><?php echo $nilai . " --> " . $huruf; ?>&nbsp;</b></td>
                                        <!--<td style="font-size:12px;color:blue" class="kanan" rowspan>&nbsp;</td>-->
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- /#page-wrapper -->
            </div>
        </div>
    </div>
<?php } ?>