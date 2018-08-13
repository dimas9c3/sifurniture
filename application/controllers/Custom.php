<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Custom extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_custom');
		$this->load->model('Model_barang');
		$this->load->model('Model_ongkir');
		$this->load->model('Model_pengaturan');

		/* Setting */
		$sett 						= $this->Model_pengaturan->get_all_setting();
		$row 						= $sett->row_array();
		$this->email 				= $row['theme_option_email'];
		$this->telepon 				= $row['theme_option_telepon'];
		$this->jam 					= $row['theme_option_operasional'];
	}

	public function index()
	{
		$data['email'] 				= $this->email;
		$data['telepon']			= $this->telepon;
		$data['jam']				= $this->jam;
		$data['title'] 				= 'Keranjang';
		$data['kategori_navbar'] 	= $this->Model_barang->get_kategori_navbar();
		$data['cart']			 	= $this->cart->contents();
		$this->load->view('frontend/keranjang/View_keranjang',$data);
	}

	public function buat_custom()
	{
		$data['email'] 				= $this->email;
		$data['telepon']			= $this->telepon;
		$data['jam']				= $this->jam;
		$data['title']				= 'Custom Design';
		$data['kategori_navbar'] 	= $this->Model_barang->get_kategori_navbar();
		$data['style']				= $this->Model_custom->get_style_select_front();
		$this->load->view('frontend/custom/View_custom',$data);
	}

	public function buat_custom_design()
	{
		$data['email'] 				= $this->email;
		$data['telepon']			= $this->telepon;
		$data['jam']				= $this->jam;
		$data['title']					= 'Pembelian Custom Design User';
		$data['kategori_navbar'] 	= $this->Model_barang->get_kategori_navbar();
		$this->load->view('frontend/custom/View_custom_user',$data);
	}

	/* ==== STEP CUSTOM ==== */
	public function get_jenis_by_style_select()
	{
		$id_style 					= $this->input->post('id_style');
		$ajax 						= $this->Model_custom->get_jenis_by_style_select($id_style);

		echo json_encode($ajax);
	}

	public function get_material_by_jenis_select()
	{
		$id_jenis 					= $this->input->post('id_jenis');
		$ajax 						= $this->Model_custom->get_material_by_jenis_select($id_jenis);

		echo json_encode($ajax);
	}

	public function get_coating_by_material_select()
	{
		$id_material				= $this->input->post('id_material');
		$ajax 						= $this->Model_custom->get_coating_by_material_select($id_material);

		echo json_encode($ajax);
	}

	public function get_jog_by_coating_select()
	{
		$id_coating					= $this->input->post('id_coating');
		$ajax 						= $this->Model_custom->get_jog_by_coating_select($id_coating);

		echo json_encode($ajax);
	}

	public function get_prov_select()
	{
		$ajax 						= $this->Model_ongkir->get_prov_select_front();

		echo json_encode($ajax);
	}

	public function get_kab_select()
	{
		$ajax 						= $this->Model_ongkir->get_kab_select_front();

		echo json_encode($ajax);
	}

	public function get_kab_by_prov_select()
	{
		$id_prov					= $this->input->post('id_prov');
		$ajax 						= $this->Model_ongkir->get_kab_by_prov_select($id_prov);

		echo json_encode($ajax);
	}

	public function get_ongkir_by_kab_select()
	{
		$id_ongkir 					= $this->input->post('id_kab');
		$ajax 						= $this->Model_ongkir->get_ongkir_by_id($id_ongkir);

		echo json_encode($ajax);
	}

	public function get_custom_by_kriteria()
	{
		$id_style 					= $this->input->post('id_style');
		$id_jenis					= $this->input->post('id_jenis');
		$id_material				= $this->input->post('id_material');
		$id_coating 				= $this->input->post('id_coating');
		$id_jog						= $this->input->post('id_jog');

		$ajax 						= $this->Model_custom->get_custom_by_kriteria($id_style,$id_jenis,$id_material,$id_coating,$id_jog);

		echo json_encode($ajax);
	}

}
