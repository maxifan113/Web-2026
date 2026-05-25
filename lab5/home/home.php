<?php
/**
 * Главная страница с лентой постов
 * 
 * @package SocialNetwork
 */

// Данные постов из реального HTML
$posts = [
    [
        'id'              => 1,  // ← ДОБАВИЛИ ID
        'author'          => 'Ваня Денисов',
        'avatar'          => 'image/avatar1.jpg',
        'image_url'       => 'image/lenta1.jpg',
        'photo_count'     => 3,
        'likes'           => 203,
        'comment_text'    => 'Так красиво сегодня на улице! Настоящая зима)) Вспоминается Бродский: «Поздно ночью, в уснувшей долине, на самом дне...',
        'has_more'        => true,
        'publish_time'    => '2 часа назад',
        'show_edit'       => true,
    ],
    [
        'id'              => 2,  // ← ДОБАВИЛИ ID
        'author'          => 'Лиза Дёмина',
        'avatar'          => 'image/avatar2.jpg',
        'image_url'       => 'image/Lenta2.jpg',
        'photo_count'     => 1,
        'likes'           => 100,
        'comment_text'    => 'Рыбки моей мечты',
        'has_more'        => false,
        'publish_time'    => 'Менее часа назад',
        'show_edit'       => true,
    ],
];
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
            <div class="lenta-fild">
                <?php foreach ($posts as $post) : ?>
                    <?php include 'post_create.php'; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>