<html lang="en">
<head>
<?php
include "koneksi.php";
include "header.php";
$kd_edit =mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_GET['kd'],ENT_QUOTES))));
//$_GET['kd'];
?>
</head>
<div class="page-content">
<?php
	$edata=mysql_query("SELECT * FROM galvanis where kd='$kd_edit'") or die(mysql_error());
	$data= mysql_fetch_array($edata);
	$kd=$data["kd"];
	$tanggal=$data["tanggal"];
	$team=$data["team"];
	if ($team=="A"){
		$nama_pengawas="Andik";
	}elseif ($team=="B"){
		$nama_pengawas="Komari";
	}else{
		$nama_pengawas="Sari";
	}
	$shif=$data["shif"];
	$unit=$data["Unit"];
	$jml_opt=$data["jml_opt"];
	$jam_kerja=$data["jam_kerja"];
	$bahan_baku_aw=$data["bahan_baku_aw"];
	$bahan_baku_ak=$data["bahan_baku_ak"];
	$bahan_baku_tot=$data["bahan_baku_tot"];
	$diameter=$data["diameter"];
	$hasil_baik_roll=$data["hasil_baik_roll"];
	$hasil_baik_berat=$data["hasil_baik_berat"];
	$hasil_sb_roll=$data["hasil_sb_roll"];
	$hasil_sb_berat=$data["hasil_sb_berat"];
	$total_rol=$data["total_rol"];
	$total_berat=$data["total_berat"];
	$aval_baik=$data["aval_baik"];
	$aval_ruwet=$data["aval_ruwet"];
	$total_aval=$aval_baik+$aval_ruwet;
	$total_pemakaian=$data["total_pemakaian"];
	$sisa_sesudah=$data["sisa_sesudah"];
	$ket=$data["ket"];
	$bban_hcl=$data["Bban_hcl"];
	$bban_nh4cl=$data["Bban_nh4cl"];
	$bban_zncl2=$data["Bban_zncl2"];
	$bban_zn=$data["Bban_zn"];
	$bban_al=$data["Bban_al"];
	$bban_znal=$data["Bban_znal"];
	$bban_pb=$data["Bban_pb"];
	$bban_abu_timah=$data["Bban_abu_timah"];
	$dt_putus_bahan=$data["dt_putus_bahan"];
	$dt_putus_hcl=$data["dt_putus_hcl"];
	$dt_putus_timah=$data["dt_putus_timah"];
	$dt_putus_coiler=$data["dt_putus_coiler"];
	$dt_ganti_size=$data["dt_ganti_size"];
	$dt_tunggu_bahan=$data["dt_tunggu_bahan"];
	$dt_mesin_rusak=$data["dt_mesin_rusak"];
	$dt_lain2=$data["dt_lain2"];
	$dt_ket_lain2=$data["dt_ket_lain2"];
	$kwh=$data["kwh_meter"];
	?>
