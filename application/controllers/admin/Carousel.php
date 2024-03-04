<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Carousel extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
        if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
	}
	public function index()
	{
        $this->db->from('carousel');
		$carousel = $this->db->get()->result_array();
		$data = array(
			'carousel' => $carousel,
		);
		$this->load->view('admin/carousel_index',$data);
	}
    public function tambah(){
        // foto
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path']          = 'assets/upload/carousel/';
        $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['allowed_types']        = '*';
        $config['file_name']            = $namafoto;
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 500 * 1024){
            $this->session->set_flashdata('alert', '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            ukuran file lebih dari 500kb ulangi upload dengan ukuran foto kurang dari 500kb
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
                    ');
            redirect('admin/carousel');  
        }  elseif(!$this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        } 
        // foto
        $data = array(
            'judul' => $this->input->post('judul'),
            'foto' => $namafoto,
        );
        $this->db->insert('carousel',$data);
        $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
         berhasil menambahkan carousel
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
      redirect('admin/carousel');
    }
    public function hapus($id){
        $filename=FCPATH.'/assets/upload/carousel/'.$id;
        if(file_exists($filename)){
            unlink("./assets/upload/carousel/".$id);
        }
        $where = array(
                'foto' => $id
                );
            $this->db->delete('carousel', $where);
            $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            berhasil menghapus carousel
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('admin/carousel');
    }
    public function update(){
        $namafoto = $this->input->post('nama_foto');
        $config['upload_path']          = 'assets/upload/carousel/';
        $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['file_name']            = $namafoto;
        $config['overwrite']            = true;
        $config['allowed_types']        = '*';  
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 500 * 1024){
            $this->session->set_flashdata('alert', '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            ukuran file lebih dari 500kb ulangi upload dengan ukuran foto kurang dari 500kb
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
                    ');
        } elseif( ! $this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        } 
        $data = array(
            'judul' => $this->input->post('judul')
        );
        $where = array(
            'foto' => $this->input->post('nama_foto')
        );
        $this->db->update('carousel',$data, $where);

		$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
         berhasil mengupdate carousel
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
		redirect('admin/carousel');
    }
}
