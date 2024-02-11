<?php

class Model_dashboard extends CI_model
{

    public function t_hitung_jumlah_surat_masuk()
    {
        $query = $this->db->get_where('tbl_surat_masuk', ['id_tahun' => $this->session->userdata('id_tahun')]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function t_hitung_jumlah_surat_keluar()
    {
        $query = $this->db->get_where('tbl_surat_keluar', ['id_tahun' => $this->session->userdata('id_tahun')]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function t_hitung_jumlah_klasifikasi()
    {
        $query = $this->db->get_where('tbl_tahun_surat', ['aktif_id' => '1']);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function t_hitung_jumlah_surat_disposisi()
    {
        $query = $this->db->get_where('tbl_disposisi', ['id_tahun' => $this->session->userdata('id_tahun')]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function t_hitung_jumlah_akkuns()
    {
        $query = $this->db->get_where('tbl_user', ['aktif_id' => '1']);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function t_hitung_jumlah_kode_surats()
    {
        $query = $this->db->get_where('tbl_kode_surat', ['aktif_id' => '1']);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
