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
        /* width:100%; */
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
            <form method="POST" action="<?= base_url('rekap/wo-galvanis'); ?>">
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
            <form method="POST" action="<?= base_url('rekap/wo-galvanis'); ?>">
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
                            <?php
                            $tgl_aw = date_format(date_create($_POST["txttgl_aw"]), "Y-m-d");
                            $tgl_ak = date_format(date_create($_POST["txttgl_ak"]), "Y-m-d");
                            if ($tim == "Semua Tim") {
                                $syarat_tim = "";
                            } else {
                                $syarat_tim = "AND team='$tim'";
                            }
                            // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                            $nomerk = mysqli_query($link, "SELECT * FROM qc_galv where tgl_produksi>='$tgl_aw' AND tgl_produksi<='$tgl_ak'" . $syarat_tim . " group by no_order") or die(mysqli_error($link));
                            while ($rowk = mysqli_fetch_array($nomerk)) {
                                $noker = $rowk['no_order'];
                                $diam = $rowk['diameter'];

                                $bban = mysqli_query($link, "SELECT * FROM std_bb_galv where diameter='$diam'" . $syarat_tim . " AND status_del='0'") or die(mysqli_error($link));
                                while ($b = mysqli_fetch_array($bban)) {
                                    $sBban_hcl = $b["Bban_hcl"];
                                    $sBban_nh4cl = $b["Bban_nh4cl"];
                                    $sBban_zncl2 = $b["Bban_zncl2"];
                                    $sBban_zn = $b["Bban_zn"];
                                    $sBban_al = $b["Bban_al"];
                                    $sBban_znal = $b["Bban_znal"];
                                    $sBban_pb = $b["Bban_pb"];
                                    $sBban_abu_timah = $b["Bban_abu_timah"];
                                }

                            ?>
                                <br>
                                <b>No. Order Kerja : <?php echo $noker . " | Diameter: " . $diam; ?></b><br>
                                <table class="tables table-hover" border="1" rules="all">
                                    <thead>
                                        <?php //echo $r_diameter."|".$tanggal;
                                        ?>
                                        <tr class="tengah">
                                            <!--<th style="font-size:10px;" rowspan="2" width="7%" class="tengah">Tanggal</th>
										<th style="font-size:10px;" rowspan="2" width="5%" class="tengah">Diameter</th>-->
                                            <!--<th style="font-size:10px;" rowspan="2" width="13%" class="tengah">Periode</th>-->
                                            <th style="font-size:10px;" rowspan="2" width="7%" class="tengah">- - -</th>
                                            <th style="font-size:10px;" rowspan="2" width="5%" class="tengah">Jumlah<br>Operator</th>
                                            <th style="font-size:10px;" colspan="2" width="10%" class="tengah">Hasil Passed</th>
                                            <th style="font-size:10px;" colspan="2" width="10%" class="tengah">Hasil NG</th>
                                            <th style="font-size:10px;" colspan="2" width="14%" class="tengah">Reject</th>
                                            <th style="font-size:10px;" colspan="2" width="10%" class="tengah">Total Hasil</th>
                                            <th style="font-size:10px;" colspan="2" width="10%" class="tengah">Rasio</th>
                                            <!--<th style="font-size:10px;" colspan="2" width="14%" class="tengah" >Target dan Capaian</th>-->

                                            <th style="font-size:10px;" rowspan="2" width="4%" class="tengah">HCL</th>
                                            <th style="font-size:10px;" rowspan="2" width="4%" class="tengah">NH4CL</th>
                                            <th style="font-size:10px;" rowspan="2" width="4%" class="tengah">ZNCL2</th>
                                            <th style="font-size:10px;" rowspan="2" width="4%" class="tengah">ZN</th>
                                            <th style="font-size:10px;" rowspan="2" width="4%" class="tengah">AL</th>
                                            <th style="font-size:10px;" rowspan="2" width="4%" class="tengah">ZNAL</th>
                                            <th style="font-size:10px;" rowspan="2" width="4%" class="tengah">PB</th>
                                            <th style="font-size:10px;" rowspan="2" width="4%" class="tengah">Abu <br>Timah</th>
                                            <th style="font-size:10px;" rowspan="2" width="4%" class="tengah">KWH</th>
                                            <th style="font-size:10px;" rowspan="2" width="4%" class="tengah">PGN</th>

                                        </tr>
                                        <tr>
                                            <th style="font-size:10px;" width="4%" class="tengah">Roll</th>
                                            <th style="font-size:10px;" width="6%" class="tengah">Berat (Kg)</th>
                                            <th style="font-size:10px;" width="4%" class="tengah">Roll</th>
                                            <th style="font-size:10px;" width="6%" class="tengah">Berat (Kg)</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Aval Baik</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Aval Ruwet</th>
                                            <th style="font-size:10px;" width="4%" class="tengah">Roll</th>
                                            <th style="font-size:10px;" width="6%" class="tengah">Berat (Kg)</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Rasio Baik</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Rasio SB</th>
                                            <!--<th style="font-size:10px;" width="5%" class="tengah">Target</th>
										<th style="font-size:10px;" width="5%" class="tengah">Durasi Kerja</th>-->
                                            <!--<th style="font-size:10px;" width="5%" class="tengah">Capaian</th>-->

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
                                    $jml_optx = 0;
                                    $Bban_hclx = 0;
                                    $Bban_nh4clx = 0;
                                    $Bban_zncl2x = 0;
                                    $Bban_znx = 0;
                                    $Bban_alx = 0;
                                    $Bban_znalx = 0;
                                    $Bban_pbx = 0;
                                    $Bban_abu_timahx = 0;

                                    $sBban_hcl = 0;
                                    $sBban_nh4cl = 0;
                                    $sBban_zncl2 = 0;
                                    $sBban_zn = 0;
                                    $sBban_al = 0;
                                    $sBban_znal = 0;
                                    $sBban_pb = 0;
                                    $sBban_abu_timah = 0;

                                    $no = 1;
                                    $tgl_aw = date_format(date_create($_POST["txttgl_aw"]), "Y-m-d");
                                    $tgl_ak = date_format(date_create($_POST["txttgl_ak"]), "Y-m-d");
                                    if ($tim == "Semua Tim") {
                                        $syarat_tim = "";
                                    } else {
                                        $syarat_tim = "AND team='$tim'";
                                    }
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $r_tgl1 = mysqli_query($link, "SELECT * FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak'" . $syarat_tim . " AND status_del='0' AND no_orker='$noker' group by tanggal order by tanggal asc") or die(mysqli_error($link));

                                    while ($r_tgl2 = mysqli_fetch_array($r_tgl1)) {
                                        $tanggal2 = date_format(date_create($r_tgl2["tanggal"]), "Y-m-d");
                                        $r_tgl = mysqli_query($link, "SELECT * FROM galvanis where tanggal like '$tanggal2'" . $syarat_tim . " AND status_del='0' AND no_orker='$noker' group by diameter order by tanggal,diameter desc") or die(mysqli_error($link));
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
                                            //echo $diam;
                                            $baik_roll = mysqli_fetch_array(mysqli_query($link, "SELECT sum(pas_rol) as 'hasil_baik_rol' FROM qc_galv where tgl_produksi>='$tgl_aw' AND tgl_produksi<='$tgl_ak' and no_order='$noker' AND diameter='$diam'" . $syarat_tim . " group by diameter order by tgl_produksi"));
                                            $baik_roll = $baik_roll['hasil_baik_rol'];

                                            $baik_kg = mysqli_fetch_array(mysqli_query($link, "SELECT sum(pas_berat) as 'hasil_baik_berat' FROM qc_galv where tgl_produksi>='$tgl_aw' AND tgl_produksi<='$tgl_ak' and no_order='$noker' AND diameter='$diam'" . $syarat_tim . " group by diameter order by tgl_produksi"));
                                            $baik_berat = $baik_kg['hasil_baik_berat'];

                                            $sb_rol = mysqli_fetch_array(mysqli_query($link, "SELECT sum(ng_rol) as 'hasil_sb_roll' FROM qc_galv where tgl_produksi>='$tgl_aw' AND tgl_produksi<='$tgl_ak' and no_order='$noker' AND diameter='$diam'" . $syarat_tim . " group by diameter order by tgl_produksi"));
                                            $sb_rol = $sb_rol['hasil_sb_roll'];

                                            $sb_kg = mysqli_fetch_array(mysqli_query($link, "SELECT sum(ng_berat) as 'hasil_sb_berat' FROM qc_galv where tgl_produksi>='$tgl_aw' AND tgl_produksi<='$tgl_ak' and no_order='$noker' AND diameter='$diam'" . $syarat_tim . " group by diameter order by tgl_produksi"));
                                            $sb_berat = $sb_kg['hasil_sb_berat'];

                                            $aval_b = mysqli_fetch_array(mysqli_query($link, "SELECT sum(rejek_rol) as 'aval_baik' FROM qc_galv where tgl_produksi>='$tgl_aw' AND tgl_produksi<='$tgl_ak' and no_order='$noker' AND diameter='$diam'" . $syarat_tim . " group by diameter order by tgl_produksi"));
                                            $aval_baik = $aval_b['aval_baik'];

                                            $aval_r = mysqli_fetch_array(mysqli_query($link, "SELECT sum(rejek_berat) as 'aval_ruwet' FROM qc_galv where tgl_produksi>='$tgl_aw' AND tgl_produksi<='$tgl_ak' and no_order='$noker' AND diameter='$diam'" . $syarat_tim . " group by diameter order by tgl_produksi"));
                                            $aval_ruwet = $aval_r['aval_ruwet'];

                                            $total_rol = $baik_roll + $sb_rol + $aval_baik;
                                            $total_berat = $baik_berat + $sb_berat + $aval_ruwet;

                                            $jam = mysqli_fetch_array(mysqli_query($link, "SELECT sum(jam_kerja) as 'jam_kerja' FROM galvanis where tanggal like '$tanggal2' and diameter='$r_diameter'" . $syarat_tim . " AND status_del='0'  AND no_orker='$noker' group by diameter order by tanggal"));
                                            $jam_kerja = $jam['jam_kerja'];

                                            $hcl = mysqli_fetch_array(mysqli_query($link, "SELECT sum(Bban_hcl) as 'Bban_hcl' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and diameter='$r_diameter'" . $syarat_tim . " AND status_del='0' AND no_orker='$noker'  group by diameter order by tanggal"));
                                            $Bban_hcl = $hcl['Bban_hcl'];
                                            $nh4 = mysqli_fetch_array(mysqli_query($link, "SELECT sum(Bban_nh4cl) as 'Bban_nh4cl' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and diameter='$r_diameter'" . $syarat_tim . " AND status_del='0' AND no_orker='$noker'  group by diameter order by tanggal"));
                                            $Bban_nh4cl = $nh4['Bban_nh4cl'];
                                            $zncl = mysqli_fetch_array(mysqli_query($link, "SELECT sum(Bban_zncl2) as 'Bban_zncl2' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and diameter='$r_diameter'" . $syarat_tim . " AND status_del='0' AND no_orker='$noker'  group by diameter order by tanggal"));
                                            $Bban_zncl2 = $zncl['Bban_zncl2'];
                                            $zn = mysqli_fetch_array(mysqli_query($link, "SELECT sum(Bban_zn) as 'Bban_zn' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and diameter='$r_diameter'" . $syarat_tim . " AND status_del='0' AND no_orker='$noker'  group by diameter order by tanggal"));
                                            $Bban_zn = $zn['Bban_zn'];

                                            $bal = mysqli_fetch_array(mysqli_query($link, "SELECT sum(Bban_al) as 'Bban_al' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and diameter='$r_diameter'" . $syarat_tim . " AND status_del='0' AND no_orker='$noker'  group by diameter order by tanggal"));
                                            $Bban_al = $bal['Bban_al'];
                                            $znal = mysqli_fetch_array(mysqli_query($link, "SELECT sum(Bban_znal) as 'Bban_znal' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and diameter='$r_diameter'" . $syarat_tim . " AND status_del='0' AND no_orker='$noker'  group by diameter order by tanggal"));
                                            $Bban_znal = $znal['Bban_znal'];

                                            $bpb = mysqli_fetch_array(mysqli_query($link, "SELECT sum(Bban_pb) as 'Bban_pb' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and diameter='$r_diameter'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                            $Bban_pb = $bpb['Bban_pb'];
                                            $abut = mysqli_fetch_array(mysqli_query($link, "SELECT sum(Bban_abu_timah) as 'Bban_abu_timah' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and diameter='$r_diameter'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                            $Bban_abu_timah = $abut['Bban_abu_timah'];

                                            $kwhm = mysqli_fetch_array(mysqli_query($link, "SELECT sum(kwh_meter) as 'tkwh' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and diameter='$r_diameter'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                            $kwh = $kwhm['tkwh'];

                                            $pgnm = mysqli_fetch_array(mysqli_query($link, "SELECT sum(pgn) as 'tpgn' FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' and diameter='$r_diameter' AND status_del='0' group by diameter order by tanggal"));
                                            $pgn = $pgnm['tpgn'];


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
                                            $rasio_baik = number_format(($baik_berat / $total_berat) * 100, 2, '.', ',');
                                            $rasio_sb = number_format(($sb_berat / $total_berat) * 100, 2, '.', ',');
                                            // $capaian = number_format(($total_berat / $targetx) * 100, 2, '.', ',');

                                            //$bteam = $row["team"];
                                            //$bshif = $row["shif"];
                                            //$bjml_opt = $row["jml_opt"];


                                    ?>

                                            <tbody>
                                                <!--<tr class="tengah">
											<td style="font-size:11px;<?php echo $warna;
                                                                        $garisnya; ?>"><?php echo $tanggal;
                                                                                        $no ?></td>
											<td style="font-size:11px;<?php echo $warna;
                                                                        $garisnya; ?>" ><?php echo $diameter; ?></td>
											<td style="font-size:11px;<?php echo $warna;
                                                                        $garisnya; ?>" ><?php echo $baik_roll; ?></td>
											<td style="font-size:11px;<?php echo $warna;
                                                                        $garisnya; ?>" ><?php echo number_format($baik_berat, 2, '.', ','); ?></td>
											<td style="font-size:11px;<?php echo $warna;
                                                                        $garisnya; ?>"><?php echo $sb_rol; ?></td>
											<td style="font-size:11px;<?php echo $warna;
                                                                        $garisnya; ?>"><?php echo number_format($sb_berat, 2, '.', ','); ?></td>
											<td style="font-size:11px;<?php echo $warna;
                                                                        $garisnya; ?>" ><?php echo $total_rol; ?></td>
											<td style="font-size:11px;<?php echo $warna;
                                                                        $garisnya; ?>" ><?php echo number_format($total_berat, 2, '.', ','); ?></td>
											<td style="font-size:11px;<?php echo $warna;
                                                                        $garisnya; ?>" ><?php echo number_format($rasio_baik, 2, '.', ',') . "%"; ?></td>
											<td style="font-size:11px;<?php echo $warna;
                                                                        $garisnya; ?>" ><?php echo number_format($rasio_sb, 2, '.', ',') . "%"; ?></td>
											<td style="font-size:11px;<?php echo $warna;
                                                                        $garisnya; ?>" ><?php echo number_format($targetx, 2, '.', ','); ?></td>
											<td style="font-size:11px;<?php echo $warna;
                                                                        $garisnya; ?>" ><?php echo $jam_kerja; ?></td>
											<td style="font-size:11px;<?php echo $warna;
                                                                        $garisnya; ?>" ><?php echo number_format($capaian, 2, '.', ',') . "%"; ?></td>
											<td style="font-size:11px;<?php echo $warna;
                                                                        $garisnya; ?>" ><?php echo number_format($aval_baik, 2, '.', ','); ?></td>
											<td style="font-size:11px;<?php echo $warna;
                                                                        $garisnya; ?>" ><?php echo number_format($aval_ruwet, 2, '.', ','); ?></td>
										</tr><div class="row">-->


                                        <?php
                                            $no = $no + 1;
                                            $brol = $baik_roll; //$brol+
                                            $bkg = $baik_berat; //$bkg+
                                            $srol = $sb_rol; //$srol+
                                            $skg = $sb_berat; //$skg+
                                            $trol = $total_rol; //$trol+
                                            $tkg = $total_berat; //$tkg+
                                            $rb = number_format(($bkg / $tkg) * 100, 2, '.', ',') . " %";
                                            $rs = number_format(($skg / $tkg) * 100, 2, '.', ',') . " %";
                                            $avb = $avb + $aval_baik;
                                            $avr = $avr + $aval_ruwet;
                                            $tot_av = $avb + $avr;
                                            $ttgt = $ttgt + $targetx;
                                            $taval = $aval_baik + $aval_ruwet;
                                            $tavalx = $taval + $tavalx;
                                            $jam_kerjax = $jam_kerja + $jam_kerjax;
                                            $jml_optx = $jml_opt + $jml_optx;


                                            $Bban_hclx = $Bban_hcl; //$Bban_hclx+
                                            $Bban_nh4clx = $Bban_nh4cl; //$Bban_nh4clx+
                                            $Bban_zncl2x = $Bban_zncl2; //$Bban_zncl2x+
                                            $Bban_znx = $Bban_zn; //$Bban_znx+
                                            $Bban_alx = $Bban_al; //$Bban_alx+
                                            $Bban_znalx = $Bban_znal; //$Bban_znalx+
                                            $Bban_pbx = $Bban_pb; //$Bban_pbx+
                                            $Bban_abu_timahx = $Bban_abu_timah; //$Bban_abu_timahx+

                                            $kwhx = $kwh; //$kwhx+
                                            $pgnx = $pgn; //$pgnx+
                                        }
                                        //$no1=$no1+1; 
                                        //$brol=$brol+$baik_roll;
                                    }
                                        ?>
                                        <tr>
                                            <td style="font-size:10px;color:blue" class="tengah"><b>Target/Standart</td>
                                            <td style="font-size:10px;color:blue" class="tengah" colspan="11"> - - - - - - - - - - </td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($sBban_hcl, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($sBban_nh4cl, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($sBban_zncl2, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($sBban_zn, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($sBban_al, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($sBban_znal, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($sBban_pb, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($sBban_abu_timah, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b> - - - </b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b> - - - </b></td>

                                        </tr>
                                        <tr>
                                            <td style="font-size:10px;color:blue" class="tengah"><b>Aktual</td>
                                            <!--<td style="font-size:12px;color:blue" colspan="1" class="tengah"><b>Total<br><?php echo $aw . " sampai " . $ak; ?></b></td>-->
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo $jml_optx; ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo $brol; ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($bkg, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo $srol; ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($skg, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($avb, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($avr, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo $trol; ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($tkg, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format((float) $rb, 2, '.', ',') . "%"; ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format((float) $rs, 2, '.', ',') . "%"; ?></b></td>
                                            <!--<td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($ttgt, 2, '.', ','); ?></b></td>
										<td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($jam_kerjax, 2, '.', ','); ?></b></td>-->
                                            <!--<td style="font-size:10px;color:blue" class="tengah"><b><?php echo "-"; ?></b></td>-->

                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($Bban_hclx, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($Bban_nh4clx, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($Bban_zncl2x, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($Bban_znx, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($Bban_alx, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($Bban_znalx, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($Bban_pbx, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($Bban_abu_timahx, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($kwhx, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo number_format($pgnx, 2, '.', ','); ?></b></td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $hclx = $Bban_hclx / $tkg * 1000;
                                            $nh4clx = $Bban_nh4clx / $tkg * 1000;
                                            $zncl2x = $Bban_zncl2x / $tkg * 1000;
                                            $znx = $Bban_znx / $tkg * 1000;
                                            $alx = $Bban_alx / $tkg * 1000;
                                            $znalx = $Bban_znalx / $tkg * 1000;
                                            $pbx = $Bban_pbx / $tkg * 1000;
                                            $abu_timahx = $Bban_abu_timahx / $tkg * 1000;
                                            if ($sBban_hcl < $hclx) {
                                                $wrn1 = "red";
                                            } else {
                                                $wrn1 = "green";
                                            }
                                            if ($sBban_nh4cl < $nh4clx) {
                                                $wrn2 = "red";
                                            } else {
                                                $wrn2 = "green";
                                            }
                                            if ($sBban_zncl2 < $zncl2x) {
                                                $wrn3 = "red";
                                            } else {
                                                $wrn3 = "green";
                                            }
                                            if ($sBban_zn < $znx) {
                                                $wrn4 = "red";
                                            } else {
                                                $wrn4 = "green";
                                            }
                                            if ($sBban_al < $alx) {
                                                $wrn5 = "red";
                                            } else {
                                                $wrn5 = "green";
                                            }
                                            if ($sBban_znal < $znalx) {
                                                $wrn6 = "red";
                                            } else {
                                                $wrn6 = "green";
                                            }
                                            if ($sBban_pb < $pbx) {
                                                $wrn7 = "red";
                                            } else {
                                                $wrn7 = "green";
                                            }
                                            if ($sBban_abu_timah < $abu_timahx) {
                                                $wrn8 = "red";
                                            } else {
                                                $wrn8 = "green";
                                            }

                                            ?>
                                            <td style="font-size:10px;color:blue" class="tengah"><b>Standart Pemakaian (per Ton)</td>
                                            <td style="font-size:10px;color:blue" class="tengah" colspan="11"> - - - - - - - - - - </td>
                                            <td style="font-size:10px;color:<?php echo $wrn1; ?>" class="tengah"><b><?php echo number_format($hclx, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:<?php echo $wrn2; ?>" class="tengah"><b><?php echo number_format($nh4clx, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:<?php echo $wrn3; ?>" class="tengah"><b><?php echo number_format($zncl2x, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:<?php echo $wrn4; ?>" class="tengah"><b><?php echo number_format($znx, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:<?php echo $wrn5; ?>" class="tengah"><b><?php echo number_format($alx, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:<?php echo $wrn6; ?>" class="tengah"><b><?php echo number_format($znalx, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:<?php echo $wrn7; ?>" class="tengah"><b><?php echo number_format($pbx, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:<?php echo $wrn8; ?>" class="tengah"><b><?php echo number_format($abu_timahx, 2, '.', ','); ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b> - - - </b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b> - - - </b></td>

                                        </tr>
                                            </tbody>
                                </table>
                                <br>

                            <?php }
                            ?>

                            <br>
                        </div>
                    </div>
                </div>
            </div><!-- /#page-wrapper -->
        </div>

    <?php } ?>