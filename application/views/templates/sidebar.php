<aside>
  <div id="user-block" class="user-block">
    <?php if (isset($is_logged_in) && $is_logged_in == TRUE): ?>
      <?php $this->load->view('pages/user_info_block', array('username' => $username))?>
    <?php else: ?>
      <?php $this->load->view('pages/user_login_block')?>
    <?php endif; ?>

  </div>
  <div class="post-categories">
    <ul>
      <li><a href="#">category1</a></li>
      <li><a href="#">category2</a></li>
      <li><a href="#">category3</a></li>
      <li><a href="#">category4</a></li>
      <li><a href="#">category5</a></li>
    </ul>
  </div>
</aside>