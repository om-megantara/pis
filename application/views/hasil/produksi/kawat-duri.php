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
    <div class="col-lg-2">
    </div>
    <div class="col-lg-12">
        <h3>Tentukan Periode:</h3>
        <form method="POST" action="<?= base_url('hasil/produksi-kd'); ?>">
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
                                <label>Operator (Pilih Operator)</label>
                                <select class="form-control" name="txtoperator" id="txtoperator" required>
                                    <option>-Semua Operator-</option>
                                    <?php
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $opt = mysqli_query($link, "SELECT * FROM operator where bagian='kadu' AND status_del='0'") or die(mysqli_error($link));
                                    while ($data = mysqli_fetch_array($opt)) {
                                        $kd = $data["kd_opt"];
                                        $nama = $data["nama_karyawan"];

                                        //echo $nama;
                                        echo "<option>$nama</option>";
                                    } ?>
                                    <!--<option>Aon</option>
									<option>Isa Sebastian</option>
									<option>Suhartanto</option>
									<option>Vicky S.</option>
									<option>Ardian Kris</option>
									<option>Hadi</option>
									<option>Novian Khoiril Amin</option>
									<option>Muchammad Fajar</option>-->
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
        $tim = $_POST["txtoperator"]; ?>
        <form method="POST" action="<?= base_url('hasil/produksi-kd'); ?>">
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
                                    <!--<input class="form-control" type="text" name="txttgl_ak" id="txttgl_ak" readonly="readonly">-->
                                    <input class="form-control date-picker" name="txttgl_ak" id="txttgl_ak" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Akhir" value="<?php echo $ak; ?>" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Operator (Pilih Operator)</label>
                                <select class="form-control" name="txtoperator" id="txtoperator" required>
                                    <option>
                                        <selected><?php echo $tim; ?></selected>
                                    </option>
                                    <option>-Semua Operator-</option>
                                    <?php
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $opt = mysqli_query($link, "SELECT * FROM operator where bagian='kadu' AND status_del='0'") or die(mysqli_error($link));
                                    while ($data = mysqli_fetch_array($opt)) {
                                        $kd = $data["kd_opt"];
                                        $nama = $data["nama_karyawan"];

                                        //echo $nama;
                                        echo "<option>$nama</option>";
                                    } ?>
                                    <!--<option>Aon</option>
									<option>Isa Sebastian</option>
									<option>Suhartanto</option>
									<option>Vicky S.</option>
									<option>Ardian Kris</option>
									<option>Hadi</option>
									<option>Novian Khoiril Amin</option>
									<option>Muchammad Fajar</option>-->
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
                    <h2>Laporan Produksi Kawat Duri periode: <?php echo $_POST["txttgl_aw"] . " sampai " . $_POST["txttgl_ak"]; ?></h2>

                    <div class="row">
                        <table class="tables table-hover" border="1" rules="all">
                            <thead>
                                <tr class="tengah">
                                    <th style="font-size:10px;" rowspan="2" width="5%" class="tengah">No.</th>
                                    <th style="font-size:10px;" rowspan="2" width="5%" class="tengah">Tanggal</th>
                                    <th style="font-size:10px;" rowspan="2" width="9%" class="tengah">Operator</th>
                                    <th style="font-size:10px;" rowspan="2" width="4%" class="tengah">Shif</th>
                                    <!--<th style="font-size:10px;" rowspan="2" width="5%" class="tengah">Jumlah Operator</th>-->
                                    <th style="font-size:10px;" colspan="3" width="15%" class="tengah">Bahan Baku</th>
                                    <th style="font-size:10px;" rowspan="2" width="5%" class="tengah">Ukuran</th>
                                    <th style="font-size:10px;" colspan="2" width="8%" class="tengah">Hasil Baik</th>
                                    <th style="font-size:10px;" colspan="2" width="8%" class="tengah">Hasil Hold</th>
                                    <th style="font-size:10px;" colspan="2" width="8%" class="tengah">Total Hasil</th>
                                    <th style="font-size:10px;" colspan="2" width="10%" class="tengah">Aval</th>
                                    <th style="font-size:10px;" rowspan="2" width="5%" class="tengah">Total Pemakaian</th>
                                    <th style="font-size:10px;" rowspan="2" width="5%" class="tengah">Sisa Sesudah</th>
                                    <th style="font-size:10px;" rowspan="2" width="9%" class="tengah">Keterangan</th>
                                </tr>
                                <tr>
                                    <!--<th style="font-size:10px;" width="5%" >Absensi</th>-->
                                    <th style="font-size:10px;" width="5%" class="tengah">Awal</th>
                                    <th style="font-size:10px;" width="5%" class="tengah">Masuk</th>
                                    <th style="font-size:10px;" width="5%" class="tengah">Total</th>
                                    <th style="font-size:10px;" width="3%" class="tengah">Roll</th>
                                    <th style="font-size:10px;" width="5%" class="tengah">Berat (Kg)</th>
                                    <th style="font-size:10px;" width="3%" class="tengah">Roll</th>
                                    <th style="font-size:10px;" width="5%" class="tengah">Berat (Kg)</th>
                                    <th style="font-size:10px;" width="3%" class="tengah">Roll</th>
                                    <th style="font-size:10px;" width="5%" class="tengah">Berat (Kg)</th>
                                    <th style="font-size:10px;" width="5%" class="tengah">Aval Baik</th>
                                    <th style="font-size:10px;" width="5%" class="tengah">Aval Ruwet</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nox = 1;
                                $baku_awals = 0;
                                $baku_akirs = 0;
                                $total_bahans = 0;
                                $total_baik_rols = 0;
                                $total_baik_berats = 0;
                                $total_sb_rols = 0;
                                $total_sb_berats = 0;
                                $total_rols = 0;
                                $total_berats = 0;
                                $total_aval_baiks = 0;
                                $total_aval_ruwets = 0;
                                $total_pemakaians = 0;
                                $total_sisas = 0;
                                $tgl_aw = date_format(date_create($_POST["txttgl_aw"]), "Y-m-d");
                                $tgl_ak = date_format(date_create($_POST["txttgl_ak"]), "Y-m-d");
                                //echo $tgl_aw."|".$tgl_ak;
                                if ($tim == "-Semua Operator-") {
                                    $syarat_tim = "";
                                } else {
                                    $syarat_tim = "AND operator='$tim'";
                                }
                                // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                $r_tgl = mysqli_query($link, "SELECT * FROM kawat_duri where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak'" . $syarat_tim . " AND status_del='0' group by tanggal order by tanggal asc") or die(mysqli_error($link));
                                while ($r_tgl1 = mysqli_fetch_array($r_tgl)) {
                                    $r_tanggal = date_format(date_create($r_tgl1["tanggal"]), "Y-m-d");

                                    if ($tim == "-Semua Operator-") {
                                        $no = 1;
                                    } else {
                                        $no = $nox;
                                    }

                                    $baku_awalx = 0;
                                    $baku_akirx = 0;
                                    $total_bahanx = 0;
                                    $total_baik_rolx = 0;
                                    $total_baik_beratx = 0;
                                    $total_sb_rolx = 0;
                                    $total_sb_beratx = 0;
                                    $total_rolx = 0;
                                    $total_beratx = 0;
                                    $total_aval_baikx = 0;
                                    $total_aval_ruwetx = 0;
                                    $total_pemakaianx = 0;
                                    $total_sisax = 0;
                                    $result = mysqli_query($link, "SELECT * FROM kawat_duri where tanggal='$r_tanggal'" . $syarat_tim . " AND status_del='0' order by tanggal desc, shif asc ") or die(mysqli_error($link));
                                    while ($row = mysqli_fetch_array($result)) {
                                        $baris = mysqli_num_rows($result);

                                        $tanggal = $row["tanggal"];
                                        $team = $row["operator"];
                                        $shif = $row["shif"];
                                        // $jml_opt = $row["jml_opt"];
                                        $baku_awal = $row["bahan_baku_aw"];
                                        $baku_akir = $row["bahan_baku_ak"];
                                        $total_bahan = $row["bahan_baku_tot"];
                                        $diameter = $row["ukuran"];
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
                                            <td style="font-size:11px;"><?php echo $no; ?>.</td>
                                            <td style="font-size:11px;"><?php echo $tanggal; ?></td>
                                            <td style="font-size:11px;"><?php echo $team; ?></td>
                                            <td style="font-size:11px;"><?php echo $shif; //$gaji;
                                                                        ?></td>
                                            <!--<td style="font-size:11px;" ><?php echo $jml_opt; ?></td>-->
                                            <td style="font-size:11px;"><?php echo $baku_awal; ?></td>
                                            <td style="font-size:11px;"><?php echo $baku_akir; ?></td>
                                            <td style="font-size:11px;"><?php echo $total_bahan; ?></td>
                                            <td style="font-size:11px;"><?php echo $diameter; ?></td>
                                            <td style="font-size:11px;"><?php echo $baik_rol; ?></td>
                                            <td style="font-size:11px;"><?php echo $baik_berat; ?></td>
                                            <td style="font-size:11px;"><?php echo $sb_rol; ?></td>
                                            <td style="font-size:11px;"><?php echo $sb_berat; ?></td>
                                            <td style="font-size:11px;"><?php echo $total_rol; ?></td>
                                            <td style="font-size:11px;"><?php echo $total_berat; ?></td>
                                            <td style="font-size:11px;"><?php echo $aval_baik; ?></td>
                                            <td style="font-size:11px;"><?php echo $aval_ruwet; ?></td>
                                            <td style="font-size:11px;"><?php echo $total_pemakaian; ?></td>
                                            <td style="font-size:11px;"><?php echo $sisa_sesudah; ?></td>
                                            <td style="font-size:11px;"><?php echo $keterangan; ?></td>

                                        </tr>
                                    <?php
                                        $no++;
                                        //Total Per tanggal
                                        $baku_awalx = $baku_awalx + $baku_awal;
                                        $baku_akirx = $baku_akirx + $baku_akir;
                                        $total_bahanx = $total_bahanx + $total_bahan;
                                        $total_baik_rolx = $total_baik_rolx + $baik_rol;
                                        $total_baik_beratx = $total_baik_beratx + $baik_berat;
                                        $total_sb_rolx = $total_sb_rolx + $sb_rol;

                                        $total_sb_beratx = $total_sb_beratx + $sb_berat;
                                        $total_rolx = $total_rolx + $total_rol;
                                        $total_beratx = $total_beratx + $total_berat;
                                        $total_aval_baikx = $total_aval_baikx + $aval_baik;
                                        $total_aval_ruwetx = $total_aval_ruwetx + $aval_ruwet;
                                        $total_pemakaianx = $total_pemakaianx + $total_pemakaian;
                                        $total_sisax = $total_sisax + $sisa_sesudah;

                                        //Total Semua
                                        $baku_awals = $baku_awals + $baku_awal;
                                        $baku_akirs = $baku_akirs + $baku_akir;
                                        $total_bahans = $total_bahans + $total_bahan;
                                        $total_baik_rols = $total_baik_rols + $baik_rol;
                                        $total_baik_berats = $total_baik_berats + $baik_berat;
                                        $total_sb_rols = $total_sb_rols + $sb_rol;

                                        $total_sb_berats = $total_sb_berats + $sb_berat;
                                        $total_rols = $total_rols + $total_rol;
                                        $total_berats = $total_berats + $total_berat;
                                        $total_aval_baiks = $total_aval_baiks + $aval_baik;
                                        $total_aval_ruwets = $total_aval_ruwets + $aval_ruwet;
                                        $total_pemakaians = $total_pemakaians + $total_pemakaian;
                                        $total_sisas = $total_sisas + $sisa_sesudah;
                                    }
                                    if ($tim == "Semua Tim") {

                                        //$no=$nox;
                                    ?>
                                        <tr>
                                            <td style="font-size:12px;color:blue" colspan="4" class="tengah"><b><?php echo "Total " . $r_tanggal; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $baku_awalx; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $baku_akirx; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $total_bahanx; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo "-"; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $total_baik_rolx; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $total_baik_beratx; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $total_sb_rolx; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $total_sb_beratx; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $total_rolx; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $total_beratx; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $total_aval_baikx; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $total_aval_ruwetx; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $total_pemakaianx; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo $total_sisax; ?></b></td>
                                            <td style="font-size:12px;color:blue" class="tengah"><b><?php echo "-"; ?></b></td>
                                        </tr>
                                <?php }
                                    $nox++;
                                } ?>
                                <tr>
                                    <td style="font-size:12px;color:green" colspan="4" class="tengah"><b><?php echo "Total " . $_POST["txttgl_aw"] . " sampai " . $_POST["txttgl_ak"]; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo $baku_awals; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo $baku_akirs; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_bahans; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo "-"; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_baik_rols; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_baik_berats; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_sb_rols; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_sb_berats; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_rols; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_berats; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_aval_baiks; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_aval_ruwets; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_pemakaians; ?></b></td>
                                    <td style="font-size:12px;color:green" class="tengah"><b><?php echo $total_sisas; ?></b></td>
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