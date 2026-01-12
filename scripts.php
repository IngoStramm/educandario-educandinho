<?php

add_action('wp_enqueue_scripts', 'edu_frontend_scripts');

function edu_frontend_scripts()
{

    $min = (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1', '10.0.0.3'))) ? '' : '.min';

    if (empty($min)) :
        wp_enqueue_script('edu-livereload', 'http://localhost:35729/livereload.js?snipver=1', array(), null, true);
    endif;

    wp_register_script('edu-script', EDU_URL . 'assets/js/edu' . $min . '.js', array('jquery'), '1.0.0', true);

    wp_enqueue_script('edu-script');

    wp_localize_script('edu-script', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
    wp_enqueue_style('edu-style', EDU_URL . 'assets/css/edu.css', array(), false, 'all');
}
