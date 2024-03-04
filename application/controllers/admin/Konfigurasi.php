<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Konfigurasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        if($this->session->userdata('level')==null){
            redirect('auth');
        }
	}
	public function index()
	{
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();
		$data = array(
			'konfig' => $konfig
		);
		$this->load->view('admin/konfigurasi_index',$data);
	}
	public function update(){
        $data = array(
            'judul_website' => $this->input->post('judul_website'),
			'facebook' => $this->input->post('facebook'),
			'instagram' => $this->input->post('instagram'),
			'profile_website' => $this->input->post('profile_website'),
			'email' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat'),
			'no_wa' => $this->input->post('no_wa')
        );
        $where = array(
            'id_konfigurasi' => 1
        );
        $this->db->update('konfigurasi',$data, $where);

		$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
         berhasil mengupdate konfigurasi
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
		redirect('admin/konfigurasi');
    }
}
