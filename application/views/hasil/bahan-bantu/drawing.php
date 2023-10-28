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
    <form method="POST" action="<?= base_url('hasil/bahan-bantu-drawing'); ?>">
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
    <form method="POST" action="<?= base_url('hasil/bahan-bantu-drawing'); ?>">
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
                <h2>Laporan Pemakaian Bahan Bantu untuk Drawing</h2>

                <div class="row">
                    <table class="tables table-hover" border="1" rules="all">
                        <thead>
                            <tr class="tengah">
                                <th style="font-size:10px;" width="5%" class="tengah">No.</th>
                                <th style="font-size:10px;" width="5%" class="tengah">Tanggal</th>
                                <th style="font-size:10px;" width="5%" class="tengah">Team</th>
                                <th style="font-size:10px;" width="5%" class="tengah">Shif</th>
                                <th style="font-size:10px;" width="10%" class="tengah">hcl</th>
                                <th style="font-size:10px;" width="10%" class="tengah">nh4cl</th>
                                <th style="font-size:10px;" width="10%" class="tengah">zncl2</th>
                                <th style="font-size:10px;" width="10%" class="tengah">zn</th>
                                <th style="font-size:10px;" width="10%" class="tengah">al</th>
                                <th style="font-size:10px;" width="10%" class="tengah">znal</th>
                                <th style="font-size:10px;" width="10%" class="tengah">pb</th>
                                <th style="font-size:10px;" width="10%" class="tengah">Abu Timah</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            include "application/config/database.php";
                            $no = 1;
                            $tot_hcl = 0;
                            $tot_nh4cl = 0;
                            $tot_zncl2 = 0;
                            $tot_zn = 0;
                            $tot_al = 0;
                            $tot_znal = 0;
                            $tot_pb = 0;
                            $tot_abu_timah = 0;
                            $tgl_aw = $_POST["txttgl_aw"];
                            $tgl_ak = $_POST["txttgl_ak"];
                            // $link = mysqli_connect("localhost:3307", "root", "", "produksi");


                            $r_tgl = mysqli_query($link, "SELECT * FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' group by tanggal order by tanggal") or die(mysqli_error($link));
                            while ($r_tgl1 = mysqli_fetch_array($r_tgl)) {
                                $r_tanggal = $r_tgl1["tanggal"];

                                $result = mysqli_query($link, "SELECT * FROM galvanis where tanggal='$r_tanggal' order by tanggal, shif desc ") or die(mysqli_error($link));
                                //$baris=mysql_num_rows($result);
                                while ($row = mysqli_fetch_array($result)) {
                                    $baris = mysqli_num_rows($result);
                                    $tanggal = $row["tanggal"];
                                    $team = $row["team"];
                                    $shif = $row["shif"];
                                    $hcl = $row["Bban_hcl"];
                                    $nh4cl = $row["Bban_nh4cl"];
                                    $zncl2 = $row["Bban_zncl2"];
                                    $zn = $row["Bban_zn"];
                                    $al = $row["Bban_al"];
                                    $znal = $row["Bban_znal"];
                                    $pb = $row["Bban_pb"];
                                    $abu_timah = $row["Bban_abu_timah"];
                            ?>
                                    <tr class="tengah">
                                        <td style="font-size:11px;"><?php echo $no; ?>.</td>
                                        <td style="font-size:11px;"><?php echo $tanggal; ?></td>
                                        <td style="font-size:11px;"><?php echo $team; ?></td>
                                        <td style="font-size:11px;"><?php echo $shif; //$gaji;
                                                                    ?></td>
                                        <td style="font-size:11px;"><?php echo $hcl; ?></td>
                                        <td style="font-size:11px;"><?php echo $nh4cl; ?></td>
                                        <td style="font-size:11px;"><?php echo $zncl2; ?></td>
                                        <td style="font-size:11px;"><?php echo $zn; ?></td>
                                        <td style="font-size:11px;"><?php echo $al; ?></td>
                                        <td style="font-size:11px;"><?php echo $znal; ?></td>
                                        <td style="font-size:11px;"><?php echo $pb; ?></td>
                                        <td style="font-size:11px;"><?php echo $abu_timah; ?></td>

                                    </tr>
                                <?php
                                    $no++;
                                    $tot_hcl = $tot_hcl + $hcl;
                                    $tot_nh4cl = $tot_nh4cl + $nh4cl;
                                    $tot_zncl2 = $tot_zncl2 + $zncl2;
                                    $tot_zn = $tot_zn + $zn;
                                    $tot_al = $tot_al + $al;
                                    $tot_znal = $tot_znal + $zn;
                                    $tot_pb = $tot_pb + $pb;
                                    $tot_abu_timah = $tot_abu_timah + $abu_timah;
                                }
                                ?>
                                <tr>
                                    <td style="font-size:12px;" colspan="4" class="tengah"><b><?php echo "Total " . $r_tanggal; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $tot_hcl; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $tot_nh4cl; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $tot_zncl2; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $tot_zn; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $tot_al; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $tot_znal; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $tot_pb; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $tot_abu_timah; ?></b></td>
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