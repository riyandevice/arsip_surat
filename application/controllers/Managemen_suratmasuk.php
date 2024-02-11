<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Managemen_suratmasuk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_managemen_kode', 'Model_managemen_bidang', 'Model_managemen_user', 'Model_managemen_disposisi', 'Model_managemensuratmasuk', 'Model_managemensuratkeluar');
    }

    public function index()
    {
        $title['judul']                 = 'Managemen Surat Masuk | Apel';
        $title['total_srt_keluar']       = $this->Model_managemensuratkeluar->hitungJumlahSuratKeluar();
        $title['total_disposisi']        = $this->Model_managemen_disposisi->hitungJumlahDisposisi();
        $title['total_asset']            = $this->Model_managemensuratmasuk->hitungJumlahSuratMasuk();
        $data['surat_masuk_ok']         = $this->Model_managemensuratmasuk->tampil_data()->result();
        $data['kode_surat']             = $this->Model_managemensuratmasuk->tampil_data_kode()->result();
        $data['kode']                   = $this->Model_managemensuratmasuk->kode();
        $data['pembuat_surat']          = $this->Model_managemensuratmasuk->TampilPembuat();

        $this->load->view('templates/header', $title);
        $this->load->view('panel/surat_masuk', $data);
        $this->load->view('templates/footer');
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

    public function tambah_aksi()
    {
        ini_set('date.timezone', 'Asia/Jakarta');
        $jam_input = date("H:i:s");
        $tgl_input = date("Y-m-d");

        $id_surat           = $this->uuid->v4();
        $no_agenda          = $this->input->post('no_agenda');
        $kode               = $this->input->post('kode');
        $no_surat           = $this->input->post('no_surat');
        $asal_surat         = $this->input->post('asal_surat');
        $tgl_surat          = $this->input->post('tgl_surat');
        $isi                = $this->input->post('isi');
        $id_user            = $this->input->post('id_user');
        $id_tahun           = $this->input->post('id_tahun');
        $link               = $this->input->post('link');
        $keterangan         = $this->input->post('keterangan');
        $sifat              = $this->input->post('sifat');
        $gambar             = $_FILES['gambar'];
        if ($gambar = '') {
        } else {
            $config['upload_path']   = 'uploads/surat_masuk';
            $config['allowed_types'] = 'jpg|png|jpeg|pdf';
            $config['max_size'] = 5120; // 5MB
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('gagal', 'Simpan');
                redirect('managemen_suratmasuk');
            } else {
                $gambar = $this->upload->data('file_name');
                $this->session->set_flashdata('flash', 'Simpan');
            }
        }
        $data = array(
            'id_surat'   => $id_surat,
            'no_agenda'   => $no_agenda,
            'no_surat' => $no_surat,
            'asal_surat'   => $asal_surat,
            'isi'      => $isi,
            'kode'       => $kode,
            'tgl_surat'       => $tgl_surat,
            'tgl_diterima'       => $tgl_input,
            'waktu_terima'       => $jam_input,
            'file'     => $gambar,
            'link'       => $link,
            'keterangan'       => $keterangan,
            'sifat'       => $sifat,
            'id_user'       => $id_user,
            'id_tahun'       => $id_tahun
        );
        $this->Model_managemensuratmasuk->tambah_suratmasuk('tbl_surat_masuk', $data);
        $this->session->set_flashdata('flash', 'ditambahkan');
        redirect('managemen_suratmasuk');
    }

    public function hapus_surat_masuk($id)
    {
        // get db record from image to be deleted
        $query_get_image = $this->db->get_where('tbl_surat_masuk', array('id_surat' => $id));
        foreach ($query_get_image->result() as $record) {
            // delete file, if exists...
            $filename = "uploads/surat_masuk/$record->file";

            if (is_readable($file) && unlink($file)) {
                echo "The file has been deleted";
            } else {
                echo "The file was not found";
            }
            if (file_exists($filename)) {
                unlink($filename);

                // ...and continue with your code
                $this->Model_managemensuratmasuk->delete($id);
                $query = $this->db->get("tbl_surat_masuk");
                $data['records'] = $query->result();
                $this->load->view('panel/surat_masuk', $data);
                $this->session->set_flashdata('flash', 'Dihapus');
                redirect('managemen_suratmasuk');
            }
        }
    }

    public function update_aksi()
    {
        $id                 = $this->input->post('id_surat');
        $no_agenda          = $this->input->post('no_agenda');
        $kode               = $this->input->post('kode');
        $no_surat           = $this->input->post('no_surat');
        $asal_surat         = $this->input->post('asal_surat');
        $tgl_surat          = $this->input->post('tgl_surat');
        $isi                = $this->input->post('isi');
        $keterangan                = $this->input->post('keterangan');
        $sifat                = $this->input->post('sifat');

        $data = array(
            'no_agenda'     => $no_agenda,
            'kode'          => $kode,
            'no_surat'      => $no_surat,
            'asal_surat'    => $asal_surat,
            'tgl_surat'     => $tgl_surat,
            'isi'           => $isi,
            'keterangan'    => $keterangan,
            'sifat'         => $sifat
        );

        $where = array('id_surat' => $id);

        $this->Model_managemensuratmasuk->update_data($where, $data, 'tbl_surat_masuk');
        $this->session->set_flashdata('flash', 'Diedit');
        redirect('managemen_suratmasuk');
    }
}
