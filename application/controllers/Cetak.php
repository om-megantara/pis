<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        // $this->load->model('Admin_model');
        // $this->load->model('Auth_model');
    }


    public function laporan_drawing()
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

    public function terima_galvanis()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('cetak/serah-terima-galvanis', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function laporan_kd()
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
    public function laporan_bendrat()
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

    public function terima_qc_galvanis()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('cetak/serah-terima-qc-galv', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }


    public function qc_galvanis()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('cetak/cetak-qc-galvanis', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function terima_qc_wdpl()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('cetak/serah-terima-qc-wdpl', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function terima_qc_kd()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('cetak/serah-terima-qc-kd', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }
}
