<?php
$link = mysqli_connect("localhost:3307", "root", "", "produksi_test");
// include "application/config/database.php";
$pegawai = mysqli_fetch_array(mysqli_query($link, "select *,count(kode) as nkode from gdg_zn where kode = '$_GET[txt_sup]'"));
$jmlkode = $pegawai['nkode'] + 1;
if ($jmlkode < 10) {
	$nol = "000";
} elseif ($jmlkode < 100) {
	$nol = "00";
} elseif ($jmlkode < 1000) {
	$nol = "0";
} else {
	$nol = "";
}
//$data_pegawai = array('txt_kode'   	=>  "$nol-$jmlkode",

$data_pegawai = array('txt_kode'   	=>  "-$jmlkode",);
//'txt_berat_label'    		=>  $pegawai['tanggal_masuk'],
//'txt_berat'    		=>  $pegawai['Berat']+5,);
echo json_encode($data_pegawai);
