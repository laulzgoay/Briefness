<?php
/**
 *
 * 一款简约的单栏 Typecho 主题，极致简洁的风格
 * 开发维护来自小俊
 * 感谢支持~~~~
 *
 *
 * @package Beiefness
 * @author 小俊
 * @version 1.0.0
 * @link https://www.xjisme.com/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

<?php while($this->next()): ?>
	<h1 class="center"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
	<p class="center"><?php $this->date('Y 年 n 月 j 日'); ?></p>
    <p><?php $this->excerpt(70, '...'); ?></p>
    <hr>
</br>
<?php endwhile; ?>
    <ul class="pager">
    	<li class="previous"><?php $this->pageLink('上一页'); ?></li>
        <li class="next"><?php $this->pageLink('下一页','next'); ?></li> 
        
    </ul>

 <?php $this->need('footer.php'); ?>