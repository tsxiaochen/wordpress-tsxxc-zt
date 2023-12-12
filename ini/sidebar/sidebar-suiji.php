<div id="wpcom-post-thumb-8" class="widget widget_post_thumb">
    <h3 class="widget-title">随机文章</h3>
    <ul>
<?php 
$post_num = ''.sc_tsxcc('ts_syshulaing').''; // 设置调用条数
$args = array(
'ignore_sticky_posts' => 1, // 排除置顶文章.
'orderby' => 'rand', // 依评论数排序.
'posts_per_page' => $post_num
);

query_posts($args); ?>
<?php while (have_posts()) : the_post(); ?>
      <li class="item">
        <div class="item-img"> <a class="item-img-inner" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <img class="j-lazy" src="<?php echo catch_that_image() ?>" data-original="<?php echo catch_that_image() ?>" width="480" height="300" alt="<?php the_title(); ?>"> </a> </div>
        <div class="item-content">
          <p class="item-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
          <p class="item-date"><?php the_time('Y-m-d'); ?></p>
        </div>
      </li>
<?php endwhile; ?>
    </ul>
  </div>