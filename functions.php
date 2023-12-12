<?php
if (phpversion() < 5.5) {
    wp_die('本主题不支持在PHP5.5以下版本运行，请升级PHP版本 ^_^');
}
define( 'version', 'V1.0' );
require_once get_template_directory() . '/ini/function.php';
//引入点击显示选项文件
require_once( TEMPLATEPATH . '/inc/xianshi-tsxcc.php');
//添加这个是点击显示选项用的
//增加主题设置选项
//自定义二级菜单导航
require_once( TEMPLATEPATH . '/ini/function-nav.php');
require_once (TEMPLATEPATH . '/ini/post-meta.php');
require_once (TEMPLATEPATH . '/ini/category-seo.php');
include("ip/ip2c.php");
include("ip/show-useragent.php"); 
//增加主题设置选项
if (!function_exists('optionsframework_init')){
    define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri().'/inc/');
    require_once dirname(__FILE__).'/inc/options-tsxcc.php';
}

add_filter('wp_lazy_loading_enabled', '__return_false');
// 禁用自动生成缩略图
function shapeSpace_disable_image_sizes($sizes) {
    unset($sizes['thumbnail']);    // disable thumbnail size
    unset($sizes['medium']);       // disable medium size
    unset($sizes['large']);        // disable large size
    unset($sizes['medium_large']); // disable medium-large size
    unset($sizes['1536x1536']);    // disable 2x medium-large size
    unset($sizes['2048x2048']);    // 删除指定尺寸图
    return $sizes;
}
add_action('intermediate_image_sizes_advanced', 'shapeSpace_disable_image_sizes');
// 禁用缩放尺寸
add_filter('big_image_size_threshold', '__return_false');
// 禁用其他图片尺寸
function shapeSpace_disable_other_image_sizes() {
    remove_image_size('post-thumbnail'); // disable images added via set_post_thumbnail_size() 
    remove_image_size('another-size');   // disable any other added image sizes
}
add_action('init', 'shapeSpace_disable_other_image_sizes');
// 禁用自动生成缩略图


//后台添加多个菜单功能
if ( function_exists('register_nav_menus')) {
    register_nav_menus(array('topmenu' => '主菜单'));
    //register_nav_menus(array('dingbucaidan' => '顶部菜单'));
    register_nav_menus(array('dibucaidan' => '底部菜单'));
}
//去除调取的p标签
  // remove_filter (  'the_excerpt' ,  'wpautop'  );
  // remove_filter (  'the_content' ,  'wpautop'  );

  /*
 *增加特色图像 调取 <?php the_post_thumbnail();?>
 */   
if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
add_theme_support( 'post-thumbnails' );
//add_image_size('pop-thumb',542, 340, true );
 // Permalink thumbnail size
}

//single.php定义分类文章模板
function get_current_category_id() {
$current_category = single_cat_title('', false);//获得当前分类目录名称
return get_cat_ID($current_category);//获得当前分类目录 ID
}

/**
* 禁用wordpress默认的favicon.ico图标
*/
add_action( 'do_faviconico', function() {
//Check for icon with no default value
if ( $icon = get_site_icon_url( 32 ) ) {
//Show the icon
wp_redirect( $icon );
} else {
//Show nothing
header( 'Content-Type: image/vnd.microsoft.icon' );
}
exit;
} );
// 禁止后台加载谷歌字体
function wp_remove_open_sans_from_wp_core() {
    wp_deregister_style( 'open-sans' );
    wp_register_style( 'open-sans', false );
    wp_enqueue_style('open-sans','');
}
add_action( 'init', 'wp_remove_open_sans_from_wp_core' );
 /* 禁用 Emoji 功能 */
