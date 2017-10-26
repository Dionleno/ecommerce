<?php do_action('template_redirectx'); ?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Title Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Bootstrap CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_url');?>/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_url');?>/assets/css/fonts.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_url');?>/assets/css/header.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_url');?>/assets/css/single.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_url');?>/assets/css/swiper.min.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_url');?>/assets/css/categoria.css" rel="stylesheet">
<?php wp_head(); ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>

    <!-- Header topo -->
    <div id="header-top" class="hidden-xs">

        <div class="container">

            <ul class="list-inline pull-right">
                <li class=""><span>Atendimento</span></li>
                <li class="">Telefone: <span>(11) 5555-5555</span></li>
                <li class="">E-mail: <span>sac@helpshop.com.br</span></li>
                <li class="">Disponivel de segunda a sexta das 9h as 18h</li>
            </ul>

        </div>

    </div>

    <!-- Header -->
    <div id="header">

        <div class="container" style="position: relative;">
            <div class="pull-left">

                <img src="<?php echo bloginfo('template_url');?>/assets/image/logo.png" class="img-responsive logo hidden-xs" alt="Image" style="">

            </div>
            <div class="pull-right">
                <ul class="list-inline pull-right">
                    <li class=""><span class="name_welcome">Olá, <?= esc_html( wp_get_current_user()->display_name ); ?></span></li>
                    <li class="hidden-xs">
                        <div class="inner-addon right-addon">
                            <i class="fa fa-search" aria-hidden="true" style="font-size:24px;"></i>
                            <input type="text" class="form-control form-search" placeholder="Encontre oque você procura" />
                        </div>

                    </li>
                    <li class=""><i class="fa fa-bars openmegamenu" aria-hidden="true" style="cursor:pointer;position: relative;top: 7px;"></i></li>
                    <li class="openminicart" style="position: relative;top: 7px;cursor:pointer;">
                       <?php do_action('wp_add_cart_in_menu');?>
                        <img src="<?php echo bloginfo('template_url');?>/assets/image/cart.png" class="img-responsive" alt="Image" style=""></li>
                </ul>
                <?php do_shortcode('[cb_template page="mini-cart"]');?>
            </div>

        </div>

    </div>


    <!-- Menus -->
    <div id="menu">

        <div class="container">

            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                             <span class="sr-only">Toggle navigation</span>
                             <span class="icon-bar"></span>
                             <span class="icon-bar"></span>
                             <span class="icon-bar"></span>
                         </button>

                    <a class="navbar-brand visible-xs" href="/"><img src="<?php echo bloginfo('template_url');?>/assets/image/logo_mobile.png" class="img-responsive logo" alt="Image" style="height: 50px;"></a>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                   <?php 
                         wp_nav_menu( array(
                                        'menu'              => 'header-menu',
                                        'theme_location'    => 'header-menu',
                                        'depth'             => 0,
                                        'container'         => 'ul',
                                        'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',                                       
                                        'menu_class'        => 'nav navbar-nav',
                                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                        'walker'            => new WP_Bootstrap_Navwalker())
                                    );
                         
                        ?>
                    
                <!-- /.navbar-collapse -->
            </nav>

        </div>


        
             <div id="megamenu" class="hidden-xs hidden-sm" style="display:none;position:absolute;width:100%;background:#FFF;padding:40px 15px;z-index:999;border-bottom: 1px solid #ddd;">
                  <div class="container mega-menu">
                       
                       <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="border-right: 2px solid #f47920;">
                           <strong class="name_welcome">Categoria</strong>
                             <?php 
                         wp_nav_menu( array(
                                        'menu'              => 'header-menu',
                                        'theme_location'    => 'header-menu',
                                        'depth'             => 0,
                                        'container'         => 'ul',
                                        'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',                                       
                                        'menu_class'        => 'nav navbar-nav',
                                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                        'walker'            => new WP_Bootstrap_Navwalker())
                                    );
                         
                        ?>
                            
                            <div class="clearfix">
                            
                            </div>
                            
                            <hr>
                             <div class="inner-addon right-addon">
                            <i class="fa fa-search" aria-hidden="true" style="font-size:24px;color:#00a79e;"></i>
                            <input type="text" class="form-control " placeholder="Encontre oque você procura" style="height:40px;"/>
                        </div>
                            <hr>
                            
                            <button type="button" class="btn btn-default">Ver todos os produtos</button>
                            
                       </div>
                       
                       <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" >
                           <ul class="nav menu-user">
                               <li class="active"><a href="<?= wc_get_cart_url(); ?>" class="name_welcome">Meu carrinho</a></li>
                                <li><a href="#" class="name_welcome">Meu perfil</a></li>
                                <li><a href="#">Favoritos</a></li>
                                <li><a href="#">Minha conta</a></li>
                                <li><a href="#">Meus pedidos</a></li>
                                <li><a href="#">Meus dados</a></li>
                                <li><a href="<?= wc_logout_url(); ?>" class="name_welcome">Sair</a></li>                                
                            </ul>
 
                       </div>
                       <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="border-left: 2px solid #f47920;">
                           <ul class="nav menu-user">                                
                                <li><a href="#" class="name_welcome">Loja</a></li>
                                <li><a href="#">Fale conosco</a></li>
                                <li><a href="#">Politica de privacidade</a></li>
                                <li><a href="#">Termos de uso</a></li>
                                <li><a href="#" class="name_welcome">Atendimento</a></li>
                                <li><a href="#">Disponível de segunda asexta-feira das 9h as 18h.</a></li>
                                 <li style="font-size:18px;font-weight:bold;"><a href="#" class="name_welcome">(11) 5555-5555</a></li>
                                 <li style="font-size:18px;font-weight:bold;"><a href="#" class="name_welcome">sac@helpshop.com.br</a></li>                                 
                            </ul>
                            <br>
                       </div>
                       
                 </div>
             </div>
         

    </div>