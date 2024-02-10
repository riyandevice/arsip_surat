<?php

class Model_managemen_disposisi extends CI_model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function tampil_data_disposisi()
    {
        return $this->db->get_where('tbl_disposisi', ['id_tahun' => $this->session->userdata('id_tahun')]);
    }

    public function tampil_data($id = null)
    {
        $query = $this->db->get_where('tbl_surat_masuk', array('id_surat' => $id))->row();
        return $query;
    }

    function detail_data_disp($id = null)
    {
        $query = $this->db->get_where('tbl_disposisi', array('id_surat' => $id));
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

    public function tampil_data_tujuan()
    {
        $search = array('2');
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->where_not_in('aktif_id', $search);
        return $this->db->get();
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


    public function tambah_data()
    {
        ini_set('date.timezone', 'Asia/Jakarta');
        $tgl_input = date("Y-m-d");

        $data = [
            "tujuan"                    => $this->input->post('tujuan'),
            "isi_disposisi"             => $this->input->post('isi_disposisi'),
            "sifat"                     => $this->input->post('sifat'),
            "batas_waktu"               => $this->input->post('batas_waktu'),
            "catatan"                   => $this->input->post('catatan'),
            "id_surat"                  => $this->input->post('id_surat'),
            "id_user"                   => $this->input->post('id_user'),
            "id_tahun"                  => $this->input->post('id_tahun'),
            "tgl_buat"                  => $tgl_input
        ];

        $this->db->insert('tbl_disposisi', $data);
    }

    public function hapusData($id)
    {
        $this->db->delete('tbl_disposisi', ['id_disposisi' => $id]);
    }
}
