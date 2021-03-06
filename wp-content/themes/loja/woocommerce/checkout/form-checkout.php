<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
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
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

?>
<div class="container sectionitem" style="padding:0px;">
   
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <h2 class="titulo_laranja"><img src="<?php echo bloginfo('template_url');?>/assets/image/cart.png" class="" alt="Image" style="height:25px;margin-right:8px;float:left;">Checkout</h2>    
   </div>
                    
</div>

<div class="container sectionitem">

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div style="width:100%;background:#FFF;padding:20px 0 0;float: left;">
                            <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

                        
                                    <div class="col-sm-12">
                                            <?php do_action( 'woocommerce_checkout_billing' ); ?>
                                    </div>

                                    <div class="col-sm-12">
                                            <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                                    </div>
                            

                            <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
                    </div>
                </div>
	<?php endif; ?>

     <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div style="width:100%;background:#FFF;padding:20px 0;">
            
            <h2 class="titulo_laranja" style="margin:0;padding: 0 20px;">Pagamento</h2><hr>

	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
        </div>
     </div>
</form>
</div>
<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
