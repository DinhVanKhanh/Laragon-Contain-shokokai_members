<?php
// require_once $_SERVER['DOCUMENT_ROOT'] . "/common/functions.php";

// if (checkLogin("member") !== true)
	// redirect('/');
?> 
<?php get_header(); ?>

<div id="contents_cms" class="clearfix">
	<div class="inner">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
		<?php endwhile;
		endif; ?>

		<!-- /.inner -->
	</div>
	<!-- /#contents -->
</div>

<?php get_footer(); ?>

</body>

</html>