<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function getUserByUsername($username)
    {
        return $this->db->where('username', $username)->get('user')->row();
    }

    public function registerUser($data)
    {
        return $this->db->insert('user', $data);
    }
}