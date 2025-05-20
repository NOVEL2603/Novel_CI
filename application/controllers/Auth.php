<?php
defined('BASEPATH') or exit('No direct script access allowed'); // Pastikan ini ada di setiap file CI

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('novel');
        }
        $this->load->view('auth/login');
    }

    public function proses_login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->Auth_model->getUserByUsername($username);

            if ($user) {
                if (password_verify($password, $user->password)) {
                    $data_session = [
                        'id'        => $user->id,       // Mengambil ID dari database
                        'username'  => $user->username,
                        'logged_in' => TRUE
                    ];
                    $this->session->set_userdata($data_session);
                    redirect('novel'); // Arahkan ke halaman dashboard setelah login sukses
                } else {
                    $this->session->set_flashdata('error', 'Password salah!');
                    redirect('auth'); // Gunakan 'auth' daripada 'index.php/auth' untuk konsistensi
                }
            } else {
                $this->session->set_flashdata('error', 'Username tidak terdaftar!');
                redirect('auth'); // Gunakan 'auth' daripada 'index.php/auth' untuk konsistensi
            }
        }
    }

    public function register()
    {
        // Jika user sudah login, tidak perlu register lagi
        if ($this->session->userdata('username')) {
            redirect('novel');
        }
        $this->load->view('auth/register');
    }

    public function proses_register()
    {
        // Validasi username harus unik di tabel 'users' (sesuaikan dengan nama tabel Anda)
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/register'); // Arahkan ke view register tanpa 'index.php/'
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT) // Hash password
            ];

            if ($this->Auth_model->registerUser($data)) {
                $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
                redirect('auth'); // Gunakan 'auth' daripada 'index.php/auth'
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat registrasi.');
                $this->load->view('auth/register'); // Arahkan ke view register tanpa 'index.php/'
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth'); // Arahkan ke halaman login setelah logout
    }
}
