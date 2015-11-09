<div class="entry-footer">
<span class="cat-links"><?php _e( 'Categories: ', 'MathesonDigital' ); ?><?php the_category( ', ' ); ?></span>
<?php if ( comments_open() ) { 
echo '<span class="meta-sep">|</span> <span class="comments-link"><a href="' . get_comments_link() . '">' . sprintf( __( 'Comments', 'MathesonDigital' ) ) . '</a></span>';
} ?>
</div> 