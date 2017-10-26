  <div id="footer" class="sectionitem">
      
      <div class="container">
          
          <div class="col-xs-10 col-sm-10 col-md-8 col-lg-8 hidden-xs">
              <label for="">Assine a nossa newsletter e fique por dentro das novidades e ofertas.</label>
               <input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">                               
          </div>
          
          <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 hidden-xs" style="padding-left:0;">              
              <button type="button" class="btn btn-danger" style="margin-top: 30px;">Enviar</button>
              
          </div>
          
          <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
              <div class="">
                 <label for="">Redes sociais</label>
                 <ul class="list-inline">
                     <li>
                     <img src="<?php echo bloginfo('template_url');?>/assets/image/facebook.png" class="img-responsive" alt="Image">
                     </li>
                     <li>
                    <img src="<?php echo bloginfo('template_url');?>/assets/image/twitter.png" class="img-responsive" alt="Image">
                      </li>
                     <li>
                         <img src="<?php echo bloginfo('template_url');?>/assets/image/instagram.png" class="img-responsive" alt="Image">
                     </li>
                 </ul>
                 </div>
          </div>

<div style="width:100%;margin-top:30px;float:left;">
        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
              <ul class="list-footer">
                     <li><strong>Loja</strong></li>
                     <li>Fale Conosco </li>
                     <li>Política de privacidade</li>
                     <li>Termos e condições de uso</li>
                 </ul>
          </div>

          <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
              <ul class="list-footer">
                     <li><strong>Categorias</strong></li>
                     <li>Embalagem</li>
                     <li>Escritório</li>
                     <li>Gastronomia</li>
                     <li>Kits</li>
                 </ul>
          </div>

          <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
              <ul class="list-footer">
                     <li>&nbsp;</li>
                     <li>Lazer</li>
                     <li>Tecnologia</li>
                     <li>Vestuário</li>
                     <li>Viagem</li>
                 </ul>
          </div>

           <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
              <ul class="list-footer">
                   <li><strong>Atendimento</strong></li>
                     <li style="font-size:12px;">Disponível de segunda asexta-feira das 9h as 18h.</li>
                     <li style="font-size:18px;font-weight:bold;">(11) 5555-5555</li>
                     <li style="font-size:18px;font-weight:bold;">sac@helpshop.com.br</li>                     
                 </ul>
          </div>

           <div class="col-xs-12 col-sm-2 col-md-2 col-lg-4">
              
              <img src="<?php echo bloginfo('template_url');?>/assets/image/logo_footer.png" style="width:100%;max-width:280px;padding:20px;float:right;" alt="Image">
              
          </div>


          

</div>
          
      
          
          
          
      </div>
      
  </div>
  
  <?php wp_footer(); ?>
   <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="<?php echo bloginfo('template_url');?>/assets/js/swiper.jquery.min.js"></script>
        <script src="<?php echo bloginfo('template_url');?>/assets/js/swiper.min.js"></script>

        <script>
    $(document).ready(function () {
    //initialize swiper when document ready  
    var mySwiper = new Swiper ('.swiper-container', {    
        pagination: '.swiper-pagination',
        paginationClickable:true,
        progress:true,          
        autoplay: 4000,        
        loop: false,
        speed: 2000,
        onTransitionStart(swiper) {
           $(".itemslide").addClass('hidden');
           console.log(swiper.activeIndex);
            $("#slide"+swiper.activeIndex).removeClass('hidden').fadeIn(500);
            
       
       }
    });

      var galeria_container = new Swiper ('.galeria-container', {    
        pagination: '.swiper-pagination',
        paginationClickable:true,
        progress:true,          
        autoplay: 0,        
           nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
        loop: false,
        speed: 2000 
    });


/*mini carrinho*/
      $(".openminicart").on('click',function(){
          $('#mini-cart').fadeIn(500);
      });
    
        $("#mini-cart").on('mouseleave','.panel',function(){
            $('#mini-cart').fadeOut(0);
        });

         $(".closedminicart").on('click',function(){
          $('#mini-cart').fadeOut(0);
      });

    /*mega menu*/
      $(".openmegamenu").on('mouseover',function(){
          $('#megamenu').slideDown(500);
      });

         $("#megamenu").on('mouseleave',function(){
            $('#megamenu').slideUp(200);
        });

          
      
  });
    </script>
    </body>
</html>