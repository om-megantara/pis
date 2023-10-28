<?php
$link = mysqli_connect("localhost:3307", "root", "", "produksi_test");
// include "application/config/database.php";
$pegawai = mysqli_fetch_array(mysqli_query($link, "select *,count(kode) as nkode from gdg_pb where kode = '$_GET[txt_sup]'"));
$kode = $pegawai['nkode'] + 1;
$data_pegawai = array('txt_kode'   	=>  "-$kode",);
//'txt_berat_label'    		=>  $pegawai['tanggal_masuk'],
//'txt_berat'    		=>  $pegawai['Berat']+5,);
echo json_encode($data_pegawai);
