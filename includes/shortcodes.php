<?php
/*
|-------------------------------------------------------
| Theme Shortcodes
|-------------------------------------------------------
*/

/* test shortcode */
function helloWorld()
{
	return 'Hello World!';
}
add_shortcode('hello-world', 'helloWorld');
