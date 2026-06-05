<?php
require_once 'config/database.php';

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

$post_id = isset($_GET['postId']) ? (int) $_GET['postId'] : 0;
if ($post_id === 0) {
  header('HTTP/1.0 404 Not Found');
  echo '<h1>Пост не найден</h1>';
  exit;
}

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