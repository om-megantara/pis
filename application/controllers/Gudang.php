<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('Data_model');
    }


    public function input_zn()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/gudang/zn-input', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }


    public function tampil_zn()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/gudang/zn-tampil', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function simpan_zn()
    {
        $supp = $_POST['txt_sup'];
        $tanggal            = date_format(date_create($_POST["txttgl"]), "Y-m-d");
        $kode = $_POST['txt_sup']; //substr($kd_brg,0,2);
        $kd_brg                = $_POST['txt_kode'];
        $berat                = $_POST['txt_berat'];
        // $status_del = $_POST['status_delx'];
        $ket = $_POST['txt_keterangan'];

        // $qcdata = mysqli_query($link, "SELECT * FROM gdg_zn where kd_zn='$kd'") or die(mysqli_error($link));
        // $num_rows = mysqli_num_rows($qcdata);

        // if ($num_rows >= 1) {
        //     $data = "UPDATE gdg_zn SET tanggal_masuk='$tanggal', Berat='$berat',status_del='0', keterangan='$ket' where kd_zn='$kd'";
        // } else {

        $data = array(
            'tanggal_masuk' => $tanggal,
            'kode' =>  $kode,
            'no_kode' => $kd_brg,
            'Berat' => $berat,
            // 'status_del' == 0,
            'keterangan' => $ket
        );

        $this->Data_model->simpan_data($data, 'gdg_zn');
        redirect('gudang/tampil_zn');
    }

    public function edit_zn($kd)
    {
        $where = array('kd_zn' => $kd);
        $data['tampilzn'] = $this->Data_model->edit_data($where, 'gdg_zn')->result();

        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/gudang/zn-edit', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function update_zn()
    {
        $kd = $_POST['kd_zn'];

        $supp = $_POST['txt_sup'];
        $tanggal            = date_format(date_create($_POST["txttgl"]), "Y-m-d");
        // $kode = $_POST['txt_sup']; //substr($kd_brg,0,2);
        // $kd_brg                = $_POST['txt_kode'];
        $berat                = $_POST['txt_berat'];
        // $status_del = $_POST['status_delx'];
        $ket = $_POST['txt_keterangan'];

        $data = array(
            'tanggal_masuk' => $tanggal,
            'Berat' => $berat,
            // 'status_del' == 0,
            'keterangan' => $ket
        );

        $where = ['kd_zn' => $kd];

        $this->Data_model->update_data($where, $data, 'gdg_zn');
        redirect('gudang/tampil_zn');
    }

    public function ajax_zn()
    {
        include "application/config/database.php";
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

        $data_pegawai = array('txt_kode'       =>  "-$jmlkode",);
        //'txt_berat_label'    		=>  $pegawai['tanggal_masuk'],
        //'txt_berat'    		=>  $pegawai['Berat']+5,);
        echo json_encode($data_pegawai);
    }


    public function ajax_gkd_zn()
    {
        include "application/config/database.php";
        $pegawai = mysqli_fetch_array(mysqli_query($link, "select * from gdg_zn where no_kode = '$_GET[txt_kdzn]'"));
        $kode = $pegawai['Berat'];
        $data_pegawai = array('txtzn'       =>  "$kode",);
        //'txt_berat_label'    		=>  $pegawai['tanggal_masuk'],
        //'txt_berat'    		=>  $pegawai['Berat']+5,);
        echo json_encode($data_pegawai);
    }


    public function input_pb()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/gudang/pb-input', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function tampil_pb()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/gudang/pb-tampil', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }


    public function simpan_pb()
    {
        // $supp = $_POST['txt_sup'];
        $tanggal            = date_format(date_create($_POST["txttgl"]), "Y-m-d");
        $kode = $_POST['txt_sup']; //substr($kd_brg,0,2);
        $kd_brg                = $_POST['txt_kode'];
        $berat                = $_POST['txt_berat'];
        $ket = $_POST['txt_keterangan'];

        // $qcdata = mysqli_query($link, "SELECT * FROM gdg_pb where kd_pb='$kd'") or die(mysqli_error($link));
        // $num_rows = mysqli_num_rows($qcdata);

        // if ($num_rows >= 1) {
        //     $data = "UPDATE gdg_pb SET tanggal_masuk='$tanggal', Berat='$berat',status_del='0',keterangan='$ket' where kd_pb='$kd'";
        // } else {
        $data = [
            'tanggal_masuk' => $tanggal, 'kode' => $kode, 'no_kode' => $kd_brg, 'Berat' => $berat, /*'status_del'=>$status_del,*/ 'keterangan' => $ket
        ];
        $this->Data_model->simpan_data($data, 'gdg_pb');
        redirect('gudang/tampil-pb');
    }


    public function edit_pb($kd)
    {
        $where = array('kd_pb' => $kd);
        $data['tampilpb'] = $this->Data_model->edit_data($where, 'gdg_pb')->result();

        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/gudang/pb-edit', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }


    public function update_pb()
    {
        $kd = $_POST['kd_pb'];

        // $supp = $_POST['txt_sup'];
        $tanggal            = date_format(date_create($_POST["txttgl"]), "Y-m-d");
        $kode = $_POST['txt_sup']; //substr($kd_brg,0,2);
        $kd_brg                = $_POST['txt_kode'];
        $berat                = $_POST['txt_berat'];
        $ket = $_POST['txt_keterangan'];

        $data = [
            'tanggal_masuk' => $tanggal,
            'Berat' => $berat,
            /*'status_del'=>$status_del,*/
            'keterangan' => $ket
        ];

        $where = ['kd_pb' => $kd];

        $this->Data_model->update_data($where, $data, 'gdg_pb');
        redirect('gudang/tampil-pb');
    }


    public function ajax_pb()
    {
        include "application/config/database.php";
        $pegawai = mysqli_fetch_array(mysqli_query($link, "select *,count(kode) as nkode from gdg_pb where kode = '$_GET[txt_sup]'"));
        $kode = $pegawai['nkode'] + 1;
        $data_pegawai = array('txt_kode'       =>  "-$kode",);
        //'txt_berat_label'    		=>  $pegawai['tanggal_masuk'],
        //'txt_berat'    		=>  $pegawai['Berat']+5,);
        echo json_encode($data_pegawai);
    }

    public function ajax_gkd_pb()
    {
        include "application/config/database.php";
        $pegawai = mysqli_fetch_array(mysqli_query($link, "select * from gdg_pb where no_kode = '$_GET[txt_kdpb]'"));
        $kode = $pegawai['Berat'];
        $data_pegawai = array('txtpb'       =>  "$kode",);
        //'txt_berat_label'    		=>  $pegawai['tanggal_masuk'],
        //'txt_berat'    		=>  $pegawai['Berat']+5,);
        echo json_encode($data_pegawai);
    }


    public function input_kp()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/gudang/kp-input', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function tampil_kp()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/gudang/kp-tampil', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }


    public function simpan_kp()
    {
        $tgl_skg2 = date('d-m-Y');
        $tgl_skg            = date_format(date_create($tgl_skg2), "Y-m-d");
        $tgl_bt                = date_format(date_create($tgl_skg2), "dmy");

        //$kode				= $_POST['txtkode'];
        $tanggal            = date_format(date_create($_POST["txttgl"]), "Y-m-d");
        $diameter            = $_POST['txtdiameter'];
        $kode_barang        = $_POST['txtkode_barang'] . "/" . $tgl_bt;
        $berat                = $_POST['txtberat'];
        $jns_brg            = $_POST['txtjenis_barang'];
        $status_barang        = $_POST['txtstatus_barang'];
        $status_barang        = $_POST['txtstatus_barang'];
        $status_gudang        = "1";
        $status_kembali        = "1";


        echo $kode_barang;

        $data = array(
            'tanggal' => $tanggal,
            'diameter' => $diameter,
            'kode_barang' => $kode_barang,
            'berat' => $berat,
            'status_gudang' => $status_gudang,
            'jns_brg' => $jns_brg,
            'status_barang' => $status_barang,
            'tgl_terima_gudang' => $tgl_skg,
            'status_kembali' => $status_kembali
        );

        $this->Data_model->simpan_data($data, 'gudang_paku');
        redirect('gudang/tampil_kp');
    }


    public function edit_kp($kd)
    {
        $where = array('kode' => $kd);
        $data['tampilkp'] = $this->Data_model->edit_data($where, 'gudang_paku')->result();

        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/gudang/kp-edit', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function update_kp()
    {
        $kd = $_POST['kode'];

        //$kode				= $_POST['txtkode'];
        $tanggal            = date_format(date_create($_POST["txttgl"]), "Y-m-d");
        $diameter            = $_POST['txtdiameter'];
        $kode_barang        = $_POST['txtkode_barang'];
        $berat                = $_POST['txtberat'];
        $jns_brg            = $_POST['txtjenis_barang'];
        $status_barang        = $_POST['txtstatus_barang'];
        $status_gudang        = "1";
        $tgl_skg2            = date('d-m-Y');
        $tgl_skg            = date_format(date_create($tgl_skg2), "Y-m-d");

        $data = [
            'tanggal' => $tanggal,
            'diameter' => $diameter,
            'kode_barang' => $kode_barang,
            'berat' => $berat,
            'status_gudang' => $status_gudang,
            'jns_brg' => $jns_brg,
            'status_barang' => $status_barang,
        ];

        $where = array('kode' => $kd);

        $this->Data_model->update_data($where, $data, 'gudang_paku');
        redirect('gudang/tampil-kp');
    }


    public function hapus_zn($kd)
    {
        $where = array('kd_zn' => $kd);
        $this->Data_model->hapus_data($where, 'gdg_zn');
        redirect('gudang/tampil-zn');
    }
    public function hapus_pb($kd)
    {
        $where = array('kd_pb' => $kd);
        $this->Data_model->hapus_data($where, 'gdg_pb');
        redirect('gudang/tampil-pb');
    }
    public function hapus_kp($kd)
    {
        $where = array('kode' => $kd);
        $this->Data_model->hapus_data($where, 'gudang_paku');
        redirect('gudang/tampil-kp');
    }
}
