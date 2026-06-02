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
  <title><?= $post['author'] (int)$post['id'] ?></title>
  <link href="./styles.css" rel="stylesheet">
</head>
<body class="clear-border-in-body">
  <div class="main-container">
    <nav class="sidebar-fild">
      <div class="pages-fild">
        <a href="index.php">
          <img src="image/home-active.png" class="Smart-button" alt="Home">
        </a>
      </div>
      <div class="pages-fild">
        <a href="#">
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
        <a href="index.php" class="back-link">← Назад к ленте</a>
        <div class="post-fild">
          <div class="usser">
            <div class="avatar-name-fild">
              <img src="<?= $post['avatar'] ?>" class="user-avatar-mini" alt="<?= $post['author'] ?>">
              <div class="usser-name-fild">
                <span class="usser-name"><?= $post['author'] ?></span>
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
          <span class="publishing-time">
            <?=date('d.m.Y в H:i', strtotime($post['created_at']))?>
          </span>
        </div>
      </div>
    </div>
  </div>
</body>
</html>