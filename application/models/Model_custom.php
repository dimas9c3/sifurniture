<?php 
class Model_custom extends Ci_Model
{
	/* ==== ADMIN AREA ==== */

	/* ==== CUSTOM SECTION ==== */

	function get_all_custom()
	{
		$this->db->select('*');
		$this->db->from('tbl_custom');
		$this->db->join('tbl_style_custom','tbl_style_custom.style_id=tbl_custom.style_id','INNER');
		$this->db->join('tbl_jenis_custom','tbl_jenis_custom.jenis_id=tbl_custom.jenis_id','INNER');
		$this->db->join('tbl_material_custom','tbl_material_custom.material_id=tbl_custom.material_id','INNER');
		$this->db->join('tbl_coating_custom','tbl_coating_custom.coating_id=tbl_custom.coating_id','INNER');
		$this->db->join('tbl_jog_custom','tbl_jog_custom.jog_id=tbl_custom.jog_id','INNER');
		$this->db->order_by('tbl_style_custom.style_nama','ASC');
		$this->db->order_by('tbl_jenis_custom.jenis_nama','ASC');
		$this->db->order_by('tbl_material_custom.material_nama','ASC');
		$this->db->order_by('tbl_coating_custom.coating_nama','ASC');
		$this->db->order_by('tbl_jog_custom.jog_nama','ASC');
		$query 			= $this->db->get();

		if($query->num_rows() >0)
		{
			$data 			= array();
			$no 			= 0;
			foreach($query->result_array() as $i)
			{
				$no++;
				$row 		= array();

				$row[]		= $no;
				$row[]		= "<a href='".base_url()."assets/images/custom/".$i['custom_foto']."'><img width='100px' height='100px' class='img-square' src='".base_url()."assets/images/custom/".$i['custom_foto']."'></a>";
				$row[]		= $i['style_nama'];
				$row[]		= $i['jenis_nama'];
				$row[]		= $i['material_nama'];
				$row[]		= $i['coating_nama'];
				$row[]		= $i['jog_nama'];
				$row[]		= "Rp. ".number_format($i['harga_jual']);
				$row[]		= 
				"<button type='button' data='".$i['custom_id']."' foto='".$i['custom_foto']."' data-toggle='tooltip' data-placement='top' title='Edit data' class='btn btn-info btn-sm item-edit'><i class='fa fa-pencil'></i><span> Edit Content</span></button>
                <button type='button' data='".$i['custom_id']."' foto='".$i['custom_foto']."' data-toggle='tooltip' data-placement='top' title='Hapus data' class='btn btn-danger btn-sm item-hapus'><i class='fa fa-trash'></i><span> Hapus</span></button>";


				$data[]			= $row;
			}
		}else
		{
			$row 		= array();

			$row[]		= '';
			$row[]		= '';
			$row[]		= '';
			$row[]		= '';
			$row[]		= '';
			$row[]		= '';
			$row[]		= '';
			$row[]		= '';
			$row[]		= '';

			$data[]			= $row;
		}

		return $output 		= array(
			'data'			=> $data
		);
	}

	function get_custom_by_id($id_custom)
	{
		$this->db->where('custom_id',$id_custom);
		$query 				= $this->db->get('tbl_custom');

		if($query->num_rows()>0)
		{
			foreach($query->result_array() as $i)
			{
				$data 		= array(
					'custom_id'		=> $i['custom_id'],
					'style_id'		=> $i['style_id'],
					'jenis_id'		=> $i['jenis_id'],
					'material_id'	=> $i['material_id'],
					'coating_id'	=> $i['coating_id'],
					'jog_id'		=> $i['jog_id'],
					'harga_jual'	=> $i['harga_jual'],
					'foto'			=> $i['custom_foto']
				);
			}
		}else
		{
			$data 			= array('Data Tidak Ditemukan');
		}

		return $data;
	}

	function set_custom($custom)
	{
		$query 			= $this->db->insert('tbl_custom',$custom);

		return $query;
	}

	function delete_custom($id_custom)
	{
		$this->db->where('custom_id',$id_custom);
		$query 			= $this->db->delete('tbl_custom');

		return $query;
	}

	function update_custom($id_custom,$custom)
	{
		$this->db->where('custom_id',$id_custom);
		$query 			= $this->db->update('tbl_custom',$custom);

		return $query;
	}

	// Mencari id baru berdasarkan id max
	function find_new_id_custom()
	{
		$query 			= $this->db->query('SELECT MAX(CAST(SUBSTRING(custom_id, 4, length(custom_id)-3) AS UNSIGNED)) as custom_id FROM tbl_custom');
		$row 			= $query->row_array();
		$output 		= 'CTM'.($row['custom_id']+1);

		return $output;
	}