<!-- ----------------------------------------------------Header------------------------------------------ -->
<div id="page-wrapper">
			<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Update Data Galvanis
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Forms
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
					<form id="frm_galv_up" name="frm_galv_up" action="?p=gal-smp-update&kd=<?php echo $kd_edit;?>" method="POST" onSubmit="return cek()">
					<!-- ----------------------------------------------------Header------------------------------------------ -->
					<div class="col-lg-4">
						<div class="form-group">
							<label>Team (Pilih Team)</label>
							<select class="form-control" onchange="pengawas()" id="tim" name="tim">
								<option><selected><?php echo $team;?></selected></option>
								<!--<option>-Pilih Tim-</option>-->
								<option>A</option>
								<option>B</option>
								<option>C</option>
							</select>
						</div>
						<div class="form-group">
								<label>Nama Pengawas</label>
								<input class="form-control" id="nama_pengawas" name="nama_pengawas" disabled="" value="<?php echo $nama_pengawas;?>">
								<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>
					
					<div class="col-lg-4">
						<div class="form-group">
							<label>Shif (Pilih Shif)</label>
							<select class="form-control" name="shif" id="shif">
								<option><selected><?php echo $shif;?></selected></option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<!--<option>4</option>
								<option>5</option>-->
							</select>
						</div>
						
						<div class="col-lg-6">
							<div class="form-group" >
							<label>Tanggal Produksi</label>
								<div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
									<!--<input class="form-control" type="text" name="txttgl" readonly="readonly">-->
									<input class="form-control date-picker" readonly="readonly" name="txttgl" id="txttgl" type="text" data-date-format="dd-mm-yyyy" value="<?php echo $tanggal?>" />
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								</div>
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
								<option><selected><?php echo $unit;?></selected></option>
								<!--<option>-Unit-</option>-->
								<option>PA 1</option>
								<option>PA 2</option>
								<option>PB</option>								
								</select>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label>Diameter</label>
							<input class="form-control" name="txtdiameter" id="txtdiameter" value="<?php echo $diameter;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label>Jumlah Operator</label>
							<input class="form-control" name="txtjml_opt" id="txtjml_opt" value="<?php echo $jml_opt;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label>Jumlah Jam Kerja</label>
							<input class="form-control" name="txtjml_jam" id="txtjml_jam" value="<?php echo $jam_kerja;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>
					<div class="row"></div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Bahan Baku Awal</label>
							<input class="form-control" id="bahan_baw" name="bahan_baw" onchange="totalx_up()" value="<?php echo $bahan_baku_aw;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Bahan Baku Masuk</label>
							<input class="form-control" id="bahan_bak" name="bahan_bak" onchange="totalx_up()" value="<?php echo $bahan_baku_ak;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>
					<!--<div class="row"></div>-->
					<div class="col-lg-4">
						<div class="form-group">
							<label>Total Bahan Baku</label>
							<input class="form-control" id="tot_bahanb" name="tot_bahanb" disabled="" value="<?php echo $bahan_baku_tot;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>
					
							
					<!-- ----------------------------------------------------kolom ke-2------------------------------------------ -->						
					<div class="col-lg-4">					
						<div class="form-group">
							<label>Hasil Baik Roll</label>
							<input class="form-control" name="txthasilbaik_rol" id="txthasilbaik_rol" onchange="totalx_up()" value="<?php echo $hasil_baik_roll;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Hasil SB Roll</label>
							<input class="form-control" name="txthasilsb_rol" id="txthasilsb_rol" onchange="totalx_up()" value="<?php echo $hasil_sb_roll;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Total Roll</label>
							<input class="form-control" name="total_roll" id="total_roll" disabled="" value="<?php echo $total_rol;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>
					<div class="row"></div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Hasil Baik Berat</label>
							<input class="form-control" name="txthasilbaik_berat" id="txthasilbaik_berat" onchange="totalx_up()" value="<?php echo $hasil_baik_berat;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>	
					<div class="col-lg-4">
						<div class="form-group">
							<label>Hasil SB Berat</label>
							<input class="form-control" name="txthasilsb_berat" id="txthasilsb_berat" onchange="totalx_up()" value="<?php echo $hasil_sb_berat;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
                    </div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Total Berat</label>
							<input class="form-control" name="total_berat" id="total_berat" disabled="" value="<?php echo $total_berat;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>
					<div class="row"></div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Aval Baik</label>
							<input class="form-control" name="txtaval_baik" id="txtaval_baik" onchange="totalx_up()" value="<?php echo $aval_baik;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>	
					<div class="col-lg-4">
						<div class="form-group">
							<label>Aval Ruwet</label>
							<input class="form-control" name="txtaval_ruwet" id="txtaval_ruwet" onchange="totalx_up()" value="<?php echo $aval_ruwet;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
                    </div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Total Aval</label>
							<input class="form-control" name="txttotal_aval" id="txttotal_aval" disabled="" value="<?php echo $total_aval;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
                    </div>
					<div class="row"></div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Total Pemakaian</label>
							<input class="form-control" name="txttotal_pakai" id="txttotal_pakai" disabled="" value="<?php echo $total_pemakaian;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>	
					<div class="col-lg-4">
						<div class="form-group">
							<label>Sisa Sesudah</label>
							<input class="form-control" name="txtsisa_sesudah" id="txtsisa_sesudah" disabled="" value="<?php echo $sisa_sesudah;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
                    </div>
					<div class="row"></div>
					<div class="col-lg-12">
						<div class="form-group">
							<label>Keterangan</label>
							<input class="form-control" name="txtketerangan" id="txtketerangan" value="<?php echo $ket;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
                    </div>
					
					<div class="row"></div>
					<label><h3>Bahan Pembantu</h3></label>
					<div class="row"></div>
					<div class="col-lg-3">
						<div class="form-group">
							<label>Hcl</label>
							<input class="form-control" name="txthcl" id="txthcl" value="<?php echo $bban_hcl;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>	
					<div class="col-lg-3">
						<div class="form-group">
							<label>Nh4cl</label>
							<input class="form-control" name="txtnh4cl" id="txtnh4cl" value="<?php echo $bban_nh4cl;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
                    </div>
					<div class="col-lg-3">
						<div class="form-group">
							<label>Zncl2</label>
							<input class="form-control" name="txtzncl2" id="txtzncl2" value="<?php echo $bban_zncl2;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label>Zn</label>
							<input class="form-control" name="txtzn" id="txtzn" value="<?php echo $bban_zn;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>
					<div class="row"></div>
					<div class="col-lg-3">
						<div class="form-group">
							<label>Al</label>
							<input class="form-control" name="txtal" id="txtal" value="<?php echo $bban_al;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>	
					<div class="col-lg-3">
						<div class="form-group">
							<label>Znal</label>
							<input class="form-control" name="txtznal" id="txtznal" value="<?php echo $bban_znal;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
                    </div>
					<div class="col-lg-3">
						<div class="form-group">
							<label>PB</label>
							<input class="form-control" name="txtpb" id="txtpb" value="<?php echo $bban_pb;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label>Abu Timah</label>
							<input class="form-control" name="txtabu_timah" id="txtabu_timah" value="<?php echo $bban_abu_timah;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>
					<div class="row"></div>
					<label><h3>Downtime</h3></label>
					<div class="row"></div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Putus Bahan</label>
							<input class="form-control" name="txtpts_bahan" id="txtpts_bahan" value="<?php echo $dt_putus_bahan;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>	
					<div class="col-lg-4">
						<div class="form-group">
							<label>Putus Hcl</label>
							<input class="form-control" name="txtpts_hcl" id="txtpts_hcl" value="<?php echo $dt_putus_hcl;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
                    </div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Putus Timah</label>
							<input class="form-control" name="txtpts_timah" id="txtpts_timah" value="<?php echo $dt_putus_timah;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>
					<div class="row"></div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Putus Coiler</label>
							<input class="form-control" name="txtpts_coiler" id="txtpts_coiler" value="<?php echo $dt_putus_coiler;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>	
					<div class="col-lg-4">
						<div class="form-group">
							<label>Ganti Size</label>
							<input class="form-control" name="txtganti_size" id="txtganti_size" value="<?php echo $dt_ganti_size;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
                    </div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Tunggu Bahan</label>
							<input class="form-control" name="txttunggu_bahan" id="txttunggu_bahan" value="<?php echo $dt_tunggu_bahan;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>
					<div class="row"></div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Mesin Rusak</label>
							<input class="form-control" name="txtmesin_rusak" id="txtmesin_rusak" value="<?php echo $dt_mesin_rusak;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
					</div>	
					<div class="col-lg-4">
						<div class="form-group">
							<label>Lain-lain</label>
							<input class="form-control" name="txtlain" id="txtlain" value="<?php echo $dt_lain2;?>">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
                    </div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>KWH Meter</label>
							<input class="form-control" name="txtkwh" id="txtkwh" placeholder="KWH selama 1 Shif" value="<?php echo $kwh;?>">
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
function conv2desimal(num)
{
num="" + Math.floor(num*100.0 + 0.5)/100.0;

var i=num.indexOf(".");

if ( i<0 ) num+=".00";
else {
num=num.substring(0,i) + "." + num.substring(i + 1);
i=(num.length - i) - 1;
if ( i==0 ) num+="00";
else if ( i==1 ) num+="0";
else if ( i>2 ) num=num.substring(0,i + 3);
}

return num;
}

