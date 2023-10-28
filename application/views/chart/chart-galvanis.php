<?php if (isset($_POST["btn_proses"]) == "") { ?>
    <div class="col-lg-2">
    </div>
    <div class="col-lg-12">
        <h3>Tentukan Periode:</h3>
        <form method="POST" action="<?= base_url('chart/galvanis-tampil'); ?>">
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

    <div class="col-lg-12">
        <h3>Tentukan Periode:</h3>
        <?php $aw = $_POST["txttgl_aw"];
        $ak = $_POST["txttgl_ak"];
        $tim = $_POST["tim"]; ?>
        <form method="POST" action="?p=chart-galvanis">
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
                                    <option><?php echo $tim ?></option>
                                    <option>Semua Tim</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
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
    <div class="row"></div>
    <div class="col-lg-8">
        <div id="berat" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
    <div class="col-lg-4">
        <h4>Hasil Produksi Galvanis Baik & Hold (Tim: <?php echo $tim; ?>)</h5>
            <table id="tberat" class="table table-bordered table-hover table-striped" border="1">
                <thead>
                    <tr>
                        <th width="30%">Tanggal</th>
                        <th width="30%">Baik</th>
                        <th width="30%">Hold</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tgl_aw = date_format(date_create($_POST["txttgl_aw"]), "Y-m-d");
                    $tgl_ak = date_format(date_create($_POST["txttgl_ak"]), "Y-m-d");
                    //$tim=$_POST["tim"];
                    if ($tim == "Semua Tim") {
                        $syarat_tim = "";
                    } else {
                        $syarat_tim = "AND team='$tim'";
                    }
                    if ($tim == "Semua Tim") {
                        //$sql2   = "SELECT tanggal,sum(hasil_baik_berat) as baik, sum(hasil_sb_berat) as sb from galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' group by tanggal";
                        // header('location: nsm.php?p=chart-sum-galvanis&aw=' . $aw . '&ak=' . $ak . '&tim=' . $tim);
                        header('location: ' . base_url('chart/galvanis-tampil') . '&aw=' . $aw . '&ak=' . $ak . '&tim=' . $tim);
                    } else {
                        //$syarat_tim="";
                        $sql2 = "SELECT tanggal,sum(hasil_baik_berat) as baik,sum(hasil_sb_berat) as sb from galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak'" . $syarat_tim . " AND status_del='0' group by tanggal";
                        //$sql2   = "SELECT tanggal,hasil_baik_berat as baik,hasil_sb_berat as sb from galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' AND team='$tim' group by tanggal";
                    }
                    include "application/config/database.php";
                    //$sql2   = "SELECT tanggal,sum(hasil_baik_berat) as baik, sum(hasil_sb_berat) as sb from galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak'".$syarat_tim."group by tanggal";
                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");

                    $query2 = mysqli_query($link, "SELECT tanggal,sum(hasil_baik_berat) as baik,sum(hasil_sb_berat) as sb from galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak'" . $syarat_tim . " AND status_del='0' group by tanggal")  or die(mysqli_error($link));
                    while ($ambil2 = mysqli_fetch_array($query2)) {
                        $tanggal2 = $ambil2['tanggal'];
                        $baik2 = $ambil2['baik'];
                        $sb2 = $ambil2['sb'];

                        $sumb = $sumb + $baik2;
                        $sumsb = $sumsb + $sb2;
                    ?>
                        <tr>
                            <th><?php echo $tanggal2; ?></th>
                            <td><?php echo $baik2; ?></td>
                            <td><?php echo $sb2; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <table class="table table-bordered table-hover table-striped" border="1">
                <tr>
                    <th width="30%"><b>Total</b></th>
                    <td width="30%"><b><?php echo $sumb; ?></b></td>
                    <td width="30%"><b><?php echo $sumsb; ?></b></td>
                </tr>
            </table>
    </div>

<?php } ?>