<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index()
	{
		$this->load->view('login');
	}
    public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->db->from('user')->where('username',$username);
		$user = $this->db->get()->row();
		if($user==NULL){
			$this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            username tidak terdaftar
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
			redirect('auth');
		} else if($user->password==$password){
			$data = array(
				'username' => $user->username,
				'nama'     => $user->nama,
				'level'    => $user->level,
				'id_user'  => $user->id_user,
			);
			$this->session->set_userdata($data);
			redirect('admin/home');
		} else {
			$this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            password salah
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
			redirect('auth');
		}
	}
    public function logout(){
		$user_id = $this->session->userdata('id_user');
		$date = date('Y-m-d H:i:s');
		// Perbarui last_login di database (misalnya, jika menggunakan CodeIgniter Active Record)
		$this->db->set('last_login',$date);
		$this->db->where('id_user', $user_id); // Sesuaikan dengan kolom ID yang digunakan
		$this->db->update('user');
			$this->session->sess_destroy();
			redirect('home');
	}
	public function profile(){
		$this->db->from('user');
		$data['nama'] = $this->session->userdata('nama');
		$data['username'] = $this->session->userdata('username');
		$data['level'] = $this->session->userdata('level');
		$this->load->view('admin/profile', $data);
	}
}
