<?php
/**
 * Shipping Methods Display
 *
 * In 2.1 we show methods per package. This allows for multiple methods per order if so desired.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-shipping.php.
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
 * @version     3.2.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div style="padding:0 20px;">
   <?php if ( ! empty( $show_shipping_calculator ) ) : ?>
			<?php woocommerce_shipping_calculator(); ?>
		<?php endif; ?>
    
</div>
<?php if ( 1 < count( $available_methods ) ) : ?>





        <?php foreach ( $available_methods as $method ) : ?>
                    <tr>
                              <td style="padding: 0 0 0 20px;">
                              <div class="radio" style="padding: 0;">
                                <?php
                                printf( '<input type="radio" name="shipping_method[%1$d]" style="margin-left: 0;" data-index="%1$d" id="shipping_method_%1$d_%2$s" value="%3$s" class="shipping_method" %4$s />
                                                              <label for="shipping_method_%1$d_%2$s" style="color:#f47920;font-weight:bold;">%5$s</label>',
                                                              $index, sanitize_title( $method->id ), esc_attr( $method->id ), checked( $method->id, $chosen_method, false ), $method->get_label() );

                                                      do_action( 'woocommerce_after_shipping_rate', $method, $index );
                                ?>
                              </div>
                               </td>                              
                              <td style="vertical-align: middle;text-align: right;padding: 0 20px 0 0;"><strong><?= wc_price( $method->cost ); ?></strong></td>
                          </tr>

           <?php endforeach; ?>         
    <?php elseif ( 1 === count( $available_methods ) ) :  ?>
                          <tr>
                              <td style="padding: 0 0 0 20px;">
                              <div class="radio" style="padding: 0;">
                                <?php
                                $method = current( $available_methods );
				printf( '<label for="shipping_method_%1$d_%2$s" style="color:#f47920;font-weight:bold;padding-left: 0;">%3$s</label> <input type="hidden" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d" value="%2$s" class="shipping_method" />', $index, esc_attr( $method->id ), $method->get_label() );
				do_action( 'woocommerce_after_shipping_rate', $method, $index );
                                 
                                ?>
                              </div>
                               </td>                              
                              <td style="vertical-align: middle;text-align: right;padding: 0 20px 0 0;"><strong><?= wc_price( $method->cost ); ?></strong></td>
                          </tr>
			         
         <?php elseif ( WC()->customer->has_calculated_shipping() ) : ?>
			<?php echo apply_filters( is_cart() ? 'woocommerce_cart_no_shipping_available_html' : 'woocommerce_no_shipping_available_html', wpautop( __( 'There are no shipping methods available. Please ensure that your address has been entered correctly, or contact us if you need any help.', 'woocommerce' ) ) ); ?>
		<?php elseif ( ! is_cart() ) : ?>
			<?php echo wpautop( __( 'Enter your full address to see shipping costs.', 'woocommerce' ) ); ?>
		<?php endif; ?>

		<?php if ( $show_package_details ) : ?>
			<?php echo '<p class="woocommerce-shipping-contents"><small>' . esc_html( $package_details ) . '</small></p>'; ?>
		<?php endif; ?>
         
