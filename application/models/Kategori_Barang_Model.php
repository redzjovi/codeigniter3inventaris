<?php
class Kategori_Barang_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create($data)
    {
        $this->db->insert('kategori_barang', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori_barang', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori_barang');
    }

    public function get_all()
    {
        $this->db->order_by('nama_kategori', 'ASC');
        $query = $this->db->get('kategori_barang');
        return $query;
    }

    public function get_by_id($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->get('kategori_barang')->row();
    }
}
?>