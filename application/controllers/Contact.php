<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('kontak');
        $this->session->set_flashdata('message', 'Pesan kamu sudah terkirim! Mohon tunggu balasan dari admin kami :D ');
        
    }

    public function send()
    {
        // Load form validation library
        $this->load->library('form_validation');

        // Set validation rules
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('kontak');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $message = $this->input->post('message');

            // Configure email
            $this->email->from($email, $name);
            $this->email->to('intansariduano@gmail.com'); // Replace with your email address
            $this->email->subject('Contact Us Form Submission');
            $this->email->message("Nama Lengkap: $name\nEmail: $email\n\nPesan:\n$message");

            // Send email
            if ($this->email->send()) {
                $this->session->set_flashdata('message', 'Pesan kamu sudah terkirim! Mohon tunggu balasan dari admin kami :D ');
            } else {
                $this->session->set_flashdata('message', 'There was an error sending your message. Please try again.');
            }

            redirect('contact');
        }
    }
}
