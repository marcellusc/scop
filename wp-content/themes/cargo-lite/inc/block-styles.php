<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since Cargo Lite 1.0
	 *
	 * @return void
	 */
	function cargo_lite_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'cargo-lite-columns-overlap',
				'label' => esc_html__( 'Overlap', 'cargo-lite' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'cargo-lite-border',
				'label' => esc_html__( 'Borders', 'cargo-lite' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'cargo-lite-border',
				'label' => esc_html__( 'Borders', 'cargo-lite' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'cargo-lite-border',
				'label' => esc_html__( 'Borders', 'cargo-lite' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'cargo-lite-image-frame',
				'label' => esc_html__( 'Frame', 'cargo-lite' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'cargo-lite-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'cargo-lite' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'cargo-lite-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'cargo-lite' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'cargo-lite-border',
				'label' => esc_html__( 'Borders', 'cargo-lite' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'cargo-lite-separator-thick',
				'label' => esc_html__( 'Thick', 'cargo-lite' ),
			)
		);

		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'cargo-lite-social-icons-color',
				'label' => esc_html__( 'Dark gray', 'cargo-lite' ),
			)
		);
	}
	add_action( 'init', 'cargo_lite_register_block_styles' );
}
