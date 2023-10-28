<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        // $this->load->model('Admin_model', 'Auth');
        $this->load->model('Menu_model');
    }

    public function index()
    {
        $data['title'] = 'Menu Manajemen';
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        // $data['user'] = $this->db->get_where('user')->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('admin/source');
            $this->load->view('template/footer');
        } else {
            $this->db->insert('user_menu', [
                'menu' => $this->input->post('menu'),
                'icon' => $this->input->post('icon')
            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat anda berhasil menambahkan menu baru
          </div>');
            redirect('menu');
        }
    }


    // edit menu
    public function edit_menu()
    {
        // get user information
        // $data['user'] = $this->Auth->getUserByUsername($this->session->userdata('username'));


        $data['menu'] = $this->Menu_model->getMenu();
        $data['title'] = 'Menu Management';

        $this->form_validation->set_rules('menu', 'Menu', 'required|trim', [
            'required' => 'Menu tidak boleh kosong!!'
        ]);
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim', [
            'required' => 'Icon tidak boleh kosong!!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('template/footer');
        } else {
            // $this->Menu_model->editMenu($this->input->post());
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            //     Selamat anda berhasil menambahkan menu baru
            //   </div>');
            // redirect('menu');

            $id = $this->input->post('id');
            $menu = $this->input->post('menu');
            $icon = $this->input->post('icon');
            $this->Menu_model->edit_menu($id, $menu, $icon);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Selamat anda berhasil mengubah menu
              </div>');
            redirect('menu');
        }
    }


    public function sub_menu()
    {
        $data['title'] = 'Submenu Manajemen';
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        // $data['user'] = $this->db->get_where('user')->row_array();

        $this->load->model('menu_model', 'menu');


        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('admin/source');
            $this->load->view('template/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat anda berhasil menambahkan sub menu baru
          </div>');
            redirect('menu/sub-menu');
        }
    }


    public function edit_submenu()
    {
        // get user information
        // $data['user'] = $this->Admin_model->getUserByUsername($this->session->userdata('username'));

        // get menu
        $data['menu'] = $this->Menu_model->getMenu();

        // get submenu
        $data['subMenu'] = $this->Menu_model->getSubMenu();

        // form validation
        $this->form_validation->set_rules('title', 'Title', 'required|trim', [
            'required' => 'Title tidak boleh kosong!!'
        ]);
        $this->form_validation->set_rules('menu_id', 'Menu', 'required|trim', [
            'required' => 'Menu tidak boleh kosong!!'
        ]);
        $this->form_validation->set_rules('url', 'Url', 'required|trim', [
            'required' => 'Url tidak boleh kosong!!'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Submenu Management';
            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('menu/subMenu', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'is_active' => $this->input->post('is_active')
            ];

            // send submenu data to model
            $this->Menu_model->editSubmenu($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat anda berhasil mengubah sub menu
          </div>');
            redirect('menu/sub-menu');
        }
    }


    // this function can delete from various table
    public function delete($type = null, $id = null)
    {
        if (is_null($id) || is_null($type)) {
            redirect('menu');
        }
        switch ($type):
            case 'menu':
                $this->Menu_model->deleteMenu($id);
                redirect('menu');
                break;

            case 'submenu':
                $this->Menu_model->deleteSubmenu($id);
                redirect('menu/sub-menu');
                break;
        endswitch;
    }

    public function getMenuEdit()
    {
        $id = $this->input->post('id');
        echo json_encode($this->Menu_model->getMenuById($id));
    }
}
