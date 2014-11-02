<?php
//TODO: http://codex.wordpress.org/Custom_Headers#Adding_Theme_Support
//TODO: https://make.wordpress.org/themes/2012/04/06/updating-custom-backgrounds-and-custom-headers-for-wordpress-3-4/
add_theme_support( 'custom-header', array(
    'flex-height' => true,
    'height' => 200,
    'flex-width' => true,
    'width' => 1200,
    //'admin-head-callback' => '',
));