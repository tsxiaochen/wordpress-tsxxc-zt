<?php 
if(sc_tsxcc('ts_login')){
   add_action('login_enqueue_scripts','login_tsxcc');
}
if(sc_tsxcc('ts_loginmh')== '1'){
   add_filter( 'login_headerurl', 'ts_logo_link' );
   add_action('login_head', 'custom_login_style');
}
//标签文字彩色
if(sc_tsxcc('ts_tag_caise')){
function colorCloud($text) {
$text = preg_replace_callback('|<a (.+?)>|i', 'colorCloudCallback', $text);
return $text;
}
function colorCloudCallback($matches) {
$text = $matches[1];
$color = dechex(rand(0,16777215));//修改此处可以控制随机色彩值的范围
$pattern = '/style=(\'|\")(.*)(\'|\")/i';
$text = preg_replace($pattern, "style=\"width: 32.39%;color:#{$color};$2;\"", $text);
return "<a $text>";
}
add_filter('wp_tag_cloud', 'colorCloud', 1);
}
//标签彩色
elseif(sc_tsxcc('ts_tag_caisec')){
function colorCloud($text) {  
$text = preg_replace_callback('|<a (.+?)>|i', 'colorCloudCallback', $text);  
return $text;  
}  
function colorCloudCallback($matches) {  
$text = $matches[1];  
$colors = array('F99','C9C','F96','6CC','6C9','37A7FF','B0D686','E6CC6E');  
$color=$colors[dechex(rand(0,7))]; 
$pattern = '/style=(\'|\")(.*)(\'|\")/i';  
$text = preg_replace($pattern, "style=\"display: inline-block; width:31.39%;color: #fff; padding: 1px 5px; margin: 0 5px 5px 0; background-color: #{$color}; border-radius: 3px; -webkit-transition: background-color .4s linear; -moz-transition: background-color .4s linear; transition: background-color .4s linear;\"", $text);  
$pattern = '/style=(\'|\")(.*)(\'|\")/i';  
return "<a $text>";
}
add_filter('wp_tag_cloud', 'colorCloud', 1);
}
else{}

if (sc_tsxcc('ts_jinyong_wzxd')) {
    add_filter( 'wp_revisions_to_keep', 'disable_wp_revisions_to_keep', 10, 2 );
}
function disable_wp_revisions_to_keep( $num, $post ) {
    return 0;
}

// 屏蔽古腾堡编辑器
if(sc_tsxcc('ts_jinyong_gtb')){
    add_filter('use_block_editor_for_post', '__return_false');
    remove_action( 'wp_enqueue_scripts', 'wp_common_block_scripts_and_styles' );
}


if (sc_tsxcc('ts_jinyong_xmlrpc')) {
// 禁用xmlrpc
add_filter('xmlrpc_enabled', '__return_false');
}

// 禁止评论HTML
if (sc_tsxcc('ts_jinyong_pinglunhtml')) {
add_filter('comment_text', 'wp_filter_nohtml_kses');
add_filter('comment_text_rss', 'wp_filter_nohtml_kses');
add_filter('comment_excerpt', 'wp_filter_nohtml_kses');
}

// 禁用REST API
if (sc_tsxcc('ts_jinyong_api')) {
add_filter( 'rest_authentication_errors', function( $result ) {
if ( ! empty( $result ) ) {
return $result;
}
if ( ! is_user_logged_in() ) {
return new WP_Error( 'Access denied', 'no permission.', array( 'status' => 401 ) );
}
return $result;
});
}

