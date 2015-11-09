<?php global $wp_query; if ( $wp_query->max_num_pages > 1 ) { ?>
<nav id="nav-below" class="navigation" role="navigation">
	<div class="older"><?php next_posts_link(sprintf( __( '%s Older Articles', 'MathesonDigital' ), '<span class="meta-nav">&larr;</span>' ) ) ?></div>
	<div class="newer"><?php previous_posts_link(sprintf( __( 'Newer Articles %s', 'MathesonDigital' ), '<span class="meta-nav">&rarr;</span>' ) ) ?></div>
	<div class="clearfix"></div>
	<?php pagination($additional_loop->max_num_pages); ?>
</nav>
<?php } ?>