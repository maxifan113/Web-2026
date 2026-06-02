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
    <a href="post.php?postId=<?=(int)$post['id'] ?>" class="post__media-link" title="<?=$post['author']?>">
      <img src="<?=$post['image_url']?>" class="post__image" alt="Photo">
    </a>    
    <?php if ($post['photo_count'] > 1) : ?>
      <div class="post__counter">
        <span class="post__counter-text">1/<?=(int)$post['photo_count']?></span>
      </div>
    <?php endif; ?>
  </div>
  
  <div class="post__actions">
    <div class="post__like">
      <img src="image/heart.png" class="post__like-icon" alt="Like">
    </div>
    <div class="post__like-count-wrapper">
      <span class="post__like-count"><?=(int)$post['likes']?></span>
    </div>
  </div>

  <div class="post__comment">
    <a href="post.php?postId=<?=(int)$post['id']?>" class="post__comment-link" title="Читать комментарий <?=$post['author']?>">
      <span class="post__comment-text"><?=$post['comment_text']?></span>
    </a>    
    <?php if ($post['has_more']) : ?>
      <a href="post.php?postId=<?= (int)$post['id'] ?>" class="post__more-link">ещё</a>
    <?php endif; ?>
  </div>
    
  <span class="post__timestamp">
    <?php 
    $date = new DateTime($post['created_at']);
    echo $date->format('d.m.Y в H:i');
    ?>
  </span>
</div>