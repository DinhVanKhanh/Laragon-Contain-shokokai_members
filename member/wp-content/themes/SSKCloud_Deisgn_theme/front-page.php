<?php
// session_start();

// @session_cache_limiter('private, must-revalidate'); //private_no_expire

?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/common/functions.php"; ?>

<?php get_header(); ?>

<?php

if (@$_SESSION["member"]["affiliationclss"] == "0")
	get_template_part('navi');
?>

<div id="topics">
	<div class="inner">
		<div class="info_tle">TOPICS<span>お知らせ<!--TEST from--><?php echo $_SESSION["member"]["affiliationclss"]; ?><!--TEST end--></span></div>

		<div class="info">
			<?php
			$posts = get_posts(array(
				"numberposts" => "20",
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
			
			<a href="https://portal.shoko-kai.com/Home/Login" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/common/img/login.svg" alt="商工会クラウド職員ページ" /></a>
			<a href="https://member.sorimachi.co.jp/provisional/inquiry/" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/common/img/mail_support.svg" alt="メールサポート" /></a>
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
					<li><a href="https://shoukoukai-sorimachi.jp/member/onlineseminar">ソリマチ主催オンラインセミナー申込</a></li>
					<li><a href="https://shoukoukai-sorimachi.jp/member/related-product">関連製品申込ページ（事業者代理申込用）</a></li>
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
					<li><a href="/member/wp-content/uploads/shokokai_cloud_operationmanual_2106.pdf">商工会クラウド(9.16MB)</a></li>
					<li><a href="/member/wp-content/uploads/ma1_shokokai_edtion_manual_202104.pdf">MA1商工会エディション(18.2MB)</a></li>
					<li><a href="/member/wp-content/uploads/ma1_shokokai_edtion_construction_manual_202104.pdf">MA1商工会エディション_工事台帳編(1.17MB)</a></li>
					<li><a href="/member/wp-content/uploads/MoneyLink_202104.pdf">MoneyLink(3.47MB)</a></li>
					<li><a href="/member/wp-content/uploads/mastertemplate.zip">個別研修会環境用マスターテンプレート(72.0KB)</a></li>
					<li><a href="https://shoukoukai-sorimachi.jp/member/manual_download/master_template">新規作成用テンプレート</a></li>
				</ul>
			</div>

			<div class="cts_box">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/common/img/icon_manual.svg" width="70" class="icon" />
				<h1>推進資料ダウンロード</h1>
				<ul>
					<li><a href="https://shoukoukai-sorimachi.jp/member/promotion_material">各種製品ロゴ</a></li>
					<li><a href="https://shoukoukai-sorimachi.jp/member/promotion_material/catalog_download">各種推進用カタログ</a></li>
				</ul>
			</div>

			<!-- /.inner -->
		</div>

		<div class="bnr">
			<ul>
				<li><a href="https://www.sorimachi.co.jp/j/sc_user/" target="_blank"><img src="https://shoukoukai-sorimachi.jp/member/wp-content/uploads/SSKCloud_Deisgn.jpg" width="180" height="180" ></a></li>
				<li><a href="https://www.sorimachi.co.jp/lp-moneylink/form.php" title="MoneyLink" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/bnr_moneylink.jpg" width="180" height="180" /></a></li>
				<li><a href="https://mr1.shoko-kai.com/A/A/AA0101.aspx"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/bnr_mr1.jpg" width="180" height="180" /></a></li>
				<li><a href="https://www.sorimachi.co.jp/officecloud/tablet/" title="タブレット会計" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/bnr_tablet.jpg" width="180" height="180" /></a></li>
				<?php
				if (@$_SESSION["member"]["affiliationclss"] == "0") : ?>
					<!--<li><a href="/member/wp-content/uploads/supply_sample__202104" title="サプライ" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/bnr_sorimachi.jpg" width="180" height="180" /></a></li>-->
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

