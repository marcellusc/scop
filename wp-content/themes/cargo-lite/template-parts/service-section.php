<?php
    $play_hide_ssec = get_theme_mod('cargo_ser_hd','1');
    if( $play_hide_ssec == '' ){
		
	$getsecondsecttl = esc_html(get_theme_mod('cargo_service_ttl'));
	if( !empty( $getsecondsecttl ) ){
		$holdsecondttl = '<div class="section_head"><h2 class="section_title">'.$getsecondsecttl.'</h2></div>';
	}
?>
<section class="our-services">
    <div class="container">
		<?php echo $holdsecondttl; ?>
        <div class="align row">
            <?php
                for($fs = 1; $fs<4; $fs++) {
                    if( get_theme_mod( 'cargo_ser'.$fs ) != '' ){
                        $value_query = new WP_Query( array( 'page_id' => get_theme_mod( 'cargo_ser'.$fs ) ) );
                        while( $value_query->have_posts() ) : $value_query->the_post();
                        
            ?>
			<div class="service-box">
				<div class="inner-service">
					<div class="service-icon"><?php echo the_post_thumbnail('cargo-lite-service-thumb');?></div>
					<div class="service-content">
						<h4><?php the_title(); ?></h4>
						<p><?php echo cargo_lite_custom_excerpt(25); ?></p>
						<?php if( !empty( get_theme_mod('cargo_ser_more') ) ) { ?>
							<div class="service-link"><a href="<?php echo get_the_permalink(); ?>"><span><?php echo esc_html(get_theme_mod('cargo_ser_more')); ?></span></a></div>
						<?php } ?>
					</div>
				</div>
			</div>
            <?php       endwhile;
                    }
                }
            ?>
        </div><!-- align -->
    </div><!-- container -->
</section><!-- features -->
<?php
    }
?>