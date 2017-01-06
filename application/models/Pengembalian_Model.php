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

	public function get_all()
	{
		$this->db->select('*');
		$this->db->select('pengembalian.jumlah_barang AS jumlah_pengembalian');
		$this->db->select('pengembalian.status AS status_pengembalian');
		$this->db->from('pengembalian');
		$this->db->join('barang', 'barang.id_barang = pengembalian.id_barang', 'left');
		$this->db->join('user', 'user.id_user = pengembalian.id_user', 'left');
		$this->db->order_by('id_pengembalian','ASC');
		$query = $this->db->get();
		return $query;
	}

	public function get_by_id($id)
    {
		$this->db->select('*');
		$this->db->select('pengembalian.jumlah_barang AS jumlah_pengembalian');
		$this->db->select('pengembalian.status AS status_pengembalian');
		$this->db->from('pengembalian');
		$this->db->join('barang', 'barang.id_barang = pengembalian.id_barang', 'left');
		$this->db->join('user', 'user.id_user = pengembalian.id_user', 'left');
		$this->db->where('id_pengembalian', $id);
        return $this->db->get()->row();
    }

	public function update_status($id, $data)
	{
		$this->db->where('id_peminjaman', $id);
		$this->db->update('pengembalian', $data);
	}
}
?>