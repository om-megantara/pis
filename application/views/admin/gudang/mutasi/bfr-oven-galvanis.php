<?php
 include "application/config/database.php";
//mysql_select_db("combobox_bertingkat");
//include "../auth/autho.php";
//$hapus_kopi=mysql_query("drop table karyawan_kopi");
//$kopi_karyawan=mysql_query("CREATE TABLE karyawan_kopi LIKE karyawan");
//$isi_kopi=mysql_query("INSERT INTO karyawan_kopi SELECT * from karyawan");
//echo $kopi_karyawan."<br>".$isi_kopi;
$tgl_skg = date('d-m-Y');
//echo $tgl;
?>
<!-- #section:basics/content.breadcrumbs -->
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
        <li class="active">Mutasi</li>
        <li class="active">Oven Galvanis</li>
    </ul><!-- /.breadcrumb -->
</div>

<!-- /section:settings.box -->
<div class="page-header">
    <h1>
        Mutasi Buffer Oven Galvanis
    </h1>
</div><!-- /.page-header -->
<form id="demoform5p" action="?p=mut-oveng-proses" method="post">
    <div class="col-xs-12 col-sm-4">
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <div class="table-header">
            Pilihan Kode Barang yang digunakan produksi
        </div>
        <div class="">
            <!--<select name="duallistbox_demo2[]" id="duallistbox_demo2[]">
                                <?php
                                // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                                $tampil_div = mysqli_query($link, "select * from gudang_paku");
                                $no = 1;
                                $jumtot = 0;
                                while ($row = mysqli_fetch_array($tampil_div, MYSQLI_ASSOC)) {
                                ?>
									<tr>
									<option value="<?php echo $row['kode']; ?>"><a href="a"><?php echo $row['kode_barang']; ?></a></option>
									<td></td>	
									</tr>
									<?php
                                    $no++;
                                }
                                    ?>
								</select>-->
        </div>

        <!--<div class="col-lg-6">
									<div class="form-group">
										<label>Buffer Bahan</label>
											<select class="form-control" onchange="cek_lok()" id="lokasi" name="lokasi">
												<option value="0">-Pilih Lokasi-</option>
												<option value="2.1">Paku Coil</option>
												<option value="2.2">Drawing</option>
												<option value="2.3">PA1</option>
												<option value="2.4">PA1</option>
												<option value="2.5">PB</option>
												<option value="2.6">WDPC</option>
												<option value="2.7">Oven GAS</option>
												<option value="2.8">Oven Galvanis</option>
											</select>
									</div>
								</div>-->
        <div class="col-lg-6">
            <div class="form-group">
                <label>Tanggal Mutasi</label>
                <?php if ($login = "") { ?>
                    <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                        <input class="form-control date-picker" readonly="readonly" name="txttgl" id="txttgl" type="text" data-date-format="dd-mm-yyyy" value="<?php echo $tgl_skg; ?>" />
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                <?php } else { ?>
                    <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                        <input readonly="readonly" name="txttgl" id="txttgl" type="text" data-date-format="dd-mm-yyyy" value="<?php echo $tgl_skg; ?>" />
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-4">
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <div class="table-header">
            Pilihan Kode Barang Yang habis terpakai produksi
        </div>
        <div class=""></div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Status Barang (Pilih 1)</label>
                <select class="form-control" onchange="test()" id="status_brgp" name="status_brgp">
                    <!--<option value="0">-Status Barang-</option>
												<option value="Sisa">Sisa</option>-->
                    <option value="Habis">Habis</option>
                    <!--<option value="GDG">Kembali ke Gudang</option>-->
                </select>
            </div>
        </div>
    </div>


    <div class="col-sm-8">
        <select multiple="multiple" size="10" name="duallistbox_demo2[]" id="duallistbox_demo2[]">
            <?php
            //var demo1 = $('select[name="duallistbox_demo2[]"]').bootstrapDualListbox();
            // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
            $tampil = mysqli_query($link, "select * from gudang_paku where status_gudang='2.8' And status_barang != 'Habis' order by kode");
            $no = 1;
            $jumtot = 0;
            while ($row = mysqli_fetch_array($tampil, MYSQLI_ASSOC)) {
            ?>
                <tr>
                    <option value="<?php echo $row['kode']; ?>"><?php echo $row['kode_barang']; ?></option>
                    <td></td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </select>

        <br>
        <button type="submit" class="btn btn-default btn-block">Submit data</button></br>
        <!--<div class="hr hr-16 hr-dotted"></div>-->

    </div>
</form>
<!--</div>-->