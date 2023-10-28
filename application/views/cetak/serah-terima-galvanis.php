<?php
include "application/config/database.php";
?>
<?php if (isset($_POST["btn_proses"]) == "") { ?>
    <div class="page-content">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-12">
            <h3>Pilih Tanggal Serah Terima:</h3>
            <form method="POST" action="<?= base_url('cetak/terima-galvanis'); ?>">
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
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Unit</label>
                                    <select class="form-control" name="txtunit" id="txtunit">
                                        <option>-Unit-</option>
                                        <option>PA 1</option>
                                        <option>PA 2</option>
                                        <option>PB</option>
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
    <!--<link rel="icon" type="image/png" href="img/logo.png">-->
    <?php
    //$tgl=$_POST['txttgl'];
    //$unit=$_POST['txtunit'];
    //$result4=mysqli_query($link, "SELECT * FROM tb_gaji_harian where nik like '$niknya' and bulan!='4'") or die(mysqil_error());
    //$result4=mysqli_query($link, "SELECT * FROM galvanis where tanggal='$tgl' and Unit='$unit'") or die(mysqli_error($link));
    //$row4 = mysqli_fetch_array($result4);
    //$peri=$row4['periode'];
    //$bulnx=$row4['bulan'];


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
            $tgl = date_format(date_create($_POST['txttgl']), "Y-m-d");
            $unit = $_POST['txtunit'];
            //echo $tgl.$unit;
            //$niknya=$_SESSION["nip"];

            //echo $niknya;
            //$result=mysqli_query($link, "SELECT * FROM tb_gaji_harian group by nik order by periode ASC") or die(mysqil_error());
            //$result=mysqli_query($link, "SELECT * FROM tb_gaji_harian where nik like '$niknya' and bulan!='4'") or die(mysqli_error($link));
            // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
            $result = mysqli_query($link, "SELECT * FROM galvanis where tanggal='$tgl' and Unit='$unit' and status_del='0'") or die(mysqli_error($link));
            $row2 = mysqli_fetch_array($result);
            if ($row2 <= 0) {
                echo "<center style='font-size:14px'><h2><b>Data tidak ada !!</b></h2></center>";
            } else {

                //}
                $unit = $row2["Unit"];
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
                            <table class="table table-hover" border="0px" color="white" rules="none">
                                <center style="font-size:14px">
                                    <h2><b>BERITA ACARA SERAH TERIMA HASIL PRODUKSI</b></h2>
                                </center>
                                <tr>
                                    <td style="width:5%"></td>
                                    <td style="font-size:11px;color:black;width:10%;font-weight: bold;" class="kiri">BAGIAN </td>
                                    <td style="font-size:11px;color:black">:</td>
                                    <td style="font-size:11px;color:black;width:20%"><?php echo $unit; ?></td>
                                    <td style="font-size:11px;color:black;width:12%"></td>
                                    <td style="font-size:11px;color:black;width:10%"></td>
                                    <td style="font-size:11px;color:black;width:12%;font-weight: bold;" class="kiri">HARI/TANGGAL</td>
                                    <td style="font-size:11px;color:black">:</td>
                                    <td style="font-size:11px;color:black;width:20%"><?php echo  $dayList[$day] . ", " . date_format(date_create($tanggalx), "d-M-Y"); ?></td>
                                </tr>
                            </table>
                            <div class="row">
                                <table class="tables table-hover" border="1" rules="all">
                                    <h4>Pemakaian Bahan Baku dan Hasil</h4>
                                    <thead>
                                        <tr class="tengah">
                                            <!--<th style="font-size:10px;" rowspan="2" width="5%" class="tengah">No.</th>-->
                                            <!--<th style="font-size:10px;" rowspan="2" width="5%" class="tengah">Tanggal</th>-->
                                            <th style="font-size:10px;" rowspan="2" width="3%" class="tengah">Team</th>
                                            <th style="font-size:10px;" rowspan="2" width="4%" class="tengah">Shif</th>
                                            <th style="font-size:10px;" rowspan="2" width="4%" class="tengah">Jumlah Operator</th>
                                            <th style="font-size:10px;" colspan="3" width="15%" class="tengah">Bahan Baku</th>
                                            <th style="font-size:10px;" rowspan="2" width="4%" class="tengah">Diameter</th>
                                            <th style="font-size:10px;" colspan="2" width="10%" class="tengah">Hasil Baik</th>
                                            <th style="font-size:10px;" colspan="2" width="10%" class="tengah">Hasil SB</th>
                                            <th style="font-size:10px;" colspan="2" width="10%" class="tengah">Total Hasil</th>
                                            <th style="font-size:10px;" colspan="2" width="10%" class="tengah">Aval</th>
                                            <th style="font-size:10px;" rowspan="2" width="5%" class="tengah">Total <br>Pemakaian</th>
                                            <th style="font-size:10px;" rowspan="2" width="5%" class="tengah">Sisa <br>Sesudah</th>
                                            <th style="font-size:10px;" rowspan="2" width="20%" class="tengah">Keterangan</th>
                                        </tr>
                                        <tr>
                                            <!--<th style="font-size:10px;" width="5%" >Absensi</th>-->
                                            <th style="font-size:10px;" width="5%" class="tengah">Awal</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Masuk</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Total</th>
                                            <th style="font-size:10px;" width="4%" class="tengah">Roll</th>
                                            <th style="font-size:10px;" width="6%" class="tengah">Berat (Kg)</th>
                                            <th style="font-size:10px;" width="4%" class="tengah">Roll</th>
                                            <th style="font-size:10px;" width="6%" class="tengah">Berat (Kg)</th>
                                            <th style="font-size:10px;" width="4%" class="tengah">Roll</th>
                                            <th style="font-size:10px;" width="6%" class="tengah">Berat (Kg)</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Aval Baik</th>
                                            <th style="font-size:10px;" width="5%" class="tengah">Aval Ruwet</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $topt = 0;
                                        $baku_awalx = 0;
                                        $baku_akirx = 0;
                                        $total_bahanx = 0;
                                        $total_baik_rol = 0;
                                        $total_baik_berat = 0;
                                        $total_sb_rol = 0;
                                        $total_sb_berat = 0;
                                        $total_rolx = 0;
                                        $total_beratx = 0;
                                        $total_aval_baikx = 0;
                                        $total_aval_ruwetx = 0;
                                        $total_pemakaianx = 0;
                                        $total_sisax = 0;
                                        // $tgl_aw = date_format(date_create($_POST["txttgl_aw"]), "Y-m-d");
                                        // $tgl_ak = date_format(date_create($_POST["txttgl_ak"]), "Y-m-d");
                                        //echo $tgl_aw."|".$tgl_ak;
                                        // $link = mysqli_connect("localhost:3307", "root", "", "produksi_test");
                                        $r_tgl = mysqli_query($link, "SELECT * FROM galvanis where tanggal='$tgl' and Unit='$unit' and status_del='0'") or die(mysqli_error($link));
                                        while ($row = mysqli_fetch_array($r_tgl)) {
                                            //$r_tanggal=date_format(date_create($r_tgl1["tanggal"]),"Y-m-d");	

                                            //$result=mysqli_query($link, "SELECT * FROM galvanis where tanggal='$tgl' and Unit='$unit'") or die(mysqli_error($link));
                                            //while($row = mysqli_fetch_array($result))
                                            //{
                                            $baris = mysqli_num_rows($result);
                                            $tanggal = $row["tanggal"];
                                            $team = $row["team"];
                                            $shif = $row["shif"];
                                            $jml_opt = $row["jml_opt"];
                                            $baku_awal = $row["bahan_baku_aw"];
                                            $baku_akir = $row["bahan_baku_ak"];
                                            $total_bahan = $row["bahan_baku_tot"];
                                            $diameter = $row["diameter"];
                                            $baik_rol = $row["hasil_baik_roll"];
                                            $baik_berat = $row["hasil_baik_berat"];
                                            $sb_rol = $row["hasil_sb_roll"];
                                            $sb_berat = $row["hasil_sb_berat"];
                                            $total_rol = $row["total_rol"];
                                            $total_berat = $row["total_berat"];
                                            $aval_baik = $row["aval_baik"];
                                            $aval_ruwet = $row["aval_ruwet"];
                                            $total_pemakaian = $row["total_pemakaian"];
                                            $sisa_sesudah = $row["sisa_sesudah"];
                                            $keterangan = $row["ket"];
                                            //$total_berat = $row["total_berat"];
                                        ?>
                                            <tr class="tengah">
                                                <!--<td style="font-size:11px;"><?php echo $no; ?>.</td>-->
                                                <!--<td style="font-size:11px;"><?php echo $tanggal; ?></td>-->
                                                <td style="font-size:10px;"><?php echo $team; ?></td>
                                                <td style="font-size:10px;"><?php echo $shif; //$gaji;
                                                                            ?></td>
                                                <td style="font-size:10px;"><?php echo $jml_opt; ?></td>
                                                <td style="font-size:10px;"><?php echo $baku_awal; ?></td>
                                                <td style="font-size:10px;"><?php echo $baku_akir; ?></td>
                                                <td style="font-size:10px;"><?php echo $total_bahan; ?></td>
                                                <td style="font-size:10px;"><?php echo $diameter; ?></td>
                                                <td style="font-size:10px;"><?php echo $baik_rol; ?></td>
                                                <td style="font-size:10px;"><?php echo $baik_berat; ?></td>
                                                <td style="font-size:10px;"><?php echo $sb_rol; ?></td>
                                                <td style="font-size:10px;"><?php echo $sb_berat; ?></td>
                                                <td style="font-size:10px;"><?php echo $total_rol; ?></td>
                                                <td style="font-size:10px;"><?php echo $total_berat; ?></td>
                                                <td style="font-size:10px;"><?php echo $aval_baik; ?></td>
                                                <td style="font-size:10px;"><?php echo $aval_ruwet; ?></td>
                                                <td style="font-size:10px;"><?php echo $total_pemakaian; ?></td>
                                                <td style="font-size:10px;"><?php echo $sisa_sesudah; ?></td>
                                                <td style="font-size:10px;"><?php echo $keterangan; ?></td>

                                            </tr>
                                        <?php
                                            $no++;
                                            $topt = $jml_opt + $topt;
                                            $baku_awalx = $baku_awalx + $baku_awal;
                                            $baku_akirx = $baku_akirx + $baku_akir;
                                            $total_bahanx = $total_bahanx + $total_bahan;
                                            $total_baik_rol = $total_baik_rol + $baik_rol;
                                            $total_baik_berat = $total_baik_berat + $baik_berat;
                                            $total_sb_rol = $total_sb_rol + $sb_rol;
                                            $total_sb_berat = $total_sb_berat + $sb_berat;
                                            $total_rolx = $total_rolx + $total_rol;
                                            $total_beratx = $total_beratx + $total_berat;
                                            $total_aval_baikx = $total_aval_baikx + $aval_baik;
                                            $total_aval_ruwetx = $total_aval_ruwetx + $aval_ruwet;
                                            $total_pemakaianx = $total_pemakaianx + $total_pemakaian;
                                            $total_sisax = $total_sisax + $sisa_sesudah;
                                        }
                                        ?>
                                        <tr>
                                            <td style="font-size:10px;color:blue" colspan="2" class="tengah"><b><?php echo "Total " /*. $r_tanggal*/; ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo $topt; ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo $baku_awalx; ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo $baku_akirx; ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo $total_bahanx; ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo "-"; ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo $total_baik_rol; ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo $total_baik_berat; ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo $total_sb_rol; ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo $total_sb_berat; ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo $total_rolx; ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo $total_beratx; ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo $total_aval_baikx; ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo $total_aval_ruwetx; ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo $total_pemakaianx; ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo $total_sisax; ?></b></td>
                                            <td style="font-size:10px;color:blue" class="tengah"><b><?php echo "-"; ?></b></td>
                                        </tr>
                                        <?php //}
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--------------------------------------Pemakaian Bahan Bantu--------------------------->
                    <div class="row">

                        <!--<div class="page-content">-->
                        <div class="col-lg-6">
                            <div class="table-responsive">
                                <table class="tables table-hover" border="1" rules="all" width="50%">
                                    <h4>Pemakaian Bahan Pembantu</h4>
                                    <thead>
                                        <tr class="tengah">
                                            <!--<th style="font-size:10px;" width="5%" class="tengah">No.</th>-->
                                            <!--<th style="font-size:10px;" width="5%" class="tengah">Tanggal</th>-->
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
                                        $no = 1;
                                        $tot_hcl = 0;
                                        $tot_nh4cl = 0;
                                        $tot_zncl2 = 0;
                                        $tot_zn = 0;
                                        $tot_al = 0;
                                        $tot_znal = 0;
                                        $tot_pb = 0;
                                        $tot_abu_timah = 0;
                                        // $tgl_aw = date_format(date_create($_POST["txttgl_aw"]), "Y-m-d");
                                        // $tgl_ak = date_format(date_create($_POST["txttgl_ak"]), "Y-m-d");
                                        //echo $tgl_aw."|".$tgl_ak;
                                        // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                        $r_tgl = mysqli_query($link, "SELECT * FROM galvanis where tanggal='$tgl' and Unit='$unit' and status_del='0'") or die(mysqli_error($link));
                                        while ($row = mysqli_fetch_array($r_tgl)) {
                                            //$r_tanggal=date_format(date_create($r_tgl1["tanggal"]),"Y-m-d");	

                                            //$result=mysqli_query($link, "SELECT * FROM galvanis where tanggal='2018-01-25' and Unit='PB'") or die(mysqli_error($link));
                                            //while($row = mysqli_fetch_array($result))
                                            //{
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
                                                <!--<td style="font-size:11px;"><?php echo $no; ?>.</td>-->
                                                <!--<td style="font-size:11px;"><?php echo $tanggal; ?></td>-->
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
                                            <td style="font-size:12px;color:blue" colspan="2" class="tengah"><b><?php echo "Total " /*. $r_tanggal*/; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_hcl; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_nh4cl; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_zncl2; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_zn; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_al; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_znal; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_pb; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_abu_timah; ?></b></td>
                                        </tr>
                                        <?php //}
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="table-responsive">
                                <table class="tables table-hover" border="1" rules="all" width="50%">
                                    <h4>Laporan Downtime Mesin</h4>
                                    <thead>
                                        <tr class="tengah">
                                            <!--<th style="font-size:10px;" width="5%" class="tengah">No.</th>-->
                                            <!--<th style="font-size:10px;" width="5%" class="tengah">Tanggal</th>-->
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
                                            <!--<th style="font-size:10px;" width="10%" class="tengah">Keterangan</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $tot_pts_bahan = 0;
                                        $tot_pts_hcl = 0;
                                        $tot_pts_timah = 0;
                                        $tot_pts_coiler = 0;
                                        $tot_ganti_size = 0;
                                        $tot_tunggu_bahan = 0;
                                        $tot_mesin_rusak = 0;
                                        $tot_lain2 = 0;
                                        // $tgl_aw = date_format(date_create($_POST["txttgl_aw"]), "Y-m-d");
                                        // $tgl_ak = date_format(date_create($_POST["txttgl_ak"]), "Y-m-d");
                                        //echo $tgl_aw."|".$tgl_ak;
                                        // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                        $r_tgl = mysqli_query($link, "SELECT * FROM galvanis where tanggal='$tgl' and Unit='$unit' and status_del='0'") or die(mysqli_error($link));
                                        while ($row = mysqli_fetch_array($r_tgl)) {
                                            //$r_tanggal=date_format(date_create($r_tgl1["tanggal"]),"Y-m-d");	

                                            //$result=mysqli_query($link, "SELECT * FROM galvanis where tanggal='2018-01-25' and Unit='PB'") or die(mysqli_error($link));
                                            //while($row = mysqli_fetch_array($result))
                                            //{
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
                                                <!--<td style="font-size:11px;"><?php echo $no; ?>.</td>-->
                                                <!--<td style="font-size:11px;"><?php echo $tanggal; ?></td>-->
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
                                                <!--<td style="font-size:11px;"><?php echo $ket_lain2; ?></td>-->
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
                                            <td style="font-size:12px;color:blue" colspan="2" class="tengah"><b><?php echo "Total " /*. $r_tanggal*/; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_pts_bahan; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_pts_hcl; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_pts_timah; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_pts_coiler; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_ganti_size; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_tunggu_bahan; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_mesin_rusak; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $tot_lain2; ?></b></td>
                                            <!--<td style="font-size:12px;color:blue" class="tengah"><b><?php echo "-"; ?></b></td>-->
                                        </tr>
                                        <?php //}
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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