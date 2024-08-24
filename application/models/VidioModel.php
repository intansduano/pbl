<?php 

class VidioModel extends CI_Model{

    public $table = 'pbl';

    public function add($data = array()){
        $this->db->insert($this->table, $data);
        $this->db->insert('penilaian', array('no_pbl' => $data['no_pbl']));
        $this->db->insert('komentar_reviewer', array('no_pbl' => $data['no_pbl']));
    }

    public function addMahasiswa($data = array()){
        $this->db->insert('mahasiswa_pbl', $data);
    }

    public function addComment($data = array()){
        $this->db->insert('comment_pbl', $data);
    }

    public function getComment($id) {
        $this->db->where('no_pbl',$id);
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get('comment_pbl');
        return $query;
    }

    public function cekSlug($input_data) {
        // Cek keberadaan data dengan menggunakan query database
        $query = $this->db->get_where('pbl', array('slug' => $input_data));

        // Jika data tidak ditemukan
        if ($query->num_rows() === 0) {
            return $input_data;
        } else {
            $random_number = rand(100, 999);
            $modified_data = $input_data . '-' . $random_number;
            return $modified_data;
        }
    }

    public function getKomentar($id){
        $this->db->where('no_pbl', $id);
        $query = $this->db->get('komentar_reviewer');
        return $query->row();
    }

    public function updatePenilaian($data = array()){
        $this->db->where('no_pbl', $data['no_pbl']);
        $this->db->update('penilaian', $data);
    }

    public function updateKomentar($data = array()){
        $this->db->where('no_pbl', $data['no_pbl']);
        $this->db->update('komentar_reviewer', $data);
    }

    public function getVidio($slug) {
        $this->db->where('slug',$slug);
        $query = $this->db->get('pbl')->row();
        return $query;
    }

    public function getPenilaian($id) {
        $this->db->where('no_pbl',$id);
        $query = $this->db->get('penilaian')->row();
        return $query;
    }

    public function getMahasiswa($id){
        $this->db->where('no_pbl',$id);
        $this->db->order_by('no', 'ASC');
        $query = $this->db->get('mahasiswa_pbl');
        return $query;
    }

    public function getJumlahMahasiswa($id) {
        $this->db->where('no_pbl', $id);
        $this->db->from('mahasiswa_pbl');
        return $this->db->count_all_results();
    }

    public function update($data = array()){
        $this->db->where('no_pbl', $data['no_pbl']);
        $this->db->update('pbl', $data);
    }

    public function nilai($data = array()){
        $this->db->where('no_pbl', $data['no_pbl']);
        $this->db->update('penilaian', $data);
    }

    public function updateMahasiswa($data = array()){
        $this->db->where('no', $data['no']);
        $this->db->update('mahasiswa_pbl', $data);
    }

    public function getVidioPrivate() {
        $this->db->select('p.judul_pbl,p.no_pbl,p.deskripsi, p.status ,p.tanggal, p.jurusan, p.sampul, p.slug, COUNT(DISTINCT lp.userid) AS jumlah_like, COUNT(DISTINCT vp.no) AS jumlah_view, (SELECT nama FROM mahasiswa_pbl WHERE no_pbl = p.no_pbl LIMIT 1) AS nama_mahasiswa');
        $this->db->from('pbl p');
        $this->db->join('like_pbl lp', 'p.no_pbl = lp.no_pbl', 'left');
        $this->db->join('comment_pbl cp', 'p.no_pbl = cp.no_pbl', 'left');
        $this->db->join('view_pbl vp', 'p.no_pbl = vp.no_pbl', 'left');
        $this->db->group_by('p.no_pbl, p.tanggal, p.jurusan, p.sampul, p.slug');
        $this->db->order_by('p.tanggal', 'DESC');
        return $this->db->get();
    }

