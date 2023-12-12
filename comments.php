<?php
    if ( post_password_required() || sc_tsxcc('ts_qqpingln_gb','1')) {
        return;
    }
?>
<?php if(sc_tsxcc('ts_qqpingln') == 1){  require get_template_directory() . '/ini/comments-qq.php';   }   else{       require get_template_directory() . '/ini/comments.php';    }