
<div id="wrap">
     <?php get_template_part('ini/ad/gg','top') ?>
  <div class="wrap container">
    <div class="main">
      <?php if (empty(sc_tsxcc('ts_lunbo'))){}else{require get_template_directory() . '/ini/index/index-lunbo.php';   }?>
      <?php if (sc_tsxcc('ts_jiaodianxx') == '1') {  get_template_part('ini/index/index','jiaodian');}  ?>
      <?php if(sc_tsxcc('post_style')!='card'): ?>
      <div class="sec-panel main-list">
        <div class="sec-panel-head">
          <ul class="list tabs j-newslist">
            <li class="tab active"><span><a><i class="fa fa-bars"></i>最新文章</a></span></li>
                      
          </ul>
        </div>
        
       
        <ul class="post-loop post-loop-default tab-wrap clearfix active">
<?php 
$zxpai = sc_tsxcc('ts_paichu');
$zxwen = sc_tsxcc('ts_shulaing');
$paged = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;
$sticky = get_option( 'sticky_posts' );
$args = array(
	'ignore_sticky_posts' => 1,//忽略sticky_posts，不置顶，但是输出置顶文章
	'post__not_in' => $sticky,//排除置顶文章，不输出
	'cat' => $zxpai,
	'posts_per_page' => $zxwen,
	'paged' => $paged
);
query_posts( $args ); ?>
<?php while (have_posts()) : the_post(); ?>

          <li class="item">
            <div class="item-img"> 
            <a class="item-img-inner" href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"> 
          <?php  if(empty(sc_tsxcc('ts_img_lazy_s'))){  ?>
      <img src="<?php echo catch_that_image() ?>" width="480" height="300" alt="<?php the_title(); ?>">
     <?php  }else{   ?>
             <img class="j-lazy" src="<?php echo sc_tsxcc('ts_morentu') ?>" data-original="<?php echo catch_that_image() ?>" width="480" height="300" alt="<?php the_title(); ?>">
          <?php  }?>
            </a>
      <?php  if(empty(sc_tsxcc('ts_index_lmcs'))){  ?>
      <a class="item-category" href="<?php foreach((get_the_category()) as $category){echo get_category_link($category);}?>" target="_blank">
     <?php  }else{   ?>
            <a class="item-category" href="<?php foreach((get_the_category()) as $category){echo get_category_link($category);}?>" style="background-color: <?php ts_suijiyanse();?> !important;" target="_blank">
          <?php  }?>
            <?php foreach((get_the_category()) as $category){echo $category->name."";}?></a> </div>
            <div class="item-content">
              <h2 class="item-title"> <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"> <?php the_title(); ?></a> </h2>
              <div class="item-excerpt">
                <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200,'……'); ?></p>
              </div>
              <div class="item-meta"> <span class="item-meta-li date"><?php the_time('Y-m-d'); ?> </span> 
<?php if (sc_tsxcc('ts_weznhangtjy') == '1') {  ?>
  <span class="item-meta-li views" title="<?php the_title(); ?>"><i class="fa fa-eye"></i><?php get_post_views($post -> ID); ?>次阅读</span>
 <?php }  ?>
<?php if (sc_tsxcc('ts_weznhangtjp') == '1') {  ?>
  <span class="item-meta-li views" title="<?php the_title(); ?>"><i class="fa fa-comment-o"></i><?php echo comments_users($post->ID); ?>个评论</span> </div>
 <?php }  ?>
            </div>
          </li>
<?php endwhile; ?>
        </ul>

            
        </div>
       <?php get_template_part('ini/ad/gg','indexdb') ?>
          <?php else: get_template_part('ini/buju/fenlei','kapian'); endif; ?>
        
        
    </div>
<!--调用侧边栏 -->
<?php get_sidebar();?>
<!--调用侧边栏 -->
 </div>
 <?php if (sc_tsxcc('ts_index_dbtu') == '1'){get_template_part('ini/index/index','dibutu'); } ?>
 <?php if (sc_tsxcc('ts_index_l') == '1'){get_template_part('ini/index/index','two'); } ?>
 <?php if (sc_tsxcc('ts_index_lb') == '1'){get_template_part('ini/index/index','twot'); } ?>
<?php if (sc_tsxcc('ts_index_yq') == '1'){get_template_part('ini/index/index','yqlj'); } ?>

</div>