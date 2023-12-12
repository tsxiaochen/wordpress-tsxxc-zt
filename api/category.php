<?php //这里偷懒了，直接将wordpress的$wp_query对象json化输出，实际中最好提取自己需要的内容输出，以减少http传输量
    header("Content-type:application/json");
    if(isset($_GET['debug'])){
        print_r($wp_query);
     }else echo json_encode($wp_query); ?>