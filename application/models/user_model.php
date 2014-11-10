<?php
/**
 * Created by PhpStorm.
 * User: lbene
 * Date: 10.11.2014
 * Time: 15:27
 */

class User_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function getUser($username, $password) {
    $query = $this->db->get_where('users', array('username' => $username, 'password' => $password));
    return $query->row_array();
  }
}
