<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_penjualan');

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
	}

	public function index()
	{
		$data['title']					= 'Data Penjualan Barang Ready Stock';
		$this->load->view('admin/penjualan/View_penjualan', $data);
	}

	public function get_penjualan_active()
	{
		$ajax 							= $this->Model_penjualan->get_penjualan_active();
		echo json_encode($ajax);
	}

	public function validasi_penjualan()
	{
		$id_penjualan 					= $this->input->post('id_penjualan');

		// Ubah status penjualan
		$validasi 						= array(
			'penjualan_status'			=> '0'
		);
		$ajax 							= $this->Model_penjualan->validasi_penjualan($id_penjualan,$validasi);

		// Set notifikasi kepada user
		$notif 							= array(
			'penjualan_id'				=> $id_penjualan
		);	
		$this->Model_penjualan->set_notif_validasi_pembelian($notif);

		//kirim email jika pembelian sudah divalidasi
		$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.gmail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'dimas9c3@gmail.com',
		    'smtp_pass' => 'demow118',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		// Set to, from, message, etc.
		$this->email->from('dimas9c3@gmail.com', 'myname');
        $this->email->to('dimas.visualb@gmail.com'); 

        $this->email->subject('Test pembelian email');
        $this->email->message('Pembelian berhasil');  

		$this->email->send();

		echo json_encode($ajax);
	}

	public function get_total_all_pembelian_by_id_cus()
	{
		$id_customer 					= $this->input->post('id_customer');
		$ajax 							= $this->Model_penjualan->get_total_all_pembelian_by_id_cus($id_customer);

		echo json_encode($ajax);
	}

	public function set_pembelian()
	{
		$users			= $data['tbl_pengguna']= $this->ion_auth->user()->result();
		foreach($users as $value)
		{
        	$username		= $value->email;
        	$id_customer 	= $value->id;
        }

		$tracking_pembelian_terakhir 	= $this->Model_penjualan->tracking_status_pembelian($id_customer);

		if($tracking_pembelian_terakhir==1)
		{
			echo $this->session->set_flashdata('msg','limit_pembelian');
			redirect('user');
	    }else
	    {
	    	$id_penjualan 			= $this->Model_penjualan->find_new_id_penjualan();
	    	$pembelian 				= array(
	    		'penjualan_id'			=> $id_penjualan,
	    		'customer_id'			=> $id_customer,
	    		'ongkir_id'				=> '1',
	    		'penjualan_alamat'		=> 'ds'
	    	);

	    	$set_pembelian 			= $this->Model_penjualan->set_pembelian_user($pembelian);
	    	if($set_pembelian==TRUE)
	    	{
	    		foreach($this->cart->contents() as $i)
				{
				    $id_barang 			= $i['id'];
				    $qty        		= $i['qty'];
				   	$hrg_barang 	    = $i['price'];
				    $detail 			= array(
				        'penjualan_id'		=> $id_penjualan,
						'barang_id'			=> $id_barang,
						'penjualan_qty'		=> $qty,
						'penjualan_harga'	=> $hrg_barang
					);
				    $this->Model_penjualan->set_detail_pembelian_user($detail);     
		    	}
	    	}
				/*$idrow 		= $this->input->post('field_rowid');
				$qty 		= $this->input->post('field_qty');
				$data 		= array(
					'rowid' => $idrow, 
					'qty' 	=> $qty,
				); 

				$this->cart->update($data); */


			
		}
		echo $this->session->set_flashdata('msg', 'sukses_simpan');
		redirect('user/pembelian');
	}

	public function batal_pembelian()
	{
		$id_penjualan 			= $this->input->post('id_penjualan');
		$this->Model_penjualan->delete_all_detail_penjualan($id_penjualan);
		$ajax 					= $this->Model_penjualan->delete_penjualan_by_id($id_penjualan);

		echo json_encode($ajax);
	}

	public function upload_transfer()
	{
		$id_penjualan 			= $this->input->post('tambah_id');
		$config['upload_path'] = './assets/images/transaksi/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
	    $config['encrypt_name'] = TRUE;

	    $this->upload->initialize($config);
	    if(!empty($_FILES['tambah_foto']['name']))
	    {
	        if ($this->upload->do_upload('tambah_foto'))
	        {
	            $gbr 		= $this->upload->data();
	            $config['image_library']='gd2';
	            $config['source_image']='./assets/images/transaksi/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= TRUE;
	            $config['quality']= '100%';
	            //$config['width']= 1000;
	            //$config['height']= 1000;
	            $config['new_image']= './assets/images/transaksi/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

				$bukti 			= $gbr['file_name'];
				$transfer 			= array(
					'penjualan_transfer'		=> $bukti
				);
				/*$data2 			= array(
					'notifikasi_transaksi_nama' 		=> $nama,
					'notifikasi_transaksi_nomor'		=> $nomor,
					'notifikasi_transaksi_total'		=> $total
				);
				$this->Model_pembayaran->validasiTransaksi_member($nomor,$data);
				$this->Model_pembayaran->setNotif_transfer_member($data2);
				echo $this->session->set_flashdata('msg','upload_transfer');*/
				$ajax 			= $this->Model_penjualan->upload_transfer_user($id_penjualan,$transfer);
				echo json_encode($ajax);
			}else
				{
	                echo json_encode('GAGAL');
	            }
	                 
	            }else{

					echo json_encode('GAGAL');
	            }
	}	

	/* ==== Riwayat Penjualan ==== */

	public function riwayat_penjualan()
	{
		$data['title']			= 'Data Riwayat Transaksi Penjualan';
		$this->load->view('admin/penjualan/View_riwayat_penjualan',$data);
	}

	public function get_riwayat_penjualan_all()
	{
		$ajax 					= $this->Model_penjualan->get_riwayat_penjualan_all();

		echo json_encode($ajax);
	}

	/*==== Penjualan Custom User Pilih Material ==== */
	public function penjualan_custom()
	{
		$data['title']					= 'Penjualan Custom';
		$this->load->view('admin/penjualan/View_penjualan_custom',$data);
	}

	public function get_penjualan_custom_active()
	{

		$ajax 							= $this->Model_penjualan->get_penjualan_custom_active();
		echo json_encode($ajax);
	}

	public function validasi_penjualan_custom()
	{
		$id_penjualan 					= $this->input->post('id_penjualan');

		// Ubah status penjualan
		$validasi 						= array(
			'status'			=> '0'
		);
		$ajax 							= $this->Model_penjualan->validasi_penjualan_custom($id_penjualan,$validasi);

		// Set notifikasi kepada user
		/*$notif 							= array(
			'penjualan_id'				=> $id_penjualan
		);	
		$this->Model_penjualan->set_notif_validasi_pembelian($notif);

		//kirim email jika pembelian sudah divalidasi
		$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.gmail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'dimas9c3@gmail.com',
		    'smtp_pass' => 'demow118',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		// Set to, from, message, etc.
		$this->email->from('dimas9c3@gmail.com', 'myname');
        $this->email->to('dimas.visualb@gmail.com'); 

        $this->email->subject('Test pembelian email');
        $this->email->message('Pembelian berhasil');  

		$this->email->send();*/

		echo json_encode($ajax);
	}

	public function batal_pembelian_custom()
	{
		$id_penjualan 			= $this->input->post('id_penjualan');
		$ajax 					= $this->Model_penjualan->delete_penjualan_custom_by_id($id_penjualan);

		echo json_encode($ajax);
	}

	/* ==== Penjualan Custom Design ==== */

	public function penjualan_custom_design()
	{
		$data['title']			= 'Penjualan Custom Design Active';
		$this->load->view('admin/penjualan/View_penjualan_custom_design',$data);
	}

	public function get_penjualan_custom_design_active()
	{
		$ajax 					= $this->Model_penjualan->get_penjualan_custom_design_active();

		echo json_encode($ajax);
	}

	public function batal_custom_design()
	{
		$id_penjualan 				= $this->input->post('id_penjualan');
		$batal 						= array(
			'status'				=> '2'
		);
		$ajax 						= $this->Model_penjualan->batal_custom_design($batal,$id_penjualan);

		echo json_encode($ajax);
	}

	public function selesai_custom_design()
	{
		$id_penjualan 				= $this->input->post('id_penjualan');
		$selesai 					= array(
			'status'				=> '0'
		);
		$ajax 						= $this->Model_penjualan->selesai_custom_design($selesai,$id_penjualan);

		echo json_encode($ajax);
	}
}
