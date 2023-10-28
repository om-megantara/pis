<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        // $this->load->model('Admin_model');
        // $this->load->model('Auth_model');
    }

    public function hasil_galvanis()
    {

        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('rekap/produksi/hasil/rekap-hasil-galvanis', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function hasil_wdpc()
    {

        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('rekap/produksi/hasil/rekap-hasil-wdpc', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function hasil_wdpl()
    {

        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('rekap/produksi/hasil/rekap-hasil-wdpl', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function hasil_kd()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('rekap/produksi/hasil/rekap-hasil-kawat-duri', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }


    // -------------------------------------------SECTION REKAP BAHAN BANTU----------------------------------


    public function bahan_bantu_galvanis()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('rekap/bahan-bantu/rek-bb-galvanis', $data);
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
        $this->load->view('rekap/bahan-bantu/rek-bb-wdpc', $data);
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
        $this->load->view('rekap/bahan-bantu/rek-bb-wdpl', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function bahan_bantu_kd()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('template/uc', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    // -----------------------------------------SECTION REKAP DOWNTIME MESIN---------------------------------------


    public function downtime_drawing()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('template/uc', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function downtime_galvanis()
    {

        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('rekap/downtime/galvanis', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    // -----------------------------------------SECTION REKAP HASIL WORK ORDER----------------------------------


    public function wo_galvanis()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('rekap/workorder/rek-hasilwo-galvanis', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    // ----------------------------------------BAGIAN REKAP GUDANG KAWAT PAKU -------------------------------------------->

    public function stok_kp()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('rekap/gudang/report-stok-kp', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function cetak_stok_kp()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('rekap/gudang/cetak-stok-kp', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function cetak_permintaan_brg()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('rekap/gudang/cetak-permintaan-brg', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function cetak_pengembalian_brg()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('rekap/gudang/cetak-pengembalian-brg', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    // -------------------------------------------SECTION REKAP NG PRODUKSI---------------------------

    public function ng_galvanis()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('rekap/produksi/notgood/rekap-galvanis', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function ng_wdpl()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('rekap/produksi/notgood/rekap-wdpl', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function ng_kd()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('rekap/produksi/notgood/rekap-kd', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }
}
