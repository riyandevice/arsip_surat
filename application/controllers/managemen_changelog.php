<?php
defined('BASEPATH') or exit('No direct script access allowed');

class managemen_changelog extends CI_Controller
{
    public function index()
    {
        $title['judul'] = 'Versi Aplikasi dan Update | Apel';
        $title['total_srt_keluar']       = $this->Model_managemensuratkeluar->hitungJumlahSuratKeluar();
        $title['total_disposisi']        = $this->Model_managemen_disposisi->hitungJumlahDisposisi();
        $title['total_asset']            = $this->Model_managemensuratmasuk->hitungJumlahSuratMasuk();
        $data['surat_masuk_ok']             = $this->Model_rekap_suratmasuk->tampil_data()->result();
        $this->load->view('templates/header', $title);
        $this->load->view('panel/managemen_changelog', $data);
        $this->load->view('templates/footer');
    }
}
