<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="main-section">

			<!-- <p>There are 
			
			<?php   // echo( count(get_posts()) ); ?>

			posts, dag.</p> -->

			<h1 class="news-title"><?php _e( 'NEWS', 'html5blank' ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

			<p><a href="/?post_type=character">Character List</a></p>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>