 <aside class="sidebar">
<?php //后台设置首页、栏目、详情页的文章、标签是否启用，设置展示数量等。每个模块在ini/sidebar文件夹 ?>
<?php 

if (function_exists("dynamic_sidebar")) {//如果设置了侧边栏
    dynamic_sidebar("gheader");//添加头部侧边栏中的小工具
 
    if (is_home()) {
        dynamic_sidebar("sidebar_home");//如果是首页则显示home侧边栏中的小工具
    }
    else if (is_category()) {
        dynamic_sidebar("sidebar_cat");
    }
    else if (is_tag()) {
        dynamic_sidebar("sidebar_cat");
    }
    else if (is_search()) {
        dynamic_sidebar("sidebar_search");
    }
    else if (is_single()) {
        dynamic_sidebar("sidebar_single");
    }
 else  {
 dynamic_sidebar("sidebar_not");
	}
 
    dynamic_sidebar("gfooter");
}

?>
</aside>