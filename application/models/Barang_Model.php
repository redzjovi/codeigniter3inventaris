<?php
class Barang_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function create($data)
    {
        $this->db->insert('barang', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where('id_barang', $id);
        $this->db->update('barang', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_barang', $id);
        $this->db->delete('barang');
    }

    public function get_all()
    {
        $this->db->from('barang');
        $this->db->join('kategori_barang', 'kategori_barang.id_kategori = barang.id_kategori', 'left');
        $this->db->order_by('kode_barang', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function get_by_id($id)
    {
        $this->db->where('id_barang', $id);
        return $this->db->get('barang')->row();
    }

    public function get_by_id_kategori($id)
    {
        $this->db->where('id_kategori', $id);
        $query = $this->db->get('barang');
        return $query->num_rows();
    }
}
?>