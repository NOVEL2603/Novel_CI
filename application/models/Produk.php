<?php
class Produk extends CI_Model
{

      public function get_produk()
      {
            return $this->db->get('produk')->result_array(); // Mengembalikan array asosiatif
      }
      public function get_kategori()
      {
            return $this->db->get('kategori'); // Mengembalikan array asosiatif
      }

      public function insert_produk($data)
      {
            return $this->db->insert('produk', $data); // Mengembalikan hasil insert (TRUE/FALSE)
      }

      public function delete_produk($where)
      {
            return $this->db->where($where)
                  ->delete('produk'); // Mengembalikan hasil delete (TRUE/FALSE)
      }

      public function get_produk_by_id($where)
      {
            return $this->db->get_where('produk', $where); // Mengembalikan objek query builder
      }

      public function update_produk($where, $data)
      {
            return $this->db->where($where)
                  ->update('produk', $data); // Mengembalikan hasil update (TRUE/FALSE)
      }
      public function detail_data($id = NULL)
      {
            $query = $this->db->get_where('produk', array('id' => $id))->row();
            return $query;
      }
      public function kategori_input($data)
      {
            return $this->db->insert('kategori', $data); // Mengembalikan hasil insert (TRUE/FALSE)
      }

      public function get_barang_with_kategori()
      {
            $this->db->select('p.*, k.nama_kategori');
            $this->db->from('produk AS p');
            $this->db->join('kategori AS k', 'p.kategori = k.id', 'left');
            return $this->db->get();
      }

      public function get_kategori_by_id($id)
      {
            return $this->db->get_where('kategori', ['id' => $id])->row();
      }

      public function update_kategori($id, $data)
      {
            $this->db->where('id', $id);
            return $this->db->update('kategori', $data);
      }

      public function hapus_kategori($id)
      {
            return $this->db->delete('kategori', ['id' => $id]);
      }
}
