<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Interior extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_interior');
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
		$data['title'] 		= 'Data Interior';
		$this->load->view('admin/interior/View_interior',$data);
	}

	public function get_all_interior()
	{
		$ajax 		= $this->Model_interior->get_all_interior_admin();
		echo json_encode($ajax);
	}
	/*
	public function get_barang_by_id()
	{
		$id_barang 			= $this->input->post('id_barang');
		$ajax 				= $this->Model_barang->get_barang_by_id($id_barang);
		echo json_encode($ajax);
	}

	public function get_foto_utama_barang_by_id()
	{
		$id_barang 			= $this->input->post('id_barang');
		$ajax 				= $this->Model_barang->get_foto_utama_barang_by_id($id_barang);
		echo json_encode($ajax);
	}

	public function get_foto_barang_by_id()
	{
		$id_barang 			= $this->input->post('id_barang');
		$foto_utama 		= $this->Model_barang->get_foto_utama_barang_by_id_no_ajax($id_barang);
		$ajax 				= $this->Model_barang->get_foto_barang_by_id($id_barang,$foto_utama);
		echo json_encode($ajax);
	}

	public function tambah_barang()
	{
		$data['title']				= 'Tambah Data Barang';
		$this->load->view('admin/barang/View_tambah_barang',$data);
	}

	public function set_barang()
	{
		$jml_foto 			= $this->input->post('jml_foto');
		if(empty($jml_foto)) // Jika foto yang dimasukkan cuma satu
		{
			$jml_foto 		= 1;
		}
		$id_barang 			= $this->Model_barang->find_new_id_barang();
		$nm_barang 			= $this->input->post('tambah_nama');
		$deskripsi 			= $this->input->post('tambah_deskripsi');
		$kategori 			= $this->input->post('tambah_kategori');
		$subkategori 		= $this->input->post('tambah_subkategori');
		$jual 				= $this->input->post('tambah_jual');
		$barang 			= array(
			'barang_id'			=> $id_barang,
			'kategori_id'		=> $kategori,
			'sub_kategori_id'	=> $subkategori,
			'barang_nama'		=> $nm_barang,
			'barang_harga_jual'	=> $jual,
			'barang_deskripsi'	=> $deskripsi
		);

		$this->Model_barang->set_barang($barang); // Simpan data barang
		$this->Model_barang->add_input_kategori($kategori); // Menambah jumlah input kategori
		$this->Model_barang->add_input_subkategori($subkategori); // Menambah jumlah input subkategori

		// Fungsi simpan gambar
		$config 					= array();
		$config['upload_path']		= './assets/images/barang/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp'; 
		$config['encrypt_name'] 	= TRUE;
		for($i=0; $i <= $jml_foto; $i++)
	    {              	
		    $this->upload->initialize($config);

			if(!empty($_FILES['tambah_foto'.$i]['name']))
		    {	
		        if ($this->upload->do_upload('tambah_foto'.$i))
		        {
		            $gbr = $this->upload->data();
		            $config['image_library']='gd2';
		            $config['source_image']='./assets/images/barang/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
		            $config['maintain_ratio']= FALSE;
		            $config['quality']= '100%';
		            //$config['width']= 1200;
		            //$config['height']= 1200;
		            $config['new_image']= './assets/images/barang/'.$gbr['file_name'];
		            $this->load->library('image_lib', $config);
		            $this->image_lib->resize();

		            $photo 			= $gbr['file_name'];
					$foto[] 		= array(
						'barang_id'				=> $id_barang,
						'foto_barang_nama'		=> $photo
					);
				}else
				{
		        	redirect('admin/barang');
		        }    
		    }          

	    }
			
		$this->db->insert_batch('tbl_foto_barang', $foto); // fungsi  untuk menyimpan multi array ke database

		// Menyimpan foto utama barang
		$barang 		= array(
			'foto_barang_id'			=> $this->Model_barang->find_id_foto_utama_barang($id_barang)
		);

		$this->Model_barang->update_barang($id_barang,$barang);

		redirect('admin/barang');
	}

	function set_foto_utama()
	{
		$id_barang 				= $this->input->post('barang_id');
		$foto_barang_id 		= $this->input->post('foto_barang_id');
		$foto 					= array(
			'foto_barang_id'		=> $foto_barang_id
		);

		$ajax 					= $this->Model_barang->set_foto_utama($id_barang,$foto);
	}

	function delete_barang()
	{
		$id_barang 				= $this->input->post('hapus_id');
		$kategori_old 			= $this->input->post('kategori');
		$subkategori_old 		= $this->input->post('subkategori');

		$this->Model_barang->remove_input_kategori($kategori_old);
		$this->Model_barang->remove_input_subkategori($subkategori_old);
		$ajax 					= $this->Model_barang->delete_barang($id_barang);

		$query 					= $this->Model_barang->get_all_foto_barang_by_id_no_ajax($id_barang);
		foreach($query->result_array() as $i)
		{
			$id_foto_barang 	= $i['foto_barang_id'];
			$foto 				= $i['foto_barang_nama'];
			$path 				= './assets/images/barang/'.$foto;
			unlink($path);
			$this->Model_barang->delete_foto_barang_by_id($id_foto_barang);
		}
		echo json_encode($ajax);
	}

	public function delete_foto_barang_by_id()
	{
		$id_foto_barang 		= $this->input->post('hapus_id');
		$path 					= './assets/images/barang/'.$this->input->post('hapus_nama');
		unlink($path);

		$ajax 					= $this->Model_barang->delete_foto_barang_by_id($id_foto_barang);

		echo json_encode($ajax);
	}

	function edit_barang()
	{
		$id_barang 				= $this->uri->segment(4);
		$data['title']			= 'Edit Data Barang';
		$this->load->view('admin/barang/View_edit_barang',$data);
	}

	function edit_foto()
	{
		$id_barang 			 	= $this->uri->segment(4);
		$data['title']			= 'Data Foto Barang '.$id_barang;
		$this->load->view('admin/barang/View_edit_foto',$data);
	}

	function update_barang()
	{
		$jml_foto 			= $this->input->post('jml_foto');
		if(empty($jml_foto)) // Jika foto yang dimasukkan cuma satu
		{
			$jml_foto 		= 1;
		}
		$id_barang 			= $this->input->post('id_barang');
		$nm_barang 			= $this->input->post('edit_nama');
		$deskripsi 			= $this->input->post('edit_deskripsi');
		$kategori 			= $this->input->post('edit_kategori');
		$kategori_old 		= $this->input->post('edit_kategori_old');
		$subkategori 		= $this->input->post('edit_subkategori');
		$subkategori_old 	= $this->input->post('edit_subkategori_old');
		$jual 				= $this->input->post('edit_jual');
		$barang 			= array(
			'kategori_id'		=> $kategori,
			'sub_kategori_id'	=> $subkategori,
			'barang_nama'		=> $nm_barang,
			'barang_harga_jual'	=> $jual,
			'barang_deskripsi'	=> $deskripsi
		);

		$this->Model_barang->update_barang($id_barang,$barang); // Update data barang
		$this->Model_barang->remove_input_kategori($kategori_old);
		$this->Model_barang->remove_input_subkategori($subkategori_old);
		$this->Model_barang->add_input_kategori($kategori); // Menambah jumlah input kategori
		$this->Model_barang->add_input_subkategori($subkategori); // Menambah jumlah input subkategori

		// Fungsi simpan gambar
		$config 					= array();
		$config['upload_path']		= './assets/images/barang/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp'; 
		$config['encrypt_name'] 	= TRUE;
		for($i=0; $i <= $jml_foto; $i++)
	    {              	
		    $this->upload->initialize($config);

			if(!empty($_FILES['tambah_foto'.$i]['name']))
		    {	
		        if ($this->upload->do_upload('tambah_foto'.$i))
		        {
		            $gbr = $this->upload->data();
		            $config['image_library']='gd2';
		            $config['source_image']='./assets/images/barang/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
		            $config['maintain_ratio']= FALSE;
		            $config['quality']= '100%';
		            //$config['width']= 1200;
		            //$config['height']= 1200;
		            $config['new_image']= './assets/images/barang/'.$gbr['file_name'];
		            $this->load->library('image_lib', $config);
		            $this->image_lib->resize();

		            $photo 			= $gbr['file_name'];
					$foto[] 		= array(
						'barang_id'				=> $id_barang,
						'foto_barang_nama'		=> $photo
					);
				}else
				{
		        	redirect('admin/barang');
		        }    
		    }          

	    }

	    // Pengecekan field foto apadakah ada data yang akan diupload
	    $tbh_foto 		= 0;
	    for($i=0; $i <= $jml_foto; $i++)
	    { 
	    	if(!empty($_FILES['tambah_foto'.$i]['name']))
		    {
		    	$tbh_foto 		 = ($tbh_foto+1);
		    }else
		    {
		    	$tbh_foto 			= ($tbh_foto+0);
		    }

	    }
		
		if($tbh_foto>0)
		{
			$this->db->insert_batch('tbl_foto_barang', $foto); // fungsi  untuk menyimpan multi array ke database
		}
		

		redirect('admin/barang');
	} */

	/* ==== Class Kategori Interior === */
	public function kategori_interior()
	{
		$data['title'] 		= 'Kategori Utama Interior';
		$this->load->view('admin/interior/View_kategori_interior',$data);
	}
	
	public function get_all_kategori_interior()
	{
		$ajax 		= $this->Model_interior->get_all_kategori_interior();
		echo json_encode($ajax);
	}

	public function get_select_kategori_interior_ajax()
	{
		$ajax 		= $this->Model_interior->get_select_kategori_interior_ajax();
		echo json_encode($ajax);
	}

	public function get_kategori_interior_by_id()
	{
		$id_kategori 		= $this->input->post('id_kategori');
		$ajax 				= $this->Model_interior->get_kategori_interior_by_id($id_kategori);

		echo json_encode($ajax);
	}

	public function set_kategori_interior()
	{
		$id_kategori 		= $this->Model_interior->find_new_id_kategori_interior();
		$nm_kategori 		= $this->input->post('tambah_nama');

		$kategori 			= array(
			'kategori_interior_id'			=> $id_kategori,
			'kategori_interior_nama'		=> $nm_kategori
		);

		$ajax 				= $this->Model_interior->set_kategori_interior($kategori);
		echo json_encode($ajax);
	}

	public function delete_kategori_interior()
	{
		$id_kategori 		= $this->input->post('hapus_id');

		$ajax 				= $this->Model_interior->delete_kategori_interior($id_kategori);
		echo json_encode($ajax);
	}

	public function update_kategori_interior()
	{
		$id_kategori 		= $this->input->post('edit_id');
		$nm_kategori		= $this->input->post('edit_nama');
		$kategori 			= array(
			'kategori_interior_id'		=> $id_kategori,
			'kategori_interior_nama'	=> $nm_kategori
		);

		$ajax 				= $this->Model_interior->update_kategori_interior($id_kategori,$kategori);
		echo json_encode($ajax);
	}

	/* ==== Class Sub 1 Kategori Interior === */
	public function sub_1_kategori_interior()
	{
		$data['title'] 		= 'Sub 1 Kategori Interior';
		$this->load->view('admin/interior/View_sub_1_kategori_interior',$data);
	}
	
	public function get_all_sub_1_kategori_interior()
	{
		$ajax 		= $this->Model_interior->get_all_sub_1_kategori_interior();
		echo json_encode($ajax);
	}

	public function get_select_sub_1_kategori_ajax()
	{
		$ajax 		= $this->Model_interior->get_select_sub_1_kategori_ajax();
		echo json_encode($ajax);
	}

	public function get_sub_1_kategori_interior_by_id()
	{
		$id_sub_1_kategori 		= $this->input->post('id_sub_kategori');
		$ajax 					= $this->Model_interior->get_sub_1_kategori_interior_by_id($id_sub_1_kategori);

		echo json_encode($ajax);
	}

	public function set_sub_1_kategori_interior()
	{
		$id_sub_1_kategori 		= $this->Model_interior->find_new_id_sub_1_kategori_interior();
		$nm_sub_1_kategori 		= $this->input->post('tambah_nama');

		$sub_1_kategori 			= array(
			'sub_1_kategori_interior_id'		=> $id_sub_1_kategori,
			'sub_1_kategori_interior_nama'		=> $nm_sub_1_kategori
		);

		$ajax 				= $this->Model_interior->set_sub_1_kategori_interior($sub_1_kategori);
		echo json_encode($ajax);
	}

	public function delete_sub_1_kategori_interior()
	{
		$id_sub_1_kategori 		= $this->input->post('hapus_id');

		$ajax 					= $this->Model_interior->delete_sub_1_kategori_interior($id_sub_1_kategori);
		echo json_encode($ajax);
	}

	public function update_sub_1_kategori_interior()
	{
		$id_sub_1_kategori 		= $this->input->post('edit_id');
		$nm_sub_1_kategori		= $this->input->post('edit_nama');
		$sub_1_kategori 			= array(
			'sub_1_kategori_interior_id'	=> $id_sub_1_kategori,
			'sub_1_kategori_interior_nama'	=> $nm_sub_1_kategori
		);

		$ajax 				= $this->Model_interior->update_sub_1_kategori_interior($id_sub_1_kategori,$sub_1_kategori);
		echo json_encode($ajax);
	}

	/* ==== Class Sub 2 Kategori Interior === */
	public function sub_2_kategori_interior()
	{
		$data['title'] 		= 'Sub 2 Kategori Interior';
		$this->load->view('admin/interior/View_sub_2_kategori_interior',$data);
	}
	
	public function get_all_sub_2_kategori_interior()
	{
		$ajax 		= $this->Model_interior->get_all_sub_2_kategori_interior();
		echo json_encode($ajax);
	}

	public function get_select_sub_2_kategori_ajax()
	{
		$ajax 		= $this->Model_interior->get_select_sub_2_kategori_ajax();
		echo json_encode($ajax);
	}

	public function get_sub_2_kategori_interior_by_id()
	{
		$id_sub_2_kategori 		= $this->input->post('id_sub_kategori');
		$ajax 					= $this->Model_interior->get_sub_2_kategori_interior_by_id($id_sub_2_kategori);

		echo json_encode($ajax);
	}

	public function set_sub_2_kategori_interior()
	{
		$id_sub_2_kategori 		= $this->Model_interior->find_new_id_sub_2_kategori_interior();
		$nm_sub_2_kategori 		= $this->input->post('tambah_nama');

		$sub_2_kategori 			= array(
			'sub_2_kategori_interior_id'		=> $id_sub_2_kategori,
			'sub_2_kategori_interior_nama'		=> $nm_sub_2_kategori
		);

		$ajax 				= $this->Model_interior->set_sub_2_kategori_interior($sub_2_kategori);
		echo json_encode($ajax);
	}

	public function delete_sub_2_kategori_interior()
	{
		$id_sub_2_kategori 		= $this->input->post('hapus_id');

		$ajax 					= $this->Model_interior->delete_sub_2_kategori_interior($id_sub_2_kategori);
		echo json_encode($ajax);
	}

	public function update_sub_2_kategori_interior()
	{
		$id_sub_2_kategori 		= $this->input->post('edit_id');
		$nm_sub_2_kategori		= $this->input->post('edit_nama');
		$sub_2_kategori 			= array(
			'sub_2_kategori_interior_id'	=> $id_sub_2_kategori,
			'sub_2_kategori_interior_nama'	=> $nm_sub_2_kategori
		);

		$ajax 				= $this->Model_interior->update_sub_2_kategori_interior($id_sub_2_kategori,$sub_2_kategori);
		echo json_encode($ajax);
	}

}
