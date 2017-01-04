<?php
class Kategori_Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_Model');
        $this->load->model('Kategori_Barang_Model');

        if ($this->session->userdata('id_role') != 2)
        {
            redirect('login');
        }
    }

    public function index()
    {
        $data['breadcrumb'] = array(
			array('text' => 'Kategori Barang'),
		);
        $data['kategori_barang']= $this->Kategori_Barang_Model->get_all();
        $data['title'] = 'Daftar Kategori Barang';
        $data['view'] = 'kategori_barang/index';
        $this->load->view('admin/layout/template', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|alpha_numeric');

        if ($this->form_validation->run() === FALSE)
        {
            $data['breadcrumb'] = array(
    			array('link' => site_url('admin/kategori_barang'), 'text' => 'Kategori Barang'),
                array('text' => 'Tambah Kategori Barang'),
    		);
            $data['title'] = 'Tambah Kategori Barang';
            $data['view'] = 'kategori_barang/create';
            $this->load->view('admin/layout/template', $data);
        }
        else
        {
            $data = array(
                'nama_kategori'	=> $this->input->post('nama_kategori')
            );

            $this->Kategori_Barang_Model->create($data);
            $this->session->set_flashdata('message_success', 'Kategori barang berhasil ditambah');
            redirect('admin/kategori_barang');
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|alpha_numeric');

        if ($this->form_validation->run() === FALSE)
        {
            $data['breadcrumb'] = array(
    			array('link' => site_url('admin/kategori_barang'), 'text' => 'Kategori Barang'),
                array('text' => 'Ubah Kategori Barang'),
    		);
            $data['kategori_barang'] = $this->Kategori_Barang_Model->get_by_id($id);
            $data['title'] = 'Ubah Kategori Barang';
            $data['view'] = 'kategori_barang/update';
            $this->load->view('admin/layout/template', $data);
        }
        else
        {
            $id = $this->input->post('id_kategori');
            $data = array(
                'nama_kategori'	=> $this->input->post('nama_kategori')
            );

            $this->Kategori_Barang_Model->update($id, $data);
            $this->session->set_flashdata('message_success', 'Kategori barang berhasil diubah');
            redirect('admin/kategori_barang');
        }
    }

    public function delete($id)
    {
        $num_rows = $this->Barang_Model->get_by_id_kategori($id);
        if ($num_rows > 0)
        {
            $this->session->set_flashdata('message_info', 'Kategori barang tidak bisa dihapus karena sedang dipakai di barang');
        }
        else
        {
            $this->Kategori_Barang_Model->delete($id);
            $this->session->set_flashdata('message_success', 'Kategori barang berhasil dihapus');
        }
        redirect('admin/kategori_barang', 'refresh');
    }
}
?>