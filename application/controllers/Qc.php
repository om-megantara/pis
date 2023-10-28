<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Qc extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('Data_model');
    }

    public function tampil_galvanis()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/qc/galvanis-tampil', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function simpan_galvanis()
    {
        // $kd_qc_galv = $_POST['kd_qc_galv'];
        $kd_galv = $_POST['kd_galv'];
        $no_order = $_POST['no_order'];

        $shif                = $_POST["shif"];
        $unit                = $_POST['txtunit'];
        $tanggal            = date_format(date_create($_POST["txttgl"]), "Y-m-d");
        $diameter            = $_POST['txtdiameter'];

        $hasil_baik_rol        = $_POST['txthasil_baik_roll'];
        $hasil_baik_berat    = $_POST['txthasil_baik_berat'];
        $pas_rol        = $_POST['txtpas_rol'];
        $pas_berat        = $_POST['txtpas_berat'];

        $ng_rol            = $_POST['txtng_rol'];
        $ng_berat        = $_POST['txtng_berat'];
        $rejek_rol        = $_POST['txtrejek_rol'];
        $rejek_berat    = $_POST['txtrejek_berat'];

        $kasar_rol = $_POST['txtng_kasar_rol'];
        $kusam_rol = $_POST['txtng_kusam_rol'];
        $gosong_rol = $_POST['txtng_gosong_rol'];
        $merah_rol = $_POST['txtng_merah_rol'];
        $ruwet_rol = $_POST['txtng_ruwet_rol'];
        $oval_rol = $_POST['txtng_dia_oval_rol'];
        $osp_rol = $_POST['txtng_dia_osp_rol'];
        $kaku_rol = $_POST['txtng_kaku_rol'];
        $cw_rol = $_POST['txtng_cw_rol'];
        $lengket_rol = $_POST['txtng_lengket_rol'];
        $karat_rol = $_POST['txtng_karat_rol'];
        $sambungan_rol = $_POST['txtng_sambungan_rol'];
        $gelombang_rol = $_POST['txtng_gelombang_rol'];
        $ng_hitam = $_POST['txtng_hitam'];
        $ng_sisa_talitimah = $_POST['txtng_sisa_talitimah'];
        $ng_oli = $_POST['txtng_oli'];

        $data = [
            /*'kd_qc_galv' => $kd_qc_galv,*/
            'kd_galv' => $kd_galv, 'no_order' => $no_order, 'tgl_produksi' => $tanggal, 'shif' => $shif,
            'Unit' => $unit, 'diameter' => $diameter, 'hasil_produksi_rol' => $hasil_baik_rol, 'hasil_produksi_berat' => $hasil_baik_berat,
            'pas_rol' => $pas_rol, 'pas_berat' => $pas_berat, 'ng_rol' => $ng_rol, 'ng_berat' => $ng_berat, 'rejek_rol' => $rejek_rol,
            'rejek_berat' => $rejek_berat, 'kasar_rol' => $kasar_rol, 'kusam_rol' => $kusam_rol, 'gosong_rol' => $gosong_rol,
            'merah_rol' => $merah_rol, 'ruwet_rol' => $ruwet_rol, 'oval_rol' => $oval_rol, 'osp_rol' => $osp_rol, 'kaku_rol' => $kaku_rol,
            'cw_rol' => $cw_rol, 'lengket_rol' => $lengket_rol, 'karat_rol' => $karat_rol, 'sambungan_rol' => $sambungan_rol,
            'gelombang_rol' => $gelombang_rol, 'ng_hitam' => $ng_hitam, 'ng_sisa_talitimah' => $ng_sisa_talitimah, 'ng_oli' => $ng_oli
        ];

        $this->Data_model->simpan_data($data, 'qc_galv');
        redirect('qc/tampil-galvanis');
    }

    public function edit_galvanis($kd)
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        $where = array('kd' => $kd);
        // $where = array('kd_qc_galv' => $kd);

        // $data['inputqc_galv'] = $this->M_query->get_galvanis();
        // $data['input_galv'] = $this->M_query->get_qc_galvanis($kd);
        $data['input_galv'] = $this->Data_model->edit_data($where, 'galvanis')->result();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/qc/galvanis-edit', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }


    public function tampil_wdpl()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/qc/wdpl-tampil', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function edit_wdpl($kd)
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        $where = array('kd' => $kd);
        $data['input_wdpl'] = $this->Data_model->edit_data($where, 'wdpl')->result();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/qc/wdpl-edit', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }


    public function simpan_wdpl()
    {

        $kd_galv = $_POST['kd_galv'];
        $no_order = $_POST['no_order'];

        $shif                = $_POST['txtshif'];
        $unit                = $_POST['txtunit'];
        $tanggal            = date_format(date_create($_POST["txttgl"]), "Y-m-d");
        $diameter            = $_POST['txtdiameter'];

        $hasil_baik_rol        = $_POST['txthasil_baik_roll'];
        $hasil_baik_berat    = $_POST['txthasil_baik_berat'];

        $pas_rol        = $_POST['txtpas_rol'];
        $pas_berat        = $_POST['txtpas_berat'];
        $ng_rol            = $_POST['txtng_rol'];
        $ng_berat        = $_POST['txtng_berat'];
        $rejek_rol        = $_POST['txtrejek_rol'];
        $rejek_berat    = $_POST['txtrejek_berat'];

        $kasar_rol = $_POST['txtng_kasar_rol'];
        $kusam_rol = $_POST['txtng_kusam_rol'];
        $gosong_rol = $_POST['txtng_gosong_rol'];
        $merah_rol = $_POST['txtng_merah_rol'];
        $ruwet_rol = $_POST['txtng_ruwet_rol'];
        $oval_rol = $_POST['txtng_dia_oval_rol'];
        $osp_rol = $_POST['txtng_dia_osp_rol'];
        $kaku_rol = $_POST['txtng_kaku_rol'];
        $cw_rol = $_POST['txtng_cw_rol'];
        $lengket_rol = $_POST['txtng_lengket_rol'];
        $karat_rol = $_POST['txtng_karat_rol'];
        $sambungan_rol = $_POST['txtng_sambungan_rol'];
        $gelombang_rol = $_POST['txtng_gelombang_rol'];


        $data = [
            'kd_galv' => $kd_galv, 'no_order' => $no_order, 'tgl_produksi' => $tanggal, 'shif' => $shif, 'Unit' => $unit, 'diameter' => $diameter, 'hasil_produksi_rol' => $hasil_baik_rol, 'hasil_produksi_berat' => $hasil_baik_berat, 'pas_rol' => $pas_rol, 'pas_berat' => $pas_berat, 'ng_rol' => $ng_rol, 'ng_berat' => $ng_berat, 'rejek_rol' => $rejek_rol, 'rejek_berat' => $rejek_berat, 'kasar_rol' => $kasar_rol, 'kusam_rol' => $kusam_rol, 'gosong_rol' => $gosong_rol, 'merah_rol' => $merah_rol,
            'ruwet_rol' => $ruwet_rol, 'oval_rol' => $oval_rol, 'osp_rol' => $osp_rol, 'kaku_rol' => $kaku_rol, 'cw_rol' => $cw_rol, 'lengket_rol' => $lengket_rol, 'karat_rol' => $karat_rol, 'sambungan_rol' => $sambungan_rol, 'gelombang_rol' => $gelombang_rol
        ];

        $this->Data_model->simpan_data($data, 'qc_wdpl');
        redirect('qc/tampil-wdpl');
    }


    public function tampil_kd()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/qc/kawat-duri-tampil', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function edit_kd($kd)
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        $where = array('kd' => $kd);
        $data['input_kd'] = $this->Data_model->edit_data($where, 'kawat_duri')->result();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/qc/kawat-duri-edit', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function simpan_kd()
    {

        $kd_galv = $_POST['kd_galv'];
        $no_order = $_POST['no_order'];

        $shif                = $_POST["shif"];
        $unit                = $_POST['txtunit'];
        $tanggal            = date_format(date_create($_POST["txttgl"]), "Y-m-d");
        $diameter            = $_POST['txtdiameter'];

        $hasil_baik_rol        = $_POST['txthasil_baik_roll'];
        $hasil_baik_berat    = $_POST['txthasil_baik_berat'];

        $pas_rol        = $_POST['txtpas_rol'];
        $pas_berat        = $_POST['txtpas_berat'];
        $ng_rol            = $_POST['txtng_rol'];
        $ng_berat        = $_POST['txtng_berat'];
        $rejek_rol        = $_POST['txtrejek_rol'];
        $rejek_berat    = $_POST['txtrejek_berat'];

        $kasar_rol = $_POST['txtng_kasar_rol'];
        $kusam_rol = $_POST['txtng_kusam_rol'];
        $gosong_rol = $_POST['txtng_gosong_rol'];
        $merah_rol = $_POST['txtng_merah_rol'];
        $ruwet_rol = $_POST['txtng_ruwet_rol'];
        $oval_rol = $_POST['txtng_dia_oval_rol'];
        $osp_rol = $_POST['txtng_dia_osp_rol'];
        $kaku_rol = $_POST['txtng_kaku_rol'];
        $cw_rol = $_POST['txtng_cw_rol'];
        $lengket_rol = $_POST['txtng_lengket_rol'];
        $karat_rol = $_POST['txtng_karat_rol'];
        $sambungan_rol = $_POST['txtng_sambungan_rol'];
        $gelombang_rol = $_POST['txtng_gelombang_rol'];

        $data = [
            'kd_galv' => $kd_galv, 'no_order' => $no_order, 'tgl_produksi' => $tanggal, 'shif' => $shif, 'Unit' => $unit, 'diameter' => $diameter, 'hasil_produksi_rol' => $hasil_baik_rol, 'hasil_produksi_berat' => $hasil_baik_berat, 'pas_rol' => $pas_rol, 'pas_berat' => $pas_berat, 'ng_rol' => $ng_rol, 'ng_berat' => $ng_berat, 'rejek_rol' => $rejek_rol, 'rejek_berat' => $rejek_berat, 'kasar_rol' => $kasar_rol, 'kusam_rol' => $kusam_rol, 'gosong_rol' => $gosong_rol, 'merah_rol' => $merah_rol,
            'ruwet_rol' => $ruwet_rol, 'oval_rol' => $oval_rol, 'osp_rol' => $osp_rol, 'kaku_rol' => $kaku_rol, 'cw_rol' => $cw_rol, 'lengket_rol' => $lengket_rol, 'karat_rol' => $karat_rol, 'sambungan_rol' => $sambungan_rol, 'gelombang_rol' => $gelombang_rol
        ];

        $this->Data_model->simpan_data($data, 'qc_kd');
        redirect('qc/tampil-kd');
    }

    public function hapus_galvanis($kd)
    {
        $where = array('kd_qc_galv' => $kd);
        $this->Data_model->hapus_data($where, 'qc_galv');
        redirect('qc/tampil-galvanis');
    }
    public function hapus_wdpl($kd)
    {
        $where = array('kd_qc_galv' => $kd);
        $this->Data_model->hapus_data($where, 'qc_wdpl');
        redirect('qc/tampil-wdpl');
    }
    public function hapus_kd($kd)
    {
        $where = array('kd_qc_galv' => $kd);
        $this->Data_model->hapus_data($where, 'qc_kd');
        redirect('qc/tampil-kd');
    }
}
