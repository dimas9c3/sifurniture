<?php 
class Model_ongkir extends Ci_Model
{
	function get_all_ongkir()
	{
		$this->db->select('*');
		$this->db->from('tbl_ongkir');
		$this->db->join('provinsi','provinsi.id_prov=tbl_ongkir.id_prov','INNER');
		$this->db->order_by('provinsi.nama','ASC');
		$this->db->order_by('tbl_ongkir.ongkir_nama','ASC');
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
				$row[]		= $i['nama'];
				$row[]		= $i['ongkir_nama'];
				$row[]		= "Rp. ".number_format($i['ongkir_tarif']);
				$row[]		= "
				<button type='button' data='".$i['ongkir_id']."' data-placement='top' title='Edit data' class='btn btn-info btn-sm item-edit'><span> <i class='fa fa-pencil'></i></span></button>
				<button type='button' data='".$i['ongkir_id']."' data-placement='top' title='Hapus data' class='btn btn-danger btn-sm item-hapus'><span> <i class='fa fa-trash'></i></span></button>";

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

	function get_ongkir_by_id($id_ongkir)
	{
		$this->db->where('ongkir_id',$id_ongkir);
		$query 					= $this->db->get('tbl_ongkir');

		if($query->num_rows() >0)
		{
			foreach($query->result_array() as $i)
			{
				$data 			= array(
					'ongkir_id'					=> $i['ongkir_id'],
					'ongkir_nama'				=> $i['ongkir_nama'],
					'ongkir_tarif'				=> $i['ongkir_tarif'],
					'id_prov'					=> $i['id_prov']
				);
			}
		}else
		{
			$data 				= array('Data Tidak Ada');
		}

		return $data;
	}

	function get_select_provinsi()
	{
		$this->db->order_by('provinsi.nama','ASC');
		$query 					= $this->db->get('provinsi');

		return $query->result();
	}

	function set_ongkir($ongkir)
	{
		$query 					= $this->db->insert('tbl_ongkir',$ongkir);

		return $query;
	}

	public function delete_ongkir($id_ongkir)
	{
		$this->db->where('ongkir_id',$id_ongkir);
		$query 					= $this->db->delete('tbl_ongkir');

		return $query;
	}

	public function update_ongkir($id_ongkir,$ongkir)
	{
		$this->db->where('ongkir_id',$id_ongkir);
		$query 					= $this->db->update('tbl_ongkir',$ongkir);

		return $query;
	}

	/* ==== FRONTEND AREA ==== */

	function get_prov_select_front()
	{
		$this->db->select('provinsi.id_prov,provinsi.nama');
		$this->db->from('tbl_ongkir');
		$this->db->join('provinsi','provinsi.id_prov=tbl_ongkir.id_prov','INNER');
		$this->db->order_by('provinsi.nama','ASC');
		$this->db->group_by('provinsi.id_prov');
		$query 					= $this->db->get();

		return $query->result();
	}

	function get_kab_select_front()
	{
		$this->db->select('ongkir_id,ongkir_nama');
		$this->db->from('tbl_ongkir');
		$this->db->order_by('ongkir_nama','ASC');
		$query 					= $this->db->get();

		return $query->result();
	}

	function get_kab_by_prov_select($id_prov)
	{
		$this->db->where('id_prov',$id_prov);
		$this->db->order_by('ongkir_nama','ASC');
		$query 					= $this->db->get('tbl_ongkir');

		return $query->result();
	}
}
?>