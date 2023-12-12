<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<meta name="renderer" content="webkit">
<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width">
<title><?php if(is_search()) {
    $s = $_GET['s'];
    $s = strip_tags($s);
    echo "【".$s."】的搜索结果"." - ";
    bloginfo('name');
  }
  ?></title>
<meta name="description" content="<?php echo trim(strip_tags(category_description())); ?>"/>
<meta name="keywords" content="<?php echo sc_tsxcc('ts_guanjianci'); ?>" />
<link rel="shortcut icon" href="<?php
  if (sc_tsxcc('ts_ico')) {
    echo ''.sc_tsxcc('ts_ico').'';
  } else  {
    echo ''.bloginfo('template_directory').'/favicon.ico';
  } 
  ?>">


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
  <div class="container wrap">
    <div class="main">
      <div class="sec-panel sec-panel-default">
        <div class="sec-panel-head">
          <h1><span><?php if(is_search()) {
    $s = $_GET['s'];
    $s = strip_tags($s);
    echo "【".$s."】的搜索结果";
  }
  ?></span></h1>
        </div>
        <ul class="post-loop post-loop-default cols-0 clearfix">
         <?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>


          <li class="item">
            <div class="item-img"> <a class="item-img-inner" href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"> <img class="j-lazy" src="<?php echo catch_that_image() ?>" data-original="<?php echo catch_that_image() ?>" width="480" height="300" alt="<?php the_title(); ?>"> </a> <a class="item-category" href="<?php foreach((get_the_category()) as $category){echo get_category_link($category);}?>" target="_blank"><?php single_cat_title(); ?></a> </div>
            <div class="item-content">
              <h2 class="item-title"> <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"> <?php the_title(); ?> </a> </h2>
              <div class="item-excerpt">
                <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200,'……'); ?></p>
              </div>
              <div class="item-meta"> <span class="item-meta-li date"><?php the_time('Y-m-d'); ?> </span> <span class="item-meta-li views" title=" <?php the_title(); ?>"><i class="fa fa-eye"></i><?php get_post_views($post -> ID); ?></span> </div>
            </div>
          </li>
          <?php endwhile;?>
<?php endif; ?>
        </ul>
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