<?php 
class Model_interior extends Ci_Model
{
	function get_all_interior_admin()
	{
		$this->db->select('*');
		$this->db->from('tbl_interior','tbl_kategori_interior');
		$this->db->join('tbl_kategori_interior','tbl_kategori_interior.kategori_interior_id=tbl_interior.kategori_interior_id','INNER');
		$this->db->join('tbl_sub_1_kategori_interior','tbl_sub_1_kategori_interior.sub_1_kategori_interior_id=tbl_kategori_interior.sub_1_kategori_interior_id','INNER');
		$this->db->join('tbl_sub_2_kategori_interior','tbl_sub_2_kategori_interior.sub_2_kategori_interior_id=tbl_kategori_interior.sub_2_kategori_interior_id','INNER');
		$this->db->join('tbl_foto_interior','tbl_foto_interior.foto_interior_id=tbl_interior.foto_interior_id','INNER');
		$this->db->order_by('kategori_interior_nama');
		$this->db->order_by('sub_1_kategori_interior_nama');
		$this->db->order_by('sub_2_kategori_interior_nama');
		$this->db->order_by('interior_nama');
		$query 		= $this->db->get();
		if($query->num_rows()>0)
		{
			$data 		= array();
			$no 		= 0;
			foreach($query->result_array() as $i)
			{
				$row 		= array();
				$no++;
				$row[] 		= $no;
				$row[]		= "<a href='".base_url()."assets/images/interior/".$i['foto_interior_nama']."'><img width='100' height='100' class='img-square' src='".base_url()."assets/images/interior/".$i['foto_interior_nama']."'></a>";
				$row[]		= $i['interior_id'];
				$row[]		= $i['sub_1_kategori_interior_nama'];
				$row[]		= $i['sub_2_kategori_interior_nama'];
				$row[]		= $i['kategori_interior_nama'];
				$row[]		= $i['interior_nama'];
				$row[]		= $i['interior_harga_jual'];
				$row[]		= $i['interior_diskon']." %";
				$row[]		= $i['interior_harga_jual']-($i['interior_harga_jual']*($i['interior_diskon']/100));
				$row[]		= 
				"<a href='".base_url()."admin/interior/edit_interior/".$i['interior_id']."' ><button type='button' data-toggle='tooltip' data-placement='top' style='display:none;' title='Edit data' class='btn btn-info btn-sm item-edit'><i class='fa fa-pencil'></i><span> Edit Content</span></button></a>
				<a href='".base_url()."admin/interior/edit_interior/".$i['interior_id']."' ><button type='button' data-toggle='tooltip' data-placement='top' style='display:none;' title='Edit data' class='btn btn-primary btn-sm item-edit'><i class='fa fa-pencil'></i><span> Edit Foto</span></button></a>
                <button type='button' data='".$i['interior_id']."' foto='".$i['foto_interior_nama']."' data-toggle='tooltip' data-placement='top' title='Hapus data' class='btn btn-danger btn-sm item-hapus'><i class='fa fa-trash'></i><span> Hapus</span></button>";

				$data[] 	= $row;
			}
		}else
		{
			$data 		= array();
			$row 		= array();
			$row[] 		= '';
			$row[] 		= '';
			$row[] 		= '';
			$row[] 		= '';
			$row[] 		= '';
			$row[] 		= '';
			$row[] 		= '';
			$row[] 		= '';
			$row[] 		= '';
			$row[] 		= '';
			$row[] 		= '';
			$row[] 		= '';

			$data[] 	= $row;
		}
	return $output 		= array(
		'data'			=> $data
	);
	}

	function get_barang_by_id($id_barang)
	{
		$this->db->where('barang_id',$id_barang);
		$query 			= $this->db->get('tbl_barang');
		if($query->num_rows() >0)
		{
			foreach($query->result_array() as $i)
			{
				$data 			= array(
					'barang_id'			=> $i['barang_id'],
					'barang_nama'		=> $i['barang_nama'],
					'kategori_id'		=> $i['kategori_id'],
					'sub_kategori_id'	=> $i['sub_kategori_id'],
					'barang_harga_jual'	=> $i['barang_harga_jual'],
					'barang_deskripsi'	=> $i['barang_deskripsi']
				);
			}
		}else
		{
			$data 		= 'Data tidak ditemukan';
		}
		return $data;
	}

