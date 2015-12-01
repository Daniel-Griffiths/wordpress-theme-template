<?php
/*
|-------------------------------------------------------
| Theme Shortcodes
|-------------------------------------------------------
*/

/*
|-------------------------------------------------------
| Post Box
|-------------------------------------------------------
|
| Displays a defined amount of posts and outputs the
| result as boxes, this includes a link to the
| post as well as any featured images.
|
| Usage:- [post-box amount="3"]
|
*/

function postBox( $atts ) {
	/* get amount paramter from the shortcode */
	$atts = shortcode_atts(
		array(
			'amount' => '1',
		), $atts 
	);
  
    $the_query = new WP_Query('posts_per_page='. $atts['amount'] .'&post_type=post&orderby=date');
    
    while ($the_query -> have_posts()){
    	$the_query -> the_post();
    	$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));

    	$output .= '
		<a class="post-box" href="' . get_the_permalink() . '" style="background-image: url(' . $image . ');">
			<h3>' . get_the_title() . '</h3>
		</a>';
	}

    return $output;
}

add_shortcode('post-box', 'postBox');
