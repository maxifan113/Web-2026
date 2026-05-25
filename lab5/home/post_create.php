<?php
/**
 * Шаблон превью одного поста
 * 
 * @var array $post Данные текущего поста
 */
?>

<div class="post-fild">
    <div class="usser">
        <div class="avatar-name-fild">
            <img src="<?= htmlspecialchars($post['avatar']) ?>" 
                 class="user-avatar-mini" 
                 alt="<?= htmlspecialchars($post['author']) ?>">
            <div class="usser-name-fild">
                <span class="usser-name"><?= htmlspecialchars($post['author']) ?></span>
            </div>
        </div>

        <?php if ($post['show_edit']) : ?>
            <div class="edit-fild">
                <img src="image/pen.png" alt="Редактировать">   
            </div>
        <?php endif; ?>
    </div>

    <div class="photo-fild">
        <a href="post.php?postId=<?= (int) $post['id'] ?>" title="<?= htmlspecialchars($post['author']) ?>">
          <img src="<?= htmlspecialchars($post['image_url']) ?>" class="lenta-photo" alt="Photo">
        </a>
        
        <?php if ($post['photo_count'] > 1) : ?>
            <div class="number-container">
              <span class="number-photo">1/<?= (int) $post['photo_count'] ?></span>
            </div>
        <?php endif; ?>
    </div>

    <div class="like-fild">
        <div class="like-image-fild">
            <img src="image/heart.png" class="like-size" alt="Like">
        </div>
        <div class="like-count-fild">
            <span class="like-count"><?= (int) $post['likes'] ?></span>
        </div>
    </div>

    <div class="coment-fild">
        <!-- ИСПРАВЛЕНО: используем правильный путь -->
        <a href="post.php?postId=<?= (int) $post['id'] ?>"  title="Читать комментарий <?= htmlspecialchars($post['author']) ?>">
            <span class="like-count"><?= htmlspecialchars($post['comment_text']) ?></span>
        </a>
        
        <?php if ($post['has_more']) : ?>
            <a href="post.php?postId=<?= (int) $post['id'] ?>" class="help-data">ещё</a>
        <?php endif; ?>
    </div>
    
    <span class="publishing-time"><?= htmlspecialchars($post['publish_time']) ?></span>
</div>