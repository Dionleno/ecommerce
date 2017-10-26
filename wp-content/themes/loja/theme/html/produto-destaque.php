<?php
 global $wp_query, $product;
    $categoria = $wp_query->get_queried_object();
    $query_args = array( 'post_status' => 'publish','order'   => 'DESC', 'post_type' => 'product', 'showposts'=>3,'offset'=>1,
                            'tax_query' => array( 
                               array(
                                 'taxonomy' => 'product_cat',
                                 'field' => 'id',
                                 'terms' => $categoria->term_id
                               )));
        $r = new WP_Query($query_args);
        if($r->have_posts()){
            
?>
<!--DESTAQUE-->
<div class="produtos-destaques sectionitem">
     
     <div class="container">
         
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <h2 class="titulo_laranja">Destaques</h2>    <br>
         </div>
         
         
         <?php while (have_posts()) {
             the_post();
                
                 ?>
                     
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item-produto">
                            <?php wc_get_template_part( 'content', 'product' ); ?>
                        </div>
                     <?php
    
         } ?>
         
     </div>
     
</div>
<?php } ?>