remove_action('admin_print_scripts',    'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
#remove_action('wp_head',       'print_emoji_detection_script', 7);
remove_action('wp_print_styles',    'print_emoji_styles');
remove_action('embed_head',     'print_emoji_detection_script');
remove_filter('the_content_feed',   'wp_staticize_emoji');
remove_filter('comment_text_rss',   'wp_staticize_emoji');
remove_filter('wp_mail',        'wp_staticize_emoji_for_email');
//屏蔽文章 Embed 功能
remove_action('rest_api_init', 'wp_oembed_register_route');
remove_filter('rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4);
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10 );
remove_filter('oembed_response_data',   'get_oembed_response_data_rich',  10, 4);
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
//移除后台隐私相关的页面
add_action('admin_menu', function(){
    remove_submenu_page('options-general.php', 'options-privacy.php');
    remove_submenu_page('tools.php', 'export-personal-data.php');
    remove_submenu_page('tools.php', 'erase-personal-data.php');
}, 11);
add_action('admin_init', function(){
    remove_action('admin_init', ['WP_Privacy_Policy_Content', 'text_change_check'], 100);
    remove_action('edit_form_after_title', ['WP_Privacy_Policy_Content', 'notice']);
    remove_action('admin_init', ['WP_Privacy_Policy_Content', 'add_suggested_content'], 1);
    remove_action('post_updated', ['WP_Privacy_Policy_Content', '_policy_page_updated']);
    remove_filter('list_pages', '_wp_privacy_settings_filter_draft_page_titles', 10, 2);
}, 1);
//彻底关闭 pingback
add_filter('xmlrpc_methods',function($methods){
    $methods['pingback.ping'] = '__return_false';
    $methods['pingback.extensions.getPingbacks'] = '__return_false';
    return $methods;
});
//禁用 pingbacks, enclosures, trackbacks
remove_action( 'do_pings', 'do_all_pings', 10 );
//去掉 _encloseme 和 do_ping 操作。
remove_action( 'publish_post','_publish_post_hook',5 );


//统计文章的浏览次数
function get_post_views ($post_id) {
    $count_key = 'views';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
        $count = '0';
    }
    echo number_format_i18n($count);
}
function set_post_views () {
    global $post;
    $post_id = $post -> ID;
    $count_key = 'views';
    $count = get_post_meta($post_id, $count_key, true);
    if (is_single() || is_page()) {
        if ($count == '') {
            delete_post_meta($post_id, $count_key);
            add_post_meta($post_id, $count_key, '0');
        } else {
            update_post_meta($post_id, $count_key, $count + 1);
        }
    }
}
add_action('get_header', 'set_post_views');
//统计文章的浏览次数  前台<?php get_post_views($post -> ID); 

//WordPress全部文章总浏览数， 前台<?php echo okmg_all_view();
function tsxcc_all_view(){
global $wpdb;
$count=0;
$views= $wpdb->get_results("SELECT * FROM $wpdb->postmeta WHERE meta_key='views'");
foreach($views as $key=>$value){
$meta_value=$value->meta_value;
if($meta_value!=' '){
$count+=(int)$meta_value;
}
}return $count;
}

//获取随机的bootstrap的颜色表示
function pk_get_color_tag($ex = array())
{
    global $puock_colors_name;
    while (true) {
        $c = $puock_colors_name[mt_rand(0, count($puock_colors_name) - 1)];
        if (!in_array($c, $ex)) {
            return $c;
        }
    };
}

//获取文章的所有评论
//需要的地方添加调用代码
//<?php echo comments_users($post->ID); 
//当然也可以用来调用全站的总评论数：
//<?php echo comments_users($postid, 1); 

function comments_users($postid=0,$which=0) {
    $comments = get_comments('status=approve&type=comment&post_id='.$postid); //获取文章的所有评论
    if ($comments) {
        $i=0; $j=0; $commentusers=array();
        foreach ($comments as $comment) {
            ++$i;
            if ($i==1) { $commentusers[] = $comment->comment_author_email; ++$j; }
            if ( !in_array($comment->comment_author_email, $commentusers) ) {
                $commentusers[] = $comment->comment_author_email;
                ++$j;
            }
        }
        $output = array($j,$i);
        $which = ($which == 0) ? 0 : 1;
        return $output[$which]; //返回评论人数
    }
    return 0; //没有评论返回 0
}

//字数统计 输出<?php echo count_words ($text); 
function count_words($text = null)
{
    global $post;
    if (empty($text)) {
        $text = $post->post_content;
    }
    return mb_strlen(preg_replace('/\s/', '', html_entity_decode(strip_tags($text))), 'UTF-8');
}

//自定义评论列表模板
function simple_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li class="comment" id="li-comment-<?php comment_ID(); ?>">
   		<div class="media">
   			<div class="media-left">
        		<?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 48); } ?>
   			</div>
   			<div class="media-body">
   				<?php printf(__('<p class="author_name">%s</p>'), get_comment_author_link()); ?>
   	 <?php if (sc_tsxcc('ts_pinglun_gsd') == '1'){ echo "<i class='fa fa-map-marker' ></i><span style='font-size:14px;font-weight:normal;color:#aaa;'>"; echo convertip(get_comment_author_ip()); echo "</span>"; } ?>
   	  <?php if (sc_tsxcc('ts_pinglun_ua') == '1'){ CID_print_comment_flag(); echo ' ';CID_print_comment_browser(); } ?>
		        <?php if ($comment->comment_approved == '0') : ?>
		            <em>评论等待审核...</em><br />
				<?php endif; ?>
				<?php comment_text(); ?>
   			</div>
   		</div>
   		<div class="comment-metadata">
   			<span class="comment-pub-time">
   				<?php echo get_comment_time('Y-m-d H:i'); ?>
   			</span>
   			<span class="comment-btn-reply">
 				<i class="fa fa-reply"></i> <?php comment_reply_link(array_merge( $args, array('reply_text' => '回复','depth' => $depth, 'max_depth' => $args['max_depth']))) ?> 
   			</span>
   		</div>
 
