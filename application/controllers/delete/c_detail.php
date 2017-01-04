<?php defined('BASEPATH')or exit('No direct script access allowed');

class C_detail extends CI_Controller{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('detail');
		$this->detail->get_all();
		$this->load->helper('form','url');
	}

	public function index($offset=0)
	{
		$data['title']='Daftar Detail Barang';
		$data['qsis']=$this->detail->get_all();
		$this->load->library('pagination');

	$config['base_url'] = site_url('detail/index/');
			$config['total_rows'] = $this->detail->province_num_rows();
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
			$data['action'] = site_url('c_detail/search_keyword');
			
			$page=($this->uri->segment(3))? $this->uri->segment(3) : 0 ;
			$data['data']=$this->detail->province($per_page,$page);
			$this->load->view('detail/v_detail',$data);
}

function search_keyword($offset=0)
		{
			$jeniscari = $this->input->post('jeniscari');
			$textcari = $this->input->post('textcari');
			$data['result'] = $this->detail->search($jeniscari,$textcari);
			$data['action'] = site_url('c_detail/search_keyword');
			$data['offset'] = $offset;
			$this->load->view('detail/vcari',$data);
		}

	
	public function det($id)
	{
		$data['title']="Detail Data Detail Barang";
		$data['qsis']=$this->detail->get_byid($id);
		$this->load->view('detail/detail',$data);

	}

	public function hapus($id)
	{
		$this->detail->delete($id);
		$this->session->set_flashdata("pesan","<div class=\"alert alert-success\"id=\"alert\"><i class=\"glyphicon glyphicon-ok\">
			</i><strong>Success!</strong> Data Berhasil dihapus
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
		redirect('c_detail','refresh');
	}

	public function check_id($id)
	{
		$this->db->select('*');
		$this->db->from('detail');
		$this->db->where('kode_detail',$id);
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
		$data['title']='Tambah Data Detail Barang';
		$this->load->view('detail/add',$data);
	}
	public function action_add()
	{
		$id=$this->input->post('kode_detail');
		$cek=$this->check_id($id);
		if($cek)
		{
			$this->session->set_flashdata("pesan","<div class=\"alert alert-warning\"id=\"alert\"><i class=\"glyphicon glyphicon-ex\">
				</i><strong>Warning!</strong> ID Telah Di Gunakan
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
			redirect('c_detail','refresh');
		}else{
			$madein 		=$this->input->post('madein_barang');
			$merk			=$this->input->post('merk_barang');
			$asal 			=$this->input->post('asal_dana');
			$tahun 			=$this->input->post('tahun_pengadaan');
			$keterangan 	=$this->input->post('keterangan');
			 			// di html name tanggal_kembali, jadi bukan tgl_kembali, coba lagidi aplikasi
		
		

			$data 	=array(
				'kode_detail'=>$id,
				'madein_barang'=>$madein,	
				'merk_barang'=>$merk,
				'asal_dana'=>$asal,
				'tahun_pengadaan'=>$tahun,
				'keterangan'=>$keterangan
				);

			$this->detail->tambah($data);
			$this->session->set_flashdata("pesan","<div class=\"alert alert-success\"id=\"alert\"><i class=\"glyphicon glyphicon-ok\">
				</i><strong>Success!</strong> Data Berhasil Di Tambah 
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
			redirect('c_detail','refresh');
		}

	}
	public function update()
	{
		$kode_detail =$this->uri->segment(3);
		$data['title']="Ubah Data";
		$data['qsis']=$this->detail->get_byid($kode_detail);
		$this->load->view('detail/up',$data);
	}
	public function action_update()
	{
		$data = array(
			'kode_detail'=>$this->input->post('kode_detail'),
			'madein_barang'=>$this->input->post('madein_barang'),
			'merk_barang'=>$this->input->post('merk_barang'),
			'asal_dana'=>$this->input->post('asal_dana'),
			'tahun_pengadaan'=>$this->input->post('tahun_pengadaan'),
			'keterangan'=>$this->input->post('keterangan')
			);
		$this->detail->update($this->input->post('id_hidden'),$data);
		$this->session->set_flashdata("pesan","<div class=\"alert alert-success\"id=\"alert\"><i class=\"glyphicon glyphicon-ok\">
			</i><strong>Success!</strong> Data Berhasil Diubah
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>");
		redirect('c_detail','refresh');
	}
}
/* end of file*/
?>