<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Csd extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        // $this->load->model('Admin_model');
        $this->load->model('Data_model');
    }

    public function tampil_perijinan()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/csd/perijinan-tampil', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function input_perijinan()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();



        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/csd/perijinan-input', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }


    public function edit_perijinan($kd)
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $where = array('no_kd' => $kd);
        $data['csd_perijinan'] = $this->Data_model->edit_data($where, 'perijinan')->result();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/csd/perijinan-edit', $data);
        $this->load->view('template/footer');
    }


    public function simpan_perijinan()
    {

        $nama_berkas = $_POST['txtnama_berkas'];
        $nomor_kendaraan = $_POST['txtno_kendaraan'];
        $jenis_berkas = $_POST['txtjns_berkas'];
        $Nama_lembaga = $_POST['txtnm_lembaga'];
        $tgl_terbit =    $_POST['txttgl_terbit'];
        $masa_berlaku = $_POST['txtmasa_berlaku'];
        $satuan =    $_POST['txtsatuan'];
        $tgl_expired =            $_POST['txttgl_expired'];
        $status_berkas = $_POST['txtstatus_berkas'];
        $lama_pengurusan = $_POST['txtlama_urus'];
        $keterangan =        $_POST['txt_keterangan'];
        $tgl_mulai_notif = $_POST['txttgl_notif'];
        $status_delete = 0;
        $data =    array(

            'nama_berkas' => $nama_berkas,
            'nomor_kendaraan ' => $nomor_kendaraan,
            'jenis_berkas ' => $jenis_berkas,
            'Nama_lembaga' => $Nama_lembaga,
            'tgl_terbit' => $tgl_terbit,
            'masa_berlaku' => $masa_berlaku,
            'satuan' => $satuan,
            'tgl_expired' => $tgl_expired,
            'status_berkas' => $status_berkas,
            'lama_pengurusan' => $lama_pengurusan,
            'keterangan' => $keterangan,
            'tgl_mulai_notif' => $tgl_mulai_notif,
            'status_delete' => $status_delete
        );

        $this->Data_model->simpan_data($data, 'perijinan');
        redirect('csd/tampil-perijinan');
    }

    public function update_perijinan()
    {

        $kd = $_POST["no_kd"];
        $nama_berkas = $_POST["txtnama_berkas"];
        $no_kendaraan = $_POST["txtno_kendaraan"];
        $jenis_berkas = $_POST["txtjns_berkas"];
        $nama_lembaga = $_POST["txtnm_lembaga"];
        $tgl_terbit = $_POST["txttgl_terbit"];
        $masa_berlaku = $_POST["txtmasa_berlaku"];
        $satuan = $_POST["txtsatuan"];
        $tgl_expired = $_POST["txttgl_expired"];
        $status_berkas = $_POST["txtsttatus_berkas"];
        $lama_pengurusan = $_POST["txtlama_urus"];
        $keterangan = $_POST["txt_keterangan"];
        $tgl_mulai_notif = $_POST["txttgl_notif"];

        $data = array(
            'nama_berkas' => $nama_berkas,
            'nomor_kendaraan' => $no_kendaraan,
            'jenis_berkas' => $jenis_berkas,
            'nama_lembaga' => $nama_lembaga,
            'tgl_terbit' => $tgl_terbit,
            'masa_berlaku' => $masa_berlaku,
            'satuan' => $satuan,
            'tgl_expired' => $tgl_expired,
            'status_berkas' => $status_berkas,
            'lama_pengurusan' => $lama_pengurusan,
            'keterangan' => $keterangan,
            'tgl_mulai_notif' => $tgl_mulai_notif

        );

        $where = ['no_kd' => $kd];

        $this->Data_model->update_data($where, $data, 'perijinan');
        redirect('csd/tampil-perijinan');
    }


    public function hapus_perijinan($kd)
    {
        $where = array('no_kd' => $kd);
        $this->Data_model->hapus_data($where, 'perijinan');
        redirect('csd/tampil-perijinan');
    }
}
