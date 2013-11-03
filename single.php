<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<?php previous_post_link('%link', '&laquo;', TRUE); ?> 
									<span></span>
									
									<h2 class="date"><?php
										printf( __( '<time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time( get_option('date_format')) );
									?></h2>
									
									<?php next_post_link('%link', '&laquo;', TRUE); ?> 
									<span></span>
									
									<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>

									
									<?php //the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>


								</header> <!-- end article header -->

								<section class="entry-content eightcol twopush clearfix" itemprop="articleBody">
									<?php the_content(); ?>
								</section> <!-- end article section -->


								<?php comments_template(); ?>

							</article> <!-- end article -->

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry clearfix">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
									</footer>
							</article>

						<?php endif; ?>

					</div> <!-- end #main -->

					<?php //get_sidebar(); ?>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
