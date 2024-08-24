<?php 

class UserModel extends CI_Model{

    public $table = 'users';
   
    public function add($data = array(),$detail = array()){
        $this->db->insert($this->table, $data);
        $this->db->insert('users_detail', $detail);
    }

    public function getBytoken($token){
        $this->db->where('token', $token);
        return $this->db->count_all_results($this->table);
    }

    public function update($data = array(),$detail = array()){
        $this->db->where('userid', $data['userid']);
        $this->db->update('users', $data);
        $this->db->where('userid', $data['userid']);
        $this->db->update('users_detail', $detail);
    }
    
    public function changePass($password, $userId){
        $this->db->where('userid', $userId);
        $this->db->update($this->table, array('password' => $password));
    }

    public function getById($id){
        $this->db->where('userid', $id);
        $query = $this->db->get('users')->row();
        return $query;
    }
 
    public function getLaporan($id) {
        $this->db->select('pbl.*, mahasiswa_pbl.nama, mahasiswa_pbl.prodi, mahasiswa_pbl.nim');
        $this->db->from('pbl');
        $this->db->join('mahasiswa_pbl', 'pbl.no_pbl = mahasiswa_pbl.no_pbl');
        $this->db->where('pbl.no_pbl', $id);
        return $query = $this->db->get();
    }

    public function getDetailLaporan($id){
        $this->db->where('no_pbl',$id);
        return $query = $this->db->get('pbl')->row();
    }
    

    public function getByUsername($id){
        $this->db->select('
        u.firstname,
        u.lastname,
        u.profile,
        u.userid,
        COUNT(DISTINCT pbl.no_pbl) AS jumlah_pbl,
        COUNT(DISTINCT lp.no) AS jumlah_like,
        COUNT(DISTINCT cp.id_comment) AS jumlah_komentar,
        ud.slogan,
        ud.deskripsi,
        ud.whatsapp,
        ud.lingkedin,
        ud.facebook,
        ud.instagram,
        ud.twitter
    ');
    $this->db->from('users u');
    $this->db->join('users_detail ud', 'u.userid = ud.userid', 'left');
    $this->db->join('pbl', 'u.userid = pbl.userid', 'left');
    $this->db->join('like_pbl lp', 'u.userid = lp.userid', 'left');
    $this->db->join('comment_pbl cp', 'u.userid = cp.userid', 'left');
    $this->db->where('u.username', $id);
    $this->db->group_by('u.userid');

    $query = $this->db->get();

    return $query->row();
    }

    public function getDetailUser($id){
        $this->db->where('userid', $id);
        $query = $this->db->get('users_detail')->row();
        return $query;
    }

    public function verifyToken($data = array()){
        $this->db->where('token', $data['token']);
        $this->db->update($this->table, $data);
    }

    public function cekUsername($input_data) {
        // Cek keberadaan data dengan menggunakan query database
        $query = $this->db->get_where('users', array('username' => $input_data));

        // Jika data tidak ditemukan
        if ($query->num_rows() === 0) {
            return $input_data;
        } else {
            $random_number = rand(100, 999);
            $modified_data = $input_data . '-' . $random_number;
            return $modified_data;
        }
    }

    public function getDosen($key){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('role', 'dosen');
        $this->db->group_start();
        $this->db->like('firstname', $key);
        $this->db->or_like('lastname', $key);
        $this->db->or_like('username', $key);
        $this->db->group_end();
        return $this->db->get();
    }
}