<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Jumbo
 */
?>
		</div>
	</div>
	<div class="container">
		<?php if(is_front_page() ) { ?>


		<?php } else {
			echo "<h1>My interior Page</h1>";
		} ?>
	</div>
	<div class="container">
		<hr>
		<footer class="site-footer" role="contentinfo">
			<div class="site-info">
				<p class="pull-right">
					<a href="#"><i class="fa fa-arrow-up"></i> Back to top</a>
				</p>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'cover' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'cover' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'Jumbo' ), 'Jumbo', '<a href="http://www.mickdupont.com" rel="designer">Mickdupont.com</a>' ); ?>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->

	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<?php wp_footer(); ?>

</body>
</html>
