<?php
	$car_demon_query = car_demon_query_search();
	$search_query = new WP_Query();
	$search_query->query($car_demon_query);
	$total_results = $search_query->found_posts;
	$searched = car_demon_get_searched_by();
	header('HTTP/1.1 200 OK');
	wp_enqueue_style('ccp-style-css', WP_CONTENT_URL . '/plugins/car-demon-styles/theme-files/cyberchimps_pro/ccp-style.css');
	global $options, $ne_themeslug, $post, $sidebar, $content_grid; // call globals
	get_header(); // call header
	echo car_demon_dynamic_load();
	include('ccp-style-include.php');
?>
<div id="search_page" class="container-full-width">
	
	<div class="container">
		
		<div class="container-fluid">
		
			<?php do_action( 'cyberchimps_before_container'); ?>
			
			<div id="container" <?php cyberchimps_filter_container_class(); ?>>
				
				<?php do_action( 'cyberchimps_before_content_container'); ?>
				
				<div id="content" <?php cyberchimps_filter_content_class(); ?>>
					
					<?php do_action( 'cyberchimps_before_content'); ?>
				<?php if ( $search_query->have_posts() ) { ?>
						<h6>
							<?php _e( 'Current Inventory', 'car-demon-styles' ); ?>
						</h6>
						<?php 
						echo $_SESSION['car_demon_options']['before_listings'];
						echo car_demon_sorting('search');
						if (isset($_GET['car'])) {
							echo $searched; 
							echo car_demon_nav('top', $search_query);
							while ( $search_query->have_posts() ) : $search_query->the_post();
								$post_id = $post->ID;
								echo '<div class="hentry">';
									echo ccp_display_car($post_id);
								echo '</div>';
							endwhile;
						}
						echo '<div style="clear:both"></div><div class="hentry">';
							echo car_demon_nav('bottom', $search_query);
						echo '</div>';
						echo '<div class="hentry"><div class="post-entry"></div></div>';
					} ?>
				</div><!-- #content -->
				
				<?php do_action( 'cyberchimps_after_content_container'); ?>
					
			</div><!-- #container .row-fluid-->
			
			<?php do_action( 'cyberchimps_after_container'); ?>
			
		</div><!--container fluid -->
		
	</div><!-- container -->
</div><!-- container full width -->
<?php get_footer(); ?>