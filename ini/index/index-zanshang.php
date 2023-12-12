<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/stat/js/jBox.js"></script>
<div id="z_s_s">                                                                           
<div class="social-main">
<span class="like"><a id="praise" data-no-instant class="favorite<?php if(isset($_COOKIE['bigfa_ding_'.$post->ID])) echo ' done';?>" href="javascript:;" rel="external nofollow"  rel="external nofollow"  data-action="ding" data-id="<?php the_ID(); ?>">赞 <span class="count"><?php if( get_post_meta($post->ID,'bigfa_ding',true) ){echo get_post_meta($post->ID,'bigfa_ding',true);} else { echo '0';}?></span> </a></span>
<span class="shang-p"><a href="#pay_shang" id="shang-main-p">赏</a></span>
<div class="clear"></div></div></div>
<style>#z_s_s{border-bottom:none;padding:20px 0 40px 0;}
.social-main{position: relative; margin: 0 auto; width: 283px;}
.social-main a{float: left; color: #fff; line-height: 35px; text-align: center; border-radius: 2px;}
.social-main a:hover{background: #878787; transition: all .2s ease-in 0s;}
.like a{position: absolute;left: 90px;top: -7px;background: #a069a1;  width: 50px; height: 50px; font-size: 15px; font-weight: 600; line-height: 40px; border: 4px solid #fff; border-radius: 40px;}
 .shang-p a{position: absolute; left: 140px; top: -7px; background: #7ab951; width: 50px; height: 50px; font-size: 15px; font-weight: 600; line-height: 40px; border: 4px solid #fff; border-radius: 40px;}</style>
 <script>
 //打赏效果
$('#shang-main-p').jBox('Tooltip', {
content: '<img src="<?php echo sc_tsxcc( 'ts_dianzanss_ewm'); ?> " />',
closeOnMouseleave: true
});
</script>