	/* ==== STYLE SECTION ==== */
	function get_all_style()
	{
		$query 			 = $this->db->get('tbl_style_custom');

		if($query->num_rows() >0)
		{
			$data 			= array();
			$no 			= 0;
			foreach($query->result_array() as $i)
			{
				$no++;
				$row 		= array();
				$row[]		= $no;
				$row[]		= "<a href='".base_url()."assets/images/style/".$i['style_foto']."'><img width='100px' height='100px' class='img-square' src='".base_url()."assets/images/style/".$i['style_foto']."'></a>";
				$row[]		= $i['style_nama'];
				$row[]		= "
				<button type='button' data='".$i['style_id']."' data-placement='top' title='Edit data' class='btn btn-info btn-sm item-edit'><span> <i class='fa fa-pencil'></i></span></button>
				<button type='button' data='".$i['style_id']."' data-placement='top' title='Hapus data' class='btn btn-danger btn-sm item-hapus'><span> <i class='fa fa-trash'></i></span></button>";

				$data[] 	= $row;
			}
		}else
		{
			$data 			= array();
			$row 			= array();
			$row[]			= ' ';
			$row[]			= ' ';
			$row[]			= ' ';
			$row[]			= ' ';
			$row[]		 	= ' ';

			$data[]			= $row;
		}

		return $data 		= array(
			'data'			=> $data
		);
	}

	function get_style_by_id($id_style)
	{
		$this->db->where('style_id',$id_style);
		$query 				= $this->db->get('tbl_style_custom');

		$row 				= $query->row_array();

		$data 				= array(
			'id_style'		=> $row['style_id'],
			'nm_style'		=> $row['style_nama'],
			'foto'			=> $row['style_foto'],
			'deskripsi'		=> $row['style_deskripsi']
		);

		return $data;
	}

	function get_select_style_ajax()
	{
		$this->db->order_by('style_nama','ASC');
		$query 				= $this->db->get('tbl_style_custom');

		return $query->result();
	}

	function set_style($style)
	{
		$query 				= $this->db->insert('tbl_style_custom',$style);

		return $query;
	}

	function update_style($id_style,$style)
	{
		$this->db->where('style_id',$id_style);
		$query 				= $this->db->update('tbl_style_custom',$style);

		return $query;
	}

	function delete_style($id_style)
	{
		$this->db->where('style_id',$id_style);
		$query 				= $this->db->delete('tbl_style_custom');

		return $query;
	}

	/* ==== JENIS SECTION ==== */
	function get_all_jenis()
	{
		$query 			 = $this->db->get('tbl_jenis_custom');

		if($query->num_rows() >0)
		{
			$data 			= array();
			$no 			= 0;
			foreach($query->result_array() as $i)
			{
				$no++;
				$row 		= array();
				$row[]		= $no;
				$row[]		= $i['jenis_nama'];
				$row[]		= "
				<button type='button' data='".$i['jenis_id']."' data-placement='top' title='Edit data' class='btn btn-info btn-sm item-edit'><span> <i class='fa fa-pencil'></i></span></button>
				<button type='button' data='".$i['jenis_id']."' data-placement='top' title='Hapus data' class='btn btn-danger btn-sm item-hapus'><span> <i class='fa fa-trash'></i></span></button>";

				$data[] 	= $row;
			}
		}else
		{
			$data 			= array();
			$row 			= array();
			$row[]			= ' ';
			$row[]			= ' ';
			$row[]			= ' ';

			$data[]			= $row;
		}

		return $data 		= array(
			'data'			=> $data
		);
	}

	function get_jenis_by_id($id_jenis)
	{
		$this->db->where('jenis_id',$id_jenis);
		$query 				= $this->db->get('tbl_jenis_custom');

		$row 				= $query->row_array();

		$data 				= array(
			'id_jenis'		=> $row['jenis_id'],
			'nm_jenis'		=> $row['jenis_nama']
		);

		return $data;
	}

	function get_select_jenis_ajax()
	{
		$this->db->order_by('jenis_nama','ASC');
		$query 				= $this->db->get('tbl_jenis_custom');

		return $query->result();
	}

	function set_jenis($jenis)
	{
		$query 				= $this->db->insert('tbl_jenis_custom',$jenis);

		return $query;
	}

	function update_jenis($id_jenis,$jenis)
	{
		$this->db->where('jenis_id',$id_jenis);
		$query 				= $this->db->update('tbl_jenis_custom',$jenis);

		return $query;
	}

