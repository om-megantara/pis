<?php
include "application/config/database.php";
?>
<?php if (isset($_POST["btn_proses"]) == "") { ?>
    <div class="col-lg-2">
    </div>
    <div class="col-lg-12">
        <h3>Tentukan Periode:</h3>
        <form method="POST" action="<?= base_url('chart/kd-tampil'); ?>">
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
                                    <!--<option><selected><?php echo $tim; ?></selected></option>-->
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

    <html>

    <body>
        <script src="<?= base_url('assets/'); ?>code/highcharts.js"></script>
        <script src="<?= base_url('assets/'); ?>code/modules/data.js"></script>
        <script src="<?= base_url('assets/'); ?>code/modules/exporting.js"></script>

        <div class="col-lg-12">
            <h3>Tentukan Periode:</h3>
            <?php
            $aw = $_POST["txttgl_aw"];
            $ak = $_POST["txttgl_ak"];
            $tim = $_POST["txtoperator"];
            ?>
            <form method="POST" action="<?= base_url('chart/kawat-duri'); ?>">
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
                                    <label>Operator (Pilih Operator)</label>
                                    <select class="form-control" name="txtoperator" id="txtoperator" required>
                                        <option><?php echo $tim; ?></option>
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
                            <div class="row"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div id="berat" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
            <div class="col-lg-4">
                <h4>Hasil Produksi Kawat Duri Baik dan Hold (Tim: <?php echo $tim; ?>)</h5>
                    <table id="tberat" class="table table-bordered table-hover table-striped" border="1">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Baik</th>
                                <th>Hold</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tgl_aw = date_format(date_create($_POST["txttgl_aw"]), "Y-m-d");
                            $tgl_ak = date_format(date_create($_POST["txttgl_ak"]), "Y-m-d");
                            // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                            //$tim=$_POST["tim"];
                            if ($tim == "-Semua Operator-") {
                                $syarat_tim = "";
                            } else {
                                $syarat_tim = "AND operator='$tim'";
                            }
                            if ($tim == "-Semua Operator-") {
                                //$sql2   = "SELECT tanggal,sum(hasil_baik_berat) as baik, sum(hasil_sb_berat) as sb from kawat_duri where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' group by tanggal";
                                header('location: nsm.php?p=chart-sum-kd&aw=' . $aw . '&ak=' . $ak . '&tim=' . $tim);
                            } else {
                                //$syarat_tim="";
                                $sql2 = "SELECT tanggal,hasil_baik_berat as baik,hasil_sb_berat as sb from kawat_duri where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak'" . $syarat_tim . " AND status_del='0' group by tanggal";
                                //$sql2   = "SELECT tanggal,hasil_baik_berat as baik,hasil_sb_berat as sb from kawat_duri where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' AND team='$tim' group by tanggal";
                            }
                            //include "koneksi.php";
                            //$sql2   = "SELECT tanggal,sum(hasil_baik_berat) as baik, sum(hasil_sb_berat) as sb from kawat_duri where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak'".$syarat_tim."group by tanggal";
                            $query2 = mysqli_query($link, $sql2)  or die(mysqli_error($link));
                            while ($ambil2 = mysqli_fetch_array($query2)) {
                                $tanggal2 = $ambil2['tanggal'];
                                $baik2 = $ambil2['baik'];
                                $sb2 = $ambil2['sb'];
                            ?>
                                <tr>
                                    <th><?php echo $tanggal2; ?></th>
                                    <td><?php echo $baik2; ?></td>
                                    <td><?php echo $sb2; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            </div>
        </div>
        <script type="text/javascript">
            Highcharts.chart('berat', {
                data: {
                    table: 'tberat'
                },
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Hasil Produksi Kawat Duri (Operator: <?php echo $tim; ?>)'
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'Units'
                    }
                },
                /*tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                            this.point.y + ' ' + this.point.name.toLowerCase();
                    }
                }*/
            });
        </script>
    </body>

    </html>
<?php } ?>