<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <h1 class="center"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
    <p class="center"><?php $this->date('Y 年 n 月 j 日'); ?></p>
    <div class="post-content">
        <p><?php $this->content(); ?></p>
        <div class="center"><p style="color: #ccc;">-------------完-------------</p></div>
    </div>
<?php $this->need('comments.php'); ?>
<?php $this->need('footer.php'); ?>