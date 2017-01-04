<?php defined('BASEPATH')or exit('No direct script access allowed');

class Role extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  function get_all()
  {
     $this->db->order_by('kode_role','ASC');
    $query=$getData = $this->db->get('role');
    
    if($getData->num_rows()>0)
      return $query;
    else
      return null;
  }

  function get_byid($id)
  {
    $this->db->where('kode_role',$id);
    return $this->db->get('role')->row();
  }

  function tambah($data)
  {
    $this->db->insert('role',$data);
    return TRUE;
  }

  function update($id,$data)
  {
    $this->db->where('kode_role',$id);
    $this->db->update('role',$data);
  }

  function delete($id)
  {
    $this->db->where('kode_role',$id);
    $this->db->delete('role');
  }

  function search($jeniscari,$textcari)
  {
    $query = $this->db->query("select * from role where ".$jeniscari." like '%$textcari%'");
    return $query->result();
  }
  function province($limit,$start)
  {
    return $this->db
          ->order_by('kode_role','asc')
          ->limit($limit,$start)
          ->get_where('role');
  }
  function province_num_rows()
  {
    return $this->db
          ->get('role')
          ->num_rows();
  }


}
