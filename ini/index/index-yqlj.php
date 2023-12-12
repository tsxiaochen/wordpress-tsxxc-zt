  <div class="container hidden-xs j-partner">
    <div class="sec-panel">
      <div class="sec-panel-head">
        <h2><span>友情链接</span> <small>百度权重≥1符合友链交换</small> <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo sc_tsxcc( 'ts_qq', '771497507' ); ?>&site=qq&menu=yes" target="_blank" class="more">申请友链</a></h2>
      </div>
      <div class="sec-panel-body">
        <div class="list list-links"> 
<style>  /*友情链接样式*/.sec-panel-body li{  list-style:none;  float:left;   width:auto;   margin:0 5px;}</style>
<a></a><?php  if ( is_home()) { ?>
 <?php wp_list_bookmarks('title_li=&categorize=0&orderby=link_id&limit=12'); ?>
 <?php } ?>
        </div>
      </div>
    </div>
  </div>