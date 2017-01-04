<?php
class Role extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
			array('text' => 'Role'),
		);
        $data['role']= $this->Role_Model->get_all();
        $data['title'] = 'Daftar Role';
        $data['view'] = 'role/index';
        $this->load->view('admin/layout/template', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules('nama_role', 'Nama Role', 'required|alpha_numeric');

        if ($this->form_validation->run() === FALSE)
        {
            $data['breadcrumb'] = array(
    			array('link' => site_url('admin/role'), 'text' => 'Role'),
                array('text' => 'Tambah Role'),
    		);
            $data['title'] = 'Tambah Role';
            $data['view'] = 'role/create';
            $this->load->view('admin/layout/template', $data);
        }
        else
        {
            $data = array(
                'nama_role'	=> $this->input->post('nama_role')
            );

            $this->Role_Model->create($data);
            $this->session->set_flashdata('message_success', 'Role berhasil ditambah');
            redirect('admin/role');
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama_role', 'Nama Role', 'required|alpha_numeric');

        if ($this->form_validation->run() === FALSE)
        {
            $data['breadcrumb'] = array(
    			array('link' => site_url('admin/role'), 'text' => 'Role'),
                array('text' => 'Ubah Role'),
    		);
            $data['role'] = $this->Role_Model->get_by_id($id);
            $data['title'] = 'Ubah Role';
            $data['view'] = 'role/update';
            $this->load->view('admin/layout/template', $data);
        }
        else
        {
            $id = $this->input->post('id_role');
            $data = array(
                'nama_role'	=> $this->input->post('nama_role')
            );

            $this->Role_Model->update($id, $data);
            $this->session->set_flashdata('message_success', 'Role berhasil diubah');
            redirect('admin/role');
        }
    }

    public function delete($id)
    {
        $num_rows = $this->User_Model->get_by_id_role($id);
        if ($num_rows > 0)
        {
            $this->session->set_flashdata('message_info', 'Role tidak bisa dihapus karena sedang dipakai di User');
        }
        else
        {
            $this->Role_Model->delete($id);
            $this->session->set_flashdata('message_success', 'Role berhasil dihapus');
        }
        redirect('admin/role', 'refresh');
    }
}
?>