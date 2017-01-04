<?php defined('BASEPATH')or exit('No direct script access allowed');

class Petugas extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  function get_all()
  {
     $this->db->order_by('kode_petugas','ASC');
    $query=$getData = $this->db->get('petugas');
    
    if($getData->num_rows()>0)
      return $query;
    else
      return null;
  }

  function get_byid($id)
  {
    $this->db->where('kode_petugas',$id);
    return $this->db->get('petugas')->row();
  }

  function tambah($data)
  {
    $this->db->insert('petugas',$data);
    return TRUE;
  }

  function update($id,$data)
  {
    $this->db->where('kode_petugas',$id);
    $this->db->update('petugas',$data);
  }

  function delete($id)
  {
    $this->db->where('kode_petugas',$id);
    $this->db->delete('petugas');
  }

  function search($jeniscari,$textcari)
  {
    $query = $this->db->query("select * from petugas where ".$jeniscari." like '%$textcari%'");
    return $query->result();
  }
  function province($limit,$start)
  {
    return $this->db
          ->order_by('kode_petugas','asc')
          ->limit($limit,$start)
          ->get_where('petugas');
  }
  function province_num_rows()
  {
    return $this->db
          ->get('petugas')
          ->num_rows();
  }


}
