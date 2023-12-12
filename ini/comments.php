
<div id="comments" class="comments-area" data-no-instant>
    	<?php
	$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
$fields =  array(
    'author' => '
<div class="commentform-info">
<label id="author_name" for="author">
<input class="form-control" id="author" type="text" tabindex="2" value="' . $comment_author. '" name="author" placeholder="昵称[必填]" required>
</label>
<label id="author_email" for="email">
<input class="form-control" id="email" type="text" tabindex="3" value="' .$comment_author_email. '" name="email" placeholder="邮箱[必填]" required>
</label>
<label id="author_website" for="url">
<input class="form-control" id="url" type="text" tabindex="4" value="' . $comment_author_url.'" name="url" placeholder="网址(可不填)">
</label>
</div>
',
);

$comments_args = array(
   
    'fields' =>  $fields
);
comment_form($comments_args);
	
	?>
	<?php if ( have_comments() ) : ?>
	 <ol class="comment-list" style=" padding-top: 56px; font-size: 20px; border-bottom: 1px solid #f1f1f1; padding-bottom: 10px;">共有 <span class="commentCount"><?php echo number_format_i18n( get_comments_number() );?></span> 条评论</ol>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'twentyfourteen' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '← Older Comments', 'twentyfourteen' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments →', 'twentyfourteen' ) ); ?></div>
	</nav><!-- #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>
	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'       => 'div',
            'short_ping'  => true,
            'avatar_size' => 48,
            'type'        =>'comment',
            'callback'    =>'simple_comment',
			) );
		?>
	</ol>
	<!-- .comment-list -->
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'twentyfourteen' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '← Older Comments', 'twentyfourteen' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments →', 'twentyfourteen' ) ); ?></div>
	</nav><!-- #comment-nav-below -->
	
	<?php endif; // Check for comment navigation. ?>
	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyfourteen' ); ?></p>
	<?php endif; ?>
	<?php endif; // have_comments() ?>

	
</div><!-- #comments -->

<style type="text/css">

/*评论*/
#comments{
	background-color:#FFFFFF;
	padding-left:2em;
	padding-right:2em;padding-top: 2px;
}.commentCount {
    color: #fa2a2a;
}
.logged-in-as {    display: none;}
.comment-author img{
	border-radius: 50%;
}
.comment-author cite a{
	font-weight:bold;
}
.comment-author cite{
	margin-right:0.5em;
	margin-left:1em;
}

.comment-meta{
	float:right;
	
	margin-top:-4em;
}
.comment p{
/*	margin-left:6em;
	margin-top:-1em;*/
}
.comment-list {
    list-style: none;
    margin: 10px 0 0;
    padding: 0;
}
.comment-list ol{
	list-style: none;
}
.comment-list > .comment{
	border-bottom:1px dotted #d9d9d9;
}
.comment-list .children{
	padding-left:0px;
}
.comment-list .children > .comment{
	border-top:1px dotted #d9d9d9;
}
#re
.comment-meta p{
	line-height:2em;
}
.reply{
	
	margin-left:6.8em;
	padding-bottom:1em;
}
.comment-body{
	border-bottom:1px solid #eeeeee;
	margin-bottom:1em;
}
.comment-body p{
	margin-left:6.8em;
	word-wrap:break-word;
	overflow:hidden;
	word-break:break-all;
}
#comments .children{
	margin-left:5.6em;;
}
.comment-notes{
	display:none;
}

.comment-form-cookies-consent{
	display: none;
}
#commentform textarea{
	width:100%;
	border:1px solid #eeeeee;
	padding:1em;
	line-height:1.6em;
	-moz-box-sizing: border-box; /*Firefox3.5+*/
	-webkit-box-sizing: border-box; /*Safari3.2+*/
	-o-box-sizing: border-box; /*Opera9.6*/
	-ms-box-sizing: border-box; /*IE8*/
	box-sizing: border-box; 
}
#commentform p{
	margin-bottom:1em;
}
#author,#email,#url{
	width:100%;
	border:1px solid #eeeeee;
	padding:0.6em;
	-moz-box-sizing: border-box; /*Firefox3.5+*/
	-webkit-box-sizing: border-box; /*Safari3.2+*/
	-o-box-sizing: border-box; /*Opera9.6*/
	-ms-box-sizing: border-box; /*IE8*/
	box-sizing: border-box; 
}

#comments .submit{
	padding:0.6em;
	background-color:#009688;
	color:#FFFFFF;
	border:0px;
	margin-bottom:1em;
	cursor:pointer;
}
#respond h3{
margin-bottom: 1em; padding-top: 1em; font-weight: bold; color: #444;font-size: 1.5rem;
}
.comments-title{
    position: relative;
    padding-bottom: 10px;
    font-size: 18px;
    color: #666;
    border-bottom: 1px solid #f1f1f1;
    margin-top: 20px;
    margin-bottom: 10px;
}
#commentform label{
	padding-bottom:0.5em; 
}
.comment-author .avatar{
	margin-top:1em;
}
.get_article{
	background-color:#FFFFFF;
	-moz-box-sizing: border-box; /*Firefox3.5+*/
	-webkit-box-sizing: border-box; /*Safari3.2+*/
	-o-box-sizing: border-box; /*Opera9.6*/
	-ms-box-sizing: border-box; /*IE8*/
	box-sizing: border-box; 
	margin-top:2em;
}
.get_article h1{
	padding-left:0.8em;
	padding-top:0.5em;
}
.get_article ul{
	margin-bottom:1em;
}
.get_article ul li{
	overflow: hidden;white-space: nowrap;text-overflow: ellipsis;
	padding-left:1.8em;
	-moz-box-sizing: border-box; /*Firefox3.5+*/
	-webkit-box-sizing: border-box; /*Safari3.2+*/
	-o-box-sizing: border-box; /*Opera9.6*/
	-ms-box-sizing: border-box; /*IE8*/
	box-sizing: border-box; 
}
 

