<div class="clear"></div>
</div>
<footer id="footer" style="color: #7A7B7C; background-color: #3A3B3C;background-image: url(<?php echo get_template_directory_uri(); ?>/img/texture.png),linear-gradient(to bottom, #3A3B3C, #1d1e1e); background-repeat: repeat, no-repeat; background-position: left top, left top; background-size: 100px 100px, 100% 100%;">
	<div id="footer-container">
		<div class="footer-column">
			<?php
			if(is_active_sidebar('footer-column-1')){
				dynamic_sidebar('footer-column-1');
			}
			?>
		</div>
		<div class="footer-column">
			<?php
			if(is_active_sidebar('footer-column-2')){
				dynamic_sidebar('footer-column-2');
			}
			?>
		</div>
		<div class="footer-column">
			<?php
			if(is_active_sidebar('footer-column-3')){
				dynamic_sidebar('footer-column-3');
			}
			?>
		</div>
	<div class="clearfix"></div>
	</div>
	<div id="copyright">
		<?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'MathesonDigital' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); ?>
	</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>