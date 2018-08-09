<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir extends CI_Controller 
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
		$this->load->model('Model_ongkir');
	}

	public function index()
	{
		$data['title']				= 'Data Ongkir';
		$this->load->view('admin/ongkir/View_ongkir',$data);
	}

	public function get_all_ongkir()
	{
		$ajax 						= $this->Model_ongkir->get_all_ongkir();

		echo json_encode($ajax);
	}

	public function get_ongkir_by_id()
	{
		$id_ongkir 					= $this->input->post('id_ongkir');
		$ajax 						= $this->Model_ongkir->get_ongkir_by_id($id_ongkir);

		echo json_encode($ajax);
	}

	public function get_select_provinsi()
	{
		$ajax 						= $this->Model_ongkir->get_select_provinsi();

		echo json_encode($ajax);
	}

	public function set_ongkir()
	{
		$nm_ongkir 					= $this->input->post('tambah_nama');
		$tarif	 					= $this->input->post('tambah_tarif');
		$provinsi 					= $this->input->post('tambah_prov');

		$ongkir 					= array(
			'ongkir_nama'			=> $nm_ongkir,
			'ongkir_tarif'			=> $tarif,
			'id_prov'				=> $provinsi
		);

		$ajax 						= $this->Model_ongkir->set_ongkir($ongkir);

		echo json_encode($ajax);
	}

	public function delete_ongkir()
	{
		$id_ongkir 					= $this->input->post('hapus_id');
		$ajax 						= $this->Model_ongkir->delete_ongkir($id_ongkir);

		echo json_encode($ajax);
	}

	public function update_ongkir()
	{
		$id_ongkir 					= $this->input->post('edit_id');
		$nm_ongkir 					= $this->input->post('edit_nama');
		$tarif 						= $this->input->post('edit_tarif');
		$provinsi 					= $this->input->post('edit_prov');

		$ongkir 					= array(
			'ongkir_nama'			=> $nm_ongkir,
			'ongkir_tarif'			=> $tarif,
			'id_prov'				=> $provinsi
		);

		$ajax 						= $this->Model_ongkir->update_ongkir($id_ongkir,$ongkir);

		echo json_encode($ajax);
	}
}