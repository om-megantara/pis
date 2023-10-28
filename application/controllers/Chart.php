<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chart extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        // $this->load->model('Admin_model');
        // $this->load->model('Auth_model');
    }


    public function galvanis()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('chart/chart-galvanis', $data);
        $this->load->view('chart/source');
        $this->load->view('template/footer');
    }

    public function galvanis_tampil()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('chart/chart-galvanis-tampil', $data);
        $this->load->view('chart/source');
        $this->load->view('template/footer');
    }

    public function kawat_duri()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('chart/chart-kd', $data);
        $this->load->view('chart/source');
        $this->load->view('template/footer');
    }

    public function kd_tampil()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('chart/chart-kd-tampil', $data);
        $this->load->view('chart/source');
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
        $this->load->view('chart/chart-wdpc', $data);
        $this->load->view('chart/source');
        $this->load->view('template/footer');
    }

    public function wdpc_tampil()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('chart/chart-wdpc-tampil', $data);
        $this->load->view('chart/source');
        $this->load->view('template/footer');
    }

    public function wdpl()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('chart/chart-wdpl', $data);
        $this->load->view('chart/source');
        $this->load->view('template/footer');
    }

    public function wdpl_tampil()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('chart/chart-wdpl-tampil', $data);
        $this->load->view('chart/source');
        $this->load->view('template/footer');
    }
}
