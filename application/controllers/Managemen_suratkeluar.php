<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Managemen_suratkeluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_managemen_kode', 'Model_managemen_bidang', 'Model_managemen_user', 'Model_managemensuratmasuk');
    }

    public function index()
    {
        $title['judul']                     = 'Managemen Surat Keluar | Apel';
        $title['total_srt_keluar']          = $this->Model_managemensuratkeluar->hitungJumlahSuratKeluar();
        $title['total_disposisi']           = $this->Model_managemen_disposisi->hitungJumlahDisposisi();
        $title['total_asset']               = $this->Model_managemensuratmasuk->hitungJumlahSuratMasuk();
        $data['kode_surat']                 = $this->Model_managemensuratmasuk->tampil_data_kode()->result();
        $data['kode']                       = $this->Model_managemensuratkeluar->kode();
        $data['surat_keluar_ok']            = $this->Model_managemensuratkeluar->tampil_data_all()->result();
        $data['pembuat_surat']              = $this->Model_managemensuratmasuk->TampilPembuat();

        $this->load->view('templates/header', $title);
        $this->load->view('panel/surat_keluar', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        ini_set('date.timezone', 'Asia/Jakarta');
        $jam_input = date("H:i:s");
        $tgl_input = date("Y-m-d");

        $no_agenda          = $this->input->post('no_agenda');
        $tujuan           = $this->input->post('tujuan');
        $no_surat           = $this->input->post('no_surat');
        $isi_surat           = $this->input->post('isi');
        $kode               = $this->input->post('kode');
        $tgl_surat               = $this->input->post('tgl_surat');
        $link               = $this->input->post('link');
        $keterangan               = $this->input->post('keterangan');
        $sifat               = $this->input->post('sifat');
        $id_users               = $this->input->post('id_user');
        $id_tahuns               = $this->input->post('id_tahun');

        $data = array(
            'no_agenda'   => $no_agenda,
            'tujuan'   => $tujuan,
            'no_surat' => $no_surat,
            'isi'      => $isi_surat,
            'kode'       => $kode,
            'tgl_surat'       => $tgl_surat,
            'tgl_catat'       => $tgl_input,
            'waktu_catat'       => $jam_input,
            'file'     => '',
            'link'       => $link,
            'keterangan'       => $keterangan,
            'sifat'       => $sifat,
            'id_user'       => $id_users,
            'id_tahun'       => $id_tahuns
        );
        $this->Model_managemensuratkeluar->tambah_suratkeluar('tbl_surat_keluar', $data);
        $this->session->set_flashdata('flash', 'ditambahkan');
        redirect('managemen_suratkeluar');
    }

    public function hapus_surat_keluar($id)
    {
        // get db record from image to be deleted
        $query_get_image = $this->db->get_where('tbl_surat_keluar', array('id_surat' => $id));
        foreach ($query_get_image->result() as $record) {
            // delete file, if exists...
            $filename = "uploads/surat_keluar/$record->file";

            if (is_readable($file) && unlink($file)) {
                echo "The file has been deleted";
            } else {
                echo "The file was not found";
            }
            if (file_exists($filename)) {
                unlink($filename);

                // ...and continue with your code
                $this->Model_managemensuratkeluar->delete($id);
                $query = $this->db->get("tbl_surat_keluar");
                $data['records'] = $query->result();
                $this->load->view('panel/surat_keluar', $data);
                $this->session->set_flashdata('flash', 'Dihapus');
                redirect('managemen_suratkeluar');
            }
        }
    }

    public function update_aksi()
    {
        $id                 = $this->input->post('id_surat');
        $no_agenda          = $this->input->post('no_agenda');
        $kode               = $this->input->post('kode');
        $no_surat           = $this->input->post('no_surat');
        $tujuan             = $this->input->post('tujuan');
        $tgl_surat          = $this->input->post('tgl_surat');
        $isi                = $this->input->post('isi');
        $keterangan                = $this->input->post('keterangan');
        $sifat                = $this->input->post('sifat');

        $data = array(
            'no_agenda'     => $no_agenda,
            'kode'          => $kode,
            'no_surat'      => $no_surat,
            'tujuan'        => $tujuan,
            'tgl_surat'     => $tgl_surat,
            'isi'           => $isi,
            'keterangan'    => $keterangan,
            'sifat'         => $sifat
        );

        $where = array('id_surat' => $id);

        $this->Model_managemensuratkeluar->update_data($where, $data, 'tbl_surat_keluar');
        $this->session->set_flashdata('flash', 'Diedit');
        redirect('managemen_suratkeluar');
    }

    public function generete_qr()
    {
        $id                 = $this->input->post('id_surat');

        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
        $url_linknya = base_url('v_dashboard/surat_keluar/' . $id);

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']             = './assets/'; //string, the default is application/cache/
        $config['errorlog']             = './assets/'; //string, the default is application/logs/
        $config['imagedir']             = './assets/QRcode/surat_keluar/'; //direktori penyimpanan qr code
        $config['quality']              = true; //boolean, the default is true
        $config['size']                 = '1024'; //interger, the default is 1024
        $config['black']                = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']                = array(70, 130, 180); // array, default is array(0,0,0)
        $config['encrypt_name']         = true;
        $this->ciqrcode->initialize($config);

        $image_name = $id . '.png'; //buat name dari qr code sesuai dengan nim

        $params['data'] = $url_linknya; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        $data = array(
            'qr_code'           => $image_name
        );

        $where = array('id_surat' => $id);

        $this->Model_managemensuratkeluar->update_data($where, $data, 'tbl_surat_keluar');
        $this->session->set_flashdata('flash', 'Generete QR Code');
        redirect('managemen_suratkeluar');
    }


    public function upload_files()
    {
        $id                 = $this->input->post('id_surat');
        $gambar             = $_FILES['gambar'];

        if ($gambar = '') {
        } else {
            $config['upload_path']   = 'uploads/surat_keluar';
            $config['allowed_types'] = 'jpg|png|jpeg|pdf';
            $config['max_size'] = 5120; // 5MB
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('gagal', 'Simpan');
                redirect('managemen_suratkeluar');
            } else {
                $gambar = $this->upload->data('file_name');
                $this->session->set_flashdata('flash', 'Simpan');
            }
        }

        $data = array(
            'file'           => $gambar
        );

        $where = array('id_surat' => $id);

        $this->Model_managemensuratkeluar->update_data($where, $data, 'tbl_surat_keluar');
        $this->session->set_flashdata('flash', 'Diedit');
        redirect('managemen_suratkeluar');
    }
}