    public function getVidioPengguna() {
        $this->db->select('p.judul_pbl,p.no_pbl,p.deskripsi, p.nilai ,p.tanggal, p.jurusan, p.sampul, p.slug, COUNT(DISTINCT lp.userid) AS jumlah_like, COUNT(DISTINCT vp.no) AS jumlah_view, (SELECT nama FROM mahasiswa_pbl WHERE no_pbl = p.no_pbl LIMIT 1) AS nama_mahasiswa');
        $this->db->from('pbl p');
        $this->db->join('like_pbl lp', 'p.no_pbl = lp.no_pbl', 'left');
        $this->db->join('comment_pbl cp', 'p.no_pbl = cp.no_pbl', 'left');
        $this->db->join('view_pbl vp', 'p.no_pbl = vp.no_pbl', 'left');
        $this->db->where('p.dosen_pengampuh_mk', $_SESSION['id_user']);
        $this->db->group_by('p.no_pbl, p.tanggal, p.jurusan, p.sampul, p.slug');
        $this->db->order_by('p.tanggal', 'DESC');
        return $this->db->get();
    }

    public function getVidioPenggunaMahasiswa() {
        $this->db->select('p.judul_pbl,p.no_pbl,p.deskripsi, p.nilai, p.status ,p.tanggal, p.jurusan, p.sampul, p.slug, COUNT(DISTINCT lp.userid) AS jumlah_like, COUNT(DISTINCT vp.no) AS jumlah_view, (SELECT nama FROM mahasiswa_pbl WHERE no_pbl = p.no_pbl LIMIT 1) AS nama_mahasiswa');
        $this->db->from('pbl p');
        $this->db->join('like_pbl lp', 'p.no_pbl = lp.no_pbl', 'left');
        $this->db->join('comment_pbl cp', 'p.no_pbl = cp.no_pbl', 'left');
        $this->db->join('view_pbl vp', 'p.no_pbl = vp.no_pbl', 'left');
        $this->db->where('p.userid', $_SESSION['id_user']);
        $this->db->group_by('p.no_pbl, p.tanggal, p.jurusan, p.sampul, p.slug');
        $this->db->order_by('p.tanggal', 'DESC');
        return $this->db->get();
    }

    public function getVidioUser($id) {
        $this->db->select('p.judul_pbl, p.tanggal, p.jurusan, p.sampul, p.slug, COUNT(DISTINCT lp.userid) AS jumlah_like, COUNT(DISTINCT cp.id_comment) AS jumlah_komentar, COUNT(DISTINCT vp.no) AS jumlah_view');
        $this->db->from('pbl p');
        $this->db->join('like_pbl lp', 'p.no_pbl = lp.no_pbl', 'left');
        $this->db->join('comment_pbl cp', 'p.no_pbl = cp.no_pbl', 'left');
        $this->db->join('view_pbl vp', 'p.no_pbl = vp.no_pbl', 'left');
        $this->db->group_by('p.no_pbl, p.tanggal, p.jurusan, p.sampul, p.slug');
        $this->db->order_by('p.tanggal', 'DESC');
        $this->db->where('p.userid',$id);
        return $this->db->get();
    }
    
    public function getGradingDetail($no_pbl) {
        $this->db->select('*');
        $this->db->from('pbl');
        $this->db->where('no_pbl', $no_pbl);
        $query = $this->db->get();
        return $query->row();
    }

    public function updateNilai($pbl,$nilai,$feedback){
        $data = array(
            'nilai' => $nilai,
            'feedback' => $feedback
        );
        $this->db->where('no_pbl', $pbl);
        $this->db->update('pbl', $data);
    }

    public function getAllGradingData() {
            $this->db->select('pbl.*, mahasiswa_pbl.nama as nama, mahasiswa_pbl.nim, mahasiswa_pbl.prodi,mahasiswa_pbl.profile');
            $this->db->from('pbl');
            $this->db->where('pbl.dosen_pengampuh_mk', $_SESSION['id_user']);
            $this->db->join('mahasiswa_pbl', 'pbl.no_pbl = mahasiswa_pbl.no_pbl');
            $this->db->group_by('pbl.no_pbl');
            $this->db->order_by('pbl.no_pbl', 'ASC');
            return $query = $this->db->get();
    }

