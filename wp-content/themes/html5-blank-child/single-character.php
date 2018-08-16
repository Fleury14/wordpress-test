<?php 
    if( file_exists('./wp-content/themes/html5-blank-child/' . strtolower( get_the_title() ) . '.jpg') ) {
        $GLOBALS['background_image'] = strtolower( get_the_title()) . '.jpg';
    }
    get_header(); ?> 

<?php
function advantageClass($number) {
    if ($number > 0) return 'plus-on-block'; elseif ($number < 0) return 'minus-on-block'; else return '';
}

?>
<h1 class="frame-data">FRAME DATA</h1>
<div class="frame-data-body">
    <div class="frame-data-header-row">
        <p class="cell">Move Name</p>
        <p class="cell">Startup</p>
        <p class="cell">Active</p>
        <p class="cell">Recovery</p>
        <p class="cell">On Block</p>
        <p class="cell">On Hit</p>
    </div>
<?php while(have_posts()) : the_post(); 

    $child_moves = types_child_posts('move');

    foreach ($child_moves as $child_move) {

        $onBlock = types_render_field('on-block', array("id"=> "$child_move->ID"));
        $onHit = types_render_field('on-hit', array("id"=> "$child_move->ID"));
        ?>
        <a href="/?move=<?php echo get_page_uri($child_move) ?>">
            <div class="frame-data-body-row">
                <p class="cell"><?php echo types_render_field('move_name', array("id"=> "$child_move->ID")); ?></p>
                <p class="cell"><?php echo types_render_field('startup', array("id"=> "$child_move->ID")); ?></p>
                <p class="cell"><?php echo types_render_field('active', array("id"=> "$child_move->ID")); ?></p>
                <p class="cell"><?php echo types_render_field('recovery', array("id"=> "$child_move->ID")); ?></p>
                <p class="cell <?php echo advantageClass($onBlock); ?>"><?php 
                
                if( $onBlock > 0) { echo('+');}
                echo $onBlock;
                ?></p>
                <p class="cell <?php echo advantageClass($onHit); ?>"><?php 

                if ( $onHit > 0 ) { echo('+');}
                echo $onHit; ?></p>
            </div>
        </a>
        
        <?php
    }

    ?>
</div>


<h3>There are <?php echo count($child_moves) ?> moves for this character.</h3>

<?php endwhile;
get_footer();

?>