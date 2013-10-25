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
											
												<a class="button" data-slide="<?php echo ++$count; ?>" title=""></a>
												<?php if ($title != "Home"):  echo '<h2>' . $title . '</h2>';  endif; ?>
												<?php echo $content; ?>
												
												<?php if ($title == "News"): ?>
													<?php
													$args = array( 'posts_per_page' => 3);
													$posts = get_posts( $args );
													$news_count = 1;
													foreach ( $posts as $post ) : setup_postdata( $post ); ?>
														<?php
															if ($news_count == 1) {
																$class = "first";
															} elseif ($news_count == 3) {
																$class="last";
															}
														?>
														<div class="fourcol <?php echo $class; ?>clearfix">
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</div>
													<?php 
														$news_count++;
														endforeach; 
														wp_reset_postdata();
													?>
											<?php endif; ?>	
											
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							

<?php get_footer(); ?>
