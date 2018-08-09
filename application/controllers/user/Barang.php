<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this->load->model('Model_barang');
	}

	/* ==== UTILITIES ==== */

	public function get_favorit_all()
	{
		$users			= $data['tbl_pengguna']= $this->ion_auth->user()->result();
		foreach($users as $value)
		{
        	$username		= $value->email;
        	$id_customer 	= $value->id;
        }
		$ajax 			= $this->Model_barang->get_favorit_by_cus($id_customer);

		echo json_encode($ajax);
	}

	public function tambah_favorit()
	{
		$users			= $data['tbl_pengguna']= $this->ion_auth->user()->result();
		foreach($users as $value)
		{
        	$username		= $value->email;
        	$id_customer 	= $value->id;
        }
        $id_barang 		= $this->input->post('id_brg');

        $favorit 		= array(
        	'barang_id'				=> $id_barang,
        	'customer_id'			=> $id_customer
        );

        $cek 		= $this->Model_barang->cek_favorit($id_barang,$id_customer);

        if($cek==0)
        {
        	$ajax 		= $this->Model_barang->tambah_favorit($favorit);
        	echo json_encode($ajax);
        }else
        {
        	$alert 		= "alert('Data sudah menjadi favorit anda')";
        	echo json_encode($alert);
        }
        
	}
}
