<!DOCTYPE html>
<html dir="ltr" lang="ja">
<html prefix="og: http://ogp.me/ns#">
<head>
<title>
<?php if(is_home()): ?>
<?php bloginfo('name'); ?>

<?php elseif(is_page()): ?>
<?php wp_title(''); ?> ｜ <?php bloginfo('name'); ?>

<?php elseif(is_single()): ?>
<?php wp_title(''); ?> ｜ <?php bloginfo('name'); ?>

<?php elseif(is_category()): ?>
<?php single_cat_title() ?>の記事一覧 ｜ <?php bloginfo('name'); ?>

<?php elseif(is_month()): ?>
<?php the_time("Y年m月") ?>の記事一覧 ｜ <?php bloginfo('name'); ?>

<?php elseif(is_year()): ?>
<?php the_time("Y年") ?>の記事一覧 ｜ <?php bloginfo('name'); ?>

<?php elseif(is_search()): ?>
検索結果 ｜ <?php bloginfo('name'); ?>

<?php else: ?>
<?php bloginfo('name'); ?>

<?php endif; ?>
</title>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="robots" content="noindex">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<!-- [BASIC] -->
<meta name="description" content="">
<!-- [CSS] -->	
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/common/css/import.css" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lity/1.6.6/lity.css" />
<!-- [JavaScript] -->	
<script src="<?php bloginfo('stylesheet_directory'); ?>/common/js/common.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/common/js/footerFixed.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lity/1.6.6/lity.js"></script>
</head>

<body>
<header>
<div class="inner">
<div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/common/img/site_logo.svg" alt="商工会クラウド職員サイト" /></a></div>
<div class="primary_nav">
<ul>
<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>about" title="商工会クラウド概要">商工会クラウド概要</a></li>
<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>about/howtouse" title="商工会クラウド職員サイトの使い方">商工会クラウド職員サイトの使い方</a></li>
<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>about/attention" title="注意事項">注意事項</a></li>
</ul>
<a href="https://www.sorimachi.co.jp/" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/common/img/logo.svg" alt="ソリマチ株式会社" width="250" /></a>
</div>
<!--/.primary_nav-->
</div>
<!-- /.inner -->
</header>
<!-- /header -->