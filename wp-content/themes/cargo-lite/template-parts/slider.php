<?php
if( is_home() || is_front_page() ){
	$play_hideslider = get_theme_mod('cargo_slider_hd', '1');
	if($play_hideslider == ''){
		$cargo_lite_pages = array();
		for($sld=1; $sld<4; $sld++) { 
			$mod = absint( get_theme_mod('slide'.$sld));
			if ( 'page-none-selected' != $mod ) {
				$cargo_lite_pages[] = $mod;
			} 
		}
		if( !empty($cargo_lite_pages) ) :
			$args = array(
			  'posts_per_page' => 3,
			  'post_type' => 'page',
			  'post__in' => $cargo_lite_pages,
			  'orderby' => 'post__in'
			);
			$nivo_query = new WP_Query( $args );
			if ( $nivo_query->have_posts() ) : 
				$sld = 7;
				echo '<section id="cargo_slider"><div class="slider-wrapper theme-default"><div id="slider" class="nivoSlider">';
				$i = 0;
				while ( $nivo_query->have_posts() ) : $nivo_query->the_post();
					$i++;
					$cargo_lite_slideno[] = $i;
					$cargo_lite_slidetitle[] = get_the_title();
					$cargo_lite_slidelink[] = esc_url(get_permalink());
					$cargo_lite_slidedesc[] = get_the_excerpt();
					
					$getsbttl = get_theme_mod('play_slide_sbttl');
					if( !empty( $getsbttl ) ){
						$holdsbttl = '<h4>'.$getsbttl.'</h4>';
					}
					
					$getsldreadmore = get_theme_mod( 'cargo_slider_btn' );

					$imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');

					if ( $imgSrc[0]!='' ) {
						$imgUrl = $imgSrc[0];
					}

					echo '<img src="'.$imgSrc[0].'" title="#slidecaption'.esc_attr( $i ).'" />';

					$sld++;
				endwhile;
				echo '</div><div class="clear"></div>';
				$k = 0;
				foreach( $cargo_lite_slideno as $cargo_lite_sln ){ ?>
					<div id="slidecaption<?php echo esc_attr( $cargo_lite_sln );?>" class="nivo-html-caption">
						<?php echo $holdsbttl; ?>
						<h2><a href="<?php echo esc_url($cargo_lite_slidelink[$k] ); ?>"><?php echo esc_html($cargo_lite_slidetitle[$k] ); ?></a></h2>
						<p><?php echo $cargo_lite_slidedesc[$k]; ?></p>
						<?php if( !empty( $getsldreadmore ) ){ ?>
							<a class="slide-button" href="<?php echo esc_url($cargo_lite_slidelink[$k] ); ?>">
								<?php echo $getsldreadmore; ?>
							</a>
						<?php } ?>
						
					</div>
				<?php $k++;
					wp_reset_postdata();
				}
			endif;
		endif;
		echo '</div></section>';
	}
}