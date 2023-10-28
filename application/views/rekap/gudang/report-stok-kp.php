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

<?php
include "application/config/database.php";
?>

<?php if (isset($_POST["btn_proses"]) == "") { ?>
    <div class="page-content">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-12">
            <h3>Tentukan Periode:</h3>
            <form method="POST" action="<?= base_url('rekap/stok-kp'); ?>">
                <div class="row"></div>
                <div id="page-wrapper">
                    <div class="container-fluid">
                        <div class="col-lg-12">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Periode</label>
                                    <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                        <input class="form-control date-picker" name="txttgl_aw" id="txttgl_aw" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Mulai" />
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label>klik Proses</label><br>
                                <button type="submit" class="btn btn-default" name="btn_proses" id="btn_proses">Proses</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
} else {
?>
    <div class="page-content">
        <div class="col-lg-2"></div>
        <div class="col-lg-12">
            <h3>Tentukan Periode:</h3>
            <?php $aw = $_POST["txttgl_aw"]; //$ak=$_POST["txttgl_ak"];$tim=$_POST["tim"];
            ?>
            <form method="POST" action="<?= base_url('rekap/stok-kp'); ?>">
                <div class="row"></div>
                <div id="page-wrapper">
                    <div class="container-fluid">
                        <div class="col-lg-12">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Periode</label>
                                    <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                        <input class="form-control date-picker" name="txttgl_aw" id="txttgl_aw" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Mulai" value="<?php echo $aw; ?>" />
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label>klik Proses</label><br>
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
                        <h2>Laporan Stok Gudang Kawat Paku Per Tanggal: <?php echo $_POST["txttgl_aw"]; ?></h2>
                        <div id="print-area-1" class="print-area">
                            <div class="row">
                                <table class="tables table-hover" border="1" rules="all">
                                    <thead>
                                        <?php //echo $r_diameter."|".$tanggal;
                                        ?>
                                        <tr class="tengah">
                                            <th style="font-size:10px;" rowspan="1" width="6%" class="tengah">No.</th>
                                            <th style="font-size:10px;" rowspan="1" width="6%" class="tengah">Tanggal</th>
                                            <th style="font-size:10px;" rowspan="1" width="5%" class="tengah">Diameter</th>
                                            <th style="font-size:10px;" colspan="1" width="13%" class="tengah">Kode Barang</th>
                                            <th style="font-size:10px;" colspan="1" width="13%" class="tengah">Berat</th>
                                            <th style="font-size:10px;" colspan="1" width="13%" class="tengah">Jenis Barang</th>

                                        </tr>
                                    </thead>

                                    <?php
                                    $no1 = 0;
                                    $no = 1;
                                    $tgl_aw = date_format(date_create($_POST["txttgl_aw"]), "Y-m-d");
                                    //$tgl_ak=date_format(date_create($_POST["txttgl_ak"]),"Y-m-d");
                                    $tim = ["tim"];
                                    if ($tim == "Semua Tim") {
                                        $syarat_tim = "";
                                    } else {

                                        $syarat_tim = ""; //"AND team='$tim'";
                                    }
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $r_tgl1 = mysqli_query($link, "SELECT * FROM gudang_paku where tanggal='$tgl_aw' AND status_barang !='Habis' order by tanggal asc") or die(mysqli_error($link));


                                    while ($row = mysqli_fetch_array($r_tgl1)) {

                                        $tanggal = $row["tanggal"];
                                        $diameter = $row["diameter"];
                                        $kode_brg = $row["kode_barang"];
                                        $berat = $row["berat"];
                                        $jns_brg = $row["jns_brg"];

                                    ?>


                                        <tbody>
                                            <tr class="tengah">
                                                <td style="font-size:11px;"><?php echo $no; ?></td>
                                                <td style="font-size:11px;"><?php echo $tanggal; ?></td>
                                                <td style="font-size:11px;"><?php echo $diameter; ?></td>
                                                <td style="font-size:11px;" align="right"><?php echo $kode_brg; ?>&nbsp;</td>
                                                <td style="font-size:11px;" align="right"><?php echo $berat; ?>&nbsp;</td>
                                                <td style="font-size:11px;" align="right"><?php echo $jns_brg; ?>&nbsp;</td>

                                            </tr>
                                            <div class="row"></div>
                                        <?php
                                        $no++;
                                    }
                                        ?>
                                        </tbody>
                                        <?php //} 
                                        ?>
                                </table><br>
                                <div class="col-lg-6">
                                    <div id="page-wrapper">

                                        <div class="container-fluid">
                                            <div class="row">
                                                <table class="tables table-hover" border="1" rules="all">

                                                    <?php //echo $r_diameter."|".$tanggal;
                                                    ?>
                                                    <tr class="tengah">
                                                        <th style="font-size:10px;" rowspan="1" width="5%" class="tengah">No.</th>
                                                        <th style="font-size:10px;" rowspan="1" width="40%" class="tengah">Keterangan</th>
                                                        <th style="font-size:10px;" rowspan="1" width="15%" class="tengah">NG</th>
                                                        <th style="font-size:10px;" rowspan="1" width="15%" class="tengah">OK</th>
                                                        <th style="font-size:10px;" rowspan="1" width="10%" class="tengah">Roll/Coil</th>
                                                        <th style="font-size:10px;" colspan="1" width="15%" class="tengah">Berat</th>
                                                    </tr>

                                                    <tr class="tengah">
                                                        <td style="font-size:11px;">1.</td>
                                                        <td style="font-size:11px;"><b>Barang Masuk Tanggal <?php echo date_format(date_create($_POST["txttgl_aw"]), "Y-m-d"); ?></b></td>
                                                        <?php
                                                        // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                                        $isiok = mysqli_fetch_array(mysqli_query($link, "SELECT sum(berat) as 'beratok' FROM gudang_paku where tanggal='$tgl_aw' AND status_barang !='Habis' AND status_gudang='1' and jns_brg='OK'")) or die(mysqli_error($link));
                                                        $stokok = $isiok["beratok"];

                                                        $ising = mysqli_fetch_array(mysqli_query($link, "SELECT sum(berat) as 'beratng' FROM gudang_paku where tanggal='$tgl_aw' AND status_barang !='Habis' AND status_gudang='1' and jns_brg='NG'")) or die(mysqli_error($link));
                                                        $stokng = $ising["beratng"];

                                                        $isinya = mysqli_fetch_array(mysqli_query($link, "SELECT count(kode_barang) as 'stok', sum(berat) as 'beratnya' FROM gudang_paku where tanggal='$tgl_aw' AND status_barang !='Habis' AND status_gudang='1' order by tanggal asc")) or die(mysqli_error($link));

                                                        $stok = $isinya["stok"];
                                                        $berat = $isinya["beratnya"];
                                                        ?>
                                                        <td style="font-size:11px;"><b><?php echo number_format($stokng, 2, '.', ','); ?></b></td>
                                                        <td style="font-size:11px;"><b><?php echo number_format($stokok, 2, '.', ','); ?></b></td>
                                                        <td style="font-size:11px;"><b><?php echo number_format($stok, 2, '.', ','); ?></b></td>
                                                        <td style="font-size:11px;"><b><?php echo number_format($berat, 2, '.', ','); ?></b></td>
                                                    </tr>
                                                    <tr class="tengah">
                                                        <td style="font-size:11px;">2.</td>
                                                        <td style="font-size:11px;"><b>Stok Sampai Tanggal <?php echo date_format(date_create($_POST["txttgl_aw"]), "Y-m-d"); ?></b></td>
                                                        <?php
                                                        // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                                        $isiok = mysqli_fetch_array(mysqli_query($link, "SELECT sum(berat) as 'beratok' FROM gudang_paku where tanggal<='$tgl_aw' AND status_barang !='Habis' AND status_gudang='1' and jns_brg='OK'")) or die(mysqli_error($link));
                                                        $stokok = $isiok["beratok"];

                                                        $ising = mysqli_fetch_array(mysqli_query($link, "SELECT sum(berat) as 'beratng' FROM gudang_paku where tanggal<='$tgl_aw' AND status_barang !='Habis' AND status_gudang='1' and jns_brg='NG'")) or die(mysqli_error($link));
                                                        $stokng = $ising["beratng"];

                                                        $isinya2 = mysqli_fetch_array(mysqli_query($link, "SELECT count(kode_barang) as 'stok', sum(berat) as 'beratnya' FROM gudang_paku where tanggal<='$tgl_aw' AND status_barang !='Habis' AND status_gudang='1' order by tanggal asc")) or die(mysqli_error($link));

                                                        $stok2 = $isinya2["stok"];
                                                        $berat2 = $isinya2["beratnya"];
                                                        ?>
                                                        <td style="font-size:11px;"><b><?php echo number_format($stokng, 2, '.', ','); ?></b></td>
                                                        <td style="font-size:11px;"><b><?php echo number_format($stokok, 2, '.', ','); ?></b></td>
                                                        <td style="font-size:11px;"><b><?php echo number_format($stok2, 2, '.', ','); ?></b></td>
                                                        <td style="font-size:11px;"><b><?php echo number_format($berat2, 2, '.', ','); ?></b></td>
                                                    </tr>
                                                    <?php
                                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                                    $dia = mysqli_query($link, "SELECT sum(berat) as 'beratnya',diameter FROM gudang_paku where tanggal<='$tgl_aw' AND status_barang !='Habis' group by diameter order by beratnya desc ") or die(mysqli_error($link));
                                                    $num = 3;
                                                    while ($diam = mysqli_fetch_array($dia)) {
                                                        $diameter = $diam["diameter"];
                                                    ?>
                                                        <tr class="tengah">
                                                            <td style="font-size:11px;"><?php echo $num; ?></td>
                                                            <td style="font-size:11px;">Stok Diameter <?php echo $diameter; ?></td>
                                                            <?php
                                                            // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                                            $isiok = mysqli_fetch_array(mysqli_query($link, "SELECT sum(berat) as 'beratok' FROM gudang_paku where tanggal<='$tgl_aw' AND diameter='$diameter' AND status_barang !='Habis' AND status_gudang='1' and jns_brg='OK'")) or die(mysqli_error($link));
                                                            $stokok = $isiok["beratok"];

                                                            $ising = mysqli_fetch_array(mysqli_query($link, "SELECT sum(berat) as 'beratng' FROM gudang_paku where tanggal<='$tgl_aw' AND diameter='$diameter' AND status_barang !='Habis' AND status_gudang='1' and jns_brg='NG'")) or die(mysqli_error($link));
                                                            $stokng = $ising["beratng"];

                                                            $isinya = mysqli_fetch_array(mysqli_query($link, "SELECT count(kode_barang) as 'stok', sum(berat) as 'beratnya' FROM gudang_paku where tanggal<='$tgl_aw' AND diameter='$diameter' AND status_barang !='Habis'")) or die(mysqli_error($link));

                                                            $stok = $isinya["stok"];
                                                            $berat = $isinya["beratnya"];
                                                            ?>
                                                            <td style="font-size:11px;"><?php echo number_format($stokng, 2, '.', ','); ?></td>
                                                            <td style="font-size:11px;"><?php echo number_format($stokok, 2, '.', ','); ?></td>
                                                            <td style="font-size:11px;"><?php echo number_format($stok, 2, '.', ','); ?></td>
                                                            <td style="font-size:11px;"><?php echo number_format($berat, 2, '.', ','); ?></td>
                                                        </tr>
                                                    <?php $num++;
                                                    } ?>
                                                </table><br>
                                                <div>
                                                </div>

                                                <div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div><!-- /#page-wrapper -->
                            </div>
                        </div>
                    </div>
                <?php } ?>