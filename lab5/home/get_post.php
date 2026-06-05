<?php
require_once 'data.php';

$post_id = isset($_GET['postId']) ? (int) $_GET['postId'] : 0;
$post = getPost($post_id);

if (!$post) {
    header('HTTP/1.0 404 Not Found');
    echo '<h1>Пост не найден</h1>';
    exit;
}
?>