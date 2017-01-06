<?php
class Pengembalian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Barang_Model');
        // $this->load->model('Peminjaman_Model');
        $this->load->model('Pengembalian_Model');
        // $this->load->model('User_Model');

        if ($this->session->userdata('id_role') != 2)
        {
            redirect('login');
        }
    }

    public function index()
	{
		$data['breadcrumb'] = array(
			array('text' => 'Pengembalian'),
		);
        $data['pengembalian']= $this->Pengembalian_Model->get_all();
        $data['title'] = 'Pengembalian';
		$data['view'] = 'pengembalian/index';
		$this->load->view('admin/layout/template', $data);
	}

    public function create()
    {
        $this->form_validation->set_rules('id_user', 'User', 'trim|required');
        $this->form_validation->set_rules('id_barang', 'Nama barang', 'trim|required');
        $this->form_validation->set_rules('jumlah_barang', 'Jumlah barang', 'trim|required|numeric|greater_than[0]|callback_stock_check');
        $this->form_validation->set_rules('tanggal_pinjam', 'Tanggal pinjam', 'trim|required');
        $this->form_validation->set_rules('lama_pinjam', 'Lama pinjam', 'trim|required|numeric|greater_than[0]');

        if ($this->form_validation->run() === FALSE)
        {
            $data['barang'] = $this->Barang_Model->get_all();
            $data['breadcrumb'] = array(
    			array('link' => site_url('admin/peminjaman'), 'text' => 'Peminjaman'),
                array('text' => 'Tambah Peminjaman'),
    		);
            $data['user'] = $this->User_Model->get_by_nama_role('user');
            $data['title'] = 'Tambah Peminjaman';
            $data['view'] = 'peminjaman/create';
            $this->load->view('admin/layout/template', $data);
        }
        else
        {
            $id_user = $this->input->post('id_user');
            $id_barang = $this->input->post('id_barang');
            $jumlah_barang = $this->input->post('jumlah_barang');
            $tanggal_pinjam = date('Y-m-d', strtotime($this->input->post('tanggal_pinjam')));
            $lama_pinjam = $this->input->post('lama_pinjam');
            $tanggal_kembali = date('Y-m-d', strtotime($this->input->post('tanggal_pinjam').' + '.$lama_pinjam.' days'));

            $data = array(
                'id_user' => $id_user,
                'id_barang' => $id_barang,
                'jumlah_barang' => $jumlah_barang,
                'tanggal_pinjam' => $tanggal_pinjam,
                'lama_pinjam' => $lama_pinjam,
                'tanggal_kembali' => $tanggal_kembali,
            );
            $id = $this->Peminjaman_Model->create($data); // create peminjaman

            $data = array(
                'id_peminjaman' => $id,
                'id_user' => $id_user,
                'id_barang' => $id_barang,
                'jumlah_barang' => $jumlah_barang,
                'tanggal_kembali' => $tanggal_kembali,
            );
            $this->Pengembalian_Model->create($data); // create pengembalian

            $stock = $this->Barang_Model->get_stock_by_id($id_barang) - $jumlah_barang;
            $data = array('jumlah_barang' => $stock);
            $this->Barang_Model->update($id_barang, $data); // update stock

            $this->session->set_flashdata('message_success', 'Peminjaman berhasil ditambah');
            redirect('admin/peminjaman');
        }
    }

    public function view($id)
    {
        $data['breadcrumb'] = array(
			array('link' => site_url('admin/pengembalian'), 'text' => 'Pengembalian'),
            array('text' => 'Lihat Pengembalian'),
		);
        $data['pengembalian'] = $this->Pengembalian_Model->get_by_id($id);
        $data['title'] = 'Lihat Pengembalian';
        $data['view'] = 'pengembalian/view';
        $this->load->view('admin/layout/template', $data);
    }

    public function returned($id)
    {
        $data = array('status' => 1);
        $this->Pengembalian_Model->update_status($id, $data); // update status in pengembalian

        $peminjaman = $this->Peminjaman_Model->get_by_id($id);
        $id_barang = $peminjaman->id_barang;
        $jumlah_barang = $peminjaman->jumlah_barang;

        $stock = $this->Barang_Model->get_stock_by_id($id_barang) + $jumlah_barang;
        $data = array('jumlah_barang' => $stock);
        $this->Barang_Model->update($id_barang, $data); // update stock

        $this->session->set_flashdata('message_success', 'Peminjaman berhasil dikembalikan');
        redirect('admin/peminjaman');
    }

    public function stock_check()
    {
        $id = $this->input->post('id_barang');
        $jumlah_barang = $this->input->post('jumlah_barang');
        $stock = $this->Barang_Model->get_stock_by_id($id);

        if ($stock < $jumlah_barang)
        {
            $this->form_validation->set_message('stock_check', 'The {field} can\'t be larger than stock');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}
 ?>