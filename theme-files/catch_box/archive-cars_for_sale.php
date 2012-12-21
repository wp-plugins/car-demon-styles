<?php
get_header(); 
$car_demon_query = car_demon_query_archive();
query_posts($car_demon_query);
$total_results = $wp_query->found_posts;

echo car_demon_dynamic_load();
include('catch_box-style-include.php');
include('catch_box-style.php');
?>
    <div id="main-col">
      <div id="content" class="hfeed">
				<?php
					echo $_SESSION['car_demon_options']['before_listings'];
					if ( have_posts() )
						echo '<article class="post">';
							echo car_demon_sorting('achive');
						echo '</article>';
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
<div class="listing">
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
	while ( $wp_query->have_posts() ) : $wp_query->the_post();
		$post_id = $wp_query->post->ID;
		?>
<?php echo catch_box_display_car($post_id); ?>
		<?php
	endwhile;
	/* Display navigation to next/previous pages when applicable */ ?>
</div>
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

<?php get_footer();?>