<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Cargo Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php if(is_singular() && pings_open()) { ?>
	<link rel="pingback" href="<?php echo esc_url(get_bloginfo( 'pingback_url' )); ?>">
<?php } ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<a class="skip-link screen-reader-text" href="#sitemain">
	<?php esc_html_e( 'Skip to content', 'cargo-lite' ); ?>
</a>

<header id="header" class="header">
	<div class="inner-header">
		<div class="align">
		
			<div class="header-left">
				<?php if ( has_custom_logo() ) { ?>
				<div class="custom-logo">
					<?php cargo_lite_the_custom_logo(); ?>
				</div><!-- cutom logo -->
				<?php } ?>
				<div class="site-title-desc">
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a>
					</h1>
					<?php
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) :
							echo '<p class="site-description">'.esc_html($description).'</p>';
						endif;
					?>
				</div><!-- site-title-desc -->
			</div><!-- header left -->
			
			<div class="header-right">
				<?php
					get_template_part('template-parts/nav');
				?>
			</div><!-- header right -->
			<?php
				if( get_theme_mod('cargo_hide_btn',true) == '' ){
			?>
			<div class="header-button">
				<a href="<?php echo esc_url( get_theme_mod('cargo_headbtn_lnk') ); ?>"><?php echo esc_html(get_theme_mod('cargo_headbtn_txt')); ?></a>
			</div>
			<?php } ?>
			
		</div><!-- align -->
	</div><!-- inner header -->
</header><!-- header -->