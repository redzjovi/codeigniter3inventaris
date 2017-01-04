<?php defined('BASEPATH')or exit('No direct script access allowed');

class Kategori extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  function get_all()
  {
     $this->db->order_by('kode_kategori','ASC');
    $query=$getData = $this->db->get('kategori');
    
    if($getData->num_rows()>0)
      return $query;
    else
      return null;
  }

  function get_byid($id)
  {
    $this->db->where('kode_kategori',$id);
    return $this->db->get('kategori')->row();
  }

  function tambah($data)
  {
    $this->db->insert('kategori',$data);
    return TRUE;
  }

  function update($id,$data)
  {
    $this->db->where('kode_kategori',$id);
    $this->db->update('kategori',$data);
  }

  function delete($id)
  {
    $this->db->where('kode_kategori',$id);
    $this->db->delete('kategori');
  }

  function search($jeniscari,$textcari)
  {
    $query = $this->db->query("select * from kategori where ".$jeniscari." like '%$textcari%'");
    return $query->result();
  }
  function province($limit,$start)
  {
    return $this->db
          ->order_by('kode_kategori','asc')
          ->limit($limit,$start)
          ->get_where('kategori');
  }
  function province_num_rows()
  {
    return $this->db
          ->get('kategori')
          ->num_rows();
  }


}
