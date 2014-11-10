<?php
/**
 * Created by PhpStorm.
 * User: lbene
 * Date: 07.11.2014
 * Time: 18:26
 */

class Blog extends CI_Controller{

  public function __construct() {
    parent::__construct();
    $this->load->model('blog_model');
    $this->load->library(array('form_validation'));
  }

  public function index() {
    $page_content['posts'] = $this->blog_model->get_posts_for_home();
    $page_content['see_all_link'] = anchor('all', 'See all');

    $data['content'] = $this->load->view('pages/post_list', $page_content , TRUE);

    $data['title'] = 'Latest Posts';

    $this->load->template($data);
  }

  public function view_posts($page = 1) {

    $page_content['posts'] = $this->blog_model->get_all_posts_paged((int)$page);

    $this->create_pager_links($page, $page_content);
    $data['content'] = $this->load->view('pages/post_list', $page_content , TRUE);

    $data['title'] = 'Latest Posts';

    $this->load->template($data);
  }

  public function view_featured_posts($page = 1) {

    $page_content['posts'] = $this->blog_model->get_featured_posts();

    $data['content'] = $this->load->view('pages/post_list', $page_content , TRUE);

    $data['title'] = 'Featured Posts';

    $this->load->template($data);
  }

  public function about() {
    $this->load->template(array('title' => 'Awesome title', 'content' => 'YAY COBNTENT'));
  }

  public function add_post_form() {
    check_path_permission();
    $this->load->view('pages/blog_add_post');
  }

  public function add_post_form_submit() {
    $this->form_validation->set_message('required', 'This field is required');
    $this->form_validation->set_rules('title', 'title', 'required|xss_clean');
    $this->form_validation->set_rules('body', 'title', 'required|xss_clean');

    $post['title'] = $this->input->post('title');
    $post['content'] = $this->input->post('body');
    $post['featured'] = $this->input->post('featured') == 'true';
    $post['author'] = $this->session->userdata('user')['username'];

    if($this->form_validation->run() === FALSE) {
      $this->add_post_form();
    } else {
      $this->blog_model->add_blog_post($post);
      $this->load->view('pages/post', array('post' => $post));
    }
  }

  private function create_pager_links($page, &$page_content) {
    $post_number = $this->blog_model->get_post_amount_for_pager();
    $pages = ceil($post_number / 5);
    for ($i = 1; $i<=$pages; $i++) {
      $page_content['pager_links'][$i] = ($i == $page) ? anchor('all/' . $i, $i, array('class' => 'inactive')) : anchor('all/' . $i, $i);
    }
  }
}
