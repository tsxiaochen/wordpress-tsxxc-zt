        <ul class="feature-post pull-right">
         <?php
 $sticky = get_option('sticky_posts');  
rsort( $sticky );  
$sticky = array_slice( $sticky, 0, 3); 
query_posts( array( 'posts_per_page' => 3,'post__in' => $sticky, 'ignore_sticky_posts' => 1,'order' => 'ASC' ) ); 
if (have_posts()) :  
while (have_posts()) : the_post();  
?>
<li> <a href="<?php the_permalink() ?>" target="_blank"> <img class="j-lazy" src="<?php echo catch_that_image() ?>" data-original="<?php echo catch_that_image() ?>" alt="<?php the_title(); ?>"> </a> <span><?php the_title(); ?></span> </li>
       <?php endwhile; endif; ?>
        </ul>
