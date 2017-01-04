<?php defined('BASEPATH')or exit('No direct script access allowed');

class C_role extends CI_Controller{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('role');
		$this->role->get_all();
		$this->load->helper('form','url');
	}

	public function index($offset=0)
	{
		$data['title']='Daftar Kategori Barang';
		$data['qrole']=$this->role->get_all();
		$this->load->library('pagination');

	$config['base_url'] = site_url('role/index/');
			$config['total_rows'] = $this->role->province_num_rows();
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
			$data['action'] = site_url('c_role/search_keyword');
			
			$page=($this->uri->segment(3))? $this->uri->segment(3) : 0 ;
			$data['data']=$this->role->province($per_page,$page);
			$this->load->view('role/v_role',$data);
}

function search_keyword($offset=0)
		{
			$jeniscari = $this->input->post('jeniscari');
			$textcari = $this->input->post('textcari');
			$data['result'] = $this->role->search($jeniscari,$textcari);
			$data['action'] = site_url('c_role/search_keyword');
			$data['offset'] = $offset;
			$this->load->view('role/vcari',$data);
		}

	
	public function det($id)
	{
		$data['title']="Detail Data Kategori Barang";
		$data['qrole']=$this->role->get_byid($id);
		$this->load->view('role/detail',$data);

	}

	public function hapus($id)
	{
		$this->role->delete($id);
		$this->session->set_flashdata("pesan","<div class=\"alert alert-success\"id=\"alert\"><i class=\"glyphicon glyphicon-ok\">
			</i><strong>Success!</strong> Data Berhasil dihapus
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
		redirect('c_role','refresh');
	}

	public function check_id($id)
	{
		$this->db->select('*');
		$this->db->from('role');
		$this->db->where('kode_role',$id);
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
		$data['title']='Tambah Data Kategori Barang';
		$this->load->view('role/add',$data);
	}
	public function action_add()
	{
		$id=$this->input->post('kode_role');
		$cek=$this->check_id($id);
		if($cek)
		{
			$this->session->set_flashdata("pesan","<div class=\"alert alert-warning\"id=\"alert\"><i class=\"glyphicon glyphicon-ex\">
				</i><strong>Warning!</strong> Kode Telah Di Gunakan
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
			redirect('c_role','refresh');
		}else{
			$nama_role		=$this->input->post('nama_role');
		

			$data 	=array(
				'kode_role'			=>$id,
				'nama_role'			=>$nama_role);

			$this->role->tambah($data);
			$this->session->set_flashdata("pesan","<div class=\"alert alert-success\"id=\"alert\"><i class=\"glyphicon glyphicon-ok\">
				</i><strong>Success!</strong> Data Berhasil Di Tambah 
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
			redirect('c_role','refresh');
		}

	}
	public function update()
	{
		$kode_role			=$this->uri->segment(3);
		$data['title']		="Ubah Data";
		$data['qrole']		=$this->role->get_byid($kode_role);
		$this->load->view('role/up',$data);
	}
	public function action_update()
	{
		$data = array(
			'kode_role'=>$this->input->post('kode_role'),
			'nama_role'=>$this->input->post('nama_role')
			);
		$this->role->update($this->input->post('id_hidden'),$data);
		$this->session->set_flashdata("pesan","<div class=\"alert alert-success\"id=\"alert\"><i class=\"glyphicon glyphicon-ok\">
			</i><strong>Success!</strong> Data Berhasil Diubah
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
		redirect('c_role','refresh');
	}
}
/* end of file*/
?>