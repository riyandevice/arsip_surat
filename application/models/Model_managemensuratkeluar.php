<?php

class Model_managemensuratkeluar extends CI_model
{

    public function tampil_data_all()
    {
        $this->db->order_by('no_agenda DESC');
        return $this->db->get_where('tbl_surat_keluar', ['id_tahun' => $this->session->userdata('id_tahun')]);
    }

    public function hitungJumlahSuratKeluar()
    {
        $query = $this->db->get_where('tbl_surat_keluar', ['id_tahun' => $this->session->userdata('id_tahun')]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function kode()
    {
        $this->db->select('RIGHT(tbl_surat_keluar.no_agenda,2) as kode_barang2', FALSE);
        $this->db->order_by('no_agenda', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get_where('tbl_surat_keluar', ['id_tahun' => $this->session->userdata('id_tahun')]);  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data1 = $query->row();
            $kode = intval($data1->kode_barang2) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $tgl = date('dmY');
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodeKeluartampil = $batas;  //format kode
        return $kodeKeluartampil;
    }

    function TampilPembuat()
    {
        $this->db->order_by('id_user', 'ASC');
        $this->db->limit('1');
        return $this->db->from('tbl_surat_keluar')->join('tbl_user', 'tbl_user.id=tbl_surat_keluar.id_user')->get()->result();
    }

    public function hitung_j_deteksi_fisik()
    {
        $some_value = '';
        $limit = 1;

        $this->db->select('COUNT(*) as total');
        $this->db->from('tbl_surat_keluar');
        $this->db->where('file', $some_value);
        $this->db->group_by('file');
        $this->db->limit($limit);
        // Sesuaikan kondisi join dengan kebutuhan Anda
        $query = $this->db->get();
        return $query->result();
    }


    public function tambah_suratkeluar($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function delete($id)
    {
        $this->db->delete('tbl_surat_keluar', array('id_surat' => $id));
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
