<html>
<head>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/style.css'; ?>">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

<body>
<div class="body-wrapper">
  <div class="header">
    <img width="1024" height="200" src="<?php echo base_url() . 'assets/img/image.jpg'; ?>">
  </div>
  <nav>
    <ul>
      <li><?php print anchor(base_url(), 'Home'); ?></li>
      <li><?php print anchor('about', 'About the author'); ?></li>
      <li><?php print anchor('featured', 'Featured Posts'); ?></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </nav>
