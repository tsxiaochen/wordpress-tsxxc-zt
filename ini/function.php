<?php
//用户自定义头像功能
include (TEMPLATEPATH . '/author-avatars.php');
include (TEMPLATEPATH . '/ini/sidebar/sidebar.php');
include (TEMPLATEPATH . '/ini/widget.php');
include (TEMPLATEPATH . '/ini/comment-ajax.php');
//用户没有设置菜单时显示提示语
function default_menu() {
    echo '<ul id="topmeau" class="nav navbar-nav wpcom-adv-menu"><li id=" menu-item-42" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-42menu-item  active"><a title="首页" href="'.home_url().'/wp-admin/nav-menus.php" class="toplink">设置菜单</a></li>
</ul>';
}
//头像库替换  后台设置是否启用
//function wpyou_get_avatar($avatar) {
//   $avatar = str_replace(array("www.gravatar.com","0.gravatar.com","1.gravatar.com","2.gravatar.com"),"dn-qiniu-avatar.qbox.me",$avatar);
 //  return $avatar;
//   }
//   add_filter( 'get_avatar', 'wpyou_get_avatar', 10, 3 );

/*调取文章第一张图为缩略图  调用代码<?php echo catch_that_image() ?>  */
function catch_that_image() {
     $ts_moru = sc_tsxcc('ts_morentu');
      global $post, $posts;
      $first_img = '';
      ob_start();
      ob_end_clean();
      $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',
$post->post_content, $matches);
      @$first_img = $matches [1] [0];
      //取消默认图，调取后台默认图设置
      if(empty($first_img)){ //Defines a default image
       $first_img = $ts_moru;
      }   //取消默认图，调取后台默认图设置
      return $first_img;
    }
    
//管理后台添加按钮
function git_custom_adminbar_menu($wp_admin_bar) {
    if (!is_user_logged_in()) {
        return;
    }
    if (!is_super_admin() || !is_admin_bar_showing()) {
        return;
    }
        $url = home_url();
        $wp_admin_bar->add_menu(array(
        'id' => 'git_shouye',
        'title' => '网站首页', /* 设置链接名 */
        'href' => ''.$url.'',
        'meta' => array(
            'target' => '_blank'
        )
    ));
    $wp_admin_bar->add_menu(array(
        'id' => 'git_option',
        'title' => '主题选项', /* 设置链接名 */
        'href' => 'admin.php?page=tsxcc-admin'
    ));
    $wp_admin_bar->add_menu(array(
        'id' => 'git_guide',
        'title' => 'tsxc主题使用文档', /* 设置链接名 */
        'href' => 'https://docs.tsxxc.com/docs/tsxcc%E4%B8%BB%E9%A2%98/intro/', /* 设置链接地址 */
        'meta' => array(
            'target' => '_blank'
        )
    ));
}
add_action('admin_bar_menu', 'git_custom_adminbar_menu', 100);
/**
* WordPress 登录界面美化
**/

