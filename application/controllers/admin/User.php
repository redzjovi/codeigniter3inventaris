<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_Model');
        $this->load->model('Pengembalian_Model');
        $this->load->model('Role_Model');
        $this->load->model('User_Model');

        if ($this->session->userdata('id_role') != 2)
        {
            redirect('login');
        }
    }

    public function index()
    {
        $data['breadcrumb'] = array(
			array('text' => 'User'),
		);
        $data['user']= $this->User_Model->get_all();
        $data['title'] = 'Daftar User';
        $data['view'] = 'user/index';
        $this->load->view('admin/layout/template', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Passowrd', 'trim|required|alpha_numeric');
        $this->form_validation->set_rules('nama_user', 'Nama User', 'trim|required|alpha_numeric');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
        $this->form_validation->set_rules('id_role', 'Role', 'trim|required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['breadcrumb'] = array(
    			array('link' => site_url('admin/kategori_barang'), 'text' => 'Kategori Barang'),
                array('text' => 'Tambah Kategori Barang'),
    		);
            $data['role'] = $this->Role_Model->get_all();
            $data['title'] = 'Tambah Kategori Barang';
            $data['view'] = 'user/create';
            $this->load->view('admin/layout/template', $data);
        }
        else
        {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'nama_user' => $this->input->post('nama_user'),
                'alamat' => $this->input->post('alamat'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'jurusan' => $this->input->post('jurusan'),
                'id_role' => $this->input->post('id_role'),
            );
            $this->User_Model->create($data);
            $this->session->set_flashdata('message_success', 'User berhasil ditambah');
            redirect('admin/user');
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|callback_check_unique_username');
        $this->form_validation->set_rules('password', 'Passowrd', 'trim|required|alpha_numeric');
        $this->form_validation->set_rules('nama_user', 'Nama User', 'trim|required|alpha_numeric');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
        $this->form_validation->set_rules('id_role', 'Role', 'trim|required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['breadcrumb'] = array(
    			array('link' => site_url('admin/kategori_barang'), 'text' => 'Kategori Barang'),
                array('text' => 'Ubah Kategori Barang'),
    		);
            $data['role'] = $this->Role_Model->get_all();
            $data['user'] = $this->User_Model->get_by_id($id);
            $data['title'] = 'Ubah Kategori Barang';
            $data['view'] = 'user/update';
            $this->load->view('admin/layout/template', $data);
        }
        else
        {
            $id_user = $this->input->post('id_user');
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'nama_user' => $this->input->post('nama_user'),
                'alamat' => $this->input->post('alamat'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'jurusan' => $this->input->post('jurusan'),
                'id_role' => $this->input->post('id_role'),
            );
            $this->User_Model->update($id_user, $data);
            $this->session->set_flashdata('message_success', 'User berhasil diubah');
            redirect('admin/user');
        }
    }

    public function delete($id)
    {
        $num_rows = $this->Peminjaman_Model->get_by_id_user($id);
        $num_rows_2 = $this->Pengembalian_Model->get_by_id_user($id);
        if ($num_rows > 0)
        {
            $this->session->set_flashdata('message_info', 'User tidak bisa dihapus karena sedang dipakai di peminjaman');
        }
        else if ($num_rows_2 > 0)
        {
            $this->session->set_flashdata('message_info', 'User tidak bisa dihapus karena sedang dipakai di pengembalian');
        }
        else
        {
            $this->User_Model->delete($id);
            $this->session->set_flashdata('message_success', 'User berhasil dihapus');
        }
        redirect('admin/user', 'refresh');
    }

    public function check_unique_username()
	{
		$id_user = $this->input->post('id_user');
		$username = $this->input->post('username');
		$result = $this->User_Model->check_unique_username($id_user, $username);

		if ($result == 0)
		{
			$response = true;
		}
		else
		{
			$this->form_validation->set_message('check_unique_username', '%s must be unique');
			$response = false;
		}
		return $response;
	}
}
?>