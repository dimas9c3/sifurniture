<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ulasan extends CI_Controller 
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
		$this->load->model('Model_ulasan');
	}

	public function index()
	{
		$data['title'] 			= 'Data Ulasan';
		$this->load->view('admin/ulasan/View_ulasan',$data);
	}

	public function get_all_ulasan()
	{
		
        $ajax 					= $this->Model_ulasan->get_all_ulasan_admin();

        echo json_encode($ajax);
	}

	public function ulasan_ditampilkan()
	{
		$data['title']			= 'Data Ulasan Yang Di Tampilkan Di Beranda';
		$this->load->view('admin/ulasan/View_ulasan_ditampilkan',$data);
	}

	public function get_ulasan_ditampilkan()
	{
		$ajax 					= $this->Model_ulasan->get_ulasan_ditampilkan();
		echo json_encode($ajax);
	}

	public function tambah_ulasan()
	{
		$id_penjualan 			= $this->uri->segment('4');
		

        $data['title']			= 'Tambah Ulasan';
        $this->load->view('user/ulasan/View_tambah_ulasan',$data);
	}

	public function set_ulasan()
	{
		$isi 					= $this->input->post('tambah_isi');
		$rate					= $this->input->post('tambah_rating');
		$id_penjualan			= $this->input->post('tambah_id');
		$users					= $data['tbl_pengguna']= $this->ion_auth->user()->result();
		foreach($users as $value)
		{
        	$username		= $value->email;
        	$id_customer 	= $value->id;
        }

		$ulasan 				= array(
			'ulasan_isi'		=> $isi,
			'ulasan_rating'		=> $rate,
			'penjualan_id'		=> $id_penjualan,
			'customer_id'		=> $id_customer
		);

		$query 					= $this->Model_ulasan->set_ulasan($ulasan);

		redirect('user/pembelian/riwayat_pembelian');
		
	}

	public function set_tampil()
	{
		$id_ulasan				= $this->input->post('id_ulasan');

		$ulasan 				= array(
			'ulasan_tampil' 	=> '1'
		);

		$query 					= $this->Model_ulasan->update_ulasan($id_ulasan,$ulasan);

		echo json_encode($query);
		
	}

	public function set_sembunyi()
	{
		$id_ulasan				= $this->input->post('id_ulasan');

		$ulasan 				= array(
			'ulasan_tampil' 	=> '0'
		);

		$query 					= $this->Model_ulasan->update_ulasan($id_ulasan,$ulasan);

		echo json_encode($query);
		
	}

	public function edit_ulasan()
	{
		$id_ulasan 				= $this->uri->segment('4');
		$data['title']			= 'Edit Ulasan';
		$data['ulasan']			= $this->Model_ulasan->get_ulasan_by_id_no_ajax($id_ulasan);

		$this->load->view('user/ulasan/View_edit_ulasan',$data);
	}

	public function update_ulasan()
	{
		$isi 					= $this->input->post('tambah_isi');
		$rate					= $this->input->post('tambah_rating');
		$id_ulasan				= $this->input->post('tambah_id_ulasan');

		$ulasan 				= array(
			'ulasan_isi'		=> $isi,
			'ulasan_rating'		=> $rate
		);

		$query 					= $this->Model_ulasan->update_ulasan($id_ulasan,$ulasan);

		redirect('user/ulasan');
		
	}

	public function delete_ulasan()
	{
		$id_ulasan 				= $this->input->post('hapus_id');

		$ajax 					= $this->Model_ulasan->delete_ulasan($id_ulasan);

		echo json_encode($ajax);
	}

}
