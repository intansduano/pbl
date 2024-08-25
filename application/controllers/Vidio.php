<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vidio extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->model(['AuthModel','VidioModel','UserModel','HomepageModel']);

		// jika belum login, tdk bisa kesini
		if (!isset($_SESSION['logged_in'])) {
			redirect('/');
		}
	}

	public function index(){
		$data['title'] = "PBL - video";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$this->load->view('templates/dashboard/head', $data);

		if($data['getUser']->role != 'pengguna')
			redirect('/');

		if($data['getUser']->status == 'active'){
			$data['page'] = 'vidio';
			$data['sidebar'] = $this->load->view('templates/dashboard/sidebarPengguna', $data, true);
			$this->load->view('templates/dashboard/navbar', $data);
			$this->load->view('pages/dashboard/vidio', $data);
			$this->load->view('templates/dashboard/footer');
		}else{
            redirect('inactive');
		}
	}

	public function grading(){
		$data['title'] = "Penilaian - PBL";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$this->load->view('templates/dashboard/head', $data);

		if($data['getUser']->role != 'dosen')
			redirect('/');

		if($data['getUser']->status == 'active'){
			$data['page'] = 'grading';
			$data['sidebar'] = $this->load->view('templates/dashboard/sidebarPengguna', $data, true);
			$this->load->view('templates/dashboard/navbar', $data);
			$data['grading'] = $this->VidioModel->getAllGradingData();
			$this->load->view('pages/dashboard/grading', $data);
			$this->load->view('templates/dashboard/footer');
		}else{
            redirect('inactive');
		}
	}

	public function review($id){
		$data['title'] = "PBL - Review video";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$this->load->view('templates/dashboard/head', $data);
		$vidio = $this->VidioModel->getVidio($id);

		if($data['getUser']->role != 'reviewer')
			redirect('/');

		if($data['getUser']->status == 'active'){

			$this->form_validation->set_rules('judul', '', 'required', array(
                'required' => 'Tidak boleh kosong',
            ));

            if($this->form_validation->run()){
				$pbl = $this->VidioModel->getVidio($id);

				$this->VidioModel->updatePenilaian($data = array(
					'no_pbl' => $pbl->no_pbl,
					'judul_pbl' => $this->input->post("judul"),
					'profile_mahasiswa' => $this->input->post("profile-mahasiswa"),
					'profile_mitra' => $this->input->post('profile-mitra'),
					'latar_belakang' => $this->input->post('latar-belakang'),
					'langkah_langkah_pbl' => $this->input->post('langkah-langkah'),
					'problem_solving' => $this->input->post('problem-solving'),
					'learning_process_dan_skills' => $this->input->post('learning'),
					'penutup' => $this->input->post('penutup'),
					'pengampuh' => $this->input->post('pengampuh-matakuliah')
				));

				$this->VidioModel->updateKomentar($data = array(
					'no_pbl' => $pbl->no_pbl,
					'judul_pbl' => $this->input->post("komentar-judul"),
					'profile_mahasiswa' => $this->input->post("komentar-profile-mahasiswa"),
					'profile_mitra' => $this->input->post('komentar-profile-mitra'),
					'latar_belakang' => $this->input->post('komentar-latar-belakang'),
					'langkah_langkah_pbl' => $this->input->post('komentar-langkah-pbl'),
					'problem_solving' => $this->input->post('komentar-problem-solving'),
					'learning_process_dan_skills' => $this->input->post('komentar-learning-process'),
					'penutup' => $this->input->post('komentar-penutup'),
					'pengampuh' => $this->input->post('komentar-pengampuh-matakuliah')
				));

				if($this->input->post('judul') == '1' && $this->input->post('profile-mahasiswa') == '1' && $this->input->post('profile-mitra') == '1' && $this->input->post('latar-belakang') == '1' && $this->input->post('langkah-langkah') == '1' && 
				   $this->input->post('problem-solving') == '1' && $this->input->post('learning') == '1' && $this->input->post('penutup') == '1' && $this->input->post('pengampuh-matakuliah') == '1'){
						$this->VidioModel->update($data = array(
							'no_pbl' => $pbl->no_pbl,
							'status' => 'Publish'
						));
				   }else{
					$this->VidioModel->update($data = array(
						'no_pbl' => $pbl->no_pbl,
						'status' => 'Suspend'
					));
				   }
			
				$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
                    title: "Berhasil",
                    text: "Review Berhasil diberikan",
                    icon: "success",})</script>'
                );
                redirect('pbl-review/'.$pbl->slug);
			}else{
				$data['page'] = 'vidio';
				$this->load->view('templates/dashboard/navbar', $data);
				$data['pbl'] = $this->VidioModel->getVidio($id);
				$data['uploader'] = $this->UserModel->getById($data['pbl']->userid);
				$data['penilaian'] = $this->VidioModel->getPenilaian($data['pbl']->no_pbl);
				$data['komentar'] = $this->VidioModel->getKomentar($data['pbl']->no_pbl);
				$data['sidebar'] = $this->load->view('templates/dashboard/sidebarReviewer', $data, true);
				$this->load->view('pages/reviewer/display', $data);
				$this->load->view('templates/dashboard/footer');
			}
		}else{
            redirect('inactive');
		}
	}

	public function edit($id){
		$data['title'] = "PBL - Edit video";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$this->load->view('templates/dashboard/head', $data);
		$vidio = $this->VidioModel->getVidio($id);
	
		// Check user role and redirect if not 'pengguna'
		if($data['getUser']->role != 'pengguna') {
			redirect('/');
		}
	
		// Check if user owns the video and redirect if not
		if($vidio->userid != $_SESSION['id_user']){
			redirect('/');
		} 
	
		// Proceed if user is active
		if($data['getUser']->status == 'active'){
			$this->form_validation->set_rules('artikel-title', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));
			$this->form_validation->set_rules('artikel-deskripsi-1', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));  
			$this->form_validation->set_rules('link', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));
	
			if($this->form_validation->run()) {
				$thumbnail = $vidio->sampul;
				$mediaFileName = $vidio->media; // Initialize with existing media filename
	
				$file = $_FILES["Image-1"];
				$media = $_FILES["media"];
	
				$this->load->library('upload'); // Load the upload library once
	
				// Handle thumbnail upload
				if (!empty($file['name'])) {
					deleteImage('assets/images/thumbnail/', $vidio->sampul);
	
					$config = array(
						'upload_path'   => 'assets/images/thumbnail/',
						'allowed_types' => 'jpg|png|jpeg',
						'max_size'      => 5000000, // 5MB
						'file_name'     => time() . '_' . rand(),
					);
					$this->upload->initialize($config);
	
					if ($this->upload->do_upload('Image-1')) {
						$thumbnails = $this->upload->data();
						$thumbnail = $thumbnails['file_name'];
					} else {
						// Handle upload error for thumbnail
						$error = $this->upload->display_errors();
						// Handle the error as needed, e.g., set a flash message
					}
				}
	
				// Handle media upload
				if (!empty($media['name'])) {
					deleteImage('assets/file/media/', $vidio->media);
	
					$config = array(
						'upload_path'   => 'assets/file/media/',
						'allowed_types' => 'pdf|jpg|png|jpeg',
						'max_size'      => 5000000, // 5MB
						'file_name'     => time() . '_' . rand(),
					);
					$this->upload->initialize($config);
	
					if ($this->upload->do_upload('media')) {
						$mediaData = $this->upload->data();
						$mediaFileName = $mediaData['file_name'];
					} else {
						// Handle upload error for media
						$error = $this->upload->display_errors();
						// Handle the error as needed, e.g., set a flash message
					}
				}
	
				$slug1 = slug_seo(htmlspecialchars($this->input->post('artikel-title')));
				$slug = ($slug1 == $vidio->slug) ? $vidio->slug : $this->VidioModel->cekSlug($slug1);
	
				$this->VidioModel->update(array(
					'no_pbl' => $vidio->no_pbl,
					'slug' => $slug,
					'judul_pbl' => htmlspecialchars($this->input->post('artikel-title')),
					'jurusan' => htmlspecialchars($this->input->post('artikel-kategori')),
					'sampul' => $thumbnail,
					'media' => $mediaFileName,
					'deskripsi' => htmlspecialchars($this->input->post('artikel-deskripsi-1')),
					'link' => htmlspecialchars($this->input->post('link')),
					'nama_mitra' => htmlspecialchars($this->input->post('nama-mitra')),
					'dosen_pengampuh_mk' => htmlspecialchars($this->input->post('input-dosen-pengampuh'))
				));
	
				$jumlahMahasiswa = intval(htmlspecialchars($this->input->post('jumlah-mahasiswa')));
				for ($i = 1; $i <= $jumlahMahasiswa; $i++) {
					$this->VidioModel->updateMahasiswa(array(
						'nim' => htmlspecialchars($this->input->post('nim-mahasiswa-'.$i)),
						'nama' => htmlspecialchars($this->input->post('nama-mahasiswa-'.$i)),
						'prodi' => htmlspecialchars($this->input->post('program-studi-'.$i)),
						'no' => htmlspecialchars($this->input->post('no-'.$i)),
					)); 
				}
	
				$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
					title: "Berhasil",
					text: "Data Vidio diSimpan",
					icon: "success",})</script>'
				);
				redirect('pbl-edit/'.$slug);
			} else {
				$data['page'] = 'vidio';
				$this->load->view('templates/dashboard/navbar', $data);
				$data['pbl'] = $this->VidioModel->getVidio($id);
				$data['mahasiswa'] = $this->VidioModel->getMahasiswa($data['pbl']->no_pbl);
				$data['jumlah'] = $this->VidioModel->getJumlahMahasiswa($data['pbl']->no_pbl);
				$data['index'] = 1;
				if ($data['pbl']->status == 'Publish') {
					$data['status'] = "Diterima";
				} elseif ($data['pbl']->status == 'Suspend') {
					$data['status'] = "Ditolak";
				} elseif ($data['pbl']->status == 'Pending') {
					$data['status'] = "Belum Ditinjau";
				}
				$data['penilaian'] = $this->VidioModel->getPenilaian($data['pbl']->no_pbl);
				$data['komentar'] = $this->VidioModel->getKomentar($data['pbl']->no_pbl);
				$data['pembina'] = $this->UserModel->getById($data['pbl']->dosen_pengampuh_mk);
				$data['sidebar'] = $this->load->view('templates/dashboard/sidebarMahasiswa', $data, true);
				$this->load->view('pages/dashboard/edit', $data);
				$this->load->view('templates/dashboard/footer');
			}
		} else {
			redirect('inactive');
		}
	}
	
	public function addVidio(){
		$data['title'] = "PBL - Tambah video";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$this->load->view('templates/dashboard/head', $data);
	
		// Check role and redirect if not 'pengguna'
		if($data['getUser']->role != 'pengguna') {
			redirect('/');
		}
	
		// Check status and proceed if 'active'
		if($data['getUser']->status == 'active') {
			$this->form_validation->set_rules('artikel-title', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));
			
			$this->form_validation->set_rules('artikel-deskripsi-1', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));
	
			$this->form_validation->set_rules('link', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));
	
			$this->form_validation->set_rules('Image-1', '', 'callback_checkThumbnail');
	
			if($this->form_validation->run()) {
				// Load the upload library once
				$this->load->library('upload');
	
				// Upload thumbnail
				$thumbnailConfig = array(
					'upload_path'   => 'assets/images/thumbnail/',
					'allowed_types' => 'jpg|png|jpeg',
					'max_size'      => 5000000, // 5MB
					'file_name'     => time() . '_' . rand(),
				);
				$this->upload->initialize($thumbnailConfig);
				$this->upload->do_upload('Image-1');
				$thumbnail = $this->upload->data();
	
				// Upload media (PDF or other allowed types)
				$mediaConfig = array(
					'upload_path'   => 'assets/file/media/',
					'allowed_types' => 'pdf|jpg|png|jpeg',
					'max_size'      => 5000000, // 5MB
					'file_name'     => time() . '_' . rand(),
				);
				$this->upload->initialize($mediaConfig);
				$this->upload->do_upload('media');
				$media = $this->upload->data();
	
				$slug1 = slug_seo(htmlspecialchars($this->input->post('artikel-title')));
				$slug = $this->VidioModel->cekSlug($slug1);
	
				$noArtikel = rand(1, 999900) . '-' . time();
				$countDetail = intval(htmlspecialchars($this->input->post('element')));
	
				$this->VidioModel->add(array(
					'no_pbl' => $noArtikel,
					'slug' => $slug,
					'judul_pbl' => htmlspecialchars($this->input->post('artikel-title')),
					'userid' => $_SESSION['id_user'],
					'jurusan' => htmlspecialchars($this->input->post('artikel-kategori')),
					'sampul' => $thumbnail['file_name'],
					'media' => $media['file_name'],
					'status' => 'Pending',
					'deskripsi' => htmlspecialchars($this->input->post('artikel-deskripsi-1')),
					'link' => htmlspecialchars($this->input->post('link')),
					'nama_mitra' => htmlspecialchars($this->input->post('nama-mitra')),
					'dosen_pengampuh_mk' => htmlspecialchars($this->input->post('dosen-pengampuh'))
				));
	
				$jumlahMahasiswa = intval(htmlspecialchars($this->input->post('jumlah-mahasiswa')));
				$dataUser = $this->UserModel->getById($_SESSION['id_user']);
				for ($i = 1; $i <= $jumlahMahasiswa; $i++) {
					$this->VidioModel->addMahasiswa(array(
						'no_pbl' => $noArtikel,
						'nim' => htmlspecialchars($this->input->post('nim-mahasiswa-' . $i)),
						'nama' => htmlspecialchars($this->input->post('nama-mahasiswa-' . $i)),
						'prodi' => htmlspecialchars($this->input->post('program-studi-' . $i)),
						'profile' => $dataUser->profile
					));    
				}
	
				$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
					title: "Berhasil",
					text: "Vidio Telah dibuat",
					icon: "success",})</script>'
				);
				redirect('add-vidio');
			} else {
				$data['page'] = 'add-vidio';
				$data['sidebar'] = $this->load->view('templates/dashboard/sidebarMahasiswa', $data, true);
				$this->load->view('templates/dashboard/navbar', $data);
				$this->load->view('pages/dashboard/add', $data);
				$this->load->view('templates/dashboard/footer');
			}
		} else {
			redirect('inactive');
		}
	}
	

	public function checkThumbnail($str){
		$allowed_mime_type_arr = array('image/jpeg', 'image/png');
		$mime = get_mime_by_extension($_FILES['Image-1']['name']);
		$maxsize = 5000000; // 5 mb

		if (isset($_FILES['Image-1']['name']) && $_FILES['Image-1']['name'] != "") {
			if (in_array($mime, $allowed_mime_type_arr)) {
				if ($_FILES['Image-1']['size'] >= $maxsize) {
					$this->form_validation->set_message('checkThumbnail', 'Terlalu besar. Maximal 5 MB');
					return false;
				}else{
					return true;
				}
			}else{
				$this->form_validation->set_message('checkThumbnail', 'Harus berupa jpg atau png');
				return false;
			}
		}else{
			$this->form_validation->set_message('checkThumbnail', 'Tidak boleh kosong');
			return false;
		}
	}

	public function getSimilarVidio(){
		$jurusan = htmlspecialchars($this->input->get('jurusan'));
		$listVidio = $this->VidioModel->getSimilarVidio($jurusan);
		$data = array();
		foreach($listVidio->result() as $item){
			$img = base_url('assets/images/thumbnail/'.$item->sampul);
			$urlSelengkapnya = base_url('project-base-learning/'.$item->slug);
			$deskripsi = html_entity_decode($item->deskripsi);
			if($item->nilai == 0){
				$keterangan = "
				<div class='text-black bg-yellow-500 text-white w-28 ml-3 border-gray-800 rounded-full px-1 pt-2 font-semibold text-center'>Belum dinilai</div>
				";
			}else{
				$keterangan = "
				<div class='text-white bg-red-500 text-white w-20 ml-3 border-gray-800 rounded-full px-1 pt-2 font-semibold text-center'>$item->nilai/100</div>
				";
			}
			$row = array();
            $row = array(
				'judul' => $item->judul_pbl,
				'img' => $img,
				'tanggal' => tanggal($item->tanggal),
				'kategori' => $item->jurusan,
				'urlselengkapnya' => $urlSelengkapnya,
				'like' => $item->jumlah_like,
				'view' => $item->jumlah_view,
				'nama' => $item->nama_mahasiswa,
				'deskripsi' => $deskripsi,
				'nilai' => $keterangan
            );
            $data[] = $row;
		}
		
		$output = array(
	        "data" => $data
	    );
        echo json_encode($output);
	}

	public function getGradingDetail(){
		$pbl = $this->input->get('no');
		$dataPbl = $this->VidioModel->getGradingDetail($pbl);
		$student = $this->VidioModel->getGradingStudent($pbl);
		$data = array();
		foreach($student->result() as $item){
			$row = array();
            $row = array(
				'nama' => $item->nama,
				'nim' => $item->nim,
				'prodi' => $item->prodi,
            );
            $data[] = $row;
		}
		$output = array(
	        'judul' =>  $dataPbl->judul_pbl,
			'nilai' => $dataPbl->nilai,
			'siswa' => $data,
			'pbl' => $pbl,
			'feedback' => $dataPbl->feedback
	    );
        echo json_encode($output);
	}

	public function updateNilai(){
		$pbl = $this->input->post("pbl");
		$nilai = $this->input->post("nilai");
		$feedback = $this->input->post("feedback");
		$this->VidioModel->updateNilai($pbl,$nilai,$feedback);
		$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
			title: "Berhasil",
			text: "Nilai diberikan",
			icon: "success",})</script>'
		);
		redirect('dashboard');
	}

	public function updateNilai2(){
		$pbl = $this->input->post("pbl");
		$nilai = $this->input->post("nilai");
		$this->VidioModel->updateNilai($pbl,$nilai);
		$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
			title: "Berhasil",
			text: "Nilai diberikan",
			icon: "success",})</script>'
		);
		redirect('grading');
	}

	public function getVidio(){
		$listVidio = $this->VidioModel->getVidioPengguna();
		$data = array();
		foreach($listVidio->result() as $item){
			$img = base_url('assets/images/thumbnail/'.$item->sampul);
			$urlSelengkapnya = base_url('project-base-learning/'.$item->slug);
			$urlEditing = base_url('pbl-edit/'.$item->slug);
			$deskripsi = html_entity_decode($item->deskripsi);
			if($item->nilai == 0){
				$keterangan = "
				<button onclick='openModal(`$item->no_pbl`)' class='text-black bg-yellow-500 text-white w-28 ml-3 border-gray-800 rounded-full px-1 font-semibold text-center'>Belum dinilai</button>
				";
			}else{
				$keterangan = "
				<button onclick='openModal(`$item->no_pbl`)' class='text-white bg-red-500 text-white w-20 ml-3 border-gray-800 rounded-full px-1 font-semibold text-center'>$item->nilai/100</button>
				";
			}
			$row = array();
            $row = array(
				'judul' => $item->judul_pbl,
				'img' => $img,
				'tanggal' => tanggal($item->tanggal),
				'kategori' => $item->jurusan,
				'urlediting' => $urlEditing,
				'urlselengkapnya' => $urlSelengkapnya,
				'like' => $item->jumlah_like,
				'view' => $item->jumlah_view,
				'nama' => $item->nama_mahasiswa,
				'deskripsi' => $deskripsi,
				'nilai' => $keterangan
            );
            $data[] = $row;
		}
		
		$output = array(
	        "data" => $data
	    );
        echo json_encode($output);
	}

	public function getVidioMahasiswa(){
		$listVidio = $this->VidioModel->getVidioPenggunaMahasiswa();
		$data = array();
		foreach($listVidio->result() as $item){
			$img = base_url('assets/images/thumbnail/'.$item->sampul);
			$urlSelengkapnya = base_url('project-base-learning/'.$item->slug);
			$urlEditing = base_url('pbl-edit/'.$item->slug);
			$deskripsi = html_entity_decode($item->deskripsi);
			if($item->status == 'Publish'){
				$color = "green";
				$text = "Diterima";
			}elseif($item->status == 'Suspend'){
				$color = "red";	
				$text = "Ditolak";
			}elseif($item->status == 'Pending'){
				$color = "yellow";
				$text = "Belum Ditinjau";
			}
			$url = base_url('pbl-edit/'.$item->slug);
			$keterangan = "
			<button onclick='window.location.href=`$url`' class='bg-$color-500 text-white w-28 ml-3 border-gray-800 rounded-full px-1 font-semibold text-center'>$text</button>
			";
			$row = array();
            $row = array(
				'judul' => $item->judul_pbl,
				'img' => $img,
				'tanggal' => tanggal($item->tanggal),
				'kategori' => $item->jurusan,
				'urlediting' => $urlEditing,
				'urlselengkapnya' => $urlSelengkapnya,
				'like' => $item->jumlah_like,
				'view' => $item->jumlah_view,
				'nama' => $item->nama_mahasiswa,
				'deskripsi' => $deskripsi,
				'nilai' => $keterangan
            );
            $data[] = $row;
		}
		
		$output = array(
	        "data" => $data
	    );
        echo json_encode($output);
	}

	public function getPrivateVidio(){
		$listVidio = $this->VidioModel->getVidioPrivate();
		$data = array();
		foreach($listVidio->result() as $item){
			$img = base_url('assets/images/thumbnail/'.$item->sampul);
			$urlSelengkapnya = base_url('project-base-learning/'.$item->slug);
			$urlEditing = base_url('pbl-edit/'.$item->slug);
			$deskripsi = html_entity_decode($item->deskripsi);
			if($item->status == 'Publish'){
				$color = "green";
				$text = "Diterima";
			}elseif($item->status == 'Suspend'){
				$color = "red";	
				$text = "Ditolak";
			}elseif($item->status == 'Pending'){
				$color = "yellow";
				$text = "Belum Ditinjau";
			}
			$url = base_url('pbl-review/'.$item->slug);
				$keterangan = "
				<button onclick='window.location.href=`$url`' class='bg-$color-500 text-white w-28 ml-3 border-gray-800 rounded-full px-1 font-semibold text-center'>$text</button>
				";
			$row = array();
            $row = array(
				'judul' => $item->judul_pbl,
				'img' => $img,
				'tanggal' => tanggal($item->tanggal),
				'kategori' => $item->jurusan,
				'urlediting' => $urlEditing,
				'urlselengkapnya' => $urlSelengkapnya,
				'like' => $item->jumlah_like,
				'view' => $item->jumlah_view,
				'nama' => $item->nama_mahasiswa,
				'deskripsi' => $deskripsi,
				'nilai' => $keterangan
            );
            $data[] = $row;
		}
		
		$output = array(
	        "data" => $data
	    );
        echo json_encode($output);
	}

	public function getVidioJurusan(){
		$listVidio = $this->VidioModel->getVidioJurusan();
		$data = array();
		foreach($listVidio->result() as $item){
			$img = base_url('assets/images/thumbnail/'.$item->sampul);
			$urlSelengkapnya = base_url('project-base-learning/'.$item->slug);
			$urlEditing = base_url('pbl-edit/'.$item->slug);
			$deskripsi = html_entity_decode($item->deskripsi);
			if ($item->nilai >= 81  && $item->nilai < 100) {
				$color = "green";
				$text = $item->nilai;
				$title = "Nilai Project: " . $item->nilai . ' Point';
			} elseif ($item->nilai >= 66  && $item->nilai < 81) {
				$color = "red";
				$text = $item->nilai;
				$title = "Nilai Project: " . $item->nilai . ' Point';
			} elseif ($item->nilai >= 56 && $item->nilai < 66) {
				$color = "yellow";
				$text = $item->nilai;
				$title = "Nilai Project: " . $item->nilai . ' Point';
			} elseif ($item->nilai < 56 && $item->nilai != 0) {
				$color = "orange";
				$text = $item->nilai;
				$title = "Nilai Project: " . $item->nilai . ' Point';
			} elseif ($item->nilai == 0) {
				$color = "yellow";
				$text = $item->nilai;
				$title = "Project Belum diNilai";
			}
			
			$url = base_url('pbl-review/'.$item->slug);
				$keterangan = "
				<button title='$title' class='bg-$color-500 text-white w-80 ml-3 border-gray-800 rounded-full px-2 font-semibold text-center'>$text</button>
				";
			$row = array();
            $row = array(
				'judul' => $item->judul_pbl,
				'img' => $img,
				'tanggal' => tanggal($item->tanggal),
				'kategori' => $item->jurusan,
				'urlediting' => $urlEditing,
				'urlselengkapnya' => $urlSelengkapnya,
				'like' => $item->jumlah_like,
				'view' => $item->jumlah_view,
				'nama' => $item->nama_mahasiswa,
				'deskripsi' => $deskripsi,
				'nilai' => $keterangan
            );
            $data[] = $row;	
		}
		
		$output = array(
	        "data" => $data
	    );
        echo json_encode($output);
	}

	public function getVidioUser(){
		$userid = htmlspecialchars($this->input->get('userid'));
		$listVidio = $this->VidioModel->getVidioUser($userid);
		$data = array();
		foreach($listVidio->result() as $item){
			$img = base_url('assets/images/thumbnail/'.$item->sampul);
			$urlSelengkapnya = base_url('project-base-learning/'.$item->slug);
			$row = array();
            $row = array(
				'judul' => $item->judul_pbl,
				'img' => $img,
				'tanggal' => tanggal($item->tanggal),
				'kategori' => $item->jurusan,
				'urlselengkapnya' => $urlSelengkapnya,
				'like' => $item->jumlah_like,
				'view' => $item->jumlah_view,
				'comment' => $item->jumlah_komentar
            );
            $data[] = $row;
		}
		
		$output = array(
	        "data" => $data
	    );
        echo json_encode($output);
	}

	public function searchUserVidio(){
		$key = htmlspecialchars($this->input->get('key'));
		$listVidio = $this->VidioModel->getSearchVidio($key);
		$data = array();
		foreach($listVidio->result() as $item){
			$img = base_url('assets/images/thumbnail/'.$item->sampul);
			$urlSelengkapnya = base_url('project-base-learning/'.$item->slug);
			$urlEditing = base_url('pbl-edit/'.$item->slug);
			$deskripsi = html_entity_decode($item->deskripsi);
			if($item->nilai == 0){
				$keterangan = "
				<button onclick='openModal(`$item->no_pbl`)' class='text-black bg-yellow-500 text-white w-28 ml-3 border-gray-800 rounded-full px-1 font-semibold text-center'>Belum dinilai</button>
				";
			}else{
				$keterangan = "
				<button onclick='openModal(`$item->no_pbl`)' class='text-white bg-red-500 text-white w-20 ml-3 border-gray-800 rounded-full px-1 font-semibold text-center'>$item->nilai/100</button>
				";
			}
			$row = array();
            $row = array(
				'judul' => $item->judul_pbl,
				'img' => $img,
				'tanggal' => tanggal($item->tanggal),
				'kategori' => $item->jurusan,
				'urlselengkapnya' => $urlSelengkapnya,
				'urlediting' => $urlEditing,
				'like' => $item->jumlah_like,
				'view' => $item->jumlah_view,
				'comment' => $item->jumlah_komentar,
				'nama' => $item->nama_mahasiswa,
				'deskripsi' => $deskripsi,
				'nilai' => $keterangan
            );
            $data[] = $row;
		}
		
		$output = array(
	        "data" => $data
	    );
        echo json_encode($output);
	}

	public function searchUserVidioMahasiswa(){
		$key = htmlspecialchars($this->input->get('key'));
		$listVidio = $this->VidioModel->getSearchVidioMahasiswa($key);
		$data = array();
		foreach($listVidio->result() as $item){
			$img = base_url('assets/images/thumbnail/'.$item->sampul);
			$urlSelengkapnya = base_url('project-base-learning/'.$item->slug);
			$urlEditing = base_url('pbl-edit/'.$item->slug);
			$deskripsi = html_entity_decode($item->deskripsi);
			if($item->nilai == 0){
				$keterangan = "
				<button onclick='openModal(`$item->no_pbl`)' class='text-black bg-yellow-500 text-white w-28 ml-3 border-gray-800 rounded-full px-1 font-semibold text-center'>Belum dinilai</button>
				";
			}else{
				$keterangan = "
				<button onclick='openModal(`$item->no_pbl`)' class='text-white bg-red-500 text-white w-20 ml-3 border-gray-800 rounded-full px-1 font-semibold text-center'>$item->nilai/100</button>
				";
			}
			$row = array();
            $row = array(
				'judul' => $item->judul_pbl,
				'img' => $img,
				'tanggal' => tanggal($item->tanggal),
				'kategori' => $item->jurusan,
				'urlselengkapnya' => $urlSelengkapnya,
				'urlediting' => $urlEditing,
				'like' => $item->jumlah_like,
				'view' => $item->jumlah_view,
				'comment' => $item->jumlah_komentar,
				'nama' => $item->nama_mahasiswa,
				'deskripsi' => $deskripsi,
				'nilai' => $keterangan
            );
            $data[] = $row;
		}
		
		$output = array(
	        "data" => $data
	    );
        echo json_encode($output);
	}

	public function searchVidioJurusan(){
		$key = htmlspecialchars($this->input->get('key'));
		$listVidio = $this->VidioModel->getSearchVidioJurusan($key);
		$data = array();
		foreach($listVidio->result() as $item){
			$img = base_url('assets/images/thumbnail/'.$item->sampul);
			$urlSelengkapnya = base_url('project-base-learning/'.$item->slug);
			$urlEditing = base_url('pbl-edit/'.$item->slug);
			$deskripsi = html_entity_decode($item->deskripsi);
			if ($item->nilai >= 81  && $item->nilai < 100) {
				$color = "green";
				$text = $item->nilai;
				$title = "Nilai Project: " . $item->nilai . ' Point';
			} elseif ($item->nilai >= 66  && $item->nilai < 81) {
				$color = "red";
				$text = $item->nilai;
				$title = "Nilai Project: " . $item->nilai . ' Point';
			} elseif ($item->nilai >= 56 && $item->nilai < 66) {
				$color = "yellow";
				$text = $item->nilai;
				$title = "Nilai Project: " . $item->nilai . ' Point';
			} elseif ($item->nilai < 56 && $item->nilai != 0) {
				$color = "orange";
				$text = $item->nilai;
				$title = "Nilai Project: " . $item->nilai . ' Point';
			} elseif ($item->nilai == 0) {
				$color = "yellow";
				$text = $item->nilai;
				$title = "Project Belum diNilai";
			}
			
			$url = base_url('pbl-review/'.$item->slug);
				$keterangan = "
				<button title='$title' class='bg-$color-500 text-white w-80 ml-3 border-gray-800 rounded-full px-2 font-semibold text-center'>$text</button>
				";
			$row = array();
            $row = array(
				'judul' => $item->judul_pbl,
				'img' => $img,
				'tanggal' => tanggal($item->tanggal),
				'kategori' => $item->jurusan,
				'urlediting' => $urlEditing,
				'urlselengkapnya' => $urlSelengkapnya,
				'like' => $item->jumlah_like,
				'view' => $item->jumlah_view,
				'nama' => $item->nama_mahasiswa,
				'deskripsi' => $deskripsi,
				'nilai' => $keterangan
            );
            $data[] = $row;	
		}
		
		$output = array(
	        "data" => $data
	    );
        echo json_encode($output);
	}

	public function likes(){
		$noArtikel = htmlspecialchars($this->input->post('artikel'));
		$like = $this->VidioModel->likes($noArtikel);
		$liked = $this->HomepageModel->changeLiked($noArtikel);
		
		$output = array(
	        "like" => $like,
			"liked" => $liked
	    );
        echo json_encode($output);
	}
	
	public function sendComment(){
		$noPBL = htmlspecialchars($this->input->post('pbl'));
		$comment = htmlspecialchars($this->input->post('comment'));
		$id = rand()."-". time();

		$this->VidioModel->addComment($data = array(
			'id_comment' => $id,
			'userid' => $_SESSION['id_user'],
			'isi' => $comment,
			'no_pbl' => $noPBL
		));

        echo json_encode("Hello");

	}

	public function showComment($id){
		$list = $this->VidioModel->getComment($id);
		$data = array();
        foreach($list->result() as $comment){
			$dataUser = $this->UserModel->getById($comment->userid);
			$profile = base_url('assets/images/profile/'.$dataUser->profile);

			$row = array();
            $row = array(
                'id_comment' => $comment->id_comment,
                'nama_pengguna' => $dataUser->firstname.' '.$dataUser->lastname,
				'tanggal' => tanggal($comment->tanggal),
				'isi' => $comment->isi,
				'profile' => $profile
            ); 

            $data[] = $row;
		}

		$output = array(
			'data' => $data
		);

        echo json_encode($output);
	}

	public function deleteComment()
	{
		$id_comment = $this->input->post('id_comment');
		$user_id = $_SESSION['id_user'];
		$no_pbl = $this->input->post('no_pbl');
		$user_id = $_SESSION['id_user'];
		log_message('debug', 'deleteComment dipanggil dengan id_comment: ' . $id_comment . ' oleh user_id: ' . $user_id);

		// Ambil data komentar berdasarkan id_comment
		$comment = $this->VidioModel->getComment($no_pbl, $id_comment);

		if ($comment && $comment->userid == $user_id) {
			// Hanya pengguna yang membuat komentar bisa menghapusnya
			$result = $this->VidioModel->deleteComment($id_comment);

			if ($result) {
				echo json_encode(['success' => true]);
			} else {
				echo json_encode(['success' => false, 'message' => 'Gagal menghapus komentar.']);
			}
		} else {
			// Pengguna tidak diizinkan menghapus komentar ini
			echo json_encode(['success' => false, 'message' => 'Anda tidak diizinkan menghapus komentar ini.']);
		}
	}

	public function extractLink(){
		$link = $this->input->post("link");
		// $link = "<iframe width='560' height='315' src='https://www.youtube.com/embed/NZGHXy1IAHM?si=qyAoxb3Bw0HYECiC' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>";
		$output = "";
		// Buat objek DOMDocument
		$dom = new DOMDocument();

		// Muat teks HTML ke dalam objek DOMDocument
		$dom->loadHTML($link);

		// Dapatkan semua elemen iframe
		$iframes = $dom->getElementsByTagName('iframe');

		// Ambil atribut src dari elemen iframe pertama
		if ($iframes->length > 0) {
			$src = $iframes->item(0)->getAttribute('src');
			$output = $src;
		} else {
			$output = "Link Tidak Ditemukan";
		}
        echo json_encode($output);
	}

}
