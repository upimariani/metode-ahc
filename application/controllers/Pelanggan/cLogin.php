<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mLogin');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Pelanggan/Layouts/head');
            $this->load->view('Pelanggan/Layouts/header');
            $this->load->view('Pelanggan/vLogin');
            $this->load->view('Pelanggan/Layouts/footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $data = $this->mLogin->login_pelangan($username, $password);
            if ($data) {
                $id_pelanggan = $data->id_pelanggan;
                $nama = $data->nama_pelanggan;


                $array = array(
                    'id_pelanggan' => $id_pelanggan,
                    'nama' => $nama
                );
                $this->session->set_userdata($array);

                redirect('Pelanggan/cHome');
            } else {
                $this->session->set_flashdata('error', 'Username dan Password Anda Salah!');

                redirect('Pelanggan/cLogin');
            }
        }
    }
    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('no_tlp', 'No Telepon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Pelanggan/Layouts/head');
            $this->load->view('Pelanggan/Layouts/header');
            $this->load->view('Pelanggan/vregister');
            $this->load->view('Pelanggan/Layouts/footer');
        } else {
            $data = array(
                'nama_pelanggan' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'tgl_lahir' => $this->input->post('tgl'),
                'jk' => $this->input->post('jk'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'no_hp' => $this->input->post('no_tlp'),
                'level_member' => '0'
            );
            $this->mLogin->registrasi($data);
            $this->session->set_flashdata('success', 'Anda Berhasil Registrasi! Silahkan Melakukan Login');
            redirect('Pelanggan/cLogin');
        }
    }
    public function logout()
    {

        $this->session->unset_userdata('id_pelanggan');
        $this->session->unset_userdata('nama');
        $this->session->set_flashdata('success', 'Anda Berahasil Logout!');
        redirect('Pelanggan/cLogin');
    }
}

/* End of file cLogin.php */
