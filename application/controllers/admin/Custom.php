<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Custom extends CI_Controller
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
		$this->load->model('Model_custom');
	}

	public function index()
	{
		$data['title'] 			= 'Data Custom Design';
		$this->load->view('admin/custom/View_custom',$data);
	}

	public function get_all_custom()
	{
		$ajax 					= $this->Model_custom->get_all_custom();

		echo json_encode($ajax);
	}

	public function get_custom_by_id()
	{
		$id_custom 				= $this->input->post('id_custom');
		$ajax 					= $this->Model_custom->get_custom_by_id($id_custom);

		echo json_encode($ajax);

	}

	public function set_custom()
	{
		$id_custom 			= $this->Model_custom->find_new_id_custom();
		$id_style 			= $this->input->post('nama_style');
		$id_jenis 			= $this->input->post('nama_jenis');
		$id_material 		= $this->input->post('nama_material');
		$id_coating 		= $this->input->post('nama_coating');
		$id_jog 			= $this->input->post('nama_jog');
		$harga_jual 		= $this->input->post('harga_jual');

		$config 					= array();
		$config['upload_path']		= './assets/images/custom/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] 	= TRUE;
		$this->upload->initialize($config);

			if(!empty($_FILES['tambah_foto']['name']))
		    {
		        if ($this->upload->do_upload('tambah_foto'))
		        {
		            $gbr = $this->upload->data();
		            $config['image_library']='imagemagick';
		            $config['source_image']='./assets/images/custom/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
					$config['maintain_ratio']=TRUE;
					list($width, $height, $type, $attr) = getimagesize('./assets/images/custom/'.$gbr['file_name']);
					$config['width']= $width/5;
		           	$config['height']= $height/5;
		            $config['quality']= '50%';
		            $config['new_image']= './assets/images/custom/'.$gbr['file_name'];
		            $this->image_lib->initialize($config);
		            $this->image_lib->resize();

		            $photo 			= $gbr['file_name'];

		            $custom 			= array(
						'custom_id'			=> $id_custom,
						'style_id'			=> $id_style,
						'jenis_id'			=> $id_jenis,
						'material_id'		=> $id_material,
						'coating_id'		=> $id_coating,
						'jog_id'			=> $id_jog,
						'harga_jual'		=> $harga_jual,
						'custom_foto'		=> $photo
					);

					$this->Model_custom->set_custom($custom); // Simpan data custom
				}else
				{
		        	redirect('admin/custom');
		        }
		    }

		redirect('admin/custom');
	}

	public function update_custom()
	{
		$id_custom 			= $this->input->post('edit_custom_id');
		$id_style 			= $this->input->post('nama_style_edit');
		$id_jenis 			= $this->input->post('nama_jenis_edit');
		$id_material 		= $this->input->post('nama_material_edit');
		$id_coating 		= $this->input->post('nama_coating_edit');
		$id_jog 			= $this->input->post('nama_jog_edit');
		$harga_jual 		= $this->input->post('harga_jual_edit');

		$config 					= array();
		$config['upload_path']		= './assets/images/custom/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] 	= TRUE;
		$this->upload->initialize($config);

			if(!empty($_FILES['tambah_foto']['name']))
		    {
		        if ($this->upload->do_upload('tambah_foto'))
		        {
		        	$old_photo  		= './assets/images/custom/'.$this->input->post('foto_edit');
		        	unlink($old_photo);

		            $gbr = $this->upload->data();
		            $config['image_library']='imagemagick';
		            $config['source_image']='./assets/images/custom/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
					$config['maintain_ratio']=TRUE;
 				   list($width, $height, $type, $attr) = getimagesize('./assets/images/custom/'.$gbr['file_name']);
 				   $config['width']= $width/5;
 				   $config['height']= $height/5;
 				   $config['quality']= '50%';
		            $config['new_image']= './assets/images/custom/'.$gbr['file_name'];
		            $this->image_lib->initialize($config);
		            $this->image_lib->resize();

		            $photo 			= $gbr['file_name'];

		            $custom 			= array(
						'style_id'			=> $id_style,
						'jenis_id'			=> $id_jenis,
						'material_id'		=> $id_material,
						'coating_id'		=> $id_coating,
						'jog_id'			=> $id_jog,
						'harga_jual'		=> $harga_jual,
						'custom_foto'		=> $photo
					);
				}else
				{
		        	redirect('admin/custom');
		        }
		    }else
		    {
		    	$custom 			= array(
					'style_id'			=> $id_style,
					'jenis_id'			=> $id_jenis,
					'material_id'		=> $id_material,
					'coating_id'		=> $id_coating,
					'jog_id'			=> $id_jog,
					'harga_jual'		=> $harga_jual
				);
		    }

		$this->Model_custom->update_custom($id_custom,$custom); // Update data custom

		redirect('admin/custom');
	}

	public function delete_custom()
	{
		$id_custom 				= $this->input->post('id_custom');
		$path 					='./assets/images/custom/'.$this->input->post('foto');

		$ajax 					= $this->Model_custom->delete_custom($id_custom);

		if($ajax=='TRUE')
		{
			unlink($path);
		}

		echo json_encode($ajax);
	}

	/* ==== STYLE SECTION ==== */

	public function get_all_style()
	{
		$ajax 					= $this->Model_custom->get_all_style();

		echo json_encode($ajax);
	}

	public function get_style_by_id()
	{
		$id_style 				= $this->input->post('id_style');
		$ajax 					= $this->Model_custom->get_style_by_id($id_style);

		echo json_encode($ajax);
	}

	public function get_select_style_ajax()
	{
		$ajax 					= $this->Model_custom->get_select_style_ajax();
		echo json_encode($ajax);
	}

	public function set_style()
	{
		$nm_style 					= $this->input->post('tambah_style');
		$deskripsi 					= $this->input->post('style_deskripsi');

		$config 					= array();
		$config['upload_path']		= './assets/images/style/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] 	= TRUE;
		$this->upload->initialize($config);

			if(!empty($_FILES['style_foto']['name']))
		    {
		        if ($this->upload->do_upload('style_foto'))
		        {
		            $gbr = $this->upload->data();
		            $config['image_library']='gd2';
		            $config['source_image']='./assets/images/style/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
		            $config['maintain_ratio']= FALSE;
		            $config['quality']= '85%';
		            $config['width']= 365;
		            $config['height']= 365;
		            $config['new_image']= './assets/images/style/'.$gbr['file_name'];
		            $this->image_lib->initialize($config);
		            $this->image_lib->resize();

		            $photo 			= $gbr['file_name'];

		            $style 					= array(
						'style_nama'		=> $nm_style,
						'style_deskripsi'	=> $deskripsi,
						'style_foto'		=> $photo
					);
				}else
				{
		        	redirect('admin/custom');
		        }
		    }else
		    {
		    	$style 					= array(
					'style_nama'		=> $nm_style,
					'style_deskripsi'	=> $deskripsi
				);
		    }

		$ajax 					= $this->Model_custom->set_style($style);

		echo json_encode($ajax);
	}

	public function update_style()
	{
		$id_style 					= $this->input->post('edit_style_id');
		$nm_style 					= $this->input->post('edit_style');
		$deskripsi 					= $this->input->post('style_deskripsi_edit');

		$config 					= array();
		$config['upload_path']		= './assets/images/style/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] 	= TRUE;
		$this->upload->initialize($config);

			if(!empty($_FILES['style_foto_edit']['name']))
		    {
		    	$path 				= './assets/images/style/'.$this->input->post('style_old_photo');
		    	unlink($path); // hapus gambar lama
		        if ($this->upload->do_upload('style_foto_edit'))
		        {
		            $gbr = $this->upload->data();
		            $config['image_library']='gd2';
		            $config['source_image']='./assets/images/style/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
		            $config['maintain_ratio']= FALSE;
		            $config['quality']= '85%';
		            $config['width']= 365;
		            $config['height']= 365;
		            $config['new_image']= './assets/images/style/'.$gbr['file_name'];
		            $this->image_lib->initialize($config);
		            $this->image_lib->resize();

		            $photo 			= $gbr['file_name'];

		            $style 					= array(
						'style_nama'		=> $nm_style,
						'style_deskripsi'	=> $deskripsi,
						'style_foto'		=> $photo
					);
				}else
				{
		        	redirect('admin/custom');
		        }
		    }else
		    {
		    	$style 					= array(
					'style_nama'		=> $nm_style,
					'style_deskripsi'	=> $deskripsi
				);
		    }

		$ajax 					= $this->Model_custom->update_style($id_style,$style);

		echo json_encode($ajax);
	}

	public function delete_style()
	{
		$id_style 				= $this->input->post('id_style');
		$ajax 					= $this->Model_custom->delete_style($id_style);

		echo json_encode($ajax);

	}

	/* ==== JENIS PRODUK ==== */
	public function get_all_jenis()
	{
		$ajax 					= $this->Model_custom->get_all_jenis();

		echo json_encode($ajax);
	}

	public function get_jenis_by_id()
	{
		$id_jenis 				= $this->input->post('id_jenis');
		$ajax 					= $this->Model_custom->get_jenis_by_id($id_jenis);

		echo json_encode($ajax);
	}

	public function get_select_jenis_ajax()
	{
		$ajax 					= $this->Model_custom->get_select_jenis_ajax();
		echo json_encode($ajax);
	}

	public function set_jenis()
	{
		$nm_jenis 				= $this->input->post('tambah_jenis');
		$jenis 					= array(
			'jenis_nama'		=> $nm_jenis
		);

		$ajax 					= $this->Model_custom->set_jenis($jenis);

		echo json_encode($ajax);
	}

	public function update_jenis()
	{
		$id_jenis 				= $this->input->post('edit_jenis_id');
		$nm_jenis 				= $this->input->post('edit_jenis');
		$jenis 					= array(
			'jenis_nama'		=> $nm_jenis
		);

		$ajax 					= $this->Model_custom->update_jenis($id_jenis,$jenis);

		echo json_encode($ajax);
	}

	public function delete_jenis()
	{
		$id_jenis 				= $this->input->post('id_jenis');
		$ajax 					= $this->Model_custom->delete_jenis($id_jenis);

		echo json_encode($ajax);

	}

	/* ==== Material PRODUK ==== */
	public function get_all_material()
	{
		$ajax 					= $this->Model_custom->get_all_material();

		echo json_encode($ajax);
	}

	public function get_material_by_id()
	{
		$id_material			= $this->input->post('id_material');
		$ajax 					= $this->Model_custom->get_material_by_id($id_material);

		echo json_encode($ajax);
	}

	public function get_select_material_ajax()
	{
		$ajax 					= $this->Model_custom->get_select_material_ajax();
		echo json_encode($ajax);
	}

	public function set_material()
	{
		$nm_material 			= $this->input->post('tambah_material');
		$material 				= array(
			'material_nama'		=> $nm_material
		);

		$ajax 					= $this->Model_custom->set_material($material);

		echo json_encode($ajax);
	}

	public function update_material()
	{
		$id_material 			= $this->input->post('edit_material_id');
		$nm_material 			= $this->input->post('edit_material');
		$material 				= array(
			'material_nama'		=> $nm_material
		);

		$ajax 					= $this->Model_custom->update_material($id_material,$material);

		echo json_encode($ajax);
	}

	public function delete_material()
	{
		$id_material			= $this->input->post('id_material');
		$ajax 					= $this->Model_custom->delete_material($id_material);

		echo json_encode($ajax);

	}

	/* ==== Coating Finishing PRODUK ==== */
	public function get_all_coating()
	{
		$ajax 					= $this->Model_custom->get_all_coating();

		echo json_encode($ajax);
	}

	public function get_coating_by_id()
	{
		$id_coating				= $this->input->post('id_coating');
		$ajax 					= $this->Model_custom->get_coating_by_id($id_coating);

		echo json_encode($ajax);
	}

	public function get_select_coating_ajax()
	{
		$ajax 					= $this->Model_custom->get_select_coating_ajax();
		echo json_encode($ajax);
	}

	public function set_coating()
	{
		$nm_coating 			= $this->input->post('tambah_coating');
		$coating 				= array(
			'coating_nama'		=> $nm_coating
		);

		$ajax 					= $this->Model_custom->set_coating($coating);

		echo json_encode($ajax);
	}

	public function update_coating()
	{
		$id_coating 			= $this->input->post('edit_coating_id');
		$nm_coating 			= $this->input->post('edit_coating');
		$coating 				= array(
			'coating_nama'		=> $nm_coating
		);

		$ajax 					= $this->Model_custom->update_coating($id_coating,$coating);

		echo json_encode($ajax);
	}

	public function delete_coating()
	{
		$id_coating				= $this->input->post('id_coating');
		$ajax 					= $this->Model_custom->delete_coating($id_coating);

		echo json_encode($ajax);

	}

	/* ==== Jog PRODUK ==== */
	public function get_all_jog()
	{
		$ajax 					= $this->Model_custom->get_all_jog();

		echo json_encode($ajax);
	}

	public function get_jog_by_id()
	{
		$id_jog					= $this->input->post('id_jog');
		$ajax 					= $this->Model_custom->get_jog_by_id($id_jog);

		echo json_encode($ajax);
	}

	public function get_select_jog_ajax()
	{
		$ajax 					= $this->Model_custom->get_select_jog_ajax();
		echo json_encode($ajax);
	}

	public function set_jog()
	{
		$nm_jog		 			= $this->input->post('tambah_jog');
		$jog 	 				= array(
			'jog_nama'		=> $nm_jog
		);

		$ajax 					= $this->Model_custom->set_jog($jog);

		echo json_encode($ajax);
	}

	public function update_jog()
	{
		$id_jog		 			= $this->input->post('edit_jog_id');
		$nm_jog		 			= $this->input->post('edit_jog');
		$jog 					= array(
			'jog_nama'			=> $nm_jog
		);

		$ajax 					= $this->Model_custom->update_jog($id_jog,$jog);

		echo json_encode($ajax);
	}

	public function delete_jog()
	{
		$id_jog					= $this->input->post('id_jog');
		$ajax 					= $this->Model_custom->delete_jog($id_jog);

		echo json_encode($ajax);

	}

}
