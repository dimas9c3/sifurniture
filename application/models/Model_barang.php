<?php 
class Model_barang extends Ci_Model
{
	function get_all_barang_admin()
	{
		$this->db->select('tbl_barang.barang_id,tbl_barang.barang_nama,tbl_barang.barang_harga_jual,tbl_barang.barang_diskon,tbl_barang.foto_barang_id,tbl_kategori_barang.kategori_id,tbl_kategori_barang.kategori_nama,tbl_sub_kategori_barang.sub_kategori_id,tbl_sub_kategori_barang.sub_kategori_nama,tbl_foto_barang.foto_barang_nama');
		$this->db->from('tbl_barang','tbl_sub_kategori_barang');
		$this->db->join('tbl_sub_kategori_barang','tbl_sub_kategori_barang.sub_kategori_id=tbl_barang.sub_kategori_id','INNER');
		$this->db->join('tbl_kategori_barang','tbl_kategori_barang.kategori_id=tbl_sub_kategori_barang.kategori_id','INNER');
		$this->db->join('tbl_foto_barang','tbl_foto_barang.foto_barang_id=tbl_barang.foto_barang_id','INNER');
		$this->db->order_by('kategori_nama');
		$this->db->order_by('sub_kategori_nama');
		$this->db->order_by('barang_nama');
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
				$row[]		= "<a href='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'><img width='100px' height='100px' class='img-square' src='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'></a>";
				$row[]		= $i['barang_id'];
				$row[]		= $i['kategori_nama'].' | '.$i['sub_kategori_nama'];
				$row[]		= $i['barang_nama'];
				$row[]		= "Rp. ".number_format($i['barang_harga_jual']);
				$row[] 		= $i['barang_diskon']." %";
				$row[]		= "Rp. ".number_format($i['barang_harga_jual']-($i['barang_harga_jual']*($i['barang_diskon']/100)));
				$row[]		= 
				"<a href='".base_url()."admin/barang/edit_barang/".$i['barang_id']."' ><button type='button' data-toggle='tooltip' data-placement='top' title='Edit data' class='btn btn-info btn-sm item-edit'><i class='fa fa-pencil'></i><span> Edit Content</span></button></a>
				<a href='".base_url()."admin/barang/edit_foto/".$i['barang_id']."' ><button type='button' data-toggle='tooltip' data-placement='top' title='Edit data' class='btn btn-primary btn-sm item-edit'><i class='fa fa-pencil'></i><span> Edit Foto</span></button></a>
                <button type='button' data='".$i['barang_id']."' kategori='".$i['kategori_id']."' subkategori='".$i['sub_kategori_id']."' data-toggle='tooltip' data-placement='top' title='Hapus data' class='btn btn-danger btn-sm item-hapus'><i class='fa fa-trash'></i><span> Hapus</span></button>";

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

			$data[] 	= $row;
		}
	return $output 		= array(
		'data'			=> $data
	);
	}

	function get_detail_barang_no_ajax($id_barang)
	{
		$this->db->select('*');
		$this->db->from('tbl_barang','tbl_sub_kategori_barang');
		$this->db->join('tbl_sub_kategori_barang','tbl_sub_kategori_barang.sub_kategori_id=tbl_barang.sub_kategori_id','INNER');
		$this->db->join('tbl_kategori_barang','tbl_kategori_barang.kategori_id=tbl_sub_kategori_barang.kategori_id','INNER');
		$this->db->join('tbl_foto_barang','tbl_foto_barang.foto_barang_id=tbl_barang.foto_barang_id','INNER');
		$this->db->where('tbl_barang.barang_id',$id_barang);
		$query 		= $this->db->get();

		return $query;
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
					'sub_kategori_id'	=> $i['sub_kategori_id'],
					'barang_harga_jual'	=> $i['barang_harga_jual'],
					'barang_deskripsi'	=> $i['barang_deskripsi'],
					'barang_dimensi'	=> $i['barang_dimensi']
				);
			}
		}else
		{
			$data 		= 'Data tidak ditemukan';
		}
		return $data;
	}

	function get_barang_populer_front()
	{
		$this->db->select('tbl_barang.barang_id,tbl_barang.barang_nama,tbl_barang.barang_harga_jual,tbl_barang.foto_barang_id,tbl_foto_barang.foto_barang_nama');
		$this->db->from('tbl_barang');
		$this->db->join('tbl_foto_barang','tbl_foto_barang.foto_barang_id=tbl_barang.foto_barang_id','INNER');
		$this->db->order_by('barang_nama');
		$query 		= $this->db->get();
		return $query;
	}

	function get_barang_by_subkategori_front($id_subkategori,$limit,$start)
	{
		$this->db->select('*');
		$this->db->from('tbl_barang','tbl_sub_kategori_barang');
		$this->db->join('tbl_sub_kategori_barang','tbl_sub_kategori_barang.sub_kategori_id=tbl_barang.sub_kategori_id','INNER');
		$this->db->join('tbl_kategori_barang','tbl_kategori_barang.kategori_id=tbl_sub_kategori_barang.kategori_id','INNER');
		$this->db->join('tbl_foto_barang','tbl_foto_barang.foto_barang_id=tbl_barang.foto_barang_id','INNER');
		$this->db->where('tbl_barang.sub_kategori_id',$id_subkategori);
		$this->db->order_by('tbl_barang.created_at','DESC');
		$this->db->limit($limit, $start);
		$query 		= $this->db->get();

		return $query;
	}

	function get_barang_by_subkategori_front_DESC($id_subkategori,$limit,$start)
	{
		$this->db->select('*');
		$this->db->from('tbl_barang','tbl_sub_kategori_barang');
		$this->db->join('tbl_sub_kategori_barang','tbl_sub_kategori_barang.sub_kategori_id=tbl_barang.sub_kategori_id','INNER');
		$this->db->join('tbl_kategori_barang','tbl_kategori_barang.kategori_id=tbl_sub_kategori_barang.kategori_id','INNER');
		$this->db->join('tbl_foto_barang','tbl_foto_barang.foto_barang_id=tbl_barang.foto_barang_id','INNER');
		$this->db->where('tbl_barang.sub_kategori_id',$id_subkategori);
		$this->db->order_by('tbl_barang.barang_harga_jual','DESC');
		$this->db->order_by('tbl_barang.created_at','DESC');
		$this->db->limit($limit, $start);
		$query 		= $this->db->get();

		return $query;
	}

	function get_barang_by_subkategori_front_ASC($id_subkategori,$limit,$start)
	{
		$this->db->select('*');
		$this->db->from('tbl_barang','tbl_sub_kategori_barang');
		$this->db->join('tbl_sub_kategori_barang','tbl_sub_kategori_barang.sub_kategori_id=tbl_barang.sub_kategori_id','INNER');
		$this->db->join('tbl_kategori_barang','tbl_kategori_barang.kategori_id=tbl_sub_kategori_barang.kategori_id','INNER');
		$this->db->join('tbl_foto_barang','tbl_foto_barang.foto_barang_id=tbl_barang.foto_barang_id','INNER');
		$this->db->where('tbl_barang.sub_kategori_id',$id_subkategori);
		$this->db->order_by('tbl_barang.barang_harga_jual','ASC');
		$this->db->order_by('tbl_barang.created_at','DESC');
		$this->db->limit($limit, $start);
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

	function get_foto_utama_barang_by_id_no_ajax($id_barang)
	{
		$this->db->select('tbl_barang.barang_id,tbl_barang.foto_barang_id,tbl_foto_barang.foto_barang_id,tbl_foto_barang.foto_barang_nama');
		$this->db->from('tbl_barang');
		$this->db->join('tbl_foto_barang','tbl_foto_barang.foto_barang_id=tbl_barang.foto_barang_id');
		$this->db->where('tbl_barang.barang_id',$id_barang);
		$query 			= $this->db->get();

		$row 			= $query->row_array();
		$foto_id 		= $row['foto_barang_id'];
		
		return $foto_id;
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

	function get_foto_barang_by_id_no_ajax($id_barang,$foto_utama)
	{
		$this->db->select('foto_barang_id,barang_id,foto_barang_nama');
		$this->db->from('tbl_foto_barang');
		$this->db->where('barang_id',$id_barang);
		$this->db->where('foto_barang_id !=',$foto_utama);
		$query 			= $this->db->get();
		
		return $query;
	}

	function set_barang($barang)
	{
		$query 			= $this->db->insert('tbl_barang',$barang);
		return $query;
	}

	function set_foto_utama($id_barang,$foto)
	{
		$this->db->where('barang_id',$id_barang);
		$query 			= $this->db->update('tbl_barang',$foto);

		return $query;
	}

	function update_barang($id_barang,$barang)
	{
		$this->db->where('barang_id',$id_barang);
		$query 			= $this->db->update('tbl_barang',$barang);
		return $query;
	}

	function delete_barang($id_barang)
	{
		$this->db->where('barang_id',$id_barang);
		$query 			= $this->db->delete('tbl_barang');

		return $query;
	}

	// Mencari id baru berdasarkan id max
	function find_new_id_barang()
	{
		$query 			= $this->db->query('SELECT MAX(CAST(SUBSTRING(barang_id, 4, length(barang_id)-3) AS UNSIGNED)) as barang_id FROM tbl_barang');
		$row 			= $query->row_array();
		$output 		= 'BRG'.($row['barang_id']+1);

		return $output;
	}

	/* ==== Class Kategori ==== */
	function get_all_kategori()
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori_barang');
		$this->db->order_by('kategori_nama');
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
				$row[]		= $i['kategori_nama'];
				$row[]		=
				"<button type='button' data='".$i['kategori_id']."' data-toggle='tooltip' data-placement='top' title='Edit data' class='btn btn-info btn-sm item-edit'><i class='fa fa-pencil'></i><span> Edit</span></button>
                <button type='button' data='".$i['kategori_id']."' data-toggle='tooltip' data-placement='top' title='Hapus data' class='btn btn-danger btn-sm item-hapus'><i class='fa fa-trash'></i><span> Hapus</span></button>";

				$data[]		= $row;
			}
		}else
		{
			$data 		=array();
			$row 		= array();
			$row[] 		= '';
			$row[]		= '';
			$row[]		= '';

			$data[]		= $row;
		}
		return $output 		= array(
			'data'		=> $data
		);
	}

	function get_kategori_navbar()
	{
		$this->db->order_by('kategori_nama','ASC');
		$query 			= $this->db->get('tbl_kategori_barang');
		return $query;
	}

	function get_select_kategori_ajax()
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori_barang');
		$this->db->order_by('kategori_nama','ASC');
		$query 		= $this->db->get();
		return $query->result();
	}

	function get_kategori_by_id($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori_barang');
		$this->db->where('kategori_id',$id_kategori);
		$query 			= $this->db->get();
		if($query->num_rows()>0)
		{
			foreach($query->result_array() as $i)
			{
				$data 		= array(
					'kategori_id'		=> $i['kategori_id'],
					'kategori_nama'		=> $i['kategori_nama']
				);
			}
			return $data;
		}
		
	}

	function set_kategori($kategori)
	{
		$query 			= $this->db->insert('tbl_kategori_barang',$kategori);
		return $query;
	}

	function delete_kategori($id_kategori)
	{
		$this->db->where('kategori_id',$id_kategori);
		$query 			= $this->db->delete('tbl_kategori_barang');
		return $query;
	}

	function update_kategori($id_kategori,$kategori)
	{
		$this->db->where('kategori_id',$id_kategori);
		$query 			= $this->db->update('tbl_kategori_barang',$kategori);
		return $query;
	}

	// Mencari id baru berdasarkan id max
	function find_new_id_kategori()
	{
		$query 			= $this->db->query('SELECT MAX(CAST(SUBSTRING(kategori_id, 4, length(kategori_id)-3) AS UNSIGNED)) as kategori_id FROM tbl_kategori_barang');
		$row 			= $query->row_array();
		$output 		= 'KTG'.($row['kategori_id']+1);

		return $output;
	}

	// Menambah jumlah input kategori
	function add_input_kategori($kategori)
	{
		$this->db->set('kategori_input','kategori_input+1',FALSE);
		$this->db->where('kategori_id',$kategori);
		$query 			= $this->db->update('tbl_kategori_barang');
		return $query;
	}

	function remove_input_kategori($kategori_old)
	{
		$this->db->set('kategori_input','kategori_input-1',FALSE);
		$this->db->where('kategori_id',$kategori_old);
		$this->db->where('kategori_input >',0);
		$query 			= $this->db->update('tbl_kategori_barang');
		return $query;
	}

	/* ==== Class Sub Kategori ==== */
	function get_all_sub_kategori()
	{
		$this->db->select('*');
		$this->db->from('tbl_sub_kategori_barang');
		$this->db->join('tbl_kategori_barang','tbl_kategori_barang.kategori_id=tbl_sub_kategori_barang.kategori_id');
		$this->db->order_by('tbl_kategori_barang.kategori_nama');
		$this->db->order_by('tbl_sub_kategori_barang.sub_kategori_nama');
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
				$row[] 		= $i['kategori_nama'];
				$row[]		= $i['sub_kategori_nama'];
				$row[]		=
				"<button type='button' data='".$i['sub_kategori_id']."' data-toggle='tooltip' data-placement='top' title='Edit data' class='btn btn-info btn-sm item-edit'><i class='fa fa-pencil'></i><span> Edit</span></button>
                <button type='button' data='".$i['sub_kategori_id']."' data-toggle='tooltip' data-placement='top' title='Hapus data' class='btn btn-danger btn-sm item-hapus'><i class='fa fa-trash'></i><span> Hapus</span></button>";

				$data[]		= $row;
			}
		}else
		{
			$data 		=array();
			$row 		= array();
			$row[]		= '';
			$row[] 		= '';
			$row[]		= '';
			$row[]		= '';

			$data[]		= $row;
		}
		return $output 		= array(
			'data'		=> $data
		);
	}

	function get_subkategori_navbar($id_kategori)
	{
		$this->db->where('kategori_id',$id_kategori);
		$this->db->order_by('sub_kategori_nama','ASC');
		$query 			= $this->db->get('tbl_sub_kategori_barang');
		return $query;
	}

	function get_select_subkategori_ajax()
	{
		$this->db->select('*');
		$this->db->from('tbl_sub_kategori_barang');
		$this->db->join('tbl_kategori_barang','tbl_kategori_barang.kategori_id=tbl_sub_kategori_barang.kategori_id');
		$this->db->order_by('sub_kategori_nama','ASC');
		$query 		= $this->db->get();
		return $query->result();
	}

	function get_sub_kategori_by_id($id_sub_kategori)
	{
		$this->db->select('*');
		$this->db->from('tbl_sub_kategori_barang');
		$this->db->join('tbl_kategori_barang','tbl_kategori_barang.kategori_id=tbl_sub_kategori_barang.kategori_id');
		$this->db->where('sub_kategori_id',$id_sub_kategori);
		$query 			= $this->db->get();
		if($query->num_rows()>0)
		{
			foreach($query->result_array() as $i)
			{
				$data 		= array(
					'sub_kategori_id'		=> $i['sub_kategori_id'],
					'kategori_id'			=> $i['kategori_id'],
					'sub_kategori_nama'		=> $i['sub_kategori_nama']
				);
			}
			return $data;
		}
		
	}

	function set_sub_kategori($sub_kategori)
	{
		$query 			= $this->db->insert('tbl_sub_kategori_barang',$sub_kategori);
		return $query;
	}

	function delete_sub_kategori($id_sub_kategori)
	{
		$this->db->where('sub_kategori_id',$id_sub_kategori);
		$query 			= $this->db->delete('tbl_sub_kategori_barang');
		return $query;
	}

	function update_sub_kategori($id_sub_kategori,$sub_kategori)
	{
		$this->db->where('sub_kategori_id',$id_sub_kategori);
		$query 			= $this->db->update('tbl_sub_kategori_barang',$sub_kategori);
		return $query;
	}

	// Mencari id baru berdasarkan id max
	function find_new_id_sub_kategori()
	{
		$query 			= $this->db->query('SELECT MAX(CAST(SUBSTRING(sub_kategori_id, 4, length(sub_kategori_id)-3) AS UNSIGNED)) as sub_kategori_id FROM tbl_sub_kategori_barang');
		$row 			= $query->row_array();
		$output 		= 'SKT'.($row['sub_kategori_id']+1);

		return $output;
	}

	// Menambah jumlah input subkategori
	function add_input_subkategori($subkategori)
	{
		$this->db->set('sub_kategori_input','sub_kategori_input+1',FALSE);
		$this->db->where('sub_kategori_id',$subkategori);
		$query 			= $this->db->update('tbl_sub_kategori_barang');
		return $query;
	}

	function remove_input_subkategori($subkategori_old)
	{
		$this->db->set('sub_kategori_input','sub_kategori_input-1',FALSE);
		$this->db->where('sub_kategori_id',$subkategori_old);
		$this->db->where('sub_kategori_input >',0);
		$query 			= $this->db->update('tbl_sub_kategori_barang');
		return $query;
	}

	/* ==== Class Foto Barang ==== */
	// Mencari id foto utama barang saat pertama kali disimpan
	function find_id_foto_utama_barang($id_barang)
	{
		$this->db->where('barang_id',$id_barang);
		$query 			= $this->db->get('tbl_foto_barang');
		$row 			= $query->row_array();
		$output 		= $row['foto_barang_id'];

		return $output;
	}

	function get_all_foto_barang_by_id_no_ajax($id_barang)
	{
		$this->db->where('barang_id',$id_barang);
		$query 			= $this->db->get('tbl_foto_barang');
		return $query;
	}

	function delete_foto_barang_by_id($id_foto_barang)
	{
		$this->db->where('foto_barang_id',$id_foto_barang);
		$query 			= $this->db->delete('tbl_foto_barang');
		return $query;
	}

	/* ==== UTILITIES ==== */

	function count_barang_by_subkategori($id_subkategori)
	{
		$this->db->where('sub_kategori_id',$id_subkategori);
		$query 			= $this->db->count_all_results('tbl_barang');

		return $query;
	}

	function get_warna_all()
	{
		$query 			= $this->db->get('tbl_warna');

		return $query;
	}

	function get_warna_by_id_brg($id_barang)
	{
		$this->db->join('tbl_warna','tbl_warna.warna_id=tbl_warna_barang.warna_id');
		$this->db->where('barang_id',$id_barang);
		$query 			= $this->db->get('tbl_warna_barang');

		return $query;
	}

	function get_favorit_by_cus($id_customer)
	{
		$this->db->select('*');
		$this->db->from('tbl_favorit');
		$this->db->join('tbl_barang','tbl_barang.barang_id=tbl_favorit.barang_id','INNER');
		$this->db->join('tbl_foto_barang','tbl_foto_barang.foto_barang_id=tbl_barang.foto_barang_id','INNER');
		$this->db->where('customer_id',$id_customer);
		$query 			= $this->db->get();

		if ($query->num_rows() >0) 
		{
			$data 			= array();
			$no 			= 0;

			foreach($query->result_array() as $i)
			{
				$row 		= array();
				$no++;

				$row[]		= $no;
				$row[]		= "<a href='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'><img width='100px' height='100px' class='img-square' src='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'>".$i['barang_nama']."</a>";
				$row[]		= '';

				$data[]		= $row;
			}
		}else
		{
			$data 			= array();
			$row 			= array();

			$row[]			= '';
			$row[]			= '';
			$row[]			= '';

			$data[] 		= $row;
		}

		return $data 		= array(
			'data'			=> $data
		);
	}

	function tambah_favorit($favorit)
	{
		$query 			= $this->db->insert('tbl_favorit',$favorit);

		return $query;
	}

	function cek_favorit($id_barang,$id_customer)
	{
		$this->db->where('barang_id',$id_barang);
		$this->db->where('customer_id',$id_customer);
		$query 			= $this->db->get('tbl_favorit');

		if ($query->num_rows>0) {
			$data 		= '1';
		}else
		{
			$data 		= '0';
		}

		return $data;
	}

	/* ==== FRONTEND AREA ==== */

	function get_barang_simmilar($id_barang)
	{
		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->join('tbl_foto_barang','tbl_foto_barang.foto_barang_id=tbl_barang.foto_barang_id');
		$this->db->where('tbl_barang.barang_id !=',$id_barang);
		$this->db->order_by('tbl_barang.created_at','DESC');
		$this->db->limit('3');
		$query 			= $this->db->get();

		return $query;
	}

	function get_barang_simmilar_cart()
	{
		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->join('tbl_foto_barang','tbl_foto_barang.foto_barang_id=tbl_barang.foto_barang_id');
		$this->db->order_by('tbl_barang.created_at','DESC');
		$this->db->limit('3');
		$query 			= $this->db->get();

		return $query;
	}

	function tambah_barang_dilihat($dilihat)
	{
		$query 			= $this->db->insert('tbl_barang_dilihat',$dilihat);

		return $query;
	}
}
?>