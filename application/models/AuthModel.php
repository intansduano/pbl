<?php 


class AuthModel extends CI_Model{

	public $table = 'users';
	public function login($email){
		$this->db->select(array('userid', 'email', 'password', 'role'));

		return $this->db->get_where('users', array('email' => $email))->row();
	}

	public function getDataLoggedIn($userId){
		$this->db->select('*');
		$this->db->where('userid', $userId);
		$this->db->from('users');

		return $this->db->get()->row();
	}

	public function checkEmailVerified($email){
		$this->db->where('email', $email);
		$this->db->where('verified', 'yes');
        return $this->db->count_all_results($this->table);
	}

}

?>