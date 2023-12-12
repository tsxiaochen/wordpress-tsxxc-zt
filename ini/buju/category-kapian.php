<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
    <article class="block card-plain post-item col-sm-6 col-12 post-item-card">
        <div class="p-block">
            <figure class="thumbnail">
                <a class="t-sm" href="<?php the_permalink() ?>">
                 
                           <?php  if(empty(sc_tsxcc('ts_img_lazy_s'))){  ?>
       <img class="tsh" src="<?php echo catch_that_image() ?>" width="400" height="200" alt="<?php the_title(); ?>">
     <?php  }else{   ?>
              <img class="j-lazy tsh" src="<?php echo sc_tsxcc('ts_morentu') ?>" data-original="<?php echo catch_that_image() ?>" width="400" height="200" alt="<?php the_title(); ?>">
          <?php  }?>
                 
                
                </a>
            </figure>
            <header class="post-info d-block">
                <h2 class="info-title t-line-1">
                   <?php if (is_sticky()): ?> <span class="badge bg-danger" style=" color: #fff;font-size: 14px; line-height: 1.4; padding: 0px 7px;background-color: #dc3545 !important; "><i class="fa fa-bolt"></i>置顶</span><?php endif; ?>
     <?php  if(empty(sc_tsxcc('ts_index_lmcs'))){  ?>
      <a class="badge d-none d-md-inline-block bg-primary ahfff" style="font-size: 14px; line-height: 1.4; padding: 0px 7px;color: #ffffff; " href="<?php foreach((get_the_category()) as $category){echo get_category_link($category);}?>"><?php foreach((get_the_category()) as $category){echo $category->name."";}?></a> 
     <?php  }else{   ?>
            <a class="badge d-none d-md-inline-block bg-primary ahfff" style="background-color: <?php ts_suijiyanse();?> !important;font-size: 14px; line-height: 1.4; padding: 0px 7px;color: #ffffff; " href="<?php foreach((get_the_category()) as $category){echo get_category_link($category);}?>"><?php foreach((get_the_category()) as $category){echo $category->name."";}?></a> 
          <?php  }?>
                    <a class="a-link puock-text" title="<?php the_title(); ?>" style=" font-size: 16px; " href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                </h2>
                <div class="info-meta d-block c-sub">
                    <p class="text-2line"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 100,'……'); ?></p>
                </div>
                <div class="info-footer w-100 clearfix d-none d-block">
                    <div class="float-left">
                                    <span class="t-sm c-sub">
                            <?php if (sc_tsxcc('ts_weznhangtjy') == '1') {  ?>
<span class="mr-2"><i class="fa fa-eye"></i><?php get_post_views($post -> ID); ?><span class="t-sm d-none d-sm-inline-block">次阅读</span></span>
 <?php }  ?>
<?php if (sc_tsxcc('ts_weznhangtjp') == '1') {  ?>
 <a class="c-sub-a" href="<?php the_permalink() ?>#comments">
                        <i class="fa fa-comment-o"></i><?php echo comments_users($post->ID); ?><span class="t-sm d-none d-sm-inline-block">个评论</span></a>
 <?php }  ?>
 </span>
                    </div>
                    <div class="float-right">
                        <a class="c-sub-a t-sm ml-md-2 line-h-20 d-inline-block d-md-none"  href="<?php foreach((get_the_category()) as $category){echo get_category_link($category);}?>"><i class="czs-tag-l mr-1"></i><?php foreach((get_the_category()) as $category){echo $category->name."";}?></a>                        <span class="t-sm ml-md-2 c-sub line-h-20 d-none d-md-inline-block"><?php the_time('Y-m-d'); ?></span>
                    </div>
                </div>
            </header>
        </div>
    </article>
          <?php endwhile;?>
<?php endif; ?>