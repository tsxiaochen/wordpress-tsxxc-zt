<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	    $option_name = get_option( 'stylesheet' );
    $option_name = preg_replace( "/\W/", "_", strtolower( $option_name ) );
    return $option_name;

}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {
$xiaochenpath =  get_template_directory_uri() . '/images';

	// Test data
	$test_array = array(
		'one' => __( 'One', 'theme-textdomain' ),
		'two' => __( 'Two', 'theme-textdomain' ),
		'three' => __( 'Three', 'theme-textdomain' ),
		'four' => __( 'Four', 'theme-textdomain' ),
		'five' => __( 'Five', 'theme-textdomain' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'theme-textdomain' ),
		'two' => __( 'Pancake', 'theme-textdomain' ),
		'three' => __( 'Omelette', 'theme-textdomain' ),
		'four' => __( 'Crepe', 'theme-textdomain' ),
		'five' => __( 'Waffle', 'theme-textdomain' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// 将所有分类（categories）加入数组
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
    
    // 所有分类ID
	$categories = get_categories(); 
	foreach ($categories as $cat) {
	$cats_id .= '<li>'.$cat->cat_name.' [ '.$cat->cat_ID.' ]</li>';
	} 

	// 将所有标签（tags）加入数组
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// 将所有页面（pages）加入数组
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	
    //初始化存储选项的$options数组
 	$options = array();
    //定义一个选项卡，标题是Basic Settings，注意type是heading，std设置默认值
    
    //首页设置
	$options[] = array(
		'name' => __( '首页设置', 'theme-textdomain' ),
		'type' => 'heading'
	);
	 	 $options[] = array(
		'name' => __( '轮播图', 'theme-textdomain' ),
		'desc' => __( '启用', 'theme-textdomain' ),
		'id' => 'ts_lunbo',
		'std' => '1',
		'type' => 'checkbox'
	);
 	  $options[] = array(
		'desc' => __( '轮播图数量(显示置顶文章)', 'theme-textdomain' ),
		'id' => 'ts_lunbo_sl',
		'std' => '3',
		'class' => 'mini hidden',
		'type' => 'text'
	);
	 $options[] = array(
		'desc' => __( '轮播图右侧文章id（最多3篇）不设置则为最新文章', 'theme-textdomain' ),
		'id' => 'ts_lunbo_yc',
		'class' => 'mini hidden',
		'type' => 'text'
	);
	

			//分隔符
	$options[] = array(
		'id' => 'clear'
	);
	 $options[] = array(
		'name' => __( '文章阅读数', 'theme-textdomain' ),
		'desc' => __( '启用', 'theme-textdomain' ),
		'id' => 'ts_weznhangtjy',
		'std' => '1',
		'type' => 'checkbox'
	);
	 $options[] = array(
	   'name' => __( '文章评论数', 'theme-textdomain' ),
		'desc' => __( '启用', 'theme-textdomain' ),
		'id' => 'ts_weznhangtjp',
		'std' => '1',
		'type' => 'checkbox'
	);
	
		//分隔符
	$options[] = array(
		'id' => 'clear'
	);
	
	
	 $options[] = array(
		'name' => __( '推荐阅读', 'theme-textdomain' ),
		'desc' => __( '显示', 'theme-textdomain' ),
		'id' => 'ts_jiaodianxx',
		'std' => '1',
		'type' => 'checkbox'
	);
 $options[] = array(
		//'name' => __( '今日焦点文章', 'theme-textdomain' ),
		'desc' => __( '输入推荐文章ID（最多4篇）不设置则为最新文章', 'theme-textdomain' ),
		'id' => 'ts_jiaodian',
		'class' => 'mini hidden',
		'type' => 'text'
	);
 

 $options[] = array(
		'name' => __( '最新文章排除分类', 'theme-textdomain' ),
		'desc' => __( '如排除分类id为 -5 的文章（id前边添加减号)', 'theme-textdomain' ),
		'id' => 'ts_paichu',
		'class' => 'mini',
		'type' => 'text'
	);
$options[] = array(
		'desc' => __( '分类ID对照', 'theme-textdomain' ),
		'type' => 'info'
	);
$options[] = array(
		//'name' => __( '分类ID对照', 'theme-textdomain' ),
		'desc' => __( '<ul>'.$cats_id.'</ul>' ),
		'id' => 'catid',
		'type' => 'info'
	);

 $options[] = array(
		'name' => __( '最新文章显示数量', 'theme-textdomain' ),
		'id' => 'ts_shulaing',
		'class' => 'mini',
		'std' => '15',
		'type' => 'text'
	);
		$options[] = array(
		'id' => 'clear'
	);
		 $options[] = array(
		'name' => __( '文章栏目名称彩色', 'theme-textdomain' ),
		'desc' => __( '启用', 'theme-textdomain' ),
		'id' => 'ts_index_lmcs',
		'std' => '1',
		'type' => 'checkbox'
	);
			//分隔符
	$options[] = array(
		'id' => 'clear'
	);
	 $options[] = array(
		'name' => __( '分类图片（纯图片）', 'theme-textdomain' ),
		'desc' => __( '显示', 'theme-textdomain' ),
		'id' => 'ts_index_dbtu',
		'std' => '0',
		'type' => 'checkbox'
	);

  $options[] = array(
		//'name' => __( '今日焦点文章', 'theme-textdomain' ),
		'desc' => __( '输入分类ID，多个分类用英文半角逗号","隔开', 'theme-textdomain' ),
		'id' => 'ts_index_dbtu_id',
		'class' => 'mini hidden',
		'type' => 'text'
	);
	  $options[] = array(
		//'name' => __( '设置显示篇数', 'theme-textdomain' ),
		'desc' => __( '显示篇数', 'theme-textdomain' ),
		'id' => 'ts_index_dbtu_sl',
		'class' => 'mini hidden',
		'type' => 'text'
	);
	$options[] = array(
		'desc' => __( '分类ID对照', 'theme-textdomain' ),
		'type' => 'info'
	);$options[] = array(
		//'name' => __( '分类ID对照', 'theme-textdomain' ),
		'desc' => __( '<ul>'.$cats_id.'</ul>' ),
		'id' => 'catid',
		'type' => 'info'
	);
	
		//分隔符
	$options[] = array(
		'id' => 'clear'
	);
	
	 $options[] = array(
		'name' => __( '底部两栏有缩略图分类列表', 'theme-textdomain' ),
		'desc' => __( '显示', 'theme-textdomain' ),
		'id' => 'ts_index_l',
		'std' => '0',
		'type' => 'checkbox'
	);
 $options[] = array(
		//'name' => __( '选择主体两栏分类列表分类', 'theme-textdomain' ),
		'desc' => __( '输入分类ID，多个分类用英文半角逗号","隔开', 'theme-textdomain' ),
		'id' => 'ts_index_lz',
		'class' => 'mini hidden',
		'type' => 'text'
	);

	  $options[] = array(
		//'name' => __( '设置显示篇数', 'theme-textdomain' ),
		'desc' => __( '两栏分类列表显示篇数', 'theme-textdomain' ),
		'id' => 'ts_index_ls',
		'class' => 'mini hidden',
		'type' => 'text'
	);
	$options[] = array(
		'desc' => __( '分类ID对照', 'theme-textdomain' ),
		'type' => 'info'
	);$options[] = array(
		//'name' => __( '分类ID对照', 'theme-textdomain' ),
		'desc' => __( '<ul>'.$cats_id.'</ul>' ),
		'id' => 'catid',
		'type' => 'info'
	);
			//分隔符
	$options[] = array(
		'id' => 'clear'
	);
	$options[] = array(
		'name' => __( '底部两栏无缩略图分类列表', 'theme-textdomain' ),
		'desc' => __( '显示', 'theme-textdomain' ),
		'id' => 'ts_index_lb',
		'std' => '0',
		'type' => 'checkbox'
	);
 $options[] = array(
		//'name' => __( '今日焦点文章', 'theme-textdomain' ),
		'desc' => __( '输入分类ID，多个分类用英文半角逗号', 'theme-textdomain' ),
		'id' => 'ts_index_lzb',
		'class' => 'mini hidden',
		'type' => 'text'
	);
 
	  $options[] = array(
		//'name' => __( '设置显示篇数', 'theme-textdomain' ),
		'desc' => __( '两栏分类列表显示篇数', 'theme-textdomain' ),
		'id' => 'ts_index_lsb',
		'class' => 'mini hidden',
		'type' => 'text'
	);
	$options[] = array(
		'desc' => __( '分类ID对照', 'theme-textdomain' ),
		'type' => 'info'
	);$options[] = array(
		//'name' => __( '分类ID对照', 'theme-textdomain' ),
		'desc' => __( '<ul>'.$cats_id.'</ul>' ),
		'id' => 'catid',
		'type' => 'info'
	);
			//分隔符
	$options[] = array(
		'id' => 'clear'
	);
	$options[] = array(
		'name' => __( '底部友情链接', 'theme-textdomain' ),
		'desc' => __( '显示', 'theme-textdomain' ),
		'id' => 'ts_index_yq',
		'std' => '0',
		'type' => 'checkbox'
	);
	
	$options[] = array(
		'name' => __( '基本设置', 'theme-textdomain' ),
		'type' => 'heading'
	);
     $options[] = array(
        'name' => '首页布局',
        'id' => 'index_mode',
        'std' => 'blog',
        'type' => 'radio',
        'options' => [
            'blog' => '博客风格',
            'cms' => 'CMS风格',
        ]
    );
			//分隔符
	$options[] = array(
		'id' => 'clear'
	);
	    $options[] = array(
        'name' => '文章样式',
        'id' => 'post_style',
        'std' => 'list',
        'type' => 'radio',
        'options' => [
            'list' => '列表式',
            'card' => '卡片式'
        ]
    );
    	$options[] = array(
		'id' => 'clear'
	);
    $options[] = array(
		'name' => __( 'QQ号', 'theme-textdomain' ),
		//'desc' => __( '勾选并填写', 'theme-textdomain' ),
		'id' => 'qq_showhidden',
		'std' => '1',
		'type' => 'checkbox'
	);
    //定义一个text类型的input box，type要设置为text，class为mini会让input长度比较短
	$options[] = array(
		//'name' => __( 'QQ号', 'theme-textdomain' ),
		'desc' => __( '你的qq号', 'theme-textdomain' ),
		'id' => 'ts_qq',
		'std' => '771497507',
		'class' => 'hidden',
		'type' => 'text'
	);

      $options[] = array(
		'name' => __( '微信号', 'theme-textdomain' ),
		//'desc' => __( '勾选并填写', 'theme-textdomain' ),
		'id' => 'weixin_showhidden',
		'std' => '1',
		'type' => 'checkbox'
	);
	$options[] = array(
		//'name' => __( '微信号', 'theme-textdomain' ),
		'desc' => __( '你的微信号', 'theme-textdomain' ),
		'id' => 'ts_weixin',
		'std' => 'tsxcca',
		'class' => 'hidden',
		'type' => 'text'
	);
    //同上，但没有设置class mini，input长度较长
	$options[] = array(
		'name' => __( '电话', 'theme-textdomain' ),
		'desc' => __( '填写后在右侧联系我中展示', 'theme-textdomain' ),
		'id' => 'ts_dianhua',
		'class' => 'mini',
		'type' => 'text'
	);
       
      // 	$options[] = array(
	//	'name' => __( '地址', 'theme-textdomain' ),
		//'desc' => __( 'A text input field.', 'theme-textdomain' ),
	//	'id' => 'ts_dizhi',
		//'std' => 'Default Value',
	//	'type' => 'text'
	//);

     //  	$options[] = array(
	//	'name' => __( '邮箱', 'theme-textdomain' ),
		//'desc' => __( 'A text input field.', 'theme-textdomain' ),
	//	'id' => 'ts_youxiang',
		//'std' => 'Default Value',
	//	'type' => 'text'
	//);
			$options[] = array(
		'id' => 'clear'
	);

	
      $options[] = array(
		'name' => __( '微信二维码', 'theme-textdomain' ),
		//'desc' => __( 'This creates a full size uploader that previews the image.', 'theme-textdomain' ),
		'id' => 'ts_erweima',
		'std' => "$xiaochenpath/weixinma.jpg",
		'type' => 'upload'
	);
		$options[] = array(
		'id' => 'clear'
	);
	
	   $options[] = array(
		'name' => __( '文章默认缩略图', 'theme-textdomain' ),
		//'desc' => __( 'This creates a full size uploader that previews the image.', 'theme-textdomain' ),
		'id' => 'ts_morentu',
		'std' => "$xiaochenpath/ad.png",
		'type' => 'upload'
	);
	$options[] = array(
		'id' => 'clear'
	);
	$wp_editor_settings = array(
		'quicktags' => 1,
		'tinymce' => 1,
		'media_buttons' => 1,
		'textarea_rows' => 5
	);
	$options[] = array(
		'name' => __( '网站底部内容', 'theme-textdomain' ),
		//'desc' => __( 'A text input field.', 'theme-textdomain' ),
		'id' => 'ts_tishiwenzi',
		'std' => 'Copyright ©  ts小陈  版权所有',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
$options[] = array(
		'id' => 'clear'
	);
$options[] = array(
		'name' => __( '流量统计代码（同步）', 'theme-textdomain' ),
		'desc' => __( '用于在页脚添加同步统计代码', 'theme-textdomain' ),
		'id' => 'ts_tongji_d',
		'type' => 'textarea'
	);
$options[] = array(
		'id' => 'clear'
	);
$options[] = array(
		'name' => __( '流量统计代码（异步）', 'theme-textdomain' ),
		'desc' => __( '用于在页头添加异步统计代码', 'theme-textdomain' ),
		'id' => 'ts_tongji_t',
		'type' => 'textarea'
	);	
//侧边栏设置
	$options[] = array(
		'name' => __( '侧边栏设置', 'theme-textdomain' ),
		'type' => 'heading'
	);
	
	    $options[] = array(
		'name' => __( '是否启用个人中心', 'theme-textdomain' ),
		'desc' => __( '勾选并填写', 'theme-textdomain' ),
		'id' => 'ts_gerenzx',
		'std' => '1',
		'type' => 'checkbox'
	);
    //定义一个text类型的input box，type要设置为text，class为mini会让input长度比较短
	$options[] = array(
		'name' => __( '背景图', 'theme-textdomain' ),
		//'desc' => __( '你的qq号', 'theme-textdomain' ),
		'id' => 'ts_gerenzx_beijing',
		'class' => 'hidden',
		'std' => 'https://www.tsxxc.com/2014/wp-content/uploads/2014/06/5-1-300x225.jpg',
		'type' => 'upload'
	);
 $options[] = array(
		'name' => __( '头像', 'theme-textdomain' ),
		//'desc' => __( '你的qq号', 'theme-textdomain' ),
		'id' => 'ts_gerenzx_touxaing',
		'class' => 'hidden',
		'std' => "$xiaochenpath/favicon.ico",
		'type' => 'upload'
	);
	 $options[] = array(
		'name' => __( '介绍', 'theme-textdomain' ),
		'id' => 'ts_gerenzx_jishao',
		'std' => '如需仿站、搭建、更换后台、解决问题等服务，请联系博主微信:tsxcca',
		'class' => 'hidden',
		'type' => 'text'
	);
	//分隔符
	$options[] = array(
		'id' => 'clear'
	);
	
$options[] = array(
		'name' => __( '整体设置', 'theme-textdomain' )
	);
	
 	$options[] = array(
		'name' => __( '标签文字彩色(与下边选项二选一)', 'theme-textdomain' ),
		'desc' => __( '勾选首页标签文字为彩色', 'theme-textdomain' ),
		'id' => 'ts_tag_caise',
		'type' => 'checkbox'
	);
	 	$options[] = array(
		'name' => __( '标签彩色', 'theme-textdomain' ),
		'desc' => __( '勾选首页标签为彩色', 'theme-textdomain' ),
		'id' => 'ts_tag_caisec',
		'std' => '1',
		'type' => 'checkbox'
	);
 $options[] = array(
     	'name' => __( '热门文章', 'theme-textdomain' ),
		'desc' => __( '显示数量', 'theme-textdomain' ),
		'id' => 'ts_syshulaing',
		'class' => 'mini',
		'std' => '5',
		'type' => 'text'
	);

 $options[] = array(
     'name' => __( '随机文章', 'theme-textdomain' ),
		'desc' => __( '显示数量', 'theme-textdomain' ),
		'id' => 'ts_sysjshulaing',
		'class' => 'mini',
		'std' => '5',
		'type' => 'text'
	);
	$options[] = array(
		'id' => 'clear'
	);
//上传图片
$options[] = array(
		'name' => __( '配合小工具广告使用，此处设置广告内容', 'theme-textdomain' ),
		'type' => 'info'
	);
	
	$options[] = array(
		'name' => __( '广告A', 'theme-textdomain' ),
		'id' => 'ts_banner1',
		'std' => "$xiaochenpath/ad.png", 
		'type' => 'upload'
	);
	 $options[] = array(
		'name' => __( '广告A跳转链接', 'theme-textdomain' ),
		'id' => 'ts_banner1lianj',
		'std' => '/',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( '广告B', 'theme-textdomain' ),
		'id' => 'ts_banner2',
		'std' => "$xiaochenpath/ad.png", 
		'type' => 'upload'
	);
	 $options[] = array(
		'name' => __( '广告B跳转链接', 'theme-textdomain' ),
		'id' => 'ts_banner2lianj',
		'std' => '/',
		'type' => 'text'
	);




//第二个
	$options[] = array(
		'name' => __( '网站标志', 'theme-textdomain' ),
		'type' => 'heading'
	);
 $options[] = array(
		'name' => __( '站点LOGO', 'theme-textdomain' ),
		'desc' => __( '勾选并上传logo', 'theme-textdomain' ),
		'id' => 'logo_showhidden',
		'std' => '1',
		'type' => 'checkbox'
	);

     $options[] = array(
		'name' => __( '自定义LOGO', 'theme-textdomain' ),
		'desc' => '透明png图片最佳，比例 108×62px',
		'id' => 'ts_logo',
		'class' => 'hidden',
		'std' => "$xiaochenpath/logo.png", //设置默认内容，xiaochenpath为图片目录地址
		'type' => 'upload'
	);
	$options[] = array(
		'id' => 'clear'
	);
$options[] = array(
		'name' => __( '站点ico', 'theme-textdomain' ),
		'desc' => __( '勾选并上传favicon.ico', 'theme-textdomain' ),
		'id' => 'ico_showhidden',
		'std' => '1',
		'type' => 'checkbox'
	);

     $options[] = array(
		'name' => __( '上传ico', 'theme-textdomain' ),
		//'desc' => __( 'This creates a full size uploader that previews the image.', 'theme-textdomain' ),
		'id' => 'ts_ico',
		'class' => 'hidden',
		'std' => "$xiaochenpath/favicon.ico",
		'type' => 'upload'
	);
	//辅助功能
	$options[] = array(
		'name' => __( '辅助功能', 'theme-textdomain' ),
		'type' => 'heading'
	);
	    $options[] = array(
        'name' => '图片延迟加载',
        'desc' => '启用缩略图延迟加载',
        'id' => 'ts_img_lazy_s',
        'std' => '0',
        'type' => 'checkbox'
    );
	$options[] = array(
		'id' => 'clear'
	);
	
	 $options[] = array(
        'name' => '分类页置顶文章标识',
        'desc' => '启用',
        'id' => 'ts_flzd',
        'std' => '1',
        'type' => 'checkbox'
    );
 
	$options[] = array(
		'id' => 'clear'
	);
	$options[] = array(
		'name' => __( '关闭全站评论', 'theme-textdomain' ),
		'desc' => __( '评论很多时候没什么用，直接干掉', 'theme-textdomain' ),
		'id' => 'ts_qqpingln_gb',
		'std' => '0',
		'type' => 'checkbox'
	);
	
		$options[] = array(
		'name' => __( '随机评论文字', 'theme-textdomain' ),
		'desc' => __( '启用评论区随机评论文字功能(请查看主题帮助文档-辅助功能)', 'theme-textdomain' ),
		'id' => 'ts_pinglunapi',
		'std' => '0',
		'type' => 'checkbox'
	);

$options[] = array(
		'name' => __( 'QQ快速评论', 'theme-textdomain' ),
		'desc' => __( '开启', 'theme-textdomain' ),
		'id' => 'ts_qqpingln',
		'std' => '1',
		'type' => 'checkbox'
	);


$options[] = array(
		'name' => __( '评论区随机显示头像', 'theme-textdomain' ),
		'desc' => __( '开启', 'theme-textdomain' ),
		'id' => 'ts_qtouxaingsuj',
		'std' => '1',
		'type' => 'checkbox'
	);
$options[] = array(
		'name' => __( '评论区访客归属地', 'theme-textdomain' ),
		'desc' => __( '显示', 'theme-textdomain' ),
		'id' => 'ts_pinglun_gsd',
		'std' => '1',
		'type' => 'checkbox'
	);
	$options[] = array(
		'name' => __( '评论区访客浏览器UA', 'theme-textdomain' ),
		'desc' => __( '显示', 'theme-textdomain' ),
		'id' => 'ts_pinglun_ua',
		'std' => '1',
		'type' => 'checkbox'
	);
	
	$options[] = array(
		'id' => 'clear'
	);
		  $options[] = array(
		'name' => __( '文章详情面包屑导航', 'theme-textdomain' ),
		'desc' => __( '禁用', 'theme-textdomain' ),
		'id' => 'ts_weznhangtjz_mb',
		'std' => '0',
		'type' => 'checkbox'
	);
	  $options[] = array(
		'name' => __( '文章详情作者', 'theme-textdomain' ),
		'desc' => __( '启用', 'theme-textdomain' ),
		'id' => 'ts_weznhangtjz_sin',
		'std' => '1',
		'type' => 'checkbox'
	);
	 $options[] = array(
		'name' => __( '文章详情页阅读数', 'theme-textdomain' ),
		'desc' => __( '启用', 'theme-textdomain' ),
		'id' => 'ts_weznhangtjy_sin',
		'std' => '1',
		'type' => 'checkbox'
	);
	 $options[] = array(
	   'name' => __( '文章详情页评论数', 'theme-textdomain' ),
		'desc' => __( '启用', 'theme-textdomain' ),
		'id' => 'ts_weznhangtjp_sin',
		'std' => '1',
		'type' => 'checkbox'
	);
		 $options[] = array(
		'name' => __( '赞赏点赞', 'theme-textdomain' ),
		'desc' => __( '启用', 'theme-textdomain' ),
		'id' => 'ts_dianzanss',
		'std' => '0',
		'type' => 'checkbox'
	);
 $options[] = array(
		'name' => __( '设置收款二维码图片', 'theme-textdomain' ),
		//'desc' => __( '设置收款二维码图片', 'theme-textdomain' ),
		'id' => 'ts_dianzanss_ewm',
		'class' => 'hidden',
		"std" => 'https://www.tsxxc.com/wp-content/uploads/2021/01/weixinzhifu.jpg',
		'type' => 'upload'
	);
	$options[] = array(
		'id' => 'clear'
	);


	$options[] = array(
		'name' => '修改默认登录链接',
		'desc' => '启用，提示：要记住修改后的链接',
		'id' => 'ts_login',
		'std' => '0',
		'type' => 'checkbox'
	);

	$options[] = array(
		'desc' => '前缀',
		'id' => 'pass_h',
		'std' => 'my',
	   'class' => 'mini',
		'type' => 'text'
	);

	$options[] = array(
		'desc' => '后缀',
		'id' => 'word_q',
		'std' => 'the',
		'class' => 'mini',
		'type' => 'text'
	);

	$options[] = array(
		'desc' => '跳转网址',
		'id' => 'go_link',
		'std' => '链接地址',
		'type' => 'text'
	);

	$options[] = array(
		'name' => '',
		'desc' => '登录地址：http://域名/wp-login.php?my=the',
		'id' => 'login_s'
	);
	$options[] = array(
		'id' => 'clear'
	);
$options[] = array(
		'name' => '后台登录美化',
		'desc' => '启用后台登录美化',
		'id' => 'ts_loginmh',
		'std' => '1',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => '',
		'desc' => '上传背景图片',
		'id' => 'ts_loginmh_img',
        "std" => "$xiaochenpath/login_bj.jpg",
		'type' => 'upload'
	);
	$options[] = array(
		'name' => '',
		'desc' => '上传登录页面logo',
		'id' => 'ts_loginmh_lo',
        "std" => "$xiaochenpath/logo.png",
		'type' => 'upload'
	);
$options[] = array(
		'name' => '登录页面logo跳转地址',
		'desc' => '',
		'id' => 'ts_loginmh_lj',
        "std" => '/',
		'type' => 'text'
	);
	
	
		//分隔符
	$options[] = array(
		'id' => 'clear'
	);
	
//seo设置
 $options[] = array(
		'name' => __( 'SEO设置', 'theme-textdomain' ),
		'type' => 'heading'
	);
$options[] = array(
		'name' => __( '自定义网站首页title', 'theme-textdomain' ),
		'id' => 'ts_title',
		'type' => 'text'
	);
$options[] = array(
		'desc' => __( '留空则显示网站站点标题', 'theme-textdomain' ),
		'type' => 'info'
	);


//点击显示副标题设置
$options[] = array(
    'name' => __( '自定义网站副标题', 'theme-textdomain' ),
    'desc' => __( '自定义副标题（非必须）', 'theme-textdomain' ),
    'id' => 'fubiaoti_showhidden',
    'type' => 'checkbox'
  );


$options[] = array(
		'name' => __( '配置网站副标题', 'theme-textdomain' ),
		'desc' => __( '非必须', 'theme-textdomain' ),
		'id' => 'ts_fubiaoti',
		'class' => 'hidden',
		'type' => 'text'
	);
 
$options[] = array(
		'name' => __( '站点title连接符', 'theme-textdomain' ),
		'desc' => __( '添加副标题请设置连接符号（建议 | - _ 其中一个）', 'theme-textdomain' ),
		'id' => 'ts_lianjiefu',
		'class' => 'hidden',
		//'class' => 'mini', //mini, tiny, small
		'type' => 'text'
	);





$options[] = array(
		'name' => __( '网站关键词（KeyWords）', 'theme-textdomain' ),
		'desc' => __( '一般不超过100个字符', 'theme-textdomain' ),
		'id' => 'ts_guanjianci',
		 
		'type' => 'text'
	);
$options[] = array(
		'name' => __( '网站描述（Description）', 'theme-textdomain' ),
		'desc' => __( '一般不超过200个字符', 'theme-textdomain' ),
		'id' => 'ts_miaoshu',
		'type' => 'textarea'
	);
			$options[] = array(
		'id' => 'clear'
	);
	    $options[] = array(
        'name' => '',
        'desc' => '不显示分类链接中的"category"',
        'id' => 'no_category',
        'std' => '0',
        'type' => 'checkbox'
    );
//广告设置
 $options[] = array(
		'name' => __( '广告', 'theme-textdomain' ),
		'type' => 'heading'
	);
	 $options[] = array(
		'name' => __( '首页最新文章广告位', 'theme-textdomain' ),
		'desc' => __( '显示', 'theme-textdomain' ),
		'id' => 'ts_adsytop',
		'std' => '0',
		'type' => 'checkbox'
	);
    //定义一个text类型的input box，type要设置为text，class为mini会让input长度比较短
	$options[] = array(
		'name' => __( '输入首页最新文章下部广告代码', 'theme-textdomain' ),
		//'desc' => __( '你的qq号', 'theme-textdomain' ),
		'id' => 'ts_adsytopgg',
		'std' => '<a href="https://www.tsxxc.com/promote/website/500.html" target="_blank"><img src="https://o.tsxxc.com/tsxiaochen/2022/07/20220701093253589.jpg" alt="广告也精彩" /></a>',
		'class' => 'hidden',
		'type' => 'textarea'
	);	
	
	   $options[] = array(
		'name' => __( '正文标题广告位', 'theme-textdomain' ),
		'desc' => __( '显示', 'theme-textdomain' ),
		'id' => 'ts_adtopzw',
		'std' => '0',
		'type' => 'checkbox'
	);
    //定义一个text类型的input box，type要设置为text，class为mini会让input长度比较短
	$options[] = array(
		'name' => __( '输入正文标题广告代码', 'theme-textdomain' ),
		//'desc' => __( '你的qq号', 'theme-textdomain' ),
		'id' => 'ts_adtopzwx',
		'std' => '<a href="https://www.tsxxc.com/promote/website/500.html" target="_blank"><img src="https://o.tsxxc.com/tsxiaochen/2022/07/20220701093253589.jpg" alt="广告也精彩" /></a>',
		'class' => 'hidden',
		'type' => 'textarea'
	);	
	
	   $options[] = array(
		'name' => __( '正文底部广告位', 'theme-textdomain' ),
		'desc' => __( '显示', 'theme-textdomain' ),
		'id' => 'ts_adtopzwd',
		'std' => '0',
		'type' => 'checkbox'
	);
    //定义一个text类型的input box，type要设置为text，class为mini会让input长度比较短
	$options[] = array(
		'name' => __( '输入正文底部广告代码', 'theme-textdomain' ),
		//'desc' => __( '你的qq号', 'theme-textdomain' ),
		'id' => 'ts_adtopzwxd',
		'std' => '<a href="https://www.tsxxc.com/promote/website/500.html" target="_blank"><img src="https://www.tsxxc.com/wp-content/themes/xiaochen/xiaochen/ad/img/ad.jpg" alt="广告也精彩" /></a>',
		'class' => 'hidden',
		'type' => 'textarea'
	);	
	
	
$options[] = array(
		'name' => __( '文章标题下文字描述', 'theme-textdomain' ),
		'desc' => __( '不需要可将默认删除，保存', 'theme-textdomain' ),
		'id' => 'ts_single_d',
		'std' => '如需仿站、搭建、更换后台、解决问题等服务，请联系博主微信:tsxcca',
		'type' => 'text',
	);
    $options[] = array(
		'name' => __( '启用全站顶部广告', 'theme-textdomain' ),
		'desc' => __( '显示', 'theme-textdomain' ),
		'id' => 'ts_adtop',
		'std' => '0',
		'type' => 'checkbox'
	);
    //定义一个text类型的input box，type要设置为text，class为mini会让input长度比较短
	$options[] = array(
		'name' => __( '输入头部通栏广告代码', 'theme-textdomain' ),
		//'desc' => __( '你的qq号', 'theme-textdomain' ),
		'id' => 'ts_adtopx',
		'std' => '<a href="https://www.tsxxc.com/promote/website/500.html" target="_blank"><img src="https://o.tsxxc.com/tsxiaochen/2022/04/20220426032256686.jpg" alt="广告也精彩" /></a>',
		'class' => 'hidden',
		'type' => 'textarea'
	);	
	
	$options[] = array(
		'name' => __( '启用全站底部广告', 'theme-textdomain' ),
		'desc' => __( '显示', 'theme-textdomain' ),
		'id' => 'ts_adtopd',
		'std' => '0',
		'type' => 'checkbox'
	);
    //定义一个text类型的input box，type要设置为text，class为mini会让input长度比较短
	$options[] = array(
		'name' => __( '输入底部通栏广告代码', 'theme-textdomain' ),
		//'desc' => __( '你的qq号', 'theme-textdomain' ),
		'id' => 'ts_adtopxd',
		'std' => '<a href="https://www.tsxxc.com/promote/website/500.html" target="_blank"><img src="https://o.tsxxc.com/tsxiaochen/2022/04/20220426032256686.jpg" alt="广告也精彩" /></a>',
		'class' => 'hidden',
		'type' => 'textarea'
	);
	
	
//$options[] = array(
		//'name' => __( '测试', 'theme-textdomain' ),
		//'desc' => __( '测试', 'theme-textdomain' ),
//		'id' => 'ts_ceshi',
//		'type' => 'checkbox'
//	);

//  $options[] = array(
//  		'name' => __( '设置调取栏目', 'theme-textdomain' ),
//  		'desc' => __( '设置调取栏目', 'theme-textdomain' ),
//  		'id' => 'ts_lanmuid',
//  		'class' => 'mini', //mini, tiny, small
//  		'type' => 'text'
//  	);
//   $options[] = array(
//  		'name' => __( '设置调取数量', 'theme-textdomain' ),
//  		'desc' => __( '设置调取数量', 'theme-textdomain' ),
//  		'id' => 'ts_shuliang',
//  		'std' => '3',
//  		'class' => 'mini', //mini, tiny, small
//  		'type' => 'text'
//  	);
//  

/** 
//网站轮播图
    $options[] = array(
		'name' => __( '网站轮播图', 'theme-textdomain' ),
		'class' => 'tiny', //mini, tiny, small
		'type' => 'heading'
	);
    //上传图片
	$options[] = array(
		'name' => __( '轮播图1', 'theme-textdomain' ),
		//'desc' => __( 'This creates a full size uploader that previews the image.', 'theme-textdomain' ),
		'id' => 'ts_banner1',
		'type' => 'upload'
	);
$options[] = array(
		'name' => __( '轮播图2', 'theme-textdomain' ),
		//'desc' => __( 'This creates a full size uploader that previews the image.', 'theme-textdomain' ),
		'id' => 'ts_banner2',
		'type' => 'upload'
	);
$options[] = array(
		'name' => __( '轮播图3', 'theme-textdomain' ),
		//'desc' => __( 'This creates a full size uploader that previews the image.', 'theme-textdomain' ),
		'id' => 'ts_banner3',
		'type' => 'upload'
	);
     
     //网站默认图片
    $options[] = array(
		'name' => __( '默认图片', 'theme-textdomain' ),
		'desc' => __( '如支持则需要配置', 'theme-textdomain' ),
		'id' => 'moren_showhidden',
		'type' => 'checkbox'
	);
	$options[] = array(
		'name' => __( '上传默认图片', 'theme-textdomain' ),
		'id' => 'ts_moren',
		//'placeholder' => '请输入',
		'class' => 'hidden',
		'type' => 'upload'
	);


    //第三个   //第三个   //第三个   //第三个   //第三个   //第三个   //第三个   //第三个   //第三个
	$options[] = array(
		'name' => __( '功能屏蔽', 'theme-textdomain' ),
		'type' => 'heading'
	);
**/



    //第六个//第六个//第六个
	$options[] = array(
		'name' => __( '增强优化', 'theme-textdomain' ),
		'type' => 'heading'
	);
	$options[] = array(
		'name' => __( 'Gravatar 头像设置', 'theme-textdomain' ),
		'desc' => __( '使用 V2EX 的 Gravatar 镜像来代替原来的，支持 HTTPS。', 'theme-textdomain' ),
		'id' => 'ts_youhua_tx',
		'std' => '1',
		'type' => 'checkbox'
	); 
$options[] = array(
		'name' => __( '移除css和js版本号', 'theme-textdomain' ),
		'desc' => __( '去除加载的css和js后面的版本号', 'theme-textdomain' ),
		'id' => 'ts_youhua_banbenhao',
		'type' => 'checkbox'
	);

$options[] = array(
		'name' => __( '移除大小写修正', 'theme-textdomain' ),
		'desc' => __( '移除WordPress大小写修正，让用户自己决定怎么写。', 'theme-textdomain' ),
		'id' => 'ts_youhua_daxiaoxie',
		'type' => 'checkbox'
	);
$options[] = array(
		'name' => __( '移除页面头部无关代码。', 'theme-textdomain' ),
		'desc' => __( '屏蔽站点Feed，移除页面头部中无关紧要的代码。', 'theme-textdomain' ),
		'id' => 'ts_jinyong_feed',
		'type' => 'checkbox'
	);


$options[] = array(
		'name' => __( '移除右上角帮助', 'theme-textdomain' ),
		'desc' => __( '移除后台界面右上角帮助', 'theme-textdomain' ),
		'id' => 'ts_youhua_houtaibangzhu',
		'type' => 'checkbox'
	);

$options[] = array(
		'name' => __( '移除顶部管理横条', 'theme-textdomain' ),
		'desc' => __( '删除最顶部的管理横条和后台个人设置页面工具栏相关的选项。', 'theme-textdomain' ),
		'id' => 'ts_jinyong_hengtiao',
		'type' => 'checkbox'
	);
$options[] = array(
		'name' => __( '切换经典小工具', 'theme-textdomain' ),
		'desc' => __( '侧边栏小工具切换为经典小工具', 'theme-textdomain' ),
		'id' => 'ts_sidsgj',
		'std' => '1',
		'type' => 'checkbox'
	);
$options[] = array(
		'name' => __( '过滤评论HTML', 'theme-textdomain' ),
		'desc' => __( '过滤评论HTML', 'theme-textdomain' ),
		'id' => 'ts_jinyong_pinglunhtml',
		'type' => 'checkbox'
	);
	$options[] = array(
		'name' => __( '底部耗时与查询', 'theme-textdomain' ),
		'desc' => __( '在网站底部提示页面生成时间和查询次数', 'theme-textdomain' ),
		'id' => 'ts_dibu_xx',
		'std' => '0',
		'type' => 'checkbox'
	);
		$options[] = array(
		'id' => 'clear'
	);
	$options[] = array(
		'name' => __( '屏蔽自动更新', 'theme-textdomain' ),
		'desc' => __( '关闭自动更新功能，通过手动或SSH方式更新。', 'theme-textdomain' ),
		'id' => 'ts_jinyong_gengxin',
		'type' => 'checkbox'
	);
	$options[] = array(
		'name' => __( '屏蔽古腾堡编辑器', 'theme-textdomain' ),
		'desc' => __( '屏蔽Gutenberg编辑器，换回经典编辑器。', 'theme-textdomain' ),
		'id' => 'ts_jinyong_gtb',
		'std' => '1',
		'type' => 'checkbox'
	);

$options[] = array(
		'name' => __( '屏蔽文章修订', 'theme-textdomain' ),
		'desc' => __( '屏蔽文章修订功能，精简文章表数据。', 'theme-textdomain' ),
		'id' => 'ts_jinyong_wzxd',
		'type' => 'checkbox'
	);


$options[] = array(
		'name' => __( '屏蔽XML-RPC', 'theme-textdomain' ),
		'desc' => __( '关闭XML-RPC功能，只在后台发布文章。', 'theme-textdomain' ),
		'id' => 'ts_jinyong_xmlrpc',
		'type' => 'checkbox'
	);


$options[] = array(
		'name' => __( '屏蔽REST API', 'theme-textdomain' ),
		'desc' => __( '禁止非登录用户使用wp-json', 'theme-textdomain' ),
		'id' => 'ts_jinyong_api',
		'type' => 'checkbox'
	);


$options[] = array(
		'name' => __( '屏蔽字符转码', 'theme-textdomain' ),
		'desc' => __( '屏蔽字符换成格式化的HTML实体功能。', 'theme-textdomain' ),
		'id' => 'ts_jinyong_zifuzhuanma',
		'type' => 'checkbox'
	);

$options[] = array(
		'name' => __( '屏蔽邮箱验证', 'theme-textdomain' ),
		'desc' => __( '屏蔽站点管理员邮箱定期验证功能。', 'theme-textdomain' ),
		'id' => 'ts_jinyong_mailyanzheng',
		'type' => 'checkbox'
	);
 









    //第七个
	//$options[] = array(
	//	'name' => __( '备用', 'theme-textdomain' ),
	//	'type' => 'heading'
//	);
   // $options[] = array(
//		'name' => __( '分类ID对照', 'theme-textdomain' ),
//		'desc' => __( '<ul>'.$cats_id.'</ul>' ),
//		'id' => 'catid',
//		'type' => 'info'
//	);

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);
/**
	$options[] = array(
		'name' => __( '默认内容', 'theme-textdomain' ),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'theme-textdomain' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'example_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
*/
	return $options;
}