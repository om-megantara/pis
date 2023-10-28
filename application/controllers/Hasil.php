<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        // $this->load->model('Data_model');
    }


    public function produksi_drawing()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('hasil/produksi/drawing', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function produksi_galvanis()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('hasil/produksi/galvanis', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function produksi_wdpc()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('hasil/produksi/wdpc', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function produksi_wdpl()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('hasil/produksi/wdpl', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function produksi_kd()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('hasil/produksi/kawat-duri', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }


    // -------------------------------SECTION HASIL QUALITY CONTROL-------------------------------------

    public function qc_galvanis()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('hasil/qc/galvanis', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function qc_wdpl()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('hasil/qc/wdpl', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function qc_kd()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('hasil/qc/kawat-duri', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }


    // -------------------------------SECTION HASIL BAHAN BANTU-------------------------------------


    public function bahan_bantu_drawing()
    {

        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('hasil/bahan-bantu/drawing', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function bahan_bantu_galvanis()
    {

        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('hasil/bahan-bantu/galvanis', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function bahan_bantu_wdpc()
    {

        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('hasil/bahan-bantu/wdpc', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function bahan_bantu_wdpl()
    {

        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('hasil/bahan-bantu/wdpl', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }


    // -------------------------------SECTION HASIL DOWNTIME MESIN-------------------------------------


    public function downtime_mesin_drawing()
    {

        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('hasil/downtime/drawing', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function downtime_mesin_galvanis()
    {

        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('hasil/downtime/galvanis', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }
}
