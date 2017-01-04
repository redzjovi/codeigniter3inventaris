<?php
class Barang extends CI_Controller
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
		$data['barang']= $this->Barang_Model->get_all();
        $data['breadcrumb'] = array(
			array('text' => 'Barang'),
		);
        $data['title'] = 'Admin - Barang';
		$data['view'] = 'barang/index';
		$this->load->view('admin/layout/template', $data);
	}

    public function create()
    {
        $this->form_validation->set_rules('kode_barang', 'Kode barang', 'trim|required');
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'trim|required');
        $this->form_validation->set_rules('jumlah_barang', 'Jumlah barang', 'trim|required|numeric');

        if ($this->form_validation->run() === FALSE)
        {
            $data['breadcrumb'] = array(
    			array('link' => site_url('admin/barang'), 'text' => 'Barang'),
                array('text' => 'Tambah Barang'),
    		);
            $data['kategori_barang'] = $this->Kategori_Barang_Model->get_all();
            $data['title'] = 'Tambah Barang';
            $data['view'] = 'barang/create';
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
}
?>