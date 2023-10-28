<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mutasi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('M_mutasi');
    }

    public function kp()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/gudang/mutasi/bfr-kp', $data);
        $this->load->view('admin/gudang/mutasi/source');
        $this->load->view('template/footer');
    }

    public function drawing()
    {

        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/gudang/mutasi/bfr-drawing', $data);
        $this->load->view('admin/gudang/mutasi/source');
        $this->load->view('template/footer');
    }

    public function kpc()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/gudang/mutasi/bfr-kpc', $data);
        $this->load->view('admin/gudang/mutasi/source');
        $this->load->view('template/footer');
    }
    public function pa1()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/gudang/mutasi/bfr-pa1', $data);
        $this->load->view('admin/gudang/mutasi/source');
        $this->load->view('template/footer');
    }

    public function pa2()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/gudang/mutasi/bfr-pa2', $data);
        $this->load->view('admin/gudang/mutasi/source');
        $this->load->view('template/footer');
    }

    public function pb()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/gudang/mutasi/bfr-pb', $data);
        $this->load->view('admin/gudang/mutasi/source');
        $this->load->view('template/footer');
    }

    public function oven_galvanis()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/gudang/mutasi/bfr-oven-galvanis', $data);
        $this->load->view('admin/gudang/mutasi/source');
        $this->load->view('template/footer');
    }

    public function oven_gas()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/gudang/mutasi/bfr-oven-gas', $data);
        $this->load->view('admin/gudang/mutasi/source');
        $this->load->view('template/footer');
    }

    public function wdpc()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/gudang/mutasi/bfr-wdpc', $data);
        $this->load->view('admin/gudang/mutasi/source');
        $this->load->view('template/footer');
    }
}