function pengawas(){
  var timx=document.getElementById("frm_galv_up").tim.value;
  if (timx=="A")
    {
        document.getElementById("nama_pengawas").value = 'Andik'; 
    }
  else if (timx=="B")
    {
       document.getElementById("nama_pengawas").value = 'Komari';
    }
	else
    {
       document.getElementById("nama_pengawas").value = 'Sari';
      
    }
}

function cek(){

	var tim= document.getElementById("tim").value;
	var shif= document.getElementById("shif").value;
	var unit= document.getElementById("txtunit").value;
	var diameter= document.getElementById("txtdiameter").value;
	var jml_opt= document.getElementById("txtjml_opt").value;
	var tgl= document.getElementById("txttgl").value;
	var jam_kerja= document.getElementById("txtjml_jam").value;	
	
    if (tim=="-Pilih Tim-"){
		alert("Tim belum dipilih, silakan Pilih Tim A, B, atau C..!");
		return false;
	}
	else if (shif=="-Pilih Shif-"){
		alert("Shif belum dipilih, silakan Pilih Shif 1, 2, atau 3..!");
		return false;
	}
	else if (unit=="-Unit-"){
		alert("Unit belum dipilih, silakan Pilih Unit PA1, PA2, atau PB..!");
		return false;
	}
	else if (diameter==""){
		alert("Diameter belum diisi, silakan diisi diameter yang dikerjakan..!");
		return false;
	}
	else if (jml_opt==""){
		alert('Jumlah Operator belum diisi, silakan diisi operator yang bekerja dalam 1 shif..!');
		return false;
	}
	else if (tgl==""){
		alert("Tanggal masih kosong, masukkan tanggal produksi..!");
		return false;
	}
	else if ((jam_kerja=="")||(jam_kerja=="0.00")){
		alert("Durasi jam kerja per diameter harus diisi, isi dengan lama pengerjaan tiap diameter dalam 1 shif..!");
		return false;
	}
	else{
		return true;
	}
}


