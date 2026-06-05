<?php
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