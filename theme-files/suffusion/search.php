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
get_header();
echo car_demon_dynamic_load();
?>
    <div id="main-col">
      <div id="content" class="hfeed">
<?php if ( $search_query->have_posts() ) :
echo $_SESSION['car_demon_options']['before_listings'];
echo '<article class="post">';
	echo car_demon_sorting('search');
echo '</article>';
if ($_GET['car']) {
	include('suffusion-style-include.php');
	include('suffusion-style.php');
	?>
				<h1 class="page-title"><?php printf( __( 'Search Results: %s', 'car-demon-styles' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<h4 style="margin:0px;"><?php _e('Results Found','car-demon'); echo ': '.$total_results;?></h4>
				<?php echo $searched; ?>
				<?php if ( $search_query->max_num_pages > 1 ) : ?>
						<div id="cd-nav-above" class="navigation-top" style="float:left;width:100%;margin:7px;">
						<?php if(function_exists('wp_pagenavi')) {  
									$nav_list_str = wp_pagenavi(array( 'query' => $search_query, 'echo' => false )); 
									$nav_list_str = str_replace('nextpostslink','nextpostslink-top',$nav_list_str);
									echo $nav_list_str;
								}
								else { ?>
								<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'car-demon-styles' ) ); ?></div>
								<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'car-demon-styles' ) ); ?></div>
								<?php } ?>
						</div><!-- #nav-above -->
					<?php else: ?>
						<div id="cd-nav-above" class="navigation-top" style="float:left;width:100%"><span class="wp-pagenavi"><span class="pages"><?php echo $wp_query->post_count; ?> Results Found</span></span>
						</div>
				<?php endif; ?>
<div class="listing">
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
	while ( $search_query->have_posts() ) : $search_query->the_post();
		$post_id = $search_query->post->ID;
		?>
<?php echo suffusion_display_car($post_id); ?>
		<?php
	endwhile;
	/* Display navigation to next/previous pages when applicable */ ?>
</div>
	<?php if (  $search_query->max_num_pages > 1 ) : ?>
			<div id="cd-nav-below" class="navigation" style="float:left;">
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(array( 'query' => $search_query )); } 
					else { ?>
						<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'car-demon-styles' ) ); ?></div>
						<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'car-demon-styles' ) ); ?></div>
					<?php } ?>
			</div><!-- #nav-below -->
	<?php endif;
}
else {
				 get_template_part( 'loop', 'search' );
}
else : ?>
				<div id="post-0" class="post no-results not-found">
					<h2 class="entry-title"><?php _e( 'Nothing Found', 'car-demon-styles' ); ?></h2>
					<div class="entry-content">
						<p style="color:#FF0000;font-size:16px;font-weight:bold;"><?php _e( 'Sorry, but nothing matched your search criteria. Please try using a broader search selection.', 'car-demon-styles' ); ?></p>
						<?php echo $searched; ?>
						<table>
							<tr>
								<td width="200">
									<?php echo car_demon_display_random_cars(1); ?>
								</td>
								<td width="200">
									<?php echo car_demon_display_random_cars(1); ?>
								</td>
								<td width="200">
									<?php echo car_demon_display_random_cars(1); ?>
								</td>
							</tr>
							<tr>
								<td width="200">
									<?php echo car_demon_display_random_cars(1); ?>
								</td>
								<td width="200">
									<?php echo car_demon_display_random_cars(1); ?>
								</td>
								<td width="200">
									<?php echo car_demon_display_random_cars(1); ?>
								</td>
							</tr>
							<tr>
								<td width="200">
									<?php echo car_demon_display_random_cars(1); ?>
								</td>
								<td width="200">
									<?php echo car_demon_display_random_cars(1); ?>
								</td>
								<td width="200">
									<?php echo car_demon_display_random_cars(1); ?>
								</td>
							</tr>
						</table>
						<?php //get_search_form(); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-0 -->
<?php endif; ?>
			</div><!-- #content -->
		</div><!-- #container -->


<?php get_footer(); ?>