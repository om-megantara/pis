<?php
// $login=$_SESSION['namauser'];

if (isset($_POST["btn_proses"])) {
    $bln = $_POST["txtbulan"];
    $thn1 = $_POST["txtthn"];
    if ($bln == "all") {
        $fbulan = "AND tanggal like '%$thn1-%'";
    } else {
        $fbulan = "AND tanggal like '$thn1-$bln-%'";
    }
    //echo $bag;				
    $thn = date("Y");
    //echo "kjhgfdsasdfghjklkjhgfxxchjkjhgfxckjhvcx";
} else {
    $bln = date("m");
    $thn = date("Y");
    $thn1 = date("Y");
    $fbulan = "AND tanggal like '%$thn-$bln-%'";
}
if ($bln == "01") {
    $bln2 = "Januari";
} elseif ($bln == "02") {
    $bln2 = "Februari";
} elseif ($bln == "03") {
    $bln2 = "Maret";
} elseif ($bln == "04") {
    $bln2 = "April";
} elseif ($bln == "05") {
    $bln2 = "Mei";
} elseif ($bln == "06") {
    $bln2 = "Juni";
} elseif ($bln == "07") {
    $bln2 = "Juli";
} elseif ($bln == "08") {
    $bln2 = "Agustus";
} elseif ($bln == "09") {
    $bln2 = "September";
} elseif ($bln == "10") {
    $bln2 = "Oktober";
} elseif ($bln == "11") {
    $bln2 = "November";
} elseif ($bln == "12") {
    $bln2 = "Desember";
} else {
    $bln2 = "Semua Bulan";
}
?>
<!-- Page Heading -->
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try {
            ace.settings.check('breadcrumbs', 'fixed')
        } catch (e) {}
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="dash.php?hp=home">Home</a>
        </li>
        <li class="active">Input Hasil Produksi</li>
        <li class="active">Hasil WD PC</li>
    </ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
    <!-- #section:settings.box -->
    <?php //include "container.php"; 
    ?>

    <!-- /section:settings.box -->
    <div class="page-header">
        <h1>
            Hasil Produksi WD PC
        </h1>
    </div><!-- /.page-header -->
    <div class="page-content">
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <!--<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Kawat Duri
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="?p=home">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Kawat Duri
                            </li>
                        </ol>
                    </div>
                </div>-->
                <!-- /.row -->

                <div class="row">
                    <!--<form role="form" id="frm_wdpc" name="frm_wdpc">
					<!-- ----------------------------------------------------Header------------------------------------------ -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!--<h2>Data Produksi Kawat Duri</h2>-->
                            <!--<div class="col-lg-6">
							<h4><a href="?p=input-wdpc"><i class="fa fa-pencil"></i> Masukkan Data Baru</button></a></h4>
						</div>-->
                            <div class="col-lg-3">
                                <label>Masukkan data Baru</label>
                                <a href="<?= base_url('produksi/input-wdpc'); ?>" data-toggle="modal" class="btn btn-info">
                                    <i class="ace-icon fa fa-plus bigger-160"></i>Tambah Data Baru
                                </a>
                            </div>
                            <form id="frm_wdpc" name="frm_wdpc" action="<?= base_url('produksi/tampil-wdpc'); ?>" method="POST">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Bulan (Pilih Bagian)</label>
                                        <select class="form-control" name="txtbulan" id="txtbulan" required>
                                            <option value="<?php echo $bln; ?>">
                                                <selected><?php echo $bln2; ?></selected>
                                            </option>
                                            <option value="all">Semua Bulan</option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Tahun (Pilih Tahun)</label>
                                        <select class="form-control" name="txtthn" id="txtthn" required>
                                            <option value="<?php echo $thn1; ?>"><?php echo $thn1; ?></option>
                                            <?php for ($thn1 = $thn; 2017 <= $thn1; $thn1--) { ?>
                                                <option value="<?php echo $thn1; ?>"><?php echo $thn1; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label>Tekan proses</label>
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-default" name="btn_proses" id="btn_proses">Proses</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="row"></div>
                        <h2>&nbsp;</h2>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="data-table">
                                <thead>
                                    <tr>
                                        <th width="5%">
                                            <center>No.</center>
                                        </th>
                                        <th width="20%">
                                            <center>Tanggal</center>
                                        </th>
                                        <th width="20%">
                                            <center>Operator</center>
                                        </th>
                                        <th width="20%">
                                            <center>Pengawas</center>
                                        </th>
                                        <th width="15%">
                                            <center>Shif</center>
                                        </th>
                                        <th width="10%">
                                            <center>Diameter</center>
                                        </th>
                                        <th width="10%">
                                            <center>Aksi</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $totnet_gaji = 0;
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    include "application/config/database.php";
                                    $result = mysqli_query($link, "SELECT * FROM wdpc where status_del='0'" . $fbulan . " order by kd DESC") or die(mysqli_error($link));
                                    //$baris=mysql_num_rows($result);
                                    while ($row = mysqli_fetch_array($result)) {
                                        //$baris=mysql_num_rows($result);
                                        $kd = $row["kd"];
                                        $tanggal = $row["tanggal"];
                                        /*$team=$row["team"];
										if ($team=="A"){
											$pengawas="Andik";
										}elseif($team=="B"){
											$pengawas="Komari";
										}else{
												$pengawas="Sari";
										}*/
                                        $pengawas = $row["pengawas"];
                                        $operator = $row["operator"];
                                        $shif = $row["shif"];
                                        $diameter = $row["diameter"];

                                        if ($no % 2) {
                                            $wrn = "active";
                                        } else {
                                            $wrn = "success";
                                        }
                                    ?>
                                        <tr class="<?php echo $wrn; ?>">
                                            <td>
                                                <center><?php echo $no;
                                                        $kd; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $tanggal; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $operator; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $pengawas; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $shif; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $diameter; ?></center>
                                            </td>
                                            <td>
                                                <center><a href="<?= base_url('produksi/edit-wdpc/' . $kd); ?>"><i class="fa fa-edit"></i> Edit</a></center>
                                                <center><a href="<?= base_url('produksi/hapus_wdpc/' . $kd); ?>"><i class="fa fa-remove"></i> Hapus</a></center>
                                            </td>
                                            <!-- <?php if ($login = "") { ?>
                                                    <center><a href="?p=hapus-wdpc&kd=<?php echo $kd; ?>"><i class="fa fa-remove"></i> Hapus</a></center>
                                            </td>
                                        <?php } else {
                                                        echo "</td>";
                                                    } ?> -->
                                        </tr>
                                        <!--<tr class="<?php echo $genap; ?>">
                                        <td>/index.html</td>
                                        <td>1265</td>
                                        <td>32.3%</td>
                                        <td>$321.33</td>
										<td><a href=""><i class="fa fa-edit"></i> Edit</a></td>
                                    </tr>-->
                                    <?php
                                        $no++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--</form>    -->

                </div>
                <!-- /#page-wrapper -->
            </div>
        </div>