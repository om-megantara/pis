<?php
include "application/config/database.php";
?>
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
		<li class="active">PPIC</li>
		<li class="active">Order Kerja</li>
	</ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
	<!-- #section:settings.box -->
	<?php //include "container.php"; 
	?>

	<!-- /section:settings.box -->
	<div class="page-header">
		<h1>
			<b>Order Kerja</b>
		</h1>
	</div><!-- /.page-header -->
	<div class="page-content">
		<div id="page-wrapper">
			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="row">

				</div>
				<!-- /.row -->

				<div class="row"></div>
				<form id="frm_orker" name="frm_orker" action="<?= base_url('ppic/input-orker'); ?>" method="POST" onSubmit="return cek(this);">
					<!-- ----------------------------------------------------Header------------------------------------------ -->
					<div class="col-lg-12">
						<div class="col-lg-3">
							<div class="form-group">
								<label>Divisi</label>
								<select class="form-control" onchange="noder()" id="txt_divisi" name="txt_div">
									<option>Pilih Divisi</option>

									<option>DRAWING</option>
									<option>GALVANIS</option>
									<option>WDPC</option>
									<option>WDPL</option>
									<option>BENDRAT</option>
									<option>KAWAT DURI</option>
									<!--<option value="DRAW">Drawing</option>
									<option value="GALV">Galvanis</option>
									<option value="WDPC">WDPC</option>
									<option value="WDPL">WDPL</option>
									<option value="BEND">Bendrat</option>
									<option value="KADU">Kawat Duri</option>-->
								</select>
							</div>

						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<label>No. Order Kerja</label>
								<input class="form-control" name="txtno_order" id="txtno_order" placeholder="Nomor Order Kerja" required readonly="readonly">
								<!--<p class="help-block">Example block-level help text here.</p>-->
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<label>Tanggal</label>
								<div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
									<!--<input class="form-control" type="text" name="txttgl" readonly="readonly">-->
									<input class="form-control date-picker" readonly="readonly" name="txttgl" id="txttgl" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Order" required />
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								</div>
							</div>
						</div>
						<!--</div>
					<div class="row"></div>
					<div class="col-lg-12">-->
						<div class="row"></div>
						<div class="col-lg-3">
							<div class="form-group">
								<label>Dari Departemen</label>
								<input class="form-control" name="txtdari" id="txtdari" value="PPIC" readonly="readonly">
								<!--<p class="help-block">Example block-level help text here.</p>-->
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<label>Kepada Departemen</label>
								<input class="form-control" name="txtpada" id="txtpada" value="Produksi" readonly="readonly">
								<!--<p class="help-block">Example block-level help text here.</p>-->
							</div>
						</div>
					</div>
					<!-- ----------------------------------------------------kolom ke-1------------------------------------------ -->
					<div class="row"></div>
					<div class="col-lg-12">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Nama Customer</label>
								<input class="form-control" name="txtnama_cus" id="txtnama_cus" placeholder="Nama Pelanggan (Customer)" required>
								<!--<p class="help-block">Example block-level help text here.</p>-->
							</div>
						</div>
						<div class="row"></div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Nama Barang</label>
								<input class="form-control" name="txtnama_brg" id="txtnama_brg" placeholder="Nama Barang" required>
								<!--<p class="help-block">Example block-level help text here.</p>-->
							</div>
						</div>

						<div class="col-lg-3">
							<div class="form-group">
								<label>Diameter</label>
								<input class="form-control" name="txtdiameter" id="txtdiameter" placeholder="Diameter Hasil" required>
								<!--<p class="help-block">Example block-level help text here.</p>-->
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<label>BWG (Pilih BWG)</label>
								<select class="form-control" id="txtbwg" name="txtbwg">
									<option>-Pilih BWG-</option>
									<option>#BWG 08</option>
									<option>#BWG 09</option>
									<option>#BWG 10</option>
									<option>#BWG 11</option>
									<option>#BWG 12</option>
									<option>#BWG 13</option>
									<option>#BWG 14</option>
									<option>#BWG 15</option>
									<option>#BWG 16</option>
									<option>#BWG 17</option>
									<option>#BWG 18</option>
									<option>#BWG 19</option>
									<option>#BWG 20</option>
									<option>#BWG 21</option>
								</select>
							</div>
						</div>

						<div class="row"></div>
						<div class="col-lg-3">
							<div class="form-group">
								<label>@KG</label>
								<input class="form-control" name="txtkg" id="txtkg" placeholder="Berat pesanan @kg" required>
								<!--<p class="help-block">Example block-level help text here.</p>-->
							</div>
						</div>

						<div class="col-lg-3">
							<div class="form-group">
								<label>Jumlah</label>
								<input class="form-control" name="txtjumlah" id="txtjumlah" placeholder="Jumlah Pesanan" required>
								<!--<p class="help-block">Example block-level help text here.</p>-->
							</div>
						</div>
						<!--<div class="row"></div>-->
						<div class="col-lg-3">
							<div class="form-group">
								<label>Tanggal Rencana Pengerjaan</label>
								<div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
									<!--<input class="form-control" type="text" name="txttgl" readonly="readonly">-->
									<input class="form-control date-picker" readonly="readonly" name="txttgl_kerja" id="txttgl_kerja" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Order" required />
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<label>Tanggal Rencana Pengiriman</label>
								<div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
									<!--<input class="form-control" type="text" name="txttgl" readonly="readonly">-->
									<input class="form-control date-picker" readonly="readonly" name="txttgl_kirim" id="txttgl_kirim" type="text" data-date-format="dd-mm-yyyy" placeholder="Tanggal Order" required />
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="row"></div>
						<div class="col-lg-8">
							<div class="form-group">
								<label>Uraian Spec</label>
								<textarea class="form-control" name="txturaian" id="txturaian" row="7" placeholder="Uraian tentang spesifikasi" required></textarea>
								<!--<p class="help-block">Example block-level help text here.</p>-->
							</div>
						</div>
						<div class="row"></div>
						<div class="col-lg-8">
							<div class="form-group">
								<label>Keterangan</label>
								<textarea class="form-control" name="txtket" id="txtket" row="7" placeholder="Keterangan pesanan barang" required></textarea>
								<!--<p class="help-block">Example block-level help text here.</p>-->
							</div>
						</div>

						<div class="row"></div>
						<div class="col-lg-6">
							<!--<a href="?p=gal-simpan" class="btn btn-default">Simpan</a> <br/><br/>-->
							<button type="submit" class="btn btn-default">Simpan</button>
							<!--<button type="reset" class="btn btn-default">Reset Button</button>-->
						</div>
					</div>

				</form>
				<!--</div>-->
			</div>
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

		function noder() {
			var divx = document.getElementById("frm_orker").txt_div.value;
			var date = new Date();
			var months = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
			var bulan = date.getMonth();
			var yy = date.getYear();
			var tahun = (yy < 1000) ? yy + 1900 : yy;
			if (divx == "DRAWING") {
				<?php $result = mysqli_fetch_array(mysqli_query($link, "SELECT count(*) as jml FROM ppic_orker where no_orker like '%/DRAWING%'")) or die(mysqli_error($link)); ?>

			} else {
				<?php $result = mysqli_fetch_array(mysqli_query($link, "SELECT count(*) as jml FROM ppic_orker where no_orker like '%/WDPC%'")) or die(mysqli_error($link)); ?>

			}
			<?php $bln = $bulan;
			$thn = $tahun;
			$blth = $bln . "/" . $thn ?>
			<?php //$result=mysql_fetch_array(mysql_query("SELECT count(*) as jml FROM ppic_orker where no_orker like '%/DRAWING%'")) or die(mysql_error());
			$jml = $result['jml'];
			?>
			var nomer = <?php echo $jml; ?> + 1;
			document.getElementById("txtno_order").value = nomer + '/' + months[bulan] + '/' + tahun + '/' + divx + '--' + <?php echo $jml; ?>;
			//document.getElementById("txtno_order").value = <?php echo $test; ?>; 
		}


		function cek_database() {
			var sup = document.getElementById("frm_orker").txt_divisi.value;
			var nom = document.getElementById("frm_orker").txtno_order.value;
			//document.getElementById('txt_kode1').value=sup+nom;
			//document.getElementById('txttgl').focus();
			var txt_divisi = $("#txt_divisi").val();
			$.ajax({
				url: 'assets/ajax-orker.php',
				data: "txt_divisi=" + txt_divisi,
			}).success(function(data) {
				var json = data,
					obj = JSON.parse(json);

				$('#txtno_order').val(sup + obj.txtno_order);
			});
		}


		function cek() {

			var nomor = document.getElementById("txtno_order").value;
			/*var shif= document.getElementById("shif").value;
			var unit= document.getElementById("txtunit").value;
			var diameter= document.getElementById("txtdiameter").value;
			var jml_opt= document.getElementById("txtjml_opt").value;
			var tgl= document.getElementById("txttgl").value;
			var jam_kerja= document.getElementById("txtjml_jam").value;	*/

			if (nomor == "") {
				alert('Nomor Order Kerja kosong, silakan diisi..!');
				return false;
			} else {
				//return true;
			}
		}
	</script>