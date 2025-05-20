<?php
class Kategori extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model('Produk'); // Memuat model Kategori_model
    }

 public function index() {
   $data['kategori'] = $this->Produk->get_kategori();
  $this->load->view('Kategori', $data); 

 }
 public function tambah() {
    $this->load->view('tambah_kategori'); 
 }
 public function proses_tambah() {
    $kategori = $this->input->post('nama_kategori');

    $data = array(
      'nama_kategori' => $kategori
    );
    
    $this->Produk->kategori_input($data, 'kategori');
    redirect('Kategori');
    }
}