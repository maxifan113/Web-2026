<?php
require_once 'config/database.php';

$post_id = isset($_GET['postId']) ? (int) $_GET['postId'] : 0;

if ($post_id === 0) {
  header('HTTP/1.0 404 Not Found');
  echo '<h1>Пост не найден</h1>';
  exit;
}

$db = Database::getInstance()->getConnection();
$stmt = $db->prepare("
  SELECT 
    p.*,
    u.username as author,
    u.avatar_url as avatar,
    1 as show_edit
  FROM posts p
  INNER JOIN users u ON p.user_id = u.id
  WHERE p.id = ?
");

$stmt->execute([$post_id]);
$post = $stmt->fetch();
if (!$post) {
  header('HTTP/1.0 404 Not Found');
  echo '<h1>Пост не найден</h1>';
  echo '<p>Поста с ID ' . $post_id . ' не существует</p>';
  exit;
}

$db->prepare("UPDATE posts SET views = views + 1 WHERE id = ?")->execute([$post_id]);

if (empty($post['full_text'])) {
  $post['full_text'] = $post['comment_text'];
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>	<?= $post['author'] ?> <?= (int)$post['id'] ?></title>
  <link href="./styles.css" rel="stylesheet">
</head>
<body class="page">
  <div class="layout">
    <nav class="layout__sidebar">
      <div class="layout__sidebar-nav">
        <a href="index.php">
          <img src="image/home-active.png" class="layout__sidebar-icon" alt="Home">
        </a>
      </div>
      <div class="layout__sidebar-nav">
        <a href="http://localhost/lab9/profile/">
          <img src="image/profile.png" class="layout__sidebar-icon" alt="Profile">
        </a>
      </div>
      <div class="layout__sidebar-nav">
        <img src="image/plus.png" class="layout__sidebar-icon" alt="Add">
      </div>
    </nav>
    
    <div class="layout__content">
      <div class="post-page">
        <a href="index.php" class="post-page__back-link">← Назад к ленте</a>
        <div class="post">
          <div class="post__header">
            <div class="post__user-info">
              <img src="<?=$post['avatar']?>" class="post__avatar" alt="<?=$post['author']?>">
              <div class="post__user-name-wrapper">
                <span class="post__user-name"><?=$post['author']?></span>
              </div>
            </div>
            <?php if ($post['show_edit']) : ?>
              <div class="post__edit">
                <img src="image/pen.png" class="post__edit-icon" alt="Редактировать">   
              </div>
            <?php endif; ?>
          </div>
          
          <div class="post__media">
            <img src="<?=$post['image_url']?>" class="post__image--full" alt="Photo">        
            <?php if ($post['photo_count'] > 1) : ?>
              <div class="post__counter">
                <span class="post__counter-text">1/<?=(int)$post['photo_count']?></span>
              </div>
            <?php endif; ?>
          </div>
          
          <div class="post-page__stats">
            <div class="post-page__stat-item">
              <img src="image/heart.png" class="post__like-icon" alt="Лайки">
              <span><?=(int)$post['likes']?> лайков</span>
            </div>
            <div class="post-page__stat-item">
              <span><?=(int)$post['comments_count']?> комментариев</span>
            </div>
            <div class="post-page__stat-item">
              <span><?=(int)$post['views']?> просмотров</span>
            </div>
          </div>
          
          <div class="post-page__full-text">
            <p><?=$post['full_text']?></p>
          </div>
          
          <span class="post__timestamp"><?=$post['created_at']?></span>
        </div>
      </div>
    </div>
  </div>
</body>
</html>