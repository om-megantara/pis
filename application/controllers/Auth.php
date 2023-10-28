<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if ($this->session->userdata('authenticated'))
            redirect('admin');

        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'valid_username' => 'Username dan password yang anda masukkan salah'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('login/header');
            $this->load->view('login/index');
            $this->load->view('login/footer');
        } else {
            //validasi login
            $this->login();
        }
    }


    private function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            //User Aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password Salah!!!
                  </div>');
                    redirect('auth');
                }
                $data = [
                    'authenticated' => true,
                    'username' => $user['username'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if ($user['role_id'] >= 1) {
                    redirect('admin');
                } else
                    redirect('home');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Pengguna username masih Aktif
              </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Username belum terdaftar. Mohon daftarkan akun anda!
          </div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->sess_destroy(); // Hapus semua session    
        redirect('auth'); // Redirect ke halaman login  
    }
}
