<div class="widget-puock-author widget"> 
            <div class="header" style="background-image: url('<?php echo sc_tsxcc( 'ts_gerenzx_beijing' ); ?>')">
                <img class="avatar" src="<?php echo sc_tsxcc( 'ts_gerenzx_touxaing' ); ?>" alt="演示站点" title="演示站点">
            </div>
            <div class="content t-md puock-text">
                <div class="text-center p-2">
                    <div class="t-lg"><?php bloginfo('name'); ?></div>
                    <div class="mt10 t-sm"><?php echo sc_tsxcc( 'ts_gerenzx_jishao' ); ?></div>
                </div>
                <div class="row mt10">
                    <div class="col-6 text-center">
                        <div class="c-sub t-sm">阅读量</div>
                        <div><?php echo tsxcc_all_view(); ?></div>
                    </div>
                    <div class="col-6 text-center">
                        <div class="c-sub t-sm">评论数</div>
                        <div><?php echo comments_users(@$postid, 1);  ?></div>
                    </div>
                </div>
            </div>
        </div>