<?php
class User_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create($data)
    {
        $this->db->insert('user', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

    public function get_all()
    {
        $this->db->order_by('username','ASC');
        $this->db->from('user');
        $this->db->join('role', 'role.id_role = user.id_role', 'left');
        $query = $this->db->get();
        return $query;
    }

    public function get_by_id($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('user')->row();
    }

    public function get_by_id_role($id)
    {
        $this->db->where('id_role', $id);
        $query = $this->db->get('user');
        return $query->num_rows();
    }

    public function check_unique_username($id, $username)
	{
		$this->db->where_not_in('id_user', $id);
		$this->db->where('username', $username);
		return $this->db->count_all_results('user');
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
}
?>