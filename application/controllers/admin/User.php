<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
        $this->load->model('User_model');
        if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
	}
	public function index()
	{
        $this->db->from('user');
		$this->db->order_by('nama','ASC');
		$user = $this->db->get()->result_array();
		$data = array(
			'user' => $user,
		);
		$this->load->view('admin/user_index',$data);
	}
    public function tambah(){
        $this->db->from('user');
        $this->db->where('username',$this->input->post('username'));
        $cek = $this->db->get()->result_array();
        if($cek<>NULL){
            $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            username sudah dipakai
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
      redirect('admin/user');
        }
        $this->User_model->tambah();
        $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
         berhasil menambahkan user 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
      redirect('admin/user');
    }
    public function hapus($id){
            $where = array(
                'id_user' => $id);
            $this->db->delete('user', $where);
            $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            berhasil menghapus data user
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('admin/user');
    }
    public function edit($id){
        $this->db->select('*')->from('user');
		$this->db->where('id_user', $id);
		$user = $this->db->get()->result_array();
		$data = array('user' => $user);
        $this->load->view('admin/user_edit',$data);
    }
    public function update(){
        $this->User_model->update();
		$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
         berhasil update data user 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
		redirect('admin/user');
    }
}
