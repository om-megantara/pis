<?php
$link = mysqli_connect("localhost:3307", "root", "", "produksi_test");
// include "application/config/database.php";
$pegawai = mysqli_fetch_array(mysqli_query($link, "select * from gdg_pb where no_kode = '$_GET[txt_kdpb]'"));
$kode = $pegawai['Berat'];
$data_pegawai = array('txtpb'       =>  "$kode",);
//'txt_berat_label'    		=>  $pegawai['tanggal_masuk'],
//'txt_berat'    		=>  $pegawai['Berat']+5,);
echo json_encode($data_pegawai);
