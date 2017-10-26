<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */
if (!defined('ABSPATH')) {
    exit;
}

if ($related_products) :
    ?>




    <!--DESTAQUE-->
    <div class="produtos-destaques sectionitem" style="width:100%;float:left;padding:40px 0;">

        <div class="container">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <h2 class="titulo_laranja">Veja também</h2>    <br>
            </div>


            <?php woocommerce_product_loop_start(); ?>

            <?php foreach ($related_products as $related_product) : ?>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item-produto">
               <?php
                $post_object = get_post($related_product->get_id());

                setup_postdata($GLOBALS['post'] = & $post_object);

                wc_get_template_part('content', 'product');
                ?>
                </div>
            <?php endforeach; ?>
                

            <?php woocommerce_product_loop_end(); ?>
        </div>

    </div>


    <section class="related products hidden">

        <h2></h2>

        <?php woocommerce_product_loop_start(); ?>

        <?php foreach ($related_products as $related_product) : ?>

            <?php
            $post_object = get_post($related_product->get_id());

            setup_postdata($GLOBALS['post'] = & $post_object);

            wc_get_template_part('content', 'product');
            ?>

        <?php endforeach; ?>

    <?php woocommerce_product_loop_end(); ?>

    </section>

<?php
endif;

wp_reset_postdata();
