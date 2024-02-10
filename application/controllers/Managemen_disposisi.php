<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Managemen_disposisi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_managemensuratmasuk');
    }

    public function index()
    {
        $title['judul'] = 'Managemen | Apel';
        $title['total_srt_keluar']       = $this->Model_managemensuratkeluar->hitungJumlahSuratKeluar();
        $title['total_disposisi']        = $this->Model_managemen_disposisi->hitungJumlahDisposisi();
        $title['total_asset']            = $this->Model_managemensuratmasuk->hitungJumlahSuratMasuk();

        $peg_tampil = $this->Model_managemen_disposisi->tampil_data_pegawai();
        $data['tampil_pegawai'] = $peg_tampil;

        $data['disposisi'] = $this->Model_managemen_disposisi->tampil_data_disposisi()->result();
        $this->load->view('templates/header', $title);
        $this->load->view('panel/managemen_list_disposisi', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $title['judul'] = 'Managemen Disposisi | Apel';
        $title['total_srt_keluar']       = $this->Model_managemensuratkeluar->hitungJumlahSuratKeluar();
        $title['total_disposisi']        = $this->Model_managemen_disposisi->hitungJumlahDisposisi();
        $title['total_asset']            = $this->Model_managemensuratmasuk->hitungJumlahSuratMasuk();

        $detail = $this->Model_managemen_disposisi->tampil_data($id);
        $data['detail'] = $detail;

        $detail_disp = $this->Model_managemen_disposisi->detail_data_disp($id);
        $data['detail_disp'] = $detail_disp;

        $peg_tampil = $this->Model_managemen_disposisi->tampil_data_pegawai();
        $data['tampil_pegawai'] = $peg_tampil;

        $data['tujuan']      = $this->Model_managemen_disposisi->tampil_data_tujuan();

        $this->load->view('templates/header', $title);
        $this->load->view('panel/managemen_disposisi_surat', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_data_disposisi()
    {
        $this->Model_managemen_disposisi->tambah_data();
        $this->session->set_flashdata('flash', 'ditambahkan');
        redirect('Managemen_suratmasuk');
    }

    public function hapus_disposisi($id)
    {
        $this->Model_managemen_disposisi->hapusData($id);
        $this->session->set_flashdata('flash', 'ditambahkan');
        redirect('Managemen_suratmasuk');
    }
}
