<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kategori extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
        if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
	}
	public function index()
	{
        $this->db->from('kategori');
		$this->db->order_by('nama_kategori','ASC');
		$kategori = $this->db->get()->result_array();
		$data = array(
			'kategori' => $kategori,
		);
		$this->load->view('admin/kategori_index',$data);
	}
    public function tambah(){
        $this->db->from('kategori');
        $this->db->where('nama_kategori',$this->input->post('nama_kategori'));
        $cek = $this->db->get()->result_array();
        if($cek<>NULL){
            $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            nama kategori sudah dipakai
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
      redirect('admin/kategori');
        }
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori')
        );
        $this->db->insert('kategori',$data);
        $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
         berhasil menambahkan nama kategori
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
      redirect('admin/kategori');
    }
    public function hapus($id){
            $where = array(
                'id_kategori' => $id);
            $this->db->delete('kategori', $where);
            $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            nama kategori berhasil di hapus
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('admin/kategori');
    }
    public function edit($id){
        $this->db->select('*')->from('user');
		$this->db->where('id_user', $id);
		$user = $this->db->get()->result_array();
		$data = array('user' => $user);
        $this->load->view('admin/user_edit',$data);
    }
    public function update(){
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori')
        );
        $where = array(
            'id_kategori' => $this->input->post('id_kategori')
        );
        $this->db->update('kategori',$data, $where);

		$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
         berhasil mengupdate nama kategori
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
		redirect('admin/kategori');
    }
}
