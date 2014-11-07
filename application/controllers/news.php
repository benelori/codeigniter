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

  public function create() {

    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['title'] = 'Create a news item';

    // set_rules(name property of the input field, name to be used in error message, the rule)
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'text', 'required');

    if ($this->form_validation->run() === FALSE)
    {
      $this->load->view('templates/header', $data);
      $this->load->view('news/create');
      $this->load->view('templates/footer');

    }
    else
    {
      $this->news_model->setNews();
      $this->load->view('news/success');
    }
  }
}
