<?php
	include "koneksi.php";
	
	$no_order	= $_POST["txtno_order"];
	$tanggal	= date_format(date_create($_POST["txttgl"]),"Y-m-d");
	$dari		= $_POST['txtdari'];
	$pada		= $_POST['txtpada'];
	$nama		= $_POST['txtnama_cus'];
	$nama_brg= $_POST['txtnama_brg'];
	$diameter	= $_POST['txtdiameter'];
	$bwg		= $_POST['txtbwg'];
	$kg			= $_POST['txtkg'];
	$jumlah		= $_POST['txtjumlah'];
	$tgl_kerja	= date_format(date_create($_POST['txttgl_kerja']),"Y-m-d");
	$tgl_kirim	= date_format(date_create($_POST['txttgl_kirim']),"Y-m-d");
	$uraian		= $_POST['txturaian'];
	$ket		= $_POST['txtket'];
	
	
	$simpan ="insert into ppic_orker (kd_orker,no_orker,tanggal,asal_orker,ke_orker,nama_customer,Nama_barang,diameter,bwg,at_kg,jumlah,tgl_ren_kerja,tgl_ren_kirim,uraian_spec,keterangan,status) 
		   VALUES(
			'',		
			'$no_order',
			'$tanggal',		
			'$dari',
			'$pada',
			'$nama',
			'$nama_brg',
			'$diameter',
			'$bwg',			
			'$kg',		
			'$jumlah',		
			'$tgl_kerja',	
			'$tgl_kirim',		
			'$uraian',			
			'$ket',			
			'1'
		   )";
									
		//echo $simpan;
		mysql_query($simpan) or die("Gagal menyimpan data"); 
				
echo "<script> window.location = '?p=order-kerja';</script>";		
	//}
?>