<?php
function getPosts() {
    return [
        1 => [
            'id'              => 1,
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
        ],
        2 => [
            'id'              => 2,
            'author'          => 'Лиза Дёмина',
            'avatar'          => 'image/avatar2.jpg',
            'image_url'       => 'image/Lenta2.jpg',
            'photo_count'     => 1,
            'likes'           => 100,
            'comment_text'    => 'Рыбки моей мечты',
            'full_text'       => 'Рыбки моей мечты! Наконец-то я их приобрела. Так долго ждала этого момента. Теперь у меня дома настоящий подводный мир!',
            'has_more'        => false,
            'publish_time'    => 'Менее часа назад',
            'show_edit'       => true,
            'comments_count'  => 7,
            'views'           => 342,
        ],
    ];
}

function getPost($id) {
    $posts = getPosts();
    return $posts[$id] ?? null;
}

function getAllPosts() {
    return getPosts();
}

$posts = getAllPosts();
?>