<?php

class Model_managemen_user extends CI_model
{
    public function tampil_data()
    {
        return $this->db->get_where('tbl_user', ['aktif_id' => '1']);
    }


    public function tambah_data()
    {

        $data = [
            "username"          => $this->input->post('username'),
            "password"          => md5($this->input->post('password')),
            "nama"              => $this->input->post('nama'),
            "no_hp"             => $this->input->post('no_hp'),
            "level"             => $this->input->post('level'),
            "jabatan"           => $this->input->post('jabatan'),
            "aktif_id"          => '1',
            "passwordmd5"       => $this->input->post('password')
        ];

        $this->db->insert('tbl_user', $data);
    }



    public function hapus_data_tahun($id)
    {
        $data = [
            'aktif_id' => '2'
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_user', $data);
    }


    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
