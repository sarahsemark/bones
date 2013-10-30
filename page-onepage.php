<?php
/*
Template Name: One-page site
*/
?>

<?php get_header(); ?>



								<?php
								
								// Let's show all the static pages! Whoo-hoo!
								$pages = get_pages(array('child_of' => $post->ID, 'sort_column' => 'menu_order', 'sort_order' => 'asc')); 
								$count = 1;
								foreach ($pages as $page_data) :
									$content = apply_filters('the_content', $page_data->post_content); 
									$title = $page_data->post_title; 
									$slug = $page_data->post_name;
									?>
									<div id="<?php echo $slug; ?>" class="page-panel" data-slide="<?php echo $count; ?>" data-stellar-background-ratio="0.5">
										<div class="inner-content wrap clearfix">
											<div class="twelvecol first last clearfix entry-content" role="main">
												<?php if ($title != "Home"):  echo '<h1>' . $title . '</h1>';  endif; ?>
												<?php echo $content; ?>
												
												<?php if ($title == "News"): ?>
													<?php get_template_part('news'); ?>
												<?php endif; ?>	
											
											</div>
										</div>
										
										<?php if ($title == "Home"): ?>
										
										<?php endif; ?>
										
										<a class="down-button" data-slide="<?php echo ++$count; ?>" title=""></a>
									</div>
									
								<?php endforeach; ?>
							
							<img id="absinthe" src="<?php echo get_template_directory_uri(); ?>/library/images/smoke.png" alt="smoke" width="547" height="820" data-stellar-ratio="2.5"/>

<?php get_footer(); ?>
