<?php 


class AdminModel extends CI_Model{
    
    public function getTemplate() {
        $query = $this->db->get('template');
        return $query;
    }

    public function addTemplate($data = array()){
        $this->db->insert('template', $data);
    }

    public function getAllUserData() {
        $this->db->select('users.*, users_detail.bergabung');
        $this->db->from('users');
        $this->db->join('users_detail', 'users.userid = users_detail.userid', 'left');
        $this->db->order_by('bergabung','desc');
        $query = $this->db->get();
        return $query;
    }
}