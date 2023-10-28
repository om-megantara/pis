<style>
    .row {
        margin: 0 5px 0 5px;
    }

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
<?php if (isset($_POST["btn_proses"]) == "") { ?>
    <h3>Tentukan Periode:</h3>
    <form method="POST" action="<?= base_url('hasil/downtime-mesin-drawing'); ?>">
        <div class="row"></div>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Tanggal Awal</label>
                            <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                <input class="form-control" type="text" name="txttgl_aw" id="txttgl_aw" readonly="readonly">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                <input class="form-control" type="text" name="txttgl_ak" id="txttgl_ak" readonly="readonly">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
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
<?php } else {

?>
    <h3>Tentukan Periode:</h3>
    <form method="POST" action="<?= base_url('hasil/downtime-mesin-drawing'); ?>">
        <div class="row"></div>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Tanggal Awal</label>
                            <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                <input class="form-control" type="text" name="txttgl_aw" id="txttgl_aw" readonly="readonly">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                <input class="form-control" type="text" name="txttgl_ak" id="txttgl_ak" readonly="readonly">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
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
    <!--<style>-->
    <div class="row"></div>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h2>Laporan Downtime Mesin</h2>

                <div class="row">
                    <table class="tables table-hover" border="1" rules="all">
                        <thead>
                            <tr class="tengah">
                                <th style="font-size:10px;" width="5%" class="tengah">No.</th>
                                <th style="font-size:10px;" width="5%" class="tengah">Tanggal</th>
                                <th style="font-size:10px;" width="5%" class="tengah">Team</th>
                                <th style="font-size:10px;" width="5%" class="tengah">Shif</th>
                                <th style="font-size:10px;" width="5%" class="tengah">Putus Bahan</th>
                                <th style="font-size:10px;" width="5%" class="tengah">Putus Hcl</th>
                                <th style="font-size:10px;" width="5%" class="tengah">Putus Timah</th>
                                <th style="font-size:10px;" width="5%" class="tengah">Putus Coiler</th>
                                <th style="font-size:10px;" width="5%" class="tengah">Ganti Size</th>
                                <th style="font-size:10px;" width="5%" class="tengah">Tunggu Bahan</th>
                                <th style="font-size:10px;" width="5%" class="tengah">Mesin Rusak</th>
                                <th style="font-size:10px;" width="5%" class="tengah">Lain-lain</th>
                                <th style="font-size:10px;" width="10%" class="tengah">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "application/config/database.php";
                            $no = 1;
                            $tot_pts_bahan = 0;
                            $tot_pts_hcl = 0;
                            $tot_pts_timah = 0;
                            $tot_pts_coiler = 0;
                            $tot_ganti_size = 0;
                            $tot_tunggu_bahan = 0;
                            $tot_mesin_rusak = 0;
                            $tot_lain2 = 0;
                            $tgl_aw = $_POST["txttgl_aw"];
                            $tgl_ak = $_POST["txttgl_ak"];

                            // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                            $r_tgl = mysqli_query($link, "SELECT * FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' group by tanggal order by tanggal") or die(mysqli_error($link));
                            while ($r_tgl1 = mysqli_fetch_array($r_tgl)) {
                                $r_tanggal = $r_tgl1["tanggal"];

                                // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                $result = mysqli_query($link, "SELECT * FROM galvanis where tanggal='$r_tanggal' order by tanggal, shif desc ") or die(mysqli_error($link));
                                //$baris=mysql_num_rows($result);
                                while ($row = mysqli_fetch_array($result)) {
                                    $baris = mysqli_num_rows($result);
                                    $tanggal = $row["tanggal"];
                                    $team = $row["team"];
                                    $shif = $row["shif"];
                                    $pts_bhn = $row["dt_putus_bahan"];
                                    $pts_hcl = $row["dt_putus_hcl"];
                                    $pts_timah = $row["dt_putus_timah"];
                                    $pts_coiler = $row["dt_putus_coiler"];
                                    $ganti_size = $row["dt_ganti_size"];
                                    $tunggu_bahan = $row["dt_tunggu_bahan"];
                                    $mesin_rusak = $row["dt_mesin_rusak"];
                                    $lain2 = $row["dt_lain2"];
                                    $ket_lain2 = $row["dt_ket_lain2"];
                            ?>
                                    <tr class="tengah">
                                        <td style="font-size:11px;"><?php echo $no; ?>.</td>
                                        <td style="font-size:11px;"><?php echo $tanggal; ?></td>
                                        <td style="font-size:11px;"><?php echo $team; ?></td>
                                        <td style="font-size:11px;"><?php echo $shif;; ?></td>
                                        <td style="font-size:11px;"><?php echo $pts_bhn; ?></td>
                                        <td style="font-size:11px;"><?php echo $pts_hcl; ?></td>
                                        <td style="font-size:11px;"><?php echo $pts_timah; ?></td>
                                        <td style="font-size:11px;"><?php echo $pts_coiler; ?></td>
                                        <td style="font-size:11px;"><?php echo $ganti_size; ?></td>
                                        <td style="font-size:11px;"><?php echo $tunggu_bahan; ?></td>
                                        <td style="font-size:11px;"><?php echo $mesin_rusak; ?></td>
                                        <td style="font-size:11px;"><?php echo $lain2; ?></td>
                                        <td style="font-size:11px;"><?php echo $ket_lain2; ?></td>
                                    </tr>
                                <?php
                                    $no++;
                                    $tot_pts_bahan = $tot_pts_bahan + $pts_bhn;
                                    $tot_pts_hcl = $tot_pts_hcl + $pts_hcl;
                                    $tot_pts_timah = $tot_pts_timah + $pts_timah;
                                    $tot_pts_coiler = $tot_pts_coiler + $pts_coiler;
                                    $tot_ganti_size = $tot_ganti_size + $ganti_size;
                                    $tot_tunggu_bahan = $tot_tunggu_bahan + $tunggu_bahan;
                                    $tot_mesin_rusak = $tot_mesin_rusak + $mesin_rusak;
                                    $tot_lain2 = $tot_lain2 + $lain2;
                                }
                                ?>
                                <tr>
                                    <td style="font-size:12px;" colspan="4" class="tengah"><b><?php echo "Total " . $r_tanggal; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $tot_pts_bahan; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $tot_pts_hcl; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $tot_pts_timah; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $tot_pts_coiler; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $tot_ganti_size; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $tot_tunggu_bahan; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $tot_mesin_rusak; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $tot_lain2; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo "-"; ?></b></td>
                                </tr>
                            <?php } ?>
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