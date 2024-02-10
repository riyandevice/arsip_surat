<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Managemen_pegawai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_managemensuratmasuk');
    }

    public function index()
    {
        $title['judul'] = 'Managemen Pegawai | Apel';
        $title['total_srt_keluar']          = $this->Model_managemensuratkeluar->hitungJumlahSuratKeluar();
        $title['total_disposisi']           = $this->Model_managemen_disposisi->hitungJumlahDisposisi();
        $title['total_asset']               = $this->Model_managemensuratmasuk->hitungJumlahSuratMasuk();
        $data['data_pegawai']               = $this->Model_managemen_pegawai->tampil_data()->result();
        $this->load->view('templates/header', $title);
        $this->load->view('panel/managemen_pegawai', $data);
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


    public function tambah_data_pegawai()
    {
        $this->Model_managemen_pegawai->tambah_data();
        $this->session->set_flashdata('flash', 'ditambahkan');
        redirect('managemen_pegawai');
    }

    public function hapus_data_pegawai($id)
    {
        $this->Model_managemen_pegawai->hapus_dt_pegawai($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('managemen_pegawai');
    }
}
