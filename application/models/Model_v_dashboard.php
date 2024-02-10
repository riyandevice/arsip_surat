<?php

class Model_v_dashboard extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function tampil_data()
    {
        $search = "sifat != 'Rahasia'";
        $this->db->select('*');
        $this->db->from('tbl_surat_masuk');
        $this->db->where($search);
        return $this->db->get();
    }

    public function graph()
    {
        $query = "SELECT tbl_tahun_surat.tahun, COUNT(tbl_disposisi.id_tahun) AS total, id_tahun 
        FROM tbl_disposisi 
        LEFT JOIN tbl_tahun_surat ON tbl_disposisi.id_tahun = tbl_tahun_surat.id
        GROUP BY id_tahun 
        ORDER BY id_tahun DESC";
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function graph_surat_masuk()
    {
        $query = "SELECT tbl_tahun_surat.tahun, COUNT(tbl_surat_masuk.id_tahun) AS total, id_tahun 
        FROM tbl_surat_masuk 
        LEFT JOIN tbl_tahun_surat ON tbl_surat_masuk.id_tahun = tbl_tahun_surat.id
        GROUP BY id_tahun 
        ORDER BY id_tahun DESC";
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function graph_surat_keluar()
    {
        $query = "SELECT tbl_tahun_surat.tahun, COUNT(tbl_surat_keluar.id_tahun) AS total, id_tahun 
        FROM tbl_surat_keluar 
        LEFT JOIN tbl_tahun_surat ON tbl_surat_keluar.id_tahun = tbl_tahun_surat.id
        GROUP BY id_tahun 
        ORDER BY id_tahun DESC";
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function t_hitung_jumlah_surat_masuk()
    {
        $query = $this->db->get_where('tbl_surat_masuk');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function t_hitung_jumlah_surat_keluar()
    {
        $query = $this->db->get_where('tbl_surat_keluar');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function t_hitung_jumlah_surat_disposisi()
    {
        $query = $this->db->get_where('tbl_disposisi');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function tampil_data_surat_keluar()
    {
        $search = "sifat != 'Rahasia'";
        $this->db->select('*');
        $this->db->from('tbl_surat_keluar');
        $this->db->where($search);
        return $this->db->get();
    }

    public function detail_surat_masuk($id = null)
    {
        $query = $this->db->get_where('tbl_surat_masuk', array('id_surat' => $id))->row();
        return $query;
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


    public function detail_surat_keluar($id = null)
    {
        $query = $this->db->get_where('tbl_surat_keluar', array('id_surat' => $id))->row();
        return $query;
    }


    public function detail_data($id_surat)
    {
        $this->db->where('id_surat', $id_surat);
        $query = $this->db->get('tbl_disposisi');
        return $query->result();
    }
}