//移除 WP_Head 无关紧要的代码
if(sc_tsxcc('ts_jinyong_feed', 1)){
    remove_action( 'wp_head', 'wp_generator');                  //删除 head 中的 WP 版本号
    foreach (['rss2_head', 'commentsrss2_head', 'rss_head', 'rdf_header', 'atom_head', 'comments_atom_head', 'opml_head', 'app_head'] as $action) {
        remove_action( $action, 'the_generator' );
    }
    remove_action( 'wp_head', 'rsd_link' );                     //删除 head 中的 RSD LINK
    remove_action( 'wp_head', 'wlwmanifest_link' );             //删除 head 中的 Windows Live Writer 的适配器？ 
    remove_action( 'wp_head', 'feed_links_extra', 3 );          //删除 head 中的 Feed 相关的link
    remove_action( 'wp_head', 'feed_links', 2 );  
    remove_action( 'wp_head', 'index_rel_link' );               //删除 head 中首页，上级，开始，相连的日志链接
    remove_action( 'wp_head', 'parent_post_rel_link', 10); 
    remove_action( 'wp_head', 'start_post_rel_link', 10); 
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10);
    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );  //删除 head 中的 shortlink
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10);  //删除头部输出 WP RSET API 地址
    remove_action( 'template_redirect', 'wp_shortlink_header', 11);     //禁止短链接 Header 标签。  
    remove_action( 'template_redirect', 'rest_output_link_header', 11); //禁止输出 Header Link 标签。
    remove_action('wp_head', 'print_emoji_detection_script', 7, 1);
    remove_action('wp_print_styles', 'print_emoji_styles', 10, 1);
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10, 1);
    remove_action('wp_head', 'rel_canonical', 10, 0);
    
}
// 屏蔽字符转码
if(sc_tsxcc('ts_jinyong_zifuzhuanma', 1)){
    add_filter('run_wptexturize', '__return_false');
}
//删除最顶部的管理横条
if(sc_tsxcc('ts_jinyong_hengtiao')){
    add_filter('show_admin_bar', '__return_false');
}

// 屏蔽站点管理员邮箱验证功能
if(sc_tsxcc('ts_jinyong_mailyanzheng')){
    add_filter('admin_email_check_interval', '__return_false');
}
// 屏蔽自动更新和更新检查作业
if(sc_tsxcc('ts_jinyong_gengxin')){  
    add_filter('automatic_updater_disabled', '__return_true');
    remove_action('init', 'wp_schedule_update_checks');
    remove_action('wp_version_check', 'wp_version_check');
    remove_action('wp_update_plugins', 'wp_update_plugins');
    remove_action('wp_update_themes', 'wp_update_themes');
    remove_action('admin_init', '_maybe_update_core');
        remove_action('admin_init', '_maybe_update_plugins');
        remove_action('admin_init', '_maybe_update_themes');
}
//移除右上角帮助
if(sc_tsxcc('ts_youhua_houtaibangzhu')){  
        add_action('in_admin_header', function(){
            $GLOBALS['current_screen']->remove_help_tabs();
        });
    }
//切换经典小工具
if(sc_tsxcc('ts_sidsgj')){  
    add_filter('gutenberg_use_widgets_block_editor', '__return_false');
    add_filter('use_widgets_block_editor', '__return_false');
    }
//以下是增强优化
//去除css和js版本号
if(sc_tsxcc('ts_youhua_banbenhao', 1)){
function _remove_script_version( $src ){
    $parts = explode( '?', $src );
    return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'pre_option_link_manager_enabled', '__return_true' );
}

//替换 Gravatar
if(sc_tsxcc('ts_youhua_tx')){

function get_ssl_avatar($avatar) {
   $avatar = preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/','<img src="https://cdn.v2ex.co/gravatar/$1?s=$2" class="avatar avatar-$2" height="48" width="48">',$avatar);
   return $avatar;
}
add_filter('get_avatar', 'get_ssl_avatar');
}

//让用户自己决定是否书写正确的 WordPress
if(sc_tsxcc('ts_youhua_daxiaoxie', 1)){
    remove_filter( 'the_content', 'capital_P_dangit', 11 );
    remove_filter( 'the_title', 'capital_P_dangit', 11 );
    remove_filter( 'wp_title', 'capital_P_dangit', 11 );
    remove_filter( 'comment_text', 'capital_P_dangit', 31 );
}
//是否隐藏侧边栏
function pk_hide_sidebar($post_id = null)
{
    global $post;
    if (pk_is_checked("hide_global_sidebar")) {
        return true;
    }
    if (is_single() || is_page()) {
        if ($post_id == null) {
            $post_id = $post->ID;
        }
        return get_post_meta($post_id, 'hide_side', true) == "true";
    }
    return false;
}

