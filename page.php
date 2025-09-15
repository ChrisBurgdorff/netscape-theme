<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package netscape
 */

get_header();
?>
	<div id="page">
  
  	<!-- Left Sidebar -->
  	<?php get_sidebar('left'); ?>

		
		<!-- Right Sidebar -->
		<?php get_sidebar('right'); ?>

	</div><!-- #page -->
<?php
get_sidebar();
get_footer();
