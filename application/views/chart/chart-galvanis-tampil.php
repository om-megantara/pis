<?php //if (isset($_POST["btn_proses"])=="") {
?>

<?php
include "application/config/database.php";
?>
<div class="col-lg-2">
</div>
<div class="col-lg-12">
    <h3>Tentukan Periode:</h3>
    <?php $aw = $_POST["txttgl_aw"];
    $ak = $_POST["txttgl_ak"];
    $tim = $_POST["tim"]; ?>
    <form method="POST" action="<?= base_url('chart/galvanis-tampil'); ?>">
        <div class="row"></div>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Tanggal Awal</label>
                            <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                <input class="form-control date-picker" name="txttgl_aw" id="txttgl_aw" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Mulai" value="<?php echo $aw ?>" />
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                <input class="form-control date-picker" name="txttgl_ak" id="txttgl_ak" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Akhir" value="<?php echo $ak ?>" />
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Team (Pilih Team)</label>
                            <select class="form-control" id="tim" name="tim">
                                <option><?php echo $tim; ?></option>
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
<?php //}else{
?>

<div class="col-lg-8">
    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>

<div class="col-lg-4">
    <h5>Hasil Produksi Galvanis Baik</h5>
    <table id="datatable_galv_baik" border="1" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th width="25%">Tanggal</th>
                <th width="25%">Tim A</th>
                <th width="25%">Tim B</th>
                <th width="25%">Tim C</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $suma = 0;
            $sumb = 0;
            $sumc = 0;

            $tgl_aw = date_format(date_create($aw), "Y-m-d");
            $tgl_ak = date_format(date_create($ak), "Y-m-d");
            $sql   = "SELECT tanggal from galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' AND status_del='0' group by tanggal";
            //$suma   = mysqli_query($link, "SELECT sum(hasil_baik_berat) as 'ja' where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' AND team='A'  AND status_del='0' group by tanggal"); 
            // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
            $query = mysqli_query($link, "SELECT tanggal from galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' AND status_del='0' group by tanggal")  or die(mysqli_error($link));
            while ($ambil = mysqli_fetch_array($query)) {
                $tanggal = $ambil['tanggal'];
                $teama = mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_baik_berat) as baik from galvanis where tanggal='$tanggal' AND team='A'  AND status_del='0'")); //group by tanggal"));
                $teamb = mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_baik_berat) as baik from galvanis where tanggal='$tanggal' AND team='B'  AND status_del='0'")); //group by tanggal"));
                $teamc = mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_baik_berat) as baik from galvanis where tanggal='$tanggal' AND team='C'  AND status_del='0'")); //group by tanggal"));



                $teama = $teama['baik'];
                $teamb = $teamb['baik'];
                $teamc = $teamc['baik'];

                //$suma=$teama;
                $suma = $suma + $teama;
                //$sumb=$teamc;
                $sumb = $sumb + $teamb;
                //$sumc=$teamc;
                $sumc = $sumc + $teamc;
            ?>
                <tr>
                    <th><?php echo date_format(date_create($tanggal), "d-m-Y"); ?></th>
                    <td><?php echo $teama; ?></td>
                    <td><?php echo $teamb; ?></td>
                    <td><?php echo $teamc; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <table border="1" class="table table-bordered table-hover table-striped">
        <tr>
            <th width="25%"><b>Total Baik</b></th>
            <td width="25%"><b><?php echo $suma; ?></b></td>
            <td width="25%"><b><?php echo $sumb; ?></b></td>
            <td width="25%"><b><?php echo $sumc; ?></b></td>
        </tr>
    </table>
</div>

<div class="row"></div>

<div class="col-lg-8">
    <div id="container_sb" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>

