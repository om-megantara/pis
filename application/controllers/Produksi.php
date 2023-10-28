<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produksi extends MY_Controller
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
        $this->load->view('admin/produksi/galvanis-tampil', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }


    public function input_galvanis()
    {

        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/produksi/galvanis-input', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }


    public function simpan_galvanis()
    {

        $team = $_POST["tim"];
        $nama_pengawas = $_POST["nama_pengawas"];
        $shif    = $_POST["shif"];
        $unit                = $_POST['txtunit'];
        $tanggal            = date_format(date_create($_POST["txttgl"]), "Y-m-d");
        $diameter            = $_POST['txtdiameter'];
        $jml_opt            = $_POST['txtjml_opt'];
        $jam_kerja            = $_POST['txtjml_jam'];
        $bahan_baw            = $_POST['bahan_baw'];
        $bahan_bak            = $_POST['bahan_bak'];
        $total_bahan        = $bahan_baw + $bahan_bak;
        $hasil_baik_rol        = $_POST['txthasilbaik_rol'];
        $hasil_sb_rol        = $_POST['txthasilsb_rol'];
        $total_rol            = $hasil_baik_rol + $hasil_sb_rol;
        $hasil_baik_berat    = $_POST['txthasilbaik_berat'];
        $hasil_sb_berat        = $_POST['txthasilsb_berat'];
        $total_berat        = $hasil_baik_berat + $hasil_sb_berat;
        $aval_baik            = $_POST['txtaval_baik'];
        $aval_ruwet            = $_POST['txtaval_ruwet'];
        $total_pakai        = $total_berat + $aval_baik + $aval_ruwet;
        $sisa_sesudah        = $total_bahan - $total_pakai;
        $keterangan            = $_POST['txtketerangan'];
        $ban_hcl            = $_POST['txthcl'];
        $ban_nh4cl            = $_POST['txtnh4cl'];
        $ban_zncl2            = $_POST['txtzncl2'];
        $ban_zn                = $_POST['txtzn'];
        $ban_al                = $_POST['txtal'];
        $ban_znal            = $_POST['txtznal'];
        $ban_pb                = $_POST['txtpb'];
        $ban_abu            = $_POST['txtabu_timah'];
        $dt_pts_bahan        = $_POST['txtpts_bahan'];
        $dt_pts_hcl            = $_POST['txtpts_hcl'];
        $dt_pts_timah        = $_POST['txtpts_timah'];
        $dt_pts_coiler        = $_POST['txtpts_coiler'];
        $dt_ganti_size        = $_POST['txtganti_size'];
        $dt_tunggu_bahan    = $_POST['txttunggu_bahan'];
        $dt_mesin_rusak        = $_POST['txtmesin_rusak'];
        $dt_lain2            = $_POST['txtlain'];
        $dt_ket_lain2        = "";
        $kwh_meter            = $_POST['txtkwh'];
        $pgn                = $_POST['txtpgn'];
        $no_orker            = $_POST['txtno_orker'];
        $kd_zn            = $_POST['txt_kdzn'];
        $kd_pb            = $_POST['txt_kdpb'];
        $li_cetak    = $_POST['txtli_cetak'];
        $zn_cetak    = $_POST['txtzn_cetak'];

        $data = [
            'tanggal' => $tanggal, 'team' => $team, 'shif' => $shif, 'pengawas' => $nama_pengawas, 'unit' => $unit, 'jml_opt' => $jml_opt, 'jam_kerja' => $jam_kerja,
            'bahan_baku_aw' => $bahan_baw, 'bahan_baku_ak' => $bahan_bak, 'bahan_baku_tot' => $total_bahan, 'diameter' => $diameter,
            'hasil_baik_roll' => $hasil_baik_rol, 'hasil_baik_berat' => $hasil_baik_berat, /*'hasil_sb_roll' => $hasil_sb_rol,
            'hasil_sb_berat' => $hasil_sb_berat,*/ 'total_rol' => $total_rol, 'total_berat' => $total_berat, 'aval_baik' => $aval_baik,
            'aval_ruwet' => $aval_ruwet, 'total_pemakaian' => $total_pakai, 'sisa_sesudah' => $sisa_sesudah, 'ket' => $keterangan,
            'Bban_hcl' => $ban_hcl, 'Bban_nh4cl' => $ban_nh4cl, 'Bban_zncl2' => $ban_zncl2, 'Bban_zn' => $ban_zn, 'Bban_al' => $ban_al,
            'Bban_znal' => $ban_znal, 'Bban_pb' => $ban_pb, 'Bban_abu_timah' => $ban_abu, 'dt_putus_bahan' => $dt_pts_bahan,
            'dt_putus_hcl' => $dt_pts_hcl, 'dt_putus_timah' => $dt_pts_timah, 'dt_putus_coiler' => $dt_pts_coiler,
            'dt_ganti_size' => $dt_ganti_size, 'dt_tunggu_bahan' => $dt_tunggu_bahan, 'dt_mesin_rusak' => $dt_mesin_rusak,
            'dt_lain2' => $dt_lain2, 'dt_ket_lain2' => $dt_ket_lain2, 'kwh_meter' => $kwh_meter, /*'pgn' => $pgn, 'status_del' == 0,*/
            'no_orker' => $no_orker, 'kd_zn' => $kd_zn, 'kd_pb' => $kd_pb, 'zn_cetakan' => $zn_cetak, 'li_cetak' => $li_cetak
        ];

        $this->Data_model->simpan_data($data, 'galvanis');
        redirect('produksi/tampil-galvanis');
    }

    public function edit_galv($kd)
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        $where = array('kd' => $kd);
        // $data['tampilzn'] = $this->Data_model->edit_data($where, 'gdg_zn')->result();
        // $data['produksi_galv'] = $this->Data_model->edit_data($where, 'gdg_pb')->result();
        $data['produksi_galv'] = $this->Data_model->edit_data($where, 'galvanis')->result();
        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/produksi/galvanis-edit', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }


    public function update_galv()
    {
        $kd = $_POST["kd"];
        // $tim        = $_POST["tim"];
        // if ($tim == "Biru") {
        //     $nama_pengawas = "Andik";
        // } elseif ($tim == "Merah") {
        //     $nama_pengawas = "Komari";
        // } else {
        //     $nama_pengawas = "Sari";
        // }

        $team = $_POST["tim"];
        $nama_pengawas = $_POST["nama_pengawas"];
        $shif    = $_POST["shif"];
        $unit                = $_POST['txtunit'];
        //$tgl				= $_POST['tgl'];
        //$bln				= $_POST['bln'];
        //$thn				= $_POST['thn'];
        //$tanggal			= $_POST["txttgl"];
        $tanggal            = date_format(date_create($_POST["txttgl"]), "Y-m-d");
        $diameter            = $_POST['txtdiameter'];
        $jml_opt            = $_POST['txtjml_opt'];
        $jam_kerja            = $_POST['txtjml_jam'];
        $bahan_baw            = $_POST['bahan_baw'];
        $bahan_bak            = $_POST['bahan_bak'];
        $total_bahan        = $bahan_baw + $bahan_bak;
        $hasil_baik_rol        = $_POST['txthasilbaik_rol'];
        $hasil_sb_rol        = $_POST['txthasilsb_rol'];
        $total_rol            = $hasil_baik_rol + $hasil_sb_rol;
        $hasil_baik_berat    = $_POST['txthasilbaik_berat'];
        $hasil_sb_berat        = $_POST['txthasilsb_berat'];
        $total_berat        = $hasil_baik_berat + $hasil_sb_berat;
        $aval_baik            = $_POST['txtaval_baik'];
        $aval_ruwet            = $_POST['txtaval_ruwet'];
        $total_pakai        = $total_berat + $aval_baik + $aval_ruwet;
        $sisa_sesudah        = $total_bahan - $total_pakai;
        $keterangan            = $_POST['txtketerangan'];
        $ban_hcl            = $_POST['txthcl'];
        $ban_nh4cl            = $_POST['txtnh4cl'];
        $ban_zncl2            = $_POST['txtzncl2'];
        $ban_zn                = $_POST['txtzn'];
        $ban_al                = $_POST['txtal'];
        $ban_znal            = $_POST['txtznal'];
        $ban_pb                = $_POST['txtpb'];
        $ban_abu            = $_POST['txtabu_timah'];
        $dt_pts_bahan        = $_POST['txtpts_bahan'];
        $dt_pts_hcl            = $_POST['txtpts_hcl'];
        $dt_pts_timah        = $_POST['txtpts_timah'];
        $dt_pts_coiler        = $_POST['txtpts_coiler'];
        $dt_ganti_size        = $_POST['txtganti_size'];
        $dt_tunggu_bahan    = $_POST['txttunggu_bahan'];
        $dt_mesin_rusak        = $_POST['txtmesin_rusak'];
        $dt_lain2            = $_POST['txtlain'];
        $dt_ket_lain2        = "";
        $kwh_meter            = $_POST['txtkwh'];
        $pgn                = $_POST['txtpgn'];
        $no_orker            = $_POST['txtno_orker'];
        $kd_zn            = $_POST['txt_kdzn'];
        $kd_pb            = $_POST['txt_kdpb'];
        $li_cetak    = $_POST['txtli_cetak'];
        $zn_cetak    = $_POST['txtzn_cetak'];

        $data = [
            'tanggal' => $tanggal, 'team' => $team, 'shif' => $shif, 'pengawas' => $nama_pengawas, 'unit' => $unit, 'jml_opt' => $jml_opt, 'jam_kerja' => $jam_kerja,
            'bahan_baku_aw' => $bahan_baw, 'bahan_baku_ak' => $bahan_bak, 'bahan_baku_tot' => $total_bahan, 'diameter' => $diameter,
            'hasil_baik_roll' => $hasil_baik_rol, 'hasil_baik_berat' => $hasil_baik_berat, /*'hasil_sb_roll' => $hasil_sb_rol,
            'hasil_sb_berat' => $hasil_sb_berat,*/ 'total_rol' => $total_rol, 'total_berat' => $total_berat, 'aval_baik' => $aval_baik,
            'aval_ruwet' => $aval_ruwet, 'total_pemakaian' => $total_pakai, 'sisa_sesudah' => $sisa_sesudah, 'ket' => $keterangan,
            'Bban_hcl' => $ban_hcl, 'Bban_nh4cl' => $ban_nh4cl, 'Bban_zncl2' => $ban_zncl2, 'Bban_zn' => $ban_zn, 'Bban_al' => $ban_al,
            'Bban_znal' => $ban_znal, 'Bban_pb' => $ban_pb, 'Bban_abu_timah' => $ban_abu, 'dt_putus_bahan' => $dt_pts_bahan,
            'dt_putus_hcl' => $dt_pts_hcl, 'dt_putus_timah' => $dt_pts_timah, 'dt_putus_coiler' => $dt_pts_coiler,
            'dt_ganti_size' => $dt_ganti_size, 'dt_tunggu_bahan' => $dt_tunggu_bahan, 'dt_mesin_rusak' => $dt_mesin_rusak,
            'dt_lain2' => $dt_lain2, 'dt_ket_lain2' => $dt_ket_lain2, 'kwh_meter' => $kwh_meter, 'pgn' => $pgn, /*'status_del' == 0,*/
            'no_orker' => $no_orker, 'kd_zn' => $kd_zn, 'kd_pb' => $kd_pb, 'zn_cetakan' => $zn_cetak, 'li_cetak' => $li_cetak
        ];
        $where = array('kd' => $kd);

        $this->Data_model->update_data($where, $data, 'galvanis');
        redirect('produksi/tampil-galvanis');
    }


    public function input_wdpc()
    {

        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/produksi/wdpc-input', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function tampil_wdpc()
    {

        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/produksi/wdpc-tampil', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function simpan_wdpc()
    {
        $tanggal            = date_format(date_create($_POST['txttgl']), "Y-m-d");
        $pengawas            = $_POST['txtpengawas'];
        $shif                = $_POST['txtshif'];
        $unit                = $_POST['txtunit'];
        $operator            = $_POST['txtoperator'];
        $jam_kerja            = $_POST['txtjml_jam'];
        $bahan_baw            = $_POST['bahan_baw'];
        $bahan_bak            = $_POST['bahan_bak'];
        $total_bahan        = $bahan_baw + $bahan_bak;
        $diameter            = $_POST['txtdiameter'];
        $hasil_baik_rol        = $_POST['txthasilbaik_rol'];
        // $hasil_sb_rol        = $_POST['txthasilsb_rol'];
        // $total_rol            = $hasil_baik_rol + $hasil_sb_rol;
        $hasil_baik_berat    = $_POST['txthasilbaik_berat'];
        // $hasil_sb_berat        = $_POST['txthasilsb_berat'];
        // $total_berat        = $hasil_baik_berat + $hasil_sb_berat;
        $aval_baik            = $_POST['txtaval_baik'];
        $aval_ruwet            = $_POST['txtaval_ruwet'];
        $total_pakai        = /*$total_berat + */ $aval_baik + $aval_ruwet;
        $sisa_keluar        = $_POST['txtsisa_keluar'];
        $sisa_sesudah        = $total_bahan - $total_pakai;
        $keterangan            = $_POST['txtketerangan'];
        $dies                = $_POST['txtdies'];
        $bahan_bantu1        = $_POST['txtdia_dies'];
        $bahan_bantu2        = $_POST['txtsabun'];
        $kwh_meter            = $_POST['txtkwh'];
        $orker            = $_POST['txtno_orker'];

        $data = [
            'tanggal' => $tanggal, 'pengawas' => $pengawas, 'shif' => $shif, 'unit' => $unit, 'operator' => $operator,
            'jam_kerja' => $jam_kerja, 'bahan_baku_aw' => $bahan_baw, 'bahan_baku_ak' => $bahan_bak, 'bahan_baku_tot' => $total_bahan, 'diameter' => $diameter, 'hasil_baik_roll' => $hasil_baik_rol, 'hasil_baik_berat' => $hasil_baik_berat, /*'hasil_sb_roll' => $hasil_sb_rol, 'hasil_sb_berat' => $hasil_sb_berat, 'total_rol' => $total_rol,*/ 'aval_baik' => $aval_baik, 'aval_ruwet' => $aval_ruwet, 'total_pemakaian' => $total_pakai, 'sisa_keluar' => $sisa_keluar, 'sisa_sesudah' => $sisa_sesudah, 'ket' => $keterangan, 'dies' => $dies, 'bahan_bantu1' => $bahan_bantu1, 'bahan_bantu2' => $bahan_bantu2, 'kwh_meter' => $kwh_meter, // 'status_del'=> $status_del,
            'no_orker' => $orker
        ];

        $this->Data_model->simpan_data($data, 'wdpc');
        redirect('produksi/tampil-wdpc');
    }


    public function edit_wdpc($kd)
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        $where = array('kd' => $kd);
        $data['produksi_wdpc'] = $this->Data_model->edit_data($where, 'wdpc')->result();
        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/produksi/wdpc-edit', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }


    public function update_wdpc()
    {
        $kd = $_POST["kd"];
        $tanggal            = date_format(date_create($_POST['txttgl']), "Y-m-d");
        $pengawas            = $_POST['txtpengawas'];
        $shif                = $_POST['txtshif'];
        $unit                = $_POST['txtunit'];
        $operator            = $_POST['txtoperator'];
        $jam_kerja            = $_POST['txtjml_jam'];
        $bahan_baw            = $_POST['bahan_baw'];
        $bahan_bak            = $_POST['bahan_bak'];
        $total_bahan        = $bahan_baw + $bahan_bak;
        $diameter            = $_POST['txtdiameter'];
        $hasil_baik_rol        = $_POST['txthasilbaik_rol'];
        // $hasil_sb_rol        = $_POST['txthasilsb_rol'];
        // $total_rol            = $hasil_baik_rol + $hasil_sb_rol;
        $hasil_baik_berat    = $_POST['txthasilbaik_berat'];
        // $hasil_sb_berat        = $_POST['txthasilsb_berat'];
        // $total_berat        = $hasil_baik_berat + $hasil_sb_berat;
        $aval_baik            = $_POST['txtaval_baik'];
        $aval_ruwet            = $_POST['txtaval_ruwet'];
        $total_pakai        = /*$total_berat + */ $aval_baik + $aval_ruwet;
        $sisa_keluar        = $_POST['txtsisa_keluar'];
        $sisa_sesudah        = $total_bahan - $total_pakai;
        $keterangan            = $_POST['txtketerangan'];
        $dies                = $_POST['txtdies'];
        $bahan_bantu1        = $_POST['txtdia_dies'];
        $bahan_bantu2        = $_POST['txtsabun'];
        $kwh_meter            = $_POST['txtkwh'];
        $orker            = $_POST['txtno_orker'];

        $data = [
            'tanggal' => $tanggal, 'pengawas' => $pengawas, 'shif' => $shif, 'unit' => $unit, 'operator' => $operator,
            'jam_kerja' => $jam_kerja, 'bahan_baku_aw' => $bahan_baw, 'bahan_baku_ak' => $bahan_bak, 'bahan_baku_tot' => $total_bahan, 'diameter' => $diameter, 'hasil_baik_roll' => $hasil_baik_rol, 'hasil_baik_berat' => $hasil_baik_berat, /*'hasil_sb_roll' => $hasil_sb_rol, 'hasil_sb_berat' => $hasil_sb_berat, 'total_rol' => $total_rol,*/ 'aval_baik' => $aval_baik, 'aval_ruwet' => $aval_ruwet, 'total_pemakaian' => $total_pakai, 'sisa_keluar' => $sisa_keluar, 'sisa_sesudah' => $sisa_sesudah, 'ket' => $keterangan, 'dies' => $dies, 'bahan_bantu1' => $bahan_bantu1, 'bahan_bantu2' => $bahan_bantu2, 'kwh_meter' => $kwh_meter, // 'status_del'=> $status_del,
            'no_orker' => $orker
        ];

        $where = array('kd' => $kd);

        $this->Data_model->update_data($where, $data, 'wdpc');
        redirect('produksi/tampil-wdpc');
    }


    public function input_wdpl()
    {

        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/produksi/wdpl-input', $data);
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
        $this->load->view('admin/produksi/wdpl-tampil', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function simpan_wdpl()
    {
        $tanggal            = date_format(date_create($_POST['txttgl']), "Y-m-d");
        $pengawas            = $_POST['txtpengawas'];
        $shif                = $_POST['txtshif'];
        $unit                = $_POST['txtunit'];
        $operator            = $_POST['txtoperator'];
        $jam_kerja            = $_POST['txtjml_jam'];
        $bahan_baw            = $_POST['bahan_baw'];
        $bahan_bak            = $_POST['bahan_bak'];
        $total_bahan        = $bahan_baw + $bahan_bak;
        $diameter                = $_POST['txtdiameter'];
        $hasil_baik_rol        = $_POST['txthasilbaik_rol'];
        // $hasil_sb_rol        = $_POST['txthasilsb_rol'];
        // $total_rol            = $hasil_baik_rol + $hasil_sb_rol;
        $hasil_baik_berat    = $_POST['txthasilbaik_berat'];
        // $hasil_sb_berat        = $_POST['txthasilsb_berat'];
        // $total_berat        = $hasil_baik_berat + $hasil_sb_berat;
        $aval_baik            = $_POST['txtaval_baik'];
        $aval_ruwet            = $_POST['txtaval_ruwet'];
        $total_pakai        = /*$total_berat +*/ $aval_baik + $aval_ruwet;
        $sisa_sesudah        = $total_bahan - $total_pakai;
        $keterangan            = $_POST['txtketerangan'];
        $bahan_bantu1        = $_POST['txtlubri'];
        $bahan_bantu2        = $_POST['txtsabun'];
        $kwh_meter            = $_POST['txtkwh'];
        $orker            = $_POST['txtno_orker'];

        $data = [
            'tanggal' => $tanggal, 'pengawas' => $pengawas, 'shif' => $shif, 'unit' => $unit, 'operator' => $operator, 'jam_kerja' => $jam_kerja,
            'bahan_baku_aw' => $bahan_baw, 'bahan_baku_ak' => $bahan_bak, 'bahan_baku_tot' => $total_bahan, 'diameter' => $diameter,
            'hasil_baik_roll' => $hasil_baik_rol, 'hasil_baik_berat' => $hasil_baik_berat, /*'hasil_sb_roll' => $hasil_sb_rol,
            'hasil_sb_berat' => $hasil_sb_berat, 'total_rol' => $total_rol, 'total_berat' => $total_berat,*/ 'aval_baik' => $aval_baik,     'aval_ruwet' => $aval_ruwet, 'total_pemakaian' => $total_pakai, 'sisa_sesudah' => $sisa_sesudah, 'ket' => $keterangan,
            'bahan_bantu1' => $bahan_bantu1, 'bahan_bantu2' => $bahan_bantu2, 'kwh_meter' => $kwh_meter, // 'status_del'=>$status_del,
            'no_orker' => $orker
        ];

        $this->Data_model->simpan_data($data, 'wdpl');
        redirect('produksi/tampil-wdpl');
    }


    public function edit_wdpl($kd)
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        $where = array('kd' => $kd);
        $data['produksi_wdpl'] = $this->Data_model->edit_data($where, 'wdpl')->result();
        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/produksi/wdpl-edit', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }


    public function update_wdpl()
    {
        $kd = $_POST["kd"];
        $tanggal            = date_format(date_create($_POST['txttgl']), "Y-m-d");
        $pengawas            = $_POST['txtpengawas'];
        $shif                = $_POST['txtshif'];
        $unit                = $_POST['txtunit'];
        $operator            = $_POST['txtoperator'];
        $jam_kerja            = $_POST['txtjml_jam'];
        $bahan_baw            = $_POST['bahan_baw'];
        $bahan_bak            = $_POST['bahan_bak'];
        $total_bahan        = $bahan_baw + $bahan_bak;
        $diameter                = $_POST['txtdiameter'];
        $hasil_baik_rol        = $_POST['txthasilbaik_rol'];
        // $hasil_sb_rol        = $_POST['txthasilsb_rol'];
        // $total_rol            = $hasil_baik_rol + $hasil_sb_rol;
        $hasil_baik_berat    = $_POST['txthasilbaik_berat'];
        // $hasil_sb_berat        = $_POST['txthasilsb_berat'];
        // $total_berat        = $hasil_baik_berat + $hasil_sb_berat;
        $aval_baik            = $_POST['txtaval_baik'];
        $aval_ruwet            = $_POST['txtaval_ruwet'];
        $total_pakai        = /*$total_berat +*/ $aval_baik + $aval_ruwet;
        $sisa_sesudah        = $total_bahan - $total_pakai;
        $keterangan            = $_POST['txtketerangan'];
        $bahan_bantu1        = $_POST['txtlubri'];
        $bahan_bantu2        = $_POST['txtsabun'];
        $kwh_meter            = $_POST['txtkwh'];
        $orker            = $_POST['txtno_orker'];

        $data = [
            'tanggal' => $tanggal, 'pengawas' => $pengawas, 'shif' => $shif, 'unit' => $unit, 'operator' => $operator, 'jam_kerja' => $jam_kerja,
            'bahan_baku_aw' => $bahan_baw, 'bahan_baku_ak' => $bahan_bak, 'bahan_baku_tot' => $total_bahan, 'diameter' => $diameter,
            'hasil_baik_roll' => $hasil_baik_rol, 'hasil_baik_berat' => $hasil_baik_berat, /*'hasil_sb_roll' => $hasil_sb_rol,
            'hasil_sb_berat' => $hasil_sb_berat, 'total_rol' => $total_rol, 'total_berat' => $total_berat,*/ 'aval_baik' => $aval_baik,     'aval_ruwet' => $aval_ruwet, 'total_pemakaian' => $total_pakai, 'sisa_sesudah' => $sisa_sesudah, 'ket' => $keterangan,
            'bahan_bantu1' => $bahan_bantu1, 'bahan_bantu2' => $bahan_bantu2, 'kwh_meter' => $kwh_meter, // 'status_del'=>$status_del,
            'no_orker' => $orker
        ];

        $where = ['kd' => $kd];

        $this->Data_model->update_data($where, $data, 'wdpl');
        redirect('produksi/tampil-wdpl');
    }


    public function input_kd()
    {

        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/produksi/kawat-duri-input', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
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
        $this->load->view('admin/produksi/kawat-duri-tampil', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function simpan_kd()
    {
        $tanggal            = date_format(date_create($_POST['txttgl']), "Y-m-d");
        $pengawas            = $_POST['txtpengawas'];
        $shif                = $_POST['txtshif'];
        $unit                = $_POST['txtunit'];
        $operator            = $_POST['txtoperator'];
        $jam_kerja            = $_POST['txtjml_jam'];
        $bahan_baw            = $_POST['bahan_baw'];
        $bahan_bak            = $_POST['bahan_bak'];
        $total_bahan        = $bahan_baw + $bahan_bak;
        $ukuran                = $_POST['txtukuran'];
        $hasil_baik_rol        = $_POST['txthasilbaik_rol'];
        // $hasil_sb_rol		= $_POST['txthasilsb_rol'];
        // $total_rol			= $hasil_baik_rol+$hasil_sb_rol;
        $hasil_baik_berat    = $_POST['txthasilbaik_berat'];
        // $hasil_sb_berat		= $_POST['txthasilsb_berat'];
        // $total_berat		=$hasil_baik_berat+$hasil_sb_berat;
        $aval_baik            = $_POST['txtaval_baik'];
        $aval_ruwet            = $_POST['txtaval_ruwet'];
        $total_pakai        = /*$total_berat+*/ $aval_baik + $aval_ruwet;
        $sisa_sesudah        = $total_bahan - $total_pakai;
        $keterangan            = $_POST['txtketerangan'];
        $kwh_meter            = $_POST['txtkwh'];
        $no_orker            = $_POST['txtno_orker'];

        $data = [
            'tanggal' => $tanggal, 'pengawas' => $pengawas, 'shif' => $shif, 'Unit' => $unit, 'operator' => $operator, 'jam_kerja' => $jam_kerja, 'bahan_baku_aw' => $bahan_baw, 'bahan_baku_ak' => $bahan_bak, 'bahan_baku_tot' => $total_bahan, 'ukuran' => $ukuran, 'hasil_baik_roll' => $hasil_baik_rol, 'hasil_baik_berat' => $hasil_baik_berat, /*'hasil_sb_roll'=>$hasil_sb_rol, 'hasil_sb_berat'=>$hasil_sb_berat, 'total_rol'=>$total_rol,'total_berat'=>$total_berat,*/ 'aval_baik' => $aval_baik, 'aval_ruwet' => $aval_ruwet, 'total_pemakaian' => $total_pakai, 'sisa_sesudah' => $sisa_sesudah, 'ket' => $keterangan, 'kwh_meter' => $kwh_meter,/*'status_del'=>$status_del,*/ 'no_orker' => $no_orker
        ];

        $this->Data_model->simpan_data($data, 'kawat_duri');
        redirect('produksi/tampil-kd');
    }


    public function edit_kd($kd)
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        $where = array('kd' => $kd);
        $data['produksi_kd'] = $this->Data_model->edit_data($where, 'kawat_duri')->result();
        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/produksi/kawat-duri-edit', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }


    public function update_kd()
    {
        $kd = $_POST["kd"];
        $tanggal            = date_format(date_create($_POST['txttgl']), "Y-m-d");
        $pengawas            = $_POST['txtpengawas'];
        $shif                = $_POST['txtshif'];
        $unit                = $_POST['txtunit'];
        $operator            = $_POST['txtoperator'];
        $jam_kerja            = $_POST['txtjml_jam'];
        $bahan_baw            = $_POST['bahan_baw'];
        $bahan_bak            = $_POST['bahan_bak'];
        $total_bahan        = $bahan_baw + $bahan_bak;
        $ukuran                = $_POST['txtukuran'];
        $hasil_baik_rol        = $_POST['txthasilbaik_rol'];
        // $hasil_sb_rol		= $_POST['txthasilsb_rol'];
        // $total_rol			= $hasil_baik_rol+$hasil_sb_rol;
        $hasil_baik_berat    = $_POST['txthasilbaik_berat'];
        // $hasil_sb_berat		= $_POST['txthasilsb_berat'];
        // $total_berat		=$hasil_baik_berat+$hasil_sb_berat;
        $aval_baik            = $_POST['txtaval_baik'];
        $aval_ruwet            = $_POST['txtaval_ruwet'];
        $total_pakai        = /*$total_berat+*/ $aval_baik + $aval_ruwet;
        $sisa_sesudah        = $total_bahan - $total_pakai;
        $keterangan            = $_POST['txtketerangan'];
        $kwh_meter            = $_POST['txtkwh'];
        $no_orker            = $_POST['txtno_orker'];

        $data = [
            'tanggal' => $tanggal, 'pengawas' => $pengawas, 'shif' => $shif, 'Unit' => $unit, 'operator' => $operator, 'jam_kerja' => $jam_kerja, 'bahan_baku_aw' => $bahan_baw, 'bahan_baku_ak' => $bahan_bak, 'bahan_baku_tot' => $total_bahan, 'ukuran' => $ukuran, 'hasil_baik_roll' => $hasil_baik_rol, 'hasil_baik_berat' => $hasil_baik_berat, /*'hasil_sb_roll'=>$hasil_sb_rol, 'hasil_sb_berat'=>$hasil_sb_berat, 'total_rol'=>$total_rol,'total_berat'=>$total_berat,*/ 'aval_baik' => $aval_baik, 'aval_ruwet' => $aval_ruwet, 'total_pemakaian' => $total_pakai, 'sisa_sesudah' => $sisa_sesudah, 'ket' => $keterangan, 'kwh_meter' => $kwh_meter,/*'status_del'=>$status_del,*/ 'no_orker' => $no_orker
        ];

        $where = ['kd' => $kd];

        $this->Data_model->update_data($where, $data, 'kawat_duri');
        redirect('produksi/tampil-kd');
    }


    public function tampil_bendrat()
    {

        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/uc', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }

    public function hapus_galvanis($kd)
    {
        $where = array('kd' => $kd);
        $this->Data_model->hapus_data($where, 'galvanis');
        redirect('produksi/tampil-galvanis');
    }

    public function hapus_wdpc($kd)
    {
        $where = array('kd' => $kd);
        $this->Data_model->hapus_data($where, 'wdpc');
        redirect('produksi/tampil-wdpc');
    }

    public function hapus_wdpl($kd)
    {
        $where = array('kd' => $kd);
        $this->Data_model->hapus_data($where, 'wdpl');
        redirect('produksi/tampil-wdpl');
    }

    public function hapus_kd($kd)
    {
        $where = array('kd' => $kd);
        $this->Data_model->hapus_data($where, 'kawat_duri');
        redirect('produksi/tampil-kd');
    }
}
