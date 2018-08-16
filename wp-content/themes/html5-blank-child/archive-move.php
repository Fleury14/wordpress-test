<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>
			<h1 class="frame-data">FRAME DATA</h1>
			<div class="frame-data-header-row">
				<p class="cell">Move Name</p>
				<p class="cell">Startup</p>
				<p class="cell">Active</p>
				<p class="cell">Recovery</p>
				<p class="cell">On Block</p>
				<p class="cell">On Hit</p>
			</div>
			<?php while(have_posts()) : the_post(); 

			$onBlock = types_render_field('on-block');
			$onHit = types_render_field('on-hit');

			?>
			<a href="<?php the_permalink(); ?>">
				<div class="frame-data-body-row">
					<p class="cell"><?php echo(the_title()); ?></p>
					<p class="cell"><?php echo types_render_field('startup'); ?></p>
					<p class="cell"><?php echo types_render_field('active'); ?></p>
					<p class="cell"><?php echo types_render_field('recovery'); ?></p>
					<p class="cell"><?php 
					
					if( $onBlock > 0) { echo('+');}
					echo $onBlock;
					?></p>
					<p class="cell"><?php 

					if ( $onHit > 0 ) { echo('+');}
					echo types_render_field('on-hit'); ?></p>
				</div>
			</a>
			
			<?php endwhile; ?>
			
			

			

		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>