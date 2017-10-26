<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
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
        <div class="box-quantidade" <?php if(is_cart()){ echo 'style="margin:0;"'; }?>>
            <?php if(!is_cart()){ ?>
            <label for="">Quantidade</label>
            <?php } ?>
                            <div class="inner-addon right-addon">
                               <i class="fa fa-refresh" aria-hidden="true" style="font-size:18px;color:#aaaaaa;top: 4px;"></i>
                               
                               <input type="text" id="<?php echo esc_attr( $input_id ); ?>" class="form-control form-quantidade" step="<?php echo esc_attr( $step ); ?>" min="<?php echo esc_attr( $min_value ); ?>" max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $input_value ); ?>" title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) ?>" />
                           </div>
                           <br/>                                        

                        </div>
	<?php

