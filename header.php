<?php wp_head();?>
<header class="header">
  <div class="container clearfix">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar icon-bar-1"></span> <span class="icon-bar icon-bar-2"></span> <span class="icon-bar icon-bar-3"></span> </button>
      <h1 class="logo"> <a href="/" rel="home"><img src="<?php
  if (sc_tsxcc('ts_logo')) {
    echo ''.sc_tsxcc('ts_logo').'';
  } else{ echo'https://www.tsxxc.com/wp-content/uploads/2021/01/logo2.png';
  } 
  ?>" alt="logo"></a> </h1>
    </div>
    <div class="collapse navbar-collapse">
      <nav class="navbar-left primary-menu">
<?php
wp_nav_menu( array(
'theme_location' => 'topmenu',
'depth' => 2,
'container' => false,
'menu_class' => 'nav navbar-nav wpcom-adv-menu',
'menu_id' => 'topmeau',
'fallback_cb' => 'default_menu',//调用functions里边设置的用户没有设置菜单时显示提示语
//添加或更改walker参数
'walker' => new wp_bootstrap_navwalker())
);
?>
      </nav>
    </div>
  </div>
</header>




