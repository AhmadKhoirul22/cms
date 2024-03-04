<?php 
class Latihan extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->db->from('latihan');
		$data['latihan'] = $this->db->get()->result_array();
		$data['title'] = 'latihan page';
		$this->load->view('admin/latihan',$data);
	}

	public function tambah() {
		$total = $this->input->post('total');
        $total_sah = $this->input->post('total_sah');
        $total_tdksah = $this->input->post('total_tidaksah');
        $no1 = $this->input->post('no1');
        $no2 = $this->input->post('no2');
        $no3 = $this->input->post('no3');
        $nama_tps = $this->input->post('nama_tps');

        // Cek total suara
        if ($total == ($total_sah + $total_tdksah)) {
            $this->session->set_flashdata('alert', 'Total jumlah suara salah');
            redirect('admin/latihan');
        }

        // Cek total suara tiap nomor
        if ($total_sah == ($no1 + $no2 + $no3)) {
            $this->session->set_flashdata('alert', 'Total jumlah suara pada tiap nomor terdapat kesalahan');
            redirect('admin/latihan');
        }

        // Insert data suara
        $data = array(
            'total' => $total,
            'total_sah' => $total_sah,
            'total_tidaksah' => $total_tdksah,
            'no1' => $no1,
            'no2' => $no2,
            'no3' => $no3,
            'nama_tps' => $nama_tps
        );

        $this->db->insert('latihan',$data);

        // Redirect kembali ke halaman input suara dengan pesan sukses
        $this->session->set_flashdata('alert', 'Data suara berhasil disimpan');
        redirect('admin/latihan');
    }
}
?>