function totalx_up(){
  var bahan_bawl=document.getElementById("frm_galv_up").bahan_baw.value;
  var bahan_bakh=document.getElementById("frm_galv_up").bahan_bak.value;
  document.getElementById("tot_bahanb").value = conv2desimal(Number(bahan_bawl)+Number(bahan_bakh)); 
  
  var hasil_bk_rol=document.getElementById("frm_galv_up").txthasilbaik_rol.value;
  var hasil_sb_rol=document.getElementById("frm_galv_up").txthasilsb_rol.value;
  document.getElementById("total_roll").value = conv2desimal(Number(hasil_bk_rol)+Number(hasil_sb_rol)); 
  
  var hasil_bk_berat=document.getElementById("frm_galv_up").txthasilbaik_berat.value;
  var hasil_sb_berat=document.getElementById("frm_galv_up").txthasilsb_berat.value;
  document.getElementById("total_berat").value = conv2desimal(Number(hasil_bk_berat)+Number(hasil_sb_berat)); 
  
  var aval_baik=document.getElementById("frm_galv_up").txtaval_baik.value;
  var aval_ruwet=document.getElementById("frm_galv_up").txtaval_ruwet.value;
  var taval = Number(aval_baik)+Number(aval_ruwet); 
  document.getElementById("txttotal_aval").value=conv2desimal(taval);
  
  document.getElementById("txttotal_pakai").value = conv2desimal(Number(hasil_bk_berat)+Number(hasil_sb_berat)+Number(aval_baik)+Number(aval_ruwet)); 
  document.getElementById("txtsisa_sesudah").value = conv2desimal((Number(bahan_bawl)+Number(bahan_bakh))- (Number(hasil_bk_berat)+Number(hasil_sb_berat)+Number(aval_baik)+Number(aval_ruwet)));
  //totalpakai=tonasebaik+sb+aval_baik+aval_ruwet
  
  //sisasesudah=totalbahan-totalpakai
    
}
</script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script>
    $(".input-group.date").datepicker({autoclose: true, todayHighlight: true});
</script>

