<?php 


class HomepageModel extends CI_Model{
    
    public function getVidioBaru() {
        $this->db->where('status','Publish');
        $query = $this->db->get('pbl');
        return $query;
    }

    public function getBySlug($slug) {
        $this->db->where('slug',$slug);
        $query = $this->db->get('pbl')->row();
        return $query;
    }

    public function addview($data = array()){
        $this->db->insert('view_pbl', $data);
    }

    public function getView($id){
        $this->db->where('no_pbl', $id);
        $rowCount = $this->db->count_all_results('view_pbl');
        return $rowCount;
    }

    public function getLikes($id){
        $this->db->where('no_pbl', $id);
        $totalLikes = $this->db->count_all_results('like_pbl');
        return $totalLikes;
    }

    public function getLikesComment($id){
        $this->db->where('id_comment', $id);
        $totalLikes = $this->db->count_all_results('like_comment');
        return $totalLikes;
    }

    public function getComment($id){
        $this->db->where('no_pbl', $id);
        $totalComment = $this->db->count_all_results('comment_pbl');
        return $totalComment;
    }

    public function getLiked($id){
        $this->db->where('no_pbl', $id);
        $this->db->where('userid', $_SESSION['id_user']);
        $query = $this->db->get('like_pbl');
        if ($query->num_rows() > 0) {
            return "text-blue-500";
        }else{
            return "text-gray-800";
        }
    }

    public function changeLiked($id){
        $this->db->where('no_pbl', $id);
        $this->db->where('userid', $_SESSION['id_user']);
        $query = $this->db->get('like_pbl');
        if ($query->num_rows() > 0) {
            return "#3490dc";
        } else {
            return "#1F2937";
        }
        
    }

    public function changeLikedComment($id){
        $this->db->where('id_comment', $id);
        $this->db->where('userid', $_SESSION['id_user']);
        $query = $this->db->get('like_comment');
        if ($query->num_rows() == 0) {
            return "fa-regular fa-heart scale-125";
        } else {
            return "fa-solid fa-heart scale-125";
        }
        
    }

    public function checkView($ip,$id){
        date_default_timezone_set('Asia/Jakarta');
        $today = date('Y-m-d');
        $this->db->where('ip_public', $ip);
        $this->db->where('no_pbl', $id);
        $this->db->where('tanggal', $today);
        $totalView = $this->db->count_all_results('view_pbl');
        if ($totalView == 0) {
            return true;
        }else{
            return false;
        }
    }
}

?>