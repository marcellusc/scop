<?php
/**
 * Cargo Lite Theme Customizer
 *
 * @package Cargo Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cargo_lite_customize_register( $wp_customize ) {
	
function cargo_lite_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
	
	$wp_customize->get_setting( 'blogname' )->cargo_lite         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->cargo_lite  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
	    'selector' => 'h1.site-title',
	    'render_callback' => 'cargo_lite_customize_partial_blogname',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
	    'selector' => 'p.site-description',
	    'render_callback' => 'cargo_lite_customize_partial_blogdescription',
	) );

	$wp_customize->add_setting('headerbg-color', array(
		'default' => '#ffffff',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'headerbg-color',array(
			'label' => __('Main Header Background Color','cargo-lite'),
			'description'	=> __('Select background color for header.','cargo-lite'),
			'section' => 'colors',
			'settings' => 'headerbg-color'
		))
	);
	
	$wp_customize->add_setting('color_scheme', array(
		'default' => '#f8bf02',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','cargo-lite'),
			'description'	=> __('Select theme main color from here.','cargo-lite'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_setting('color_sub_scheme', array(
		'default' => '#171717',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_sub_scheme',array(
			'description'	=> __('Select theme sub color from here.','cargo-lite'),
			'section' => 'colors',
			'settings' => 'color_sub_scheme'
		))
	);

	$wp_customize->add_setting('footer-color', array(
		'default' => '#0B0B0B',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
		
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'footer-color',array(
			'label' => __('Footer Background Color','cargo-lite'),
			'description'	=> __('Select background color for footer.','cargo-lite'),
			'section' => 'colors',
			'settings' => 'footer-color'
		))
	);
	
	/***************************************
	** Theme Setup Option Panel
	***************************************/
	
	// Theme Options Panel
	$wp_customize->add_panel( 'cargo_theme_options', 
		array(
			'title'            => __( 'Theme Setup', 'cargo-lite' ),
			'description'      => __( 'Theme Modifications like color scheme, theme texts and layout preferences can be done here', 'cargo-lite' ),
		) 
	);
	// Header bttuon Section Inside Theme Options Panel
	$wp_customize->add_section( 'cargo_header_btn', 
		array(
			'title'         => __( 'Header Button', 'cargo-lite' ),
			'priority'      => 1,
			'panel'         => 'cargo_theme_options',
			'description'      => __( 'Alter header button text and link from here or hide it.', 'cargo-lite' ),
		) 
	);
	
	$wp_customize->add_setting('cargo_headbtn_txt',array(
		'sanitize_callback'	=> 'sanitize_text_field',
		'transport' => 'refresh'
	));

	$wp_customize->add_control('cargo_headbtn_txt',array(
		'type'	=> 'text',
		'label'	=> __('Add Button text here.','cargo-lite'),
		'section'	=> 'cargo_header_btn'
	));

	$wp_customize->add_setting('cargo_headbtn_lnk',array(
		'sanitize_callback'	=> 'esc_url_raw',
		'transport' => 'refresh'
	));

	$wp_customize->add_control('cargo_headbtn_lnk',array(
		'type'	=> 'url',
		'label'	=> __('Add Button url here.','cargo-lite'),
		'section'	=> 'cargo_header_btn'
	));
	
	$wp_customize->selective_refresh->add_partial('cargo_headbtn_txt', array(
        'selector' => '.header-button a'
    ));

	$wp_customize->add_setting('cargo_hide_btn',array(
		'default' => true,
		'sanitize_callback' => 'cargo_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'cargo_hide_btn', array(
		'settings' => 'cargo_hide_btn',
		'label'     => __('Check to hide header button','cargo-lite'),
		'section'   => 'cargo_header_btn',
		'type'      => 'checkbox'
	));
	
	// Slider Section Inside Theme Options Panel
	$wp_customize->add_section( 'cargo_slider', 
		array(
			'title'         => __( 'Slider', 'cargo-lite' ),
			'priority'      => 2,
			'panel'         => 'cargo_theme_options',
			'description'      => __( 'Recommended image size (1400x800). Slider will work only when you select the static front page.', 'cargo-lite' ),
		) 
	);
	$wp_customize->add_setting('slide1',array(
		'default' => '0',
		'transport' => 'refresh',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('slide1',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for slide one:','cargo-lite'),
		'section'	=> 'cargo_slider'
	));
	
	$wp_customize->add_setting('slide2',array(
		'default' => '0',
		'transport' => 'refresh',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('slide2',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for slide two:','cargo-lite'),
		'section'	=> 'cargo_slider'
	));
	
	$wp_customize->add_setting('slide3',array(
		'default' => '0',
		'transport' => 'refresh',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('slide3',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for slide three:','cargo-lite'),
		'section'	=> 'cargo_slider'
	));
	
	$wp_customize->selective_refresh->add_partial('slide1', array(
        'selector' => '#cargo_slider'
    ));
	
	$wp_customize->add_setting('cargo_slider_btn',array(
		'default'	=> __('Read More','cargo-lite'),
		'transport' => 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('cargo_slider_btn',array(
		'label'	=> __('Add slider read more button text.','cargo-lite'),
		'section'	=> 'cargo_slider',
		'setting'	=> 'cargo_slider_btn',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('cargo_slider_hd',array(
		'default' => true,
		'sanitize_callback' => 'cargo_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'cargo_slider_hd', array(
		'settings' => 'cargo_slider_hd',
		'section'   => 'cargo_slider',
		'label'     => __('Check this to hide slider.','cargo-lite'),
		'type'      => 'checkbox'
	));
	
	// First Section Inside Theme Options Panel
	$wp_customize->add_section( 'cargo_about', 
		array(
			'title'         => __( 'First Section', 'cargo-lite' ),
			'priority'      => 3,
			'panel'         => 'cargo_theme_options',
			'description'      => __( 'Select page to display first section of theme. This will work only when you select the static front page', 'cargo-lite' ),
		)
	);
	
	$wp_customize->add_setting( 'cargo_about_sec', array(
			'default'	=> __('','cargo-lite'),
			'transport' => 'refresh',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control('cargo_about_sec',array(
		'label'	=> __('Add sub title here.','cargo-lite'),
		'section'	=> 'cargo_about',
		'setting'	=> 'cargo_about_sec',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('cargo_abtpg',array(
		'default' => '0',
		'transport' => 'refresh',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('cargo_abtpg',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page from here:','cargo-lite'),
		'section'	=> 'cargo_about'
	));
	
	$wp_customize->add_setting( 'cargo_about_more', array(
			'default'	=> __('Read More','cargo-lite'),
			'transport' => 'refresh',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control('cargo_about_more',array(
		'label'	=> __('Add read more text here.','cargo-lite'),
		'section'	=> 'cargo_about',
		'setting'	=> 'cargo_about_more',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('cargo_about_hd',array(
		'default' => true,
		'sanitize_callback' => 'cargo_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'cargo_about_hd', array(
		'settings' => 'cargo_about_hd',
		'section'   => 'cargo_about',
		'label'     => __('Check this to hide section.','cargo-lite'),
		'type'      => 'checkbox'
	));
	
	// Second Section Inside Theme Options Panel
	$wp_customize->add_section( 'cargo_service', 
		array(
			'title'         => __( 'Second Section', 'cargo-lite' ),
			'priority'      => 4,
			'panel'         => 'cargo_theme_options',
			'description'      => __( 'Select pages to display services section of theme. This will work only when you select the static front page', 'cargo-lite' ),
		)
	);
	
	$wp_customize->add_setting( 'cargo_service_ttl', array(
			'default'	=> __('','cargo-lite'),
			'transport' => 'refresh',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control('cargo_service_ttl',array(
		'label'	=> __('Add section title here.','cargo-lite'),
		'section'	=> 'cargo_service',
		'setting'	=> 'cargo_service_ttl',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('cargo_ser1',array(
		'default' => '0',
		'transport' => 'refresh',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('cargo_ser1',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page from here:','cargo-lite'),
		'section'	=> 'cargo_service'
	));
	
	$wp_customize->add_setting('cargo_ser2',array(
		'default' => '0',
		'transport' => 'refresh',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('cargo_ser2',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page from here:','cargo-lite'),
		'section'	=> 'cargo_service'
	));
	
	$wp_customize->add_setting('cargo_ser3',array(
		'default' => '0',
		'transport' => 'refresh',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('cargo_ser3',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page from here:','cargo-lite'),
		'section'	=> 'cargo_service'
	));
	
	$wp_customize->add_setting( 'cargo_ser_more', array(
			'default'	=> __('Read More','cargo-lite'),
			'transport' => 'refresh',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control('cargo_ser_more',array(
		'label'	=> __('Add read more text here.','cargo-lite'),
		'section'	=> 'cargo_service',
		'setting'	=> 'cargo_ser_more',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('cargo_ser_hd',array(
		'default' => true,
		'sanitize_callback' => 'cargo_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'cargo_ser_hd', array(
		'settings' => 'cargo_ser_hd',
		'section'   => 'cargo_service',
		'label'     => __('Check this to hide section.','cargo-lite'),
		'type'      => 'checkbox'
	));
	
}
add_action( 'customize_register', 'cargo_lite_customize_register' );	

function cargo_lite_css(){ ?>
<style>
	#header,
	.sitenav ul li.menu-item-has-children:hover > ul,
	.sitenav ul li.menu-item-has-children:focus > ul,
	.sitenav ul li.menu-item-has-children.focus > ul{
		background-color:<?php echo esc_attr(get_theme_mod('headerbg-color','#ffffff')); ?>;
	}
	.tm_client strong,
	.postmeta a:hover,
	#sidebar ul li a:hover,
	.blog-post h3.entry-title,
	a.blog-more:hover,
	#commentform input#submit,
	input.search-submit,
	.nivo-controlNav a.active,
	.blog-date .date,
	a.read-more,
	p.site-description,
	.sitenav ul li.current_page_item a,
	.sitenav ul li a:hover,
	.sitenav ul li.current_page_item ul li a:hover,
	#cargo_slider .nivo-caption h2 a,
	h4.section_sub_title{
		color:<?php echo esc_attr(get_theme_mod('color_scheme','#f8bf02')); ?>;
	}
	h3.widget-title,
	.nav-links .current,
	.nav-links a:hover,
	p.form-submit input[type="submit"],
	a.main-button,
	input[type="submit"].search-submit,
	.header-button a,
	#cargo_slider .nivo-caption a.slide-button:hover,
	.nivo-directionNav a:hover{
		background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#f8bf02')); ?>;
	}
	.about_fig:before{
		border-top-color:<?php echo esc_attr(get_theme_mod('color_scheme','#f8bf02')); ?>;
	}
	.about_fig:after{
		border-bottom-color:<?php echo esc_attr(get_theme_mod('color_scheme','#f8bf02')); ?>;
	}
	h2.section_title,
	.sitenav ul li a,
	.sitenav ul li.current_page_item ul li a,
	.service-link a:hover{
		color:<?php echo esc_attr(get_theme_mod('color_sub_scheme','#171717')); ?>;
	}
	.header-button a:hover,
	#cargo_slider .nivo-caption a.slide-button,
	.nivo-directionNav a,
	.service-link a,
	.service-link a:before,
	.service-link a:after,
	.service-link a span:before,
	.service-link a span:after{
		background-color:<?php echo esc_attr(get_theme_mod('color_sub_scheme','#171717')); ?>;
	}
	.copyright-wrapper{
		background-color:<?php echo esc_attr(get_theme_mod('footer-color','#0B0B0B')); ?>;
	}
</style>        
<?php } add_action('wp_head','cargo_lite_css');

function cargo_lite_customize_preview_js() {
	wp_enqueue_script( 'cargo-lite-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'cargo_lite_customize_preview_js' );