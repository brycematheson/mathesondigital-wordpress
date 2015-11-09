<?php
/*
Template Name: Blog Template
*/
?>
<?php get_header(); ?>
<section id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article>
	<h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	<span class="post-date">Published <?php the_time('F jS, Y'); ?></span>
	<p><?php the_excerpt(); ?></p>
	<hr class="divider">
	</article>
<?php comments_template(); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</section>
<?php get_footer(); ?>