
<?php
include "application/config/database.php";
?>
<div class="page-content">
    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Input Data Galvanis
                    </h1>
                    <ol class="breadcrumb">
                        <!--<li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Forms
                            </li>-->
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <form id="frm_galv" name="frm_galv" action="<?= base_url('produksi/simpan_galvanis'); ?>" method="POST" onSubmit="return cek();">
                    <!-- ----------------------------------------------------Header------------------------------------------ -->
                    <div class="col-lg-8">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>No. Order Kerja</label>
                                <input class="form-control" name="txtno_orker" id="txtno_orker" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Warna Rafia (Pilih Warna)</label>
                                <!-- <select class="form-control" onchange="pengawas()" id="tim" name="tim"> -->
                                <select class="form-control" onchange="" id="tim" name="tim">
                                    <option>-Pilih Tim-</option>
                                    <option>Biru</option>
                                    <option>Merah</option>
                                    <option>Kuning</option>
                                    <!--<option>4</option>
								<option>5</option>-->
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Nama Pengawas</label>
                                <!-- <input class="form-control" id="nama_pengawas" name="nama_pengawas" disabled=""> -->
                                <select class="form-control" onchange="" id="nama_pengawas" name="nama_pengawas">
                                    <option>-Pilih Tim-</option>
                                    <option>Andik</option>
                                    <option>Komari</option>
                                    <option>Sari</option>
                                </select>
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>
                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Shif (Pilih Shif)</label>
                            <select class="form-control" name="shif" id="shif">
                                <option>-Pilih Shif-</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <!--<option>4</option>
								<option>5</option>-->
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Tanggal Produksi</label>
                            <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                <!--<input class="form-control" type="text" name="txttgl" readonly="readonly">-->
                                <input class="form-control date-picker" readonly="readonly" name="txttgl" id="txttgl" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Produksi" />
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                    </div>


                    <div class="row"></div>

                    <!-- ----------------------------------------------------kolom ke-1------------------------------------------ -->
                    <div class="row"></div>
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
                        <div class="form-group">
                            <label>Diameter</label>
                            <input class="form-control" name="txtdiameter" id="txtdiameter" placeholder="Diameter Hasil">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Jumlah Operator</label>
                            <input class="form-control" name="txtjml_opt" id="txtjml_opt" placeholder="Jumlah Operator yang mengerjakan">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Jumlah Jam Kerja</label>
                            <input class="form-control" name="txtjml_jam" id="txtjml_jam" placeholder="Lama mengerjakan per diameter">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Bahan Baku Awal</label>
                            <input class="form-control" id="bahan_baw" name="bahan_baw" onchange="totalx()">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Bahan Baku Masuk</label>
                            <input class="form-control" id="bahan_bak" name="bahan_bak" onchange="totalx()">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <!--<div class="row"></div>-->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Total Bahan Baku</label>
                            <input class="form-control" id="tot_bahanb" name="tot_bahanb" disabled="">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>


                    <!-- ----------------------------------------------------kolom ke-2------------------------------------------ -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Hasil Baik Roll</label>
                            <input class="form-control" name="txthasilbaik_rol" id="txthasilbaik_rol" onchange="totalx()">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <!--<div class="col-lg-4">
						<div class="form-group">
							<label>Hasil SB Roll</label>
							<input class="form-control" name="txthasilsb_rol" id="txthasilsb_rol" onchange="totalx()">
							
						</div>
					</div>-->
                    <!--<div class="col-lg-4">
						<div class="form-group">
							<label>Total Roll</label>
							<input class="form-control" name="total_roll" id="total_roll" disabled="">
							
						</div>
					</div>-->
                    <!--<div class="row"></div>-->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Hasil Baik Berat</label>
                            <input class="form-control" name="txthasilbaik_berat" id="txthasilbaik_berat" onchange="totalx()">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <!--<div class="col-lg-4">
						<div class="form-group">
							<label>Hasil SB Berat</label>
							<input class="form-control" name="txthasilsb_berat" id="txthasilsb_berat" onchange="totalx()">
							
						</div>
                    </div>-->
                    <!--<div class="col-lg-4">
						<div class="form-group">
							<label>Total Berat</label>
							<input class="form-control" name="total_berat" id="total_berat" disabled="">
							
						</div>
					</div>-->
                    <div class="row"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Aval Coil</label>
                            <input class="form-control" name="txtaval_baik" id="txtaval_baik" onchange="totalx()">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Aval Ruwet</label>
                            <input class="form-control" name="txtaval_ruwet" id="txtaval_ruwet" onchange="totalx()">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Total Aval</label>
                            <input class="form-control" name="txttotal_aval" id="txttotal_aval" disabled="">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Total Pemakaian</label>
                            <input class="form-control" name="txttotal_pakai" id="txttotal_pakai" disabled="">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Sisa Sesudah</label>
                            <input class="form-control" name="txtsisa_sesudah" id="txtsisa_sesudah" disabled="">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input class="form-control" name="txtketerangan" id="txtketerangan">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>

                    <div class="row"></div>
                    <label>
                        <h3>Bahan Pembantu</h3>
                    </label>
                    <div class="row"></div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Hcl</label>
                            <input class="form-control" name="txthcl" id="txthcl">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Nh4cl</label>
                            <input class="form-control" name="txtnh4cl" id="txtnh4cl">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Zncl2</label>
                            <input class="form-control" name="txtzncl2" id="txtzncl2">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>

                    <div class="row"></div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Al</label>
                            <input class="form-control" name="txtal" id="txtal">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Znal</label>
                            <input class="form-control" name="txtznal" id="txtznal">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Abu Timah</label>
                            <input class="form-control" name="txtabu_timah" id="txtabu_timah">
                            <!--<p class="help-block">Example block-level help text here.</p>-->
                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Kode Zn</label>
                            <select class="form-control" onchange="cek_kd()" id="txt_kdzn" name="txt_kdzn">
                                <option value='' selected>- Pilih -</option>

                                <?php
                                // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                $pegawai = mysqli_query($link, "SELECT * FROM gdg_zn");
                                while ($row = mysqli_fetch_array($pegawai)) {
                                    echo "<option value='$row[no_kode]'>$row[no_kode]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Berat Zn-1</label>
                            <input class="form-control" name="txtzn" id="txtzn">

                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Lead Ingot Cetak</label>
                            <input class="form-control" name="txtli_cetak" id="txtli_cetak">

                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>ZN Cetakan</label>
                            <input class="form-control" name="txtzn_cetak" id="txtzn_cetak">

                        </div>
                    </div>
                    <!--<div class="col-lg-2">
						<div class="form-group">
							<label>Kode Zn-2</label>
								<select class="form-control" onchange="cek_kd2()" id="txt_kdzn2" name="txt_kdzn2">
									<option value='' selected>- Pilih -</option>
									
                                    <?php
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $pegawai = mysqli_query($link, "SELECT * FROM gdg_zn");
                                    while ($row = mysqli_fetch_array($pegawai)) {
                                        echo "<option value='$row[no_kode]'>$row[no_kode]</option>";
                                    }
                                    ?>
								</select>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<label>Berat Zn-2</label>
							<input class="form-control" name="txtzn2" id="txtzn2">
							
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<label>Kode Zn-3</label>
								<select class="form-control" onchange="cek_kd3()" id="txt_kdzn3" name="txt_kdzn3">
									<option value='' selected>- Pilih -</option>
									
                                    <?php
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $pegawai = mysqli_query($link, "SELECT * FROM gdg_zn");
                                    while ($row = mysqli_fetch_array($pegawai)) {
                                        echo "<option value='$row[no_kode]'>$row[no_kode]</option>";
                                    }
                                    ?>
								</select>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<label>Berat Zn-3</label>
							<input class="form-control" name="txtzn3" id="txtzn3">
							
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<label>Kode Zn-4</label>
								<select class="form-control" onchange="cek_kd4()" id="txt_kdzn4" name="txt_kdzn4">
									<option value='' selected>- Pilih -</option>
									
                                    <?php
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $pegawai = mysqli_query($link, "SELECT * FROM gdg_zn");
                                    while ($row = mysqli_fetch_array($pegawai)) {
                                        echo "<option value='$row[no_kode]'>$row[no_kode]</option>";
                                    }
                                    ?>
								</select>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<label>Berat Zn-4</label>
							<input class="form-control" name="txtzn4" id="txtzn4">
							
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<label>Kode Zn-5</label>
								<select class="form-control" onchange="cek_kd5()" id="txt_kdzn5" name="txt_kdzn5">
									<option value='' selected>- Pilih -</option>
									
                                    <?php
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $pegawai = mysqli_query($link, "SELECT * FROM gdg_zn");
                                    while ($row = mysqli_fetch_array($pegawai)) {
                                        echo "<option value='$row[no_kode]'>$row[no_kode]</option>";
                                    }
                                    ?>
								</select>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<label>Berat Zn-5</label>
							<input class="form-control" name="txtzn5" id="txtzn5">
							
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<label>Kode Zn-6</label>
								<select class="form-control" onchange="cek_kd6()" id="txt_kdzn6" name="txt_kdzn6">
									<option value='' selected>- Pilih -</option>
									
                                    <?php
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $pegawai = mysqli_query($link, "SELECT * FROM gdg_zn");
                                    while ($row = mysqli_fetch_array($pegawai)) {
                                        echo "<option value='$row[no_kode]'>$row[no_kode]</option>";
                                    }
                                    ?>
								</select>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<label>Berat Zn-6</label>
							<input class="form-control" name="txtzn6" id="txtzn6">
							
						</div>
					</div>-->

                    <div class="row"></div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Kode Pb-1</label>
                            <select class="form-control" onchange="cek_kdpb()" id="txt_kdpb" name="txt_kdpb">
                                <option value='' selected>- Pilih -</option>

                                <?php
                                // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                $pegawai = mysqli_query($link, "SELECT * FROM gdg_pb");
                                while ($row = mysqli_fetch_array($pegawai)) {
                                    echo "<option value='$row[no_kode]'>$row[no_kode]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Berat PB-1</label>
                            <input class="form-control" name="txtpb" id="txtpb">

                        </div>
                    </div>
                    <!--<div class="col-lg-2">
						<div class="form-group">
							<label>Kode Pb-2</label>
								<select class="form-control" onchange="cek_kdpb2()" id="txt_kdpb2" name="txt_kdpb2">
									<option value='' selected>- Pilih -</option>
									
                                    <?php
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $pegawai = mysqli_query($link, "SELECT * FROM gdg_pb");
                                    while ($row = mysqli_fetch_array($pegawai)) {
                                        echo "<option value='$row[no_kode]'>$row[no_kode]</option>";
                                    }
                                    ?>
								</select>
						</div>
					</div>
					
					<div class="col-lg-2">
						<div class="form-group">
							<label>Berat PB-2</label>
							<input class="form-control" name="txtpb2" id="txtpb2">
							
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<label>Kode Pb-3</label>
								<select class="form-control" onchange="cek_kdpb3()" id="txt_kdpb3" name="txt_kdpb3">
									<option value='' selected>- Pilih -</option>
									
                                    <?php
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $pegawai = mysqli_query($link, "SELECT * FROM gdg_pb");
                                    while ($row = mysqli_fetch_array($pegawai)) {
                                        echo "<option value='$row[no_kode]'>$row[no_kode]</option>";
                                    }
                                    ?>
								</select>
						</div>
					</div>
					
					<div class="col-lg-2">
						<div class="form-group">
							<label>Berat PB-3</label>
							<input class="form-control" name="txtpb3" id="txtpb3">
							
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<label>Kode Pb-4</label>
								<select class="form-control" onchange="cek_kdpb4()" id="txt_kdpb4" name="txt_kdpb4">
									<option value='' selected>- Pilih -</option>
									
                                    <?php
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $pegawai = mysqli_query($link, "SELECT * FROM gdg_pb");
                                    while ($row = mysqli_fetch_array($pegawai)) {
                                        echo "<option value='$row[no_kode]'>$row[no_kode]</option>";
                                    }
                                    ?>
								</select>
						</div>
					</div>
					
					<div class="col-lg-2">
						<div class="form-group">
							<label>Berat PB-4</label>
							<input class="form-control" name="txtpb4" id="txtpb4">
							
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<label>Kode Pb-5</label>
								<select class="form-control" onchange="cek_kdpb5()" id="txt_kdpb5" name="txt_kdpb5">
									<option value='' selected>- Pilih -</option>
									
                                    <?php
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $pegawai = mysqli_query($link, "SELECT * FROM gdg_pb");
                                    while ($row = mysqli_fetch_array($pegawai)) {
                                        echo "<option value='$row[no_kode]'>$row[no_kode]</option>";
                                    }
                                    ?>
								</select>
						</div>
					</div>
					
					<div class="col-lg-2">
						<div class="form-group">
							<label>Berat PB-5</label>
							<input class="form-control" name="txtpb5" id="txtpb5">
							
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<label>Kode Pb-6</label>
								<select class="form-control" onchange="cek_kdpb6()" id="txt_kdpb6" name="txt_kdpb6">
									<option value='' selected>- Pilih -</option>
									
                                    <?php
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $pegawai = mysqli_query($link, "SELECT * FROM gdg_pb");
                                    while ($row = mysqli_fetch_array($pegawai)) {
                                        echo "<option value='$row[no_kode]'>$row[no_kode]</option>";
                                    }
                                    ?>
								</select>
						</div>
					</div>
					
					<div class="col-lg-2">
						<div class="form-group">
							<label>Berat PB-6</label>
							<input class="form-control" name="txtpb6" id="txtpb6">
							
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<label>Kode Pb-7</label>
								<select class="form-control" onchange="cek_kdpb7()" id="txt_kdpb7" name="txt_kdpb7">
									<option value='' selected>- Pilih -</option>
									
                                    <?php
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $pegawai = mysqli_query($link, "SELECT * FROM gdg_pb");
                                    while ($row = mysqli_fetch_array($pegawai)) {
                                        echo "<option value='$row[no_kode]'>$row[no_kode]</option>";
                                    }
                                    ?>
								</select>
						</div>
					</div>
					
					<div class="col-lg-2">
						<div class="form-group">
							<label>Berat PB-7</label>
							<input class="form-control" name="txtpb7" id="txtpb7">
							
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<label>Kode Pb-8</label>
								<select class="form-control" onchange="cek_kdpb8()" id="txt_kdpb8" name="txt_kdpb8">
									<option value='' selected>- Pilih -</option>
									
                                    <?php
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $pegawai = mysqli_query($link, "SELECT * FROM gdg_pb");
                                    while ($row = mysqli_fetch_array($pegawai)) {
                                        echo "<option value='$row[no_kode]'>$row[no_kode]</option>";
                                    }
                                    ?>
								</select>
						</div>
					</div>
					
					<div class="col-lg-2">
						<div class="form-group">
							<label>Berat PB-8</label>
							<input class="form-control" name="txtpb8" id="txtpb8">
							
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<label>Kode Pb-9</label>
								<select class="form-control" onchange="cek_kdpb9()" id="txt_kdpb9" name="txt_kdpb9">
									<option value='' selected>- Pilih -</option>
									
                                    <?php
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $pegawai = mysqli_query($link, "SELECT * FROM gdg_pb");
                                    while ($row = mysqli_fetch_array($pegawai)) {
                                        echo "<option value='$row[no_kode]'>$row[no_kode]</option>";
                                    }
                                    ?>
								</select>
						</div>
					</div>
					
					<div class="col-lg-2">
						<div class="form-group">
							<label>Berat PB-9</label>
							<input class="form-control" name="txtpb9" id="txtpb9">
							
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<label>Kode Pb-10</label>
								<select class="form-control" onchange="cek_kdpb10()" id="txt_kdpb10" name="txt_kdpb10">
									<option value='' selected>- Pilih -</option>
									
                                    <?php
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $pegawai = mysqli_query($link, "SELECT * FROM gdg_pb");
                                    while ($row = mysqli_fetch_array($pegawai)) {
                                        echo "<option value='$row[no_kode]'>$row[no_kode]</option>";
                                    }
                                    ?>
								</select>
						</div>
					</div>
					
					<div class="col-lg-2">
						<div class="form-group">
							<label>Berat PB-10</label>
							<input class="form-control" name="txtpb10" id="txtpb10">
							
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<label>Kode Pb-6</label>
								<select class="form-control" onchange="cek_kdpb11()" id="txt_kdpb11" name="txt_kdpb11">
									<option value='' selected>- Pilih -</option>
									
                                    <?php
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $pegawai = mysqli_query($link, "SELECT * FROM gdg_pb");
                                    while ($row = mysqli_fetch_array($pegawai)) {
                                        echo "<option value='$row[no_kode]'>$row[no_kode]</option>";
                                    }
                                    ?>
								</select>
						</div>
					</div>
					
					<div class="col-lg-2">
						<div class="form-group">
							<label>Berat PB-11</label>
							<input class="form-control" name="txtpb11" id="txtpb11">
							
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<label>Kode Pb-12</label>
								<select class="form-control" onchange="cek_kdpb12()" id="txt_kdpb12" name="txt_kdpb12">
									<option value='' selected>- Pilih -</option>
									
                                    <?php
                                    // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                    $pegawai = mysqli_query($link, "SELECT * FROM gdg_pb");
                                    while ($row = mysqli_fetch_array($pegawai)) {
                                        echo "<option value='$row[no_kode]'>$row[no_kode]</option>";
                                    }
                                    ?>
								</select>
						</div>
					</div>
					
					<div class="col-lg-2">
						<div class="form-group">
							<label>Berat PB-12</label>
							<input class="form-control" name="txtpb12" id="txtpb12">
							
						</div>
					</div>-->


                    <div class="row"></div>
                    <label>
                        <h3>Downtime</h3>
                    </label>
                    <div class="row"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Putus Bahan</label>
                            <input class="form-control" name="txtpts_bahan" id="txtpts_bahan">

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Putus Hcl</label>
                            <input class="form-control" name="txtpts_hcl" id="txtpts_hcl">

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Putus Timah</label>
                            <input class="form-control" name="txtpts_timah" id="txtpts_timah">

                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Putus Coiler</label>
                            <input class="form-control" name="txtpts_coiler" id="txtpts_coiler">

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Ganti Size</label>
                            <input class="form-control" name="txtganti_size" id="txtganti_size">

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Tunggu Bahan</label>
                            <input class="form-control" name="txttunggu_bahan" id="txttunggu_bahan">

                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Mesin Rusak</label>
                            <input class="form-control" name="txtmesin_rusak" id="txtmesin_rusak">

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Lain-lain</label>
                            <input class="form-control" name="txtlain" id="txtlain">

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>KWH Meter</label>
                            <input class="form-control" name="txtkwh" id="txtkwh" placeholder="KWH selama 1 Shif">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!--<a href="?p=gal-simpan" class="btn btn-default">Simpan</a> <br/><br/>-->
                        <button type="submit" class="btn btn-default">Simpan</button>
                        <!--<button type="reset" class="btn btn-default">Reset Button</button>-->
                    </div>
                </form>
                <!--</div>-->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <script>
            function conv2desimal(num) {
                num = "" + Math.floor(num * 100.0 + 0.5) / 100.0;

                var i = num.indexOf(".");

                if (i < 0) num += ".00";
                else {
                    num = num.substring(0, i) + "." + num.substring(i + 1);
                    i = (num.length - i) - 1;
                    if (i == 0) num += "00";
                    else if (i == 1) num += "0";
                    else if (i > 2) num = num.substring(0, i + 3);
                }

                return num;
            }

            function pengawas() {
                var timx = document.getElementById("frm_galv").tim.value;
                if (timx == "Biru") {
                    document.getElementById("nama_pengawas").value = 'Andik';
                } else if (timx == "Merah") {
                    document.getElementById("nama_pengawas").value = 'Komari';
                } else {
                    document.getElementById("nama_pengawas").value = 'Sari';

                }
            }

            function cek() {

                var tim = document.getElementById("tim").value;
                var shif = document.getElementById("shif").value;
                var unit = document.getElementById("txtunit").value;
                var diameter = document.getElementById("txtdiameter").value;
                var jml_opt = document.getElementById("txtjml_opt").value;
                var tgl = document.getElementById("txttgl").value;
                var jam_kerja = document.getElementById("txtjml_jam").value;

                if (tim == "-Pilih Tim-") {
                    alert('Tim belum dipilih, silakan Pilih Tim Biru, Merah, atau Kuning..!');
                    return false;
                } else if (shif == "-Pilih Shif-") {
                    alert('Shif belum dipilih, silakan Pilih Shif 1, 2, atau 3..!');
                    return false;
                } else if (tgl == "") {
                    alert('Tanggal masih kosong, masukkan tanggal produksi..!');
                    return false;
                } else if (unit == "-Unit-") {
                    alert('Unit belum dipilih, silakan Pilih Unit PA1, PA2, atau PB..!');
                    return false;
                } else if (diameter == "") {
                    alert('Diameter belum diisi, silakan diisi diameter yang dikerjakan..!');
                    return false;
                } else if (jml_opt == "") {
                    alert('Jumlah Operator belum diisi, silakan diisi operator yang bekerja dalam 1 shif..!');
                    return false;
                } else if (jam_kerja == "") {
                    alert('Durasi jam kerja per diameter harus diisi, isi dengan lama pengerjaan tiap diameter dalam 1 shif..!');
                    return false;
                } else {
                    return true;
                }
            }


            function totalx() {
                var bahan_bawl = document.getElementById("frm_galv").bahan_baw.value;
                var bahan_bakh = document.getElementById("frm_galv").bahan_bak.value;
                document.getElementById("tot_bahanb").value = conv2desimal(Number(bahan_bawl) + Number(bahan_bakh));

                var hasil_bk_rol = document.getElementById("frm_galv").txthasilbaik_rol.value;
                //var hasil_sb_rol=document.getElementById("frm_galv").txthasilsb_rol.value;
                //document.getElementById("total_roll").value = conv2desimal(Number(hasil_bk_rol)+Number(hasil_sb_rol)); 

                var hasil_bk_berat = document.getElementById("frm_galv").txthasilbaik_berat.value;
                //var hasil_sb_berat=document.getElementById("frm_galv").txthasilsb_berat.value;
                //document.getElementById("total_berat").value = conv2desimal(Number(hasil_bk_berat)+Number(hasil_sb_berat)); 

                var aval_baik = document.getElementById("frm_galv").txtaval_baik.value;
                var aval_ruwet = document.getElementById("frm_galv").txtaval_ruwet.value;
                document.getElementById("txttotal_aval").value = conv2desimal(Number(aval_baik) + Number(aval_ruwet));

                document.getElementById("txttotal_pakai").value = conv2desimal(Number(hasil_bk_berat) + Number(aval_baik) + Number(aval_ruwet));
                document.getElementById("txtsisa_sesudah").value = conv2desimal((Number(bahan_bawl) + Number(bahan_bakh)) - (Number(hasil_bk_berat) + Number(aval_baik) + Number(aval_ruwet)));

            }
        </script>
        <script type="text/javascript">
            function cek_kd() {
                //var sup=document.getElementById("frm_galv").txt_kdzn.value;
                var nom = document.getElementById("frm_galv").txt_kdzn.value;
                //document.getElementById('txt_kode1').value=sup+nom;
                //document.getElementById('txttgl').focus();
                var txt_kdzn = $("#txt_kdzn").val();
                $.ajax({
                    url: '<?= base_url('assets/'); ?>ajax_gkd_zn.php',
                    data: "txt_kdzn=" + txt_kdzn,
                }).success(function(data) {
                    var json = data,
                        obj = JSON.parse(json);

                    $('#txtzn').val(obj.txtzn);
                    //$('#txt_berat').val(obj.txt_berat);
                    //$('#txt_berat_nsm').val(obj.txt_berat_nsm);


                });
            }
        </script>
        <script type="text/javascript">
            function cek_kdpb() {
                //var sup=document.getElementById("frm_galv").txt_kdzn.value;
                var nom = document.getElementById("frm_galv").txt_kdpb.value;
                //document.getElementById('txt_kode1').value=sup+nom;
                //document.getElementById('txttgl').focus();
                var txt_kdpb = $("#txt_kdpb").val();
                $.ajax({
                    url: '<?= base_url('assets/'); ?>ajax_gkd_pb.php',
                    data: "txt_kdpb=" + txt_kdpb,
                }).success(function(data) {
                    var json = data,
                        obj = JSON.parse(json);

                    $('#txtpb').val(obj.txtpb);
                    //$('#txt_berat').val(obj.txt_berat);
                    //$('#txt_berat_nsm').val(obj.txt_berat_nsm);


                });
            }
        </script>