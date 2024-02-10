<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_managemensuratmasuk');
    }

    public function index()
    {

        $title['judul'] = 'Dashboard | Apel';
        $title['total_srt_keluar']       = $this->Model_managemensuratkeluar->hitungJumlahSuratKeluar();
        $title['total_disposisi']        = $this->Model_managemen_disposisi->hitungJumlahDisposisi();
        $title['total_asset']            = $this->Model_managemensuratmasuk->hitungJumlahSuratMasuk();

        $data['j_surat_masuk']              = $this->Model_dashboard->t_hitung_jumlah_surat_masuk();
        $data['j_surat_keluar']             = $this->Model_dashboard->t_hitung_jumlah_surat_keluar();
        $data['j_th_surat']                 = $this->Model_dashboard->t_hitung_jumlah_klasifikasi();
        $data['j_disposisi_1']              = $this->Model_dashboard->t_hitung_jumlah_surat_disposisi();
        $data['j_users_1']                  = $this->Model_dashboard->t_hitung_jumlah_akkuns();
        $data['j_kode_surats']              = $this->Model_dashboard->t_hitung_jumlah_kode_surats();

        $this->load->view('templates/header', $title);
        $this->load->view('panel/dashboard', $data);
        $this->load->view('templates/footer');
    }
}
