<?php
class Detail_Barang_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function create($data)
    {
        $this->db->insert('detail_barang', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_barang', $id);
        $this->db->update('detail_barang', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_barang', $id);
        $this->db->delete('detail_barang');
    }

    public function get_by_id($id)
    {
        $this->db->where('id_barang', $id);
        return $this->db->get('detail_barang')->row();
    }
}
?>