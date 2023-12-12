        <ul class="feature-post pull-right">
         <?php
         $ts_lunbo_yc = sc_tsxcc('ts_lunbo_yc');
$postsl = get_posts("numberposts=3&post_type=any&include=$ts_lunbo_yc"); 
if($postsl) : foreach( $postsl as $post ) : setup_postdata( $post ); 
?>
          <li> <a href="<?php the_permalink() ?>" target="_blank"> <img class="j-lazy" src="<?php echo catch_that_image() ?>" data-original="<?php echo catch_that_image() ?>" alt="<?php the_title(); ?>"> </a> <span><?php the_title(); ?></span> </li>
      <?php endforeach; endif; ?>
        </ul>
