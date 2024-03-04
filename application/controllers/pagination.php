<?php
class pagination extends CI_Controller{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
    public function index()
	{	
		$this->load->model('user_model');
		$data['recent_post'] = $this->user_model->recent_post(5);
        // konfigurasi pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url('home/index'); // Ganti sesuai URL halaman Anda
        $config['total_rows'] = $this->db->count_all('konten'); // Jumlah total konten
        $config['per_page'] = 3; // Jumlah konten per halaman
        $config['uri_segment'] = 3; // Segment URI di mana nomor halaman akan ditempatkan
        $config['use_page_numbers'] = TRUE;
    
        // Konfigurasi tampilan Pagination
        $config['full_tag_open'] = '<div class="pagination-links">';
        $config['full_tag_close'] = '</div>';
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
		$this->load->view('pagination',$data);
	}
}