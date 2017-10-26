<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

add_action('bmg_before_banner_fixo_destaque','fn_banner_fixo_destaque');
add_action('bmg_after_banner_fixo_destaque','fn_af_banner_fixo_destaque');
function fn_banner_fixo_destaque(){
    global $wp_query, $product;
    $categoria = $wp_query->get_queried_object();
       
         $query_args = array( 'post_status' => 'publish','order'   => 'DESC', 'post_type' => 'product', 'showposts'=>1,
                            'tax_query' => array( 
                               array(
                                 'taxonomy' => 'product_cat',
                                 'field' => 'id',
                                 'terms' => $categoria->term_id
                               )));
  $r = new WP_Query($query_args);
  if($r->have_posts()){
      the_post();
  
}
function fn_af_banner_fixo_destaque(){
     }
     wp_reset_query();
} 
 function my_template_loop_product_title(){
    global $product;
   wc_get_template( 'loop/title.php' );
}
add_action( 'woocommerce_shop_loop_item_title', 'my_template_loop_product_title', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'wctext_prazo', 15 );
add_action('woocommerce_single_product_summary', 'wctext_prazo', 25);


function wctext_prazo(){
    echo ' <span class="text_price">Em até 3x sem juros</span><br/>';
}