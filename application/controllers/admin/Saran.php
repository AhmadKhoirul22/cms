<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Saran extends CI_Controller {
  public function __construct()
	{
		parent::__construct();
        if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
	}
	public function index()
	{   
        $this->db->from('saran');
		$this->db->order_by('tanggal','ASC');
		$saran = $this->db->get()->result_array();
		$data = array(
			'saran' => $saran,
		);
		$this->load->view('admin/saran',$data);
	}
    public function tambah(){
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'id_konten' => $this->input->post('id_konten'),
            'isi_saran' => $this->input->post('isi_saran'),
            'tanggal' => date('Y-m-d'),
        );
        $this->db->insert('saran',$data);
        $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
         berhasil menambahkan saran
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
      redirect('home');
    }
    public function hapus($id){
        $where = array(
            'id_saran' => $id);
        $this->db->delete('saran', $where);
        $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle me-1"></i>
        berhasil menghapus saran
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('admin/saran');
    }
    public function delete_all(){
        $this->db->empty_table('saran');
        $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle me-1"></i>
        berhasil menghapus saran
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('admin/saran');
    }
    public function ulasan()
    {   
          $this->db->from('rating');
      $this->db->order_by('tanggal','ASC');
      $rating = $this->db->get()->result_array();
      $data = array(
        'rating' => $rating,
      );
      $this->load->view('admin/rating',$data);
    }
}
