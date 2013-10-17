<?php
/*
Template Name: One-page site
*/
?>

<?php get_header(); ?>



								<?php
								
								// Let's show all the static pages! Whoo-hoo!
								$pages = get_pages(array('child_of' => $post->ID, 'sort_column' => 'menu_order', 'sort_order' => 'asc')); 
								foreach ($pages as $page_data) {
									$content = apply_filters('the_content', $page_data->post_content); 
									$title = $page_data->post_title; 
									$slug = $page_data->post_name;
									echo '<div id="'.$slug.'" class="page-panel">';
										echo '<div class="inner-content wrap clearfix">';
											echo '<div class="twelvecol first last clearfix entry-content" role="main">';
												echo "<h2>" . $title . "</h2>";
												echo $content; 
											echo '</div>';
										echo '</div>';
									echo '</div>';
								}
								?>
							
							

						</div> <!-- end #main -->


				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
