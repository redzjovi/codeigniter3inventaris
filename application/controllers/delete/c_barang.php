<?php defined('BASEPATH')or exit('No direct script access allowed');

class c_barang extends CI_Controller{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('barang');
		$this->barang->get_all();
		$this->load->helper('form','url');
	}

	public function index($offset=0)
	{
		$data['title']='Daftar Barang';
		$data['qsis']=$this->barang->get_all();
		$this->load->library('pagination');

	$config['base_url'] = site_url('barang/index/');
			$config['total_rows'] = $this->barang->province_num_rows();
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
			$data['action'] = site_url('c_barang/search_keyword');
			
			$page=($this->uri->segment(3))? $this->uri->segment(3) : 0 ;
			$data['data']=$this->barang->province($per_page,$page);
			$data['title']="ICT INVENTORY";
			$data['subtitle']="SMKN 11 BANDUNG";
			$data['description']="Description Daftar Barang";
			$data['view_isi']="barang/v_barang";
			$this->load->view('layout/template',$data);
			
}

function search_keyword($offset=0)
		{
			$jeniscari = $this->input->post('jeniscari');
			$textcari = $this->input->post('textcari');
			$data['result'] = $this->barang->search($jeniscari,$textcari);
			$data['action'] = site_url('c_barang/search_keyword');
			$data['offset'] = $offset;
			$this->load->view('barang/vcari',$data);
		}

	
	public function det($id)
	{
		$data['title']="Detail Data Barang";
		$data['qsis']=$this->barang->get_byid($id);
		$this->load->view('barang/detail',$data);

	}

	public function hapus($id)
	{
		$this->barang->delete($id);
		$this->session->set_flashdata("pesan","<div class=\"alert alert-success\"id=\"alert\"><i class=\"glyphicon glyphicon-ok\">
			</i><strong>Success!</strong> Data Berhasil dihapus
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
		redirect('c_barang','refresh');
	}

	public function check_id($id)
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->where('kode_barang',$id);
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
			$data['title']="ICT INVENTORY";
			$data['subtitle']="SMKN 11 BANDUNG";
			$data['description']="Description Form Barang";
			$data['view_isi']="barang/add";
			$this->load->view('layout/template',$data);
	}
	public function action_add()
	{
		$id=$this->input->post('kode_barang');
		$cek=$this->check_id($id);
		if($cek)
		{
			$this->session->set_flashdata("pesan","<div class=\"alert alert-warning\"id=\"alert\"><i class=\"glyphicon glyphicon-ex\">
				</i><strong>Warning!</strong> ID Telah Di Gunakan
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
			redirect('c_barang','refresh');
		}else{
			$nama 		 		=$this->input->post('nama_barang');
			$jumlah				=$this->input->post('jumlah_barang');
			$kode_detail		=$this->input->post('kode_detail');
			$kode_kategori		=$this->input->post('kode_kategori');
			$status 				=$this->input->post('status');
			 			// di html name tanggal_kembali, jadi bukan tgl_kembali, coba lagidi aplikasi
		
		

			$data 	=array(
				'kode_barang'=>$id,
				'nama_barang'=>$nama,	
				'jumlah_barang'=>$jumlah,
				'kode_detail'=>$kode_detail,
				'kode_kategori'=>$kode_kategori,
				'status'=>$status
				);

			$this->barang->tambah($data);
			$this->session->set_flashdata("pesan","<div class=\"alert alert-success\"id=\"alert\"><i class=\"glyphicon glyphicon-ok\">
				</i><strong>Success!</strong> Data Berhasil Di Tambah 
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
			redirect('c_barang','refresh');
		}

	}
	public function update()
	{
		$kode_barang =$this->uri->segment(3);
		$data['title']="Ubah Data";
		$data['qsis']=$this->barang->get_byid($kode_barang);
		$this->load->view('barang/up',$data);
	}
	public function action_update()
	{
		$data = array(
			'kode_barang'=>$this->input->post('kode_barang'),
			'nama_barang'=>$this->input->post('nama_barang'),
			'jumlah_barang'=>$this->input->post('jumlah_barang'),
			'kode_detail'=>$this->input->post('kode_detail'),
			'kode_kategori'=>$this->input->post('kode_kategori'),
			'status'=>$this->input->post('status')
			);
		$this->barang->update($this->input->post('id_hidden'),$data);
		$this->session->set_flashdata("pesan","<div class=\"alert alert-success\"id=\"alert\"><i class=\"glyphicon glyphicon-ok\">
			</i><strong>Success!</strong> Data Berhasil Diubah
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
		redirect('c_barang','refresh');
	}
}
/* end of file*/
?>