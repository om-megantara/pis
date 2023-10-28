<?php
$link = mysqli_connect("localhost:3307", "root", "", "produksi_test");
// include "application/config/database.php";
$pegawai = mysqli_fetch_array(mysqli_query($link, "select * from gudang_paku where status_gudang='$_GET[lokasi]' And status_barang = 'Baru' order by kode"));
//$kode=$pegawai['nkode']+1;
$data_pegawai = array('lokasi'   	=>  "lokasi",);
//'txt_berat_label'    		=>  $pegawai['tanggal_masuk'],
//'txt_berat'    		=>  $pegawai['Berat']+5,);
echo json_encode($data_pegawai);
