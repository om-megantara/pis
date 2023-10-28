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
<?php if (isset($_POST["btn_proses"]) == "") { ?>
    <div class="page-content">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-12">
            <h3>Tentukan Periode:</h3>
            <form method="POST" action="<?= base_url('rekap/downtime-galvanis'); ?>">
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
            <form method="POST" action="<?= base_url('rekap/downtime-galvanis'); ?>">
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
        <div class="row"></div>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <h2>Laporan Rekapitulasi Downtime Galvanis</h2>

                    <div class="row">
                        <table class="tables table-hover" border="1" rules="all">
                            <thead>
                                <?php //echo $r_diameter."|".$tanggal;
                                ?>
                                <tr class="tengah">
                                    <!--<th style="font-size:10px;" rowspan="2" width="5%" class="tengah">No.</th>-->
                                    <th style="font-size:10px;" rowspan="1" width="10%" class="tengah">Tanggal</th>
                                    <th style="font-size:10px;" rowspan="1" width="10%" class="tengah">Tim</th>
                                    <th style="font-size:10px;" colspan="1" width="10%" class="tengah">Putus Bahan</th>
                                    <th style="font-size:10px;" colspan="1" width="10%" class="tengah">Putus Timah</th>
                                    <th style="font-size:10px;" colspan="1" width="10%" class="tengah">Putus Coiler</th>
                                    <th style="font-size:10px;" colspan="1" width="10%" class="tengah">Ganti Size</th>
                                    <th style="font-size:10px;" colspan="1" width="10%" class="tengah">Tunggu Bahan</th>
                                    <th style="font-size:10px;" colspan="1" width="10%" class="tengah">Mesin Rusak</th>
                                    <th style="font-size:10px;" colspan="1" width="10%" class="tengah">lain-lain</th>
                                </tr>
                            </thead>

                            <?php
                            $no1 = 0;
                            $tgl_aw = date_format(date_create($_POST["txttgl_aw"]), "Y-m-d");
                            $tgl_ak = date_format(date_create($_POST["txttgl_ak"]), "Y-m-d");
                            $tim = $_POST["tim"];
                            if ($tim == "Semua Tim") {
                                $syarat_tim = "";
                            } else {
                                $syarat_tim = "AND team='$tim'";
                            }
                            $dt_putus_bahanx = 0;
                            $dt_putus_hclx = 0;
                            $dt_putus_timahx = 0;
                            $dt_ganti_sizex = 0;
                            $dt_tunggu_bahanx = 0;
                            $dt_mesin_rusakx = 0;
                            $dt_lain2x = 0;

                            // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                            include "application/config/database.php";
                            $r_tgl1 = mysqli_query($link, "SELECT * FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak'" . $syarat_tim . " AND status_del='0' group by tanggal order by tanggal asc") or die(mysqli_error($link));
                            while ($r_tgl2 = mysqli_fetch_array($r_tgl1)) {
                                $tanggal2 = $r_tgl2["tanggal"];

                                $no = 1;

                                //$r_tgl=mysqli_query($link, "SELECT * FROM galvanis where tanggal like '$tanggal2' group by diameter order by tanggal,diameter desc") or die(mysqli_error($link));
                                $r_tgl = mysqli_query($link, "SELECT * FROM galvanis where tanggal = '$tanggal2'" . $syarat_tim . " AND status_del='0' group by tanggal order by tanggal,diameter desc") or die(mysqli_error($link));
                                while ($row = mysqli_fetch_array($r_tgl)) {
                                    $r_diameter = $row["diameter"];
                                    $tanggal = $row["tanggal"];
                                    $baik_roll = mysqli_fetch_array(mysqli_query($link, "SELECT sum(dt_putus_bahan) as 'dt_putus_bahan' FROM galvanis where tanggal = '$tanggal2' " . $syarat_tim . " AND status_del='0' order by tanggal"));
                                    $dt_putus_bahan = $baik_roll['dt_putus_bahan'];
                                    $baik_kg = mysqli_fetch_array(mysqli_query($link, "SELECT sum(dt_putus_hcl) as 'dt_putus_hcl' FROM galvanis where tanggal like '$tanggal2' " . $syarat_tim . " AND status_del='0' order by tanggal"));
                                    $dt_putus_hcl = $baik_kg['dt_putus_hcl'];
                                    $sb_rol = mysqli_fetch_array(mysqli_query($link, "SELECT sum(dt_putus_timah) as 'dt_putus_timah' FROM galvanis where tanggal like '$tanggal2' " . $syarat_tim . " AND status_del='0' order by  tanggal"));
                                    $dt_putus_timah = $sb_rol['dt_putus_timah'];
                                    $sb_kg = mysqli_fetch_array(mysqli_query($link, "SELECT sum(dt_ganti_size) as 'dt_ganti_size' FROM galvanis where tanggal like '$tanggal2' " . $syarat_tim . " AND status_del='0' order by  tanggal"));
                                    $dt_ganti_size = $sb_kg['dt_ganti_size'];

                                    $tot_rol = mysqli_fetch_array(mysqli_query($link, "SELECT sum(dt_tunggu_bahan) as 'dt_tunggu_bahan' FROM galvanis where tanggal like '$tanggal2' " . $syarat_tim . " AND status_del='0' order by  tanggal"));
                                    $dt_tunggu_bahan = $tot_rol['dt_tunggu_bahan'];
                                    $tot_kg = mysqli_fetch_array(mysqli_query($link, "SELECT sum(dt_mesin_rusak) as 'dt_mesin_rusak' FROM galvanis where tanggal like '$tanggal2' " . $syarat_tim . " AND status_del='0' order by  tanggal"));
                                    $dt_mesin_rusak = $tot_kg['dt_mesin_rusak'];

                                    $aval_b = mysqli_fetch_array(mysqli_query($link, "SELECT sum(dt_lain2) as 'dt_lain2' FROM galvanis where tanggal like '$tanggal2' " . $syarat_tim . " AND status_del='0' order by tanggal"));
                                    $dt_lain2 = $aval_b['dt_lain2'];
                                    //$aval_r=mysqli_fetch_array(mysqli_query($link, "SELECT sum(Bban_abu_timah) as 'aval_ruwet' FROM galvanis where tanggal like '$tanggal2' and diameter='$r_diameter' group by diameter order by tanggal"));
                                    //$aval_ruwet=$aval_r['aval_ruwet'];

                                    $team = $row["team"];
                                    $shif = $row["shif"];
                                    $jml_opt = $row["jml_opt"];
                                    $baku_awal = $row["bahan_baku_aw"];
                                    $baku_akir = $row["bahan_baku_ak"];
                                    $total_bahan = $row["bahan_baku_tot"];
                                    //$diameter = $row["diameter"];
                                    $total_pemakaian = $row["total_pemakaian"];
                                    $sisa_sesudah = $row["sisa_sesudah"];
                                    $keterangan = $row["ket"];

                            ?>


                                    <tbody>
                                        <tr class="tengah">
                                            <td style="font-size:11px;"><?php echo $tanggal; ?></td>
                                            <!-- <td style="font-size:11px;"><?php echo $tim . $diameter; ?></td> -->
                                            <td style="font-size:11px;"><?php echo $tim; ?></td>
                                            <td style="font-size:11px;"><?php echo $dt_putus_bahan; ?></td>
                                            <td style="font-size:11px;"><?php echo $dt_putus_hcl; ?></td>
                                            <td style="font-size:11px;"><?php echo $dt_putus_timah; ?></td>
                                            <td style="font-size:11px;"><?php echo $dt_ganti_size; ?></td>
                                            <td style="font-size:11px;"><?php echo $dt_tunggu_bahan; ?></td>
                                            <td style="font-size:11px;"><?php echo $dt_mesin_rusak; ?></td>
                                            <td style="font-size:11px;"><?php echo $dt_lain2; ?></td>
                                        </tr>
                                        <div class="row">
                                    <?php
                                    $no = $no + 1;
                                    //$no=$no1+1;
                                    $dt_putus_bahanx = $dt_putus_bahanx + $dt_putus_bahan;
                                    $dt_putus_hclx = $dt_putus_hclx + $dt_putus_hcl;
                                    $dt_putus_timahx = $dt_putus_timahx + $dt_putus_timah;
                                    $dt_ganti_sizex = $dt_ganti_sizex + $dt_ganti_size;
                                    $dt_tunggu_bahanx = $dt_tunggu_bahanx + $dt_tunggu_bahan;
                                    $dt_mesin_rusakx = $dt_mesin_rusakx + $dt_mesin_rusak;
                                    $dt_lain2x = $dt_lain2x + $dt_lain2;
                                }
                                $no1 = $no1 + 1;
                            }
                                    ?>
                                    <tr class="tengah">
                                        <td style="font-size:12px;color:blue" colspan="2"><b>Total<br><?php echo $aw . " sampai " . $ak; ?></b></td>
                                        <td style="font-size:12px;color:blue"><b><?php echo $dt_putus_bahanx; ?></b></td>
                                        <td style="font-size:12px;color:blue"><b><?php echo $dt_putus_hclx; ?></b></td>
                                        <td style="font-size:12px;color:blue"><b><?php echo $dt_putus_timahx; ?></b></td>
                                        <td style="font-size:12px;color:blue"><b><?php echo $dt_ganti_sizex; ?></b></td>
                                        <td style="font-size:12px;color:blue"><b><?php echo $dt_tunggu_bahanx; ?></b></td>
                                        <td style="font-size:12px;color:blue"><b><?php echo $dt_mesin_rusakx; ?></b></td>
                                        <td style="font-size:12px;color:blue"><b><?php echo $dt_lain2x; ?></b></td>
                                    </tr>
                                    <div class="row">

                                    </tbody>




                        </table>



                        <div class="row">
                            <div class="row">
                            </div>
                        </div>
                    </div>
                </div><!-- /#page-wrapper -->
            </div>
        <?php } ?>