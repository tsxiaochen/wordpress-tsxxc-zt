<?php
/*
 Template Name: 文章归档
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
           <li class="home" property="itemListElement" typeof="ListItem" style="  list-style: none;    padding: 10px 0 0px 0px;    border-radius: 0;    border-bottom: 1px solid #f7f7f7;">
         <p><i class="fa fa-map-marker"></i>[<a id="al_expand_collapse" href="#">全部展开/收缩</a>] <span>(注: 点击月份可以展开)</span></p>
      </li>
<?php zww_archives_list(); ?>
<script>(function ($, window) {
	$(function() {
		var $a = $('#archives'),
			$m = $('.al_mon', $a),
			$l = $('.al_post_list', $a),
			$l_f = $('.al_post_list:first', $a);
		$l.hide();
		$l_f.show();
		$m.css('cursor', 'pointer').on('click', function(){
			$(this).next().slideToggle(400);
		});
		var animate = function(index, status, s) {
			if (index > $l.length) {
				return;
			}
			if (status == 'up') {
				$l.eq(index).slideUp(s, function() {
					animate(index+1, status, (s-10<1)?0:s-10);
				});
			} else {
				$l.eq(index).slideDown(s, function() {
					animate(index+1, status, (s-10<1)?0:s-10);
				});
			}
		};
		$('#al_expand_collapse').on('click', function(e){
			e.preventDefault();
			if ( $(this).data('s') ) {
				$(this).data('s', '');
				animate(0, 'up', 100);
			} else {
				$(this).data('s', 1);
				animate(0, 'down', 100);
			}
		});
	});
})(jQuery, window);</script>
<style>
.archive-title{border-bottom:1px #eee solid;position:relative;padding-bottom:4px;margin-bottom:10px}

.archives li{list-style-type:none}

.archives li a{padding:8px 0;display:block}

.archives li a:hover .atitle:after{background:#ff5c43}

.archives li a span{display: inline-block;width:100px;font-size:12px;text-indent:20px}

.archives li a .atitle{display: inline-block;padding:0 15px;position:relative}

.archives li a .atitle:after{position:absolute;left:-6px;background:#ccc;height:8px;width:8px;border-radius:6px;top:8px;content:""}

.archives li a .atitle:before{position:absolute;left:-8px;background:#fff;height:12px;width:12px;border-radius:6px;top:6px;content:""}

.archives{position:relative;padding:10px 0}

.archives:before{height:100%;width:4px;background:#eee;position:absolute;left:130px;content:"";top:0}

.m-title{position:relative;margin:10px 0;cursor:pointer}

.m-title:hover:after{background:#ff5c43}

.m-title:before{position:absolute;left:127px; background:#fff; height:18px;width:18px;border-radius:6px;top:3px;content:""}

.m-title:after{position:absolute;left:127px;background:#ccc;height:12px;width:12px;border-radius:6px;top:6px;content:""}
</style>
  </div>
</div>
<?php get_footer();?>

</body>
</html>
