<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
	}

	public function index()
	{
		$data['title'] 			= 'Dashboard';
		$this->load->view('user/dashboard/View_dashboard',$data);
	}

}
