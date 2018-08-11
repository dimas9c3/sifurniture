<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		$this->load->model('Model_pengaturan');
	}

	public function index()
	{
		$data['title'] 				= 'Pengaturan Aplikasi';
		$this->load->view('admin/pengaturan/View_pengaturan',$data);
	}
}
