<?php
    $cargo_hide_abt = get_theme_mod('cargo_about_hd','1');
    if( $cargo_hide_abt == '' ){
	
	$get_subttl = esc_html(get_theme_mod('cargo_about_sec'));
?>
<section class="about-us">
    <div class="container">
        <div class="align">
            <?php
            if( get_theme_mod('cargo_abtpg') != '' ){
                $about_query = new WP_Query( array( 'page_id' => get_theme_mod('cargo_abtpg') ) );
                while( $about_query->have_posts() ) : $about_query->the_post(); 
				
				if( !empty( $get_subttl ) ){
					$holdsbttl = '<h4 class="section_sub_title">'.$get_subttl.'</h4>';
				}
			?>
                    <div class="about_fig">
                        <?php if( has_post_thumbnail()) { the_post_thumbnail(); } ?>
                    </div><!-- about-thumb -->
                    <div class="about_content">
						<div class="inner_about_content">
							<div class="section_head">
								<?php echo $holdsbttl; ?>
								<h2 class="section_title"><?php the_title(); ?></h2>
							</div>
							<p><?php echo get_the_excerpt(); ?></p>
							<?php if( !empty( get_theme_mod('cargo_about_more') ) ) { ?>
								<a href="<?php the_permalink(); ?>" class="main-button"><?php echo esc_html(get_theme_mod('cargo_about_more')); ?></a>
							<?php } ?>
						</div>
                    </div><!-- about-content -->

            <?php
                endwhile;
            }
            ?>
        </div><!-- align -->
    </div><!-- container -->
</section><!-- features -->
<?php
    }
?>