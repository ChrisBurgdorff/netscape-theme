<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package netscape
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wrapper">

    <div class="mobile-nav-open-button">
        <span class="dashicons dashicons-menu" id="menu-toggle">MENU</span>
        <!--<strong>Toggle Menu</strong>-->
				<div class="mobile-nav">
					<?php
							wp_nav_menu( array(
									'theme_location' => 'secondary',
									'menu_id'        => 'secondary-menu',
							) );
					?>
				</div>
    </div>

    <nav class="nav theme-navigation">
        <h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php bloginfo( 'name' ); ?>
        </a></h2>

        <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
            ) );
        ?>

        <?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>
            <?php dynamic_sidebar( 'left-sidebar' ); ?>
        <?php endif; ?>
    </nav>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'netscape' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Home</a></p>
				
				<?php
			endif;
			$netscape_description = get_bloginfo( 'description', 'display' );
			if ( ($netscape_description || is_customize_preview()) && is_front_page() && is_home() ) :
				?>
				<p class="marquee margin"><span class="inner-marquee"><?php echo $netscape_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span></p>
			<?php endif; ?>
		<?php if (is_page()): ?>
			<main id="primary" class="site-main">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		<?php endif; ?>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->
