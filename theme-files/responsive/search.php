<?php
$car_demon_query = car_demon_query_search();
$search_query = new WP_Query();
$search_query->query($car_demon_query);
$total_results = $search_query->found_posts;
$searched = car_demon_get_searched_by();
header('HTTP/1.1 200 OK');
wp_enqueue_style('responsive-style-css', WP_CONTENT_URL . '/plugins/car-demon-styles/theme-files/responsive/responsive-style.css');
get_header();
echo car_demon_dynamic_load();
include('responsive-style-include.php');
?>
<div id="content-archive" class="grid col-620 listing">
<?php if ( $search_query->have_posts() ) { ?>
        <?php $options = get_option('responsive_theme_options'); ?>
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
					echo responsive_display_car($post_id);
				echo '</div>';
			endwhile;
		}
		echo '<div class="hentry">';
			echo car_demon_nav('bottom', $search_query);
		echo '</div>';
		echo '<div class="hentry"><div class="post-entry"></div></div>';
	} ?>
	</div><!-- end of #content-archive -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>