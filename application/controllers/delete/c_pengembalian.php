<?php defined('BASEPATH')or exit('No direct script access allowed');

class C_pengembalian extends CI_Controller{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('pengembalian');
		$this->pengembalian->get_all();
		$this->load->helper('form','url');
	}

	public function index($offset=0)
	{
		$data['title']='Daftar Peminjaman';
		$data['qkem']=$this->pengembalian->get_all();
		$this->load->library('pagination');

	$config['base_url'] = site_url('pengembalian/index/');
			$config['total_rows'] = $this->pengembalian->province_num_rows();
			$config["per_page"]=$per_page=5;
			$config["uri_segment"]=3;
//bootrap
			$config['full_tag_open']="<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
			$config['full_tag_close']="</ul>";
			$config['num_tag_open']='<li>';
			$config['num_tag_close']='</li>';
			$config['cur_tag_open']="<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close']="<span class='sr-only'></span></a></li>";
			$config['next_tag_open']="<li>";
			$config['next_tagl_close']="</li>";
			$config['prev_tag_open']="<li>";
			$config['prev_tagl_close']="</li>";
			$config['first_tag_open']="<li>";
			$config['first_tagl_close']="</li>";
			$config['last_tag_open']="<li>";
			$config['last_tagl_close']="</li>";
			
			$this->pagination->initialize($config);
			$data['offset'] = $offset;
			$data['paging'] = $this->pagination->create_links();
			$data['action'] = site_url('c_pengembalian/search_keyword');
			
			$page=($this->uri->segment(3))? $this->uri->segment(3) : 0 ;
			$data['data']=$this->pengembalian->province($per_page,$page);
			$this->load->view('pengembalian/v_pengembalian',$data);
}

function search_keyword($offset=0)
		{
			$jeniscari = $this->input->post('jeniscari');
			$textcari = $this->input->post('textcari');
			$data['result'] = $this->pengembalian->search($jeniscari,$textcari);
			$data['action'] = site_url('c_pengembalian/search_keyword');
			$data['offset'] = $offset;
			$this->load->view('pengembalian/vcari',$data);
		}

	
	public function det($id)
	{
		$data['title']="Detail Data Peminjaman";
		$data['qkem']=$this->pengembalian->get_byid($id);
		$this->load->view('pengembalian/detail',$data);

	}

	public function hapus($id)
	{
		$this->pengembalian->delete($id);
		$this->session->set_flashdata("pesan","<div class=\"alert alert-success\"id=\"alert\"><i class=\"glyphicon glyphicon-ok\">
			</i><strong>Success!</strong> Data Berhasil dihapus
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
		redirect('c_pengembalian','refresh');
	}

	public function check_id($id)
	{
		$this->db->select('*');
		$this->db->from('pengembalian');
		$this->db->where('kode_pengembalian',$id);
		$query=$this->db->get();
			if($query->num_rows() > 0)
			{
				return TRUE;
			}else{
				return FALSE;
			}

	}
	public function tambah()
	{
		$data['title']='Tambah Data Pengembalian';
		$this->load->view('pengembalian/add',$data);
	}
	public function action_add()
	{
		$id=$this->input->post('kode_pengembalian');
		$cek=$this->check_id($id);
		if($cek)
		{
			$this->session->set_flashdata("pesan","<div class=\"alert alert-warning\"id=\"alert\"><i class=\"glyphicon glyphicon-ex\">
				</i><strong>Warning!</strong> Kode Telah Di Gunakan
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
			redirect('c_pengembalian','refresh');
		}else{
			$kode_pinjam		=$this->input->post('kode_pinjam');
			$kode_petugas		=$this->input->post('kode_petugas');
			$username			=$this->input->post('username');
			$kode_barang		=$this->input->post('kode_barang');
			$tanggal_kembali	=$this->input->post('tanggal_kembali');
			$status				=$this->input->post('status');
		

			$data 	=array(
				'kode_pengembalian'		=>$id,
				'kode_pinjam'			=>$kode_pinjam,
				'kode_petugas'			=>$kode_petugas,
				'username'				=>$username,	
				'kode_barang'			=>$kode_barang,
				'tanggal_kembali'		=>$tanggal_kembali,
				'status'				=>$status
				);

			$this->pengembalian->tambah($data);
			$this->session->set_flashdata("pesan","<div class=\"alert alert-success\"id=\"alert\"><i class=\"glyphicon glyphicon-ok\">
				</i><strong>Success!</strong> Data Berhasil Di Tambah 
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
			redirect('c_pengembalian','refresh');
		}

	}
	public function update()
	{
		$kode_pengembalian	=$this->uri->segment(3);
		$data['title']		="Ubah Data";
		$data['qkem']		=$this->pengembalian->get_byid($kode_pengembalian);
		$this->load->view('pengembalian/up',$data);
	}
	public function action_update()
	{
		$data = array(
			'kode_pengembalian'=>$this->input->post('kode_pengembalian'),
			'kode_pinjam'=>$this->input->post('kode_pinjam'),
			'kode_petugas'=>$this->input->post('kode_petugas'),
			'username'=>$this->input->post('username'),
			'kode_barang'=>$this->input->post('kode_barang'),
			'tanggal_kembali'=>$this->input->post('tanggal_kembali'),
			'status'=>$this->input->post('status')
			);
		$this->pengembalian->update($this->input->post('id_hidden'),$data);
		$this->session->set_flashdata("pesan","<div class=\"alert alert-success\"id=\"alert\"><i class=\"glyphicon glyphicon-ok\">
			</i><strong>Success!</strong> Data Berhasil Diubah
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
		redirect('c_pengembalian','refresh');
	}
}
/* end of file*/
?>