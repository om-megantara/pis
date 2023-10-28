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
        <h3>Tentukan Periode:</h3>
        <form method="POST" action="<?= base_url('hasil/bahan-bantu-wdpc'); ?>">
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
    <div class="page-content">
        <h3>Tentukan Periode:</h3>
        <?php $aw = $_POST["txttgl_aw"];
        $ak = $_POST["txttgl_ak"];
        $tim = $_POST["tim"]; ?>
        <form method="POST" action="?<?= base_url('hasil/bahan-bantu-wdpc'); ?>">
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
    <div class="page-content">
        <div class="row"></div>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <h2>Laporan Pemakaian Bahan Bantu : <?php echo $_POST["txttgl_aw"] . " sampai " . $_POST["txttgl_ak"]; ?></h2>

                    <div class="row">
                        <div class="page-content">
                            <table class="tables table-hover" border="1" rules="all">
                                <thead>
                                    <tr class="tengah">
                                        <th style="font-size:10px;" width="6%" class="tengah">No.</th>
                                        <th style="font-size:10px;" width="10%" class="tengah">Tanggal</th>
                                        <th style="font-size:10px;" width="10%" class="tengah">Unit</th>
                                        <th style="font-size:10px;" width="10%" class="tengah">Operator</th>
                                        <th style="font-size:10px;" width="10%" class="tengah">Shif</th>
                                        <th style="font-size:10px;" width="8%" class="tengah">Dies</th>
                                        <th style="font-size:10px;" width="8%" class="tengah">Sabun</th>
                                        <!--<th style="font-size:10px;" width="8%" class="tengah">zncl2</th>
								<th style="font-size:10px;" width="8%" class="tengah">zn</th>
								<th style="font-size:10px;" width="8%" class="tengah" >al</th>		
								<th style="font-size:10px;" width="8%" class="tengah" >znal</th>		
								<th style="font-size:10px;" width="8%" class="tengah">pb</th>
								<th style="font-size:10px;" width="8%" class="tengah">Abu Timah</th>	-->
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php

                                    include "application/config/database.php";

                                    $nox = 1;
                                    $tot_hcls = 0;
                                    $tot_nh4cls = 0;
                                    $tot_zncl2s = 0;
                                    $tot_zns = 0;
                                    $tot_als = 0;
                                    $tot_znals = 0;
                                    $tot_pbs = 0;
                                    $tot_abu_timahs = 0;
                                    $tgl_aw = date_format(date_create($_POST["txttgl_aw"]), "Y-m-d");
                                    $tgl_ak = date_format(date_create($_POST["txttgl_ak"]), "Y-m-d");
                                    if ($tim == "Semua Tim") {
                                        $syarat_tim = "";
                                    } else {
                                        $syarat_tim = "AND team='$tim'";
                                    }
                                    //echo $tgl_aw."|".$tgl_ak;
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $r_tgl = mysqli_query($link, "SELECT * FROM wdpc where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak'" . $syarat_tim . " AND status_del='0' group by tanggal order by tanggal asc") or die(mysqli_error($link));
                                    while ($r_tgl1 = mysqli_fetch_array($r_tgl)) {
                                        $r_tanggal = date_format(date_create($r_tgl1["tanggal"]), "Y-m-d");
                                        $no = 1;
                                        $tot_hclx = 0;
                                        $tot_nh4clx = 0;
                                        $tot_zncl2x = 0;
                                        $tot_znx = 0;
                                        $tot_alx = 0;
                                        $tot_znalx = 0;
                                        $tot_pbx = 0;
                                        $tot_abu_timahx = 0;
                                        // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                        $result = mysqli_query($link, "SELECT * FROM wdpc where tanggal='$r_tanggal'" . $syarat_tim . " AND status_del='0' order by tanggal desc, shif asc ") or die(mysqli_error($link));
                                        while ($row = mysqli_fetch_array($result)) {
                                            $baris = mysqli_num_rows($result);
                                            $tanggal = $row["tanggal"];
                                            $team = $row["Unit"];
                                            $opt = $row["operator"];
                                            $shif = $row["shif"];
                                            $hcl = $row["bahan_bantu1"];
                                            $nh4cl = $row["bahan_bantu2"];
                                            // $zncl2 = $row["Bban_zncl2"];
                                            // $zn = $row["Bban_zn"];
                                            // $al = $row["Bban_al"];
                                            // $znal = $row["Bban_znal"];
                                            // $pb = $row["Bban_pb"];
                                            // $abu_timah = $row["Bban_abu_timah"];
                                    ?>
                                            <tr class="tengah">
                                                <td style="font-size:11px;"><?php echo $no; ?>.</td>
                                                <td style="font-size:11px;"><?php echo $tanggal; ?></td>
                                                <td style="font-size:11px;"><?php echo $team; ?></td>
                                                <td style="font-size:11px;"><?php echo $opt; ?></td>
                                                <td style="font-size:11px;"><?php echo $shif; //$gaji;
                                                                            ?></td>
                                                <td style="font-size:11px;"><?php echo $hcl; ?></td>
                                                <td style="font-size:11px;"><?php echo $nh4cl; ?></td>
                                                <!--<td style="font-size:11px;" ><?php echo $zncl2; ?></td>
                                <td style="font-size:11px;" ><?php echo $zn; ?></td>
								<td style="font-size:11px;" ><?php echo $al; ?></td>
								<td style="font-size:11px;" ><?php echo $znal; ?></td>
								<td style="font-size:11px;" ><?php echo $pb; ?></td>
								<td style="font-size:11px;"><?php echo $abu_timah; ?></td>-->

                                            </tr>
                                        <?php
                                            // $no++;
                                            // $tot_hclx = $tot_hclx + $hcl;
                                            // $tot_nh4clx = $tot_nh4clx + $nh4cl;
                                            // $tot_zncl2x = $tot_zncl2x + $zncl2;
                                            // $tot_znx = $tot_znx + $zn;
                                            // $tot_alx = $tot_alx + $al;
                                            // $tot_znalx = $tot_znalx + $zn;
                                            // $tot_pbx = $tot_pbx + $pb;
                                            // $tot_abu_timahx = $tot_abu_timahx + $abu_timah;

                                            $no++;
                                            $tot_hclx = $tot_hclx + $hcl;
                                            $tot_nh4clx = $tot_nh4clx + $nh4cl;
                                            $tot_zncl2x = $tot_zncl2x;
                                            $tot_znx = $tot_znx;
                                            $tot_alx = $tot_alx;
                                            $tot_znalx = $tot_znalx;
                                            $tot_pbx = $tot_pbx;
                                            $tot_abu_timahx = $tot_abu_timahx;

                                            //Total Periode
                                            // $tot_hcls = $tot_hcls + $hcl;
                                            // $tot_nh4cls = $tot_nh4cls + $nh4cl;
                                            // $tot_zncl2s = $tot_zncl2s + $zncl2;
                                            // $tot_zns = $tot_zns + $zn;
                                            // $tot_als = $tot_als + $al;
                                            // $tot_znals = $tot_znals + $zn;
                                            // $tot_pbs = $tot_pbs + $pb;
                                            // $tot_abu_timahs = $tot_abu_timahs + $abu_timah;

                                            $tot_hcls = $tot_hcls + $hcl;
                                            $tot_nh4cls = $tot_nh4cls + $nh4cl;
                                            $tot_zncl2s = $tot_zncl2s;
                                            $tot_zns = $tot_zns;
                                            $tot_als = $tot_als;
                                            $tot_znals = $tot_znals;
                                            $tot_pbs = $tot_pbs;
                                            $tot_abu_timahs = $tot_abu_timahs;
                                        }
                                        if ($tim == "Semua Tim") {

                                            //$no=$nox;
                                        ?>
                                            <tr>
                                                <td style="font-size:12px;color:blue" colspan="5" class="tengah"><b><?php echo "Total " . $r_tanggal; ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_hclx; ?></b></td>
                                                <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_nh4clx; ?></b></td>
                                                <!--<td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_zncl2x; ?></b></td>
									<td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_znx; ?></b></td>
									<td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_alx; ?></b></td>
									<td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_znalx; ?></b></td>
									<td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_pbx; ?></b></td>
									<td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_abu_timahx; ?></b></td>-->
                                            </tr>
                                    <?php }
                                        $nox++;
                                    } ?>
                                    <tr>
                                        <td style="font-size:12px;color:green" colspan="5" class="tengah"><b><?php echo "Total Periode <br>" . $_POST["txttgl_aw"] . " sampai " . $_POST["txttgl_ak"]; ?></b></td>
                                        <td style="font-size:12px;color:green" class="tengah"><b><?php echo $tot_hcls; ?></b></td>
                                        <td style="font-size:12px;color:green" class="tengah"><b><?php echo $tot_nh4cls; ?></b></td>
                                        <!--<td style="font-size:12px;color:green" class="tengah"><b><?php echo $tot_zncl2s; ?></b></td>
								<td style="font-size:12px;color:green" class="tengah"><b><?php echo $tot_zns; ?></b></td>
								<td style="font-size:12px;color:green" class="tengah"><b><?php echo $tot_als; ?></b></td>
								<td style="font-size:12px;color:green" class="tengah"><b><?php echo $tot_znals; ?></b></td>
								<td style="font-size:12px;color:green" class="tengah"><b><?php echo $tot_pbs; ?></b></td>
								<td style="font-size:12px;color:green" class="tengah"><b><?php echo $tot_abu_timahs; ?></b></td>-->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="row">
                            </div>
                        </div>
                    </div>
                </div><!-- /#page-wrapper -->
            </div>
        </div>
    </div>
<?php } ?>