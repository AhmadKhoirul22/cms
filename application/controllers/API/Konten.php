<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "libraries/format.php";
require APPPATH . "libraries/RestController.php";
header("Access-Control-Allow-Origin: *");
// ...
// Logika API Anda
// ...

 
use chriskacerguis\RestServer\RestController;
class Konten extends RestController{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_konten', 'konten');
        // Membatasi Jumlah akses sesuai kebutuhan
        $this->methods['index_get']['limit'] = 200;
    }
    public function index_get(){
        $id = $this->get('id_konten');
 
        if ($id === null) {
            $konten = $this->konten->get_konten();
        } else {
            $konten = $this->konten->get_konten($id);
        }
 
        if ($konten) {
            $this->response(
                $konten
            , RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
     // Menghapus data 
     public function index_delete()
     {
         $id = $this->delete('id_konten');
  
         if ($id == null) {
             $this->response([
                 'status' => false,
                 'message' => 'profide an id!'
             ], RestController::HTTP_BAD_REQUEST);
         } else {
             if ($this->konten->delete_konten($id) > 0) {
                 // ok
                 $this->response([
                     'status' => true,
                     'data' => $id,
                     'message' => 'deleted.'
                 ], RestController::HTTP_OK);
             } else {
                 // id not found
                 $this->response([
                     'status' => false,
                     'message' => 'id not found!'
                 ], RestController::HTTP_BAD_REQUEST);
             }
         }
     }
     //untuk menambahkan data
     public function index_post()
     {
         $data = [
             'nrp' => $this->post('nrp'),
             'nama' => $this->post('nama'),
             'email' => $this->post('email'),
             'jurusan' => $this->post('jurusan'),
         ];
         if ($this->konten->create_konten($data) > 0) {
             $this->response([
                 'status' => true,
                 'message' => 'new mahasiswa has been created.'
             ], RestController::HTTP_CREATED);
         } else {
             $this->response([
                 'status' => false,
                 'message' => 'failed to create new data!.'
             ], RestController::HTTP_BAD_REQUEST);
         }
     }
      // Update data
    public function index_put()
    {
        $id = $this->put('id_konten');
        $data = [
            'nrp' => $this->put('nrp'),
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'jurusan' => $this->put('jurusan'),
        ];
        if ($this->konten->update_konten($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data konten has been updated'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data!.'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
?>