<?php
	$car_demon_query = car_demon_query_search();
	$search_query = new WP_Query();
	$search_query->query($car_demon_query);
	$total_results = $search_query->found_posts;
	$searched = car_demon_get_searched_by();
	header('HTTP/1.1 200 OK');
	wp_enqueue_style('neuro-style-css', WP_CONTENT_URL . '/plugins/car-demon-styles/theme-files/neuro/neuro-style.css');
	global $options, $ne_themeslug, $post, $sidebar, $content_grid; // call globals
	response_sidebar_init(); // sidebar init
	get_header(); // call header
	echo car_demon_dynamic_load();
	include('neuro-style-include.php');
?>
<div class="container">
	<div class="row">
		<div class="wrap">
			<div class="row">
			<!--Begin @response before content sidebar hook-->
			<?php response_before_content_sidebar(); ?>
			<!--End @response before content sidebar hook-->
			<div id="content" class="<?php echo $content_grid; ?>">
				<!-- Begin @response before_search hook -->
				<?php response_before_search(); ?>
				<!-- End @response before_search hook -->
	
				<!-- Begin @response search hook -->
				<div id="content-archive" class="grid col-620 listing">
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
									echo neuro_display_car($post_id);
								echo '</div>';
							endwhile;
						}
						echo '<div class="hentry">';
							echo car_demon_nav('bottom', $search_query);
						echo '</div>';
						echo '<div class="hentry"><div class="post-entry"></div></div>';
					} ?>
					</div><!-- end of #content-archive -->
				<!-- End @response search hook -->
	
				<!-- Begin @response after_search hook -->
				<?php response_after_search(); ?>
				<!-- End @response after_search hook -->		
			</div>	
			<!--Begin @response after content sidebar hook-->
			<?php response_after_content_sidebar(); ?>
			<!--End @response after content sidebar hook-->
			</div>
		</div>
	</div><!--end row-->
</div><!--end container-->
<?php get_footer(); ?>