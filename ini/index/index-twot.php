<div id="content" class="mt15 container">
            <div class="row row-cols-1 animated fadeInUp " id="magazines">
                  <?php $display_categories =  explode(',',sc_tsxcc('ts_index_lzb') ); foreach ($display_categories as $category) { ?>  
                     <div class="col-md-6 pr-0 magazine">
                        <div class="p-block">
                            <div><span class="t-lg puock-text pb-2 d-inline-block border-bottom border-primary">
                                <a class="ta3 a-link" href="<?php echo get_category_link( $category );?>"><i class="fa fa-bars"></i>&nbsp;<?php echo get_cat_name( $category );?></a></span></div>
                                    <?php query_posts( array( 'showposts' => sc_tsxcc('ts_index_lsb'), 'cat' => $category, 'ignore_sticky_posts' => 1 ) ); ?>  
                                 <?php while (have_posts()) : the_post(); ?>
                                      <div class="media-link media-row-2">
                                        <div class="t-lg t-line-1 row">
                                            <div class="col-lg-9 col-12 text-nowrap text-truncate">
                                                <i class="czs-angle-right-l t-sm c-sub mr-1"></i>
                                                <a class="a-link t-w-400 t-md" title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                            </div>
                                            <div class="col-lg-3 text-right d-none d-lg-block">
                                                <span class="c-sub t-sm"><?php the_time('Y-m-d'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                              <?php endwhile;?>
                        <?php wp_reset_query(); ?>      
                                </div>
                                      </div>
                             <?php } ?>
                             </div>
                                  </div>