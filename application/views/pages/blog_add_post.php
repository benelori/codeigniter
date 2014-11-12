<?php
echo form_open('blog/add_post_form_submit', array('id' => 'add-post-form'));
echo form_label("Title");
echo br();
echo form_input(array('id' => 'blog-post-title' , 'class' => 'blog-post-title', 'name' => 'blog-post-title', 'size' => 50));
echo br();
echo form_error('title', '<div class="error">', '</div>');
echo form_label("Body");
echo br();
echo form_textarea(array('id' => 'blog-post-body', 'class' => 'blog-post-body', 'name' => 'blog-post-body', 'rows' => 20, 'cols' => 80));
echo form_error('body', '<div class="error">', '</div>');
echo br();
echo form_checkbox(array('id' =>'blog-post-featured', 'name' => 'featured', 'checked' => FALSE)) . 'Featured post';
echo br();
echo form_submit(array('id' => 'submit-blog-post', 'name' => 'submit-blog-post'),"Post");
echo form_close();
?>
