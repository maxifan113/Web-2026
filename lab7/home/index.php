<?php
require_once 'get_posts.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="./styles.css" rel="stylesheet">
</head>
<body class="clear-border-in-body">
  <div class="main-container">
    <nav class="sidebar-fild">
      <div class="pages-fild">
        <img src="image/home-active.png" class="Smart-button" alt="Home">
      </div>
      <div class="pages-fild">
        <a href="http://localhost/lab7/profile/">
          <img src="image/profile.png" class="Smart-button" alt="Profile">
        </a>
      </div>
      <div class="pages-fild">
        <img src="image/plus.png" class="Smart-button" alt="Add">
      </div>
    </nav>
      <div class="collum-fild">
        <div class="header-fild"></div>
          <div class="lenta-fild">
            <?php foreach ($posts as $post) : ?>
              <?php include 'post_create.php'; ?>
            <?php endforeach; ?>
          </div>
      </div>
  </div>
</body>
</html>