<?php
class Pengembalian_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function create($data)
	{
		$this->db->insert('pengembalian', $data);
	}

	public function update_status($id, $data)
	{
		$this->db->where('id_peminjaman', $id);
		$this->db->update('pengembalian', $data);
	}

	function get_all()
	{
		 $this->db->order_by('kode_pengembalian','ASC');
		$query=$getData = $this->db->get('pengembalian');

		if($getData->num_rows()>0)
			return $query;
		else
			return null;
	}

	function get_byid($id)
	{
		$this->db->where('kode_pengembalian',$id);
		return $this->db->get('pengembalian')->row();
	}

	public function get_by_id_user($id)
    {
        $this->db->where('id_user', $id);
        $query = $this->db->get('pengembalian');
        return $query->num_rows();
    }

	function update($id,$data)
	{
		$this->db->where('kode_pengembalian',$id);
		$this->db->update('pengembalian',$data);
	}

	function delete($id)
	{
		$this->db->where('kode_pengembalian',$id);
		$this->db->delete('pengembalian');
	}

	function search($jeniscari,$textcari)
	{
		$query = $this->db->query("select * from pengembalian where ".$jeniscari." like '%$textcari%'");
		return $query->result();
	}
	function province($limit,$start)
	{
		return $this->db
					->order_by('kode_pengembalian','asc')
					->limit($limit,$start)
					->get_where('pengembalian');
	}
	function province_num_rows()
	{
		return $this->db
					->get('pengembalian')
					->num_rows();
	}
}
?>