	function get_interior_front()
	{
		$query 			= $this->db->get('tbl_sub_1_kategori_interior');

		return $query;
	}

	function get_detail_interior_no_ajax($id_interior)
	{
		$this->db->select('*');
		$this->db->from('tbl_interior','tbl_kategori_interior');
		$this->db->join('tbl_kategori_interior','tbl_kategori_interior.kategori_interior_id=tbl_interior.kategori_interior_id','INNER');
		$this->db->join('tbl_sub_1_kategori_interior','tbl_sub_1_kategori_interior.sub_1_kategori_interior_id=tbl_kategori_interior.sub_1_kategori_interior_id','INNER');
		$this->db->join('tbl_sub_2_kategori_interior','tbl_sub_2_kategori_interior.sub_2_kategori_interior_id=tbl_kategori_interior.sub_2_kategori_interior_id','INNER');
		$this->db->join('tbl_foto_interior','tbl_foto_interior.foto_interior_id=tbl_interior.foto_interior_id','INNER');
		$this->db->where('tbl_interior.interior_id',$id_interior);
		$query 		= $this->db->get();

		return $query;
	}

	function get_foto_utama_barang_by_id($id_barang)
	{
		$this->db->select('tbl_barang.barang_id,tbl_barang.foto_barang_id,tbl_foto_barang.foto_barang_nama');
		$this->db->from('tbl_barang');
		$this->db->join('tbl_foto_barang','tbl_foto_barang.foto_barang_id=tbl_barang.foto_barang_id');
		$this->db->where('tbl_barang.barang_id',$id_barang);
		$query 		= $this->db->get();
		if($query->num_rows()>0)
		{
			$data 		= array();
			foreach($query->result_array() as $i)
			{
				$row 		= array();
				$row[]		= "<a href='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'><img width='200' height='200' class='img-fluid float-right' src='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'></a>";

				$data[]		= $row;
			}
		}else
		{
			$data 		= [' '];
		}

		return $data 		= array(
			'data'		=> $data
		);
	}

	function get_foto_utama_interior_by_id_no_ajax($id_interior)
	{
		$this->db->select('tbl_interior.interior_id,tbl_interior.foto_interior_id,tbl_foto_interior.foto_interior_id,tbl_foto_interior.foto_interior_nama');
		$this->db->from('tbl_interior');
		$this->db->join('tbl_foto_interior','tbl_foto_interior.foto_interior_id=tbl_interior.foto_interior_id');
		$this->db->where('tbl_interior.interior_id',$id_interior);
		$query 			= $this->db->get();

		$row 			= $query->row_array();
		$foto_id 		= $row['foto_interior_id'];
		
		return $foto_id;
	}

	function get_foto_interior_by_id_no_ajax($id_interior,$foto_utama)
	{
		$this->db->select('foto_interior_id,interior_id,foto_interior_nama');
		$this->db->from('tbl_foto_interior');
		$this->db->where('interior_id',$id_interior);
		$this->db->where('foto_interior_id !=',$foto_utama);
		$query 			= $this->db->get();
		
		return $query;
	}

