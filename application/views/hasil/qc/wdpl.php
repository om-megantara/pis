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

<?php if (isset($_POST["btn_proses"]) == "") { ?>
    <div class="col-lg-2">
    </div>
    <div class="col-lg-12">
        <h3>Tentukan Periode:</h3>
        <form method="POST" action="<?= base_url('hasil/qc-wdpl'); ?>">
            <div class="row"></div>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="col-lg-12">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Tanggal Produksi Awal</label>
                                <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                    <input class="form-control date-picker" name="txttgl_aw" id="txttgl_aw" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Mulai" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Tanggal Produksi Akhir</label>
                                <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                    <input class="form-control date-picker" name="txttgl_ak" id="txttgl_ak" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Mulai" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Bagian/Unit (Pilih Unit)</label>
                                <select class="form-control" id="unit" name="unit">
                                    <option>Semua Unit</option>
                                    <option>PA 1</option>
                                    <option>PA 2</option>
                                    <option>PB</option>
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
<?php } else {
?>
    <div class="col-lg-2">
    </div>
    <div class="col-lg-12">
        <h3>Tentukan Periode:</h3>
        <?php $aw = $_POST["txttgl_aw"];
        $ak = $_POST["txttgl_ak"];
        $unit = $_POST["unit"]; ?>
        <form method="POST" action="<?= base_url('hasil/qc-wdpl'); ?>">
            <div class="row"></div>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="col-lg-12">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Tanggal Produksi Awal</label>
                                <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                    <input class="form-control date-picker" name="txttgl_aw" id="txttgl_aw" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Mulai" value="<?php echo $aw; ?>" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Tanggal Produksi Akhir</label>
                                <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                    <input class="form-control date-picker" name="txttgl_ak" id="txttgl_ak" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Mulai" value="<?php echo $ak; ?>" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Unit (Pilih Unit)</label>
                                <select class="form-control" id="unit" name="unit">
                                    <option>
                                        <selected><?php echo $unit; ?></selected>
                                    </option>
                                    <option>Semua Unit</option>
                                    <option>PA 1</option>
                                    <option>PA 2</option>
                                    <option>PB</option>
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
                <div class="row"><br>
                    <div id="print-area-1" class="print-area">
                        <!--<table class="tables table-hover" border="1" >
						<tr  >
							<td width="20%" rowspan="4"> &nbsp;No. Dok &nbsp;&nbsp;: FOM-QCA-03-05<br>&nbsp;Rev &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 1<br>&nbsp;Tanggal&nbsp;&nbsp;&nbsp;&nbsp;: 11 Juni 2018 <br>&nbsp;Hal. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 1/1</td>
							<td width="50%" rowspan="4" class="tengah"><h2>PT. NEW SIMO MULIJO</h2></td>
							<td width="15%" class="tengah">Disetujui Oleh,</td>
							<td width="15%" class="tengah">Dibuat Oleh,</td>
						</tr>
						<tr  >
							<td width="15%" rowspan="2" class="tengah">&nbsp;</td>
							<td width="15%" rowspan="2" class="tengah">&nbsp;</td>
						</tr>
						<tr  ></tr>
						<tr  >
							<td width="15%" class="tengah">Kepala QC</td>
							<td width="15%" class="tengah">Staf QC</td>
						</tr>
					</table><br>-->

                        <?php

                        $tgl_aw = date_format(date_create($_POST['txttgl_aw']), "Y-m-d");
                        $tgl_ak = date_format(date_create($_POST['txttgl_ak']), "Y-m-d");
                        $unit = $_POST['unit'];
                        if ($unit == "Semua Unit") {
                            $syarat_tim = "";
                        } else {
                            $syarat_tim = "AND unit='$unit'";
                        }
                        // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                        include "application/config/database.php";

                        $result = mysqli_query($link, "SELECT * FROM qc_wdpl where tgl_produksi>='$tgl_aw' AND tgl_produksi<='$tgl_ak'" . $syarat_tim . "group by unit") or die(mysqli_error($link));
                        $row2 = mysqli_fetch_array($result);
                        if ($row2 <= 0) {
                            echo "<center style='font-size:14px'><h2><b>Data tidak ada !!</b></h2></center>";
                        } else {


                            $unitx = $row2["unit"];
                            $tanggalx = $row2["tgl_produksi"];
                            $diameter = $row2["diameter"];
                            // $day = date('D', strtotime($tgl));

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
                        <!--Hari&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo  $dayList[$day]; ?><br>
					Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo  date_format(date_create($tanggalx), "d-M-Y"); ?><br>
					Bagian/Unit &nbsp;&nbsp;:&nbsp;Galvanis/<?php echo $unit; ?><br>
					Diameter &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $diameter; ?><br>
				    <h3>FORM SERAH TERIMA HASIL PRODUKSI</h3>-->

                        <div class="row">
                            <div class="container-fluid">
                                <?php

                                $tgl_aw = date_format(date_create($_POST["txttgl_aw"]), "Y-m-d");
                                $tgl_ak = date_format(date_create($_POST["txttgl_ak"]), "Y-m-d");
                                $tgl = mysqli_query($link, "SELECT * FROM qc_wdpl where tgl_produksi>='$tgl_aw' AND tgl_produksi<='$tgl_ak'" . $syarat_tim . "group by unit") or die(mysqli_error($link));
                                while ($r_tgl_1 = mysqli_fetch_array($tgl)) {
                                    $r_tgl = date_format(date_create($r_tgl_1["tgl_produksi"]), "Y-m-d");
                                    $r_unit = $r_tgl_1["unit"];


                                    if ($r_unit == "PA 1") {
                                        $cls = "pa1";
                                    } elseif ($r_unit == "PA 2") {
                                        $cls = "pa2";
                                    } else {
                                        $cls = "pb";
                                    }

                                ?>

                                    <b>
                                        <p class="<?php echo $cls; ?>">Hasil Inspeksi Unit: <?php echo " " . $r_unit; ?></th>
                                    </b>
                                    <table class="tables table-hover" border="1" rules="all">
                                        <thead>
                                            <tr class="tengah">
                                                <th style="font-size:10px;color:<?php echo $cls; ?>" width="5%" class="tengah">No.</th>
                                                <th style="font-size:10px" width="8%" class="tengah">Tanggal</th>
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

                                                $data = mysqli_query($link, "SELECT * FROM qc_wdpl where tgl_produksi>='$tgl_aw' AND tgl_produksi<='$tgl_ak' AND unit='$r_unit'order by tgl_produksi, shif asc") or die(mysqli_error($link));
                                                while ($datax = mysqli_fetch_array($data)) {
                                                    $shif = $datax["shif"];
                                                    $tglp = $datax["tgl_produksi"];
                                                    $pas_rol = $datax["pas_rol"];
                                                    $pas_berat = $datax["pas_berat"];
                                                    $ng_rol = $datax["ng_rol"];
                                                    $ng_berat = $datax["ng_berat"];
                                                    $rej_rol = $datax["rejek_rol"];
                                                    $rej_berat = $datax["rejek_berat"];

                                                ?>
                                                    <td class="tengah"><?php echo $nox; ?></td>
                                                    <td class="tengah"><?php echo $tglp; ?></td>
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
                                                    $trej_rol = $trej_rol + $rej_rol;
                                                    $trej_berat = $trej_berat + $rej_berat;
                                            ?>

                                        <?php $nox++;
                                                } ?>
                                        <tr>
                                            <td class="tengah" colspan="3">Total</td>
                                            <!--<td class="tengah"><?php echo $shif; ?></td>-->
                                            <td class="tengah"><?php echo number_format($tp_rol, 2, ".", ","); ?></td>
                                            <td class="tengah"><?php echo number_format($tp_berat, 2, ".", ","); ?></td>
                                            <td class="tengah"><?php echo number_format($tng_rol, 2, ".", ","); ?></td>
                                            <td class="tengah"><?php echo number_format($tng_berat, 2, ".", ","); ?></td>
                                            <td class="tengah"><?php echo number_format($trej_rol, 2, ".", ","); ?></td>
                                            <td class="tengah"><?php echo number_format($trej_berat, 2, ".", ","); ?></td>
                                            <!--<td class="tengah"></td>-->
                                        </tr>

                                        </tbody>
                                    </table>
                            </div>
                        </div>
                        <br>

                    <?php }        ?>




                    </div>
                </div>
            </div>
        </div><!-- /#page-wrapper -->
    </div>
    </div>

<?php } ?>