<?php
/**
 * The navigation for our theme.
 *
 * Display all information related to navigation
 *
 * @package Cargo Lite
**/
?>
<div class="toggle">
	<a class="toggleMenu" href="#"><?php esc_html_e('Menu','cargo-lite'); ?></a>
</div><!-- toggle -->

<nav id="main-navigation" class="site-navigation primary-navigation sitenav" role="navigation">
	<?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
</nav><!-- main-navigation -->