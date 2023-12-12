<style> #dbtu {display: inline-block;   width: 14.49%;    margin: 0 1% 15px;}@media (max-width: 991px){#dbtu {    width: 49%;    margin: 0 1% 12px;    margin-left: 0;}}
</style>
<?php $display_categories =  explode(',',sc_tsxcc('ts_index_dbtu_id') ); foreach ($display_categories as $category) { ?>                            
    <?php query_posts( array( 'showposts' => sc_tsxcc('ts_index_dbtu_sl'), 'cat' => $category, 'offset' => 0 ) ); ?>  
<div id="content" class="mt15 container">
            <div class="row row-cols-1 animated fadeInUp " id="magazines">
                     <div class="col-md-6" style="width: 100%;display: block;">
                        <div class="p-block">
                            
                            <div style=" padding-bottom: 10px; "><span class="t-lg puock-text pb-2 d-inline-block border-bottom border-primary"><a class="ta3 a-link"><i class="czs-layers"></i>&nbsp;<?php echo get_cat_name( $category );?></a></span></div>
<ul class="list topic-list" style="text-align: center; ">
<?php while (have_posts()) : the_post(); ?>
              <li class="topic" id="dbtu"> <a class="topic-wrap" href="<?php the_permalink() ?>" target="_blank">
              <div class="cover-container"> <img class="j-lazy" src="<?php echo catch_that_image() ?>" data-original="<?php echo catch_that_image() ?>" style="display: inline;width: 100%;height: 90px;"> </div>
              <span><?php the_title(); ?></span> </a> </li>
            <?php endwhile; ?>  
          </ul>
              </div>
                  </div>
                       </div>
                         </div>
 <?php } ?>
