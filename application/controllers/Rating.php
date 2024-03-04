<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rating extends CI_Controller{
    public function __construct()
	{
    parent::__construct();
    
	}

    public function rating(){
        $this->db->from('konfigurasi');
		$konfig = $this->db->get()->row(); 

        $this->db->from('kategori');
		$kategori = $this->db->get()->result_array();
           
        $this->db->from('rating');
        $rating = $this->db->get()->result_array();

        $data['rating'] = $rating;
        $data['kategori'] = $kategori;
        $data['konfig'] = $konfig;
        $this->load->view('rating_index',$data);
    }
    public function tambah(){
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'isi_rating' => $this->input->post('isi_rating'),
            'tanggal' => date('Y-m-d'),
        );
        $this->db->insert('rating',$data);
        $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
         berhasil menambahkan ulasan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('rating/rating');
    }
    public function hapus($id){
        $where = array(
            'id_rating' => $id);
        $this->db->delete('rating', $where);
        $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle me-1"></i>
        berhasil menghapus ulasan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('admin/saran/ulasan');
    }
    public function delete_all(){
        $this->db->empty_table('rating');
        $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle me-1"></i>
        berhasil menghapus ulasan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('admin/saran/ulasan');
    }
}