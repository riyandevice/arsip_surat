<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin', 'Mlogin');
        $this->load->model('Model_managemen_kode', 'Model_managemen_kode');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Login Pengguna | Apel';
        $data['tahun']     = $this->Model_managemen_kode->tampil_data()->result();
        $this->load->view('halaman_login', $data);
    }

    function autentikasi()
    {
        $email              = $this->input->post('username');
        $password           = MD5($this->input->post('password'));
        $id_tahun           = $this->input->post('id_tahun');

        $validasi_email = $this->Mlogin->query_validasi_email($email);
        if ($validasi_email->num_rows() > 0) {
            $validate_ps = $this->Mlogin->query_validasi_password($email, $password);
            if ($validate_ps->num_rows() > 0) {
                $x = $validate_ps->row_array();
                if ($x['aktif_id'] == '1') {
                    $this->session->set_userdata('logged', TRUE);
                    $this->session->set_userdata('user', $email);
                    $id = $x['id'];
                    if ($x['level'] == 'admin') { //Administrator
                        $name           = $x['username'];
                        $level_user     = $x['level'];
                        $nama_user      = $x['nama'];
                        $jabatan_user   = $x['jabatan'];
                        $this->session->set_userdata('access', 'Administrator');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('name', $name);
                        $this->session->set_userdata('level', $level_user);
                        $this->session->set_userdata('jabatan', $jabatan_user);
                        $this->session->set_userdata('nama_user', $nama_user);
                        $this->session->set_userdata('id_tahun', $id_tahun);
                        redirect('admin');
                    } else if ($x['level'] == 'kepala') { //Dosen
                        $name           = $x['username'];
                        $level_user     = $x['level'];
                        $nama_user      = $x['nama'];
                        $jabatan_user   = $x['jabatan'];
                        $this->session->set_userdata('access', 'Kepala');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('name', $name);
                        $this->session->set_userdata('level', $level_user);
                        $this->session->set_userdata('jabatan', $jabatan_user);
                        $this->session->set_userdata('nama_user', $nama_user);
                        $this->session->set_userdata('id_tahun', $id_tahun);
                        $this->session->set_flashdata('flash', 'Berhasil');
                        redirect('admin');
                    } else if ($x['level'] == 'pegawai') {
                        $name           = $x['username'];
                        $level_user     = $x['level'];
                        $nama_user      = $x['nama'];
                        $jabatan_user   = $x['jabatan'];
                        $this->session->set_userdata('access', 'pegawai');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('name', $name);
                        $this->session->set_userdata('level', $level_user);
                        $this->session->set_userdata('jabatan', $jabatan_user);
                        $this->session->set_userdata('nama_user', $nama_user);
                        $this->session->set_userdata('id_tahun', $id_tahun);
                        $this->session->set_flashdata('flash', 'Berhasil');
                        redirect('admin');
                    } else if ($x['level'] == 'kasie') {
                        $name           = $x['username'];
                        $level_user     = $x['level'];
                        $nama_user      = $x['nama'];
                        $jabatan_user   = $x['jabatan'];
                        $this->session->set_userdata('access', 'Kasie');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('name', $name);
                        $this->session->set_userdata('level', $level_user);
                        $this->session->set_userdata('jabatan', $jabatan_user);
                        $this->session->set_userdata('nama_user', $nama_user);
                        $this->session->set_userdata('id_tahun', $id_tahun);
                        $this->session->set_flashdata('flash', 'Berhasil');
                        redirect('admin');
                    }
                } else {
                    $url = base_url('pengguna');
                    echo $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Mohon Maaf!</h5>
                    <p>Akun kamu telah di blokir. Silahkan hubungi admin.</p></div>');
                    redirect($url);
                }
            } else {
                $url = base_url('pengguna');
                echo $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i> Mohon Maaf!</h5>
                <p>Password yang kamu masukkan salah.</p></div>');
                redirect($url);
            }
        } else {
            $url = base_url('pengguna');
            echo $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Mohon Maaf!</h5>
            <p>Email yang kamu masukkan salah.</p></div>');
            redirect($url);
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        $url = base_url('pengguna');
        redirect($url);
    }
}
