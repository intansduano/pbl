<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(['AuthModel', 'UserModel','AdminModel']);

        if (!isset($_SESSION['logged_in'])) {
            redirect('/');
        }

		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		if($data['getUser']->role != 'admin')
			redirect('/');
	}

	public function editPengguna($userid){
		$data['title'] = "PBL- Edit Pengguna";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$this->load->view('templates/dashboard/head', $data);

		if($data['getUser']->status == 'active'){

			$this->form_validation->set_rules('firstname', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));
			
			if($this->form_validation->run()){
				$thumbnail = $data['getUser']->profile;
				$username = $this->UserModel->cekUsername(htmlspecialchars($this->input->post('username')));
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
					'username' => $username,
					'role' => htmlspecialchars($this->input->post('role')),
					'status' => htmlspecialchars($this->input->post('status')),
					'userid' => $userid
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
				redirect('edit-user/'.$userid);
			}else{
				$data['page'] = 'pengguna';
				$data['dataUser'] = $this->UserModel->getById($userid);
				$data['detailUser'] = $this->UserModel->getDetailUser($userid);
				$data['sidebar'] = $this->load->view('templates/dashboard/sidebarAdmin', $data, true);
				$this->load->view('templates/dashboard/navbar', $data);
				$this->load->view('pages/admin/edit-pengguna', $data);
				$this->load->view('templates/dashboard/footer');
			}
		}else{
			redirect('inactive');
		}
	}

	public function addUser(){
		$data['title'] = "PBL- Profile";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$this->load->view('templates/dashboard/head', $data);

		if($data['getUser']->status == 'active'){

			$this->form_validation->set_rules('firstname', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));
			
			if($this->form_validation->run()){
				$thumbnail = $data['getUser']->profile;
				$username = "user".time();
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
				$userid = 'USR'. rand(1,99999). time();
				$this->UserModel->add($data = array(
					'firstname' => htmlspecialchars($this->input->post('firstname')),
					'lastname' => htmlspecialchars($this->input->post('lastname')),
					'email' => htmlspecialchars($this->input->post('email')),
					'profile' => $thumbnail,
					'username' => $username,
					'password' => htmlspecialchars(password_hash($this->input->post('password'), PASSWORD_DEFAULT)),
					'token' => '-',
					'verified' => 'yes',
					'status' => 'active',
					'userid' => $userid
				),$detail = array (
					'userid' => $userid,
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
				redirect('dashboard');
			}else{
				$data['page'] = 'dashboard';
				$data['sidebar'] = $this->load->view('templates/dashboard/sidebarAdmin', $data, true);
				$this->load->view('templates/dashboard/navbar', $data);
				$this->load->view('pages/admin/add-user', $data);
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
				$data['sidebar'] = $this->load->view('templates/dashboard/sidebarAdmin', $data, true);
				$this->load->view('templates/dashboard/navbar', $data);
				$this->load->view('pages/admin/profile', $data);
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
				$data['sidebar'] = $this->load->view('templates/dashboard/sidebarAdmin', $data, true);
				$this->load->view('templates/dashboard/navbar', $data);
				$this->load->view('pages/admin/changepass', $data);
				$this->load->view('templates/dashboard/footer');
			}
		}else{
			redirect('inactive');
		}
	}

}