function custom_login_style() {
   $beijingurl=sc_tsxcc('ts_loginmh_img');
$logourl=sc_tsxcc('ts_loginmh_lo');
echo '<style type="text/css">
/* 以下为登录窗口美化 */
body{
font-family: "Microsoft YaHei", Helvetica, Arial, Lucida Grande, Tahoma, sans-serif;
width:100%;
height:100%;
background: url('.$beijingurl.') no-repeat;
-moz-background-size: cover; /*背景图片拉伸以铺满全屏*/
-ms-background-size: cover;
-webkit-background-size: cover;
background-size: cover;
}
/*顶部的logo*/
.login h1 a {
background-size: 220px 50px;
width: 220px;
height: 50px;
padding: 0;
margin: 0 auto 1em;
border: none;
-webkit-animation: dropIn 1s linear;
animation: dropIn 1s linear;
}
/*登录框表单*/
.login form, .login .message {
background: #fff;
background: rgba(255, 255, 255, 0.3);
border-radius: 3px;
border: 1px solid #fff;
border: 1px solid rgba(255, 255, 255, 0.4);
-webkit-animation: fadeIn 1s linear;
animation: fadeIn 1s linear;
}
/*登录框输入框*/
.login label {
color: #000;
}
.login .message {
color: #000;
}
#user_login{
font-size: 18px;
line-height: 32px;
}
/* 返回博客与忘记密码链接 */
#backtoblog a, #nav a {
color: #fff !important;
display: inline-block;
-webkit-animation: rtol 1s linear;
animation: rtol 1s linear;
}
/*掉落的动画效果*/
@-webkit-keyframes dropIn {
0% {
-webkit-transform: translate3d(0, -100px, 0)
}
100% {
-webkit-transform: translate3d(0, 0, 0)
}
}
@keyframes dropIn {
0% {
transform: translate3d(0, -100px, 0)
}
100% {
transform: translate3d(0, 0, 0)
}
}
/*逐渐出现的动画效果*/
@-webkit-keyframes fadeIn {
from {
opacity: 0;
-webkit-transform: scale(.8) translateY(20px)
}
to {
opacity: 1;
-webkit-transform: scale(1) translateY(0)
}
}
@keyframes fadeIn {
from {
opacity: 0;
transform: scale(.8) translateY(20px)
}
to {
opacity: 1;
transform: scale(1) translateY(0)
}
}
/*从右往左的动画效果*/
@-webkit-keyframes rtol {
from {
-webkit-transform: translate(80px, 0)
}
to {
-webkit-transform: translate(0, 0)
}
}
@keyframes rtol {
from {
transform: translate(80px, 0)
}
to {
transform: translate(0, 0)
}
}
.login h1 a {
            background-image:url('.$logourl.') !important;
        }
    </style>';
}

//自定义登录logo网址
function ts_logo_link( $url ) {
    $logourll=sc_tsxcc('ts_loginmh_lj');
    return ( ''.$logourll.'' );
}


 /**
 * 自定义 WordPress 后台底部的版权信息
 */
add_filter('admin_footer_text', 'left_admin_footer_text'); 
function left_admin_footer_text($text) {
    // 左边信息
    $text = '
    <span id="footer-thankyou">当前主题<a href="https://www.tsxxc.com/notes/1909.html" target="_blank">tsxc</a>，作者：ts小陈，<a href="http://wpa.qq.com/msgrd?v=3&uin=771497507&site=qq&menu=yes" target="_blank">QQ:771497507</a></p></span>
    '; 
    return $text;
}
//添加这个是点击显示选项用的
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );
//以下内容后台设置
//禁用文章修订功能

 //在编辑器上方添加的提示内容（后台集成）
   //function below_the_title() {
   //  echo ''.sc_tsxcc('ts_tishiwenzi').''; 

 //}
 //add_action( 'edit_form_after_title', 'below_the_title' );

function zww_archives_list() {
     if( !$output = get_option('zww_archives_list') ){
         $output = '<div id="archives">';
         $the_query = new WP_Query( 'posts_per_page=-1&ignore_sticky_posts=1' ); //update: 加上忽略置顶文章
         $year=0; $mon=0; $i=0; $j=0;
         while ( $the_query->have_posts() ) : $the_query->the_post();
             $year_tmp = get_the_time('Y');
             $mon_tmp = get_the_time('m');
             $y=$year; $m=$mon;
             if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
             if ($year != $year_tmp && $year > 0) $output .= '</ul>';
             if ($year != $year_tmp) {
                 $year = $year_tmp;
                 $output .= '<h3 class="al_year">'. $year .' 年</h3><ul class="al_mon_list">'; //输出年份
             }
             if ($mon != $mon_tmp) {
                 $mon = $mon_tmp;
                 $output .= '<li><span class="al_mon">'. $mon .' 月</span><ul class="al_post_list">'; //输出月份
             }
             $output .= '<li>'. get_the_time('d日: ') .'<a href="'. get_permalink() .'">'. get_the_title() .'</a> <em>('. get_comments_number('0', '1', '%') .')</em></li>'; //输出文章日期和标题
         endwhile;
         wp_reset_postdata();
         $output .= '</ul></li></ul></div>';
         update_option('zww_archives_list', $output);
     }
     echo $output;
 }
 function clear_zal_cache() {
     update_option('zww_archives_list', ''); // 清空 zww_archives_list
 }
 add_action('save_post', 'clear_zal_cache'); // 新发表文章/修改文章时















