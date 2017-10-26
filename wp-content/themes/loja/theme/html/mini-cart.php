
<?php
    global $woocommerce;

    // get cart quantity
    $itens = $woocommerce->cart->get_cart();
    
    
?>


<div id="mini-cart" style="position:absolute;width:100%;max-width:300px;height:auto;right:0;z-index:9999;display:none;">


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="titulo_laranja" style="font-size: 22px;">
                                <img src="<?php echo bloginfo('template_url');?>/assets/image/cart.png" class="" alt="Image" style="height:25px;margin-right:8px;float:left;">Meu
                                Carrinho<div class="pull-right" style="margin-top: -3px;">
                                      <i class="fa fa-times closedminicart"  aria-hidden="true" style="cursor:pointer;font-size:25px;color:#f47920;"></i>
                                </div>
                            </h3>
                            
                        </div>
                        <div class="panel-body" style="padding:0;">
                            
                            
                            <?php if(count($itens) > 0 ): 
                                  foreach ($itens as $cart_item_key => $cart_item) {
                                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                    $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                            $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

                             ?>
                            <div class="media">
                                <?php
                                        $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(array( 50, 50 ) ), $cart_item, $cart_item_key );

                                        if ( ! $product_permalink ) {
                                                echo $thumbnail;
                                        } else {
                                                printf( '<a href="%s" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">%s</a>', esc_url( $product_permalink ), $thumbnail );
                                        }
                                ?>


                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
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


                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="input" class="col-xs-2 col-sm-3 control-label" style="padding: 9px;">
                             
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
                                    </div>
                                </div>

                            </div>
                            <?php
                                    } }
                            else: ?>
                                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                      <h4 class="media-heading" style="margin: 20px 0;">Nenhum item no carrinho.</h4>                                  
                                </div>
                            <?php endif; ?>
                           
                        </div>

                              <div class="panel-footer">
                                  <div style="width:100%;">
                                      <a href="<?= wc_get_cart_url(); ?>" class="btn btn-default btn-block btn-lg">Finalizar compra</a>
                                    </div>
                             </div>
                     


                    </div>
</div>


                
               