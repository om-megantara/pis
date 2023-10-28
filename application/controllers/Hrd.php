<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hrd extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        // $this->load->model('Admin_model');
        // $this->load->model('Auth_model');
    }

    public function upload_absensi()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/hrd/upload-absensi-tampil', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }


    public function daftar_absensi()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/hrd/daftar-absensi-tampil', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function rekap_terlambat()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/hrd/rekap-terlambat-tampil', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }
}
