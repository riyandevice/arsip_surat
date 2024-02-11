<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Managemen_rekap_suratkeluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_managemen_kode', 'Model_managemen_bidang', 'Model_managemen_user', 'Model_managemen_disposisi', 'Model_managemensuratmasuk', 'Model_managemensuratkeluar');
    }

    public function index()
    {
        $title['judul']                     = 'Rekap Surat Masuk | Apel';
        $title['total_srt_keluar']          = $this->Model_managemensuratkeluar->hitungJumlahSuratKeluar();
        $title['total_disposisi']           = $this->Model_managemen_disposisi->hitungJumlahDisposisi();
        $title['total_asset']               = $this->Model_managemensuratmasuk->hitungJumlahSuratMasuk();
        $data['surat_masuk_ok']             = $this->Model_rekap_suratkeluar->tampil_data()->result();

        $this->load->view('templates/header', $title);
        $this->load->view('panel/rekap_agenda_surat_keluar', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_rekap_srt_keluar()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // title dari pdf


        // filename dari pdf ketika didownload
        $file_pdf = 'rekap_surat_keluar';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        $data['title_pdf'] = 'Rekap Surat Keluar';

        $tanggal_awal = $this->input->get('dari_tgl'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tanggal_akhir = $this->input->get('sampai_tgl'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        if (empty($tanggal_awal) or empty($tanggal_akhir)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
            $transaksi = $this->Model_rekap_suratkeluar->view_all();  // Panggil fungsi view_all yang ada di TransaksiModel
            $label = 'Semua Data Transaksi';
        } else { // Jika terisi
            $transaksi = $this->Model_rekap_suratkeluar->view_by_date($tanggal_awal, $tanggal_akhir);  // Panggil fungsi view_by_date yang ada di TransaksiModel
            $tanggal_awal = date('d-m-Y', strtotime($tanggal_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            $tanggal_akhir = date('d-m-Y', strtotime($tanggal_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            $label = 'Periode Tanggal ' . $tanggal_awal . ' s/d ' . $tanggal_akhir;
        }

        $data['label'] = $label;
        $data['transaksi'] = $transaksi;
        $data['pembuat_surat']              = $this->Model_managemensuratmasuk->TampilPembuat();

        $html = $this->load->view('laporan_rekap_suratkeluar', $data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
