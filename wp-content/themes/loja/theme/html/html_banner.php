<?php
  global $wp_query, $product;
?>
<div>                 
                 <h1><?php the_title(); ?></h1>
                 <p><?php the_excerpt(); ?></p><br/>
                 <?php if ( $price_html = $product->get_price_html() ) : ?>
                         <?php echo $price_html; ?>
                <?php endif; ?>
                
                 <span class="text_price">Em até 3x sem juros</span><br/>

                 <?php do_action( 'woocommerce_single_product_summary' ); ?>
                 <div class="box-quantidade">
                     <label for="">Quantidade</label>
                     <div class="inner-addon right-addon">
                        <i class="fa fa-refresh" aria-hidden="true" style="font-size:18px;color:#aaaaaa;top: 4px;"></i>
                        <input type="text" class="form-control form-quantidade"  placeholder="100"/>
                    </div>
                    <br/>                                        
                    
                 </div>
                 <div style="width:150px;">
                     <button type="button" class="btn btn-default btn-block">Comprar</button>
                 </div>
             </div>