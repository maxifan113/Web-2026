<?php

$post_id = isset($_GET['postId']) ? (int) $_GET['postId'] : 0;

$post = [
    'id'              => $post_id,
    'author'          => 'Ваня Денисов',
    'avatar'          => 'image/avatar1.jpg',
    'image_url'       => 'image/lenta1.jpg',
    'photo_count'     => 3,
    'likes'           => 203,
    'comment_text'    => 'Так красиво сегодня на улице! Настоящая зима)) Вспоминается Бродский: «Поздно ночью, в уснувшей долине, на самом дне...',
    'full_text'       => 'Так красиво сегодня на улице! Настоящая зима)) Вспоминается Бродский: «Поздно ночью, в уснувшей долине, на самом дне, звезды мерцают в промерзшей вышине, и луна сквозь туман пробивается еле-еле...» Каждый год жду этого момента! Снег, мороз и уютные вечера с книгой. А у вас какая погода?',
    'has_more'        => true,
    'publish_time'    => '2 часа назад',
    'show_edit'       => true,
    'comments_count'  => 18,
    'views'           => 1245,
];

if ($post_id === 0) {
    header('HTTP/1.0 404 Not Found');
    echo '<h1>Пост не найден</h1>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title><?=$post['author']?> Пост №<?= (int)$post['id'] ?></title>
  <link href="./styles.css" rel="stylesheet">
</head>
<body class="clear-border-in-body">
  <div class="main-container">
    <nav class="sidebar-fild">
      <div class="pages-fild">
        <a href="home.php">
          <img src="image/home-active.png" class="Smart-button" alt="Home">
        </a>
      </div>
      <div class="pages-fild">
        <a href="http://localhost/lab5/profile/">
          <img src="image/profile.png" class="Smart-button" alt="Profile">
        </a>
      </div>
      <div class="pages-fild">
        <img src="image/plus.png" class="Smart-button" alt="Add">
      </div>
    </nav>
    <div class="collum-fild">
      <div class="header-fild"></div>      
        <div class="post-container">
          <a href="home.php" class="back-link">Назад к ленте</a>
          <h1>Пост №<?=(int) $post['id']?></h1>
          <div class="post-fild">
            <div class="usser">
              <div class="avatar-name-fild">
                <img src="<?=$post['avatar']?>" class="user-avatar-mini" alt="<?=$post['author']?>">
                <div class="usser-name-fild">
                  <span class="usser-name"><?=$post['author']?></span>
                </div>
              </div>
              <?php if ($post['show_edit']) : ?>
                <div class="edit-fild">
                  <img src="image/pen.png" alt="Редактировать">   
                </div>
              <?php endif; ?>
            </div>
            <div class="photo-fild">
              <img src="<?=$post['image_url']?>" class="post-full-image" alt="Photo">        
              <?php if ($post['photo_count'] > 1) : ?>
                <div class="number-container">
                  <span class="number-photo">1/<?=(int)$post['photo_count']?></span>
                </div>
              <?php endif; ?>
            </div>
            <div class="post-stats">
              <div class="stat-item">
                <img src="image/heart.png" class="like-size" alt="Лайки">
                <span><?=(int)$post['likes']?> лайков</span>
              </div>
              <div class="stat-item">
                <span><?=(int)$post['comments_count']?> комментариев</span>
              </div>
              <div class="stat-item">
                <span><?=(int)$post['views']?> просмотров</span>
              </div>
            </div>
            <div class="post-full-text">
              <p><?=$post['full_text']?></p>
            </div>
            <span class="publishing-time"><?=$post['publish_time']?></span>
        </div>
      </div>
    </div>
  </div>
</body>
</html>