<?php defined('BASEPATH')or exit('No direct script access allowed');

class C_petugas extends CI_Controller{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('petugas');
		$this->petugas->get_all();
		$this->load->helper('form','url');
	}

	public function index($offset=0)
	{
		$data['title']='Daftar Petugas';
		$data['qser']=$this->petugas->get_all();
		$this->load->library('pagination');

	$config['base_url'] = site_url('petugas/index/');
			$config['total_rows'] = $this->petugas->province_num_rows();
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
			$data['action'] = site_url('c_petugas/search_keyword');
			
			$page=($this->uri->segment(3))? $this->uri->segment(3) : 0 ;
			$data['data']=$this->petugas->province($per_page,$page);
			$this->load->view('petugas/v_petugas',$data);
}

function search_keyword($offset=0)
		{
			$jeniscari = $this->input->post('jeniscari');
			$textcari = $this->input->post('textcari');
			$data['result'] = $this->petugas->search($jeniscari,$textcari);
			$data['action'] = site_url('c_petugas/search_keyword');
			$data['offset'] = $offset;
			$this->load->view('petugas/vcari',$data);
		}

	
	public function det($id)
	{
		$data['title']="Detail Data Petugas";
		$data['qser']=$this->petugas->get_byid($id);
		$this->load->view('petugas/detail',$data);

	}

	public function hapus($id)
	{
		$this->petugas->delete($id);
		$this->session->set_flashdata("pesan","<div class=\"alert alert-success\"id=\"alert\"><i class=\"glyphicon glyphicon-ok\">
			</i><strong>Success!</strong> Data Berhasil dihapus
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
		redirect('c_petugas','refresh');
	}

	public function check_id($id)
	{
		$this->db->select('*');
		$this->db->from('petugas');
		$this->db->where('kode_petugas',$id);
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
		$data['title']='Tambah Data Petugas';
		$this->load->view('petugas/add',$data);
	}
	public function action_add()
	{
		$id=$this->input->post('kode_petugas');
		$cek=$this->check_id($id);
		if($cek)
		{
			$this->session->set_flashdata("pesan","<div class=\"alert alert-warning\"id=\"alert\"><i class=\"glyphicon glyphicon-ex\">
				</i><strong>Warning!</strong> ID Telah Di Gunakan
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
			redirect('c_petugas','refresh');
		}else{
			$role			=$this->input->post('kode_role');
			$nama			=$this->input->post('nama');
			$jk				=$this->input->post('jk');
			$alamat			=$this->input->post('alamat');
			 			// di html name tanggal_kembali, jadi bukan tgl_kembali, coba lagidi aplikasi
		
			$data 	=array(
				'kode_petugas'=>$id,
				'kode_role'=>$role,	
				'nama'=>$nama,
				'jk'=>$jk,
				'alamat'=>$alamat
				);

			$this->petugas->tambah($data);
			$this->session->set_flashdata("pesan","<div class=\"alert alert-success\"id=\"alert\"><i class=\"glyphicon glyphicon-ok\">
				</i><strong>Success!</strong> Data Berhasil Di Tambah 
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
			redirect('c_petugas','refresh');
		}

	}
	public function update()
	{
		$kode_petugas =$this->uri->segment(3);
		$data['title']="Ubah Data";
		$data['qser']=$this->petugas->get_byid($kode_petugas);
		$this->load->view('petugas/up',$data);
	}
	public function action_update()
	{
		$data = array(
			'kode_petugas'		=>$this->input->post('kode_petugas'),
			'kode_role'			=>$this->input->post('kode_role'),
			'nama'				=>$this->input->post('nama'),
			'jk'				=>$this->input->post('jk'),
			'alamat'			=>$this->input->post('alamat')
			);
		$this->petugas->update($this->input->post('id_hidden'),$data);
		$this->session->set_flashdata("pesan","<div class=\"alert alert-success\"id=\"alert\"><i class=\"glyphicon glyphicon-ok\">
			</i><strong>Success!</strong> Data Berhasil Diubah
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
		redirect('c_petugas','refresh');
	}
}
/* end of file*/
?>