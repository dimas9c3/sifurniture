<?php 
class Model_artikel extends Ci_Model
{
	/* ==== ADMIN AREA ==== */
	function get_all_artikel()
	{
		$this->db->select('*');
		$this->db->from('tbl_artikel');
		$this->db->order_by('tbl_artikel.created_at','DESC');
		$query 			 = $this->db->get();

		if($query->num_rows() >0)
		{
			$data 			= array();
			$no 			= 0;
			foreach($query->result_array() as $i)
			{
				$no++;
				$row 		= array();
				$row[]		= $no;
				$row[]		= "<a href='".base_url()."assets/images/artikel/".$i['artikel_foto']."'><img width='100' height='100' class='img-fluid float-right' src='".base_url()."assets/images/artikel/".$i['artikel_foto']."'></a>";
				$row[]		= $i['artikel_judul'];
				$row[]		= $i['artikel_dilihat'];
				$row[]	 	=
					"<a href='".base_url().'admin/artikel/edit_artikel/'.$i['artikel_id']."'><button type='button' data='".$i['artikel_id']."' data-placement='top' title='Edit data' class='btn btn-success btn-sm item-tambah'><span> Edit</span></button></a>
					<button type='button' data='".$i['artikel_id']."' foto='".$i['artikel_foto']."' data-placement='top' title='Edit data' class='btn btn-danger btn-sm item-hapus'><span> Hapus</span></button>"; 
				

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
			$row[]			= ' ';

			$data[]			= $row;
		}

		return $data 		= array(
			'data'			=> $data
		);
	}

	public function get_artikel_front()
	{
		$this->db->order_by('created_at','DESC');
		$query 				= $this->db->get('tbl_artikel');

		return $query;
	}

	function get_artikel_by_id($id_artikel)
	{
		$this->db->where('artikel_id',$id_artikel);
		$query 				= $this->db->get('tbl_artikel');

		foreach($query->result_array() as $i)
		{
			$data 			= array(
				'artikel_id'			=> $i['artikel_id'],
				'artikel_judul'			=> $i['artikel_judul'],
				'artikel_isi'			=> $i['artikel_isi']
			);
		}

		return $data;
	}

	function detail_artikel($id_artikel)
	{
		$this->db->where('artikel_id',$id_artikel);
		$query 				= $this->db->get('tbl_artikel');

		return $query;
	}

	function set_artikel($artikel)
	{
		$query 				= $this->db->insert('tbl_artikel',$artikel);

		return $query;
	}

	function update_artikel($id_artikel,$artikel)
	{
		$this->db->where('artikel_id',$id_artikel);
		$query 				= $this->db->update('tbl_artikel',$artikel);

		return $query;
	}

	function delete_artikel($id_artikel)
	{
		$this->db->where('artikel_id',$id_artikel);
		$query 				= $this->db->delete('tbl_artikel');

		return $query;
	}
}
?>