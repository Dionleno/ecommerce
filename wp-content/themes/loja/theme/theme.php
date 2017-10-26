<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function fn_template($atts) {
    $atts = shortcode_atts(array(
        'page' => '',
        'directory' => 'theme/html/',
        'categoria' => '*'
         ), $atts, 'fn_template');

     
    include( locate_template($atts['directory'] . $atts['page'] . '.php', false, false) );
}

add_shortcode('cb_template', 'fn_template');