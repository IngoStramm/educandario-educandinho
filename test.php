<?php

add_action('wp_head', 'edu_add_shortcode');

function edu_add_shortcode()
{
    echo do_shortcode('[edu_post_date_filter]');
}
