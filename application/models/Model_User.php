<?php 
class Model_user extends Ci_Model
{
	function get_all_user()
	{
		$this->db->order_by('email','ASC');
		$this->db->where('username !=','admin@admin.com');
		$query 			 = $this->db->get('tbl_pengguna');

		if($query->num_rows() >0)
		{
			$data 			= array();
			$no 			= 0;
			foreach($query->result_array() as $i)
			{
				$no++;
				$row 		= array();
				$row[]		= $no;
				$row[]		= $i['email'];
				$row[]		= $i['first_name'].' '.$i['last_name'];
				$row[]		= $i['phone'];
				$row[]		= ' ';

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
}
?>