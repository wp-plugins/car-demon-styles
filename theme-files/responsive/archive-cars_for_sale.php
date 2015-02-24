<?php
wp_enqueue_style('responsive-style-css', WP_CONTENT_URL . '/plugins/car-demon-styles/theme-files/responsive/responsive-style.css');
get_header(); 
$car_demon_query = car_demon_query_archive();
query_posts($car_demon_query);
$total_results = $wp_query->found_posts;

echo car_demon_dynamic_load();
include('responsive-style-include.php');
?>
	<div id="content-archive" class="grid col-620 listing">
<?php if (have_posts()) : ?>
        <?php $options = get_option('responsive_theme_options'); ?>
			<h4 class="results_found"><?php _e('Results Found','car-demon'); echo ': '.$total_results;?></h4>
        <?php 
		echo $_SESSION['car_demon_options']['before_listings'];
		echo car_demon_sorting('achive');
		echo car_demon_nav('top', $wp_query);
		while (have_posts()) : the_post();
			$post_id = $post->ID;
			echo '<div class="hentry">';
				$html = apply_filters('car_demon_display_car_list_filter', responsive_display_car($post_id), $post_id );
				echo $html;
			echo '</div>';
		endwhile;
		echo '<div class="hentry">';
			echo car_demon_nav('bottom', $wp_query);
		echo '</div>';
		echo '<div class="hentry"><div class="post-entry"></div></div>';
	endif; ?>
	</div><!-- end of #content-archive -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>