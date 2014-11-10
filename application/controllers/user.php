<?php
/**
 * Created by PhpStorm.
 * User: lbene
 * Date: 10.11.2014
 * Time: 12:50
 */

class User extends CI_Controller {

  function __construct() {
    parent::__construct();
    //load session and connect to database
    $this->load->library(array('form_validation'));
    $this->load->model('user_model');
  }

  public function login() {
    $this->form_validation->set_message('required', 'This field is required');
    $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
    $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|callback_check_user['.$this->input->post('username').']');

    $data['username'] = $this->input->post('username');

    if($this->form_validation->run() === FALSE) {
      $this->load->view('pages/user_login_block');
    } else {
      $this->load->view('pages/user_info_block', $data);
    }
  }

  public function check_user($password, $username) {

    $user = $this->user_model->getUser($username, $password);
    if (!empty($user))
    {
      $session_information = array(
        'username' => $user['username'],
        'admin' => $user['admin']
      );

      $this->session->set_userdata('user', $session_information);
      return true;
    }
    else
    {
      $this->form_validation->set_message('check_user', 'Invalid Login Information');
      return false;
    }
  }

  public function logout() {
    $this->session->unset_userdata('user');
    $this->session->sess_destroy();
    redirect(base_url());
  }
}