    public function getGradingStudent($no_pbl) {
        $this->db->select('*');
        $this->db->from('mahasiswa_pbl');
        $this->db->where('no_pbl', $no_pbl);
        return $query = $this->db->get();
    }

    public function getSearchVidio($key) {
        $this->db->select('p.judul_pbl,p.no_pbl, p.tanggal, p.deskripsi, p.nilai, p.jurusan, p.sampul, p.slug, COUNT(DISTINCT lp.userid) AS jumlah_like, COUNT(DISTINCT cp.id_comment) AS jumlah_komentar, COUNT(DISTINCT vp.no) AS jumlah_view, (SELECT nama FROM mahasiswa_pbl WHERE no_pbl = p.no_pbl ORDER BY no ASC LIMIT 1) AS nama_mahasiswa');
        $this->db->from('pbl p');
        $this->db->join('like_pbl lp', 'p.no_pbl = lp.no_pbl', 'left');
        $this->db->join('comment_pbl cp', 'p.no_pbl = cp.no_pbl', 'left');
        $this->db->join('view_pbl vp', 'p.no_pbl = vp.no_pbl', 'left');
        $this->db->where("p.no_pbl IN (SELECT no_pbl FROM mahasiswa_pbl WHERE dosen_pengampuh_mk = '$_SESSION[id_user]')");
        $this->db->group_by('p.no_pbl, p.tanggal, p.jurusan, p.sampul, p.slug');
        $this->db->order_by('p.tanggal', 'DESC');
        $this->db->like('p.judul_pbl', $key);
        return $this->db->get();
    }

    public function getSearchVidioMahasiswa($key) {
        $this->db->select('p.judul_pbl,p.no_pbl, p.tanggal, p.deskripsi, p.nilai, p.jurusan, p.sampul, p.slug, COUNT(DISTINCT lp.userid) AS jumlah_like, COUNT(DISTINCT cp.id_comment) AS jumlah_komentar, COUNT(DISTINCT vp.no) AS jumlah_view, (SELECT nama FROM mahasiswa_pbl WHERE no_pbl = p.no_pbl ORDER BY no ASC LIMIT 1) AS nama_mahasiswa');
        $this->db->from('pbl p');
        $this->db->join('like_pbl lp', 'p.no_pbl = lp.no_pbl', 'left');
        $this->db->join('comment_pbl cp', 'p.no_pbl = cp.no_pbl', 'left');
        $this->db->join('view_pbl vp', 'p.no_pbl = vp.no_pbl', 'left');
        $this->db->where("p.no_pbl IN (SELECT no_pbl FROM mahasiswa_pbl WHERE p.userid = '$_SESSION[id_user]')");
        $this->db->group_by('p.no_pbl, p.tanggal, p.jurusan, p.sampul, p.slug');
        $this->db->order_by('p.tanggal', 'DESC');
        $this->db->like('p.judul_pbl', $key);
        return $this->db->get();
    }
    
        
    public function getSearchVidioJurusan($key) {
        $this->db->select('p.judul_pbl, p.no_pbl, p.tanggal, p.status, p.deskripsi, p.nilai, p.jurusan, p.sampul, p.slug, COUNT(DISTINCT lp.userid) AS jumlah_like, COUNT(DISTINCT cp.id_comment) AS jumlah_komentar, COUNT(DISTINCT vp.no) AS jumlah_view, (SELECT nama FROM mahasiswa_pbl WHERE no_pbl = p.no_pbl ORDER BY no ASC LIMIT 1) AS nama_mahasiswa');
        $this->db->from('pbl p');
        $this->db->where('p.status', 'Publish'); // Pastikan 'Publish' memiliki nilai yang benar-benar ada di dalam tabel
        $this->db->where('p.jurusan', $_SESSION['jurusan']); // Pastikan $_SESSION['jurusan'] memiliki nilai yang benar-benar ada di dalam tabel
        $this->db->join('like_pbl lp', 'p.no_pbl = lp.no_pbl', 'left');
        $this->db->join('comment_pbl cp', 'p.no_pbl = cp.no_pbl', 'left');
        $this->db->join('view_pbl vp', 'p.no_pbl = vp.no_pbl', 'left');
        $this->db->group_by('p.no_pbl');
        $this->db->order_by('p.tanggal', 'DESC');
        $this->db->like('p.judul_pbl', $key);
        $this->db->or_like('p.tanggal', $key);
        return $this->db->get();
    }
    
