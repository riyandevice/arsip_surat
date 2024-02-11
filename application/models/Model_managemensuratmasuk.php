<?php

class Model_managemensuratmasuk extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_managemen_disposisi', 'Model_managemen_kode', 'Model_managemen_bidang', 'Model_managemen_user');
    }

    public function tampil_data()
    {
        $this->db->order_by('no_agenda DESC', 'nama ASC');
        return $this->db->get_where('tbl_surat_masuk', ['id_tahun' => $this->session->userdata('id_tahun')]);
    }


    public function hitungJumlahSuratMasuk()
    {
        $query = $this->db->get_where('tbl_surat_masuk', ['id_tahun' => $this->session->userdata('id_tahun')]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }


    function TampilPembuat()
    {
        $this->db->order_by('id_user', 'ASC');
        $this->db->limit('1');
        return $this->db->from('tbl_surat_masuk')->join('tbl_user', 'tbl_user.id=tbl_surat_masuk.id_user')->get()->result();
    }



    public function tampil_data_kode()
    {
        return $this->db->get_where('tbl_kode_surat', ['aktif_id' => '1']);
    }


    public function kode()
    {
        $this->db->select('RIGHT(tbl_surat_masuk.no_agenda,2) as kode_barang', FALSE);
        $this->db->order_by('no_agenda', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get_where('tbl_surat_masuk', ['id_tahun' => $this->session->userdata('id_tahun')]);  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->kode_barang) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $tgl = date('dmY');
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = $batas;  //format kode
        return $kodetampil;
    }

    public function tambah_suratmasuk($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function delete($id)
    {
        $this->db->delete('tbl_surat_masuk', array('id_surat' => $id));
        $this->db->delete('tbl_disposisi', array('id_surat' => $id));
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
