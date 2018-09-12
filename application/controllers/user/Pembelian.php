<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_penjualan');

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		elseif ($this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			echo $this->session->set_flashdata('msg', 'denied_admin');
			redirect('keranjang');
		}
	}

	public function index()
	{
		$data['title']					= 'Data Pembelian Barang';
		$this->load->view('user/pembelian/View_pembelian', $data);
	}

	public function get_pembelian_active_user()
	{
		$users			= $data['tbl_pengguna']= $this->ion_auth->user()->result();
		foreach($users as $value)
		{
        	$username		= $value->email;
        	$id_customer 	= $value->id;
        }

		$ajax 							= $this->Model_penjualan->get_pembelian_active_user($id_customer);
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
		$ongkir 		= $this->input->post('kabupaten');
		$alamat 		= $this->input->post('alamat');
		$catatan 		= $this->input->post('catatan');
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
	    		'ongkir_id'				=> $ongkir,
	    		'penjualan_alamat'		=> $alamat,
	    		'penjualan_catatan'		=> $catatan
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
		$this->cart->destroy(); // Menghapus keranjang
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
	           $resize= $this->image_lib->resize();

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
				//$ajax 			= $this->Model_penjualan->upload_transfer_user($id_penjualan,$transfer);
				echo json_encode($resize);
			}else
				{
	                echo json_encode('GAGAL');
	            }
	                 
	            }else{

					echo json_encode('GAGAL');
	            }
	}	

	/* ==== HISTORY PEMBELIAN ==== */

	public function riwayat_pembelian()
	{
		$data['title']					= 'Data Riwayat Pembelian';
		$this->load->view('user/pembelian/View_riwayat_pembelian', $data);
	}

	public function get_riwayat_pembelian_by_id_customer()
	{
		$users			= $data['tbl_pengguna']= $this->ion_auth->user()->result();
		foreach($users as $value)
		{
        	$username		= $value->email;
        	$id_customer 	= $value->id;
        }
		$ajax 							= $this->Model_penjualan->get_riwayat_pembelian_by_id_customer($id_customer);
		echo json_encode($ajax);
	}

	/* ==== Pembelian Custom ==== */

	public function pembelian_custom()
	{
		$data['title']					= 'Pembelian Custom';
		$this->load->view('user/pembelian/View_pembelian_custom',$data);
	}

	public function get_pembelian_custom_active_user()
	{
		$users			= $data['tbl_pengguna']= $this->ion_auth->user()->result();
		foreach($users as $value)
		{
        	$username		= $value->email;
        	$id_customer 	= $value->id;
        }

		$ajax 							= $this->Model_penjualan->get_pembelian_custom_active_user($id_customer);
		echo json_encode($ajax);
	}

	public function get_pembelian_custom_by_id_penjualan()
	{
		$id_penjualan 			= $this->input->post('id_penjualan');
		$ajax 					= $this->Model_penjualan->get_pembelian_custom_by_id_penjualan($id_penjualan);

		echo json_encode($ajax);
	}

	public function set_pembelian_custom()
	{
		$ongkir 			= $this->input->post('step_kab');
		$id_custom 			= $this->input->post('id_custom');
		$alamat 			= $this->input->post('alamat');
		$catatan 			= $this->input->post('catatan');

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
	    	$id_penjualan 			= $this->Model_penjualan->find_new_id_penjualan_custom();
	    	$pembelian 				= array(
	    		'penjualan_custom_id'			=> $id_penjualan,
	    		'penjualan_custom_jenis'		=> '1',
	    		'customer_id'					=> $id_customer,
	    		'ongkir_id'						=> $ongkir,
	    		'custom_id'						=> $id_custom,
	    		'alamat'						=> $alamat,
	    		'catatan'						=> $catatan
	    	);

	    	$set_pembelian 			= $this->Model_penjualan->set_pembelian_custom_user($pembelian);
			
		}
		echo $this->session->set_flashdata('msg', 'sukses_simpan');
		redirect('user/pembelian/pembelian_custom');
	}

	public function update_transaksi_custom()
	{
		$id_penjualan 				= $this->input->post('alamat_id');
		$catatan 					= $this->input->post('catatan');
		$alamat 					= $this->input->post('alamat');
		$dibayarkan 				= $this->input->post('edit_dibayarkan_2');
		$total 						= $this->input->post('edit_total_2');
		$kurang 					= $this->input->post('edit_kurang_2');
		$tambah_transfer 			= $this->input->post('edit_transfer');

		if($tambah_transfer>0)
		{
			$transfer 					= $dibayarkan+$tambah_transfer;
		}else
		{
			$transfer 					= $dibayarkan;
		}

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

				$pembelian 				= array(
					'dibayarkan'				=> $transfer,
					'transfer'					=> $bukti,
					'alamat'					=> $alamat,
					'catatan'					=> $catatan
				);
			}else
				{
	                echo json_encode('GAGAL');
	            }
	                 
	            }else{

					$pembelian 				= array(
					'dibayarkan'				=> $transfer,
					'alamat'					=> $alamat,
					'catatan'					=> $catatan
				);
	            }
		
		$ajax 						= $this->Model_penjualan->update_pembelian_custom_user_design($id_penjualan,$pembelian);

		echo json_encode($ajax);
	}

	public function batal_pembelian_custom()
	{
		$id_penjualan 			= $this->input->post('id_penjualan');
		$ajax 					= $this->Model_penjualan->delete_penjualan_custom_by_id($id_penjualan);

		echo json_encode($ajax);
	}

	public function upload_transfer_custom()
	{
		$id_penjualan 			= $this->input->post('tambah_id');
		$dibayarkan 			= $this->input->post('tambah_dibayarkan');
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
					'transfer'		=> $bukti,
					'dibayarkan'	=> $dibayarkan
				);
				/*$data2 			= array(
					'notifikasi_transaksi_nama' 		=> $nama,
					'notifikasi_transaksi_nomor'		=> $nomor,
					'notifikasi_transaksi_total'		=> $total
				);
				$this->Model_pembayaran->validasiTransaksi_member($nomor,$data);
				$this->Model_pembayaran->setNotif_transfer_member($data2);
				echo $this->session->set_flashdata('msg','upload_transfer');*/
				$ajax 			= $this->Model_penjualan->upload_transfer_custom_user($id_penjualan,$transfer);
				echo json_encode($ajax);
			}else
				{
	                echo json_encode('GAGAL');
	            }
	                 
	            }else{

					echo json_encode('GAGAL');
	            }
	}	

	/* ==== Pembelian Custom User Sendiri ==== */
	public function pembelian_custom_design()
	{
		$data['title']				= 'Pembelian Custom Design';
		$this->load->view('user/pembelian/View_pembelian_custom_user',$data);
	}

	public function get_pembelian_custom_design_active_user()
	{
		$users			= $data['tbl_pengguna']= $this->ion_auth->user()->result();
		foreach($users as $value)
		{
        	$username		= $value->email;
        	$id_customer 	= $value->id;
        }

		$ajax 							= $this->Model_penjualan->get_pembelian_custom_design_active_user($id_customer);
		echo json_encode($ajax);
	}

	public function get_pembelian_custom_design_by_id()
	{
		$id_penjualan 					= $this->input->post('id_penjualan');
		$ajax 							= $this->Model_penjualan->get_pembelian_custom_design_by_id($id_penjualan);

		echo json_encode($ajax);
	}

	public function pembelian_custom_user()
	{
		$ongkir 			= $this->input->post('step_kab');
		$alamat 			= $this->input->post('tambah_alamat');
		$permintaan			= $this->input->post('tambah_catatan');

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
	    	$id_penjualan 			= $this->Model_penjualan->find_new_id_penjualan_custom();
	    	$config['upload_path'] = './assets/images/permintaan/';
		    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
		    $config['encrypt_name'] = TRUE;

		    $this->upload->initialize($config);
		    if(!empty($_FILES['tambah_foto']['name']))
		    {
		        if ($this->upload->do_upload('tambah_foto'))
		        {
		            $gbr 		= $this->upload->data();
		            $config['image_library']='gd2';
		            $config['source_image']='./assets/images/permintaan/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
		            $config['maintain_ratio']= TRUE;
		            $config['quality']= '100%';
		            //$config['width']= 1000;
		            //$config['height']= 1000;
		            $config['new_image']= './assets/images/permintaan/'.$gbr['file_name'];
		            $this->load->library('image_lib', $config);
		            $this->image_lib->resize();

					$photo 					= $gbr['file_name'];
					$pembelian 				= array(
			    		'penjualan_custom_id'			=> $id_penjualan,
			    		'penjualan_custom_jenis'		=> '2',
			    		'customer_id'					=> $id_customer,
			    		'ongkir_id'						=> $ongkir,
			    		'alamat'						=> $alamat,
			    		'permintaan'					=> $permintaan,
			    		'foto_permintaan'				=> $photo
			    	);
				}else
				{
		                redirect('user','refresh');
		        }
		                 
		        }else{

						redirect('user','refresh');
		        }
	    	

	    	$set_pembelian 			= $this->Model_penjualan->set_pembelian_custom_user_design($pembelian);
			
		}
		echo $this->session->set_flashdata('msg', 'sukses_simpan_custom');
		redirect('user/pembelian/pembelian_custom_design');
	}

	public function update_pembelian_custom_design()
	{
		$id_penjualan 		= $this->input->post('edit_id');
		$ongkir 			= $this->input->post('edit_kab');
		$alamat 			= $this->input->post('edit_alamat');
		$permintaan			= $this->input->post('edit_catatan');

		$users			= $data['tbl_pengguna']= $this->ion_auth->user()->result();
		foreach($users as $value)
		{
        	$username		= $value->email;
        	$id_customer 	= $value->id;
        }

	    	$config['upload_path'] = './assets/images/permintaan/';
		    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
		    $config['encrypt_name'] = TRUE;

		    $this->upload->initialize($config);
		    if(!empty($_FILES['tambah_foto']['name']))
		    {
		        if ($this->upload->do_upload('tambah_foto'))
		        {
		            $gbr 		= $this->upload->data();
		            $config['image_library']='gd2';
		            $config['source_image']='./assets/images/permintaan/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
		            $config['maintain_ratio']= TRUE;
		            $config['quality']= '100%';
		            //$config['width']= 1000;
		            //$config['height']= 1000;
		            $config['new_image']= './assets/images/permintaan/'.$gbr['file_name'];
		            $this->load->library('image_lib', $config);
		            $this->image_lib->resize();

					$photo 					= $gbr['file_name'];
					$pembelian 				= array(
			    		'customer_id'					=> $id_customer,
			    		'ongkir_id'						=> $ongkir,
			    		'alamat'						=> $alamat,
			    		'permintaan'					=> $permintaan,
			    		'foto_permintaan'				=> $photo
			    	);
				}else
				{
		                redirect('user','refresh');
		        }
		                 
		        }else{

						$pembelian 				= array(
				    		'customer_id'					=> $id_customer,
				    		'ongkir_id'						=> $ongkir,
				    		'alamat'						=> $alamat,
				    		'permintaan'					=> $permintaan);
		        }
	    	

	    	$ajax 			= $this->Model_penjualan->update_pembelian_custom_user_design($id_penjualan,$pembelian);
			
		echo json_encode($ajax);
	}

	public function batal_pembelian_custom_design()
	{
		$id_penjualan 			= $this->input->post('id_penjualan');
		$ajax 					= $this->Model_penjualan->delete_penjualan_custom_design_by_id($id_penjualan);

		echo json_encode($ajax);
	}

}
