<?php
/*
Template Name: One-page site
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="twelvecol first last clearfix" role="main">

								<?php
								
								// Let's show all the static pages! Whoo-hoo!
								$pages = get_pages(array('child_of' => $post->ID, 'sort_column' => 'menu_order', 'sort_order' => 'asc')); 
								foreach ($pages as $page_data) {
									echo '<div class="twelvecol first last clearfix" style="background: purple; margin-top: 2em;">';
									$content = apply_filters('the_content', $page_data->post_content); 
									$title = $page_data->post_title; 
									echo "<h2>" . $title . "</h2>";
									echo $content; 
									echo '</div>';
								}
								?>
							
							

						</div> <!-- end #main -->


				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
