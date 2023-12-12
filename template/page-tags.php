<?php
/*
 Template Name: 标签归档
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
  <div class="wrap container" style=" background: #fff; ">
      <h3 class="single-title" style=" text-align: center; "><?php the_title(); ?></h3>

 
 
 

<div class="container container-tags">
	<div class="tagslist">
		<ul>
			<?php 
				$tags_count = 100;
				$tagslist = get_tags('orderby=count&order=DESC&number='.$tags_count);
				foreach($tagslist as $tag) {
					echo '<li><a class="name" href="'.get_tag_link($tag).'">'. $tag->name .'</a><small>&times;'. $tag->count .'</small>'; 
					$posts = get_posts( "tag_id=". $tag->term_id ."&numberposts=1" );
					foreach( $posts as $post ) {
						setup_postdata( $post );
						echo '<p><a class="tit" href="'.get_permalink().'">'.get_the_title().'</a></p>';
					}
					echo '</li>';
				} 
		
			?>
		</ul>
	</div>
</div>
<style type="text/css">
/* CSS Document */
.container-tags{}
.container-tags h1{font-size: 22px;margin: 0;text-align: center;margin-bottom: 15px;}
.tagslist{overflow: hidden;}
.tagslist ul{list-style-type: none;padding: 0;margin: 0 -2% 0 0;}
.tagslist li{float: left;width: 23%;margin-right: 2%;margin-bottom: 2%;padding: 15px;border: 1px solid #eee;background-color: #fff;border-radius: 2px;}
.tagslist li .name{background-color: #eee;display: inline-block;padding: 5px 10px 4px;font-size: 12px;color: #666;}
.tagslist li .name:hover{background-color: #444;color: #fff;}
.tagslist li:hover{border-color: #ccc;}
.tagslist li:hover .name{background-color: #1abc9c;color: #fff;}
.tagslist li small{margin-left: 10px;color: #bbb;}
.tagslist li p{margin: 10px 0 0;font-size: 12px;height: 17px;overflow: hidden;display: block;line-height: 1.5;}
.tagslist li .tit{color: #999;}
.tagslist li .tit:hover{color: #444;}
@media (max-width:1024px){
	.tagslist li{width: 31.3333333%;}
}
@media (max-width:768px){
	.tagslist li{width: 48%;}
}
@media (max-width:640px){
	.container-tags{padding: 15px;}
}
@media (max-width:544px){
	.container-tags h1{font-size: 14px;font-weight: bold;margin-bottom: 10px;}
	.tagslist li{padding: 10px;}
}s
</style>
 
 
 
 
  </div>
</div>
<?php get_footer();?>

</body>
</html>
