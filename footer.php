<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package netscape
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'netscape' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'netscape' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'netscape' ), 'Netscape', '<a href="https://youtu.be/dQw4w9WgXcQ">Angelfire Themes</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<aside class="sidebar right-sidebar">
		<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
				<?php dynamic_sidebar( 'right-sidebar' ); ?>
		<?php endif; ?>
</aside>

</div><!-- .wrapper -->
<script>
document.addEventListener("DOMContentLoaded", function() {
  const toggleBtn = document.querySelector("#menu-toggle");
  const nav = document.querySelector(".mobile-nav");

  if (toggleBtn && nav) {
    toggleBtn.addEventListener("click", function() {
			if (nav.classList.contains("is-open")) {
				nav.classList.remove('is-open');
			} else {
      	nav.classList.add('is-open');
			}
    });
  }
});
</script>

<?php wp_footer(); ?>

</body>
</html>