	function delete_jenis($id_jenis)
	{
		$this->db->where('jenis_id',$id_jenis);
		$query 				= $this->db->delete('tbl_jenis_custom');

		return $query;
	}

	/* ==== MATERIAL SECTION ==== */
	function get_all_material()
	{
		$query 			 = $this->db->get('tbl_material_custom');

		if($query->num_rows() >0)
		{
			$data 			= array();
			$no 			= 0;
			foreach($query->result_array() as $i)
			{
				$no++;
				$row 		= array();
				$row[]		= $no;
				$row[]		= $i['material_nama'];
				$row[]		= "
				<button type='button' data='".$i['material_id']."' data-placement='top' title='Edit data' class='btn btn-info btn-sm item-edit'><span> <i class='fa fa-pencil'></i></span></button>
				<button type='button' data='".$i['material_id']."' data-placement='top' title='Hapus data' class='btn btn-danger btn-sm item-hapus'><span> <i class='fa fa-trash'></i></span></button>";

				$data[] 	= $row;
			}
		}else
		{
			$data 			= array();
			$row 			= array();
			$row[]			= ' ';
			$row[]			= ' ';
			$row[]			= ' ';

			$data[]			= $row;
		}

		return $data 		= array(
			'data'			=> $data
		);
	}

	function get_material_by_id($id_material)
	{
		$this->db->where('material_id',$id_material);
		$query 				= $this->db->get('tbl_material_custom');

		$row 				= $query->row_array();

		$data 				= array(
			'id_material'		=> $row['material_id'],
			'nm_material'	=> $row['material_nama']
		);

		return $data;
	}

	function get_select_material_ajax()
	{
		$this->db->order_by('material_nama','ASC');
		$query 				= $this->db->get('tbl_material_custom');

		return $query->result();
	}

	function set_material($material)
	{
		$query 				= $this->db->insert('tbl_material_custom',$material);

		return $query;
	}

	function update_material($id_material,$material)
	{
		$this->db->where('material_id',$id_material);
		$query 				= $this->db->update('tbl_material_custom',$material);

		return $query;
	}

	function delete_material($id_material)
	{
		$this->db->where('material_id',$id_material);
		$query 				= $this->db->delete('tbl_material_custom');

		return $query;
	}

	/* ==== Coating SECTION ==== */
	function get_all_coating()
	{
		$query 			 = $this->db->get('tbl_coating_custom');

		if($query->num_rows() >0)
		{
			$data 			= array();
			$no 			= 0;
			foreach($query->result_array() as $i)
			{
				$no++;
				$row 		= array();
				$row[]		= $no;
				$row[]		= $i['coating_nama'];
				$row[]		= "
				<button type='button' data='".$i['coating_id']."' data-placement='top' title='Edit data' class='btn btn-info btn-sm item-edit'><span> <i class='fa fa-pencil'></i></span></button>
				<button type='button' data='".$i['coating_id']."' data-placement='top' title='Hapus data' class='btn btn-danger btn-sm item-hapus'><span> <i class='fa fa-trash'></i></span></button>";

				$data[] 	= $row;
			}
		}else
		{
			$data 			= array();
			$row 			= array();
			$row[]			= ' ';
			$row[]			= ' ';
			$row[]			= ' ';

			$data[]			= $row;
		}

		return $data 		= array(
			'data'			=> $data
		);
	}

	function get_coating_by_id($id_coating)
	{
		$this->db->where('coating_id',$id_coating);
		$query 				= $this->db->get('tbl_coating_custom');

		$row 				= $query->row_array();

		$data 				= array(
			'id_coating'		=> $row['coating_id'],
			'nm_coating'		=> $row['coating_nama']
		);

		return $data;
	}

	function get_select_coating_ajax()
	{
		$this->db->order_by('coating_nama','ASC');
		$query 				= $this->db->get('tbl_coating_custom');

		return $query->result();
	}

	function set_coating($coating)
	{
		$query 				= $this->db->insert('tbl_coating_custom',$coating);

		return $query;
	}

	function update_coating($id_coating,$coating)
	{
		$this->db->where('coating_id',$id_coating);
		$query 				= $this->db->update('tbl_coating_custom',$coating);

		return $query;
	}

	function delete_coating($id_coating)
	{
		$this->db->where('coating_id',$id_coating);
		$query 				= $this->db->delete('tbl_coating_custom');

		return $query;
	}

