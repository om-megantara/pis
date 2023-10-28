<?php
include "application/config/database.php";
// $login = $_SESSION['namauser'];
//echo $login;
if (isset($_POST["btn_proses"])) {
    $bln = $_POST["txtbulan"];
    $thn = date("Y");
    if ($bln == "all") {
        $fbulan = "";
    } else {
        $fbulan = "AND tanggal like '%$thn-$bln-%'";
    }
    //echo $bag;				
    $thn = date("Y");
    //echo "kjhgfdsasdfghjklkjhgfxxchjkjhgfxckjhvcx";
} else {
    $bln = date("m");
    $thn = date("Y");
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
} elseif ($bln == "01") {
    $bln2 = "Desember";
} else {
    $bln2 = "Semua Bulan";
}
?>
<?php ?>
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
        <li class="active">Input Perijinan</li>
        <li class="active">Input Data Perijinan</li>
    </ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
    <!-- #section:settings.box -->
    <?php //include "container.php"; 
    ?>

    <!-- /section:settings.box -->
    <div class="page-header">
        <h1>
            Data Perijinan
        </h1>
    </div><!-- /.page-header -->
    <div class="page-content">
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <!--<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Galvanis
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="?p=home">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Galvanis
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <!--<form role="form" id="frm_galv" name="frm_galv">-->
                    <!-- ----------------------------------------------------Header------------------------------------------ -->
                    <div class="row">
                        <div class="col-lg-8">
                            <!--<h2>Data Produksi Galvanis</h2>
							<!--<div class="col-lg-6">
							<h4><a href="?p=input-galvanis"><i class="fa fa-pencil"></i> Masukkan Data Baru</button></a></h4>
						</div>-->
                            <div class="col-lg-4">
                                <label>Masukkan data Baru</label>
                                <a href="<?= base_url('csd/input_perijinan'); ?>" data-toggle="modal" class="btn btn-info">
                                    <i class="ace-icon fa fa-plus bigger-160"></i>Tambah Data Baru
                                </a>
                            </div>
                            <!--	-----------------------------------------------Awal/batas disable sementara
						<form id="frm_galv" name="frm_galv" action="?p=galvanis-tampil" method="POST">
							<div class="col-lg-3">
								<div class="form-group">
									<label>Bulan (Pilih Bagian)</label>
									<select class="form-control" name="txtbulan" id="txtbulan" required>
										<option value="<?php echo $bln; ?>"><?php echo $bln2; ?></option>
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
										<option value="<?php echo $thn; ?>"><?php echo $thn; ?></option>
									</select>
								</div>
							</div>
							<div class="col-lg-2">
								<label>Tekan proses</label>
								<button type="submit" class="btn btn-default" name="btn_proses" id="btn_proses">Proses</button>
							</div>
						</form>
--------------------------------------------------------akhir/batas disable sementara -->

                        </div>
                        <div class="row"></div>
                        <h2>&nbsp;</h2>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="data-table">
                                <thead>
                                    <tr>
                                        <th width="8%">
                                            <center>No.</center>
                                        </th>
                                        <th width="22%">
                                            <center>Nama Berkas</center>
                                        </th>
                                        <th width="15%">
                                            <center>Jenis Berkas</center>
                                        </th>
                                        <th width="25%">
                                            <center>Nama Lembaga</center>
                                        </th>
                                        <th width="10%">
                                            <center>Tgl. Terbit</center>
                                        </th>
                                        <th width="10%">
                                            <center>Masa Berlaku</center>
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
                                    $result = mysqli_query($link, "SELECT * FROM perijinan where status_delete='0' order by no_kd asc") or die(mysqli_error($link));
                                    //$baris=mysql_num_rows($result);
                                    while ($row = mysqli_fetch_array($result)) {
                                        //$baris=mysql_num_rows($result);
                                        $kd = $row["no_kd"];
                                        $nm_berkas = $row["nama_berkas"];
                                        $jns_berkas = $row["jenis_berkas"];
                                        $nm_lembaga = $row["Nama_lembaga"];
                                        $tgl_terbit = $row["tgl_terbit"];
                                        $masa_berlaku = $row["masa_berlaku"];
                                        $sts_berkas = $row["status_berkas"];
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
                                                <center><?php echo $nm_berkas; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $jns_berkas; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $nm_lembaga; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $tgl_terbit; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $sts_berkas; ?></center>
                                            </td>
                                            <!--<td><center><a href="?p=edit-galvanis"><i class="fa fa-edit"></i> Edit</a></center></td>-->
                                            <td>
                                                <center><a href="<?= base_url('csd/edit-perijinan/' . $kd); ?>"><i class="fa fa-edit"></i> Edit</a></center>
                                                <center><a href="<?= base_url('csd/hapus_perijinan/' . $kd); ?>"><i class="fa fa-remove"></i> Hapus</a></center>
                                            </td>

                                            <!-- <?php if ($login != "") { ?>
                                                    <center><a href="<?= base_url('admin/hapus_perijinan/' . $kd); ?>"><i class="fa fa-remove"></i> Hapus</a></center>
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

                    <!--</form>  -->

                </div>
                <!-- /#page-wrapper -->
            </div>
        </div>



        <script>
            function pengawas() {
                var timx = document.getElementById("frm_galv").tim.value;
                if (timx == "A") {
                    document.getElementById("nama_pengawas").value = 'Andik';
                } else if (timx == "B") {
                    document.getElementById("nama_pengawas").value = 'Komari';
                } else {
                    document.getElementById("nama_pengawas").value = 'Sari';

                }
            }

            function total_bahan() {
                var bahan_bawl = document.getElementById("frm_galv").bahan_baw.value;
                var bahan_bakh = document.getElementById("frm_galv").bahan_bak.value;

                document.getElementById("tot_bahanb").value = Number(bahan_bawl) + Number(bahan_bakh);

            }
        </script>