/*近期评论*/
.comment{
	white-space:normal;
	width:100%;
	padding: 10px 0 5px;
}
.media:first-child {
    margin-top: 0;
}/*
comments
*/
#comments{
	padding-bottom:50px;
	line-height:1;
}

h3.comments-title:after{
	position:absolute;
	content:'';
	top:29px;
	left:0;
	width:135px;
	height:1px;
	background:#fa2a2a;/*main-color*/
}	
.commentCount{
	color:#fa2a2a;/*main-color*/
}
.commentlist{
	list-style: none;
	margin:10px 0 0;
	padding:0;
}
.commentlist ol{
	list-style: none;
}
.comment{
	padding:10px 0 5px;
}
.comment .media-left{
	display: table-cell;
    vertical-align: top;
    padding-right: 10px;
}
.comment .media-left img{
	border-radius:50%;
}
.comment .media-body{
	display: table-cell;
    vertical-align: top;
}
.comment .media-body .author_name{
	margin-bottom:5px;
	font-size:14px;
	color:#777;
	    display: contents;
}
.comment .media-body p{
	font-size:14px;
	line-height:1.5em;
	color:#777;
}
.comment .media-body p a{
	color:#000;
}
.comment .comment-metadata{
	margin-left:58px;
	padding:5px 0;
}
.comment .comment-metadata span{
	margin-right:15px;
	font-size:13px;
}
.comment .comment-metadata span{
	font-size:12px;
	color:#999;
}
.comment .comment-metadata span.comment-btn-reply a:hover{
	color:#666;
}
.comment .comment-metadata span.comment-btn-reply i{
	color:#d1d1d1;
}
.comment .comment-metadata span.comment-btn-reply a{
	color:#999;
}
.commentlist > .comment{
	border-bottom:1px dotted #d9d9d9;
}
.commentlist .children{
	padding-left:58px;
}
.commentlist .children > .comment{
	border-top:1px dotted #d9d9d9;
}
#reply-title{
	font-size:14px;
	color:#666;
	border-bottom:0;
 
}
#reply-title a:first-child,.warning-text a:first-child{
	display:inline-block;
	margin:0 2px;
	padding:2px 5px;
	background:#fa2a2a;/*main-color*/
	color:#fff;
	font-size:14px;
}
#reply-title #cancel-comment-reply-link{
	background:#fff;
	color:#999;
}
#reply-title #cancel-comment-reply-link:hover{
	text-decoration:underline;
}
.warning-text{
	color:#999;
}
.link-logout{
	color:#999;
}
.comment-navigation{
	width:100%;
	margin:0 auto;
	padding:15px 0;
	text-align: center;
}
.comment-navigation .page-numbers{
	display:inline-block;
	padding:9px 16px;
	color:#999;
	background:#f1f1f1;
}
.comment-navigation .page-numbers:hover{
	background:#e8e8e8;
	color:#666;
}
.comment-navigation .current,
.comment-navigation .current:hover{
	background:#fa2a2a;/*main-color*/
	color:#fff;
}
textarea#comment{
	display: block;
    width: 100%;
	margin-bottom:10px;
	background:#f5f5f5;
	color:#777;
	border:0;
	box-shadow:none;
	height:90px;
	padding:10px;
	resize:none;
	border-radius:5px;
	transition:background .3s;
}
textarea#comment:focus{
	background:#e9e9e9;
}
.commentform-info{
	float:left;
}
.commentform-info input{
	margin-right:10px;
	width:230px;
	border:0;
	border-radius:0;
	box-shadow:none;
	background:#f5f5f5;
	font-weight:normal;
	transition:background .5s;
}
.commentform-info input:focus{
	box-shadow:none;
	color:#fff!important;
	background:#fa2a2a/*main-color*/
}
.commentform-info input:focus:-moz-input-placeholder {
    color: #fff;
}
.commentform-info input:focus::-moz-input-placeholder {
    color: #fff;
}
.commentform-info input:focus::-webkit-input-placeholder {
    color: #fff;
}
.commentform-info input:focus:-ms-input-placeholder {
    color: #fff;
}
.commentBtn .btn{
	padding:8px 0;
	width:140px!important;
	text-align: center;
	background:#fa2a2a;/*main-color*/
	border:0;
}
.commentBtn .btn:hover{
	opacity:0.8;
}
input#submit{color: #fff;}
.comment-avatar img{
	border-radius:50%;
}
.comment .comment-author{
	padding-left:1em;
	padding-right:1em;
	font-weight:bold;
	margin-bottom:-1.5em;
}
.comment .comment-link{
	width:75%;
	float:right;
}
.comment .comment-excerpt{
	clear:both;
	display: block;
	
	border:1px solid #dddddd;
	background-color:#fafafa;
	border-radius:4px;
	padding-left:0.5em;
	padding-right:0.5em;
	margin-top:1em;
	white-space:normal;
	word-wrap:break-word
}
.decent-comments li{
	margin-bottom:1.6em;
}
#comments .reply a{
	color:#01AAED;
}

</style>
