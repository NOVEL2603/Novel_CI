<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Produk');
    $this->load->library('session');
    if (!$this->session->userdata('logged_in')) {
      redirect('auth');
    }
  }

  public function index()
  {
    $data['kategori'] = $this->Produk->get_kategori()->result_array();
    $this->load->view('kategori', $data);
  }
  public function tambah()
  {
    $this->load->view('tambah_kategori');
  }

  public function proses_tambah()
  {
    $nama_kategori = $this->input->post('nama_kategori');
    $data = [
      'nama_kategori' => $nama_kategori
    ];

    if ($this->Produk->kategori_input($data)) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Kategori berhasil ditambahkan.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal menambahkan kategori.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }
    redirect('Kategori');
  }

  public function edit($id)
  {
    $data['kategori'] = $this->Produk->get_kategori_by_id($id);
    $this->load->view('kategori_edit', $data);
  }

  public function update()
  {
    $id = $this->input->post('id');
    $nama_kategori = $this->input->post('nama_kategori');
    $data = [
      'nama_kategori' => $nama_kategori,
    ];

    if ($this->Produk->update_kategori($id, $data)) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Kategori berhasil diupdate.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal mengupdate kategori.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }
    redirect('Kategori');
  }

  public function hapus($id)
  {
    if ($this->Produk->hapus_kategori($id)) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">Kategori berhasil dihapus.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal menghapus kategori.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }
    redirect('Kategori');
  }
}
