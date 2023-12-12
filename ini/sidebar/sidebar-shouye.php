<div id="search-7" class="widget widget_search">
    <h3 class="widget-title">搜索干货</h3>
    <form  id="searchform" class="search-form" action="<?php bloginfo('url'); ?>/" method="get">
      <input type="text" class="keyword" placeholder="输入关键词搜索..." value="" name="s" id="s">
      <input type="submit" class="submit" value="&#xf002;">
    </form>
  </div>

<!--  该这里了，调用没整，后台只设置了背景图，在加上统计数据的设置 --->
<div class="widget-puock-author widget"> 
            <div class="header" style="background-image: url('<?php echo sc_tsxcc( 'ts_gerenzx_beijing' ); ?>')">
                <img class="avatar" src="<?php echo sc_tsxcc( 'ts_gerenzx_touxaing' ); ?>" alt="演示站点" title="演示站点">
            </div>
            <div class="content t-md puock-text">
                <div class="text-center p-2">
                    <div class="t-lg">演示站点</div>
                    <div class="mt10 t-sm"><?php echo sc_tsxcc( 'ts_gerenzx_jishao' ); ?></div>
                </div>
                <div class="row mt10">
                    <div class="col-6 text-center">
                        <div class="c-sub t-sm">阅读量</div>
                        <div><?php echo tsxcc_all_view(); ?></div>
                    </div>
                    <div class="col-6 text-center">
                        <div class="c-sub t-sm">评论数</div>
                        <div><?php echo $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments");?></div>
                    </div>
                </div>
            </div>
        </div>

<div id="wpcom-post-thumb-2" class="widget widget_post_thumb">
    <h3 class="widget-title">热门文章</h3>
    <ul>
<?php
$post_num = ''.sc_tsxcc('ts_syshulaing').''; // 设置调用条数
$args = array(
'post_password' => '',
'post_status' => 'publish', // 只选公开的文章.
'post__not_in' => array($post->ID),//排除当前文章
'ignore_sticky_posts' => 1, // 排除置顶文章.
'orderby' => 'comment_count', // 依评论数排序.
'posts_per_page' => $post_num
);
$query_posts = new WP_Query();
$query_posts->query($args);
while( $query_posts->have_posts() ) { $query_posts->the_post(); ?>

      <li class="item">
        <div class="item-img"> <a class="item-img-inner" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <img class="j-lazy" src="<?php echo catch_that_image() ?>" data-original="<?php echo catch_that_image() ?>" width="480" height="300" alt="<?php the_title(); ?>"> </a> </div>
        <div class="item-content">
          <p class="item-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
          <p class="item-date"><?php the_time('Y-m-d'); ?></p>
        </div>
      </li>
  <?php } wp_reset_query();?>
    </ul>
  </div>

<?php 
if (sc_tsxcc('ts_banner1')) {  
    echo '<div id="wpcom-image-ad-4" class="widget widget_image_ad"> <a href="'.sc_tsxcc('ts_banner1lianj').'" target="_blank"> <img class="j-lazy" src="" data-original="'.sc_tsxcc('ts_banner1').'"/> </a> </div>';
  }
?>
  




  <div id="wpcom-post-thumb-8" class="widget widget_post_thumb">
    <h3 class="widget-title">随机文章</h3>
    <ul>
<?php
$post_num = ''.sc_tsxcc('ts_sysjshulaing').'';
$args = array( 'numberposts' => $post_num, 'orderby' => 'rand', 'post_status' => 'publish' );
$rand_posts = get_posts( $args );
foreach( $rand_posts as $post ) : ?>

      <li class="item">
        <div class="item-img"> <a class="item-img-inner" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <img class="j-lazy" src="<?php echo catch_that_image() ?>" data-original="<?php echo catch_that_image() ?>" width="480" height="300" alt="<?php the_title(); ?>"> </a> </div>
        <div class="item-content">
          <p class="item-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
          <p class="item-date"><?php the_time('Y-m-d'); ?></p>
        </div>
      </li>
<?php endforeach; ?>
    </ul>
  </div>

  <!-- 广告2 -->
<?php 
if (sc_tsxcc('ts_banner2')) {  
    echo '<div id="wpcom-image-ad-12" class="widget widget_image_ad"> <a href="'.sc_tsxcc('ts_banner2lianj').'" target="_blank"> <img class="j-lazy" src="" data-original="'.sc_tsxcc('ts_banner2').'"/> </a> </div>';
  }
?>

 
  <div id="tag_cloud-3" class="widget widget_tag_cloud">
    <h3 class="widget-title">热门标签</h3>
    <div class="tagcloud">

<?php wp_tag_cloud( $args ); ?>
      
       </div>
  </div>