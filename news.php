<?php
$args = array( 'posts_per_page' => 6);
$posts = get_posts( $args );
$news_count = 1;
foreach ( $posts as $post ) : setup_postdata( $post ); ?>
	<?php
		if ($news_count % 3 == 1) {
			$class = "first";
		} elseif ($news_count % 3 == 0) {
			$class = "last";
		} else {
			$class = "";
		}
	?>
	<div class="fourcol <?php echo $class; ?> clearfix">
		<img src="<?php echo get_template_directory_uri(); ?>/library/images/painting1.png" alt="painting1" />
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		<?php the_excerpt(); ?>
	</div>
<?php 
	$news_count++;
	endforeach; 
	wp_reset_postdata();
?>
