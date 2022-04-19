<?php
/*
Template Name:single-information
*/
?>

<?php get_header(); ?>

<div id="contents_cms" class="clearfix">
<div class="inner">


<div class="nr_area">
<h1><?php the_title(); ?></h1>
<div class="txt_right marB30"><time>公開日：<?php the_time('Y年m月d日');?></div>

<article>
<?php if(have_posts()):while(have_posts()):the_post(); ?>
<?php the_content(); ?>
<?php endwhile;endif; ?>
</article>
</div>

<!-- /.inner -->
</div>
<!-- /#contents -->
</div>

<?php get_footer(); ?>

</body>
</html>