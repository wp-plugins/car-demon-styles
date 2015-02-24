<?php
get_header(); 
$car_demon_query = car_demon_query_archive();
query_posts($car_demon_query);
$total_results = $wp_query->found_posts;

echo car_demon_dynamic_load();
include('racetrack-style-include.php');
include('racetrack-style.php');
?>
		<div id="demon-container">
			<div id="demon-content" class="listing" role="main">
				<?php
					echo $_SESSION['car_demon_options']['before_listings'];
					if ( have_posts() )
						echo car_demon_sorting('achive');
						the_post();
				?>
					<h1 class="page-title">
						<?php _e( 'Search Results:', 'car-demon-styles' ); ?>
					</h1>
					<h4 style="margin:0px;"><?php _e('Results Found','car-demon'); echo ': '.$total_results;?></h4>
				<?php
					rewind_posts();
				//	get_template_part( 'loop', 'archive' );
				?>
				<?php if ( $wp_query->max_num_pages > 1 ) : ?>
						<div id="cd-nav-above" class="navigation-top" style="float:left;width:100%;margin:7px;">
						<?php if(function_exists('wp_pagenavi')) {  
									$nav_list_str = wp_pagenavi(array( 'echo' => false )); 
									$nav_list_str = str_replace('nextpostslink','nextpostslink-top',$nav_list_str);
									echo $nav_list_str;
								}
								else { ?>
								<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'car-demon-styles' ) ); ?></div>
								<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'car-demon-styles' ) ); ?></div>
								<?php } ?>
						</div><!-- #nav-above -->
					<?php else: ?>
						<div id="nav-above" class="navigation-top" style="float:left;width:100%"><span class="wp-pagenavi"><span class="pages"><?php echo $wp_query->post_count; ?> Results Found</span></span>
						</div>
				<?php endif; ?>
<?php while ( have_posts() ) : the_post();
	$post_id = $post->ID;
	echo racetrack_display_car($post_id);
endwhile; // End the loop. Whew. ?>	
				<?php /* Display navigation to next/previous pages when applicable */ ?>
				<?php if (  $wp_query->max_num_pages > 1 ) : ?>
						<div id="cd-nav-below" class="navigation" style="float:left;">
						<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } 
								else { ?>
									<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'car-demon-styles' ) ); ?></div>
									<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'car-demon-styles' ) ); ?></div>
								<?php } ?>
						</div><!-- #nav-below -->
				<?php endif; ?>
			</div><!-- #content -->
		</div><!-- #container -->
<?php get_sidebar(); ?>

<?php get_footer();?>