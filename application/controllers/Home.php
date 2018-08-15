<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_barang');
		$this->load->model('Model_interior');
		$this->load->model('Model_custom');
		$this->load->model('Model_ulasan');
		$this->load->model('Model_artikel');
		$this->load->model('Model_pengaturan');
		/* Setting */
		$sett 						= $this->Model_pengaturan->get_all_setting();
		$row 						= $sett->row_array();
		$this->email 				= $row['theme_option_email'];
		$this->telepon 				= $row['theme_option_telepon'];
		$this->jam 					= $row['theme_option_operasional'];
		$this->faq 					= $row['theme_option_faq'];
		$this->privacy 				= $row['theme_option_privacy'];
		$this->career 				= $row['theme_option_career'];
		$this->partner 				= $row['theme_option_partner'];
		$this->contact 				= $row['theme_option_contact'];
	}

	public function index()
	{
		$data['title'] 				= 'IWoody'.'s | Furniture dan Interior';
		$data['populer']			= $this->Model_barang->get_barang_populer_front();
		$data['kategori_navbar'] 	= $this->Model_barang->get_kategori_navbar();
		$data['email'] 				= $this->email;
		$data['telepon']			= $this->telepon;
		$data['jam']				= $this->jam;
		$data['interior']			= $this->Model_interior->get_interior_front();
		$data['style']			 	= $this->Model_custom->get_style_front();
		$data['ulasan']				= $this->Model_ulasan->get_ulasan_front();
		$data['artikel']			= $this->Model_artikel->get_artikel_front();
		$data['banner']				= $this->Model_pengaturan->get_all_banner_front();
		$data['iklan']				= $this->Model_pengaturan->get_all_iklan_front();
		$this->load->view('frontend/home/View_home',$data);
	}

	public function faq()
	{
		$data['title'] 				= 'IWoody'.'s | Help & Faq';
		$data['kategori_navbar'] 	= $this->Model_barang->get_kategori_navbar();
		$data['email'] 				= $this->email;
		$data['telepon']			= $this->telepon;
		$data['jam']				= $this->jam;
		$data['faq']				= $this->faq;

		$this->load->view('frontend/links/v_faq',$data);
	}

	public function privacy()
	{
		$data['title'] 				= 'IWoody'.'s | Privacy & Police';
		$data['kategori_navbar'] 	= $this->Model_barang->get_kategori_navbar();
		$data['email'] 				= $this->email;
		$data['telepon']			= $this->telepon;
		$data['jam']				= $this->jam;
		$data['faq']				= $this->faq;
		$data['privacy']			= $this->privacy;

		$this->load->view('frontend/links/v_privacy',$data);
	}

	public function career()
	{
		$data['title'] 				= 'IWoody'.'s | Careers';
		$data['kategori_navbar'] 	= $this->Model_barang->get_kategori_navbar();
		$data['email'] 				= $this->email;
		$data['telepon']			= $this->telepon;
		$data['jam']				= $this->jam;
		$data['faq']				= $this->faq;
		$data['privacy']			= $this->privacy;
		$data['career'] 			= $this->career;

		$this->load->view('frontend/links/v_career',$data);
	}

	public function partner()
	{
		$data['title'] 				= 'IWoody'.'s | Partners';
		$data['kategori_navbar'] 	= $this->Model_barang->get_kategori_navbar();
		$data['email'] 				= $this->email;
		$data['telepon']			= $this->telepon;
		$data['jam']				= $this->jam;
		$data['faq']				= $this->faq;
		$data['privacy']			= $this->privacy;
		$data['career'] 			= $this->career;
		$data['partner']			= $this->partner;

		$this->load->view('frontend/links/v_partner',$data);
	}

	public function contact()
	{
		$data['title'] 				= 'IWoody'.'s | Contact';
		$data['kategori_navbar'] 	= $this->Model_barang->get_kategori_navbar();
		$data['email'] 				= $this->email;
		$data['telepon']			= $this->telepon;
		$data['jam']				= $this->jam;
		$data['faq']				= $this->faq;
		$data['privacy']			= $this->privacy;
		$data['career'] 			= $this->career;
		$data['partner']			= $this->partner;
		$data['contact']			= $this->contact;

		$this->load->view('frontend/links/v_contact',$data);
	}

	public function links()
	{
		$id_links 					= $this->uri->segment('3');
		$data['title'] 				= 'IWoody'.'s | Links';
		$data['kategori_navbar'] 	= $this->Model_barang->get_kategori_navbar();
		$data['email'] 				= $this->email;
		$data['telepon']			= $this->telepon;
		$data['jam']				= $this->jam;
		$data['faq']				= $this->faq;
		$data['privacy']			= $this->privacy;
		$data['career'] 			= $this->career;
		$data['partner']			= $this->partner;
		$data['links'] 				= $this->Model_pengaturan->get_setting_by_id($id_links);

		$this->load->view('frontend/links/v_links',$data);
	}
}
