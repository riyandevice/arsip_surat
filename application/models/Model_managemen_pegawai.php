<?php

class Model_managemen_pegawai extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('uuid');
    }

    public function tampil_data()
    {
        return $this->db->get_where('tbl_pegawai', ['aktif_id' => '1']);
    }

    public function tambah_data()
    {

        $data = [
            "id"                    => $this->uuid->v4(),
            "nama"                  => $this->input->post('nama'),
            "jabatan"               => $this->input->post('jabatan'),
            "no_hp"                 => $this->input->post('no_hp'),
            "status_pegawai"        => $this->input->post('status_pegawai'),
            "aktif_id"              => '1'
        ];

        $this->db->insert('tbl_pegawai', $data);
    }

    public function hapus_dt_pegawai($id)
    {
        $data = [
            'aktif_id' => '2'
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_pegawai', $data);
    }
}
