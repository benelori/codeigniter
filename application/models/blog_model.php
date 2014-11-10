<?php

class Blog_model extends CI_Model {

  const PAGER_CONTENT = 5;
  const FEATURED = 1;

  public function __construct() {
    $this->load->database();
  }

  public function get_posts_for_home() {

    $this->db->from('posts');
    $this->db->order_by('created_at', 'desc');
    // Equivalent to LIMIT 0, 3 in SQL.
    $this->db->limit(3, 0);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function add_blog_post($data) {
    return $this->db->insert('posts', $data);
  }

  public function get_all_posts_paged($page_number) {

    $offset = $this::PAGER_CONTENT*($page_number-1);
    $this->db->from('posts');
    $this->db->order_by('created_at', 'desc');

    $this->db->limit($this::PAGER_CONTENT, $offset);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_post_amount_for_pager() {
    return $this->db->count_all('posts');
  }

  public function get_featured_posts() {
    $this->db->from('posts');
    $this->db->where('featured', self::FEATURED);
    $this->db->order_by('created_at', 'desc');
    $query = $this->db->get();
    return $query->result_array();
  }
}
