<?php
class Barang_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function get_all()
    {
        $this->db->from('barang');
        $this->db->join('kategori_barang', 'kategori_barang.id_kategori = barang.id_kategori', 'left');
        $this->db->order_by('kode_barang', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function get_by_id_kategori($id)
    {
        $this->db->where('id_kategori', $id);
        $query = $this->db->get('barang');
        return $query->num_rows();
    }

    function get_byid($id)
    {
        $this->db->where('kode_barang',$id);
        return $this->db->get('barang')->row();
    }

    function tambah($data)
    {
        $this->db->insert('barang',$data);
        return TRUE;
    }

    function update($id,$data)
    {
        $this->db->where('kode_barang',$id);
        $this->db->update('barang',$data);
    }

    function delete($id)
    {
        $this->db->where('kode_barang',$id);
        $this->db->delete('barang');
    }

    function search($jeniscari,$textcari)
    {
        $query = $this->db->query("select * from barang where ".$jeniscari." like '%$textcari%'");
        return $query->result();
    }
    function province($limit,$start)
    {
        return $this->db
        ->order_by('kode_barang','asc')
        ->limit($limit,$start)
        ->get_where('barang');
    }
    function province_num_rows()
    {
        return $this->db
        ->get('barang')
        ->num_rows();
    }



}
