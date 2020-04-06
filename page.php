<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <h1 class="center"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
    <div class="post-content">
        <p><?php $this->content(); ?></p>
    </div>
    <hr>
<?php $this->need('comments.php'); ?>
<?php $this->need('footer.php'); ?>