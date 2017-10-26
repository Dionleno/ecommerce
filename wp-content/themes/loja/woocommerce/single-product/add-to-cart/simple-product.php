<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
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
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product );

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" method="post" enctype='multipart/form-data'>
		<?php
			/**
			 * @since 2.1.0.
			 */
			do_action( 'woocommerce_before_add_to_cart_button' );

			/**
			 * @since 3.0.0.
			 */
                     
                        ?> 
            <div class="box-quantidade" style="display:inline-block;">
                         <label for="">Quantidade</label>
                     <div class="inner-addon right-addon">
                        <i class="fa fa-refresh" aria-hidden="true" style="font-size:18px;color:#aaaaaa;top: 4px;"></i>
                        <input id="" class="form-control form-quantidade" step="1" min="1" max="" name="quantity" value="1" title="Qtd" type="text" placeholder="100">
                    </div>
                                                   
                    </div>
                                
                          
               
                         <?php			 

			 
                        
		?>
		
                  <div style="display:inline-block;">
                      <button type="submit" class="btn btn-default btn-block" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" ><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
                 </div>
		<?php
			/**
			 * @since 2.1.0.
			 */
			do_action( 'woocommerce_after_add_to_cart_button' );
		?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
