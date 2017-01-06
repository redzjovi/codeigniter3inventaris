<?php
class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_Model');
        $this->load->model('Detail_Barang_Model');
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
                'kode_barang' => $this->input->post('kode_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'jumlah_barang' => $this->input->post('jumlah_barang'),
                'status' => $this->input->post('status'),
                'id_kategori' => $this->input->post('id_kategori'),
            );
            $id_barang = $this->Barang_Model->create($data);

            $data = array(
                'id_barang' => $id_barang,
                'madein_barang' => $this->input->post('madein_barang'),
                'merk_barang' => $this->input->post('merk_barang'),
                'asal_dana' => $this->input->post('asal_dana'),
                'tahun_pengadaan' => $this->input->post('tahun_pengadaan'),
                'keterangan' => $this->input->post('keterangan'),
            );
            $this->Detail_Barang_Model->create($data);

            $this->session->set_flashdata('message_success', 'Barang berhasil ditambah');
            redirect('admin/barang');
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('kode_barang', 'Kode barang', 'trim|required');
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'trim|required');
        $this->form_validation->set_rules('jumlah_barang', 'Jumlah barang', 'trim|required|numeric');

        if ($this->form_validation->run() === FALSE)
        {
            $data['barang'] = $this->Barang_Model->get_by_id($id);
            $data['breadcrumb'] = array(
    			array('link' => site_url('admin/barang'), 'text' => 'Barang'),
                array('text' => 'Ubah Barang'),
    		);
            $data['detail_barang'] = $this->Detail_Barang_Model->get_by_id($id);
            $data['kategori_barang'] = $this->Kategori_Barang_Model->get_all();
            $data['title'] = 'Tambah Barang';
            $data['view'] = 'barang/update';
            $this->load->view('admin/layout/template', $data);
        }
        else
        {
            $id_barang = $this->input->post('id_barang');
            $data = array(
                'kode_barang' => $this->input->post('kode_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'jumlah_barang' => $this->input->post('jumlah_barang'),
                'status' => $this->input->post('status'),
                'id_kategori' => $this->input->post('id_kategori'),
            );
            $this->Barang_Model->update($id_barang, $data);

            $data = array(
                'madein_barang' => $this->input->post('madein_barang'),
                'merk_barang' => $this->input->post('merk_barang'),
                'asal_dana' => $this->input->post('asal_dana'),
                'tahun_pengadaan' => $this->input->post('tahun_pengadaan'),
                'keterangan' => $this->input->post('keterangan'),
            );
            $this->Detail_Barang_Model->update($id_barang, $data);

            $this->session->set_flashdata('message_success', 'Barang berhasil diubah');
            redirect('admin/barang');
        }
    }

    public function delete($id)
    {
        $this->Barang_Model->delete($id);
        $this->Detail_Barang_Model->delete($id);
        $this->session->set_flashdata('message_success', 'Barang berhasil dihapus');
        redirect('admin/barang');
    }

    public function get()
    {
        $id = $this->input->get('id');
        $data = $this->Barang_Model->get_by_id($id);
        echo json_encode($data);
    }
}
?>