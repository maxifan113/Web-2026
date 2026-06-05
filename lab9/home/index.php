<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config/database.php';

$db = Database::getInstance()->getConnection();

$stmt = $db->query("
    SELECT 
        p.*,
        u.username as author,
        u.avatar_url as avatar,
        1 as show_edit
    FROM posts p
    INNER JOIN users u ON p.user_id = u.id
    ORDER BY p.created_at DESC
");

$posts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="./styles.css" rel="stylesheet">
</head>
<body class="page">
  <div class="layout">
    <nav class="layout__sidebar">
      <img src="image/home-active.png" class="layout__sidebar-nav" alt="Home">
      <a href="http://localhost/lab9/profile/">
        <img src="image/profile.png" class="layout__sidebar-nav" alt="Profile">
      </a>
      <img src="image/plus.png" class="layout__sidebar-nav" alt="Add">
    </nav>
    
    <div class="layout__content">
      <div class="layout__feed">
        <?php foreach ($posts as $post) : ?>
          <?php include 'post_create.php'; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</body>
</html>