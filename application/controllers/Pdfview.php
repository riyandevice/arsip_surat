<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdfview extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_managemensuratmasuk');
    }

    public function cetak_disposisi($id)
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        $this->load->library('Ciqrcode');

        // title dari pdf


        // filename dari pdf ketika didownload
        $file_pdf = 'disposisi_cabdinPas_Apel';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        //orientasi qrcode / qrcode
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
        $url_linknya = base_url('Pdfview/cetak_disposisi/' . $id);

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']             = './assets/'; //string, the default is application/cache/
        $config['errorlog']             = './assets/'; //string, the default is application/logs/
        $config['imagedir']             = './assets/QRcode/surat_masuk/'; //direktori penyimpanan qr code
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
        //orientasi qrcode / qrcode
        $data = array(
            'qr_code'           => $image_name
        );

        $where = array('id_surat' => $id);

        //cara detail data
        $this->load->model('Model_perview_cetak');
        $detail_disp = $this->Model_perview_cetak->detail_data_disposisi_a($where, $data, 'tbl_surat_masuk');
        $data['detail_disp'] = $detail_disp;
        $detail = $this->Model_perview_cetak->detail_data($id);
        $data['title_pdf'] = 'Generete Disposisi';
        $data['detail'] = $detail;

        $html = $this->load->view('laporan_pdf', $data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
