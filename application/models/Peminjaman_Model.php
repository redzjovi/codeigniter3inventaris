<?php
class Peminjaman_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function get_all()
	{
		 $this->db->order_by('kode_pinjam','ASC');
		$query=$getData = $this->db->get('peminjaman');

		if($getData->num_rows()>0)
			return $query;
		else
			return null;
	}

	function get_byid($id)
	{
		$this->db->where('kode_pinjam',$id);
		return $this->db->get('peminjaman')->row();
	}

	public function get_by_id_user($id)
    {
        $this->db->where('id_user', $id);
        $query = $this->db->get('peminjaman');
        return $query->num_rows();
    }

	public function tambah($data)
	{
		$this->db->insert('peminjaman',$data);
		return TRUE;
	}

	function update($id,$data)
	{
		$this->db->where('kode_pinjam',$id);
		$this->db->update('peminjaman',$data);
	}

	function delete($id)
	{
		$this->db->where('kode_pinjam',$id);
		$this->db->delete('Peminjaman');
	}

	function search($jeniscari,$textcari)
	{
		$query = $this->db->query("select * from peminjaman where ".$jeniscari." like '%$textcari%'");
		return $query->result();
	}
	function province($limit,$start)
	{
		return $this->db
					->order_by('kode_pinjam','asc')
					->limit($limit,$start)
					->get_where('peminjaman');
	}
	function province_num_rows()
	{
		return $this->db
					->get('peminjaman')
					->num_rows();
	}


}
