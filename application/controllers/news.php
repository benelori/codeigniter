<?php
/**
 * Created by PhpStorm.
 * User: lbene
 * Date: 07.11.2014
 * Time: 15:49
 */

class News extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('news_model');
  }

  public function index() {
    $data['news'] = $this->news_model->getNews();

    $data['title'] = 'News archive';

    $this->load->view('templates/header', $data);
    $this->load->view('news/index', $data);
    $this->load->view('templates/footer');
  }

  public function view($slug) {
    $data['news_item'] = $this->news_model->getNews($slug);

    if (empty($data['news_item']))
    {
      show_404();
    }

    $data['title'] = $data['news_item']['title'];

    $this->load->view('templates/header', $data);
    $this->load->view('news/view', $data);
    $this->load->view('templates/footer');
  }
}