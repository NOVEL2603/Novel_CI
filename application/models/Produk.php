<?php
class Produk extends CI_Model {

 public function get_produk() {
  return $this->db->get('produk')->result_array(); // Mengembalikan array asosiatif
 }
 public function get_kategori() {
  return $this->db->get('kategori')->result_array(); // Mengembalikan array asosiatif
 }

 public function insert_produk($data) {
  return $this->db->insert('produk', $data); // Mengembalikan hasil insert (TRUE/FALSE)
 }

 public function delete_produk($where) {
  return $this->db->where($where)
        ->delete('produk'); // Mengembalikan hasil delete (TRUE/FALSE)
 }

 public function get_produk_by_id($where) {
  return $this->db->get_where('produk', $where); // Mengembalikan objek query builder
 }

 public function update_produk($where, $data) {
  return $this->db->where($where)
        ->update('produk', $data); // Mengembalikan hasil update (TRUE/FALSE)
 }
 public function detail_data($id = NULL) {
      $query = $this->db->get_where('produk', array('id' => $id))->row();
      return $query;
}
 public function kategori_input($data) {
  return $this->db->insert('kategori', $data); // Mengembalikan hasil insert (TRUE/FALSE)
 }
 public function get_produk_dengan_kategori() {
  $this->db->select('produk.*, kategori.nama_kategori');
  $this->db->from('produk');
  $this->db->join('kategori', 'produk.katrgori = kategori.id', 'left');
  $query =$this->db->get();
  return $query->result();
}

}