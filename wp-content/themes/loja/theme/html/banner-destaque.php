<?php do_action('bmg_before_banner_fixo_destaque'); ?>
<!--BANNER-->
<div class="banner-fixo">    
    <?php
    $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID() ), 'shop_single' );
    if(!empty($image)){
        $thumb = $image[0];
    }else{
        $thumb = get_bloginfo('template_url').'/assets/image/banner.jpg';
    }
    ?>
         <div class="destaque_banner col-xs-12 col-sm-6 col-md-7"  style="background:url('<?php echo $thumb;?>') no-repeat;background-position: center center;background-size: cover;"> </div>
         <div class="info_banner col-xs-12 col-sm-6 col-md-5"> 
             <?php do_action( 'woocommerce_single_product_summary' ); ?>
             
         </div>
</div>
<?php do_action('bmg_after_banner_fixo_destaque'); ?>