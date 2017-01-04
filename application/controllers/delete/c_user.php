<?php defined('BASEPATH')or exit('No direct script access allowed');

class C_user extends CI_Controller{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('user');
		$this->user->get_all();
		$this->load->helper('form','url');
	}

	public function index($offset=0)
	{
		$data['title']='Daftar User';
		$data['quser']=$this->user->get_all();
		$this->load->library('pagination');

	$config['base_url'] = site_url('user/index/');
			$config['total_rows'] = $this->user->province_num_rows();
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
			$data['action'] = site_url('c_user/search_keyword');
			
			$page=($this->uri->segment(3))? $this->uri->segment(3) : 0 ;
			$data['data']=$this->user->province($per_page,$page);
			$this->load->view('user/v_user',$data);
}

function search_keyword($offset=0)
		{
			$jeniscari = $this->input->post('jeniscari');
			$textcari = $this->input->post('textcari');
			$data['result'] = $this->user->search($jeniscari,$textcari);
			$data['action'] = site_url('c_user/search_keyword');
			$data['offset'] = $offset;
			$this->load->view('user/vcari',$data);
		}

	
	public function det($id)
	{
		$data['title']="Detail Data Peminjaman";
		$data['quser']=$this->user->get_byid($id);
		$this->load->view('user/detail',$data);

	}

	public function hapus($id)
	{
		$this->user->delete($id);
		$this->session->set_flashdata("pesan","<div class=\"alert alert-success\"id=\"alert\"><i class=\"glyphicon glyphicon-ok\">
			</i><strong>Success!</strong> Data Berhasil dihapus
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
		redirect('c_user','refresh');
	}

	public function check_id($id)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username',$id);
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
		$data['title']='Tambah Data Peminjaman';
		$this->load->view('user/add',$data);
	}
	public function action_add()
	{
		$id=$this->input->post('username');
		$cek=$this->check_id($id);
		if($cek)
		{
			$this->session->set_flashdata("pesan","<div class=\"alert alert-warning\"id=\"alert\"><i class=\"glyphicon glyphicon-ex\">
				</i><strong>Warning!</strong> NIS Telah Di Gunakan
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
			redirect('c_user','refresh');
		}else{
			$password		=$this->input->post('password');
			$nama			=$this->input->post('nama_user');
			$jk				=$this->input->post('jk');
			$jurusan		=$this->input->post('jurusan');
			 			// di html name tanggal_kembali, jadi bukan tgl_kembali, coba lagidi aplikasi
		
			$data 	=array(
				'username'=>$id,
				'password'=>$password,	
				'nama_user'=>$nama,
				'jk'=>$jk,
				'jurusan'=>$jurusan
				);

			$this->user->tambah($data);
			$this->session->set_flashdata("pesan","<div class=\"alert alert-success\"id=\"alert\"><i class=\"glyphicon glyphicon-ok\">
				</i><strong>Success!</strong> Data Berhasil Di Tambah 
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
			redirect('c_user','refresh');
		}

	}
	public function update()
	{
		$username =$this->uri->segment(3);
		$data['title']="Ubah Data";
		$data['quser']=$this->user->get_byid($username);
		$this->load->view('user/up',$data);
	}
	public function action_update()
	{
		$data = array(
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
			'nama_user'=>$this->input->post('nama_user'),
			'jk'=>$this->input->post('jk'),
			'jurusan'=>$this->input->post('jurusan')
			);
		$this->user->update($this->input->post('id_hidden'),$data);
		$this->session->set_flashdata("pesan","<div class=\"alert alert-success\"id=\"alert\"><i class=\"glyphicon glyphicon-ok\">
			</i><strong>Success!</strong> Data Berhasil Diubah
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
		redirect('c_user','refresh');
	}
}
/* end of file*/
?>