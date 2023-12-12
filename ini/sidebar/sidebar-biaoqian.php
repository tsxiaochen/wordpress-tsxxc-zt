  <div id="tag_cloud-3" class="widget widget_tag_cloud">
    <h3 class="widget-title">热门标签</h3>
    <div class="tagcloud">
<?php if ( function_exists('wp_tag_cloud') ) : ?>
 
<?php wp_tag_cloud('orderby=count&number=21'); ?>
 
  <?php endif; ?>    
       </div>
  </div>