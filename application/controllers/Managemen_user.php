<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Managemen_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_managemensuratmasuk');
    }

    public function index()
    {
        $title['judul'] = 'Managemen User | Apel';
        $title['total_srt_keluar']       = $this->Model_managemensuratkeluar->hitungJumlahSuratKeluar();
        $title['total_disposisi']        = $this->Model_managemen_disposisi->hitungJumlahDisposisi();
        $title['total_asset']            = $this->Model_managemensuratmasuk->hitungJumlahSuratMasuk();
        $data['user'] = $this->Model_managemen_user->tampil_data()->result();
        $this->load->view('templates/header', $title);
        $this->load->view('panel/managemen_user', $data);
        $this->load->view('templates/footer');
    }

    public function hitungJumlahDisposisi()
    {
        $query = $this->db->get_where('tbl_disposisi', ['id_tahun' => $this->session->userdata('id_tahun')]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function tambah_data_user()
    {
        $this->Model_managemen_user->tambah_data();
        $this->session->set_flashdata('flash', 'ditambahkan');
        redirect('managemen_user');
    }


    public function hapus_data_tahun($id)
    {
        $this->Model_managemen_user->hapus_data_tahun($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('managemen_user');
    }

    public function update()
    {
        $id                 = $this->input->post('id');
        $password           = MD5($this->input->post('password'));
        $passwordmd5        = $this->input->post('password');

        $data = array(
            'password'          => $password,
            'passwordmd5'       => $passwordmd5
        );

        $where = array('id' => $id);

        $this->Model_managemen_user->update_data($where, $data, 'tbl_user');
        $this->session->set_flashdata('flash', 'Direset');
        redirect('managemen_user');
    }
}
