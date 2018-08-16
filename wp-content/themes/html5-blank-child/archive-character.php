<?php get_header() ?>

<h1>Choose your character:</h1>

<div class="character-card-container">
<?php while(have_posts()): the_post();?>
    <a href="/?character=<?php echo the_title() ?>">
        <div class="character-card">
            <h2><?php echo the_title() ?></h2>
            <div class="character-thumbnail"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
        </div>
    </a>
<?php endwhile; ?>
</div>