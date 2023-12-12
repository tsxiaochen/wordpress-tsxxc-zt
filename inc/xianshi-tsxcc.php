<?php
function optionsframework_custom_scripts() { ?>


<script type="text/javascript">
jQuery(document).ready(function() {
//网站标志设置
    jQuery('#ico_showhidden').click(function() {
        jQuery('#section-ts_ico').fadeToggle(400);
    });
if (jQuery('#ico_showhidden:checked').val() !== undefined) {
        jQuery('#section-ts_ico').show();
    }

    jQuery('#ts_adsytop').click(function() {
        jQuery('#section-ts_adsytopgg').fadeToggle(400);
    });
    if (jQuery('#ts_adsytop:checked').val() !== undefined) {
        jQuery('#section-ts_adsytopgg').show();
    }

 jQuery('#logo_showhidden').click(function() {
        jQuery('#section-ts_logo').fadeToggle(400);
    });
if (jQuery('#logo_showhidden:checked').val() !== undefined) {
        jQuery('#section-ts_logo').show();
    }
 
       jQuery('#ts_lunbo').click(function() {
        jQuery('#section-ts_lunbo_sl,#section-ts_lunbo_yc').fadeToggle(400);
    });
    if (jQuery('#ts_lunbo:checked').val() !== undefined) {
        jQuery('#section-ts_lunbo_sl, #section-ts_lunbo_yc').show();
    }
    
       jQuery('#ts_index_dbtu').click(function() {
        jQuery('#section-ts_index_dbtu_id,#section-ts_index_dbtu_sl').fadeToggle(400);
    });
    if (jQuery('#ts_index_dbtu:checked').val() !== undefined) {
        jQuery('#section-ts_index_dbtu_id, #section-ts_index_dbtu_sl').show();
    }
    
//基本设置
    jQuery('#weixin_showhidden').click(function() {
        jQuery('#section-ts_weixin').fadeToggle(400);
    });
    if (jQuery('#weixin_showhidden:checked').val() !== undefined) {
        jQuery('#section-ts_weixin').show();
    }
    jQuery('#qq_showhidden').click(function() {
        jQuery('#section-ts_qq').fadeToggle(400);
    });
if (jQuery('#qq_showhidden:checked').val() !== undefined) {
        jQuery('#section-ts_qq').show();
    }
jQuery('#ts_jiaodianxx').click(function() {
        jQuery('#section-ts_jiaodian').fadeToggle(400);
    });
if (jQuery('#ts_jiaodianxx:checked').val() !== undefined) {
        jQuery('#section-ts_jiaodian').show();
    }
    
     jQuery('#ts_dianzanss').click(function() {
        jQuery('#section-ts_dianzanss_ewm').fadeToggle(400);
    });
if (jQuery('#ts_dianzanss:checked').val() !== undefined) {
        jQuery('#section-ts_dianzanss_ewm').show();
    }
 
 
   jQuery('#ts_index_l').click(function() {
        jQuery('#section-ts_index_lz,#section-ts_index_ls').fadeToggle(400);
    });
    if (jQuery('#ts_index_l:checked').val() !== undefined) {
        jQuery('#section-ts_index_lz,#section-ts_index_ls').show();
    }
       jQuery('#ts_index_lb').click(function() {
        jQuery('#section-ts_index_lzb,#section-ts_index_lsb').fadeToggle(400);
    });
    if (jQuery('#ts_index_lb:checked').val() !== undefined) {
        jQuery('#section-ts_index_lzb,#section-ts_index_lsb').show();
    }
//seo设置
    jQuery('#moren_showhidden').click(function() {
        jQuery('#section-ts_moren').fadeToggle(400);
    });
if (jQuery('#moren_showhidden:checked').val() !== undefined) {
        jQuery('#section-ts_moren').show();
    }


    
   jQuery('#fubiaoti_showhidden').click(function() {
        jQuery('#section-ts_fubiaoti,#section-ts_lianjiefu').fadeToggle(400);
    });
    if (jQuery('#fubiaoti_showhidden:checked').val() !== undefined) {
        jQuery('#section-ts_fubiaoti, #section-ts_lianjiefu').show();
    }

//广告

jQuery('#ts_adtop').click(function() {
        jQuery('#section-ts_adtopx').fadeToggle(400);
    });
if (jQuery('#ts_adtop:checked').val() !== undefined) {
        jQuery('#section-ts_adtopx').show();
    }
jQuery('#ts_adtopd').click(function() {
        jQuery('#section-ts_adtopxd').fadeToggle(400);
    });
if (jQuery('#ts_adtopd:checked').val() !== undefined) {
        jQuery('#section-ts_adtopxd').show();
    }
jQuery('#ts_adtopzw').click(function() {
        jQuery('#section-ts_adtopzwx').fadeToggle(400);
    });
if (jQuery('#ts_adtopzw:checked').val() !== undefined) {
        jQuery('#section-ts_adtopzwx').show();
    }
 jQuery('#ts_adtopzwd').click(function() {
        jQuery('#section-ts_adtopzwxd').fadeToggle(400);
    });
if (jQuery('#ts_adtopzwd:checked').val() !== undefined) {
        jQuery('#section-ts_adtopzwxd').show();
    }   
    
    
    
    //侧边栏
     jQuery('#ts_gerenzx').click(function() {
        jQuery('#section-ts_gerenzx_beijing,#section-ts_gerenzx_touxaing,#section-ts_gerenzx_jishao').fadeToggle(400);
    });
if (jQuery('#ts_gerenzx:checked').val() !== undefined) {
        jQuery('#section-ts_gerenzx_beijing,#section-ts_gerenzx_touxaing,#section-ts_gerenzx_jishao').show();
    } 
    
    
    
    
    
    
    
    
    
    
    
    
    
});
</script>


<?php
}