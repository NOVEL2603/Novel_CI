<?php
class Novel extends CI_Controller {
  public function index() {
    $this->load->model('M_Novel');
    $data['bio'] = $this->M_Novel->get();
    $this->load->view("V_Novel", $data);
  }
}