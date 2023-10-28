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
            <form method="POST" action="<?= base_url('rekap/bahan-bantu-wdpl'); ?>">
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
                                    <select class="form-control" id="tim" name="tim">
                                        <option>Semua Operator</option>
                                        <?php
                                        // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                        $opt = mysqli_query($link, "SELECT * FROM operator where bagian='wdpl' AND status_del='0'") or die(mysqli_error($link));
                                        while ($data = mysqli_fetch_array($opt)) {
                                            $kd = $data["kd_opt"];
                                            $nama = $data["nama_karyawan"];

                                            //echo $nama;
                                            echo "<option>$nama</option>";
                                        } ?>
                                        <!--<option>Agil</option>
								<option>Jafar</option>
								<option>Totok</option>
								<option>Suprapman</option>
								<option>Wawan</option>
								<option>Dian</option>
								<option>Firdaus</option>
								<option>Nur Solikin</option>
								<option>Anas</option>
								<option>Syahroni</option>
								<option>Fathoni</option>
								<option>Rudy</option>
								<option>Waluyo</option>
								<option>Saprudin</option>
								<option>Hamid</option>
								<option>M. Solikin</option>
								<option>Arif</option>-->
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
            <form method="POST" action="<?= base_url('rekap/bahan-bantu-wdpl'); ?>">
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
                                    <label>Operator (Pilih Pilih Opertor)</label>
                                    <select class="form-control" id="tim" name="tim">
                                        <option>
                                            <selected><?php echo $tim; ?></selected>
                                        </option>
                                        <option>Semua Operator</option>
                                        <?php
                                        // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                        $opt = mysqli_query($link, "SELECT * FROM operator where bagian='wdpl' AND status_del='0'") or die(mysqli_error($link));
                                        while ($data = mysqli_fetch_array($opt)) {
                                            $kd = $data["kd_opt"];
                                            $nama = $data["nama_karyawan"];

                                            //echo $nama;
                                            echo "<option>$nama</option>";
                                        } ?>
                                        <!--<option>Agil</option>
									<option>Jafar</option>
									<option>Totok</option>
									<option>Suprapman</option>
									<option>Wawan</option>
									<option>Dian</option>
									<option>Firdaus</option>
									<option>Nur Solikin</option>
									<option>Anas</option>
									<option>Syahroni</option>
									<option>Fathoni</option>
									<option>Rudy</option>
									<option>Waluyo</option>
									<option>Saprudin</option>
									<option>Hamid</option>
									<option>M. Solikin</option>
									<option>Arif</option>-->
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
                        <h2>Laporan Rekapitulasi Pemakaian Bahan Pembantu WD PL: <?php echo $_POST["txttgl_aw"] . " sampai " . $_POST["txttgl_ak"]; ?></h2>

                        <div class="row">
                            <table class="tables table-hover" border="1" rules="all">
                                <thead>
                                    <?php //echo $r_diameter."|".$tanggal;
                                    ?>
                                    <tr class="tengah">
                                        <!--<th style="font-size:10px;" rowspan="2" width="5%" class="tengah">No.</th>-->
                                        <th style="font-size:10px;" rowspan="1" width="10%" class="tengah">Tanggal</th>
                                        <th style="font-size:10px;" rowspan="1" width="10%" class="tengah">Operator</th>
                                        <th style="font-size:10px;" colspan="1" width="10%" class="tengah">Lubricant</th>
                                        <th style="font-size:10px;" colspan="1" width="10%" class="tengah">Sabun</th>

                                    </tr>

                                </thead>

                                <?php
                                $no1 = 0;
                                $tgl_aw = date_format(date_create($_POST["txttgl_aw"]), "Y-m-d");
                                $tgl_ak = date_format(date_create($_POST["txttgl_ak"]), "Y-m-d");
                                if ($tim == "Semua Operator") {
                                    $syarat_tim = "";
                                } else {
                                    $syarat_tim = "AND operator='$tim'";
                                }
                                $lubrix = 0;
                                $sabunx = 0;

                                // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                $r_tgl1 = mysqli_query($link, "SELECT * FROM wdpl where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak'" . $syarat_tim . " AND status_del='0' group by tanggal order by tanggal asc") or die(mysqli_error($link));
                                while ($r_tgl2 = mysqli_fetch_array($r_tgl1)) {
                                    $tanggal2 = date_format(date_create($r_tgl2["tanggal"]), "Y-m-d");
                                    //echo $tanggal2."<br>";

                                    //$r_tgl=mysqli_query($link, "SELECT * FROM wdpc where tanggal='$tanggal1' group by diameter order by tanggal") or die(mysqli_error($link));
                                    $r_tgl = mysqli_query($link, "SELECT * FROM wdpl where tanggal like '$tanggal2'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal,diameter desc") or die(mysqli_error($link));

                                    while ($row = mysqli_fetch_array($r_tgl)) {

                                        $r_diameter = $row["diameter"];
                                        $tanggal = $row["tanggal"];
                                        $baik_roll = mysqli_fetch_array(mysqli_query($link, "SELECT sum(bahan_bantu1) as 'Bban_hcl' FROM wdpl where tanggal like '$tanggal2' and diameter='$r_diameter'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                        $lubri = $baik_roll['Bban_hcl'];
                                        $baik_kg = mysqli_fetch_array(mysqli_query($link, "SELECT sum(bahan_bantu2) as 'Bban_nh4cl' FROM wdpl where tanggal like '$tanggal2' and diameter='$r_diameter'" . $syarat_tim . " AND status_del='0' group by diameter order by tanggal"));
                                        $sabun = $baik_kg['Bban_nh4cl'];


                                        $operator = $row["operator"];



                                ?>


                                        <tbody>
                                            <tr class="tengah">
                                                <td style="font-size:11px;"><?php echo $tanggal; ?></td>
                                                <td style="font-size:11px;"><?php echo $operator; ?></td>
                                                <td style="font-size:11px;"><?php echo $lubri; ?></td>
                                                <td style="font-size:11px;"><?php echo $sabun; ?></td>

                                            </tr>
                                            <div class="row">
                                        <?php
                                        $no = 0;
                                        $no = $no + 1;

                                        $lubrix = $lubrix + $lubri;
                                        $sabunx = $sabunx + $sabun;
                                    }
                                    $no1 = $no1 + 1;
                                }

                                        ?>
                                        <tr class="tengah">
                                            <td style="font-size:12px;color:blue" colspan="2"><b>Total<br><?php echo $tgl_aw . " sampai " . $tgl_ak; ?></b></td>
                                            <td style="font-size:12px;color:blue"><b><?php echo number_format($lubrix, 2, '.', ','); ?></b></td>
                                            <td style="font-size:12px;color:blue"><b><?php echo number_format($sabunx, 2, '.', ','); ?></b></td>


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