<?php
add_action( 'after_setup_theme', 'MathesonDigital_setup' );
function MathesonDigital_setup()
{
	load_theme_textdomain( 'MathesonDigital', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 640;
	register_nav_menus(
		array( 'main-menu' => __( 'Main Menu', 'MathesonDigital' ) )
		);
}
add_action( 'wp_enqueue_scripts', 'MathesonDigital_load_scripts' );
function MathesonDigital_load_scripts()
{
	wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'MathesonDigital_enqueue_comment_reply_script' );
function MathesonDigital_enqueue_comment_reply_script()
{
	if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'MathesonDigital_title' );
function MathesonDigital_title( $title ) {
	if ( $title == '' ) {
		return '&rarr;';
	} else {
		return $title;
	}
}
add_filter( 'wp_title', 'MathesonDigital_filter_wp_title' );
function MathesonDigital_filter_wp_title( $title )
{
	return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'MathesonDigital_widgets_init' );
function MathesonDigital_widgets_init()
{
	register_sidebar( array (
		'name' => __( 'Sidebar Widget Area', 'MathesonDigital' ),
		'id' => 'primary-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );
	register_sidebar( array(
	'name' => 'Footer Column 1',
	'id' => 'footer-column-1',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
	register_sidebar( array(
	'name' => 'Footer Column 2',
	'id' => 'footer-column-2',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
	register_sidebar( array(
	'name' => 'Footer Column 3',
	'id' => 'footer-column-3',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
}
function MathesonDigital_custom_pings( $comment )
{
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
	<?php 
}
add_filter( 'get_comments_number', 'MathesonDigital_comments_number' );
function MathesonDigital_comments_number( $count )
{
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return '<br><br><a class="moretag" href="'. get_permalink($post->ID) . '">Continue reading &#8614;</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


// Adds "Page # of #" text to pagination
function pagination($pages = '', $range = 4)
{  
     $showitems = ($range * 2)+1;  
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages) { $pages = 1; }
     }   
 
     if(1 != $pages) { echo "<div class=\"pagination\">Page ".$paged." of ".$pages."</div>"; }
}