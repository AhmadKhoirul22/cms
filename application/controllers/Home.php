<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	public function index()
	{	
		$this->load->model('user_model');
		$data['recent_post'] = $this->user_model->recent_post(5);
		$data['post_1'] = $this->user_model->singgle_post();
		        // konfigurasi pagination
				$this->load->library('pagination');
				$config['base_url'] = base_url('home/index'); // Ganti sesuai URL halaman Anda
				$config['total_rows'] = $this->db->count_all('konten'); // Jumlah total konten
				$config['per_page'] = 2; // Jumlah konten per halaman
				$config['uri_segment'] = 3; // Segment URI di mana nomor halaman akan ditempatkan
				$config['use_page_numbers'] = TRUE;
			
				// Konfigurasi tampilan Pagination
				$config['full_tag_open'] = '<ul class="pagination">';
				$config['full_tag_close'] = '  </ul>';
				$config['cur_tag_open'] = '<span class="page-item active"';
				$config['cur_tag_close'] = '</span>';
				$config['first_link'] = 'First';
				$config['last_link'] = 'Last';
			
				$this->pagination->initialize($config);
				$data['pagination'] = $this->pagination->create_links();
			
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data['konten'] = $this->user_model->get_konten_paginated($config['per_page'], $page);
				
		//konfigurasi
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row(); 
		//kategori
		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();
		//carousel
		$this->db->from('carousel');
		$carousel = $this->db->get()->result_array();
		//konten
		$this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('user c','a.username=c.username','left');
		$this->db->order_by('tanggal','ASC');

		$data['konfig'] = $konfig;
		$data['kategori'] = $kategori;
		$data['carousel'] = $carousel;
		// $data['konten'] =  $this->db->get()->result_array();
		$this->load->view('home',$data);
	}
	public function kategori($id){
		$this->load->model('user_model');
		$data['last_content'] = $this->user_model->kategori_post($id);
		//konfigurasi
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row(); 
		//kategori
		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();
		//carousel
		$this->db->from('carousel');
		$carousel = $this->db->get()->result_array();
		//konten
		$this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('user c','a.username=c.username','left');
		$this->db->where('a.id_kategori',$id);
        // $konten = $this->db->get()->result_array();
		// kategori part 2
		$data['konten'] =  $this->db->get()->result_array();
		$this->db->from('kategori');
		$this->db->where('id_kategori',$id);
		$nama_kate = 

		// $data = array(
		// 	'konfig' => $konfig,
		// 	'nama_kategori' => $nama_kate,
		// 	'kategori' => $kategori,
		// 	'carousel' => $carousel,
		// 	'konten' => $konten
		// );
		$data['konfig'] = $konfig;
		$data['kategori'] = $kategori;
		$data['carousel'] = $carousel;
		$data['nama_kategori'] = $this->db->get()->row()->nama_kategori;
		$this->load->view('kategori',$data);
	}
	public function berita($slug){
		$slug = $this->uri->segment(3);

		$this->load->model('user_model');
		$data['konten'] = $this->user_model->recent_post();
		//konfigurasi
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row(); 
		//saran
		$username = $this->session->userdata('email');
		$level = $this->session->userdata('nama');	
		if($level=='saran'){
			$this->db->where('email',$username);
		}
		$this->db->from('saran');
		$saran = $this->db->get()->result_array();
		//kategori
		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();
		//konten
		$this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('user c','a.username=c.username','left');
		
		$this->db->where('slug',$slug);
		$konten = $this->db->get()->row();
		$id_konten = $konten->id_konten;
		// $data = array(
		// 	'konfig' => $konfig,
		// 	'kategori' => $kategori,
		// 	'konten' => $konten
		// );	
		$data['id_konten'] = $id_konten;
		$data['konfig'] = $konfig;
		$data['kategori'] = $kategori;
		$data['singgle_data'] = $konten;
		$data['saran'] = $saran;
		$this->load->view('berita',$data);
	}
	public function search(){
		$data['konten'] = [];
		$keyword = $this->input->get('keyword');
		if($keyword){
			$data['konten'] = $this->user_model->chatgpt($keyword);
		}
		$this->load->model('user_model');
		$data['recent_post'] = $this->user_model->recent_post(5);
		//konfigurasi
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row(); 
		//kategori
		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();
		//carousel
		$this->db->from('carousel');
		$carousel = $this->db->get()->result_array();
		//konten
		$this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('user c','a.username=c.username','left');
		$this->db->order_by('tanggal','ASC');
		// $data = array(
		// 	'konfig' => $konfig,
		// 	'kategori' => $kategori,
		// 	'carousel' => $carousel,
		// );
		$data['konfig'] = $konfig;
		$data['kategori'] = $kategori;
		$data['carousel'] = $carousel;
		$this->load->view('search',$data);
	}
	public function chatgpt(){
		$data['konten'] = [];
		$keyword = $this->input->get('keyword');
		if($keyword){
			$data['konten'] = $this->user_model->chatgpt($keyword);
		}
		$this->load->view('chatgpt',$data);
	}
	public function post(){
		$this->load->model('user_model');
		$data['konten'] = $this->user_model->recent_post();
		$this->load->view('home',$data);
	}
	public function galeri(){
		$this->load->model('user_model');
		$data['recent_post'] = $this->user_model->recent_post(5);
		//konfigurasi
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row(); 
		//kategori
		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();
		//carousel
		$this->db->from('carousel');
		$carousel = $this->db->get()->result_array();
		//konten
		// $this->db->from('konten a');
        // $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        // $this->db->join('user c','a.username=c.username','left');
		// $this->db->order_by('tanggal','ASC');
		//galeri
		$this->db->from('galeri');
		$galeri = $this->db->get()->result_array();
		$data['konfig'] = $konfig;
		$data['kategori'] = $kategori;
		$data['carousel'] = $carousel;
		$data['galeri'] =  $galeri;
		$this->load->view('galeri',$data);
	}
	public function rating(){
		$this->db->select('*')->from('rating');
		$rating = $this->db->get()->result_array();
        $this->db->from('konfigurasi');
		$konfig = $this->db->get()->row(); 

        $this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$data['rating'] = $rating;
        $data['kategori'] = $kategori;
        $data['konfig'] = $konfig;
        $this->load->view('rating_index',$data);
    }
}