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

    .pa1 {
        color: blue
    }

    .pa2 {
        color: green
    }

    .pb {
        color: brown;
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
    <div class="col-lg-2">
    </div>
    <div class="col-lg-12">
        <h3>Tentukan Periode:</h3>
        <form method="POST" action="<?= base_url('rekap/ng-kd'); ?>">
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
<?php } else {
?>
    <div class="col-lg-2">
    </div>
    <div class="col-lg-12">
        <h3>Tentukan Periode:</h3>
        <?php $aw = $_POST["txttgl_aw"];
        $ak = $_POST["txttgl_ak"];
        $tim = $_POST["tim"]; ?>
        <form method="POST" action="<?= base_url('rekap/ng-kd'); ?>">
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
                    <h2>Laporan Produksi Galvanis periode: <?php echo $_POST["txttgl_aw"] . " sampai " . $_POST["txttgl_ak"]; ?></h2>

                    <div class="row">
                        <?php
                        $syarat_tim = "";
                        $tgl_aw = date_format(date_create($_POST["txttgl_aw"]), "Y-m-d");
                        $tgl_ak = date_format(date_create($_POST["txttgl_ak"]), "Y-m-d");
                        // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                        $tgl = mysqli_query($link, "SELECT * FROM qc_kd where tgl_produksi>='$tgl_aw' AND tgl_produksi<='$tgl_ak'" . $syarat_tim . " group by tgl_produksi,unit order by tgl_produksi desc, unit asc") or die(mysqli_error($link));
                        while ($r_tgl_1 = mysqli_fetch_array($tgl)) {
                            $r_tgl = date_format(date_create($r_tgl_1["tgl_produksi"]), "Y-m-d");
                            $r_unit = $r_tgl_1["unit"];
                            if ($r_unit == "PA 1") {
                                $cls = "pa1";
                            } elseif ($r_unit == "PA 2") {
                                $cls = "pa2";
                            } else {
                                $cls = "pb";
                            } ?>
                            <div id="page-wrapper">
                                <div class="container-fluid">
                                    <b>
                                        <p class="<?php echo $cls; ?>">Tanggal: <?php echo $r_tgl . "  |  unit: " . $r_unit; ?></th>
                                    </b>
                                    <table class="tables table-hover" border="1" rules="all">
                                        <thead>
                                            <tr class="tengah">
                                                <th style="font-size:10px;color:<?php echo $cls; ?>" rowspan="1" width="2%" class="tengah">No.</th>
                                                <!--<th style="font-size:10px;" rowspan="2" width="5%" class="tengah">Tanggal</th>-->
                                                <!--<th style="font-size:10px;" rowspan="2" width="5%" class="tengah">unit</th>-->
                                                <th style="font-size:10px;" rowspan="1" width="7%" class="tengah">Kasar</th>
                                                <th style="font-size:10px;" rowspan="1" width="7%" class="tengah">Kusam</th>
                                                <th style="font-size:10px;" rowspan="1" width="7%" class="tengah">Gosong</th>
                                                <th style="font-size:10px;" colspan="1" width="7%" class="tengah">Merah</th>
                                                <th style="font-size:10px;" rowspan="1" width="7%" class="tengah">Ruwet</th>
                                                <th style="font-size:10px;" colspan="1" width="7%" class="tengah">Oval</th>
                                                <th style="font-size:10px;" colspan="1" width="7%" class="tengah">Out Spec</th>
                                                <th style="font-size:10px;" colspan="1" width="7%" class="tengah">Kaku</th>
                                                <th style="font-size:10px;" colspan="1" width="7%" class="tengah">CW</th>
                                                <th style="font-size:10px;" rowspan="1" width="7%" class="tengah">Lengket</th>
                                                <th style="font-size:10px;" rowspan="1" width="7%" class="tengah">Karat</th>
                                                <th style="font-size:10px;" rowspan="1" width="7%" class="tengah">Sambungan</th>
                                                <th style="font-size:10px;" rowspan="1" width="7%" class="tengah">Gelombang</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <?php
                                            $nox = 1;
                                            $baku_awals = 0;
                                            $baku_akirs = 0;
                                            $total_bahans = 0;
                                            $total_baik_rols = 0;
                                            $total_baik_berats = 0;
                                            $total_sb_rols = 0;
                                            $total_sb_berats = 0;
                                            $total_rols = 0;
                                            $total_berats = 0;
                                            $total_aval_baiks = 0;
                                            $total_aval_ruwets = 0;
                                            $total_pemakaians = 0;
                                            $total_sisas = 0;
                                            //$tgl_aw=date_format(date_create($_POST["txttgl_aw"]),"Y-m-d");
                                            //$tgl_ak=date_format(date_create($_POST["txttgl_ak"]),"Y-m-d");
                                            //echo $tgl_aw."|".$tgl_ak;
                                            if ($tim == "Semua Tim") {
                                                $syarat_tim = "";
                                            } else {
                                                $syarat_tim = "AND team='$tim'";
                                            }

                                            $baku_awal = 0;
                                            $baku_akir = 0;
                                            $baku_awalx = 0;
                                            $baku_akirx = 0;

                                            $baik_berat = 0;
                                            $baik_rol = 0;
                                            $sb_rol = 0;
                                            $sb_berat = 0;

                                            $total_rol = 0;
                                            $total_berat = 0;

                                            $aval_baik = 0;
                                            $aval_ruwet = 0;

                                            $sisa_sesudah = 0;

                                            $total_bahan = 0;
                                            $total_bahanx = 0;
                                            $total_baik_rolx = 0;
                                            $total_baik_beratx = 0;
                                            $total_sb_rolx = 0;
                                            $total_sb_beratx = 0;
                                            $total_rolx = 0;
                                            $total_beratx = 0;
                                            $total_aval_baikx = 0;
                                            $total_aval_ruwetx = 0;
                                            $total_pemakaianx = 0;
                                            $total_pemakaian = 0;
                                            $total_sisax = 0;
                                            // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                            $result = mysqli_query($link, "SELECT * FROM qc_kd where tgl_produksi='$r_tgl' AND unit='$r_unit'" . $syarat_tim . " order by tgl_produksi desc, unit, shif asc ") or die(mysqli_error($link));
                                            while ($row = mysqli_fetch_array($result)) {
                                                $baris = mysqli_num_rows($result);

                                                $tanggal = $row["tgl_produksi"];
                                                $unit = $row["unit"];
                                                // $team = $row["team"];

                                                $shif = $row["shif"];
                                                $kasar_rol = $row["kasar_rol"];
                                                $kusam_rol = $row["kusam_rol"];
                                                $gosong_rol = $row["gosong_rol"];
                                                $merah_rol = $row["merah_rol"];
                                                $ruwet_rol = $row["ruwet_rol"];
                                                $oval_rol = $row["oval_rol"];
                                                $osp_rol = $row["osp_rol"];
                                                $kaku_rol = $row["kaku_rol"];
                                                $cw_rol = $row["cw_rol"];
                                                $lengket_rol = $row["lengket_rol"];
                                                $karat_rol = $row["karat_rol"];
                                                $sambungan_rol = $row["sambungan_rol"];
                                                //$aval_ruwet = $row["aval_ruwet"];
                                                //$total_pemakaian = $row["total_pemakaian"];
                                                //$sisa_sesudah = $row["sisa_sesudah"];
                                                //$keterangan = $row["ket"];
                                                //$total_berat = $row["total_berat"];
                                            ?>
                                                <tr class="tengah">
                                                    <td style="font-size:11px;color:<?php echo $cls; ?>">
                                                        <p class="<?php echo $cls; ?>"><?php echo $nox; ?>.</p>
                                                    </td>
                                                    <!--<td style="font-size:11px;"><?php echo $tanggal; ?></td>-->
                                                    <!--<td style="font-size:11px;"><p class="<?php echo $cls; ?>"><?php echo $unit; ?></p></td>-->
                                                    <td style="font-size:11px;">
                                                        <p class="<?php echo $cls; ?>"><?php echo $kasar_rol; ?></p>
                                                    </td>
                                                    <td style="font-size:11px;">
                                                        <p class="<?php echo $cls; ?>"><?php echo $kusam_rol; //$gaji;
                                                                                        ?></p>
                                                    </td>
                                                    <td style="font-size:11px;">
                                                        <p class="<?php echo $cls; ?>"><?php echo $gosong_rol; ?></p>
                                                    </td>
                                                    <td style="font-size:11px;">
                                                        <p class="<?php echo $cls; ?>"><?php echo $merah_rol; ?></p>
                                                    </td>
                                                    <td style="font-size:11px;">
                                                        <p class="<?php echo $cls; ?>"><?php echo $ruwet_rol; ?></p>
                                                    </td>
                                                    <td style="font-size:11px;">
                                                        <p class="<?php echo $cls; ?>"><?php echo $oval_rol; ?></p>
                                                    </td>
                                                    <td style="font-size:11px;">
                                                        <p class="<?php echo $cls; ?>"><?php echo $osp_rol; ?></p>
                                                    </td>
                                                    <td style="font-size:11px;">
                                                        <p class="<?php echo $cls; ?>"><?php echo $kaku_rol; ?></p>
                                                    </td>
                                                    <td style="font-size:11px;">
                                                        <p class="<?php echo $cls; ?>"><?php echo $cw_rol; ?></p>
                                                    </td>
                                                    <td style="font-size:11px;">
                                                        <p class="<?php echo $cls; ?>"><?php echo $lengket_rol; ?></p>
                                                    </td>
                                                    <td style="font-size:11px;">
                                                        <p class="<?php echo $cls; ?>"><?php echo $karat_rol; ?></p>
                                                    </td>
                                                    <td style="font-size:11px;">
                                                        <p class="<?php echo $cls; ?>"><?php echo $sambungan_rol; ?></p>
                                                    </td>
                                                    <td style="font-size:11px;">
                                                        <p class="<?php echo $cls; ?>"><?php //echo $sambungan_rol;
                                                                                        ?></p>
                                                    </td>
                                                    <!--<td style="font-size:11px;" ><p class="<?php echo $cls; ?>"><?php echo $aval_baik; ?></p></td>
									<td style="font-size:11px;" ><p class="<?php echo $cls; ?>"><?php echo $aval_ruwet; ?></p></td>
									<td style="font-size:11px;" ><p class="<?php echo $cls; ?>"><?php echo $total_pemakaian; ?></p></td>
									<td style="font-size:11px;" ><p class="<?php echo $cls; ?>"><?php echo $sisa_sesudah; ?></p></td>
									<td style="font-size:11px;" ><p class="<?php echo $cls; ?>"><?php echo $keterangan; ?></p></td>-->

                                                </tr>
                                            <?php
                                                $nox++;
                                                //Total Per tanggal
                                                $baku_awalx = $baku_awalx + $baku_awal;
                                                $baku_akirx = $baku_akirx + $baku_akir;
                                                $total_bahanx = $total_bahanx + $total_bahan;
                                                $total_baik_rolx = $total_baik_rolx + $baik_rol;
                                                $total_baik_beratx = $total_baik_beratx + $baik_berat;
                                                $total_sb_rolx = $total_sb_rolx + $sb_rol;

                                                $total_sb_beratx = $total_sb_beratx + $sb_berat;
                                                $total_rolx = $total_rolx + $total_rol;
                                                $total_beratx = $total_beratx + $total_berat;
                                                $total_aval_baikx = $total_aval_baikx + $aval_baik;
                                                $total_aval_ruwetx = $total_aval_ruwetx + $aval_ruwet;
                                                $total_pemakaianx = $total_pemakaianx + $total_pemakaian;
                                                $total_sisax = $total_sisax + $sisa_sesudah;

                                                //Total Semua
                                                $baku_awals = $baku_awals + $baku_awal;
                                                $baku_akirs = $baku_akirs + $baku_akir;
                                                $total_bahans = $total_bahans + $total_bahan;
                                                $total_baik_rols = $total_baik_rols + $baik_rol;
                                                $total_baik_berats = $total_baik_berats + $baik_berat;
                                                $total_sb_rols = $total_sb_rols + $sb_rol;

                                                $total_sb_berats = $total_sb_berats + $sb_berat;
                                                $total_rols = $total_rols + $total_rol;
                                                $total_berats = $total_berats + $total_berat;
                                                $total_aval_baiks = $total_aval_baiks + $aval_baik;
                                                $total_aval_ruwets = $total_aval_ruwets + $aval_ruwet;
                                                $total_pemakaians = $total_pemakaians + $total_pemakaian;
                                                $total_sisas = $total_sisas + $sisa_sesudah;
                                            }
                                            if ($tim == "Semua Tim") {

                                                //$no=$nox;
                                            ?>
                                                <!--<tr>
										<td style="font-size:12px;" colspan="4" class="tengah"><b><p class="<?php echo $cls; ?>"><?php echo "Total " . $r_tgl; ?></p></b></td>
										<td style="font-size:12px;" class="tengah"><b><p class="<?php echo $cls; ?>"><?php echo $baku_awalx; ?></p></b></td>
										<td style="font-size:12px;" class="tengah"><b><p class="<?php echo $cls; ?>"><?php echo $baku_akirx; ?></p></b></td>
										<td style="font-size:12px;" class="tengah"><b><p class="<?php echo $cls; ?>"><?php echo $total_bahanx; ?></p></b></td>
										<td style="font-size:12px;" class="tengah"><b><p class="<?php echo $cls; ?>"><?php echo "-"; ?></p></b></td>
										<td style="font-size:12px;" class="tengah"><b><p class="<?php echo $cls; ?>"><?php echo $total_baik_rolx; ?></p></b></td>
										<td style="font-size:12px;" class="tengah"><b><p class="<?php echo $cls; ?>"><?php echo $total_baik_beratx; ?></p></b></td>
										<td style="font-size:12px;" class="tengah"><b><p class="<?php echo $cls; ?>"><?php echo $total_sb_rolx; ?></p></b></td>
										<td style="font-size:12px;" class="tengah"><b><p class="<?php echo $cls; ?>"><?php echo $total_sb_beratx; ?></p></b></td>
										<td style="font-size:12px;" class="tengah"><b><p class="<?php echo $cls; ?>"><?php echo $total_rolx; ?></p></b></td>
										<td style="font-size:12px;" class="tengah"><b><p class="<?php echo $cls; ?>"><?php echo $total_beratx; ?></b></p></td>
										<td style="font-size:12px;" class="tengah"><b><p class="<?php echo $cls; ?>"><?php echo $total_aval_baikx; ?></p></b></td>
										<td style="font-size:12px;" class="tengah"><b><p class="<?php echo $cls; ?>"><?php echo $total_aval_ruwetx; ?></p></b></td>
										<td style="font-size:12px;" class="tengah"><b><p class="<?php echo $cls; ?>"><?php echo $total_pemakaianx; ?></p></b></td>
										<td style="font-size:12px;" class="tengah"><b><p class="<?php echo $cls; ?>"><?php echo $total_sisax; ?></p></b></td>
										<td style="font-size:12px;" class="tengah"><b><p class="<?php echo $cls; ?>"><?php echo "-"; ?></p></b></td>
									</tr>-->
                                            <?php } //$nox++;
                                            ?>
                                            <!--<tr>
									<td style="font-size:12px;color:green" colspan="6" class="tengah"><b><?php echo "Total " . $_POST["txttgl_aw"] . " sampai " . $_POST["txttgl_ak"]; ?></b></td>
									<td style="font-size:12px;color:green" class="tengah"><b><?php echo $baku_awals; ?></b></td>
									<td style="font-size:12px;color:green" class="tengah"><b><?php echo $baku_akirs; ?></b></td>
									<td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_bahans; ?></b></td>
									<td style="font-size:12px;color:green" class="tengah"><b><?php echo "-"; ?></b></td>
									<td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_baik_rols; ?></b></td>
									<td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_baik_berats; ?></b></td>
									<td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_sb_rols; ?></b></td>
									<td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_sb_berats; ?></b></td>
									<td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_rols; ?></b></td>
									<td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_berats; ?></b></td>
									<td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_aval_baiks; ?></b></td>
									<td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_aval_ruwets; ?></b></td>
									<td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_pemakaians; ?></b></td>
									<td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_sisas; ?></b></td>
									<td style="font-size:12px;color:green" class="tengah"><b><?php echo "-"; ?></b></td>
								</tr>-->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br>

                        <?php }
                        ?>



                        <div class="row">
                            <div class="row">
                            </div>
                        </div>
                    </div>
                </div><!-- /#page-wrapper -->
            </div>
        </div>
    <?php } ?>