// 数据库插入评论表单的qq字段 
function inlojv_sql_insert_qq_field($comment_ID,$commmentdata) {
	$qq = isset($_POST['new_field_qq']) ? $_POST['new_field_qq'] : false;  
	update_comment_meta($comment_ID,'new_field_qq',$qq); // new_field_qq 是表单name值，也是存储在数据库里的字段名字
}
// 后台评论中显示qq字段
function add_comments_columns( $columns ){
    $columns[ 'new_field_qq' ] = __( 'QQ号' );        // 新增列名称
    return $columns;
}
function output_comments_qq_columns( $column_name, $comment_id ){
    switch( $column_name ) {
		case "new_field_qq" :
		 // 这是输出值，可以拿来在前端输出，这里已经在钩子manage_comments_custom_column上输出了
		echo get_comment_meta( $comment_id, 'new_field_qq', true );
		break;
	}
}
// 替换评论头像
function inlojv_change_avatar($avatar){
	global $comment;
	if( get_comment_meta( @$comment->comment_ID, 'new_field_qq', true ) ){
		$qq_number =  get_comment_meta( $comment->comment_ID, 'new_field_qq', true );
		$qqavatar = file_get_contents('http://ptlogin2.qq.com/getface?appid=1006102&imgtype=3&uin='.$qq_number);
		preg_match('/https:(.*?)&t/',$qqavatar,$m); // 匹配 http: 和 &t 之间的字符串
		return '<img src="'.stripslashes($m[1]).'" class="avatar avatar-40 photo" width="40" height="40"  alt="qq_avatar" />';
	}else{
		return $avatar ;
	}	
}
if(sc_tsxcc('ts_qqpingln', 1)){
// 数据库插入评论表单的qq字段 
add_action('wp_insert_comment','inlojv_sql_insert_qq_field',10,2);
// 后台评论中显示qq字段
add_filter( 'manage_edit-comments_columns', 'add_comments_columns' );
add_action( 'manage_comments_custom_column', 'output_comments_qq_columns', 10, 2 );
// 替换评论头像
add_filter( 'get_avatar', 'inlojv_change_avatar', 10, 3 );
}

//随机显示本地头像
function local_random_avatar( $avatar, $id_or_email, $size, $default, $alt) {
        if ( ! empty( $id_or_email->user_id ) ) {
                $avatar = ''.get_template_directory_uri().'/avatar/admin.jpg';
        }else{
                $random = mt_rand(1, 23);
                $avatar = ''.get_template_directory_uri().'/avatars/'. $random .'.jpg';
        }
        $avatar = "<img alt='{$alt}' src='{$avatar}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}'/>";
        return $avatar;
}
//随机显示本地头像
if(sc_tsxcc('ts_qtouxaingsuj', 1)){
add_filter( 'get_avatar' , 'local_random_avatar' , 1 , 5 );
}

//最新评论
function bg_recent_comments($no_comments = 6, $comment_len = 80, $avatar_size = 40) {
  $comments_query = new WP_Comment_Query();
    $comments = $comments_query->query( array( 'number' => $no_comments ) );
    $comm = '';
    if ( $comments ) : foreach ( $comments as $comment ) :
        $comm .= '<li>' . get_avatar( $comment->comment_author_email, $avatar_size );
        $comm .= '<a class="author" href="' . get_permalink( $comment->post_ID ) . '#comment-' . $comment->comment_ID . '">';
        $comm .= get_comment_author( $comment->comment_ID ) . ':</a> ';
        $comm .= '<p>' . strip_tags( substr( apply_filters( 'get_comment_text', $comment->comment_content ), 0, $comment_len ) ) . '</p></li>';
    endforeach; else :
        $comm .= 'No comments.';
    endif;
    echo $comm;
}
//赞赏
function bigfa_like(){
    $id = $_POST["um_id"];
    $action = $_POST["um_action"];
    if ( $action == 'ding'){
    $bigfa_raters = get_post_meta($id,'bigfa_ding',true);
    $expire = time() + 99999;
    $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
    setcookie('bigfa_ding_'.$id,$id,$expire,'/',$domain,false);
    if (!$bigfa_raters || !is_numeric($bigfa_raters)) {
        update_post_meta($id, 'bigfa_ding', 1);
    }
    else {
            update_post_meta($id, 'bigfa_ding', ($bigfa_raters + 1));
        }
    echo get_post_meta($id,'bigfa_ding',true);
    }
    die;
}
if(sc_tsxcc('ts_dianzanss')){
add_action('wp_ajax_nopriv_bigfa_like', 'bigfa_like');
add_action('wp_ajax_bigfa_like', 'bigfa_like');
}
add_filter( 'pre_option_link_manager_enabled', '__return_true' );
if (sc_tsxcc('no_category')) {
    include (TEMPLATEPATH . '/ini/no-category.php');
}

//评论被添加的时候触发
add_action( 'wp_insert_comment', 'auto_reply', 10, 2 );
add_shortcode('reply', 'reply_to_read');
//文章内容回复可见



