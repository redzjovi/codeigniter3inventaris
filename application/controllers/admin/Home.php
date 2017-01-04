<?php
class Home extends CI_Controller
{
	public function index()
	{
		$data['breadcrumb'] = array(
			array('text' => 'Home'),
		);
		$data['title'] = 'Admin - Home';
		$data['view'] = 'home/home';
		$this->load->view('admin/layout/template', $data);
	}
}
?>