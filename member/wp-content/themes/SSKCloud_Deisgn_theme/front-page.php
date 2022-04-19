<?php
// session_start();

// @session_cache_limiter('private, must-revalidate'); //private_no_expire

?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/common/functions.php"; ?>

<?php get_header(); ?>

<?php

if (@$_SESSION["member"]["status"] != "2")
	get_template_part('navi');
?>

<div id="topics">
	<div class="inner">
		<div class="info_tle">TOPICS<span>お知らせ</span></div>

		<div class="info">
			<?php
			$posts = get_posts(array(
				"category" => "2" // カテゴリIDもしくはスラッグ名
			));
			?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<dl>
						<dt><?php the_time('Y/m/d'); ?></dt>
						<dd>
							<div id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
						</dd>
				<?php endwhile;
			endif; ?>
					</dl>
					<!-- /.info -->
		</div>

		<div class="login">
			商工会クラウド<br>ポータルログイン

			<span>Login</span>
			<img src="<?php bloginfo('stylesheet_directory'); ?>/common/img/login.svg" alt="商工会クラウド職員ページ" />
			<!-- /.login -->
		</div>
		<!-- /.inner -->
	</div>
	<!-- /#topics -->
</div>

<div id="contents" class="clearfix">
	<div class="inner">
		<div class="cts">
			<div class="cts_box">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/common/img/icon_seminar.svg" width="70" class="icon" />
				<h1>各種申込ページ</h1>
				<ul>
					<li><a href="#">ソリマチ主催オンラインセミナー申込</a></li>
					<li><a href="#">関連製品申込ページ（事業者代理申込用）</a></li>
				</ul>
			</div>

			<div class="cts_box">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/common/img/icon_movie.svg" width="70" class="icon" />
				<h1>動画コンテンツ</h1>
				<ul>
					<li><a href="<?php echo esc_url(home_url('/')); ?>category/movie/about_movie" title="動画コンテンツ">動画コンテンツ</a></li>
				</ul>
			</div>

			<div class="cts_box">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/common/img/icon_manual.svg" width="70" class="icon" />
				<h1>マニュアルダウンロード</h1>
				<ul>
					<li><a href="#">商工会クラウド(0.0MB)</a></li>
					<li><a href="#">MA1(0.0MB)</a></li>
					<li><a href="#">MoneyLink(0.0MB)</a></li>
					<li><a href="#">Web MR1(0.0MB)</a></li>
				</ul>
			</div>

			<div class="cts_box">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/common/img/icon_manual.svg" width="70" class="icon" />
				<h1>推進資料ダウンロード</h1>
				<ul>
					<li><a href="#">商工会クラウドカタログ(0.0MB)</a></li>
					<li><a href="#">MA1カタログ(0.0MB)</a></li>
					<li><a href="#">MoneyLinkチラシ(0.0MB)</a></li>
					<li><a href="#">Web MR1チラシ(0.0MB)</a></li>
				</ul>
			</div>

			<!-- /.inner -->
		</div>

		<div class="bnr">
			<ul>
				<li><a href="https://www.sorimachi.co.jp/lp-moneylink/form.php" title="MoneyLink" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/bnr_moneylink.jpg" width="180" height="180" /></a></li>
				<li><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/bnr_mr1.jpg" width="180" height="180" /></a></li>
				<li><a href="https://www.sorimachi.co.jp/officecloud/tablet/" title="タブレット会計" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/bnr_tablet.jpg" width="180" height="180" /></a></li>
				<?php
				if (@$_SESSION["member"]["status"] != "2") : ?>
					<li><a href="#" title="タブレット会計" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/bnr_sorimachi.jpg" width="180" height="180" /></a></li>

				<?php
				endif;
				?>
			</ul>
			<!-- /.bnr -->
		</div>

		<!-- /.inner -->
	</div>
	<!-- /#contents -->
</div>

<?php get_footer(); ?>

</body>

</html>
<script>
	// function logout() {
	// 	<?php
			// 	session_destroy();
			// 	
			?>
	// 	location.href='/';
	// }
</script>