	/* ==== Jog SECTION ==== */
	function get_all_jog()
	{
		$query 			 = $this->db->get('tbl_jog_custom');

		if($query->num_rows() >0)
		{
			$data 			= array();
			$no 			= 0;
			foreach($query->result_array() as $i)
			{
				$no++;
				$row 		= array();
				$row[]		= $no;
				$row[]		= $i['jog_nama'];
				$row[]		= "
				<button type='button' data='".$i['jog_id']."' data-placement='top' title='Edit data' class='btn btn-info btn-sm item-edit'><span> <i class='fa fa-pencil'></i></span></button>
				<button type='button' data='".$i['jog_id']."' data-placement='top' title='Hapus data' class='btn btn-danger btn-sm item-hapus'><span> <i class='fa fa-trash'></i></span></button>";

				$data[] 	= $row;
			}
		}else
		{
			$data 			= array();
			$row 			= array();
			$row[]			= ' ';
			$row[]			= ' ';
			$row[]			= ' ';

			$data[]			= $row;
		}

		return $data 		= array(
			'data'			=> $data
		);
	}

	function get_jog_by_id($id_jog)
	{
		$this->db->where('jog_id',$id_jog);
		$query 				= $this->db->get('tbl_jog_custom');

		$row 				= $query->row_array();

		$data 				= array(
			'id_jog'		=> $row['jog_id'],
			'nm_jog'		=> $row['jog_nama']
		);

		return $data;
	}

	function get_select_jog_ajax()
	{
		$this->db->order_by('jog_nama','ASC');
		$query 				= $this->db->get('tbl_jog_custom');

		return $query->result();
	}

	function set_jog($jog)
	{
		$query 				= $this->db->insert('tbl_jog_custom',$jog);

		return $query;
	}

	function update_jog($id_jog,$jog)
	{
		$this->db->where('jog_id',$id_jog);
		$query 				= $this->db->update('tbl_jog_custom',$jog);

		return $query;
	}

	function delete_jog($id_jog)
	{
		$this->db->where('jog_id',$id_jog);
		$query 				= $this->db->delete('tbl_jog_custom');

		return $query;
	}

	/* ==== FRONTEND SECTION ==== */

	function get_style_front()
	{
		$this->db->order_by('style_nama');
		$query 				= $this->db->get('tbl_style_custom');

		return $query;
	}

	function get_style_select_front()
	{
		$this->db->order_by('style_nama');
		$query 						= $this->db->get('tbl_style_custom');

		return $query;
	}

	function get_jenis_by_style_select($id_style)
	{
		$this->db->select('tbl_jenis_custom.jenis_id,tbl_jenis_custom.jenis_nama');
		$this->db->from('tbl_custom');
		$this->db->join('tbl_jenis_custom','tbl_jenis_custom.jenis_id=tbl_custom.jenis_id');
		$this->db->where('tbl_custom.style_id',$id_style);
		$this->db->group_by('tbl_custom.jenis_id');
		$query 						= $this->db->get();

		return $query->result();
	}

	function get_material_by_jenis_select($id_jenis)
	{
		$this->db->select('tbl_material_custom.material_id,tbl_material_custom.material_nama');
		$this->db->from('tbl_custom');
		$this->db->join('tbl_material_custom','tbl_material_custom.material_id=tbl_custom.material_id');
		$this->db->where('tbl_custom.jenis_id',$id_jenis);
		$this->db->group_by('tbl_custom.material_id');
		$query 						= $this->db->get();

		return $query->result();
	}

	function get_coating_by_material_select($id_material)
	{
		$this->db->select('tbl_coating_custom.coating_id,tbl_coating_custom.coating_nama');
		$this->db->from('tbl_custom');
		$this->db->join('tbl_coating_custom','tbl_coating_custom.coating_id=tbl_custom.coating_id');
		$this->db->where('tbl_custom.material_id',$id_material);
		$this->db->group_by('tbl_custom.coating_id');
		$query 						= $this->db->get();

		return $query->result();
	}

	function get_jog_by_coating_select($id_coating)
	{
		$this->db->select('tbl_jog_custom.jog_id,tbl_jog_custom.jog_nama');
		$this->db->from('tbl_custom');
		$this->db->join('tbl_jog_custom','tbl_jog_custom.jog_id=tbl_custom.jog_id');
		$this->db->where('tbl_custom.coating_id',$id_coating);
		$this->db->group_by('tbl_custom.jog_id');
		$query 						= $this->db->get();

		return $query->result();
	}

	function get_custom_by_kriteria($id_style,$id_jenis,$id_material,$id_coating,$id_jog)
	{
		$this->db->where('style_id',$id_style);
		$this->db->where('jenis_id',$id_jenis);
		$this->db->where('material_id',$id_material);
		$this->db->where('coating_id',$id_coating);
		$this->db->where('jog_id',$id_jog);
		$query 						= $this->db->get('tbl_custom');

		return $query->result();
	}
}
?>