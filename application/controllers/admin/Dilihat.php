<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dilihat extends CI_Controller {

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
		$this->load->model('Model_dilihat');
	}

	public function index()
	{
		$data['title']			= 'Data Barang Dilihat Bulan Ini';
		$this->load->view('admin/dilihat/View_dilihat',$data);
	}

	public function get_all_barang_dilihat()
	{
		$bulan 					= date('m');
		$tahun 					= date('Y');
		$ajax 					= $this->Model_dilihat->get_all_barang_dilihat($tahun,$bulan);

		echo json_encode($ajax);
	}

}

/* End of file Dilihat.php */
/* Location: ./application/controllers/admin/Dilihat.php */
