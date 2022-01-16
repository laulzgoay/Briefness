<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <h1 class="center"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
    <p class="center"><?php $this->date('Y 年 n 月 j 日'); ?> &nbsp; 文章总字数：<?php echo art_count($this->cid); ?> &nbsp; <?php get_post_view($this) ?>次 阅读</p>
    <p class="center">本文最后更新时间为:<?php echo date('F jS , Y \\a\t H:i a', $this->modified);?>，如果内容失效请联系博主！</p>
    <div class="post-content"></p>
        <p><?php $this->content(); ?></p>
        <div class="center"><p style="color: #ccc;">-------------------完-------------------</p></div>
    </div>

<?php if ($this->fields->articleCopyright == 'yc'):?>
<!--版权声明开始-->
<div class="card ribbon-box m-0 mt-3">
<div class="card-body">
<div class="ribbon ribbon-danger float-left"><i class="mdi mdi-copyright mr-1"></i> 版权声明</div>
<div class="mb-1 shadow-none ribbon-content">
<p>本文基于《<a target="_blank" rel="external nofollow" href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.zh">署名-非商业性使用-相同方式共享 4.0 国际 (CC BY-NC-SA 4.0)</a>》许可协议授权
<br>
文章链接：<?php $this->permalink() ?> (转载时请注明本文出处及文章链接)</p>
</div>
</div>
</div>
<!--版权声明结束-->
<?php else : ?>
<!--版权声明开始-->
<div class="card ribbon-box m-0 mt-3">
<div class="card-body">
<div class="ribbon ribbon-danger float-left"><i class="mdi mdi-copyright mr-1"></i> 版权声明</div>
<div class="mb-1 shadow-none ribbon-content">
<p>本文来自投稿，不代表本站立场,
<br>
文章链接：<?php $this->permalink() ?> (转载时请注明本文出处及文章链接)</p>
</div>
</div>
</div>
<!--版权声明结束-->
<?php endif; ?> 

<?php $this->need('comments.php'); ?>
<?php $this->need('footer.php'); ?>