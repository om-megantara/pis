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

<div class="col-lg-2">
</div>
<div class="col-lg-12">
    <div class="row"></div>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row"><br>
                <div id="print-area-1" class="print-area">
                    <table class="tables table-hover" border="1">
                        <tr>
                            <td width="20%" rowspan="4"> &nbsp;No. Dok &nbsp;&nbsp;: FOM-QCA-03-05<br>&nbsp;Rev &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 1<br>&nbsp;Tanggal&nbsp;&nbsp;&nbsp;&nbsp;: 11 Juni 2018 <br>&nbsp;Hal. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 1/1</td>
                            <td width="50%" rowspan="4" class="tengah">
                                <h2>PT. NEW SIMO MULIJO</h2>
                            </td>
                            <td width="15%" class="tengah">Disetujui Oleh,</td>
                            <td width="15%" class="tengah">Dibuat Oleh,</td>
                        </tr>
                        <tr>
                            <td width="15%" rowspan="2" class="tengah">&nbsp;</td>
                            <td width="15%" rowspan="2" class="tengah">&nbsp;</td>
                        </tr>
                        <tr></tr>
                        <tr>
                            <td width="15%" class="tengah">Kepala QC</td>
                            <td width="15%" class="tengah">Staf QC</td>
                        </tr>
                    </table><br>

                    <?php

                    $tgl = date_format(date_create($_POST['txttgl_aw']), "Y-m-d");
                    $unit = $_POST['unit'];
                    if ($unit == "Semua Unit") {
                        $syarat_tim = "";
                    } else {
                        $syarat_tim = "AND unit='$unit'";
                    }
                    $result = mysqli_query($link, "SELECT * FROM qc_galv where tgl_produksi='$tgl'" . $syarat_tim . "group by unit") or die(mysqli_error($link));
                    $row2 = mysqli_fetch_array($result);
                    if ($row2 <= 0) {
                        echo "<center style='font-size:14px'><h2><b>Data tidak ada !!</b></h2></center>";
                    } else {


                        $unitx = $row2["unit"];
                        $tanggalx = $row2["tgl_produksi"];
                        $diameter = $row2["diameter"];
                        $day = date('D', strtotime($tgl));

                        $dayList = array(
                            'Sun' => 'Minggu',
                            'Mon' => 'Senin',
                            'Tue' => 'Selasa',
                            'Wed' => 'Rabu',
                            'Thu' => 'Kamis',
                            'Fri' => 'Jumat',
                            'Sat' => 'Sabtu'
                        );
                    }
                    ?>
                    Hari&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php //echo  $dayList[$day]; 
                                                                                                                                        ?><br>
                    Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php //echo  date_format(date_create($tanggalx), "d-M-Y"); 
                                                                                                    ?><br>
                    Bagian/Unit &nbsp;&nbsp;:&nbsp;Galvanis/<?php echo $unit; ?><br>
                    <!--Diameter &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $diameter; ?><br>-->
                    <h3>FORM SERAH TERIMA HASIL PRODUKSI</h3>

                    <div class="row">
                        <div class="container-fluid">
                            <?php

                            $tgl_aw = date_format(date_create($_POST["txttgl_aw"]), "Y-m-d");
                            //$tgl_ak=date_format(date_create($_POST["txttgl_ak"]),"Y-m-d");
                            $tgl = mysqli_query($link, "SELECT * FROM qc_galv where tgl_produksi='$tgl_aw'" . $syarat_tim . "group by unit") or die(mysqli_error($link));
                            while ($r_tgl_1 = mysqli_fetch_array($tgl)) {
                                $r_tgl = date_format(date_create($r_tgl_1["tgl_produksi"]), "Y-m-d");
                                $r_unit = $r_tgl_1["unit"];
                                $diam = $r_tgl_1["diameter"];

                                if ($r_unit == "PA 1") {
                                    $cls = "pa1";
                                } elseif ($r_unit == "PA 2") {
                                    $cls = "pa2";
                                } else {
                                    $cls = "pb";
                                }

                            ?>

                                <b>
                                    <p class="<?php echo $cls; ?>">Hasil Inspeksi Unit: <?php echo " " . $r_unit . "&nbsp;&nbsp;&nbsp;Diameter: " . $diam; ?></th>
                                </b>
                                <table class="tables table-hover" border="1" rules="all">
                                    <thead>
                                        <tr class="tengah">
                                            <th style="font-size:10px;color:<?php echo $cls; ?>" width="5%" class="tengah">No.</th>
                                            <th style="font-size:10px" width="8%" class="tengah">Shif</th>
                                            <th style="font-size:10px" width="12%" class="tengah">Passed (Coil)</th>
                                            <th style="font-size:10px" width="12%" class="tengah">Passed (Berat/Kg)</th>
                                            <th style="font-size:10px" width="12%" class="tengah">NG (Coil)</th>
                                            <th style="font-size:10px" width="12%" class="tengah">NG (Berat/Kg)</th>
                                            <th style="font-size:10px" width="12%" class="tengah">Reject (Coil)</th>
                                            <th style="font-size:10px" width="12%" class="tengah">Reject (Berat/Kg)</th>
                                            <th style="font-size:10px" width="15%" class="tengah">Ttd (QC)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $nox = 1;
                                            $tp_rol = 0;
                                            $tp_berat = 0;
                                            $tng_rol = 0;
                                            $tng_berat = 0;
                                            $trej_rol = 0;
                                            $trej_berat = 0;

                                            $data = mysqli_query($link, "SELECT * FROM qc_galv where tgl_produksi='$tgl_aw' AND unit='$r_unit'") or die(mysqli_error($link));
                                            while ($datax = mysqli_fetch_array($data)) {
                                                $shif = $datax["shif"];
                                                $pas_rol = $datax["pas_rol"];
                                                $pas_berat = $datax["pas_berat"];
                                                $ng_rol = $datax["ng_rol"];
                                                $ng_berat = $datax["ng_berat"];
                                                $rej_rol = $datax["rejek_rol"];
                                                $rej_berat = $datax["rejek_berat"];



                                            ?>
                                                <td class="tengah"><?php echo $nox; ?></td>
                                                <td class="tengah"><?php echo $shif; ?></td>
                                                <td class="tengah"><?php echo $pas_rol; ?></td>
                                                <td class="tengah"><?php echo $pas_berat; ?></td>
                                                <td class="tengah"><?php echo $ng_rol; ?></td>
                                                <td class="tengah"><?php echo $ng_berat; ?></td>
                                                <td class="tengah"><?php echo $rej_rol; ?></td>
                                                <td class="tengah"><?php echo $rej_berat; ?></td>
                                                <td class="tengah"></td>
                                        </tr>
                                        <?php
                                                $tp_rol = $tp_rol + $pas_rol;
                                                $tp_berat = $tp_berat + $pas_berat;
                                                $tng_rol = $tng_rol + $ng_rol;
                                                $tng_berat = $tng_berat + $ng_berat;
                                                // $trej_rol = trej_rol + rej_rol;
                                                // $trej_berat = trej_berat + rej_berat;
                                                $trej_rol = $trej_rol + $rej_rol;
                                                $trej_berat = $trej_berat + $rej_berat;
                                        ?>

                                    <?php $nox++;
                                            } ?>
                                    <tr>
                                        <td class="tengah" colspan="2">Total</td>
                                        <!--<td class="tengah"><?php echo $shif; ?></td>-->
                                        <td class="tengah"><?php echo number_format($tp_rol, 2); ?></td>
                                        <td class="tengah"><?php echo number_format($tp_berat, 2); ?></td>
                                        <td class="tengah"><?php echo number_format($tng_rol, 2); ?></td>
                                        <td class="tengah"><?php echo number_format($tng_berat, 2); ?></td>
                                        <td class="tengah"><?php echo number_format($trej_rol, 2); ?></td>
                                        <td class="tengah"><?php echo number_format($trej_berat, 2); ?></td>
                                        <!--<td class="tengah"></td>-->
                                    </tr>

                                    </tbody>
                                </table>
                        </div>
                    </div>
                    <br>
                    <table class="tables table-hover" border="1" rules="all">
                        <tr>
                            <td class="tengah" colspan="1" width="8%">No<?php //echo $tgl_aw;
                                                                        ?></td>
                            <td class="tengah" colspan="1" width="32%">Jenis NG<?php //echo $unit;
                                                                                ?></td>
                            <td class="tengah" colspan="1" width="20%">Jumlah NG Shif I</td>
                            <td class="tengah" colspan="1" width="20%">Jumlah NG Shif II</td>
                            <td class="tengah" colspan="1" width="20%">Jumlah NG Shif III</td>
                        </tr>
                        <?php
                                $datax1 = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM qc_galv where tgl_produksi='$tgl_aw' AND unit='$unit' AND shif='1'")) or die(mysqli_error($link));
                                //echo $datax1;
                                $kasar_rol1 = $datax1["kasar_rol"];
                                $kusam_rol1 = $datax1["kusam_rol"];
                                $gosong_rol1 = $datax1["gosong_rol"];
                                $merah_rol1 = $datax1["merah_rol"];
                                $ruwet_rol1 = $datax1["ruwet_rol"];
                                $oval_rol1 = $datax1["oval_rol"];
                                $osp_rol1 = $datax1["osp_rol"];
                                $kaku_rol1 = $datax1["kaku_rol"];
                                $cw_rol1 = $datax1["cw_rol"];
                                $lengket_rol1 = $datax1["lengket_rol"];
                                $karat_rol1 = $datax1["karat_rol"];
                                $sambungan_rol1 = $datax1["sambungan_rol"];

                                $datax2 = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM qc_galv where tgl_produksi='$tgl_aw' AND unit='$unit' AND shif='2'")) or die(mysqli_error($link));
                                $kasar_rol2 = $datax2["kasar_rol"];
                                $kusam_rol2 = $datax2["kusam_rol"];
                                $gosong_rol2 = $datax2["gosong_rol"];
                                $merah_rol2 = $datax2["merah_rol"];
                                $ruwet_rol2 = $datax2["ruwet_rol"];
                                $oval_rol2 = $datax2["oval_rol"];
                                $osp_rol2 = $datax2["osp_rol"];
                                $kaku_rol2 = $datax2["kaku_rol"];
                                $cw_rol2 = $datax2["cw_rol"];
                                $lengket_rol2 = $datax2["lengket_rol"];
                                $karat_rol2 = $datax2["karat_rol"];
                                $sambungan_rol2 = $datax2["sambungan_rol"];

                                $datax3 = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM qc_galv where tgl_produksi='$tgl_aw' AND unit='$unit' AND shif='3'")) or die(mysqli_error($link));
                                $kasar_rol3 = $datax3["kasar_rol"];
                                $kusam_rol3 = $datax3["kusam_rol"];
                                $gosong_rol3 = $datax3["gosong_rol"];
                                $merah_rol3 = $datax3["merah_rol"];
                                $ruwet_rol3 = $datax3["ruwet_rol"];
                                $oval_rol3 = $datax3["oval_rol"];
                                $osp_rol3 = $datax3["osp_rol"];
                                $kaku_rol3 = $datax3["kaku_rol"];
                                $cw_rol3 = $datax3["cw_rol"];
                                $lengket_rol3 = $datax3["lengket_rol"];
                                $karat_rol3 = $datax3["karat_rol"];
                                $sambungan_rol3 = $datax3["sambungan_rol"];
                        ?>
                        <tr>
                            <td class="tengah" colspan="1" width="8%">1.<?php //echo $unit;
                                                                        ?></td>
                            <td class="tengah" colspan="1" width="32%">Kasar</td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $kasar_rol1; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $kasar_rol2; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $kasar_rol3; ?></td>
                        </tr>
                        <tr>
                            <td class="tengah" colspan="1" width="8%">2.</td>
                            <td class="tengah" colspan="1" width="32%">Kusam</td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $kusam_rol1; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $kusam_rol2; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $kusam_rol3; ?></td>
                        </tr>
                        <tr>
                            <td class="tengah" colspan="1" width="8%">3.</td>
                            <td class="tengah" colspan="1" width="32%">Gosong</td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $gosong_rol1; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $gosong_rol2; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $gosong_rol3; ?></td>
                        </tr>
                        <tr>
                            <td class="tengah" colspan="1" width="8%">4.</td>
                            <td class="tengah" colspan="1" width="32%">Merah</td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $merah_rol1; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $merah_rol2; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $merah_rol3; ?></td>
                        </tr>
                        <tr>
                            <td class="tengah" colspan="1" width="8%">5.</td>
                            <td class="tengah" colspan="1" width="32%">Tatanan Ruwet</td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $ruwet_rol1; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $ruwet_rol2; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $ruwet_rol3; ?></td>
                        </tr>
                        <tr>
                            <td class="tengah" colspan="1" width="8%">6.</td>
                            <td class="tengah" colspan="1" width="32%">Diameter Oval</td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $oval_rol1; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $oval_rol2; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $oval_rol2; ?></td>
                        </tr>
                        <tr>
                            <td class="tengah" colspan="1" width="8%">7.</td>
                            <td class="tengah" colspan="1" width="32%">Diameter Outspec</td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $osp_rol1; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $osp_rol2; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $osp_rol3; ?></td>
                        </tr>
                        <tr>
                            <td class="tengah" colspan="1" width="8%">8.</td>
                            <td class="tengah" colspan="1" width="32%">Kaku</td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $kaku_rol1; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $kaku_rol2; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $kaku_rol3; ?></td>
                        </tr>
                        <tr>
                            <td class="tengah" colspan="1" width="8%">9.</td>
                            <td class="tengah" colspan="1" width="32%">CW di Bawah Standart</td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $cw_rol1; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $cw_rol2; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $cw_rol3; ?></td>
                        </tr>
                        <tr>
                            <td class="tengah" colspan="1" width="8%">10.</td>
                            <td class="tengah" colspan="1" width="32%">Lengket</td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $lengket_rol1; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $lengket_rol2; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $lengket_rol3; ?></td>
                        </tr>
                        <tr>
                            <td class="tengah" colspan="1" width="8%">11.</td>
                            <td class="tengah" colspan="1" width="32%">Berkarat</td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $karat_rol1; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $karat_rol2; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $karat_rol3; ?></td>
                        </tr>
                        <tr>
                            <td class="tengah" colspan="1" width="8%">12.</td>
                            <td class="tengah" colspan="1" width="32%">Banyak Sambungan</td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $sambungan_rol1; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $sambungan_rol2; ?></td>
                            <td class="tengah" colspan="1" width="20%"><?php echo $sambungan_rol3; ?></td>
                        </tr>
                    </table>

                <?php }        ?>




                </div>
            </div>
        </div>
    </div><!-- /#page-wrapper -->
</div>
</div>

<?php //}
?>