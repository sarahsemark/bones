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
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		<?php the_excerpt(); ?>
	</div>
<?php 
	$news_count++;
	endforeach; 
	wp_reset_postdata();
?>
