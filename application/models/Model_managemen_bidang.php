<?php

class Model_managemen_bidang extends CI_model
{
    public function tampil_data()
    {
        return $this->db->get_where('tbl_kode_surat', ['aktif_id' => '1']);;
    }

    public function tambah_data()
    {

        $data = [
            "kode_surat"            => $this->input->post('kode_surat'),
            "bidang_surat"          => $this->input->post('bidang_surat'),
            "aktif_id"              => '1'
        ];

        $this->db->insert('tbl_kode_surat', $data);
    }

    public function hapus_data_tahun($id)
    {
        $data = [
            'aktif_id' => '2'
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_kode_surat', $data);
    }
}
