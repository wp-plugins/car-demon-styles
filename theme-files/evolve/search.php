<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage CarDemonStyle
 * @since CarDemonStyle 0.1.3
 */
$car_demon_query = car_demon_query_search();
$search_query = new WP_Query();
$search_query->query($car_demon_query);
$total_results = $search_query->found_posts;
$searched = car_demon_get_searched_by();
header('HTTP/1.1 200 OK');
wp_enqueue_style('evolve-style-css', WP_CONTENT_URL . '/plugins/car-demon-styles/theme-files/evolve/evolve-style.css');
get_header();
echo car_demon_dynamic_load();
include('evolve-style-include.php');
do_action( 'car_demon_before_main_content' );
	if ( $search_query->have_posts() ) {
		echo $_SESSION['car_demon_options']['before_listings'];
		echo car_demon_sorting('search');
		if (isset($_GET['car'])) {
			?>
			<h1 class="page-title"><?php printf( __( 'Search Results: %s', 'car-demon-styles' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<h4 style="margin:0px;"><?php _e('Results Found','car-demon-styles'); echo ': '.$total_results;?></h4>
			<?php echo $searched; 
			echo car_demon_nav('top', $search_query);
			?>
			<div id="demon-content" class="listing" role="main">
				<?php
				while ( $search_query->have_posts() ) : $search_query->the_post();
					$post_id = $search_query->post->ID;
					echo evolve_display_car($post_id);
				endwhile;
				?>
			</div>
			<?php
			echo car_demon_nav('bottom', $search_query);				
		} else {
			get_template_part( 'loop', 'search' );
		}
	} else { 
		echo car_demon_no_search_results($searched);
	}
do_action( 'car_demon_after_main_content' );
do_action( 'car_demon_sidebar' );
get_footer();
?>