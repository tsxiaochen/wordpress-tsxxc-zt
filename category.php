<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<meta name="renderer" content="webkit">
<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width">
<?php get_template_part( '/ini/seo' ); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/stat/style.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/stat/style.min.css">
<script type='text/javascript' src="<?php bloginfo('template_directory'); ?>/stat/js/jquery.min.js"></script>
<script type='text/javascript' src="<?php bloginfo('template_directory'); ?>/stat/js/jquery-migrate.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/stat/index.css">
<meta name="applicable-device" content="pc,mobile" />
<meta http-equiv="Cache-Control" content="no-transform" />
<script> (function() {if (!/*@cc_on!@*/0) return;var e = "abbr, article, aside, audio, canvas, datalist, details, dialog, eventsource, figure, footer, header, hgroup, mark, menu, meter, nav, output, progress, section, time, video".split(', ');var i= e.length; while (i--){ document.createElement(e[i]) } })()</script>
<!--[if lte IE 8]><script src="{pboot:sitedomain}/skin/js/respond.min.js"></script><![endif]-->
</head>
<body class="archive category category-tuiguang category-53 el-boxed">
<?php get_header();?>

<div id="wrap">
    <?php get_template_part('ini/ad/gg','top') ?>
  <div class="container wrap">
    <div class="main">
      <div class="sec-panel sec-panel-default">
        <div class="sec-panel-head">
          <h1><span><?php single_cat_title(); ?></span></h1>
        </div>

       <?php if(sc_tsxcc('post_style')!='card'): ?>
        <ul class="post-loop post-loop-default cols-0 clearfix">
         <?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>


          <li class="item">
            <div class="item-img"> <a class="item-img-inner" href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"> 
           <?php  if(empty(sc_tsxcc('ts_index_lmcs'))){  ?>
     <img class="j-lazy" src="<?php echo catch_that_image() ?>" width="480" height="300" alt="<?php the_title(); ?>">
     <?php  }else{   ?>
           <img class="j-lazy" src="<?php echo sc_tsxcc('ts_morentu') ?>" data-original="<?php echo catch_that_image() ?>" width="480" height="300" alt="<?php the_title(); ?>">
          <?php  }?>
            
            
            </a>
             <?php  if(!empty(sc_tsxcc('ts_flzd'))){  ?>
             <?php if (is_sticky()): ?><span class="badge bg-danger" style=" position: absolute; left: 85px; top: 10px; padding: 5px 6px; font-size: 1rem; line-height: 1; color: #fff; filter: alpha(opacity=60); border-radius: 2px; text-decoration: none; background-color: #dc3545 !important; height: 22px;"><i class="fa fa-bolt"></i>置顶</span><?php endif; ?>
              <?php  }?>
                      <?php  if(empty(sc_tsxcc('ts_index_lmcs'))){  ?>
     <a class="item-category" href="<?php foreach((get_the_category()) as $category){echo get_category_link($category);}?>" target="_blank"><?php single_cat_title(); ?></a>
     <?php  }else{   ?>
             <a class="item-category" style="background-color:<?php ts_suijiyanse();?> !important;" href="<?php foreach((get_the_category()) as $category){echo get_category_link($category);}?>" target="_blank"><?php single_cat_title(); ?></a>
          <?php  }?>
            </div>
            <div class="item-content">
                           
              <h2 class="item-title"> <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"> <?php the_title(); ?> </a> </h2>
              <div class="item-excerpt">
                <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200,'……'); ?></p>
              </div>
              <div class="item-meta"> <span class="item-meta-li date"><?php the_time('Y-m-d'); ?></span> <span class="item-meta-li views" title=" <?php the_title(); ?>"><i class="fa fa-eye"></i><?php get_post_views($post -> ID); ?>次阅读</span>  <span class="item-meta-li views" title="<?php the_title(); ?>"><i class="fa fa-comment-o"></i><?php echo comments_users($post->ID); ?>个评论</span></div>
            </div>
          </li>
          <?php endwhile;?>
<?php endif; ?>
        </ul>

        <?php else: get_template_part('ini/buju/category','kapian'); endif; ?>
        
        
        
        <div class="pagination clearfix">  

   <?php ts_paging();?>

</div>
 

      </div>
    </div>
 <?php get_sidebar();?>
 </div>
</div>
<?php get_footer();?>

</body>
</html>