<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$_SESSION['page'] = 'home';
		$this->load->model(['HomepageModel','UserModel','VidioModel','AuthModel']);
	}

	public function testing($id){
		
	}

	public function index(){
		$data['title'] = "PBL - Homepage";
		$_SESSION['page'] = 'home';
		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);
		$this->load->view('pages/homepage');
		$this->load->view('templates/dashboard/footer', $data);
	}

	public function about(){
		$data['title'] = "PBL - About";
		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);
		$this->load->view('pages/homepage/about');
		$this->load->view('templates/dashboard/footer', $data);
	}

	public function panduan(){
		$data['title'] = "PBL - Panduan";
		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);
		$this->load->view('pages/homepage/panduan');
		$this->load->view('templates/dashboard/footer', $data);
	}

	public function user($id){
		$data['title'] = "PBL - User";
		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);
		$data['dataUser'] = $this->UserModel->getByUsername($id);
		$this->load->view('pages/homepage/user', $data);
		$this->load->view('templates/dashboard/footer', $data);
	}

	public function kontak(){
		$data['title'] = "PBL - Kontak";
		$_SESSION['page'] = 'contack';
		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);
		$this->load->view('pages/homepage/kontak');
		$this->load->view('templates/dashboard/footer', $data);
	}

	public function vidios($kategori){
		$data['title'] = "PBL - video";
		$_SESSION['page'] = 'vidio';
		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);
		if($kategori == 'teknik-informatika'){
			$_SESSION['jurusan'] = 'Sarjana Terapan Teknik Informatika';
		}elseif($kategori == 'teknik-listrik'){
			$_SESSION['jurusan'] = 'Sarjana Terapan Teknik Listrik';
		}elseif($kategori == 'teknik-listrik-d3'){
			$_SESSION['jurusan'] = 'Diploma Tiga Teknik Listrik';
		}elseif($kategori == 'teknik-komputer'){
			$_SESSION['jurusan'] = 'Diploma Tiga Teknik Komputer';
		}
		$data['vidiobaru'] = $this->HomepageModel->getVidioBaru();

		$this->load->view('pages/homepage/news',$data);
		$this->load->view('templates/dashboard/footer', $data);
	}

	public function pbl($id){
		$data['pbl'] = $this->HomepageModel->getBySlug($id); 
		// $ipinfo = file_get_contents('http://ipinfo.io');
		// $public_ip = json_decode($ipinfo);
		$public_ip = "";
		$ipInfo = file_get_contents('https://api64.ipify.org?format=json');

		if ($ipInfo !== false) {
			// Mendapatkan data JSON dan mengonversinya ke dalam array PHP
			$ipData = json_decode($ipInfo, true);

			// Mendapatkan alamat IP publik dari array
			$ipInfo = $ipData['ip'];

		} else {
			return "Gagal mendapatkan alamat IP publik.";
		}
	
		$ip = $this->HomepageModel->checkView($public_ip,$data['pbl']->no_pbl);
		if($ip == true){
			$this->HomepageModel->addView($data = array(
				'ip_public' => $public_ip,
				'no_pbl' => $data['pbl']->no_pbl
			));
		}
		$data['title'] = "PBL - video";
		$data['index'] = 1;
		$data['pbl'] = $this->HomepageModel->getBySlug($id); 
		$data['kode'] = $data['pbl']->no_pbl;
		$data['like'] = $this->HomepageModel->getLikes($data['pbl']->no_pbl);
		$data['comment'] = $this->HomepageModel->getComment($data['pbl']->no_pbl);

		if (isSessionDeclared('id_user')) {
			$data['liked'] = $this->HomepageModel->getLiked($data['pbl']->no_pbl);
		} else {
			$data['liked'] = "text-gray-800";
		}
		$data['mahasiswa'] = $this->VidioModel->getMahasiswa($data['pbl']->no_pbl);
		$data['dosen'] = $this->UserModel->getById($data['pbl']->dosen_pengampuh_mk);
		$data['view'] = $this->HomepageModel->getView($data['pbl']->no_pbl);
		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);
		$data['penulis'] = $this->UserModel->getById($data['pbl']->userid);
		$this->load->view('pages/dashboard/display', $data);
		$this->load->view('templates/dashboard/footer', $data);
	}

	public function laporan($id){
		$data['title'] = "Laporan - PBL";
		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);
		$data['detail'] = $this->UserModel->getDetailLaporan($id);
		$data['laporan'] = $this->UserModel->getLaporan($id);
		$data['dosen'] = $this->UserModel->getById($data['detail']->dosen_pengampuh_mk);
		$nilai = $data['detail']->nilai;
		if ($nilai >= 81 && $nilai <= 100) {
			$data['nilai'] = "(A) Amat Baik";
		} elseif ($nilai >= 66 && $nilai <= 80) {
			$data['nilai'] = "(B) Baik";
		} elseif ($nilai >= 56 && $nilai <= 65) {
			$data['nilai'] = "(C) Cukup";
		} elseif ($nilai >= 46 && $nilai <= 55) {
			$data['nilai'] = "(D) Kurang";
		} elseif ($nilai >= 0 && $nilai <= 45) {
			$data['nilai'] = "(E) Sangat Kurang";
		} else {
			$data['nilai'] = "Nilai tidak valid";
		}
		$this->load->view('pages/dashboard/laporan', $data);
		$this->load->view('templates/dashboard/footer', $data);
	}

	public function login(){
		$data['title'] = "PBL - Login";
		$_SESSION['page'] = 'login';
		
		$this->form_validation->set_rules('email', '', 'required', array(
			'required' => 'Tidak boleh kosong'
		));

		$this->form_validation->set_rules('password', '', 'required', array(
			'required' => 'Tidak boleh kosong',
		));

		if($this->form_validation->run()){
			$this->load->model('AuthModel');
			$email = htmlspecialchars($this->input->post('email'));
			$password = htmlspecialchars($this->input->post('password'));

			$cekData = $this->AuthModel->login($email);
			$cekVerified = $this->AuthModel->checkEmailVerified($email);

			if($cekData){
				if (password_verify($password, $cekData->password)) {
						if($cekVerified == 1){
							$_SESSION['id_user'] = $cekData->userid;
							$_SESSION['role'] = $cekData->role;
							$_SESSION['logged_in'] = true;
	
							redirect('/dashboard');
						}else{
							$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
								title: "Gagal",
								text: "Email anda Belum di Verifikasi",
								icon: "error",})</script>'
							);
							redirect('/login');
						}
					}else{
						$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
							title: "Gagal",
							text: "Password yang anda masukkan salah",
							icon: "error",})</script>'
						);
	
						redirect('/login');
					}
				}else{
					$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
						title: "Gagal",
						text: "Email anda tidak terdaftar",
						icon: "error",})</script>'
					);
	
					redirect('/login');
				}
		}else{
			$this->load->view('templates/dashboard/head', $data);
			$this->load->view('templates/dashboard/navbar', $data);
			$this->load->view('pages/homepage/login');
		}

	}

	public function register(){
		$data['title'] = "Registrasi - PBL";
		$_SESSION['page'] = 'login';
		
		$this->form_validation->set_rules('email', '', 'required|is_unique[users.email]', array(
			'required' => 'Tidak boleh kosong',
			'is_unique' => 'Email sudah terdaftar'
		));

		$this->form_validation->set_rules('nim', '', 'required|is_unique[users.username]', array(
			'required' => 'Tidak boleh kosong',
			'is_unique' => 'Nim sudah terdaftar'
		));

		$this->form_validation->set_rules('password', '', 'required', array(
			'required' => 'Tidak boleh kosong',
		));

		if($this->form_validation->run()){
			$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
				title: "Berhasil",
				text: "Silahkan Lakukan Verifikasi Menggunakan pesan yang sudah dikirimkan ke Alamat Email Anda",
				icon: "succes",})</script>'
			);
			$this->load->model(['UserModel']);
            $password = htmlspecialchars(password_hash($this->input->post('password'), PASSWORD_DEFAULT));
			$userid = 'USR'. rand(1,99999). time();
			$email = htmlspecialchars($this->input->post('email'));
			$nim = htmlspecialchars($this->input->post('nim'));
			$teksAsli = rand(1,999999).time();
			$hash = password_hash($teksAsli, PASSWORD_DEFAULT);

			$username = "user".time();
			$base64Hash = base64_encode($hash);

			$token = preg_replace('/[^A-Za-z0-9]/', '', $base64Hash);

			$this->UserModel->add($data = array(
				'userid' => $userid,
				'email' => $email,
				'username' => $nim,
				'password' => $password,
				'token' => $token,
				'status' => 'active',
			),$detail = array(
				'userid' => $userid
			));

			$baseUrl = base_url("/verification/".$token);

            $this->load->library('email');
            $this->email->from('intansariduano@gmail.com', 'Admin PBL');
            $this->email->to($data['email']);
            $this->email->subject('Verifikasi Pendaftaran');
            $this->email->message("
						<body style='font-family: 'Arial', sans-serif; background-color: #f5f5f5; margin: 0; padding: 0;'>

						<div style='max-width: 600px; margin: 0 auto; padding: 20px; background-color: #ffffff; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);'>
							
							<div style='background-color: #3498db; color: #fff; text-align: center; padding: 20px 0;'>
								<h1>Verifikasi Pendaftaran</h1>
							</div>
					
							<div style='padding: 20px; text-align: center;'>
								<h2 style='color: #3498db;'>Verifikasi Pendaftaran Akun PBL</h2>
								<p>Silakan Tekan Tombol Verifikasi di bawah untuk menyelesaikan pendaftaran akun anda.</p>
								
								<div style='text-align: center;'>
								<form action='$baseUrl' method='post'>
									<button style='display: inline-block; padding: 10px 20px; background-color: #3498db; color: #fff; text-decoration: none; font-weight: bold;'>Verifikasi</button>
								</form>
								</div>
							</div>
					
							<div style='background-color: #3498db; color: #fff; text-align: center; font-size: 12px; padding: 10px;'>
								<p>&copy; 2023 Politeknik Negeri Manado. All rights reserved.</p>
							</div>
					
						</div>
					
					</body>
            ");

            if ($this->email->send()) {
		        $this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
                    title: "Berhasil",
                    text: "Silahkan Lakukan Verifikasi Menggunakan pesan yang sudah dikirimkan ke Alamat Email Anda",
                    icon: "succes",})</script>'
                );
            } else {
				$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
                    title: "Gagal",
                    text: "Verifikasi Email tidak dapat dikirim",
                    icon: "error",})</script>'
                );
            }
			redirect('/registrasi');

		}else{
		$this->load->view('templates/dashboard/navbar', $data);
			$this->load->view('templates/dashboard/head', $data);
			$this->load->view('pages/homepage/registrasi');
		}
	}

	public function verification($id){
		$data['title'] = "PBL - Verifikasi";
		$this->load->model(['UserModel']);

		$tokenTerdaftar = $this->UserModel->getBytoken($id);

        if($tokenTerdaftar == 1){
			$data['pesan'] = "Selamat Email Kamu Telah Berhasil Terverifikasi";
			$data['logo'] = base_url('assets/images/logo/logos/cilukba.gif');
			$data['button'] = "Login";
			$data['url'] = base_url('login');
            $this->UserModel->verifyToken(array(
                'verified' => "yes",
                'token' => "$id"
            ));
        }else{
			$data['button'] = "Hubungi Admin";
			$data['url'] = base_url('kontak');
			$url = base_url('kontak');
            $data['pesan'] = "Maaf Token Kamu tidak Terdaftar, jika terjadi masalah silahkan hubungi <a class='text-blue-400' href='$url'>admin</a>";
			$data['logo'] = base_url('assets/images/logo/logos/ywdh.gif');
        }

		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);
		$this->load->view('pages/homepage/verification');
	}

}
