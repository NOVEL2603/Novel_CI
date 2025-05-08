<?php
class Produk extends CI_Model {

 public function get_produk() {
  return $this->db->get('produk')->result_array(); // Mengembalikan array asosiatif
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
}