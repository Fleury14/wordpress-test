<?php 
    $parent_title = get_post( toolset_get_parent_post_by_type( get_the_id(), 'character' ) )->post_title;
    if( file_exists('./wp-content/themes/html5-blank-child/' . strtolower( $parent_title ) . '.jpg') ) {
        $GLOBALS['background_image'] = strtolower( $parent_title ) . '.jpg';
    }
    get_header();  ?>

<?php while(have_posts()) : the_post(); 

    $onBlock = types_render_field('on-block');
    $onHit = types_render_field('on-hit');

    function advantageClass($number) {
        if ($number > 0) return 'plus-on-block'; elseif ($number < 0) return 'minus-on-block'; else return '';
    }

?>

<h1 class="single-move-h1">Frame Times</h1>
<div class="single-move-top-row">
    <div class="single-move-card">
        <p class="single-move-card-title">Startup</p>
        <p class="single-move-card-data"><?php echo types_render_field('startup'); ?></p>
    </div>
    <div class="single-move-card">
        <p class="single-move-card-title">Active</p>
        <p class="single-move-card-data"><?php echo types_render_field('active'); ?></p>
    </div>
    <div class="single-move-card">
        <p class="single-move-card-title">Recovery</p>
        <p class="single-move-card-data"><?php echo types_render_field('recovery'); ?></p>
    </div>
</div>
<h1 class="single-move-h1">Frame Advantage</h1>
<div class="single-move-top-row">
    <div class="single-move-card">
        <p class="single-move-card-title">On Block</p>
        <p class="single-move-card-data <?php echo advantageClass($onBlock); ?>">
        <?php 
            if( $onBlock > 0) { echo('+');}
            echo $onBlock;
        ?>
        </p>
    </div>
    <div class="single-move-card">
        <p class="single-move-card-title">On Hit</p>
        <p class="single-move-card-data <?php echo advantageClass($onHit); ?>">
        <?php 
            if ( $onHit > 0 ) { echo('+');}
            echo types_render_field('on-hit');
        ?>
        </p>
    </div>
</div>
<a href="/?page_id=52">
    <h1 class="single-move-h1">What does all this mean?</h1>
</a>

<?php 
    $args = array(
        'post_type'=> 'move'
    );

    $other_moves = get_posts( $args );
    var_dump($other_moves);
    
?>

<?php endwhile;
get_footer();

?>
