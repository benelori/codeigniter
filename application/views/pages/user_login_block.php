<?php echo form_open('user/login', array('id' => 'user-login'));
echo form_label("Username");
echo form_input(array('id' => 'username' , 'class' => 'user-login-field', 'name' => 'username'));
echo form_error('username', '<div class="error">', '</div>');
echo form_label("Password");
echo form_password(array('id' => 'password', 'class' => 'user-login-field', 'type' => 'password'));
echo form_error('password', '<div class="error">', '</div>');
echo form_submit(array('id' => 'login', 'name' => 'submit'),"Login");
echo form_close();
?>
