<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mProfile extends CI_Model
{
    public function profile()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        return $this->db->get()->row();
    }
    public function update_profile($id, $data)
    {
        $this->db->where('id_pelanggan', $id);
        $this->db->update('pelanggan', $data);
    }
}

/* End of file mProfile.php */
