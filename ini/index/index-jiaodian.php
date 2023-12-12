<div class="sec-panel topic-recommend">
        <div class="sec-panel-head">
          <h2><span><i class="fa fa-bars" aria-hidden="true"></i>推荐阅读</span> <small></small></h2>
        </div>
        <div class="sec-panel-body">
          <ul class="list topic-list">
<?php 
$jdwen = ''.sc_tsxcc('ts_jiaodian').'';
$postsl = get_posts("numberposts=4&post_type=post&include=$jdwen"); 
if($postsl) : foreach( $postsl as $post ) : setup_postdata( $post ); 
?>
            <li class="topic"> <a class="topic-wrap" href="<?php the_permalink() ?>" target="_blank">
              <div class="cover-container"> 
              <?php  if(empty(sc_tsxcc('ts_img_lazy_s'))){  ?>
      <img src="<?php echo catch_that_image() ?>">
     <?php  }else{   ?>
             <img class="j-lazy" src="<?php echo sc_tsxcc('ts_morentu') ?>" data-original="<?php echo catch_that_image() ?>">
          <?php  }?>
              
              </div>
              <span><?php the_title(); ?></span> </a> </li>
<?php endforeach; endif; ?>
         
          </ul>
        </div>
      </div>