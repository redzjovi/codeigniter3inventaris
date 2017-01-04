<?php defined('BASEPATH')or exit('No direct script access allowed');

class Detail extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  function get_all()
  {
     $this->db->order_by('kode_detail','ASC');
    $query=$getData = $this->db->get('detail');
    
    if($getData->num_rows()>0)
      return $query;
    else
      return null;
  }

  function get_byid($id)
  {
    $this->db->where('kode_detail',$id);
    return $this->db->get('detail')->row();
  }

  function tambah($data)
  {
    $this->db->insert('detail',$data);
    return TRUE;
  }

  function update($id,$data)
  {
    $this->db->where('kode_detail',$id);
    $this->db->update('detail',$data);
  }

  function delete($id)
  {
    $this->db->where('kode_detail',$id);
    $this->db->delete('detail');
  }

  function search($jeniscari,$textcari)
  {
    $query = $this->db->query("select * from detail where ".$jeniscari." like '%$textcari%'");
    return $query->result();
  }
  function province($limit,$start)
  {
    return $this->db
          ->order_by('kode_detail','asc')
          ->limit($limit,$start)
          ->get_where('detail');
  }
  function province_num_rows()
  {
    return $this->db
          ->get('detail')
          ->num_rows();
  }


}