<?php } ?>

<?php
//分页功能
function ts_paging() {
$p = 3;
if ( is_singular() ) return;
global $wp_query, $paged;
$max_page = $wp_query->max_num_pages;
if ( $max_page == 1 ) return; 
echo '<div class="pagination"><ul>';
if ( empty( $paged ) ) $paged = 1;
//if ( $paged > 1 ) p_link( 1, '首页' );
echo '<li class="prev-page">'; previous_posts_link('<'); echo '</li>';
for( $i = $paged - $p; $i <= $paged + $p; $i++ ) { 
if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<li class=\"active\"><span>{$i}</span></li>" : p_link( $i );
}
echo '<li class="next-page">'; next_posts_link('>'); echo '</li>';
//p_link( $max_page, '尾页' );
//echo '<li><span>共 '.$max_page.' 页</span></li>';
echo '</ul></div>';
}
function p_link( $i, $title = '' ) {
if ( $title == '' ) $title = "{$i}";
echo "<li><a href='", esc_html( get_pagenum_link( $i ) ), "'>{$title}</a></li>";
}
function p_curr_link( $i) {
echo '<li><span class="page-numbers current">'.$i.'</span></li>';
}
//分页功能

//api
   if(isset($_GET['json'])){
     add_filter('template_include','wp_my_api');
   }
   function wp_my_api($template){
      return preg_replace('#([^/]+\.php)#','api/$1',$template);
   }
// 修改登录链接
function login_tsxcc(){
	if($_GET[''.sc_tsxcc('pass_h').''] != ''.sc_tsxcc('word_q').'')header('Location: '.sc_tsxcc('go_link').'');}
require get_template_directory() . '/ini/config.php';

function ts_suijiyanse() {
$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
$color ='#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
echo $color;
}


 //文章内容回复可见
function auto_reply($comment_id, $comment_object) {setcookie("fbreply","1");}
function reply_to_read($atts, $content=null) {
extract(shortcode_atts(array("notice" => '<div class="reply-to-read"><p style="margin: 0 0 0px;">温馨提示：此处内容需要<a href="#respond" title="评论本文">评论</a>后才能查看。</p></div>'), $atts));
if($name = $_COOKIE['fbreply']=="1"){	return do_shortcode($content);}else{	return $notice;}
}
//引用文件的钩子
// 添加按钮
function ts_select(){
echo '
<select id="sc_select">
    <option value="您需要选择一个短代码">插入短代码</option>
    <option value="[reply]隐藏的内容[/reply]">回复可见</option>
    <option value="[password key=密码]加密的内容[/password]">密码保护</option>
</select>';
}
if ((current_user_can('edit_posts') && current_user_can('edit_pages'))) {add_action('media_buttons','ts_select',11);}
add_action('admin_head','ts_button');
function ts_button() {
echo '<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery("#sc_select").change(function() {
    send_to_editor(jQuery("#sc_select :selected").val());
    return false;
    });
});
</script>';
}
//密码可见
function ts_secret($atts, $content=null){  
    extract(shortcode_atts(array('key'=>null), $atts));  
    if(isset($_POST['e_password_key']) && $_POST['e_password_key']==$key){  
        return '<div class="e-secret">'.$content.'</div>';  
    }  
    else{  
        return '<form class="reply-to-read" action="'.get_permalink().'" method="post" name="e-password"><p style="margin: 0 0 0px;"><label for="pwbox-142">输入密码查看加密内容： <input type="password" name="e_password_key" size="20" /></label> <input type="submit" class="euc-y-s" value="确定" /></p></form>';  
    }  
}  
add_shortcode('password','ts_secret'); 

//统计登录提醒
add_filter('wp_login_errors', function($errors){
	$error_code	= $errors->get_error_code();

	if(in_array($error_code, ['invalid_username', 'invalid_email', 'incorrect_password'])){
		$errors->remove($error_code);
		$errors->add($error_code, '用户名或密码错误。');
	}

	return $errors;
});








  



?>