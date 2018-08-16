<?php 
    $parent_title = get_post( toolset_get_parent_post_by_type( get_the_id(), 'character' ) )->post_title;
    if( file_exists('./wp-content/themes/html5-blank-child/' . strtolower( $parent_title ) . '.jpg') ) {
        $GLOBALS['background_image'] = strtolower( $parent_title ) . '.jpg';
    }
    get_header();  ?>

<?php while(have_posts()) : the_post(); 

    $onBlock = types_render_field('on-block');
    $onHit = types_render_field('on-hit');
    $comboArray = array();

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
    
?>

<?php endwhile;

$args = toolset_get_parent_post_by_type( get_the_id(), 'character' );
$parent_post_again = get_post( toolset_get_parent_post_by_type( $args, 'character' ) );

$sibling_moves_id = toolset_get_related_posts( $args, array('character', 'move'), 'parent', 100, 0, array(), 'post_id', 'child' );

foreach ($sibling_moves_id as $sibling_move) {
    $iterated_move = get_post($sibling_move);
    if ( $iterated_move->post_status == 'publish' && (int)types_render_field('on-hit') >= (int)types_render_field('startup', array("id"=> "$iterated_move->ID")) ) {
        $iterated_move->title = types_render_field('move_name', array("id"=> "$iterated_move->ID"));
        $iterated_move->startup = types_render_field('startup', array("id"=> "$iterated_move->ID"));
        array_push($comboArray, $iterated_move);
    }
}

if (count($comboArray) > 0):
?>
<h1 class="combo-title">Combos Into</h1>
<?php foreach ($comboArray as $move) { ?>
<div class="combo-row">
    <p><strong><?php echo $move->title?></strong></p>
    <p><?php echo $move->startup?> frame startup</p>
</div>
<?php
}

endif;
get_footer();

?>
