<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('Admin_model');
    }


    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where(
            'user',
            ['role_id' => $this->session->userdata('role_id')]
        )->row_array();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('template/index', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }


    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        // set rules
        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/akses/role', $data);
            $this->load->view('template/footer');
        } else {
            $this->Admin_model->addRole($this->input->post());
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat anda berhasil menambahkan role baru
          </div>');
            redirect('admin/role');
        }
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/akses/role-access', $data);
        $this->load->view('admin/source');
        $this->load->view('template/footer');
    }


    public function getRoleEdit()
    {
        echo json_encode($this->Admin_model->getRoleById($this->input->post('id')));
    }

    public function delete($id = null)
    {
        if (is_null($id));

        $this->Admin_model->deleteRole($id);
        redirect('admin/role');
    }

    public function edit_role()
    {
        // get user information
        // $data['user'] = $this->Admin_model->getUserByUsername($this->session->userdata('username'));
        // $data['title'] = 'Role';
        $data['role'] = $this->Admin_model->getRole();

        // set rules
        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('template/footer');
        } else {
            $id = $this->input->post('id');
            $role = $this->input->post('role');
            $this->Admin_model->editRole($id, $role);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anda telah berhasil edit role 
          </div>');
            redirect('admin/role');
        }
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];


        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Akses telah dirubah!
      </div>');
    }

    public function add_user()
    {
        $data['user'] = $this->Admin_model->getUserByUsername($this->session->userdata('username'));

        $data['title'] = 'Tambah User';

        $data['useradmin'] = $this->Admin_model->getUser();

        $this->form_validation->set_rules('name', 'Jabatan', 'required|trim', [
            'required' => 'Jabatan tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', [
            'required' => 'Username tidak boleh kosong',
            'is_unique' => 'Username telah digunakan'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/akses/tambah-user', $data);
            $this->load->view('admin/source');
            $this->load->view('template/footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('user', $data);
            redirect('admin/add-user');
        }
    }


    public function delete_user($id = null)
    {
        if (is_null($id));

        $this->Admin_model->deleteUser($id);
        redirect('admin/add-user');
    }


    // edit menu
    public function edit_user()
    {
        // get user information
        // $data['user'] = $this->Auth->getUserByUsername($this->session->userdata('username'));

        $data['useradmin'] = $this->Admin_model->getUser();
        $data['title'] = 'Edit user';

        // $this->form_validation->set_rules('name', 'name', 'required|trim');
        // $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', [
        //     'required' => 'Username tidak boleh kosong',
        //     'is_unique' => 'Username telah digunakan'
        // ]);

        // if ($this->form_validation->run() == FALSE) {
        //     $this->load->view('template/header', $data);
        //     $this->load->view('admin/navbar', $data);
        //     $this->load->view('admin/sidebar', $data);
        //     $this->load->view('admin/akses/tambah-user', $data);
        //     $this->load->view('template/footer');
        // } else {

        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $role_id = $this->input->post('role_id');
        $is_active = $this->input->post('is_active');


        $this->Admin_model->edit_user($id, $name, $username, $password, $role_id, $is_active);
        // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        //     Anda telah berhasil mengubah user
        //   </div>');
        redirect('admin/add-user');
        // }
    }


    public function ganti_password()
    {
        // get user information
        $data['user'] = $this->Admin_model->getUserByUsername($this->session->userdata('username'));

        $data['title'] = 'Ganti Password';

        // set rules
        $this->form_validation->set_rules('pass_lama', 'Password lama', 'required|trim', [
            'required' => 'Password lama kosong'
        ]);
        $this->form_validation->set_rules('pass_baru', 'Password baru', 'required|trim|min_length[5]', [
            'required' => 'Password baru kosong',
            'min_length' => 'Password is too short!'
        ]);

        $this->form_validation->set_rules('confirm_password', 'Konfirmasi password', 'required|trim|matches[pass_baru]', [
            'required' => 'Konfirmasi password kosong',
            'matches' => "Password didn't match!"
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/ganti-password', $data);
            $this->load->view('template/footer');
        } else {
            $pass_lama = $this->input->post('pass_lama');
            $pass_baru = $this->input->post('pass_baru');
            // cek password
            if (!password_verify($pass_lama, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password yang anda masukkan tidak sesuai
              </div>');
                redirect('admin/ganti-password');
            } else {
                if ($pass_lama == $pass_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password baru tidak boleh sama
              </div>');
                    redirect('admin/ganti-password');
                } else {
                    $password_hass = password_hash($this->input->post('password', $pass_baru), PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hass);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Selamat password anda telah berubah
              </div>');
                    redirect('admin/ganti-password');
                }
            }
        }
    }


    public function uc()
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
}
