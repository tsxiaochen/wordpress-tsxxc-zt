<?php get_template_part('ini/ad/gg','borrn') ?>
<footer class="footer">
  <div class="container">
    <div class="clearfix">
      <div class="footer-col footer-col-copy">
        <ul class="footer-nav hidden-xs">
<?php                                        
  wp_nav_menu( array(
    'theme_location'  => 'dibucaidan',                   //导航别名
    'menu'   => 'dibucaidan',                            //期望显示的菜单
    'container'  => 'div',                     //容器标签
    'container_class' => '',                   //ul父节点class值
    'container_id'  => '',                     //ul父节点id值
    'menu_class'   => 'menu',                  //ul节点class值
    'menu_id'   => '',                         //ul节点id值
    'echo'  => true,                           //是否输出菜单，默认为真
    'fallback_cb' => 'wp_page_menu',           //菜单不存在时，返回默认菜单，设为false则不返回
    'before' => '',                            //链接前文本
    'after'  => '',                            //链接后文本
    'link_before'  => '',                      //链接文本前
    'link_after'  => '',                       //链接文本后
    'items_wrap'  => '<ul id="%1$s" class="%2$s">%3$s</ul>',   //如何包装列表
    'depth' => 0,                             //菜单深度，默认0
    'walker' => ''                            //自定义walker
  ) ); ?>
        </ul>
        <div class="copyright">
        <?php echo sc_tsxcc( 'ts_tishiwenzi', '请在主题基本设置中设置底部内容' ); ?>
        <?php  if (sc_tsxcc('ts_dibu_xx') == '1') {get_template_part('ini/index/index','dibuxx');}?>
        </div>
      </div>
      <div class="footer-col footer-col-sns">
        <div class="footer-sns"> </div>
      </div>
    </div>
  </div>
</footer>
<div class="action" style="top:50%;">
 
  <div class="a-box contact">
    <div class="contact-wrap">
      <h3 class="contact-title">联系我</h3>
      <p><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo sc_tsxcc( 'ts_qq', '771497507' ); ?>&site=qq&menu=yes" target="_blank" rel="noopener"><img class="alignnone" title="点击这里给我发消息" src="<?php bloginfo('template_directory'); ?>/stat/images/button_111.gif" alt="点击这里给我发消息" width="79" height="25" border="0" /></a></p>
      <p>微信号：<?php echo sc_tsxcc( 'ts_weixin'); ?></p>
      <?php  if (sc_tsxcc('ts_dianhua')) {    echo '<p>电话：'.sc_tsxcc('ts_dianhua').'</p>';  }  ?>
    </div>
  </div>
  <div class="a-box wechat">
    <div class="wechat-wrap"> <img src="<?php echo sc_tsxcc( 'ts_erweima'); ?>"> </div>
  </div>
  <div class="a-box gotop" id="j-top" style="display: none;"></div>
</div>
<style>
.footer{padding-bottom: 20px;}
</style>
<?php  if (sc_tsxcc('ts_pinglunapi') == '1') { ?>
<script>
$.getJSON("/pinglunapi.php?encode=json", function(data) {
    $("#comment").text(data.text);
});
$(function() {
    $("#comment").click(function() {
        $(this).select();
    })
})
</script>
<?php }?>

<?php  if (sc_tsxcc('ts_img_lazy_s') || sc_tsxcc('ts_img_lazy_z')  || sc_tsxcc('ts_img_lazy_a') == '1') { ?>
      <script>
    $(document).ready(function(){
        $("img.j-lazy").lazyload({
            effect : "fadeIn",
            failurelimit : 10    //failurelimit : 10 在找到10张不在可视范围内的图片时中止执行
        });
    });
</script>
<?php }?>
<!-- comment ua-info -->
<script>
jQuery('.comment-list').hover(     
    function(){
        jQuery(this).find('span.comment_ua_info').show();
    },
    function(){
        jQuery(this).find('span.comment_ua_info').hide();
    });
jQuery('.comment-body').click(     
    function(){
        jQuery(this).find('span.comment_ua_info').show();
    });
</script>

<!--以上为内容 -->
 <script type='text/javascript'>
 
/* <![CDATA[ */
var _wpcom_js = {"slide_speed":"4000","video_height":"482"};
/* ]]> */
</script> 
<script type='text/javascript' src="<?php bloginfo('template_directory'); ?>/stat/js/main.js"></script>
 <script type='text/javascript' src="<?php bloginfo('template_directory'); ?>/stat/js/wp-embed.js"></script>

<?php if(empty(sc_tsxcc('ts_dianzanss'))){ }else { ?>
<script type="text/javascript">
$(document).ready(function() { 
	$.fn.postLike = function() {
		if ($(this).hasClass('done')) {
			alert('您已赞过!');
			return false;
		} else {
			$(this).addClass('done');
			var id = $(this).data("id"),
			action = $(this).data('action'),
			rateHolder = $(this).children('.count');
			var ajax_data = {
				action: "bigfa_like",
				um_id: id,
				um_action: action
			};
			$.post("<?php bloginfo('url');?>/wp-admin/admin-ajax.php", ajax_data, function(data) {
				$(rateHolder).html(data);
			});
			return false;
		}
	};
	$(document).on("click", ".favorite", function() {
		$(this).postLike();
	});
}); 
</script>
<?php } ?>

  </script>
  <?php echo sc_tsxcc( 'ts_tongji_d' ); ?>
  <script type="text/javascript" src="//js.users.51.la/21463629.js"></script>
<?php wp_footer();?>