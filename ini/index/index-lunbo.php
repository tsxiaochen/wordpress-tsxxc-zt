<div class="slider-wrap clearfix">
        <div class="main-slider wpcom-slider swiper-container pull-left">
          <ul class="swiper-wrapper">      
<?php
$ts_lunbo_sl = sc_tsxcc('ts_lunbo_sl');
$sticky = get_option('sticky_posts');  
rsort( $sticky );  
$sticky = array_slice( $sticky, 0, $ts_lunbo_sl);  
query_posts( array( 'posts_per_page' => $ts_lunbo_sl,'post__in' => $sticky, 'ignore_sticky_posts' => 1, 'order' => 'DESC'  ) );  
if (have_posts()) :  
while (have_posts()) : the_post();  
?>  
            <li class="swiper-slide"> <a href="<?php the_permalink() ?>" target="_blank"> <img src="<?php echo catch_that_image() ?>" alt="<?php the_title(); ?>"> </a>
              <h3 class="slide-title"> <a href="<?php the_permalink() ?>" target="_blank"><?php the_title(); ?></a> </h3>
            </li>
<?php endwhile; endif; ?>
</ul>
          <div class="swiper-pagination"></div>
          <!-- Add Navigation -->
          <div class="swiper-button-prev swiper-button-white"></div>
          <div class="swiper-button-next swiper-button-white"></div>
        </div>
 <?php if (empty(sc_tsxcc('ts_lunbo_yc'))){require get_template_directory() . '/ini/index/index-lunbott.php';}else{require get_template_directory() . '/ini/index/index-lunbot.php';   }?>      </div>