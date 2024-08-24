<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviewer extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(['AuthModel', 'UserModel','AdminModel']);

        if (!isset($_SESSION['logged_in'])) {
            redirect('/');
        }

		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		if($data['getUser']->role != 'reviewer')
			redirect('/');
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
				$this->UserModel->update($data = array(
					'firstname' => htmlspecialchars($this->input->post('firstname')),
					'lastname' => htmlspecialchars($this->input->post('lastname')),
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
				redirect('profile-reviewer');
			}else{
				$data['page'] = 'profile';
				$data['dataUser'] = $this->UserModel->getById($_SESSION['id_user']);
				$data['detailUser'] = $this->UserModel->getDetailUser($_SESSION['id_user']);
				$data['sidebar'] = $this->load->view('templates/dashboard/sidebarReviewer', $data, true);
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
						redirect('change-pass-reviewer');
					}else{
						$this->UserModel->changePass(password_hash($newpass, PASSWORD_DEFAULT), $_SESSION['id_user']);
						$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
							title: "Berhasil",
							text: "Password diGanti",
							icon: "success",})</script>'
						);
						redirect('change-pass-reviewer');
					}
				}else{
					$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
						title: "Gagal",
						text: "Password Lama Salah",
						icon: "error",})</script>'
					);
					redirect('change-pass-reviewer');
				}
				
			
			}else{
				$data['page'] = 'password';
				$data['dataUser'] = $this->UserModel->getById($_SESSION['id_user']);
				$data['detailUser'] = $this->UserModel->getDetailUser($_SESSION['id_user']);
				$data['sidebar'] = $this->load->view('templates/dashboard/sidebarReviewer', $data, true);
				$this->load->view('templates/dashboard/navbar', $data);
				$this->load->view('pages/admin/changepass', $data);
				$this->load->view('templates/dashboard/footer');
			}
		}else{
			redirect('inactive');
		}
	}
}