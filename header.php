<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html>

<!--
           ▄              ▄
          ▌▒█           ▄▀▒▌
          ▌▒▒▀▄        ▀▒▒▒▐
         ▐▄▀▒▒▀▀▀▀▄▄▄▀▒▒▒▒▒▐
       ▄▄▀▒▒▒▒▒▒▒▒▒▒▒█▒▒▄█▒▐
     ▄▀▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒█▒▒▒▒▒▐
    ▐▒▒▒▄▄▄▒▒▒▒▒▒▒▒▒▒▒▒▒▀▄▒▒▌
    ▌▒▒▐▄█▀▒▒▒▒▄▀█▄▒▒▒▒▒▒▒█▒▐
   ▐▒▒▒▒▒▒▒▒▒▒▒▌██▀▒▒▒▒▒▒▒▒▀▄▌
   ▌▒▀▄██▄▒▒▒▒▒▒▒▒▒▒▒░░░░▒▒▒▒▌
   ▌▀▐▄█▄█▌▄▒▀▒▒▒▒▒▒░░░░░░▒▒▒▐
  ▐▒▀▐▀▐▀▒▒▄▄▒▄▒▒▒  typecho  ▒▌
  ▐▒▒▒▀▀▄▄▒▒▒▄▒▒▒▒▒▒░░░░░░▒▒▒▐
   ▌▒▒▒▒▒▒▀▀▀▒▒▒▒▒▒▒▒░░░░▒▒▒▒▌
   ▐▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▐
    ▀  小俊  ▒▒▒▒▒▒▒▒▒▒▒▄▒▒▒▒▌
      ▀▄▒▒▒▒▒▒▒▒▒▒▄▄▄▀▒▒▒▒▄▀
     ▐▀▒▀▄▄▄▄▄▄▀▀▀▒▒▒▒▒▄▄▀
    ▐▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▀▀
--你看源码时_是否期待源码也同样注视(注释)着你
-->

<head>
    <title><?php $this->archiveTitle(array(), '', ' - '); ?><?php $this->options->title(); ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
	<meta name="publisher" content="<?php $this->author(); ?>">
	<meta name="viewport" content="initial-scale=1, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="white" />
	<meta name="apple-mobile-web-app-title" content="<?php $this->author(); ?>">
	<link rel="shortcut icon" type="image/png" href="<?php $this->options->themeUrl('img/favicon.png'); ?>" />
	<?php $this->header(); ?>
	<link rel="stylesheet" href="<?php $this->options->themeUrl('style.css?v=3.0'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('./assets/css/lightbox.css'); ?>">
	<script type="text/javascript" src="<?php $this->options->themeUrl('./assets/js/main.js?v=0.1'); ?>"></script>

</head>
<body id="page">
<div class="container">
	<header>
		<div id="wrap">
		  	<h1><a href="<?php $this->options->siteUrl(); ?>" class="logo"><?php $this->options->title() ?></a></h1>
		    <nav id="nav">
		      <ul>
		        <li><a href="<?php $this->options->siteUrl(); ?>">主页</a></li>
                <?php $this->widget('Widget_Contents_Page_List')
               ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
		      </ul>
		    </nav>
		</div>
	</header>
	<div class="main">