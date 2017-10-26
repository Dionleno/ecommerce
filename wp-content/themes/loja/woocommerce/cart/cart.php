<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>
<div class="container sectionitem" style="padding:0px;">
   
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <h2 class="titulo_laranja"><img src="<?php echo bloginfo('template_url');?>/assets/image/cart.png" class="" alt="Image" style="height:25px;margin-right:8px;float:left;">Meu Carrinho</h2>    
   </div>
                    
</div>








<div class="container sectionitem">
    <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>
     <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
         <div style="width:100%;background:#FFF;padding:20px 0 0;">
             <?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
               <div class="media">
                   <?php
                        $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                        if ( ! $product_permalink ) {
                                echo $thumbnail;
                        } else {
                                printf( '<a href="%s" class="col-xs-12 col-sm-2 col-md-2 col-lg-1">%s</a>', esc_url( $product_permalink ), $thumbnail );
                        }
                ?>
              

                  
                  <div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
                      <h4 class="media-heading">
                          <?php
                          if ( ! $product_permalink ) {
                                    echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
                            } else {
                                    echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
                            }
                          ?>
                      </h4>
                         <p style="color:#777777;"><?= $cart_item['quantity']; ?> x 
                                                          <?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							?></p>
                  </div>
                  
                   
                   <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                        <label for="input" class="col-xs-2 col-sm-3 control-label" style="padding-top: 9px;">
                             
                            <?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="fa fa-times-circle-o" aria-hidden="true" style="font-size:25px;color:#aaaaaa;"></i></a>',
									esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
									__( 'Remove this item', 'woocommerce' ),
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
							?>
                            
                            
                        </label>
                        <div class="col-xs-10 col-sm-9">
                           <?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
								} else {
									$product_quantity = woocommerce_quantity_input( array(
										'input_name'  => "cart[{$cart_item_key}][qty]",
										'input_value' => $cart_item['quantity'],
										'max_value'   => $_product->get_max_purchase_quantity(),
										'min_value'   => '0',
									), $_product, false );
								}

								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
							?>
                          <strong style="margin-top:-15px;display:block;"><?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
							?></strong>
                        </div>
                    </div>
                   </div>
                   
             </div>
             <?php
				}
			}
			?>
          <?php do_action( 'woocommerce_cart_contents' ); ?>
         </div>
         
         <div class="col-sm-12" style="margin: 10px auto;">
             
             	<?php if ( wc_coupons_enabled() ) { ?>
                                              <div class="coupon" style="float: left;">							
                                                        <input type="text" name="coupon_code" style="width: 150px;float:left;margin-right: 10px;" class="form-control" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> 
                                                        <input type="submit" class="btn btn-default" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>" />
							<?php do_action( 'woocommerce_cart_coupon' ); ?>
						</div>
					<?php } ?>

					<input type="submit" class="button pull-right" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>" />

					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart' ); ?>
         </div>
				
				 
     </div>
    
    <?php do_action( 'woocommerce_after_cart_contents' ); ?>
    </form>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div style="width:100%;background:#FFF;padding:20px 0;">
                                   
                 <?php
		/**
		 * woocommerce_cart_collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
	 	do_action( 'woocommerce_cart_collaterals' );
	?>
        </div>
    </div>
    <?php do_action( 'woocommerce_after_cart' ); ?>
    
</div>





 