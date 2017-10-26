<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*REMOVER CATEGORIAS DO PRODUTO*/
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta',40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt',20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price',10);
/*REMOVE TITULO e hooks pagina de Categoria  */
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title',10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash',10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count',20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering',30);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart',10);

remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display',15);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products',20);

add_action('woocommerce_produtos_relacionados','woocommerce_output_related_products',20);

add_action('woocommerce_after_shop_loop_item','woocommerce_template_single_product_add_to_cart',10);




add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt',10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price',20);



function woocommerce_template_single_product_add_to_cart(){
     global $product;
    wc_get_template( 'single-product/add-to-cart/simple-product.php' );
}

function woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 825, 510, true );
}
 


include(TEMPLATEPATH . '/theme/wp-bootstrap-navwalker.php');
include(TEMPLATEPATH . '/theme/theme.php');
include(TEMPLATEPATH . '/theme/inc/produtos.php');
 add_action( 'after_setup_theme', 'woocommerce_support' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="mainew">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}
   


function register_my_menu() {
    register_nav_menu('header-menu', __('Header Menu'));
}

add_action('init', 'register_my_menu');

function twentyfifteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'twentyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );



function sv_change_product_price_display( $price,$product ) {
    
 if ( $product->price > 0 ) {
      if ( $product->price && isset( $product->regular_price ) ) {
        $from = $product->regular_price;
        $to = $product->price;
         
        return '<span>De '. ( ( is_numeric( $from ) ) ? woocommerce_price( $from ) : $from ) .'/un.</span><br/><span class="value_price"><strong>Por '.( ( is_numeric( $to ) ) ? woocommerce_price( $to ) : $to ) .'/un.</strong></span><br/>';
      } else {
        $to = $product->price;
        return '<span class="value_price"><strong>Por '.( ( is_numeric( $to ) ) ? woocommerce_price( $to ) : $to ) .'/un.</strong></span><br/>';
      }
   } else {
     return '<div class="live-colst">0 Our Price</div>';
   }
}
add_filter( 'woocommerce_get_price_html', 'sv_change_product_price_display' ,100, 2);
//add_filter( 'woocommerce_cart_item_price', 'sv_change_product_price_display' );

/**
 * Validate the extra register fields.
 *
 * @param  string $username          Current username.
 * @param  string $email             Current email.
 * @param  object $validation_errors WP_Error object.
 *
 * @return void
 */
function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
        $validation_errors->add( 'billing_first_name_error', __( 'Nombre es un campo requerido.', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
        $validation_errors->add( 'billing_last_name_error', __( 'Apellidos es un campo requerido.', 'woocommerce' ) );
    }

    if ( isset( $_POST['email'] ) && empty( $_POST['email'] ) ) {
        $validation_errors->add( 'email_error', __( 'Campo email obrigatório!', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_phone'] ) && empty( $_POST['billing_phone'] ) ) {
        $validation_errors->add( 'billing_phone_error', __( 'Teléfono es un campo requerido.', 'woocommerce' ) );
    }
    
    if ( isset( $_POST['billing_company'] ) && empty( $_POST['billing_company'] ) ) {
        $validation_errors->add( 'billing_company_error', __( 'Campo empresa obrigatório!', 'woocommerce' ) );
    }        

    if ( isset( $_POST['billing_address_1'] ) && empty( $_POST['billing_address_1'] ) ) {
        $validation_errors->add( 'billing_address_1_error', __( 'Dirección es un campo requerido.', 'woocommerce' ) );
    }
 
    if ( isset( $_POST['billing_city'] ) && empty( $_POST['billing_city'] ) ) {
        $validation_errors->add( 'billing_city_error', __( 'Localidad / Ciudad es un campo requerido.', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_state'] ) && empty( $_POST['billing_state'] ) ) {
        $validation_errors->add( 'billing_state_error', __( 'Provincia es un campo requerido.', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_postcode'] ) && empty( $_POST['billing_postcode'] ) ) {
        $validation_errors->add( 'billing_postcode_error', __( 'Código postal / Zip es un campo requerido.', 'woocommerce' ) );
    }
    
}
/**
 * Save the extra register fields.
 *
 * @param  int  $customer_id Current customer ID.
 *
 * @return void
 */
function wooc_save_extra_register_fields( $customer_id ) {
    if ( isset( $_POST['username'] ) ) {
        // WordPress default first name field.
        update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['username'] ) );

        // WooCommerce billing first name.
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['username'] ) );
    }

    if ( isset( $_POST['billing_last_name'] ) ) {
        // WordPress default last name field.
        update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );

        // WooCommerce billing last name.
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
    }
     
    if ( isset( $_POST['billing_phone'] ) ) {
        // WooCommerce billing phone
        update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
    }

     if ( isset( $_POST['billing_company'] ) ) {
        // WooCommerce billing address
        update_user_meta( $customer_id, 'billing_company', sanitize_text_field( $_POST['billing_company'] ) );
    }

    
    if ( isset( $_POST['billing_address_1'] ) ) {
        // WooCommerce billing address
        update_user_meta( $customer_id, 'billing_address_1', sanitize_text_field( $_POST['billing_address_1'] ) );
    }

    if ( isset( $_POST['billing_postcode'] ) ) {
        // WooCommerce billing postcode
        update_user_meta( $customer_id, 'billing_postcode', sanitize_text_field( $_POST['billing_postcode'] ) );
    }

    if ( isset( $_POST['billing_city'] ) ) {
        // WooCommerce billing city
        update_user_meta( $customer_id, 'billing_city', sanitize_text_field( $_POST['billing_city'] ) );
    }

    if ( isset( $_POST['billing_state'] ) ) {
        // WooCommerce billing state
        update_user_meta( $customer_id, 'billing_state', sanitize_text_field( $_POST['billing_state'] ) );
    }
}

add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );

add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );


add_filter('woocommerce_login_redirect', 'wc_login_redirect');
 
function wc_login_redirect( $redirect_to ) {
     $redirect_to = site_url('my-account');
     return $redirect_to;
}

function custom_registration_redirect() {
    wp_logout();
    return site_url('my-account');
}
add_action('woocommerce_registration_redirect', 'custom_registration_redirect', 2);

add_action('wp_logout','logout_redirect');

function logout_redirect(){

    wp_redirect( home_url() );
    
    exit;

}

function wpse_131562_redirect() {
    if (! is_user_logged_in() && !is_page('login')) {
        // feel free to customize the following line to suit your needs
        wp_redirect( home_url() );
        exit;
    }
}
add_action('template_redirectx', 'wpse_131562_redirect');

add_action('wp_add_cart_in_menu', 'add_cart_in_menu', 10, 2);

function add_cart_in_menu() {

    global $woocommerce;

    // get cart quantity
    $qty = $woocommerce->cart->get_cart();

    // get cart total
    $total = $woocommerce->cart->get_cart_total();

    // get cart url
    $cart_url = $woocommerce->cart->get_cart_url();

    // if multiple products in cart

    echo '<span style="line-height:4px;position: absolute;color: #f47920;font-weight: bold;font-size: 16px;">'.count($qty).'</span>';
}

add_action( 'wp_ajax_calculo_valor_item', 'calculo_valor_item' );
add_action( 'wp_ajax_nopriv_calculo_valor_item', 'calculo_valor_item'); 
function calculo_valor_item(){
    global $woocommerce;
    return wc_price('20');
}