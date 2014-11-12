<?php if (isset($this->session->userdata['user'])): ?>
<div id="add-blog-post-wrapper">
  <?php print anchor("blog/add_post_form", "Add new blog post", array('id' => 'add-blog-post')); ?>
</div>
<?php endif; ?>
<?php foreach ($posts as $post):  ?>
  <?php $this->load->view('pages/post', array('post' => $post)); ?>
<?php endforeach; ?>
<?php if (isset($see_all_link)): ?>
  <?php print $see_all_link; ?>
<?php endif; ?>
<?php if (isset($pager_links)): ?>
  <div class="pager">
  <?php foreach ($pager_links as $link) : ?>
      <?php print $link; ?>
  <?php endforeach; ?>
  </div>
<?php endif; ?>
