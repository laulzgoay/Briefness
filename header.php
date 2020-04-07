<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html>

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
	<link type="image/png" rel="shortcut icon" href="<?php $this->options->themeUrl('./img/favicon.ico'); ?>" />
	<?php $this->header(); ?>
	<link type="text/css" rel="stylesheet" href="<?php $this->options->themeUrl('style.css?v=3.0'); ?>">
	<link type="text/css" rel="stylesheet" href="<?php $this->options->themeUrl('./assets/css/lightbox.css'); ?>">
  <?php if (!empty($this->options->tools) && in_array('prism', $this->options->tools)): ?>
  <link href="<?php echo theurl; ?>./prism/prism.css?v=1.0.5" rel="stylesheet">
  <link href="<?php echo theurl; ?>./prism/line-numer.css?v=1.0.5" rel="stylesheet"><?php endif; ?>
	<script type="text/javascript" src="<?php $this->options->themeUrl('./assets/js/main.js?v=0.1'); ?>"></script>
    <link type="text/css" rel="stylesheet" href="<?php $this->options->themeUrl('./assets/css/clickright.css'); ?>"/>

<div class="usercm" style="left: 199px; top: 5px; display: none;">
    <ul>
        <li><a href="<?php $this->options->siteUrl(); ?>"><i class="fa fa-home fa-fw"></i><span>首页</span></a></li>
        <li><a href="javascript:void(0);" onclick="getSelect();"><i class="fa fa-copy fa-fw"></i><span>复制</span></a></li>
        <li><a href="javascript:void(0);" onclick="baiduSearch();"><i class="fa fa-search fa-fw"></i><span>搜索</span></a></li>
        <li><a href="javascript:history.go(1);"><i class="fa fa-arrow-right fa-fw"></i><span>前进</span></a></li>
        <li><a href="javascript:history.go(-1);"><i class="fa fa-arrow-left fa-fw"></i><span>后退</span></a></li>
        <li style="border-bottom:1px solid gray"><a href="javascript:window.location.reload();"><i class="fa fa-refresh fa-fw"></i><span>重载网页</span></a></li>
        <li><a href="<?php $this->options->siteUrl(); ?>links.html"><i class="fa fa-meh-o fa-fw"></i><span>和我当邻居</span></a></li>  
           <li><a href="<?php $this->options->siteUrl(); ?>about.html"><i class="fa fa-pencil-square-o fa-fw"></i><span>关于博主</span></a></li>
    </ul>
</div>
<<script type="text/javascript" src="<?php $this->options->themeUrl('./assets/js/clickright.js'); ?>"></script>

</head>

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
  ▐▒▀▐▀▐▀▒▒▄▄▒▄▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▌
  ▐▒▒▒▀▀▄▄▒▒▒▄▒▒▒▒▒▒░░░░░░▒▒▒▐
   ▌▒▒▒▒▒▒▀▀▀▒▒▒▒▒▒▒▒░░░░▒▒▒▒▌
   ▐▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▐
    ▀  ▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▄▒▒▒▒▌
      ▀▄▒▒▒▒▒▒▒▒▒▒▄▄▄▀▒▒▒▒▄▀
     ▐▀▒▀▄▄▄▄▄▄▀▀▀▒▒▒▒▒▄▄▀
    ▐▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▀▀
--你看源码时_是否期待源码也同样注视(注释)着你
-->

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