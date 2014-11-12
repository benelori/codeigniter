<?php

class MY_Loader extends CI_Loader {

  public $ci;

  public function __construct() {
    parent::__construct();
    $this->ci =  & get_instance();
  }

  public function template($vars = array(), $return = FALSE) {
    $this->ci->load->library('session');

    $isLoggedIn = isset($this->ci->session->all_userdata()['user']);
    $vars['username'] = $isLoggedIn ? $this->ci->session->all_userdata()['user']['username'] : '';
    $vars['is_logged_in'] = $isLoggedIn;

    $content  = $this->view('templates/header', $vars, $return);
    $content .= $this->view('templates/sidebar', $vars, $return);
    $content .= $this->view('templates/main', $vars, $return);
    $content .= $this->view('templates/footer', $vars, $return);

    if ($return)
    {
      return $content;
    }
  }
}