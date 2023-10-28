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
        <form method="POST" action="<?= base_url('rekap/ng-galvanis'); ?>">
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
        <form method="POST" action="<?= base_url('rekap/ng-galvanis'); ?>">
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
                        $tgl = mysqli_query($link, "SELECT * FROM qc_galv where tgl_produksi>='$tgl_aw' AND tgl_produksi<='$tgl_ak'" . $syarat_tim . " group by unit order by tgl_produksi desc, unit asc") or die(mysqli_error($link));
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
                                        <p class="<?php echo $cls; ?>">Unit: <?php echo $r_unit; ?></th>
                                    </b>
                                    <table class="tables table-hover" border="1" rules="all">
                                        <thead>
                                            <tr class="tengah">
                                                <th style="font-size:12px;color:<?php echo $cls; ?>" rowspan="1" width="2%" class="tengah">No.</th>
                                                <!--<th style="font-size:10px;" rowspan="2" width="5%" class="tengah">Tanggal</th>-->
                                                <!--<th style="font-size:10px;" rowspan="2" width="5%" class="tengah">unit</th>-->
                                                <th style="font-size:12px;" rowspan="1" width="5%" class="tengah">Tanggal</th>
                                                <th style="font-size:12px;" rowspan="1" width="5%" class="tengah">Kasar</th>
                                                <th style="font-size:12px;" rowspan="1" width="5%" class="tengah">Kusam</th>
                                                <th style="font-size:12px;" rowspan="1" width="5%" class="tengah">Gosong</th>
                                                <th style="font-size:12px;" colspan="1" width="5%" class="tengah">Merah</th>
                                                <th style="font-size:12px;" rowspan="1" width="5%" class="tengah">Ruwet</th>
                                                <th style="font-size:12px;" colspan="1" width="5%" class="tengah">Oval</th>
                                                <th style="font-size:12px;" colspan="1" width="5%" class="tengah">Out Spec</th>
                                                <th style="font-size:12px;" colspan="1" width="5%" class="tengah">Kaku</th>
                                                <th style="font-size:12px;" colspan="1" width="5%" class="tengah">CW</th>
                                                <th style="font-size:12px;" rowspan="1" width="5%" class="tengah">Lengket</th>
                                                <th style="font-size:12px;" rowspan="1" width="5%" class="tengah">Karat</th>
                                                <th style="font-size:12px;" rowspan="1" width="5%" class="tengah">Sambungan</th>
                                                <th style="font-size:12px;" rowspan="1" width="5%" class="tengah">Gelombang</th>
                                                <th style="font-size:12px;" rowspan="1" width="5%" class="tengah">NG Hitam</th>
                                                <th style="font-size:12px;" rowspan="1" width="5%" class="tengah">Sisa Tali<br>Timah</th>
                                                <th style="font-size:12px;" rowspan="1" width="5%" class="tengah">Oli</th>
                                                <th style="font-size:12px;" rowspan="1" width="5%" class="tengah">Total NG</th>
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

                                            $tkasar_rol = 0;
                                            $tkusam_rol = 0;
                                            $tgosong_rol = 0;
                                            $tmerah_rol = 0;
                                            $truwet_rol = 0;
                                            $toval_rol = 0;
                                            $tosp_rol = 0;
                                            $tkaku_rol = 0;
                                            $tcw_rol = 0;
                                            $tlengket_rol = 0;
                                            $tkarat_rol = 0;
                                            $tsambungan_rol = 0;
                                            $tgelombang_rol = 0;
                                            $tng_hitam = 0;
                                            $tng_sisa_talitimah = 0;
                                            $tng_oli = 0;
                                            $ttotal_ng = 0;

                                            // $link = mysqli_connect("localhost:3307", "root", "", "produksi");

                                            $result = mysqli_query($link, "SELECT *,sum(kasar_rol) as kasar_rol,sum(kusam_rol) as kusam_rol,sum(gosong_rol) as gosong_rol,sum(merah_rol) as merah_rol,sum(ruwet_rol) as ruwet_rol,sum(oval_rol) as oval_rol,sum(osp_rol) as osp_rol,sum(kaku_rol) as kaku_rol,sum(cw_rol) as cw_rol,sum(lengket_rol) as lengket_rol,sum(karat_rol) as karat_rol,sum(sambungan_rol) as sambungan_rol,sum(gelombang_rol) as gelombang_rol FROM qc_galv where tgl_produksi>='$tgl_aw' AND tgl_produksi<='$tgl_ak' AND unit='$r_unit'" . $syarat_tim . " group by tgl_produksi order by tgl_produksi desc, unit, shif asc ") or die(mysqli_error($link));
                                            while ($row = mysqli_fetch_array($result)) {
                                                $baris = mysqli_num_rows($result);

                                                $tanggal = $row["tgl_produksi"];
                                                $unit = $row["unit"];


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
                                                $gelombang_rol = $row["gelombang_rol"];
                                                $ng_hitam = $row["ng_hitam"];
                                                $ng_sisa_talitimah = $row["ng_sisa_talitimah"];
                                                $ng_oli = $row["ng_oli"];
                                                $total_ng = $kasar_rol + $kusam_rol + $gosong_rol + $merah_rol + $ruwet_rol + $oval_rol + $osp_rol + $kaku_rol + $cw_rol + $lengket_rol + $karat_rol + $sambungan_rol + $gelombang_rol + $ng_hitam + $ng_sisa_talitimah + $ng_oli;

                                            ?>
                                                <tr class="tengah">
                                                    <td style="font-size:11px;color:<?php echo $cls; ?>">
                                                        <p class="<?php echo $cls; ?>"><?php echo $nox; ?>.</p>
                                                    </td>
                                                    <!--<td style="font-size:11px;"><?php echo $tanggal; ?></td>-->
                                                    <!--<td style="font-size:11px;"><p class="<?php echo $cls; ?>"><?php echo $unit; ?></p></td>-->
                                                    <td style="font-size:11px;">
                                                        <p class="<?php echo $cls; ?>"><?php echo $tanggal; ?></p>
                                                    </td>
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
                                                        <p class="<?php echo $cls; ?>"><?php echo $gelombang_rol; ?></p>
                                                    </td>
                                                    <td style="font-size:11px;">
                                                        <p class="<?php echo $cls; ?>"><?php echo $ng_hitam; ?></p>
                                                    </td>
                                                    <td style="font-size:11px;">
                                                        <p class="<?php echo $cls; ?>"><?php echo $ng_sisa_talitimah; ?></p>
                                                    </td>
                                                    <td style="font-size:11px;">
                                                        <p class="<?php echo $cls; ?>"><?php echo $ng_oli; ?></p>
                                                    </td>
                                                    <td style="font-size:11px;">
                                                        <p class=""><b><?php echo number_format($total_ng, 2, '.', ','); ?></b></p>
                                                    </td>

                                                </tr>
                                            <?php
                                                $nox++;
                                                //Total Per tanggal
                                                $tkasar_rol = $tkasar_rol + $kasar_rol;
                                                $tkusam_rol = $tkusam_rol + $kusam_rol;
                                                $tgosong_rol = $tgosong_rol + $gosong_rol;
                                                $tmerah_rol = $tmerah_rol + $merah_rol;
                                                $truwet_rol = $truwet_rol + $ruwet_rol;
                                                $toval_rol = $toval_rol + $oval_rol;
                                                $tosp_rol = $tosp_rol + $osp_rol;
                                                $tkaku_rol = $tkaku_rol + $kaku_rol;
                                                $tcw_rol = $tcw_rol + $cw_rol;
                                                $tlengket_rol = $tlengket_rol + $lengket_rol;
                                                $tkarat_rol = $tkarat_rol + $karat_rol;
                                                $tsambungan_rol = $tsambungan_rol + $sambungan_rol;
                                                $tgelombang_rol = $tgelombang_rol + $gelombang_rol;
                                                $tng_hitam = $tng_hitam + $ng_hitam;
                                                $tng_sisa_talitimah = $tng_sisa_talitimah + $ng_sisa_talitimah;
                                                $tng_oli = $tng_oli + $ng_oli;
                                                $ttotal_ng = $ttotal_ng + $total_ng;
                                            }
                                            if ($tim == "Semua Tim") {

                                                //$no=$nox;
                                            ?>
                                                <tr>
                                                    <td style="font-size:12px;" colspan="2">
                                                        <p class="tengah"><b>Total NG</b></p>
                                                    </td>

                                                    <td style="font-size:12px;">
                                                        <p class="tengah"><b><?php echo number_format($tkasar_rol, 2, '.', ','); ?></b></p>
                                                    </td>
                                                    <td style="font-size:12px;">
                                                        <p class="tengah"><b><?php echo number_format($tkusam_rol, 2, '.', ','); //$gaji;
                                                                                ?></b></p>
                                                    </td>
                                                    <td style="font-size:12px;">
                                                        <p class="tengah"><b><?php echo number_format($tgosong_rol, 2, '.', ','); ?></b></p>
                                                    </td>
                                                    <td style="font-size:12px;">
                                                        <p class="tengah"><b><?php echo number_format($tmerah_rol, 2, '.', ','); ?></b></p>
                                                    </td>
                                                    <td style="font-size:12px;">
                                                        <p class="tengah"><b><?php echo number_format($truwet_rol, 2, '.', ','); ?></b></p>
                                                    </td>
                                                    <td style="font-size:12px;">
                                                        <p class="tengah"><b><?php echo number_format($toval_rol, 2, '.', ','); ?></b></p>
                                                    </td>
                                                    <td style="font-size:12px;">
                                                        <p class="tengah"><b><?php echo number_format($tosp_rol, 2, '.', ','); ?></b></p>
                                                    </td>
                                                    <td style="font-size:12px;">
                                                        <p class="tengah"><b><?php echo number_format($tkaku_rol, 2, '.', ','); ?></b></p>
                                                    </td>
                                                    <td style="font-size:12px;">
                                                        <p class="tengah"><b><?php echo number_format($tcw_rol, 2, '.', ','); ?></b></p>
                                                    </td>
                                                    <td style="font-size:12px;">
                                                        <p class="tengah"><b><?php echo number_format($tlengket_rol, 2, '.', ','); ?></b></p>
                                                    </td>
                                                    <td style="font-size:12px;">
                                                        <p class="tengah"><b><?php echo number_format($tkarat_rol, 2, '.', ','); ?></b></p>
                                                    </td>
                                                    <td style="font-size:12px;">
                                                        <p class="tengah"><b><?php echo number_format($tsambungan_rol, 2, '.', ','); ?></b></p>
                                                    </td>
                                                    <td style="font-size:12px;">
                                                        <p class="tengah"><b><?php echo number_format($tgelombang_rol, 2, '.', ','); ?></b></p>
                                                    </td>
                                                    <td style="font-size:12px;">
                                                        <p class="tengah"><b><?php echo number_format($tng_hitam, 2, '.', ','); ?></b></p>
                                                    </td>
                                                    <td style="font-size:12px;">
                                                        <p class="tengah"><b><?php echo number_format($tng_sisa_talitimah, 2, '.', ','); ?></b></p>
                                                    </td>
                                                    <td style="font-size:12px;">
                                                        <p class="tengah"><b><?php echo number_format($tng_oli, 2, '.', ','); ?></b></p>
                                                    </td>
                                                    <td style="font-size:12px;">
                                                        <p class="tengah"><b><?php echo number_format($ttotal_ng, 2, '.', ','); ?></b></p>
                                                    </td>
                                                </tr>
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