	function get_foto_barang_by_id($id_barang,$foto_utama)
	{
		$this->db->select('foto_barang_id,barang_id,foto_barang_nama');
		$this->db->from('tbl_foto_barang');
		$this->db->where('barang_id',$id_barang);
		$this->db->where('foto_barang_id !=',$foto_utama);
		$query 			= $this->db->get();
		if($query->num_rows()>0)
		{
			$data 		= array();
			foreach($query->result_array() as $i)
			{
				$row 		= array();
				$row[]		= "<a href='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'><img width='200' height='200' class='img-fluid float-right' src='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'></a>";
				$row[]		= 
				"<button type='button' data='".$i['foto_barang_id']."' barang='".$i['barang_id']."' data-toggle='tooltip' data-placement='top' title='Jadikan Foto Utama' class='btn btn-info btn-sm item-utama'><i class='fa fa-pencil'></i><span> Jadikan Foto Utama</span></button>
				<button type='button' data='".$i['foto_barang_id']."' foto='".$i['foto_barang_nama']."' data-toggle='tooltip' data-placement='top' title='Hapus data' class='btn btn-danger btn-sm item-hapus'><i class='fa fa-trash'></i><span> Hapus</span></button>";

				$data[]		= $row;
			}
		}else
		{
			$this->db->select('foto_barang_id,barang_id,foto_barang_nama');
			$this->db->from('tbl_foto_barang');
			$this->db->where('barang_id',$id_barang);
			$query2 			= $this->db->get();

			$data 		= array();
			foreach($query2->result_array() as $i)
			{
				$row 		= array();
				$row[]		= "<a href='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'><img width='200' height='200' class='img-fluid float-right' src='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'></a>";
				$row[]		= 
				"";

				$data[]		= $row;
			}
		}

		return $data 		= array(
			'data'		=> $data
		);
	}

	function set_interior($interior)
	{
		$query 			= $this->db->insert('tbl_interior',$interior);
		return $query;
	}

	function set_foto_utama($id_barang,$foto)
	{
		$this->db->where('barang_id',$id_barang);
		$query 			= $this->db->update('tbl_barang',$foto);

		return $query;
	}

	function update_interior($id_interior,$interior)
	{
		$this->db->where('interior_id',$id_interior);
		$query 			= $this->db->update('tbl_interior',$interior);
		return $query;
	}

	function delete_interior($id_interior)
	{
		$this->db->where('interior_id',$id_interior);
		$query 			= $this->db->delete('tbl_interior');

		return $query;
	}

	// Mencari id baru berdasarkan id max
	function find_new_id_interior()
	{
		$query 			= $this->db->query('SELECT MAX(CAST(SUBSTRING(interior_id, 4, length(interior_id)-3) AS UNSIGNED)) as interior_id FROM tbl_interior');
		$row 			= $query->row_array();
		$output 		= 'ITR'.($row['interior_id']+1);

		return $output;
	}

