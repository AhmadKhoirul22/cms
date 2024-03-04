<?php
class Model_konten extends CI_Model{
    public function get_konten($id = null)
    {
        if ($id === null) {
            return $this->db->get('konten')->result_array();
        } else {
            return $this->db->get_where('konten', ['id_konten' => $id])->result_array();
        }
    }
    public function delete_konten($id)
    {
        $this->db->delete('konten', ['id_konten' => $id]);
        return $this->db->affected_rows();
    }
    public function create_konten($data)
    {
        $this->db->insert('konten', $data);
        return $this->db->affected_rows();
    }
 
    public function update_konten($data, $id)
    {
        $this->db->update('konten', $data, ['id_konten' => $id]);
        return $this->db->affected_rows();
    }
}
?>