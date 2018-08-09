<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_User');
	}

	public function index()
	{
		$data['title'] 				= 'Data Member';
		$this->load->view('admin/user/View_user',$data);
	}

	public function get_all_user()
	{
		$ajax 						= $this->Model_User->get_all_user();

		echo json_encode($ajax);
	}

}
