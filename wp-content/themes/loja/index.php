<?php get_header(); 

 do_shortcode('[cb_template page="banner-home"]');
 do_shortcode('[cb_template page="produto-destaque"]');
?>

<!--BANNER-->
<div class="banner-fixo product_simple">    
    
         <div class="destaque_banner col-xs-12 col-sm-6 col-md-6"  style="padding:0;background:url('<?php echo bloginfo('template_url');?>/assets/image/banner_escritorio.jpg') no-repeat;background-position: center center;background-size: cover;"> 
               <div style="background:url('<?php echo bloginfo('template_url');?>/assets/image/orange_px.png');width:300px;height:auto;padding:40px 20px;position:absolute;top:50px;">
               <h2 style="padding:0;margin:0;color:#FFF;">Tudo para o seu escritório</h2>
               </div>
         </div>
         <div class="info_banner col-xs-12 col-sm-6 col-md-6"> 
             <div>                 
                    <?php for($x =0;$x < 6;$x++){?>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 item-produto">
                    <?php do_shortcode('[cb_template page="produto"]');?>
                    </div>
                    <?php } ?>
             </div>
         </div>
</div>


<!--DESTAQUE-->
<div class="produtos-destaques sectionitem">
     
     <div class="container">
         
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <h2 class="titulo_laranja">Mais ofertas</h2>    <br>
         </div>
         
         
         <?php for($x =0;$x < 3;$x++){?>
         <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item-produto">
         <?php do_shortcode('[cb_template page="ofertas"]');?>
         </div>
         <?php } ?>
     </div>
     
</div>

<!--BANNER-->
<div class="banner-fixo product_simple">    
    
         <div class="destaque_banner col-xs-12 col-sm-6 col-md-6"  style="padding:0;background:url('<?php echo bloginfo('template_url');?>/assets/image/banner_escritorio.jpg') no-repeat;background-position: center center;background-size: cover;"> 
               <div style="background:url('<?php echo bloginfo('template_url');?>/assets/image/orange_px.png');width:300px;height:auto;padding:40px 20px;position:absolute;top:50px;">
               <h2 style="padding:0;margin:0;color:#FFF;">Tudo para o seu escritório</h2>
               </div>
         </div>
         <div class="info_banner col-xs-12 col-sm-6 col-md-6"> 
             <div>                 
                    <?php for($x =0;$x < 6;$x++){?>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 item-produto">
                    <?php do_shortcode('[cb_template page="produto"]');?>
                    </div>
                    <?php } ?>
             </div>
         </div>
</div>


<div class="produtos-lista sectionitem">
     
     <div class="container">
           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <h2 class="titulo_laranja">Mais produtos</h2>    <br>
         </div>
         
          <?php for($x =0;$x < 8;$x++){?>
         <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 item-produto">
          <?php do_shortcode('[cb_template page="produto"]');?>
         </div>
         <?php } ?>
     </div>
</div>
<?php get_footer(); ?>