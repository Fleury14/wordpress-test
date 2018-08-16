<?php get_header();
global $wp_query;
$wp_query->posts = array_filter($wp_query->posts, 'removeMovesAndPages');
$wp_query->found_posts = count($wp_query->posts);

function removeMovesAndPages($post) {
	if ($post->post_type == 'move' || $post->post_type == 'character' || $post->post_type == 'page')
		return false; else return true;
}
?>

	<main role="main">
		<!-- section -->
		<section>

			<h1><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