    public function getSemuaJudulVidio()
    {
        $this->db->select('judul_pbl');
        $this->db->where('status', 'Publish');
        $query = $this->db->get('pbl');
        return $query->result();
    }

    public function getVidioJurusan() {
        $this->db->select('p.judul_pbl,p.no_pbl, p.tanggal,p.status, p.deskripsi, p.nilai, p.jurusan, p.sampul, p.slug, COUNT(DISTINCT lp.userid) AS jumlah_like, COUNT(DISTINCT cp.id_comment) AS jumlah_komentar, COUNT(DISTINCT vp.no) AS jumlah_view, (SELECT nama FROM mahasiswa_pbl WHERE no_pbl = p.no_pbl ORDER BY no ASC LIMIT 1) AS nama_mahasiswa');
        $this->db->from('pbl p');
        $this->db->where('p.status','Publish');
        $this->db->where('p.jurusan',$_SESSION['jurusan']);
        $this->db->join('like_pbl lp', 'p.no_pbl = lp.no_pbl', 'left');
        $this->db->join('comment_pbl cp', 'p.no_pbl = cp.no_pbl', 'left');
        $this->db->join('view_pbl vp', 'p.no_pbl = vp.no_pbl', 'left');
        $this->db->group_by('p.no_pbl, p.tanggal, p.jurusan, p.sampul, p.slug');
        $this->db->order_by('p.tanggal', 'DESC');
        return $this->db->get();
    }

    public function getSimilarVidio($jurusan) {
        $this->db->select('p.judul_pbl,p.no_pbl, p.tanggal, p.deskripsi, p.nilai, p.jurusan, p.sampul, p.slug, COUNT(DISTINCT lp.userid) AS jumlah_like, COUNT(DISTINCT cp.id_comment) AS jumlah_komentar, COUNT(DISTINCT vp.no) AS jumlah_view, (SELECT nama FROM mahasiswa_pbl WHERE no_pbl = p.no_pbl ORDER BY no ASC LIMIT 1) AS nama_mahasiswa');
        $this->db->from('pbl p');
        $this->db->join('like_pbl lp', 'p.no_pbl = lp.no_pbl', 'left');
        $this->db->join('comment_pbl cp', 'p.no_pbl = cp.no_pbl', 'left');
        $this->db->join('view_pbl vp', 'p.no_pbl = vp.no_pbl', 'left');
        $this->db->group_by('p.no_pbl, p.tanggal, p.jurusan, p.sampul, p.slug');
        $this->db->order_by('jumlah_komentar', 'DESC');
        $this->db->order_by('jumlah_view', 'DESC');
        $this->db->order_by('jumlah_like', 'DESC');
        $this->db->order_by('p.tanggal', 'DESC');
        $this->db->where('p.jurusan',$jurusan);
        return $this->db->get();
    }

    public function likes($id){
        // Mengecek apakah data sudah terdaftar
        $this->db->where('userid', $_SESSION['id_user']);
        $this->db->where('no_pbl', $id);
        $query = $this->db->get('like_pbl');

        if ($query->num_rows() > 0) {
            $this->db->where('userid', $_SESSION['id_user']);
            $this->db->where('no_pbl', $id);
            $this->db->delete('like_pbl');
        } else {
            // Jika data belum terdaftar, tambahkan data baru
            $data = array(
                'userid' => $_SESSION['id_user'],
                'no_pbl' => $id,
            );
            $this->db->insert('like_pbl', $data);
        }

        $this->db->where('no_pbl', $id);
        $totalLikes = $this->db->count_all_results('like_pbl');

        return $totalLikes;
   }

}