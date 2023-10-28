<?php
// include "koneksi.php";
$warna_garisx = "color:white";
//$gambar="img/logo_nesiyo.png";
$gambar = "assets/img/logo_nesiyo.png";
?>


<?php if (isset($_POST["btn_proses"]) == "") { ?>

    <div class="page-content">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-12">
            <h3>Pilih Tanggal Serah Terima:</h3>
            <form method="POST" action="<?= base_url('rekap/cetak-stok-kp'); ?>">
                <div class="row"></div>
                <div id="page-wrapper">
                    <div class="container-fluid">
                        <div class="col-lg-12">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Tanggal Awal</label>
                                    <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                        <input class="form-control date-picker" name="txttgl" id="txttgl" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Mulai" />
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="col-lg-3">
						<div class="form-group" >
							<label>Unit</label>
							<select class="form-control" name="txtunit" id="txtunit">
								<option>-Unit-</option>
								<option>PA 1</option>
								<option>PA 2</option>
								<option>PB</option>								
								</select>
						</div>
					</div>-->

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
    <!--<link rel="icon" type="image/png" href="img/logo.png">-->
    <?php
    //$tgl=$_POST['txttgl'];
    //$unit=$_POST['txtunit'];
    //$result4=mysqli_query($link, "SELECT * FROM tb_gaji_harian where nik like '$niknya' and bulan!='4'") or die(mysqli_error($link));
    //$result4=mysqli_query($link, "SELECT * FROM gudang_paku where tanggal='$tgl' ") or die(mysqli_error($link));
    //$row4 = mysqli_fetch_array($result4);
    //$peri=$row4['periode'];
    //$bulnx=$row4['bulan'];

    $warna_garisx = "color:white";
    $gambar_ = "img/blank.png";

    ?>
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


    <div id="print-area-1" class="print-area">

        <body>
            <?php
            include "application/config/database.php";
            ?>
            <?php
            $tgl = date_format(date_create($_POST['txttgl']), "Y-m-d");
            // $unit = $_POST['txtunit'];
            //echo $tgl.$unit;
            //$niknya=$_SESSION["nip"];

            //echo $niknya;
            //$result=mysqli_query($link, "SELECT * FROM tb_gaji_harian group by nik order by periode ASC") or die(mysqli_error($link));
            //$result=mysqli_query($link, "SELECT * FROM tb_gaji_harian where nik like '$niknya' and bulan!='4'") or die(mysqli_error($link));
            // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
            $result = mysqli_query($link, "SELECT * FROM gudang_paku where tanggal='$tgl'") or die(mysqli_error($link));
            $row2 = mysqli_fetch_array($result);
            if ($row2 <= 0) { //echo $tgl;
            ?>
                <div class="page-content">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-12">
                        <h3>Pilih Tanggal Serah Terima:</h3>
                        <form method="POST" action="<?= base_url('rekap/cetak-stok-kp'); ?>">
                            <div class="row"></div>
                            <div id="page-wrapper">
                                <div class="container-fluid">
                                    <div class="col-lg-12">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Tanggal Awal</label>
                                                <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                                    <input class="form-control date-picker" name="txttgl" id="txttgl" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Mulai" />
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="col-lg-3">
						<div class="form-group" >
							<label>Unit</label>
							<select class="form-control" name="txtunit" id="txtunit">
								<option>-Unit-</option>
								<option>PA 1</option>
								<option>PA 2</option>
								<option>PB</option>								
								</select>
						</div>
					</div>-->

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
            <?php
                echo "<center style='font-size:14px'><h2><b>Data tidak ada !!</b></h2></center>";
            } else {
            ?>

                <div class="col-lg-12">

                    <div class="col-lg-12">
                        <br>
                        <div class="table-responsive">
                            <table style="margin-bottom: 0;" class="tables table-hover" border="0" rules="none">

                                <tr>
                                    <td style="font-size: 11px; text-align:left !important;width:10%" rowspan="5" width="10%"><img src="<?= base_url('assets/'); ?>img/logo_nesiyo.png" width="64px" class="tengah"></td>
                                    <td style="width:5%">&nbsp;</td>
                                    <td style="font-size:18px;;width:50%;font-weight: bold;" class="tengah" rowspan="2">PT. New Simo Mulijo</td>

                                    <td style="font-size:11px;;width:20%">&nbsp;</td>
                                    <td style="font-size:11px;;width:8%">No. Dok</td>
                                    <td style="font-size:11px;;width:2%">:</td>
                                    <td style="font-size:11px;;width:10%">No. Dok</td>
                                </tr>
                                <tr>

                                    <td style="width:5%">&nbsp;</td>
                                    <!--<td style="font-size:14px;;width:25%;font-weight: bold;" class="tengah">(NESIYO)</td>-->

                                    <td style="font-size:11px;;width:20%">&nbsp;</td>
                                    <td style="font-size:11px;;width:8%">Rev.</td>
                                    <td style="font-size:11px;;width:2%">:</td>
                                    <td style="font-size:11px;;width:10%">Rev.</td>
                                </tr>
                                </tr>
                                <tr>

                                    <td style="width:5%">&nbsp;</td>
                                    <td style="font-size:14px;;font-weight: bold;" class="tengah" rowspan="2">(NESIYO)</td>

                                    <td style="font-size:11px;;width:20%">&nbsp;</td>
                                    <td style="font-size:11px;;width:8%">Tanggal</td>
                                    <td style="font-size:11px;;width:2%">:</td>
                                    <td style="font-size:11px;;width:10%">Tanggal</td>
                                </tr>
                                </tr>
                                <tr>
                                    <td style="width:5%">&nbsp;</td>
                                    <!--<td style="font-size:14px;;width:25%;font-weight: bold;" class="tengah">(NESIYO)</td>-->

                                    <td style="font-size:11px;;width:20%">&nbsp;</td>
                                    <td style="font-size:11px;;width:8%">Halaman</td>
                                    <td style="font-size:11px;;width:2%">:</td>
                                    <td style="font-size:11px;;width:10%">Tanggal</td>
                                </tr>
                                </tr>
                                <tr>
                                    <td style="width:5%">&nbsp;</td>
                                    <td style="font-size:16px;;font-weight: bold;" class="tengah" rowspan="2">Laporan Stok Kawat Paku</td>

                                    <td style="font-size:11px;;width:20%">&nbsp;</td>
                                    <td style="font-size:11px;;width:8%">&nbsp;</td>
                                    <td style="font-size:11px;;width:2%">&nbsp;</td>
                                    <td style="font-size:11px;;width:10%">&nbsp;</td>
                                </tr>
                            </table>
                        </div>

                        <?php
                        //}
                        // $unit = $row2["Unit"];
                        $tanggalx = $row2["tanggal"];

                        $day = date('D', strtotime($tgl));
                        //echo $day."|".$tanggalx;
                        $dayList = array(
                            'Sun' => 'Minggu',
                            'Mon' => 'Senin',
                            'Tue' => 'Selasa',
                            'Wed' => 'Rabu',
                            'Thu' => 'Kamis',
                            'Fri' => 'Jumat',
                            'Sat' => 'Sabtu'
                        );
                        //echo "Tanggal {$tanggal} adalah hari : " . $dayList[$day];

                        ?>
                        <!-- Page Heading -->
                        <div class="page-content">
                            <div class="table-responsive">
                                <div class="col-lg-12">

                                    <!--<center style="font-size:14px"><h2><b>Laporan Kartu Stok</b></h2></center>-->
                                    <?php
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $dia1 = mysqli_query($link, "SELECT * FROM gudang_paku where tanggal='$tgl' group by diameter ") or die(mysqli_error($link));
                                    while ($dia = mysqli_fetch_array($dia1)) {
                                        //echo $tgl."<br>";
                                        $diameter = $dia["diameter"];
                                        //echo $diameter;
                                        $no = 1;
                                    ?>
                                        <table class="table table-hover" border="0px" color="white" rules="none">
                                            <tr>
                                                <td style="font-size:12px;width:5%"><b>Diameter: <?php echo " " . $diameter; ?></b></td>
                                            </tr>
                                        </table>
                                        <?php //} 
                                        ?>

                                        <div class="row">
                                            <table class="tables table-hover" border="1" rules="all">
                                                <!--<h4>Pemakaian Bahan Baku dan Hasil</h4>-->
                                                <thead>
                                                    <tr class="tengah">
                                                        <th style="font-size:10px;" rowspan="1" width="5%" class="tengah">No.</th>
                                                        <th style="font-size:10px;" rowspan="1" width="45%" class="tengah">Kode Barang</th>
                                                        <th style="font-size:10px;" rowspan="1" width="25%" class="tengah">Berat</th>
                                                        <th style="font-size:10px;" colspan="1" width="25%" class="tengah">Jenis Barang</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    //$no=1;
                                                    $topt = 0;
                                                    $beratx = 0;
                                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                                    $r_tgl = mysqli_query($link, "SELECT * FROM gudang_paku where tanggal='$tgl' and diameter='$diameter'") or die(mysqli_error($link));
                                                    while ($row = mysqli_fetch_array($r_tgl)) {
                                                        $baris = mysqli_num_rows($result);
                                                        $kode = $row["kode_barang"];
                                                        $berat = $row["berat"];
                                                        $jns = $row["jns_brg"];

                                                    ?>
                                                        <tr class="tengah">
                                                            <td style="font-size:10px;"><?php echo $no; ?></td>
                                                            <td style="font-size:10px;"><?php echo $kode; //$gaji;
                                                                                        ?></td>
                                                            <td style="font-size:10px;"><?php echo $berat; ?></td>
                                                            <td style="font-size:10px;"><?php echo $jns; ?></td>


                                                        </tr>
                                                    <?php
                                                        $no++;
                                                        $beratx = $beratx + $berat;
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td style="font-size:10px;color:blue" colspan="2" class="tengah"><b><?php echo "Total " ?></b></td>
                                                        <td style="font-size:10px;color:blue" class="tengah"><b><?php echo $beratx; ?></b></td>
                                                        <td style="font-size:10px;color:blue" class="tengah"><b><?php echo " - "; ?></b></td>


                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div><br><?php } ?>
                                </div>
                                <!--------------------------------------------------------Tabel Pengembalian, sebelah Kanan------------------->

                            </div>


                            <!--------------------------------------Tanda tangan--------------------------->


                            <div class="row">&nbsp;</div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table rules="all" class="center" border="1">
                                            <tr>
                                                <td width="30%" class="center">PENGAWAS</td>
                                                <!--<td width="20%" class="center">PENGAWAS II</td>
								<td width="20%" class="center">PENGAWAS III</td>-->
                                                <td width="30%" class="center">ADM. PRODUKSI</td>
                                                <td width="40%" class="center">ADM. GUDANG BARANG JADI</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h1>&nbsp; </h1>
                                                </td>
                                                <!--<td><h1>&nbsp; </h1></td>
								<td><h1>&nbsp; </h1></td>-->
                                                <td>
                                                    <h1>&nbsp; </h1>
                                                </td>
                                                <td>
                                                    <h1>&nbsp; </h1>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>................</td>
                                                <!--<td>................</td>
								<td>................</td>-->
                                                <td>................</td>
                                                <td>................</td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>


        </body>
    </div>
<?php
}
//echo "<script type='text/javascript'> window.print()</script>";
?>