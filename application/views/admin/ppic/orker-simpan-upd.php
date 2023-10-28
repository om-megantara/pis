<?php
	include "koneksi.php";
	$kd_edit =mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_GET['kd'],ENT_QUOTES))));
	$tim		= $_POST["tim"];
	if ($tim=="A"){
		$nama_pengawas="Andik";
	}elseif ($tim=="B"){
		$nama_pengawas="Komari";
	}else{
		$nama_pengawas="Sari";
	}
	$shif	= $_POST["shif"];
	$unit				= $_POST['txtunit'];
	$tanggal			= date_format(date_create($_POST["txttgl"]),"Y-m-d");
	$diameter			= $_POST['txtdiameter'];
	$jml_opt			= $_POST['txtjml_opt'];
	$jam_kerja			= $_POST['txtjml_jam'];
	$bahan_baw			= $_POST['bahan_baw'];
	$bahan_bak			= $_POST['bahan_bak'];
	$total_bahan		= $bahan_baw+$bahan_bak;
	$hasil_baik_rol		= $_POST['txthasilbaik_rol'];
	$hasil_sb_rol		= $_POST['txthasilsb_rol'];
	$total_rol			= $hasil_baik_rol+$hasil_sb_rol;
	$hasil_baik_berat	= $_POST['txthasilbaik_berat'];
	$hasil_sb_berat		= $_POST['txthasilsb_berat'];
	$total_berat		=$hasil_baik_berat+$hasil_sb_berat;
	$aval_baik			= $_POST['txtaval_baik'];
	$aval_ruwet			= $_POST['txtaval_ruwet'];
	$total_pakai		= $total_berat+$aval_baik+$aval_ruwet;
	$sisa_sesudah		= $total_bahan-$total_pakai;
	$keterangan			= $_POST['txtketerangan'];
	$ban_hcl			= $_POST['txthcl'];
	$ban_nh4cl			= $_POST['txtnh4cl'];
	$ban_zncl2			= $_POST['txtzncl2'];
	$ban_zn				= $_POST['txtzn'];
	$ban_al				= $_POST['txtal'];
	$ban_znal			= $_POST['txtznal'];
	$ban_pb				= $_POST['txtpb'];
	$ban_abu			= $_POST['txtabu_timah'];
	$dt_pts_bahan		= $_POST['txtpts_bahan'];
	$dt_pts_hcl			= $_POST['txtpts_hcl'];
	$dt_pts_timah		= $_POST['txtpts_timah'];
	$dt_pts_coiler		= $_POST['txtpts_coiler'];
	$dt_ganti_size		= $_POST['txtganti_size'];
	$dt_tunggu_bahan	= $_POST['txttunggu_bahan'];
	$dt_mesin_rusak		= $_POST['txtmesin_rusak'];
	$dt_lain2			= $_POST['txtlain'];
	$dt_ket_lain2		="";
	$kwh			= $_POST['txtkwh'];
	
	
	$simpan ="UPDATE galvanis SET tanggal='$tanggal', team='$tim', shif='$shif', Unit='$unit', jml_opt='$jml_opt', jam_kerja='$jam_kerja',
			bahan_baku_aw='$bahan_baw', bahan_baku_ak='$bahan_bak', bahan_baku_tot='$total_bahan', diameter='$diameter', hasil_baik_roll='$hasil_baik_rol', 
			hasil_baik_berat='$hasil_baik_berat', hasil_sb_roll='$hasil_sb_rol', hasil_sb_berat='$hasil_sb_berat', total_rol='$total_rol', total_berat='$total_berat',
			aval_baik='$aval_baik', aval_ruwet='$aval_ruwet', total_pemakaian='$total_pakai', sisa_sesudah='$sisa_sesudah', ket='$keterangan', 
			Bban_hcl='$ban_hcl', Bban_nh4cl='$ban_nh4cl', Bban_zncl2='$ban_zncl2', Bban_zn='$ban_zn', Bban_al='$ban_al', Bban_znal='$ban_znal', Bban_pb='$ban_pb', 
			Bban_abu_timah='$ban_abu', dt_putus_bahan='$dt_pts_bahan',dt_putus_hcl='$dt_pts_hcl',dt_putus_timah='$dt_pts_timah',dt_putus_coiler='$dt_pts_coiler',
			dt_ganti_size='$dt_ganti_size',dt_tunggu_bahan='$dt_tunggu_bahan',dt_mesin_rusak='$dt_mesin_rusak',dt_lain2='$dt_lain2',dt_ket_lain2='$dt_ket_lain2',kwh_meter='$kwh'
			where kd='$kd_edit'";
									
		//echo $simpan;
		mysql_query($simpan) or die("Gagal menyimpan data"); 
				
echo "<script> window.location = '?p=galvanis-tampil';</script>";		
	//}
?>