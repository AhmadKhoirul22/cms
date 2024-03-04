<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model {
	public function tambah()
	{
        $data = array(
            'username' => $this->input->post('username'),
            'nama' => $this->input->post('nama'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level'),
        );
        $this->db->insert('user',$data);
	}
    public function update(){
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level')
        );
        $where = array(
            'id_user' => $this->input->post('id_user')
        );
        $this->db->update('user',$data, $where);
    }
    public function chatgpt($keyword){
        $this->db->like('judul',$keyword);
        $this->db->or_like('keterangan',$keyword);
        return $this->db->get('konten')->result();
    }
    public function recent_post($limit = 5){
        $this->db->select('*');
        $this->db->from('konten');
        $this->db->order_by('tanggal','desc');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }
    public function kategori_post($id,$limit = 5){
        $this->db->select('konten.*, kategori.nama_kategori');
        $this->db->from('konten');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        $this->db->where('konten.id_kategori', $id);
        $this->db->order_by('konten.tanggal', 'desc');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }
    public function get_konten_paginated($limit, $start){
    $this->db->from('konten a');
    $this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
    $this->db->join('user c', 'a.username = c.username', 'left');
    $this->db->order_by('tanggal', 'ASC');
    $this->db->limit($limit, $start);
    return $this->db->get()->result_array();
    }
    public function singgle_post(){
        $this->db->select('*');
        $this->db->from('konten');
        $this->db->order_by('tanggal','DESC');
        return $this->db->get()->row();
    }
}
