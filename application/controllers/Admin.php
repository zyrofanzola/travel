<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_acces_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_acces_menu', $data);
        } else {
            $this->db->delete('user_acces_menu', $data);
        }


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Access Changed</div>');
    }

    public function dataProduk()
    {
        $data['title'] = 'Product Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->model_produk->tampil_data()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dataproduk', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $nama_produk = $this->input->post('nama_produk');
        $keterangan = $this->input->post('keterangan');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $gambar = $_FILES['gambar']['name'];

        if ($gambar = '') {
        } else {
            $config['upload_path'] = 'assets/img/produk/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Image failed to upload";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_produk' => $nama_produk,
            'keterangan' => $keterangan,
            'harga' => $harga,
            'stok' => $stok,
            'gambar' => $gambar

        );

        $this->model_produk->tambah_produk($data, 'tb_produk');
        redirect('admin/dataproduk/');
    }

    public function edit($id)
    {
        $data['title'] = 'Product Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('id_produk' => $id);
        $data['produk'] = $this->model_produk->edit_produk($where, 'tb_produk')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit_produk', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $id             = $this->input->post('id_produk');
        $nama_produk    = $this->input->post('nama_produk');
        $keterangan     = $this->input->post('keterangan');
        $harga          = $this->input->post('harga');
        $stok           = $this->input->post('stok');

        $data = array(
            'nama_produk'   => $nama_produk,
            'keterangan'    => $keterangan,
            'harga'         => $harga,
            'stok'          => $stok
        );

        $where = array(
            'id_produk' => $id
        );

        $this->model_produk->update_data($where, $data, 'tb_produk');
        redirect('admin/dataproduk');
    }

    public function hapus($id)
    {
        $where = array('id_produk' => $id);
        $this->model_produk->hapus_data($where, 'tb_produk');
        redirect('admin/dataproduk');
    }

    public function datapesanan()
    {
        $data['title'] = 'Invoice';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->model_invoice->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datapesanan', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_invoice)
    {
        $data['title'] = 'Detail';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detail_invoice', $data);
        $this->load->view('templates/footer');
    }

    public function print($id_invoice)
    {
        $data['title'] = 'Detail';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //$data['produk'] = $this->model_invoice->tampil_invoice("tb_invoice")->result();
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);


        //$this->load->view('templates/header', $data);
        //$this->load->view('templates/sidebar', $data);
        //$this->load->view('templates/topbar', $data);
        $this->load->view('admin/print_produk', $data);
        //$this->load->view('templates/footer');
    }

    public function addrole()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">
                    Role added</div>');
            redirect('admin/role');
        }
    }
    public function hapus_data_role($id)
    {
        $this->Menu_model->hapus_data_role($id);
        $this->session->set_flashdata('flash', 'Deleted');
        redirect('admin/role');
    }

    public function report()
    {
        $data['title'] = 'Report';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->model_invoice->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/report', $data);
        $this->load->view('templates/footer');
    }
}