<div class="col-lg-4">
    <h4>Hasil Produksi Galvanis Hold</h5>
        <table id="datatable_galv_sb" border="1" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th width="25%">Tanggal</th>
                    <th width="25%">Tim A</th>
                    <th width="25%">Tim B</th>
                    <th width="25%">Tim C</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $suma2 = 0;
                $sumb2 = 0;
                $sumc2 = 0;

                // $link = mysqli_connect("localhost:3307", "root", "", "produksi");

                $tgl_aw = date_format(date_create($aw), "Y-m-d");
                $tgl_ak = date_format(date_create($ak), "Y-m-d");
                $sql   = "SELECT tanggal from galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' group by tanggal";
                $query = mysqli_query($link, "SELECT tanggal from galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' group by tanggal")  or die(mysqli_error($link));
                while ($ambil = mysqli_fetch_array($query)) {
                    $tanggal = $ambil['tanggal'];
                    $teama = mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_sb_berat) as baik from galvanis where tanggal='$tanggal' AND team='A' AND status_del='0'")); //group by tanggal"));
                    $teamb = mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_sb_berat) as baik from galvanis where tanggal='$tanggal' AND team='B' AND status_del='0'")); //group by tanggal"));
                    $teamc = mysqli_fetch_array(mysqli_query($link, "SELECT sum(hasil_sb_berat) as baik from galvanis where tanggal='$tanggal' AND team='C' AND status_del='0'")); //group by tanggal"));

                    $teama2 = $teama['baik'];
                    $teamb2 = $teamb['baik'];
                    $teamc2 = $teamc['baik'];

                    //$suma2=$teama2;
                    $suma2 = $suma2 + $teama2;
                    //$sumb2=$teamb2;
                    $sumb2 = $sumb2 + $teamb2;
                    //$sumc2=$teamc2;
                    $sumc2 = $sumc2 + $teamc2;
                ?>
                    <tr>
                        <th><?php echo date_format(date_create($tanggal), "d-m-Y"); ?></th>
                        <td><?php echo $teama2; ?></td>
                        <td><?php echo $teamb2; ?></td>
                        <td><?php echo $teamc2; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <table border="1" class="table table-bordered table-hover table-striped">
            <tr>
                <th width="25%"><b>Total Hold</b></th>
                <td width="25%"><b><?php echo $suma2; ?></b></td>
                <td width="25%"><b><?php echo $sumb2; ?></b></td>
                <td width="25%"><b><?php echo $sumc2; ?></b></td>
            </tr>
            <table>
                <br> Prosentase Hold (Per Tim)
                <table border="1" class="table table-bordered table-hover table-striped">
                    <tr>
                        <th width="25%"><b>Prosentase Hold</b></th>
                        <?php
                        // $gpa = ($suma2 / ($suma + $suma2)) * 100;
                        // $gpb = ($sumb2 / ($sumb + $sumb2)) * 100;
                        // $gpc = ($sumc2 / ($sumc + $sumc2)) * 100;

                        $gpa = 0;
                        $gpb = 0;
                        $gpc = 0;


                        ?>
                        <td width="25%"><b><?php echo number_format($gpa, 2, '.', ',') . " %"; ?></b></td>
                        <td width="25%"><b><?php echo number_format($gpb, 2, '.', ',') . " %"; ?></b></td>
                        <td width="25%"><b><?php echo number_format($gpc, 2, '.', ',') . " %"; ?></b></td>
                    </tr>
                    <table>
                        <br> Total
                        <table border="1" class="table table-bordered table-hover table-striped">
                            <tr>
                                <td> Keterangan</td>
                                <td>Total Baik</td>
                                <td>Total Hold</td>
                                <td>Rasio Baik</td>
                                <td>Rasio Hold</td>
                            </tr>
                            <tr>
                                <th width="25%"><b>Total</b></th>
                                <?php
                                $total_b = $suma + $sumb + $sumc;
                                $total_sb = $suma2 + $sumb2 + $sumc2;
                                // $ras_b = ($total_b / ($total_b + $total_sb)) * 100;
                                // $ras_sb = ($total_sb / ($total_b + $total_sb)) * 100;

                                $ras_b = 0;
                                $ras_sb = 0;

                                ?>
                                <td width="25%"><b><?php echo number_format($total_b, 2, '.', ','); ?></b></td>
                                <td width="25%"><b><?php echo number_format($total_sb, 2, '.', ','); ?></b></td>
                                <td width="25%"><b><?php echo number_format($ras_b, 2, '.', ',') . " %"; ?></b></td>
                                <td width="25%"><b><?php echo number_format($ras_sb, 2, '.', ',') . " %"; ?></b></td>
                            </tr>
                            <table>
</div>
</div>
<div class="col-lg-8">
    <!--<b><br>Total SB Team A : <?php echo $suma; ?>
<br>Total SB Team B : <?php echo $sumb; ?>
<br>Total SB Team C : <?php echo $sumc; ?></b>-->
    <br>
</div>


<?php //} 
?>