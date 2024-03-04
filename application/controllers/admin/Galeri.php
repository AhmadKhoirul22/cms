<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
        if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
	}
	public function index()
	{
        $this->db->from('galeri');
		$this->db->order_by('tanggal','ASC');
		$galeri = $this->db->get()->result_array();
		$data = array(
			'galeri' => $galeri,
		);
		$this->load->view('admin/galeri_index',$data);
	}
    public function tambah(){
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path']          = 'assets/upload/galeri/';
        $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['allowed_types']        = '*';
        $config['file_name']            = $namafoto;
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 2 * 1024 * 1024){
            $this->session->set_flashdata('alert', '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            ukuran file lebih dari 500kb ulangi upload dengan ukuran foto kurang dari 500kb
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
                    ');
            redirect('admin/galeri');  
        }  elseif(!$this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        } 
        // foto
        $data = array(
            'judul' => $this->input->post('judul'),
            'foto' => $namafoto,
            'tanggal' => date('Y-m-d'),
        );
        $this->db->insert('galeri',$data);
        $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
         berhasil menambahkan galeri
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
      redirect('admin/galeri');
    }
    public function hapus($id){
        $filename=FCPATH.'/assets/upload/galeri/'.$id;
        if(file_exists($filename)){
            unlink("./assets/upload/galeri/".$id);
        }
        $where = array(
                'foto' => $id
                );
            $this->db->delete('galeri', $where);
            $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            berhasil menghapus galeri
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('admin/galeri');
    }
}
