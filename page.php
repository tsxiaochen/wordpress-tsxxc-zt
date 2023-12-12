<?php
/*
Template Name: 单页模板
*/
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<meta name="renderer" content="webkit">
<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width">
<title><?php the_title(); ?><?php
  if (sc_tsxcc('ts_lianjiefu')) {
    echo ''.sc_tsxcc('ts_lianjiefu').'';
  } else  {
    echo '_';
  } 
  ?><?php
  if (sc_tsxcc('ts_title')) {
    echo ''.sc_tsxcc('ts_title').'';
  } else  {
    echo ''.bloginfo('name').'';
  } 
  ?><?php
  if (sc_tsxcc('ts_lianjiefu')) {
    echo ''.sc_tsxcc('ts_lianjiefu').'';
  } else  {
    echo '';
  } 
  ?> </title>
<meta name="description" content="<?php $content = get_the_content();$trimmed_content = wp_trim_words( $content, 50, '' );echo $trimmed_content;?>" />
<meta name="keywords" content="<?php echo sc_tsxcc('ts_guanjianci'); ?>" />
<link rel="shortcut icon" href="<?php
  if (sc_tsxcc('ts_ico')) {
    echo ''.sc_tsxcc('ts_ico').'';
  } else  {
    echo ''.bloginfo('template_directory').'/favicon.ico';
  } 
  ?>">

<link rel="shortcut icon" href="<?php echo sc_tsxcc( 'ts_ico' ); ?>">

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
  <div class="wrap container">
    <div class="main main-full">
      <ol class="breadcrumb entry-breadcrumb">
        <li class="home" property="itemListElement" typeof="ListItem"><i class="fa fa-map-marker"></i>
          <meta property="position" content="1">
        </li>
        <li property="itemListElement" typeof="ListItem"><a href="'.get_option('home').'">首页</a> / <?php the_title(); ?>
          <meta property="position" content="2">
        </li>
      </ol>
      <article id="post-13805" class="post-13805 post type-post status-publish format-standard hentry category-tuijian">
        <div class="entry">
          <div class="entry-head">
            <h1 class="entry-title"><?php the_title(); ?></h1>
          </div>
          <div class="entry-content clearfix"> <?php the_content(''); ?>
 </div>
          <div class="entry-footer">
            <h3 class="entry-related-title">相关推荐</h3>
            <ul class="entry-related clearfix">
     <?php
global $post;
$postid = $post->ID;
$args = array( 'orderby' => 'rand', 'post__not_in' => array($post->ID), 'ignore_sticky_posts' => 1,'showposts' => 6);
$query_posts = new WP_Query();
$query_posts->query($args);
?>
<?php while ($query_posts->have_posts()) : $query_posts->the_post(); ?>

			  <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
<?php endwhile; ?>
            </ul>
          </div>
        </div>
      </article>
    </div>
  </div>
</div>
<?php get_footer();?>

</body>
</html>