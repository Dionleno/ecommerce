<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
get_header('login');
if(have_posts()):the_post();
    wc_get_template_part( 'myaccount/form-register');
endif;
get_footer('login');