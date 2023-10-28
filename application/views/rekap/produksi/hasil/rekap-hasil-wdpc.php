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
            <form method="POST" action="<?= base_url('rekap/hasil-wdpc'); ?>">
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
                                    <label>Operator (Pilih Operator)</label>
                                    <select class="form-control" name="txtoperator" id="txtoperator" required>
                                        <option>-Semua Operator-</option>
                                        <?php
                                        // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                        $opt = mysqli_query($link, "SELECT * FROM operator where bagian='wdpc' AND status_del='0'") or die(mysqli_error($link));
                                        while ($data = mysqli_fetch_array($opt)) {
                                            $kd = $data["kd_opt"];
                                            $nama = $data["nama_karyawan"];

                                            //echo $nama;
                                            echo "<option>$nama</option>";
                                        } ?>
                                        <!--<option>Agil</option>
									<option>Jafar</option>
									<option>Totok</option>
									<option>Suprapman</option>
									<option>Wawan</option>
									<option>Dian</option>
									<option>Firdaus</option>
									<option>Nur Solikin</option>
									<option>Anas</option>
									<option>Syahroni</option>
									<option>Fathoni</option>
									<option>Rudy</option>
									<option>Waluyo</option>
									<option>Saprudin</option>
									<option>M . ABDUL HAMID</option>
									<option>M. Solikin</option>
									<option>Arif</option>
									<option>Wahyudi</option>
									<option>Hamid Prastyo</option>-->

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
            $tim = $_POST["txtoperator"]; ?>
            <form method="POST" action="<?= base_url('rekap/hasil-wdpc'); ?>">
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
                                    <label>Operator (Pilih Operator)</label>
                                    <select class="form-control" name="txtoperator" id="txtoperator" required>
                                        <option>
                                            <selected><?php echo $tim; ?></selected>
                                        </option>
                                        <option>-Semua Operator-</option>
                                        <?php
                                        // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                        $opt = mysqli_query($link, "SELECT * FROM operator where bagian='wdpc' AND status_del='0'") or die(mysqli_error($link));
                                        while ($data = mysqli_fetch_array($opt)) {
                                            $kd = $data["kd_opt"];
                                            $nama = $data["nama_karyawan"];

                                            //echo $nama;
                                            echo "<option>$nama</option>";
                                        } ?>
                                        <!--<option>Agil</option>
									<option>Jafar</option>
									<option>Totok</option>
									<option>Suprapman</option>
									<option>Wawan</option>
									<option>Dian</option>
									<option>Firdaus</option>
									<option>Nur Solikin</option>
									<option>Anas</option>
									<option>Syahroni</option>
									<option>Fathoni</option>
									<option>Rudy</option>
									<option>Waluyo</option>
									<option>Saprudin</option>
									<option>M . ABDUL HAMID</option>
									<option>M. Solikin</option>
									<option>Arif</option>
									<option>Wahyudi</option>
									<option>Hamid Prastyo</option>-->
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
                        <h2>
                            <center>Laporan Rekapitulasi Produksi WD PC: <?php echo $_POST["txttgl_aw"] . " sampai " . $_POST["txttgl_ak"] . "<br>(" . $tim . ")"; ?></center>
                        </h2>
                        <div id="print-area-1" class="print-area">
                            <div class="row">
                                <table class="tables table-hover" border="1" rules="all">
                                    <thead>
                                        <?php //echo $r_diameter."|".$tanggal;
                                        ?>
                                        <tr class="tengah">
                                            <th style="font-size:10px;" rowspan="2" width="7%" class="tengah">Tanggal</th>
                                            <th style="font-size:10px;" rowspan="2" width="5%" class="tengah">Diameter</th>
                                            <th style="font-size:10px;" colspan="2" width="13%" class="tengah">Hasil Baik</th>
                                            <th style="font-size:10px;" colspan="2" width="13%" class="tengah">Hasil Hold</th>
                                            <th style="font-size:10px;" colspan="2" width="13%" class="tengah">Total Hasil</th>
                                            <th style="font-size:10px;" colspan="2" width="13%" class="tengah">Rasio</th>
                                            <th style="font-size:10px;" colspan="3" width="21%" class="tengah">Target dan Capaian</th>
                                            <th style="font-size:10px;" colspan="2" width="15%" class="tengah">Aval</th>
                                        </tr>
                                        <tr>
                                            <th style="font-size:10px;" width="5%" class="tengah">Roll</th>
                                            <th style="font-size:10px;" width="8%" class="tengah">Berat (Kg)</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Roll</th>
                                            <th style="font-size:10px;" width="8%" class="tengah">Berat (Kg)</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Roll</th>
                                            <th style="font-size:10px;" width="8%" class="tengah">Berat (Kg)</th>
                                            <th style="font-size:10px;" width="7%" class="tengah">Rasio Baik</th>
                                            <th style="font-size:10px;" width="6%" class="tengah">Rasio Hold</th>
                                            <th style="font-size:10px;" width="7%" class="tengah">Target</th>
                                            <th style="font-size:10px;" width="7%" class="tengah">Durasi Kerja</th>
                                            <th style="font-size:10px;" width="7%" class="tengah">Capaian</th>
                                            <th style="font-size:10px;" width="8%" class="tengah">Aval Baik</th>
                                            <th style="font-size:10px;" width="7%" class="tengah">Aval Ruwet</th>
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
                                    $no = 1;
                                    $tgl_aw = date_format(date_create($_POST["txttgl_aw"]), "Y-m-d");
                                    $tgl_ak = date_format(date_create($_POST["txttgl_ak"]), "Y-m-d");
                                    if ($tim == "-Semua Operator-") {
                                        $syarat_tim = "";
                                    } else {
                                        $syarat_tim = "AND operator='$tim'";
                                        //$syarat_tim="";
                                    }
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $r_tgl1 = mysqli_query($link, "SELECT * FROM wdpc where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak'" . $syarat_tim . " AND status_del='0' group by tanggal order by tanggal asc") or die(mysqli_error($link));

                                    /*if (($tgl_aw=="")||($tgl_ak=="")){
								$r_tgl1=mysqli_query($link, "SELECT * FROM galvanis where status_del='0' group by tanggal order by tanggal") or die(mysqli_error($link));
						}else{
							$r_tgl1=mysqli_query($link, "SELECT * FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak'  AND status_del='0' group by tanggal order by tanggal") or die(mysqli_error($link));
						}*/
                                    while ($r_tgl2 = mysqli_fetch_array($r_tgl1)) {
                                        $tanggal2 = date_format(date_create($r_tgl2["tanggal"]), "Y-m-d");
                                        //echo $tanggal2."<br>";

                                        //$r_tgl=mysqli_query($link, "SELECT * FROM galvanis where tanggal='$tanggal1' group by diameter order by tanggal") or die(mysqli_error($link));
                                        $r_tgl = mysqli_query($link, "SELECT * FROM wdpc where tanggal like '$tanggal2'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal,diameter desc") or die(mysqli_error($link));
                                        while ($row = mysqli_fetch_array($r_tgl)) {
                                            $target = 480 / 7;
                                            //$jam_kerja=$row["jam_kerja"];
                                            $r_ukuran = $row["diameter"];
                                            /*if ($r_ukuran<=1.67){
										//$target=11500;
										$target=438;//per jam
									}elseif ($$r_ukuran<=2.18){
										//$target=12500;
										$target=521;//per jam
									}elseif ($$r_ukuran<=2.88){
										//$target=15000;
										$target=625;//per jam
									}elseif ($$r_ukuran<=3.50){
										//$target=18000;
										$target=750;//per jam
									}else{
										//$target=18000;
										$target=750;//per jam
									}*/
                                            $tanggal = $row["tanggal"];
                                            $baik_rol = mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_baik_roll) as 'hasil_baik_rol' FROM wdpc where tanggal like '$tanggal' and diameter='$r_ukuran'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                            $baik_rol = $baik_rol['hasil_baik_rol'];

                                            $baik_kg = mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_baik_berat) as 'hasil_baik_berat' FROM wdpc where tanggal like '$tanggal' and diameter='$r_ukuran'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                            $baik_berat = $baik_kg['hasil_baik_berat'];

                                            $sb_rol = mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_sb_roll) as 'hasil_sb_roll' FROM wdpc where tanggal like '$tanggal2' and diameter='$r_ukuran'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                            $sb_rol = $sb_rol['hasil_sb_roll'];
                                            $sb_kg = mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_sb_berat) as 'hasil_sb_berat' FROM wdpc where tanggal like '$tanggal2' and diameter='$r_ukuran'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                            $sb_berat = $sb_kg['hasil_sb_berat'];

                                            $tot_rol = mysqli_fetch_array(mysqli_query($link, "SELECT sum(total_rol) as 'total_roll' FROM wdpc where tanggal like '$tanggal2' and diameter='$r_ukuran'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                            $total_rol = $tot_rol['total_roll'];

                                            $tot_kg = mysqli_fetch_array(mysqli_query($link, "SELECT sum(total_berat) as 'total_berat' FROM wdpc where tanggal like '$tanggal2' and diameter='$r_ukuran'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                            $total_berat = $tot_kg['total_berat'];

                                            $aval_b = mysqli_fetch_array(mysqli_query($link, "SELECT sum(aval_baik) as 'aval_baik' FROM wdpc where tanggal like '$tanggal2' and diameter='$r_ukuran'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                            $aval_baik = $aval_b['aval_baik'];
                                            $aval_r = mysqli_fetch_array(mysqli_query($link, "SELECT sum(aval_ruwet) as 'aval_ruwet' FROM wdpc where tanggal like '$tanggal2' and diameter='$r_ukuran'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                            $aval_ruwet = $aval_r['aval_ruwet'];

                                            $jam = mysqli_fetch_array(mysqli_query($link, "SELECT sum(jam_kerja) as 'jam_kerja' FROM wdpc where tanggal like '$tanggal2' and diameter='$r_ukuran'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                            $jam_kerja = $jam['jam_kerja'];


                                            $team = $row["operator"];
                                            $shif = $row["shif"];
                                            // $jml_opt = $row["jml_opt"];
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
                                            $capaian = number_format(($total_berat / $targetx) * 100, 2, '.', ',');

                                    ?>


                                            <tbody>
                                                <tr class="tengah">
                                                    <td style="font-size:11px;"><?php echo $tanggal;
                                                                                $no ?></td>
                                                    <td style="font-size:11px;"><?php echo $diameter; ?></td>
                                                    <td style="font-size:11px;"><?php echo $baik_rol; ?></td>
                                                    <td style="font-size:11px;"><?php echo number_format($baik_berat, 2, '.', ','); ?></td>
                                                    <td style="font-size:11px;"><?php echo $sb_rol; ?></td>
                                                    <td style="font-size:11px;"><?php echo number_format($sb_berat, 2, '.', ','); ?></td>
                                                    <td style="font-size:11px;"><?php echo $total_rol; ?></td>
                                                    <td style="font-size:11px;"><?php echo number_format($total_berat, 2, '.', ','); ?></td>
                                                    <td style="font-size:11px;"><?php echo number_format($rasio_baik, 2, '.', ',') . "%"; ?></td>
                                                    <td style="font-size:11px;"><?php echo number_format($rasio_sb, 2, '.', ',') . "%"; ?></td>
                                                    <td style="font-size:11px;"><?php echo number_format($targetx, 2, '.', ','); ?></td>
                                                    <td style="font-size:11px;"><?php echo $jam_kerja; ?></td>
                                                    <td style="font-size:11px;"><?php echo number_format($capaian, 2, '.', ',') . "%"; ?></td>
                                                    <td style="font-size:11px;"><?php echo number_format($aval_baik, 2, '.', ','); ?></td>
                                                    <td style="font-size:11px;"><?php echo number_format($aval_ruwet, 2, '.', ','); ?></td>
                                                </tr>
                                                <div class="row">


                                            <?php
                                            $no = $no + 1;
                                            $brol = $brol + $baik_rol;
                                            $bkg = $bkg + $baik_berat;
                                            $srol = $srol + $sb_rol;
                                            $skg = $skg + $sb_berat;
                                            $trol = $trol + $total_rol;
                                            $tkg = $tkg + $total_berat;
                                            $rb = number_format(($bkg / $tkg) * 100, 2, '.', ',') . " %";
                                            $rs = number_format(($skg / $tkg) * 100, 2, '.', ',') . " %";
                                            $avb = $avb + $aval_baik;
                                            $avr = $avr + $aval_ruwet;
                                            $ttgt = $ttgt + $targetx;
                                        }
                                        //$no1=$no1+1; 
                                        //$brol=$brol+$baik_roll;
                                    }
                                            ?>
                                            <tr>
                                                <td style="font-size:12px;color:blue" colspan="2" class="tengah"><b>Total<br><?php echo $aw . " sampai " . $ak; ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $brol; ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format($bkg, 2, '.', ','); ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $srol; ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format($skg, 2, '.', ','); ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $trol; ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format($tkg, 2, '.', ','); ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format((float) $rb, 2, '.', ','); ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format((float) $rs, 2, '.', ','); ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format($ttgt, 2, '.', ','); ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo "-"; ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo "-"; ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format($avb, 2, '.', ','); ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo number_format($avr, 2, '.', ','); ?></b></td>
                                            </tr>


                                            </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="row">
                                    <div class="row"> <br>
                                        <div class="col-lg-6">
                                            <div class="container-fluid">
                                                <h2>Rekap Per Diameter</h2>
                                                <table class="tables table-hover" border="1" rules="all">
                                                    <tr>
                                                        <th style="font-size:10px;" rowspan="2" width="10%" class="tengah">Diameter</th>
                                                        <th style="font-size:10px;" colspan="2" width="30%" class="tengah">Baik</th>
                                                        <th style="font-size:10px;" colspan="2" width="30%" class="tengah">Hold</th>
                                                        <th style="font-size:10px;" colspan="2" width="30%" class="tengah">Total Hasil</th>
                                                        <th style="font-size:10px;" colspan="2" width="30%" class="tengah">Total Aval</th>
                                                    </tr>
                                                    <tr>
                                                        <th style="font-size:10px;" width="10%" class="tengah">Roll</th>
                                                        <th style="font-size:10px;" width="20%" class="tengah">Berat (Kg)</th>
                                                        <th style="font-size:10px;" width="10%" class="tengah">Roll</th>
                                                        <th style="font-size:10px;" width="20%" class="tengah">Berat (Kg)</th>
                                                        <th style="font-size:10px;" width="10%" class="tengah">Total Roll</th>
                                                        <th style="font-size:10px;" width="20%" class="tengah">Total Berat (Kg)</th>
                                                        <th style="font-size:10px;" width="20%" class="tengah">Aval Baik (Kg)</th>
                                                        <th style="font-size:10px;" width="20%" class="tengah">Aval Ruwet (Kg)</th>
                                                    </tr>
                                                    <?php
                                                    $dia = mysqli_query($link, "SELECT * FROM wdpc where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak'" . $syarat_tim . " AND status_del='0' group by diameter order by diameter asc") or die(mysqli_error($link));
                                                    while ($rowd = mysqli_fetch_array($dia)) {
                                                        $diam = $rowd['diameter'];

                                                        $rolb = mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_baik_roll) as 'hasil_baik_roll' FROM wdpc where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' AND diameter='$diam'" . $syarat_tim . "  AND status_del='0'"));
                                                        $totald_rolb = $rolb['hasil_baik_roll'];

                                                        $rols = mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_sb_roll) as 'hasil_sb_roll' FROM wdpc where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' AND diameter='$diam'" . $syarat_tim . "  AND status_del='0'"));
                                                        $totald_rols = $rols['hasil_sb_roll'];

                                                        $kgb = mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_baik_berat) as 'hasil_baik_berat' FROM wdpc where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' AND diameter='$diam'" . $syarat_tim . "  AND status_del='0'"));
                                                        $totald_kgb = $kgb['hasil_baik_berat'];

                                                        $kgs = mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_sb_berat) as 'hasil_sb_berat' FROM wdpc where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' AND diameter='$diam'" . $syarat_tim . "  AND status_del='0'"));
                                                        $totald_kgs = $kgs['hasil_sb_berat'];

                                                        $totr = mysqli_fetch_array(mysqli_query($link, "SELECT sum(total_rol) as 'total_roll' FROM wdpc where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' AND diameter='$diam'" . $syarat_tim . "  AND status_del='0'"));
                                                        $totald_trol = $totr['total_roll'];

                                                        $totb = mysqli_fetch_array(mysqli_query($link, "SELECT sum(total_berat) as 'total_berat' FROM wdpc where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' AND diameter='$diam'" . $syarat_tim . "  AND status_del='0'"));
                                                        $totald_tkg = $totb['total_berat'];

                                                        $taval_b = mysqli_fetch_array(mysqli_query($link, "SELECT sum(aval_baik) as 'aval_baik' FROM wdpc where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' AND diameter='$diam'" . $syarat_tim . "  AND status_del='0'"));
                                                        $taval_b = $taval_b['aval_baik'];

                                                        $taval_s = mysqli_fetch_array(mysqli_query($link, "SELECT sum(aval_ruwet) as 'aval_ruwet' FROM wdpc where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' AND diameter='$diam'" . $syarat_tim . "  AND status_del='0'"));
                                                        $taval_s = $taval_s['aval_ruwet'];


                                                        //echo "<br>Total Diameter ".$diam." adalah : ".$totald;
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
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </table>

                                            </div>
                                            <div class="row">
                                                <div class="row">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /#page-wrapper -->
                            </div>
                        </div>
                    </div>
                <?php } ?>