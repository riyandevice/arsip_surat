<?php
defined('BASEPATH') or exit('No direct script access allowed');

class V_dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin', 'Mlogin');
        $this->load->model('Model_managemen_kode', 'Model_dashboard', 'Model_managemen_disposisi');
        $this->load->database();
    }

    public function tampil_data_pegawai()
    {
        // $query = $this->db->query('SELECT tbl_pegawai.nama FROM tbl_disposisi JOIN tbl_pegawai ON tbl_disposisi.tujuan = tbl_pegawai.id');
        // $result = $query->result();
        // return $result;

        $this->db->select('*');
        $this->db->from('tbl_disposisi');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id=tbl_disposisi.tujuan');
        $query = $this->db->get();
        return $query->result();
    }

    public function d()
    {
        $judul['judul'] = 'Halaman Utama | Apel';
        $data['tahun']     = $this->Model_v_dashboard->tampil_data()->result();
        $data["dataSiswa"] = $this->Model_v_dashboard->graph();
        $data["graph"] = $this->Model_v_dashboard->graph_surat_masuk();
        $data["graph_keluar"] = $this->Model_v_dashboard->graph_surat_keluar();

        $data['surat_masuk_ok']             = $this->Model_v_dashboard->tampil_surat_masuk()->result();
        $data['surat_keluar_ok']            = $this->Model_v_dashboard->tampil_surat_keluar()->result();

        $data['j_surat_masuk']              = $this->Model_v_dashboard->t_hitung_jumlah_surat_masuk();
        $data['j_surat_keluar']             = $this->Model_v_dashboard->t_hitung_jumlah_surat_keluar();
        $data['j_disposisi_1']              = $this->Model_v_dashboard->t_hitung_jumlah_surat_disposisi();

        $this->load->view('templates/header_umum', $judul);
        $this->load->view('umum/halaman_utama', $data);
        $this->load->view('templates/footer_umum');
    }

    public function surat_masuk($id)
    {
        $judul['judul']     = 'List Surat Masuk | Apel';
        $detail             = $this->Model_v_dashboard->detail_surat_masuk($id);
        $data['j_bc_srt_masuk']          = $this->Model_v_dashboard->hitung_j_bc_surat_masuk($id);
        $data['detail']     = $detail;
        $data['detail_isp'] = $this->Model_v_dashboard->detail_data($id);
        $data['pembuat_surat']          = $this->Model_managemensuratmasuk->TampilPembuat();

        $peg_tampil = $this->Model_v_dashboard->tampil_data_pegawai($id);
        $data['tampil_pegawai'] = $peg_tampil;

        $this->load->view('templates/header_umum', $judul);
        $this->load->view('umum/halaman_surat_masuk', $data);
        $this->load->view('templates/footer_umum');
    }

    public function daftar_surat_masuk()
    {
        $judul['judul']     = 'Detail Surat Masuk | Apel';
        $data['surat_masuk_ok']         = $this->Model_v_dashboard->tampil_data()->result();
        $data['pembuat_surat']          = $this->Model_managemensuratmasuk->TampilPembuat();
        $this->load->view('templates/header_umum', $judul);
        $this->load->view('umum/daftar_surat_masuk', $data);
        $this->load->view('templates/footer_umum');
    }


    public function surat_keluar($id)
    {
        $judul['judul']     = 'Detail Surat Keluar | Apel';
        $detail             = $this->Model_v_dashboard->detail_surat_keluar($id);
        $data['j_bc_srt_keluar']          = $this->Model_v_dashboard->hitung_j_bc_surat_keluar($id);
        $data['detail']     = $detail;
        $data['pembuat_surat']          = $this->Model_managemensuratmasuk->TampilPembuat();
        $this->load->view('templates/header_umum', $judul);
        $this->load->view('umum/halaman_surat_keluar', $data);
        $this->load->view('templates/footer_umum');
    }


    public function daftar_surat_keluar()
    {
        $judul['judul']     = 'List Surat Keluar | Apel';
        $data['surat_masuk_ok']         = $this->Model_v_dashboard->tampil_data_surat_keluar()->result();
        $data['pembuat_surat']          = $this->Model_managemensuratmasuk->TampilPembuat();
        $this->load->view('templates/header_umum', $judul);
        $this->load->view('umum/daftar_surat_keluar', $data);
        $this->load->view('templates/footer_umum');
    }
}
