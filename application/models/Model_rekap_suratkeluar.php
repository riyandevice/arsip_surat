<?php

class Model_rekap_suratkeluar extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function tampil_data()
    {
        $this->db->order_by('no_agenda DESC', 'nama ASC');
        return $this->db->get_where('tbl_surat_keluar');
    }

    public function view_all()
    {
        $this->db->order_by('no_agenda ASC', 'nama ASC');
        return $this->db->get('tbl_surat_keluar')->result(); // Tampilkan semua data transaksi
    }

    public function view_by_date($tanggal_awal, $tanggal_akhir)
    {
        $tanggal_awal = $this->db->escape($tanggal_awal);
        $tanggal_akhir = $this->db->escape($tanggal_akhir);

        $this->db->where('DATE(tgl_surat) BETWEEN ' . $tanggal_awal . ' AND ' . $tanggal_akhir); // Tambahkan where tanggal nya
        $this->db->order_by('no_agenda ASC', 'nama ASC');
        return $this->db->get('tbl_surat_keluar')->result(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
    }
}
