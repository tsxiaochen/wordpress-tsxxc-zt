<?php if (is_home()) { ?>
<title><?php
  if (sc_tsxcc('ts_title')) {
    echo ''.sc_tsxcc('ts_title').'';
  } else  {
    echo ''.bloginfo('name').'';
  } 
  ?><?php
  if (sc_tsxcc('ts_lianjiefu')) {
    echo ''.sc_tsxcc('ts_lianjiefu').'';
  } else  {
    echo '';
  } 
  ?><?php echo sc_tsxcc( 'ts_fubiaoti'); ?></title>
<?php } else if (is_single() || is_page()) { ?>
<title><?php the_title(); ?><?php
  if (sc_tsxcc('ts_lianjiefu')) {
    echo ''.sc_tsxcc('ts_lianjiefu').'';
  } else  {
    echo '_';
  } 
  ?><?php
  if (sc_tsxcc('ts_title')) {
    echo ''.sc_tsxcc('ts_title').'';
  } else  {
    echo ''.bloginfo('name').'';
  } 
  ?><?php
  if (sc_tsxcc('ts_lianjiefu')) {
    echo ''.sc_tsxcc('ts_lianjiefu').'';
  } else  {
    echo '';
  } 
  ?><?php echo sc_tsxcc( 'ts_fubiaoti'); ?></title>
<?php } else if (is_category()) { ?>
<title><?php echo get_cat_name(get_current_category_id());?><?php  
if (sc_tsxcc('ts_lianjiefu')) { echo ''.sc_tsxcc('ts_lianjiefu').'';  } else  {
    echo '-';
  }   ?><?php
  if (sc_tsxcc('ts_title')) {
    echo ''.sc_tsxcc('ts_title').'';
  } else  {
    echo ''.bloginfo('name').'';
  } 
  ?></title>
<?php } else if (is_tag()) { ?>
<?php } else { ?> <title><?php echo ''.bloginfo('name').'' ?></title><?php } ?>
<?php if (is_home()) : ?>
<meta name="description" content="<?php $content = get_the_content();$trimmed_content = wp_trim_words( $content, 50, '' );echo $trimmed_content;?>" />
<meta name="keywords" content="<?php echo sc_tsxcc('ts_guanjianci'); ?>" />
<?php endif; ?>
<?php if (is_single()) : while (have_posts()) : the_post(); ?>
<meta name="keywords" content="<?php
    $single_seo_keywords = get_post_meta($post->ID, "seo_keywords", true);
    if ($single_seo_keywords != null && !empty(trim($single_seo_keywords))) {
        echo trim($single_seo_keywords);
    } else {
        $tags_list = get_the_tags();
        if ($tags_list != null && count($tags_list) > 0) {
            $tags_str = "";
            foreach (get_the_tags() as $tag_item) {
                $tags_str .= $tag_item->name . ',';
            };
            $tags_str = substr($tags_str, 0, strlen($tags_str) - 1);
            echo $tags_str;
        }
    }
    ?>"/>
<meta name="description" content="<?php
    $single_seo_desc = get_post_meta($post->ID, "seo_desc", true);
    if ($single_seo_desc != null && !empty(trim($single_seo_desc))) {
        echo trim($single_seo_desc);
    } else {
        echo wp_trim_words(do_shortcode(get_the_content($post->ID)), 147, '...');
    }
    ?>"/>
<?php endwhile; endif; ?>
<?php if (is_category()) : ?>
    <?php
    $cat_seo_root_obj = get_category($cat);
    $cat_seo_keywords = get_option("seo-cat-keywords-" . $cat);
    if (!empty(trim($cat_seo_keywords))) {
echo '<meta name="keywords" content="' . $cat_seo_keywords . '"/>';
    } else {
echo '<meta name="keywords" content="' . $cat_seo_root_obj->name . '"/>';
    }
    $cat_seo_desc = get_option("seo-cat-desc-" . $cat);
    
    if (!empty(trim($cat_seo_desc))) {
echo '<meta name="description" content="' . $cat_seo_desc . '"/>';
    } else {
echo '<meta name="description" content="' . $cat_seo_root_obj->name . '"/>';
    }
    ?>
<?php endif; ?>
<?php
if(is_home()){
echo '<link rel="canonical" href="'.home_url().'">';
}else{
echo '<link rel="canonical" href="'.get_permalink().'">';
}
?>

<link rel="shortcut icon" href="<?php  if (sc_tsxcc('ts_ico')) {    echo ''.sc_tsxcc('ts_ico').'';  } else  {   echo ''.bloginfo('template_directory').'/favicon.ico';  } ?>">