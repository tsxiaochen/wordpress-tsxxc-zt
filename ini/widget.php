<?php 

//热门文章小工具
class ts_remen extends WP_Widget {
	function __construct(){   
        $widget_options = array('classname'=>'set_contact','description'=>'根据阅读量显示最近的热门文章');   
       parent::__construct( 'ts_remen','ts小陈-热门文章',$widget_options );  
		
    }
	function widget($args, $instance) {
	include(TEMPLATEPATH . '/ini/sidebar/sidebar-remen.php'); 
	}
}
add_action('widgets_init', function(){register_widget('ts_remen' );});

class ts_sousuo extends WP_Widget {
	function __construct(){   
        $widget_options = array('classname'=>'set_contact','description'=>'提供便捷快速的搜索框');   
        parent::__construct( 'ts_sousuo','ts小陈-搜索框',$widget_options );   
    }
	function widget($args, $instance) {
	include(TEMPLATEPATH . '/ini/sidebar/sidebar-sousuo.php'); 
	}
}
add_action('widgets_init', function(){register_widget('ts_sousuo' );});

class ts_jieshao extends WP_Widget {
	function __construct(){   
        $widget_options = array('classname'=>'set_contact','description'=>'显示博客的主人-关于博主');   
        parent::__construct( 'ts_jieshao','ts小陈-关于博主',$widget_options );   
    }
	function widget($args, $instance) {
	 include(TEMPLATEPATH . '/ini/sidebar/sidebar-jieshao.php'); 
	}
}
add_action('widgets_init', function(){register_widget('ts_jieshao' );});
class ts_suiji extends WP_Widget {
	function __construct(){   
        $widget_options = array('classname'=>'set_contact','description'=>'显示随机文章');   
        parent::__construct( 'ts_suiji','ts小陈-随机文章',$widget_options );   
    }
	function widget($args, $instance) {
	 include(TEMPLATEPATH . '/ini/sidebar/sidebar-suiji.php'); 
	}
}
add_action('widgets_init', function(){register_widget('ts_suiji' );});



class ts_ggaa extends WP_Widget {
	function __construct(){   
        $widget_options = array('classname'=>'set_contact','description'=>'调取后台广告A');   
        parent::__construct( 'ts_ggaa','ts小陈-广告A',$widget_options );   
    }
	function widget($args, $instance) {
	  include(TEMPLATEPATH . '/ini/sidebar/sidebar-ad.php'); 
	}
}
add_action('widgets_init', function(){register_widget('ts_ggaa' );});

class ts_ggbb extends WP_Widget {
	function __construct(){   
        $widget_options = array('classname'=>'set_contact','description'=>'调取后台广告B');   
        parent::__construct( 'ts_ggbb','ts小陈-广告B',$widget_options );   
    }
	function widget($args, $instance) {
	  include(TEMPLATEPATH . '/ini/sidebar/sidebar-add.php'); 
	}
}
add_action('widgets_init', function(){register_widget('ts_ggbb' );});

class biaoqian extends WP_Widget {
	function __construct(){   
        $widget_options = array('classname'=>'set_contact','description'=>'集成博客的标签为标签云');   
        parent::__construct( 'biaoqian','ts小陈-标签云',$widget_options );   
    }
	function widget($args, $instance) {
	 include(TEMPLATEPATH . '/ini/sidebar/sidebar-biaoqian.php'); 
	}
}
add_action('widgets_init', function(){register_widget('biaoqian' );});

class pinglun extends WP_Widget {
	function __construct(){   
        $widget_options = array('classname'=>'set_contact','description'=>'展示网站的最新评论');   
        parent::__construct( 'pinglun','ts小陈-最新评论',$widget_options );   
    }
	function widget($args, $instance) {
	 include(TEMPLATEPATH . '/ini/sidebar/sidebar-pinglun.php'); 
	}
}
add_action('widgets_init', function(){register_widget('pinglun' );});



?>
