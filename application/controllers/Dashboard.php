<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(['AuthModel', 'UserModel','AdminModel','VidioModel']);
		
		// jika belum login, tdk bisa kesini
		if (!isset($_SESSION['logged_in'])) {
			redirect('/');
		}
	}
	
	public function index(){
		$data['title'] = "PBL - Dashboard";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$this->load->view('templates/dashboard/head', $data);

		if($data['getUser']->status == 'active'){
			if($data['getUser']->role == 'admin'){
				$data['page'] = 'dashboard';
				$data['sidebar'] = $this->load->view('templates/dashboard/sidebarAdmin', $data, true);
				$this->load->view('templates/dashboard/navbar', $data);
				$data['user'] = $this->AdminModel->getAllUserData();
 				$this->load->view('pages/admin/index', $data);
				$this->load->view('templates/dashboard/footer');
			}elseif($data['getUser']->role == 'dosen'){
				$data['page'] = 'vidio';
				$data['sidebar'] = $this->load->view('templates/dashboard/sidebarPengguna', $data, true);
				$this->load->view('templates/dashboard/navbar', $data);
				$this->load->view('pages/dashboard/vidio', $data);
				$this->load->view('templates/dashboard/footer');
			}elseif($data['getUser']->role == 'pengguna'){
				$data['page'] = 'vidio';
				$data['sidebar'] = $this->load->view('templates/dashboard/sidebarMahasiswa', $data, true);
				$this->load->view('templates/dashboard/navbar', $data);
				$this->load->view('pages/dashboard/vidiopengguna', $data);
				$this->load->view('templates/dashboard/footer');
			}elseif($data['getUser']->role == 'reviewer'){
				$data['page'] = 'vidio';
				$data['sidebar'] = $this->load->view('templates/dashboard/sidebarReviewer', $data, true);
				$this->load->view('templates/dashboard/navbar', $data);
				$this->load->view('pages/reviewer/index', $data);
				$this->load->view('templates/dashboard/footer');
			} 
		}else{
			redirect('inactive');
		}
	}

	public function change_pass(){
		$data['title'] = "PBL- Ganti Password";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$this->load->view('templates/dashboard/head', $data);

		if($data['getUser']->status == 'active'){

			$this->form_validation->set_rules('oldpass', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));

			$this->form_validation->set_rules('newpass', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));

			$this->form_validation->set_rules('konfirmasi', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));
			
			if($this->form_validation->run()){
				$oldpass = htmlspecialchars($this->input->post('oldpass'));
				$konfirmasi = htmlspecialchars($this->input->post('konfirmasi'));
				$newpass = htmlspecialchars($this->input->post('newpass'));
				
				if (password_verify($oldpass, $data['getUser']->password)) {
					if($newpass != $konfirmasi){
						$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
							title: "Password Tidak Sesuai",
							text: "Mohon Konfirmasi Password Anda",
							icon: "error",})</script>'
						);
						redirect('change-pass');
					}else{
						$this->UserModel->changePass(password_hash($newpass, PASSWORD_DEFAULT), $_SESSION['id_user']);
						$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
							title: "Berhasil",
							text: "Password diGanti",
							icon: "success",})</script>'
						);
						redirect('change-pass');
					}
				}else{
					$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
						title: "Gagal",
						text: "Password Lama Salah",
						icon: "error",})</script>'
					);
					redirect('change-pass');
				}
				
			
			}else{
				$data['page'] = 'password';
				$data['dataUser'] = $this->UserModel->getById($_SESSION['id_user']);
				$data['detailUser'] = $this->UserModel->getDetailUser($_SESSION['id_user']);
				if($data['getUser']->role == 'pengguna'){
					$data['sidebar'] = $this->load->view('templates/dashboard/sidebarMahasiswa', $data, true);
				}elseif($data['getUser']->role == 'dosen'){
					$data['sidebar'] = $this->load->view('templates/dashboard/sidebarPengguna', $data, true);
				}
				$this->load->view('templates/dashboard/navbar', $data);
				$this->load->view('pages/dashboard/changepass', $data);
				$this->load->view('templates/dashboard/footer');
			}
		}else{
			redirect('inactive');
		}
	}

	public function profile(){
		$data['title'] = "PBL- Profile";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$this->load->view('templates/dashboard/head', $data);

		if($data['getUser']->status == 'active'){

			$this->form_validation->set_rules('firstname', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));
			
			if($this->form_validation->run()){
				$thumbnail = $data['getUser']->profile;
				$file = $_FILES["Image-1"];
				if(!empty($file['name'])) {
					if($data['getUser']->profile == 'user.png'){
					}else{
						deleteImage('assets/images/profile/',$data['getUser']->profile);
					}
					$config['upload_path']   = 'assets/images/profile/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size']      = 5000000; // 5mb
					$config['file_name']     = time() . '_' . rand();
					$this->load->library('upload', $config);
					$this->upload->do_upload('Image-1');
					$thumbnails = $this->upload->data();
					$thumbnail = $thumbnails['file_name'];
				}
				$this->UserModel->update($data = array(
					'firstname' => htmlspecialchars($this->input->post('firstname')),
					'lastname' => htmlspecialchars($this->input->post('lastname')),
					'profile' => $thumbnail,
					'userid' => $_SESSION['id_user']
				),$detail = array (
					'alamat' => htmlspecialchars($this->input->post('alamat')),
					'no_telpon' => htmlspecialchars($this->input->post('telpon')),
					'slogan' => htmlspecialchars($this->input->post('slogan')),
					'deskripsi' => htmlspecialchars($this->input->post('deskripsi')),
					'whatsapp' => htmlspecialchars($this->input->post('whatsapp')),
					'facebook' => htmlspecialchars($this->input->post('facebook')),
					'instagram' => htmlspecialchars($this->input->post('instagram')),
					'twitter' => htmlspecialchars($this->input->post('twitter')),
					'lingkedin' => htmlspecialchars($this->input->post('linkedin'))
				));
				$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
					title: "Berhasil",
					text: "Data di Simpan",
					icon: "success",})</script>'
				);
				redirect('profile');
			}else{
				$data['page'] = 'profile';
				$data['dataUser'] = $this->UserModel->getById($_SESSION['id_user']);
				$data['detailUser'] = $this->UserModel->getDetailUser($_SESSION['id_user']);
				if($data['getUser']->role == 'pengguna'){
					$data['sidebar'] = $this->load->view('templates/dashboard/sidebarMahasiswa', $data, true);
				}elseif($data['getUser']->role == 'dosen'){
					$data['sidebar'] = $this->load->view('templates/dashboard/sidebarPengguna', $data, true);
				}
				$this->load->view('templates/dashboard/navbar', $data);
				$this->load->view('pages/dashboard/profile', $data);
				$this->load->view('templates/dashboard/footer');
			}
		}else{
			redirect('inactive');
		}
	}
	
	public function inactive(){
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$this->load->view('templates/dashboard/head', $data);
		if($data['getUser']->status == 'suspend'){
			$data['title'] = "The Truth - Suspend";
			$this->load->view('templates/dashboard/navbar', $data);
			$data['logo'] = base_url('assets/images/logo/logos/ywdh.gif');
			$data['pesan'] = "Email Kamu Telah di Suspend Oleh Admin";
			$data['button'] = "Hubungi Admin";
			$data['url'] = base_url('kontak');
			$url = base_url('kontak');
			$data['text'] = 'Akun Telah di Suspend';
			$this->load->view('pages/dashboard/suspend', $data);
		}elseif($data['getUser']->status == 'blocked'){
			$data['title'] = "The Truth - Blocked";
			$this->load->view('templates/dashboard/navbar', $data);
			$data['text'] = 'Akun Telah di Blokir';
			$data['button'] = "Hubungi Admin";
			$data['url'] = base_url('kontak');
			$url = base_url('kontak');
			$data['pesan'] = "Maaf Akun Anda Telah di Blokir Oleh Admin dengan Alasan Melanggar Ketentuan Pengguna";
			$data['logo'] = base_url('assets/images/logo/logos/ywdh.gif');
			$this->load->view('pages/dashboard/suspend', $data);
		}elseif($data['getUser']->status == 'active'){
			redirect('dashboard');
		}
	}
	
	public function logout(){
		session_destroy();
		redirect('/');
	}

	public function dosenPengampuh(){
		$key = $this->input->get("key");
		$sug = $this->UserModel->getDosen($key);
		$data = array();
		foreach($sug->result() as $item){
			$row = array();
			$row = array(
				'suggestion' => $item->firstname.' '.$item->lastname,
				'userid' => $item->userid
			);
			$data[] = $row;
		}
		$output = array(
			'data' => $data
		);
        echo json_encode($output);
	}
	public function checkJudul()
	{
		$teksInput = strtolower($this->input->get('key')); // Mengubah teks input menjadi huruf kecil
		$semuaJudulJurnal = $this->VidioModel->getSemuaJudulVidio();
		$hasilPerbandingan = [];
		$dataSama = false; // Variabel flag
	
		foreach ($semuaJudulJurnal as $judulJurnal) {
			$judul = strtolower($judulJurnal->judul_pbl); // Mengubah judul jurnal menjadi huruf kecil
			$kemiripan = $this->hitungKemiripan($teksInput, $judul);
	
			if ($kemiripan > 50) { 
				$dataSama = true;
				$hasilPerbandingan[] = [
					'judul' => ucwords($judulJurnal->judul_pbl), // Mengembalikan judul dalam format kapital awal
					'kemiripan' => intval($kemiripan)
				];
			}
		}
		// Urutkan hasil perbandingan berdasarkan kemiripan tertinggi
		usort($hasilPerbandingan, function ($a, $b) {
			return $b['kemiripan'] - $a['kemiripan'];
		});
	
		// Batasi jumlah data yang ditampilkan menjadi maksimal 5
		$hasilPerbandingan = array_slice($hasilPerbandingan, 0, 5);
	
		// Tambahkan variabel flag ke dalam data yang akan dikirimkan
		$response = [
			'data' => $dataSama,
			'hasilPerbandingan' => $hasilPerbandingan
		];
	
		// Mengembalikan data dalam format JSON
		echo json_encode($response);
	}

	private function hitungKemiripan($teks1, $teks2)
    {
        similar_text($teks1, $teks2, $percent);
        return $percent;
    }

	public function upload_file() {
		// Check if a file is uploaded
		if (empty($_FILES['file']['name'])) {
			echo json_encode(array("error" => "No file part"));
			http_response_code(400);
			return;
		}
	
		// Get the uploaded file
		$file = $_FILES['file'];
		if ($file['name'] == '') {
			echo json_encode(array("error" => "No selected file"));
			http_response_code(400);
			return;
		}
	
		// Get the current user ID from the session
		$userid = $_SESSION['id_user'];
		if (!$userid) {
			echo json_encode(array("error" => "User not logged in"));
			http_response_code(400);
			return;
		}
	
		// Fetch user details from the database
		$user_details = $this->db->get_where('users', array('userid' => $userid))->row_array();
	
		// If user details are found and a profile picture exists
		if ($user_details && isset($user_details['profile'])) {
			$current_profile_pic = $user_details['profile'];
			if ($current_profile_pic != "polimdo.png") {
				$current_profile_pic_path = FCPATH . 'assets/images/profile/' . $current_profile_pic;
				if (file_exists($current_profile_pic_path)) {
					unlink($current_profile_pic_path);
				}
			}
		}
	
		// Load the string helper
		$this->load->helper('string');
	
		// Generate a new filename
		$random_string = random_string('alnum', 16);
		$timestamp = date("YmdHis");
		$file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
		$new_filename = $random_string . '_' . $timestamp . '.' . $file_extension;
	
		// Configure the file upload settings
		$config['upload_path'] = FCPATH . 'assets/images/profile/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['file_name'] = $new_filename;
		$config['overwrite'] = true; // Overwrite existing files
	
		// Load the upload library with the config settings
		$this->load->library('upload', $config);
	
		// Try to upload the file
		if (!$this->upload->do_upload('file')) {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
			http_response_code(400);
			return;
		}
	
		// Update the user's profile picture in the database
		$this->db->update('users', array('profile' => $new_filename), array('userid' => $userid));
		$img = base_url('assets/images/profile/'.$new_filename);
		// Return a success response	
		echo json_encode(array("message" => "Profile Berhasil di Ganti", "img" => $img));
	}
	

}
