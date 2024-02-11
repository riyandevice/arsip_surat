<?php

class Model_managemen_kode extends CI_model
{
    public function tampil_data()
    {
        return $this->db->get_where('tbl_tahun_surat', ['aktif_id' => '1']);
    }

    public function tambah_data()
    {

        $data = [
            "tahun"         => $this->input->post('tahun_surat'),
            "aktif_id"      => '1'
        ];

        $this->db->insert('tbl_tahun_surat', $data);
    }

    public function hapus_data_tahun($id)
    {
        $data = [
            'aktif_id' => '2'
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_tahun_surat', $data);
    }
}
