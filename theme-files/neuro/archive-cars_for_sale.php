<?php
	wp_enqueue_style('neuro-style-css', WP_CONTENT_URL . '/plugins/car-demon-styles/theme-files/neuro/neuro-style.css');
	get_header(); 
	$car_demon_query = car_demon_query_archive();
	query_posts($car_demon_query);
	$total_results = $wp_query->found_posts;
	
	echo car_demon_dynamic_load();
	include('neuro-style-include.php');
	global $options, $ne_themeslug, $post, $sidebar, $content_grid; // call globals
	response_sidebar_init(); // sidebar init
	get_header(); // call header
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
				<div id="content-archive" class="grid col-620 listing">
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
							$html = apply_filters('car_demon_display_car_list_filter', neuro_display_car($post_id), $post_id );
							echo $html;
						echo '</div>';
					endwhile;
					echo '<div class="hentry">';
						echo car_demon_nav('bottom', $wp_query);
					echo '</div>';
					echo '<div class="hentry"><div class="post-entry"></div></div>';
				endif; ?>
				</div><!-- end of #content-archive -->
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