	/* ==== Class Kategori ==== */
	function get_all_kategori_interior()
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori_interior');
		$this->db->join('tbl_sub_1_kategori_interior','tbl_sub_1_kategori_interior.sub_1_kategori_interior_id=tbl_kategori_interior.sub_1_kategori_interior_id');
		$this->db->join('tbl_sub_2_kategori_interior','tbl_sub_2_kategori_interior.sub_2_kategori_interior_id=tbl_kategori_interior.sub_2_kategori_interior_id');
		$this->db->order_by('tbl_sub_1_kategori_interior.sub_1_kategori_interior_nama');
		$this->db->order_by('tbl_sub_2_kategori_interior.sub_2_kategori_interior_nama');
		$this->db->order_by('tbl_kategori_interior.kategori_interior_nama');
		$query 		= $this->db->get();
		if($query->num_rows()>0)
		{
			$data 		= array();
			$no 		= 0;
			foreach($query->result_array() as $i)
			{
				$row 		= array();
				$no++;

				$row[]		= $no;
				$row[]		= $i['kategori_interior_id'];
				$row[]		= $i['sub_1_kategori_interior_nama'];
				$row[]		= $i['sub_2_kategori_interior_nama'];
				$row[]		= $i['kategori_interior_nama'];
				$row[]		= "<a href='".base_url()."assets/images/kategori_interior/".$i['kategori_interior_foto']."'><img width='100px' height='100px' class='img-square' src='".base_url()."assets/images/kategori_interior/".$i['kategori_interior_foto']."'></a>";
				$row[]		=
				"<button type='button' data='".$i['kategori_interior_id']."' data-toggle='tooltip' data-placement='top' title='Edit data' class='btn btn-info btn-sm item-edit'><i class='fa fa-pencil'></i><span> Edit</span></button>
                <button type='button' data='".$i['kategori_interior_id']."' foto='".$i['kategori_interior_foto']."' data-toggle='tooltip' data-placement='top' title='Hapus data' class='btn btn-danger btn-sm item-hapus'><i class='fa fa-trash'></i><span> Hapus</span></button>";

				$data[]		= $row;
			}
		}else
		{
			$data 		=array();
			$row 		= array();
			$row[] 		= '';
			$row[]		= '';
			$row[]		= '';
			$row[]		= '';
			$row[]		= '';
			$row[]		= '';
			$row[]		= '';

			$data[]		= $row;
		}
		return $output 		= array(
			'data'		=> $data
		);
	}

	function get_select_kategori_interior_ajax()
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori_interior');
		$this->db->join('tbl_sub_1_kategori_interior','tbl_sub_1_kategori_interior.sub_1_kategori_interior_id=tbl_kategori_interior.sub_1_kategori_interior_id');
		$this->db->join('tbl_sub_2_kategori_interior','tbl_sub_2_kategori_interior.sub_2_kategori_interior_id=tbl_kategori_interior.sub_2_kategori_interior_id');
		$this->db->order_by('tbl_sub_1_kategori_interior.sub_1_kategori_interior_nama');
		$this->db->order_by('tbl_sub_2_kategori_interior.sub_2_kategori_interior_nama');
		$this->db->order_by('tbl_kategori_interior.kategori_interior_nama');
		$query 		= $this->db->get();

		return $query->result();
	}

	function get_kategori_interior_by_id($id_kategori)
	{
		$this->db->where('kategori_interior_id',$id_kategori);
		$query 			= $this->db->get('tbl_kategori_interior');
		if($query->num_rows()>0)
		{
			foreach($query->result_array() as $i)
			{
				$data 		= array(
					'kategori_interior_id'			=> $i['kategori_interior_id'],
					'kategori_interior_nama'		=> $i['kategori_interior_nama'],
					'sub_1_kategori_interior_id'	=> $i['sub_1_kategori_interior_id'],
					'sub_2_kategori_interior_id'	=> $i['sub_2_kategori_interior_id'],
					'kategori_interior_foto'		=> $i['kategori_interior_foto']
				);
			}
			return $data;
		}
		
	}

	function set_kategori_interior($kategori)
	{
		$query 			= $this->db->insert('tbl_kategori_interior',$kategori);
		return $query;
	}

	function delete_kategori_interior($id_kategori)
	{
		$this->db->where('kategori_interior_id',$id_kategori);
		$query 			= $this->db->delete('tbl_kategori_interior');
		return $query;
	}

	function update_kategori_interior($id_kategori,$kategori)
	{
		$this->db->where('kategori_interior_id',$id_kategori);
		$query 			= $this->db->update('tbl_kategori_interior',$kategori);
		return $query;
	}

	// Mencari id baru berdasarkan id max
	function find_new_id_kategori_interior()
	{
		$query 			= $this->db->query('SELECT MAX(CAST(SUBSTRING(kategori_interior_id, 4, length(kategori_interior_id)-3) AS UNSIGNED)) as kategori_interior_id FROM tbl_kategori_interior');
		$row 			= $query->row_array();
		$output 		= 'KTI'.($row['kategori_interior_id']+1);

		return $output;
	}

	// Menambah jumlah input kategori
	function add_input_kategori_interior($kategori)
	{
		$this->db->set('kategori_interior_input','kategori_interior_input+1',FALSE);
		$this->db->where('kategori_interior_id',$kategori);
		$query 			= $this->db->update('tbl_kategori_interior');
		return $query;
	}

	function remove_input_kategori_interior($kategori_old)
	{
		$this->db->set('kategori_interior_input','kategori_interior_input-1',FALSE);
		$this->db->where('kategori_interior_id',$kategori_old);
		$this->db->where('kategori_interior_input >',0);
		$query 			= $this->db->update('tbl_kategori_interior');
		return $query;
	}

	/* ==== Class Sub 1 Kategori Interior ==== */
	function get_all_sub_1_kategori_interior()
	{
		$this->db->order_by('sub_1_kategori_interior_nama');
		$query 		= $this->db->get('tbl_sub_1_kategori_interior');
		if($query->num_rows()>0)
		{
			$data 		= array();
			$no 		= 0;
			foreach($query->result_array() as $i)
			{
				$row 		= array();
				$no++;

				$row[]		= $no;
				$row[]		= $i['sub_1_kategori_interior_id'];
				$row[]		= $i['sub_1_kategori_interior_nama'];
				$row[]		= "<a href='".base_url()."assets/images/sub_1_kategori_interior/".$i['sub_1_kategori_interior_foto']."'><img width='100px' height='100px' class='img-square' src='".base_url()."assets/images/sub_1_kategori_interior/".$i['sub_1_kategori_interior_foto']."'></a>";
				$row[]		=
				"<button type='button' data='".$i['sub_1_kategori_interior_id']."' foto='".$i['sub_1_kategori_interior_foto']."' data-toggle='tooltip' data-placement='top' title='Edit data' class='btn btn-info btn-sm item-edit'><i class='fa fa-pencil'></i><span> Edit</span></button>
                <button type='button' data='".$i['sub_1_kategori_interior_id']."' foto='".$i['sub_1_kategori_interior_foto']."' data-toggle='tooltip' data-placement='top' title='Hapus data' class='btn btn-danger btn-sm item-hapus'><i class='fa fa-trash'></i><span> Hapus</span></button>";

				$data[]		= $row;
			}
		}else
		{
			$data 		=array();
			$row 		= array();
			$row[] 		= '';
			$row[]		= '';
			$row[]		= '';
			$row[]		= '';
			$row[]		= '';

			$data[]		= $row;
		}
		return $output 		= array(
			'data'		=> $data
		);
	}

	function get_select_sub_1_kategori_ajax()
	{
		$this->db->order_by('sub_1_kategori_interior_nama','ASC');
		$query 		= $this->db->get('tbl_sub_1_kategori_interior');
		return $query->result();
	}

	function get_sub_1_kategori_interior_by_id($id_sub_1_kategori)
	{
		$this->db->where('sub_1_kategori_interior_id',$id_sub_1_kategori);
		$query 			= $this->db->get('tbl_sub_1_kategori_interior');
		if($query->num_rows()>0)
		{
			foreach($query->result_array() as $i)
			{
				$data 		= array(
					'sub_1_kategori_interior_id'		=> $i['sub_1_kategori_interior_id'],
					'sub_1_kategori_interior_nama'		=> $i['sub_1_kategori_interior_nama'],
					'sub_1_kategori_interior_foto'		=> $i['sub_1_kategori_interior_foto']
				);
			}
			return $data;
		}
		
	}

	function set_sub_1_kategori_interior($sub_1_kategori)
	{
		$query 			= $this->db->insert('tbl_sub_1_kategori_interior',$sub_1_kategori);
		return $query;
	}

	function delete_sub_1_kategori_interior($id_sub_1_kategori)
	{
		$this->db->where('sub_1_kategori_interior_id',$id_sub_1_kategori);
		$query 			= $this->db->delete('tbl_sub_1_kategori_interior');
		return $query;
	}

	function update_sub_1_kategori_interior($id_sub_1_kategori,$sub_1_kategori)
	{
		$this->db->where('sub_1_kategori_interior_id',$id_sub_1_kategori);
		$query 			= $this->db->update('tbl_sub_1_kategori_interior',$sub_1_kategori);
		return $query;
	}

	// Mencari id baru berdasarkan id max
	function find_new_id_sub_1_kategori_interior()
	{
		$query 			= $this->db->query('SELECT MAX(CAST(SUBSTRING(sub_1_kategori_interior_id, 4, length(sub_1_kategori_interior_id)-3) AS UNSIGNED)) as sub_1_kategori_interior_id FROM tbl_sub_1_kategori_interior');
		$row 			= $query->row_array();
		$output 		= 'SKS'.($row['sub_1_kategori_interior_id']+1);

		return $output;
	}

	// Menambah jumlah input subkategori
	function add_input_sub_1_kategori($sub_1_kategori)
	{
		$this->db->set('sub_1_kategori_interior_input','sub_1_kategori_interior_input+1',FALSE);
		$this->db->where('sub_1_kategori_interior_id',$sub_1_kategori);
		$query 			= $this->db->update('tbl_sub_1_kategori_interior');
		return $query;
	}

	function remove_input_sub_1_kategori($sub_1_kategori_old)
	{
		$this->db->set('sub_1_kategori_interior_input','sub_1_kategori_interior_input-1',FALSE);
		$this->db->where('sub_1_kategori_interior_id',$sub_1_kategori_old);
		$this->db->where('sub_1_kategori_interior_input >',0);
		$query 			= $this->db->update('tbl_sub_1_kategori_interior');
		return $query;
	}

	/* ==== Class Sub 2 Kategori Interior ==== */
	function get_all_sub_2_kategori_interior()
	{
		$this->db->order_by('sub_2_kategori_interior_nama');
		$query 		= $this->db->get('tbl_sub_2_kategori_interior');
		if($query->num_rows()>0)
		{
			$data 		= array();
			$no 		= 0;
			foreach($query->result_array() as $i)
			{
				$row 		= array();
				$no++;

				$row[]		= $no;
				$row[]		= $i['sub_2_kategori_interior_id'];
				$row[]		= $i['sub_2_kategori_interior_nama'];
				$row[]		= "<a href='".base_url()."assets/images/sub_2_kategori_interior/".$i['sub_2_kategori_interior_foto']."'><img width='100px' height='100px' class='img-square' src='".base_url()."assets/images/sub_2_kategori_interior/".$i['sub_2_kategori_interior_foto']."'></a>";
				$row[]		=
				"<button type='button' data='".$i['sub_2_kategori_interior_id']."' foto='".$i['sub_2_kategori_interior_foto']."' data-toggle='tooltip' data-placement='top' title='Edit data' class='btn btn-info btn-sm item-edit'><i class='fa fa-pencil'></i><span> Edit</span></button>
                <button type='button' data='".$i['sub_2_kategori_interior_id']."' foto='".$i['sub_2_kategori_interior_foto']."' data-toggle='tooltip' data-placement='top' title='Hapus data' class='btn btn-danger btn-sm item-hapus'><i class='fa fa-trash'></i><span> Hapus</span></button>";

				$data[]		= $row;
			}
		}else
		{
			$data 		=array();
			$row 		= array();
			$row[] 		= '';
			$row[]		= '';
			$row[]		= '';
			$row[]		= '';
			$row[]		= '';

			$data[]		= $row;
		}
		return $output 		= array(
			'data'		=> $data
		);
	}

	function get_select_sub_2_kategori_ajax()
	{
		$this->db->order_by('sub_2_kategori_interior_nama','ASC');
		$query 		= $this->db->get('tbl_sub_2_kategori_interior');
		return $query->result();
	}

	function get_sub_2_kategori_interior_by_id($id_sub_2_kategori)
	{
		$this->db->where('sub_2_kategori_interior_id',$id_sub_2_kategori);
		$query 			= $this->db->get('tbl_sub_2_kategori_interior');
		if($query->num_rows()>0)
		{
			foreach($query->result_array() as $i)
			{
				$data 		= array(
					'sub_2_kategori_interior_id'		=> $i['sub_2_kategori_interior_id'],
					'sub_2_kategori_interior_nama'		=> $i['sub_2_kategori_interior_nama'],
					'sub_2_kategori_interior_foto'		=> $i['sub_2_kategori_interior_foto']
				);
			}
			return $data;
		}
		
	}

	function set_sub_2_kategori_interior($sub_2_kategori)
	{
		$query 			= $this->db->insert('tbl_sub_2_kategori_interior',$sub_2_kategori);
		return $query;
	}

	function delete_sub_2_kategori_interior($id_sub_2_kategori)
	{
		$this->db->where('sub_2_kategori_interior_id',$id_sub_2_kategori);
		$query 			= $this->db->delete('tbl_sub_2_kategori_interior');
		return $query;
	}

	function update_sub_2_kategori_interior($id_sub_2_kategori,$sub_2_kategori)
	{
		$this->db->where('sub_2_kategori_interior_id',$id_sub_2_kategori);
		$query 			= $this->db->update('tbl_sub_2_kategori_interior',$sub_2_kategori);
		return $query;
	}

	// Mencari id baru berdasarkan id max
	function find_new_id_sub_2_kategori_interior()
	{
		$query 			= $this->db->query('SELECT MAX(CAST(SUBSTRING(sub_2_kategori_interior_id, 4, length(sub_2_kategori_interior_id)-3) AS UNSIGNED)) as sub_2_kategori_interior_id FROM tbl_sub_2_kategori_interior');
		$row 			= $query->row_array();
		$output 		= 'SKD'.($row['sub_2_kategori_interior_id']+1);

		return $output;
	}

	// Menambah jumlah input subkategori
	function add_input_sub_2_kategori($sub_2_kategori)
	{
		$this->db->set('sub_2_kategori_interior_input','sub_2_kategori_interior_input+1',FALSE);
		$this->db->where('sub_2_kategori_interior_id',$sub_2_kategori);
		$query 			= $this->db->update('tbl_sub_2_kategori_interior');
		return $query;
	}

	function remove_input_sub_2_kategori($sub_2_kategori_old)
	{
		$this->db->set('sub_2_kategori_interior_input','sub_2_kategori_interior_input-1',FALSE);
		$this->db->where('sub_2_kategori_interior_id',$sub_2_kategori_old);
		$this->db->where('sub_2_kategori_interior_input >',0);
		$query 			= $this->db->update('tbl_sub_2_kategori_interior');
		return $query;
	}

	/* ==== Class Foto Barang ==== */
	// Mencari id foto utama barang saat pertama kali disimpan
	function find_id_foto_utama_interior($id_interior)
	{
		$this->db->where('interior_id',$id_interior);
		$query 			= $this->db->get('tbl_foto_interior');
		$row 			= $query->row_array();
		$output 		= $row['foto_interior_id'];

		return $output;
	}

	function get_all_foto_interior_by_id_no_ajax($id_interior)
	{
		$this->db->where('interior_id',$id_interior);
		$query 			= $this->db->get('tbl_foto_interior');
		return $query;
	}

	function delete_foto_interior_by_id($id_foto_interior)
	{
		$this->db->where('foto_interior_id',$id_foto_interior);
		$query 			= $this->db->delete('tbl_foto_interior');
		return $query;
	}

	/* ==== FRONTEND AREA ==== */
	function get_sub1_by_id($id_sub1)
	{
		$this->db->where('sub_1_kategori_interior_id',$id_sub1);
		$query 			= $this->db->get('tbl_sub_1_kategori_interior');

		return $query;
	}

	function get_kategori_interior_by_id_sub1($id_sub1)
	{
		$this->db->select('tbl_sub_2_kategori_interior.sub_2_kategori_interior_id,tbl_sub_2_kategori_interior.sub_2_kategori_interior_nama,tbl_sub_2_kategori_interior.sub_2_kategori_interior_foto');
		$this->db->from('tbl_kategori_interior');
		$this->db->join('tbl_sub_2_kategori_interior','tbl_sub_2_kategori_interior.sub_2_kategori_interior_id=tbl_kategori_interior.sub_2_kategori_interior_id','INNER');
		$this->db->where('sub_1_kategori_interior_id',$id_sub1);
		$this->db->order_by('tbl_sub_2_kategori_interior.sub_2_kategori_interior_nama','ASC');
		$this->db->group_by('tbl_kategori_interior.sub_2_kategori_interior_id');
		$query 		= $this->db->get();

		return $query;
	}

	function get_jenis_interior_front($id_sub1,$id_sub2)
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori_interior');
		$this->db->join('tbl_sub_1_kategori_interior','tbl_sub_1_kategori_interior.sub_1_kategori_interior_id=tbl_kategori_interior.sub_1_kategori_interior_id');
		$this->db->join('tbl_sub_2_kategori_interior','tbl_sub_2_kategori_interior.sub_2_kategori_interior_id=tbl_kategori_interior.sub_2_kategori_interior_id');
		$this->db->where('tbl_sub_1_kategori_interior.sub_1_kategori_interior_id',$id_sub1);
		$this->db->where('tbl_sub_2_kategori_interior.sub_2_kategori_interior_id',$id_sub2);
		$this->db->order_by('tbl_kategori_interior.kategori_interior_nama','ASC');
		$query 			= $this->db->get();

		return $query;
	}

	function get_list_interior_by_id_kat($id_kategori,$limit,$start)
	{
		$this->db->select('*');
		$this->db->from('tbl_interior','tbl_kategori_interior');
		$this->db->join('tbl_kategori_interior','tbl_interior.kategori_interior_id=tbl_kategori_interior.kategori_interior_id','INNER');
		$this->db->join('tbl_sub_1_kategori_interior','tbl_sub_1_kategori_interior.sub_1_kategori_interior_id=tbl_kategori_interior.sub_1_kategori_interior_id','INNER');
		$this->db->join('tbl_sub_2_kategori_interior','tbl_sub_2_kategori_interior.sub_2_kategori_interior_id=tbl_kategori_interior.sub_2_kategori_interior_id','INNER');
		$this->db->join('tbl_foto_interior','tbl_foto_interior.foto_interior_id=tbl_interior.foto_interior_id','INNER');
		$this->db->where('tbl_interior.kategori_interior_id',$id_kategori);
		$this->db->order_by('tbl_interior.created_at','DESC');
		$this->db->limit($limit, $start);
		$query 			= $this->db->get();

		return $query;

	}

	function get_interior_by_kategori_front_ASC($id_kategori,$limit,$start)
	{
		$this->db->select('*');
		$this->db->from('tbl_interior','tbl_kategori_interior');
		$this->db->join('tbl_kategori_interior','tbl_interior.kategori_interior_id=tbl_kategori_interior.kategori_interior_id','INNER');
		$this->db->join('tbl_sub_1_kategori_interior','tbl_sub_1_kategori_interior.sub_1_kategori_interior_id=tbl_kategori_interior.sub_1_kategori_interior_id','INNER');
		$this->db->join('tbl_sub_2_kategori_interior','tbl_sub_2_kategori_interior.sub_2_kategori_interior_id=tbl_kategori_interior.sub_2_kategori_interior_id','INNER');
		$this->db->join('tbl_foto_interior','tbl_foto_interior.foto_interior_id=tbl_interior.foto_interior_id','INNER');
		$this->db->where('tbl_interior.kategori_interior_id',$id_kategori);
		$this->db->order_by('tbl_interior.interior_harga_jual','ASC');
		$this->db->limit($limit, $start);
		$query 			= $this->db->get();

		return $query;

	}

	function get_interior_by_kategori_front_DESC($id_kategori,$limit,$start)
	{
		$this->db->select('*');
		$this->db->from('tbl_interior','tbl_kategori_interior');
		$this->db->join('tbl_kategori_interior','tbl_interior.kategori_interior_id=tbl_kategori_interior.kategori_interior_id','INNER');
		$this->db->join('tbl_sub_1_kategori_interior','tbl_sub_1_kategori_interior.sub_1_kategori_interior_id=tbl_kategori_interior.sub_1_kategori_interior_id','INNER');
		$this->db->join('tbl_sub_2_kategori_interior','tbl_sub_2_kategori_interior.sub_2_kategori_interior_id=tbl_kategori_interior.sub_2_kategori_interior_id','INNER');
		$this->db->join('tbl_foto_interior','tbl_foto_interior.foto_interior_id=tbl_interior.foto_interior_id','INNER');
		$this->db->where('tbl_interior.kategori_interior_id',$id_kategori);
		$this->db->order_by('tbl_interior.interior_harga_jual','DESC');
		$this->db->limit($limit, $start);
		$query 			= $this->db->get();

		return $query;

	}


	/* ==== UTILITIES ==== */

	function count_interior_by_id_kategori($id_kategori)
	{
		$this->db->where('kategori_interior_id',$id_kategori);
		return $this->db->count_all_results('tbl_interior');
	}
}
?>