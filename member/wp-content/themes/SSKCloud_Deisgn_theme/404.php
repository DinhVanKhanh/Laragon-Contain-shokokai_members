<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/common/functions.php"; ?>
<?php
if (checkLogin("member") !== true)
	redirect('/err.php');
?>

<?php get_header(); ?>
<div id="contents_cms" class="clearfix">
	<div class="inner">

		<h1>お探しのページが見つかりませんでした</h1>

		<p>ご不便おかけし申し訳ございません。</p>
		<p>このページは一時的にアクセスできない状況にあるか、URLが変更・削除された可能性があります。<br>
			トップぺージより再度アクセスをお願いします。</p>

		<!-- /.inner -->
	</div>
	<!-- /#contents -->
</div>

<?php get_footer(); ?>

</body>

</html>