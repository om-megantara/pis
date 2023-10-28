<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppic extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        // $this->load->model('Admin_model');
        // $this->load->model('Auth_model');
    }

    public function order_kerja()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/ppic/order-kerja', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function input_orker()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/ppic/input-orker', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function ajax_orker()
    {
        include "application/config/database.php";
        $pegawai = mysqli_fetch_array(mysqli_query($link, "select *,count(kd_orker) as nkode from ppic_orker where no_orker like '%/$_GET[txt_divisi]%'"));
        //$pegawai = mysqli_fetch_array(mysqli_query($link, "select *,count(kode) as nkode from gdg_zn where kode = '$_GET[txt_sup]'"));
        //$pegawai = mysqli_fetch_array(mysqli_query($link, "select *,count(kode) as nkode from gdg_zn where kode = '$_GET[txt_divisi]'"));
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

        $data_pegawai = array('txtno_order'       =>  "-$jmlkode",);
        //'txt_berat_label'    		=>  $pegawai['tanggal_masuk'],
        //'txt_berat'    		=>  $pegawai['Berat']+5,);
        echo json_encode($data_pegawai);
    }
}
