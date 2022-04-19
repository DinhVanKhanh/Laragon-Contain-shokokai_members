<?php
/*
Template Name:アーカイブ_ソリマチ株式会社
*/
?>

<?php get_header(); ?>

<div id="contents_cms" class="clearfix">
<div class="inner">


<div class="nr_area">
<h1>動画コンテンツ<span class="fs2">－<?php $category = get_the_category(); $cat_name = $category[0]->cat_name; echo $cat_name; ?>－</span></h1>
<p>商工会クラウドの概要や操作方法に関する動画や法令改正のポイントの動画などをご視聴いただけます。</p>

<ul class="movie_category">
<li><a href="<?php echo get_category_link( 4 );?>">
<?php echo $cat_name = get_the_category_by_ID( 4 ); ?></a></li>
<li><a href="<?php echo get_category_link( 5 );?>">
<?php echo $cat_name = get_the_category_by_ID( 5 ); ?></a></li>
<li><a href="<?php echo get_category_link( 6 );?>">
<?php echo $cat_name = get_the_category_by_ID( 6 ); ?></a></li>
</ul>

<?php query_posts($query_string .'&order=ASC'); ?>
<?php if(have_posts()):while(have_posts()):the_post(); ?>
<div class="movie_bx">
<h3><?php the_title(); ?></h3>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" target="_blank" data-lity="data-lity">
<?php the_post_thumbnail( array( 293, 150 ) ); ?>
</a>
</div>
<?php endwhile;endif; ?>

<div class="clearfix"></div>
<!-- /.inner -->
</div>
<!-- /#contents -->
</div>

<?php get_footer(); ?>

</body>
</html>