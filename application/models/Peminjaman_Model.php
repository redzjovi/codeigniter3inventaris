<?php
class Peminjaman_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function create($data)
	{
		$this->db->insert('peminjaman', $data);
		return $this->db->insert_id();
	}

	public function get_all()
	{
		$this->db->from('peminjaman');
		$this->db->join('barang', 'barang.id_barang = peminjaman.id_barang', 'left');
		$this->db->join('user', 'user.id_user = peminjaman.id_user', 'left');
		$this->db->join('pengembalian', 'pengembalian.id_peminjaman = peminjaman.id_peminjaman', 'left');
		$this->db->where('pengembalian.status', '');
		return $this->db->get();
	}

	public function get_by_id($id)
    {
        $this->db->where('id_peminjaman', $id);
        return $this->db->get('peminjaman')->row();
    }
}
?>