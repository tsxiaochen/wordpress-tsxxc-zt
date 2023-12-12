<!DOCTYPE html>
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


<!-- 后台设置文章页是否启用彩色标签 -->
   <?php if (sc_tsxcc('ts_jinyong_hengtiao')) {
    echo '<style>
.entry-tag a {background-color: #FF7F27;box-sizing: border-box;color: #fff;display: inline;font-size: 12px;height: auto;line-height: 10.5px;padding-bottom: 3px;padding-left: 7.2px;padding-right: 7.2px;padding-top: 3px;text-align: center;vertical-align: baseline;white-space: nowrap;width: auto;}.entry-tag a:nth-child(2){background-color: #00A2E8;}.entry-tag a:nth-child(3){background-color: #A349A4;}.entry-tag a:nth-child(4){background-color: #ED1C24;}.entry-tag a:nth-child(5){background-color: #B5E61D;}.entry-tag a:nth-child(6){background-color: #22B14C;}.entry-tag a:nth-child(7){background-color: #B97A57;}.entry-tag a:nth-child(8){background-color: #7F7F7F;}.entry-tag a:nth-child(9){background-color: #FFF200;}.entry-tag a:nth-child(10){background-color: #7092BE;}.entry-tag a:hover {cursor:pointer;}.entry-tag a.space{background-color: #BCBCBC;}.entry-tag a:before {
    content: "#";}.entry-tag a:hover {
    background: #999;}
    </style>
    ';
  } else  {
    echo '<style>
.entry-tag a {
	display: inline-block;
	margin: 0 10px 5px 0;
	padding: 5px 15px;
	font-size: 14px;
	font-size: 1.16667rem;
	line-height: 1.2;
	color: #666;
	border: 1px solid #999;
	border-radius: 3px
}.entry-tag {
	font-size: 0
}
.entry-tag a:focus, .entry-tag a:hover {
	color: #fff;
	background: #4285f4;
	border-color: #4285f4;
	text-decoration: none
}
</style>';
  } 
  ?>
<div id="wrap">
    <?php get_template_part('ini/ad/gg','top') ?>
  <div class="container wrap">
    <div class="<?php if ( get_post_meta(get_the_ID(), 'hide_side', true) ) : ?>
  <?php echo 'main2';?>
 <?php else: ?>
  <?php echo 'main';?>
 <?php endif; ?>">
    <?php if(empty(sc_tsxcc('ts_weznhangtjz_mb'))){ require get_template_directory() . '/ini/single/single-mb.php';  }?>
      <article id="post-185570" class="post-185570 post type-post status-publish format-standard hentry category-tuiguang category-yunying tag-871 tag-3713 special-tuiguang">
        <div class="entry">
          <div class="entry-head">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <div class="entry-info"><?php if (sc_tsxcc('ts_weznhangtjz_sin ') == '1') {  ?>作者：<?php echo get_the_author_meta( 'display_name', $post->post_author ); ?><a class="nickname"></a> <span class="dot">•</span>
 <?php }  ?><span>更新时间：<?php the_time('Y-m-d'); ?></span> 
            <?php if (sc_tsxcc('ts_weznhangtjy_sin') == '1') {  ?>
 <span class="dot">•</span><span>阅读 <?php get_post_views($post -> ID); ?> </span> 
 <?php }  ?>
 <?php if (sc_tsxcc('ts_weznhangtjp_sin') == '1') {  ?>
<span class="dot">•</span><span>评论<?php echo comments_users($post->ID); ?>
 <?php }  ?>
</span></div>
          </div>
		  <?php get_template_part('ini/ad/gg','xqtxd') ?>
		 <!-- 文章标题下方的广告END -->
          <!--详情标题下一句话广告 -->
          <?php get_template_part('ini/ad/gg','xqtx') ?>
          <div class="entry-content clearfix">
          	<?php the_content(''); ?>
            <?php $origin_author = get_post_meta(get_the_ID(), 'origin_author', true);
             if (empty($origin_author)): ?>
              <div class="entry-copyright">
              <p><span class="font-weight-bold" style=" font-weight: 700!important; ">版权声明：</span>本站原创文章，由<?php echo get_the_author_meta( 'display_name', $post->post_author ); ?> <?php the_time('Y-m-d'); ?>发表，共计<?php echo count_words (@$text); ?>字。</p>
              <p><span class="font-weight-bold" style=" font-weight: 400!important; ">转载说明：</span>除特殊说明外本站文章皆由CC-4.0协议发布，转载请注明出处：<?php the_permalink() ?></p>
            </div>
               <?php else: ?>
             <div class="entry-copyright">
              <p><span class="font-weight-bold" style=" font-weight: 700!important; ">版权声明：</span>本站转载文章，出自 <a target="_blank" href="<?php echo $origin_url ?>" class="a-link" rel="nofollow"><?php echo $origin_author ?></a>，共计<?php echo count_words ($text); ?>字。</p>
              <p><span class="font-weight-bold" style=" font-weight: 400!important; ">转载说明：</span>此文章非本站原创文章，若需转载请联系原作者获得转载授权。</p>
            </div>
             <?php endif; ?>
          </div>
          <?php if(empty(sc_tsxcc('ts_dianzanss'))){ }else {require get_template_directory() . '/ini/index/index-zanshang.php';}?>

            <?php get_template_part('ini/ad/gg','xqtxdd') ?>
			<!-- 文章底部的广告END -->
          <div class="entry-footer">
            <div class="entry-tag"><?php the_tags('', ' ', ''); ?> </div>
            <div class="entry-page" style=" text-align: center!important; ">
             <?php
$prev_post = get_previous_post();
if (!empty( $prev_post )): ?>
			  <div class="entry-page-prev j-lazy" style="padding: 40px 15px 10px;"> <a href='<?php echo get_permalink( $prev_post->ID ); ?>'><span><?php echo $prev_post->post_title; ?></span></a> 
                <div class="entry-page-info"> <span class="pullleft">上一篇</span><!-- <span class="pull-right"><?php the_time('Y-m-d'); ?></span> --> </div>
              </div>
			<?php endif; ?>
 <?php
$next_post = get_next_post();
if (!empty( $next_post )): ?>
			  <div class="entry-page-next j-lazy" style="padding: 40px 15px 10px;"> <a href='<?php echo get_permalink( $next_post->ID ); ?>'><span><?php echo $next_post->post_title; ?></span></a> 
                <div class="entry-page-info"> <span class="pullright">下一篇</span>  </div>
              </div>
			<?php endif; ?>

            </div>
            <h3 class="entry-related-title">相关推荐</h3>
            <ul class="entry-related clearfix">
              <?php
$cats = wp_get_post_categories($post->ID);
if ($cats) {
$args = array(
        'category__in' => array( $cats[0] ),
        'post__not_in' => array( $post->ID ),
        'showposts' => 6,
        'ignore_sticky_posts' => 1
    );
query_posts($args);
if (have_posts()) : while (have_posts()) : the_post(); update_post_caches($posts); ?>
			  <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; else : ?>
<?php endif; wp_reset_query(); } ?>
            </ul>
          </div>
        </div>
      </article>
      <?php comments_template( '/comments.php' ); ?>
    </div>
<!--调用侧边栏 -->
 <?php if ( get_post_meta(get_the_ID(), 'hide_side', true) ) : ?>
  <?php echo '';?>
 <?php else: ?>
  <?php echo ''.get_sidebar().'';?>
 <?php endif; ?>
<!--调用侧边栏 -->
 </div>
</div>
<?php get_footer();?>
</body>
</html>