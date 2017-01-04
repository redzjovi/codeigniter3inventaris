<?php defined('BASEPATH')or exit('No direct accsess allowed');

class Home extends CI_Controller
{
	public function index()
	{	$data['title']="ICT INVENTORY";
		$data['subtitle']="SMKN 11 BANDUNG";
		$data['description']="Description Dashboard";
		$data['view_isi']="view_home";
		$this->load->view('layout/template',$data);
	}
}