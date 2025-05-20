<?php
class Kelola_produk extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    if (!$this->session->userdata('logged_in')) {
      redirect('auth');
    }
  }

  public function index()
  {
    $this->load->model('Produk');
    $data['produk'] = $this->Produk->get_barang_with_kategori()->result_array();
    $this->load->view("kelola_produk", $data); // Menggunakan nama view yang sesuai
  }

  public function tambah()
  {
    $this->load->model('Produk');
    $data['kategori'] = $this->Produk->get_kategori()->result();
    $this->load->view("tambah", $data); // Menggunakan nama view yang sesuai
  }

  public function submit()
  {
    $this->load->model('Produk');
    $nama_produk = $this->input->post('nama_produk');
    $kategori = $this->input->post('kategori');
    $stok = $this->input->post('stok');
    $harga = $this->input->post('harga');

    $data = array(
      'nama_produk' => $nama_produk,
      'kategori' => $kategori,
      'stok' => $stok,
      'harga' => $harga,
    );

    $this->Produk->insert_produk($data); // Memanggil fungsi yang lebih spesifik
    redirect('kelola_produk');
  }

  public function hapus($id)
  {
    $this->load->model('Produk');
    $where = array('id' => $id);
    $this->Produk->delete_produk($where); // Memanggil fungsi yang lebih spesifik
    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Data Berhasil Dihapus!</div>');
    redirect('kelola_produk');
  }

  public function edit($id)
  {
    $this->load->model('Produk');
    $where = array('id' => $id);
    $data['produk'] = $this->Produk->get_produk_by_id($where)->row();
    $data['kategori_list'] = $this->Produk->get_kategori()->result_array();
    $this->load->view('edit', $data);
  }

  public function update()
  {
    $this->load->model('Produk');
    $id = $this->input->post('id');
    $nama_produk = $this->input->post('nama_produk');
    $kategori = $this->input->post('kategori');
    $stok = $this->input->post('stok');
    $harga = $this->input->post('harga');

    $data = array(
      'nama_produk' => $nama_produk,
      'kategori' => $kategori,
      'stok' => $stok,
      'harga' => $harga,
    );

    $where = array('id' => $id);
    $this->Produk->update_produk($where, $data); // Memanggil fungsi yang lebih spesifik
    redirect('kelola_produk');
  }
  public function detail($id)
  {
    $this->load->model('Produk');
    $detail = $this->Produk->detail_data($id);
    $data['detail'] = $this->Produk->get_barang_with_kategori()->result();
    $data['detail'] = $detail;
    $this->load->view('layouts/header');
    $this->load->view('layouts/sidebar');
    $this->load->view('detail', $data);
    $this->load->view('layouts/footer');
  }
}
