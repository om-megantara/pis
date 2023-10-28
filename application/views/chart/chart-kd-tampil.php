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
    $tim = $_POST["txtoperator"]; ?>
    <form method="POST" action="<?= base_url('chart/kd-tampil'); ?>">
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
									<option>Muchammad Fajar</option>
									<option>A. Saroni</option>-->
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

<div class="col-lg-12">
    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>
<div class="row"></div>
<div class="col-lg-12">
    <h5>Hasil Produksi Kawat Duri</h5>
    <table id="datatable_baik" border="1" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>Tanggal</th>
                <?php
                // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                $opt = mysqli_query($link, "SELECT * FROM operator where bagian='kadu' AND status_del='0'") or die(mysqli_error($link));
                while ($data = mysqli_fetch_array($opt)) {
                    $kd = $data["kd_opt"];
                    $nama = $data["nama_karyawan"];
                    echo "<th>$nama</th>";
                } ?>
                <!--<th>Aon</th>
			<th>Isa Sebastian</th>
			<th>Suhartanto</th>
			<th>Vicky S.</th>
			<th>Ardian Kris</th>
			<th>Hadi</th>
			<th>Novian Khoiril Amin</th>
			<th>Muchammad Fajar</th>
			<th>A. Saroni</th>-->
            </tr>
        </thead>
        <tbody>
            <?php
            // $link = mysqli_connect("localhost:3307", "root", "", "produksi");

            $tgl_aw = date_format(date_create($aw), "Y-m-d");
            $tgl_ak = date_format(date_create($ak), "Y-m-d");
            $sql   = "SELECT tanggal from kawat_duri where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' AND status_del='0' group by tanggal";
            $query = mysqli_query($link,  $sql)  or die(mysqli_error($link));
            while ($ambil = mysqli_fetch_array($query)) {
                $tanggal = $ambil['tanggal'];
                $num = 0;
                $opt = mysqli_query($link, "SELECT * FROM operator where bagian='kadu' AND status_del='0'") or die(mysqli_error($link));
                while ($data = mysqli_fetch_array($opt)) {
                    $kd = $data["kd_opt"];
                    $nama = $data["nama_karyawan"];

                    $hsl = mysqli_query($link, "SELECT hasil_baik_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='$nama'  AND status_del='0' group by tanggal");
                    while ($nilai = mysqli_fetch_array($hsl)) {
                        $num = $nilai['baik'];
                        //echo $t[$num];
                    }
                }
                /*$teama1 = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_baik_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='Aon'  AND status_del='0' group by tanggal"));
		$teama1=$teama1['baik'];
		
		$teamc1 = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_baik_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='Isa Sebastian'  AND status_del='0' group by tanggal"));
		
		$teama2 = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_baik_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='Suhartanto'  AND status_del='0' group by tanggal"));
		$teamb2 = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_baik_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='Vicky S.'  AND status_del='0' group by tanggal"));
		$teamc2 = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_baik_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='Ardian Kris'  AND status_del='0' group by tanggal"));
		
		$teama3 = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_baik_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='Hadi'  AND status_del='0' group by tanggal"));
		$teamb3 = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_baik_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='Novian Khoiril Amin'  AND status_del='0' group by tanggal"));
		$teamc3 = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_baik_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='Muchammad Fajar'  AND status_del='0' group by tanggal"));
		
		$teama4 = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_baik_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='A. Saroni'  AND status_del='0' group by tanggal"));
		
		
		//$teama=$teama['baik'];
		//$teamb=$teamb['baik'];
		//$teamc=$teamc['baik'];
		//$teamb1=$teamb1['baik'];
		$teamc1=$teamc1['baik'];
		$teama2=$teama2['baik'];
		$teamb2=$teamb2['baik'];
		$teamc2=$teamc2['baik'];
		$teama3=$teama3['baik'];
		$teamb3=$teamb3['baik'];
		$teamc3=$teamc3['baik'];
		$teama4=$teama4['baik'];*/
            ?>
                <tr>
                    <th><?php echo date_format(date_create($tanggal), "d-m-Y"); ?></th>
                    <?php 
                    
                    $t = 0;
                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                    $opt = mysqli_query($link, "SELECT * FROM operator where bagian='kadu' AND status_del='0'") or die(mysqli_error($link));
                    while ($data = mysqli_fetch_array($opt)) {
                        $kd = $data["kd_opt"];
                        $nama = $data["nama_karyawan"];

                        $a = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_baik_berat from kawat_duri where tanggal='$tanggal' AND operator='$nama'  AND status_del='0' group by tanggal"));
                        $t = $a['hasil_baik_berat'];
                        //echo $t[$num];
                        echo "<td>$t</td>";
                    } ?>

                    <!-- <td><?php echo $teamc1; ?></td>
			<td><?php echo $teama2; ?></td>
            <td><?php echo $teamb2; ?></td>
			<td><?php echo $teamc2; ?></td>
			<td><?php echo $teama3; ?></td>
            <td><?php echo $teamb3; ?></td>
			<td><?php echo $teamc3; ?></td>
			<td><?php echo $teama4; ?></td> -->
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div class="row"></div>

<!--<div class="col-lg-8">
	<div id="container_sb" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>
<div class="col-lg-4">
<h4>Hasil Produksi Kawat Duri</h5>
<table id="datatable_sb" border="1" class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>Tanggal</th>
           <!-- <th>M. Budi</th>
			<th>Sigit Eko</th>
			<th>Agung Tri</th>
			<th>Novanto</th>-->
<!--<th>Aon</th>
			<th>Isa Sebastian</th>
			<th>Suhartanto</th>
			<th>Vicky S.</th>
			<th>Ardian Kris</th>
			<th>Hadi</th>
			<th>Novian Khoiril Amin</th>
			<th>Muchammad Fajar</th>
			<th>A. Saroni</th>
        </tr>
    </thead>
    <tbody>
    <?php
    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");

    $tgl_aw = date_format(date_create($aw), "Y-m-d");
    $tgl_ak = date_format(date_create($ak), "Y-m-d");
    $sql   = "SELECT tanggal from kawat_duri where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' group by tanggal";
    $query = mysqli_query($link,  $sql)  or die(mysqli_error($link));
    while ($ambil = mysqli_fetch_array($query)) {
        $tanggal = $ambil['tanggal'];
        //$teama = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_sb_berat as baik from kawat_duri where tanggal='$tanggal' AND team='A' AND status_del='0'  group by tanggal"));
        //$teamb = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_sb_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='Sigit Eko'  AND status_del='0' group by tanggal"));
        //$teamc = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_sb_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='Agung Tri'  AND status_del='0' group by tanggal"));

        $teama1 = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_sb_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='Aon'  AND status_del='0' group by tanggal"));
        //$teamb1 = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_sb_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='Novanto'  AND status_del='0' group by tanggal"));
        $teamc1 = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_sb_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='Isa Sebastian'  AND status_del='0' group by tanggal"));

        $teama2 = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_sb_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='Suhartanto'  AND status_del='0' group by tanggal"));
        $teamb2 = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_sb_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='Vicky S.'  AND status_del='0' group by tanggal"));
        $teamc2 = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_sb_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='Ardian Kris'  AND status_del='0' group by tanggal"));

        $teama3 = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_sb_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='Hadi'  AND status_del='0' group by tanggal"));
        $teamb3 = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_sb_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='Novian Khoiril Amin'  AND status_del='0' group by tanggal"));
        $teamc3 = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_sb_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='Muchammad Fajar'  AND status_del='0' group by tanggal"));

        $teama4 = mysqli_fetch_array(mysqli_query($link, "SELECT hasil_sb_berat as baik from kawat_duri where tanggal='$tanggal' AND operator='A. Saroni'  AND status_del='0' group by tanggal"));


        $teama1 = $teama1['baik'];
        $teamc1 = $teamc1['baik'];
        $teama2 = $teama2['baik'];
        $teamb2 = $teamb2['baik'];
        $teamc2 = $teamc2['baik'];
        $teama3 = $teama3['baik'];
        $teamb3 = $teamb3['baik'];
        $teamc3 = $teamc3['baik'];
        $teama4 = $teama4['baik'];
    ?>
        <tr>
            <th><?php echo date_format(date_create($tanggal), "d-m-Y"); ?></th>
            
			<td><?php echo $teama1; ?></td>
            <td><?php echo $teamc1; ?></td>
			<td><?php echo $teama2; ?></td>
            <td><?php echo $teamb2; ?></td>
			<td><?php echo $teamc2; ?></td>
			<td><?php echo $teama3; ?></td>
            <td><?php echo $teamb3; ?></td>
			<td><?php echo $teamc3; ?></td>
			<td><?php echo $teama4; ?></td>
        </tr>
    <?php } ?>    
    </tbody>
</table>
</div>-->


<?php //} 
?>