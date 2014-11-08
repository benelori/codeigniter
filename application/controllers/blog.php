<?php
/**
 * Created by PhpStorm.
 * User: lbene
 * Date: 07.11.2014
 * Time: 18:26
 */

class Blog extends CI_Controller{

  public function index() {
    echo 'Hello World BLOG';
  }

  public function comments() {
    echo 'Look at this!';
  }

  public function shoes($sandals, $id) {
    echo $sandals;
    echo $id;
  }

  private function showComments() {

    print 'Brand new comment function';
  }

//  public function _remap($method) {
//    if ($method == 'comments') {
//      $this->showComments();
//    }
//    else {
//      $this->index();
//    }
//  }

  public function _output($output)
  {
    echo $output . 'LOL';
  }
}
