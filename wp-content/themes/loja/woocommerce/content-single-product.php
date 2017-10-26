<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	  
?>

<div class="banner-produto-top" style="background:url('<?php echo bloginfo('template_url');?>/assets/image/banner_top.jpg') no-repeat;background-size:cover;padding-bottom:30px;">
        <div style="background:url('<?php echo bloginfo('template_url');?>/assets/image/orange_px.png');min-width:300px;width:30%;max-width:450px; height:auto;padding:40px 20px;position:absolute;top:50px;color:#FFF;">                        
            <?php the_title( '<h1 class="titulos-thema">', '</h1>' ); ?>
        </div>
    </div>


 <div class="container sectionitem">
        <div class="banner-fixo">
            <div class="destaque_banner col-xs-12 col-sm-6 col-md-6">

                <!-- Slider main container -->
                <div class="galeria-container" style="width: 94%;height: 100%;position:absolute;margin-left: auto;margin-right: auto;overflow: hidden;z-index: 1;">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <?php
                          
                            do_action( 'woocommerce_before_single_product_summary' );
                    ?>
                    
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination-white swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev swiper-button-white "></div>
                    <div class="swiper-button-next swiper-button-white "></div>

                    <!-- If we need scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>

            </div>
	

	<div class="info_banner col-xs-12 col-sm-5 col-md-4" style="background:#FFF;">

		<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>

	</div><!-- .summary -->
 </div>
 </div>


<div class="banner-produto-meddle sectionitem" style="background:url('<?php echo bloginfo('template_url');?>/assets/image/banner_centro.jpg') no-repeat;background-size:cover;">
        <div style="background:url('<?php echo bloginfo('template_url');?>/assets/image/orange_px.png');min-width:300px;width:40%;max-width:550px; height:auto;padding:40px 20px;position:absolute;top:50px;">
            <div style="padding:0;margin:0;color:#FFF;">                  
                    <?php the_title( '<h1 class="titulos-thema">', '</h1>' ); ?><br/>
                    
                <p style="font-size:16px;"><?= get_the_excerpt(); ?></p>

            </div>
        </div>
    </div>



	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>
       
<div class="sectionitem" style="width:100%;float:left;background:url('<?php echo bloginfo('template_url');?>/assets/image/banner_footer.jpg') no-repeat;background-size:cover;">
    <div class="container">
        <div class="banner-fixo">

            <div class="destaque_banner col-xs-12 col-sm-6 col-md-6">

                
            </div>

            <div class="info_banner col-xs-12 col-sm-5 col-md-4" style="background:#FFF;">
                
		<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>


            </div>
        </div>

    </div>
</div>



	<?php		 
		do_action( 'woocommerce_produtos_relacionados' );
	?>
       



<?php do_action( 'woocommerce_after_single_product' ); ?>
