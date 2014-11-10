<?php
/**
 * Created by PhpStorm.
 * User: lbene
 * Date: 12.11.2014
 * Time: 12:34
 */

function check_path_permission() {
  $ci = & get_instance();
  if (!isset($ci->session->userdata['user'])) {
    show_404();
  }
}