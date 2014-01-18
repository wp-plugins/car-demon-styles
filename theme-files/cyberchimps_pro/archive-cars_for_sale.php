<?php
	wp_enqueue_style('ccp-style-css', WP_CONTENT_URL . '/plugins/car-demon-styles/theme-files/cyberchimps_pro/ccp-style.css');
	get_header(); 
	$car_demon_query = car_demon_query_archive();
	query_posts($car_demon_query);
	$total_results = $wp_query->found_posts;
	
	echo car_demon_dynamic_load();
	include('ccp-style-include.php');
	get_header(); // call header
?>
<div id="archive_page" class="container-full-width">
	
	<div class="container">
		
		<div class="container-fluid">
		
			<?php do_action( 'cyberchimps_before_container'); ?>
			
			<div id="container" <?php cyberchimps_filter_container_class(); ?>>
				
				<?php do_action( 'cyberchimps_before_content_container'); ?>
				
				<div id="content" <?php cyberchimps_filter_content_class(); ?>>
						
					<?php do_action( 'cyberchimps_before_content'); ?>
                    
				<?php if (have_posts()) : ?>
					<h6>
						<?php _e( 'Current Inventory', 'car-demon-styles' ); ?>
					</h6>
					<?php 
					echo $_SESSION['car_demon_options']['before_listings'];
					echo car_demon_sorting('achive');
					echo car_demon_nav('top', $wp_query);
					while (have_posts()) : the_post();
						$post_id = $post->ID;
						echo '<div class="hentry">';
							$html = apply_filters('car_demon_display_car_list_filter', ccp_display_car($post_id), $post_id );
							echo $html;
						echo '</div>';
					endwhile;
					echo '<div style="clear:both"></div><div class="hentry">';
						echo car_demon_nav('bottom', $wp_query);
					echo '</div>';
					echo '<div class="hentry"><div class="post-entry"></div></div>';
				endif; ?>
				<?php do_action( 'cyberchimps_after_content'); ?>
					
				</div><!-- #content -->
				
				<?php do_action( 'cyberchimps_after_content_container'); ?>
					
			</div><!-- #container .row-fluid-->
			
			<?php do_action( 'cyberchimps_after_container'); ?>
			
		</div><!--container fluid -->
		
	</div><!-- container -->
</div><!-- container full width -->
<?php get_footer(); ?>