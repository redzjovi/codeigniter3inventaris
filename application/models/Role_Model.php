<?php
class Role_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create($data)
    {
        $this->db->insert('role', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_role', $id);
        $this->db->update('role', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_role', $id);
        $this->db->delete('role');
    }

    public function get_all()
    {
        $this->db->order_by('nama_role', 'ASC');
        $query = $this->db->get('role');
        return $query;
    }

    public function get_by_id($id)
    {
        $this->db->where('id_role', $id);
        return $this->db->get('role')->row();
    }
}
?>