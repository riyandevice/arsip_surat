<?php

class Model_perview_cetak extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_managemen_disposisi', 'Model_managemen_kode', 'Model_managemen_bidang', 'Model_managemen_user');
    }

    public function detail_data($id = null)
    {
        $query = $this->db->get_where('tbl_surat_masuk', array('id_surat' => $id))->row();
        return $query;
    }

    public function detail_data_disposisi_a($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

        $this->db->get_where($table, $data)->row();
    }
}
