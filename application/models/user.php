<?php defined('BASEPATH')or exit('No direct script access allowed');

class User extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  function get_all()
  {
     $this->db->order_by('username','ASC');
    $query=$getData = $this->db->get('user');
    
    if($getData->num_rows()>0)
      return $query;
    else
      return null;
  }

  public function check_credential()
  {
    $username = set_value('username');
    $password = set_value('password');

    $hasil = $this->db->where('username', $username)
              ->where('password', $password)
              ->limit(1)
              ->get('user');
    
    // untuk memperjelas
    $row = $hasil->num_rows();
    
    if ($row > 0){
      return $hasil->row();
    } else {
      // disini jangan array, tapi FALSE
      return FALSE;
    }
  }

  function get_byid($id)
  {
    $this->db->where('username',$id);
    return $this->db->get('user')->row();
  }

  function tambah($data)
  {
    $this->db->insert('user',$data);
    return TRUE;
  }

  function update($id,$data)
  {
    $this->db->where('username',$id);
    $this->db->update('user',$data);
  }

  function delete($id)
  {
    $this->db->where('username',$id);
    $this->db->delete('user');
  }

  function search($jeniscari,$textcari)
  {
    $query = $this->db->query("select * from user where ".$jeniscari." like '%$textcari%'");
    return $query->result();
  }
  function province($limit,$start)
  {
    return $this->db
          ->order_by('username','asc')
          ->limit($limit,$start)
          ->get_where('user');
  }
  function province_num_rows()
  {
    return $this->db
          ->get('user')
          ->num_rows();
  }


}
