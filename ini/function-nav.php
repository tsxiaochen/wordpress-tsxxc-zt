<?php 

/*自定义二级菜单导航开始*/
class wp_bootstrap_navwalker extends Walker_Nav_Menu {   

    public function start_lvl( &$output, $depth = 0, $args = array() ) {   
        $indent = str_repeat( "\t", $depth );   
        $output .= "\n$indent<ul role=\"menu\" class=\"dropdown-menu menu-item-wrap menu-item-col-5\">\n"; //00001-下拉【UL样式 】
    }
   
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {   
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';   
  
		//判断标题文字是不是指定文字，然后显示样式
        if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {   
            $output .= $indent . '<li role="presentation" class="divider">';   
        } else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {   
            $output .= $indent . '<li role="presentation" class="divider">';   
        } else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {   
            $output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );   
        } else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {   
            $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';   
        } else {   
  
            $class_names = $value = '';  
			
			
			
			

				/*=================控制LI开始========================*/
  
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;   
            $classes[] = 'menu-item-' . $item->ID;   //00002-【所有li】添加class，包含一级二级li
  
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );  			
  
            if ( $args->has_children )   
                $class_names .= 'menu-item  dropdown'; //00003-有下拉菜单的【父LI】的添加class
			
			if ( !$args->has_children && $depth === 0 )
				$class_names .= 'menu-item ';//00004-没有下拉菜单的【父LI】添加class
			
			if ( !$args->has_children && $depth === 1 )
				$class_names .= ' nav-sub-item';//00005-二级子菜单【子LI】添加class
			
			
			/*=================控制LI结束========================*/	
			
			
			
			
			
            if ( in_array( 'current-menu-item', $classes ) )   
                $class_names .= ' active';  //00006-当前样式 

  
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';   
  
            $id = apply_filters( 'nav_menu_item_id', ' menu-item-'. $item->ID, $item, $args ); //00007-菜单所有li的添加ID，包含一级二级li，没多大用
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';   
  
            $output .= $indent . '<li' . $id . $value . $class_names .'>'; 
					
  
            $atts = array();   
            $atts['title']  = ! empty( $item->title )   ? $item->title  : '';   
            $atts['target'] = ! empty( $item->target )  ? $item->target : '';   
            $atts['rel']    = ! empty( $item->xfn )     ? $item->xfn    : '';  


			
			
			/*=================控制A开始========================*/			
  
            // If item has_children add atts to a.   
            if ( $args->has_children && $depth === 0 ) {   
                $atts['href']           = $item->url;   
                $atts['data-toggle']    = 'dropdown'; //00008-控制有下拉的父A点击是否跳转，如果删除将跳转到链接地址  
                $atts['class']          = 'dropdown-toggle';   //00009-有下拉的第一个【父A】的CLASS
                $atts['aria-haspopup']  = true; 
            } 
			elseif ( !$args->has_children && $depth === 1 ) {   
                $atts['href'] = ! empty( $item->url ) ? $item->url : '';  
                $atts['class']          = 'zilink';   //000010-有下拉的二级子菜单里【子A】的CLASS
            }
			else {   
                $atts['href'] = ! empty( $item->url ) ? $item->url : '';
				$atts['class']          = 'toplink';   //000011-没有下拉菜单里【父A】的CLASS				
            }   
  
			/*=================控制A结束========================*/	
  
  
            
			
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );   
  
            $attributes = '';   
            foreach ( $atts as $attr => $value ) {   
                if ( ! empty( $value ) ) {   
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );   
                    $attributes .= ' ' . $attr . '="' . $value . '"';   
                }   
            }   
  
            $item_output = $args->before;   
  
           if ( $args->has_children && $depth === 0 ) { 



			/*=================给 【A标签开始标签】 前面、里面添加其它内容或者标签开始========================*/	
			
					$item_output .= '<a'. $attributes .'>';//000012-在有下拉的【父A】前、里添加内容
			}
			elseif ( !$args->has_children && $depth === 1 ) {  
					$item_output .= '<a'. $attributes .'>';//000013-在二级菜单【子A】前、里添加内容
			}
			else {   
                $item_output .= '<a'. $attributes .'>';//000014-没有下拉菜单【父A】前、里添加内容			
            } 
			/*=================给 【A标签开始标签】 前面、里面添加其它内容或者标签结束========================*/	
				
				
				
  
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;   
			
			
			
			
				/*=================给 【A标签结束标签】 后面添加其它内容或者标签开始========================*/	
				
				
				
			if ( $args->has_children && $depth === 0 ) {  
					$item_output .= '</a><span class="s1"></span>';//000015-在有下拉的【父A】后、里添加内容
			}
			elseif ( !$args->has_children && $depth === 1 ) {  
					$item_output .= '</a>';//000016-在二级菜单【子A】后、里添加内容
			}
			else {   
                $item_output .= '</a>';//000017-没有下拉菜单【父A】后、里添加内容			
            } 
			
	
			/*=================给 【A标签结束标签】 后面添加其它内容或者标签结束========================*/	
			
			
			
			
            $item_output .= $args->after;   
  
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );   
        }   
    }   
			
			
			
			
   public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {   
        if ( ! $element )   
            return;   
  
        $id_field = $this->db_fields['id'];   
  
        // Display this element.   
        if ( is_object( $args[0] ) )   
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );   
  
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );   
    }   

}  

/*自定义二级菜单导航结束*/

?>