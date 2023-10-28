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
        <h3>Tentukan Periode:</h3>
        <form method="POST" action="<?= base_url('hasil/downtime-mesin-galvanis'); ?>">
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
<?php } else {
?>
    <div class="col-lg-2">
    </div>
    <div class="col-lg-12">
        <h3>Tentukan Periode:</h3>
        <?php $aw = $_POST["txttgl_aw"];
        $ak = $_POST["txttgl_ak"];
        $tim = $_POST["tim"]; ?>
        <form method="POST" action="<?= base_url('hasil/downtime-mesin-galvanis'); ?>">
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
                    <h2>Laporan Downtime Mesin : <?php echo $_POST["txttgl_aw"] . " sampai " . $_POST["txttgl_ak"]; ?></h2>

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
                                $nox = 1;
                                $tot_pts_bahans = 0;
                                $tot_pts_hcls = 0;
                                $tot_pts_timahs = 0;
                                $tot_pts_coilers = 0;
                                $tot_ganti_sizes = 0;
                                $tot_tunggu_bahans = 0;
                                $tot_mesin_rusaks = 0;
                                $tot_lain2s = 0;
                                $tgl_aw = date_format(date_create($_POST["txttgl_aw"]), "Y-m-d");
                                $tgl_ak = date_format(date_create($_POST["txttgl_ak"]), "Y-m-d");
                                if ($tim == "Semua Tim") {
                                    $syarat_tim = "";
                                } else {
                                    $syarat_tim = "AND team='$tim'";
                                }
                                //echo $tgl_aw."|".$tgl_ak;
                                // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                $r_tgl = mysqli_query($link, "SELECT * FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak'" . $syarat_tim . " AND status_del='0' group by tanggal order by tanggal asc") or die(mysqli_error($link));
                                while ($r_tgl1 = mysqli_fetch_array($r_tgl)) {
                                    $r_tanggal = date_format(date_create($r_tgl1["tanggal"]), "Y-m-d");
                                    if ($tim == "Semua Tim") {
                                        $no = 1;
                                    } else {
                                        $no = $nox;
                                    }
                                    $tot_pts_bahanx = 0;
                                    $tot_pts_hclx = 0;
                                    $tot_pts_timahx = 0;
                                    $tot_pts_coilerx = 0;
                                    $tot_ganti_sizex = 0;
                                    $tot_tunggu_bahanx = 0;
                                    $tot_mesin_rusakx = 0;
                                    $tot_lain2x = 0;
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $result = mysqli_query($link, "SELECT * FROM galvanis where tanggal='$r_tanggal'" . $syarat_tim . " AND status_del='0' order by tanggal desc, shif asc ") or die(mysqli_error($link));
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
                                        $tot_pts_bahanx = $tot_pts_bahanx + $pts_bhn;
                                        $tot_pts_hclx = $tot_pts_hclx + $pts_hcl;
                                        $tot_pts_timahx = $tot_pts_timahx + $pts_timah;
                                        $tot_pts_coilerx = $tot_pts_coilerx + $pts_coiler;
                                        $tot_ganti_sizex = $tot_ganti_sizex + $ganti_size;
                                        $tot_tunggu_bahanx = $tot_tunggu_bahanx + $tunggu_bahan;
                                        $tot_mesin_rusakx = $tot_mesin_rusakx + $mesin_rusak;
                                        $tot_lain2x = $tot_lain2x + $lain2;

                                        //Total Periode
                                        $tot_pts_bahans = $tot_pts_bahans + $pts_bhn;
                                        $tot_pts_hcls = $tot_pts_hcls + $pts_hcl;
                                        $tot_pts_timahs = $tot_pts_timahs + $pts_timah;
                                        $tot_pts_coilers = $tot_pts_coilers + $pts_coiler;
                                        $tot_ganti_sizes = $tot_ganti_sizes + $ganti_size;
                                        $tot_tunggu_bahans = $tot_tunggu_bahans + $tunggu_bahan;
                                        $tot_mesin_rusaks = $tot_mesin_rusaks + $mesin_rusak;
                                        $tot_lain2s = $tot_lain2s + $lain2;
                                    }
                                    if ($tim == "Semua Tim") {

                                        //$no=$nox;
                                    ?>

                                        <tr>
                                            <td style="font-size:12px;color:blue" colspan="4" class="tengah"><b><?php echo "Total " . $r_tanggal; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_pts_bahanx; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_pts_hclx; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_pts_timahx; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_pts_coilerx; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_ganti_sizex; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_tunggu_bahanx; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_mesin_rusakx; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_lain2x; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo "-"; ?></b></td>
                                        </tr>
                                <?php }
                                    $nox++;
                                } ?>
                                <tr>
                                    <td style="font-size:12px;color:green" colspan="4" class="tengah"><b><?php echo "Total Periode <br>" . $_POST["txttgl_aw"] . " sampai " . $_POST["txttgl_ak"]; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo $tot_pts_bahans; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo $tot_pts_hcls; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo $tot_pts_timahs; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo $tot_pts_coilers; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo $tot_ganti_sizes; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo $tot_tunggu_bahans; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo $tot_mesin_rusaks; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo $tot_lain2s; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo "-"; ?></b></td>
                                </tr>
                            </tbody>
                        </table>


                        <div class="row">
                            <div class="row">
                            </div>
                        </div>
                    </div>
                </div><!-- /#page-wrapper -->
            </div>
        </div>
    <?php } ?>