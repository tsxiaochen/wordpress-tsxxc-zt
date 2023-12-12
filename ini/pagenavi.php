<?php  
    function pagenavi( $before = '', $after = '', $p = 3 ) {  
      if ( is_singular() ) return;  
      global $wp_query, $paged;  
      $max_page = $wp_query->max_num_pages;  
      if ( $max_page == 1 ) return;  
      if ( emptyempty( $paged ) ) $paged = 1;  
      echo $before.'<nav id="pagenavi">'."n";  
      if ( $paged > 1 ) p_link( $paged - 1, '上页', '上页' );  
      if ( $paged > $p + 1 ) p_link( 1, '第一页' );  
      if ( $paged > $p + 2 ) echo '<span class="pages">...</span>';  
      for( $i = $paged - $p; $i <= $paged + $p; $i++ ) {  
        if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<span class='page-numbers current'>{$i}</span>" : p_link( $i );  
      }  
      if ( $paged < $max_page - $p - 1 ) echo '<span class="pages">...</span>';  
      if ( $paged < $max_page - $p ) p_link( $max_page, '最后一页' );  
      if ( $paged < $max_page ) p_link( $paged + 1,'下页', '下页' );  
      echo '</nav>'.$after."n";  
    }  
    function p_link( $i, $title = '', $linktype = '' ) {  
      if ( $title == '' ) $title = "第 {$i} 页";  
      if ( $linktype == '' ) { $linktext = $i; } else { $linktext = $linktype; }  
      echo "<a class='page-numbers' href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$linktext}</a>";  
    }  
  ?>
  <style>
  /* pagenavi */    
#pagenavi { text-align: center; font-size: 12px; margin: 15px 0 20px; text-align: center; }  
#pagenavi a, #pagenavi a:visited, #pagenavi span { background-color: #F6F6F6; border: 1px solid #C6C6C6; border-radius: 2px 2px 2px 2px; color: #444444; display: inline-block; height: 26px; line-height: 26px; margin: 0 2px; padding: 0 5px; }  
#pagenavi a, #pagenavi a:visited { margin: 0 2px; }  
#pagenavi span.pages { color: #777; font-weight: bold; margin-right: 10px; padding: 0; border:none }  
#pagenavi span.current { font-weight: 800; border: none }  
.page-numbers { height: 22px; min-width: 22px; }  
#pagenavi a:hover { background: #31B2FF; border-color: #31B2FF; color: #FFFFFF; text-decoration: none; }  
</style>