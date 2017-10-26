<?php
/**
 * Plugin Name: Custom Product 270 graus 
 * Description: Customização do produto
 * Author: Dionleno vidaletti   
 * Version: 1.0
 * License: GPLv2 or later 
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
if (!class_exists('WC_CustomProduct')) :

    function init_wc_custom_product_class() {

        class WC_CustomProduct {

            function __construct() {
                add_action('admin_init', array($this, 'custom_register_js'));

                add_filter('woocommerce_product_data_tabs',  array($this,'custom_product_tabs'));
                add_filter('woocommerce_product_data_panels',  array($this,'faixapreco_options_product_tab_content')); // WC 2.6 and up
                add_filter('woocommerce_product_data_panels',  array($this,'gravacoes_options_product_tab_content')); 
             
                add_action( 'woocommerce_product_options_general_product_data', array($this,'wc_custom_add_custom_fields'));
                //add_action('woocommerce_process_product_meta_variable',  array($this,'save_giftcard_option_fields'));
            }

            function custom_register_js() {
                global $pagenow;

                if ('post-new.php' == $pagenow || 'post.php' == $pagenow) {
                    wp_enqueue_script('angulardata', plugin_dir_url(__FILE__) . 'assets/js/lib/angular.min.js');
                    wp_enqueue_script('angularapp', plugin_dir_url(__FILE__) . 'assets/js/app.js', array('jquery'));
                    wp_enqueue_script('produtoctrl', plugin_dir_url(__FILE__) . 'assets/js/controllers/produtoctrl.js', array('jquery'));
                }
            }

            /**
             * Includes.
             */
            function custom_product_tabs($tabs) {
                $tabs['faixapreco'] = array(
                    'label' => __('Faixa de preço', 'woocommerce'),
                    'target' => 'faixapreco_options',
                    'class' => array('show_if_simple', 'show_if_variable'),
                );
                
                 $tabs['gravacoes'] = array(
                    'label' => __('Gravações', 'woocommerce'),
                    'target' => 'gravacoes_options',
                    'class' => array('show_if_simple', 'show_if_variable'),
                );
                 
                return $tabs;
            }
function wc_custom_add_custom_fields() {
    // Print a custom text field
    woocommerce_wp_text_input( array(
        'id' => '_qtd_min',
        'label' => 'Quantidade minima',
        'description' => 'Adicione a quantidade minima para esse produto',
        'desc_tip' => 'true',
        'placeholder' => '123',
        'type' => 'number',
        'custom_attributes' => array(
            'min' => '1',
            'step' => '1',          
        ),
    ) );
}
            
             /**
             * Contents of the gift card options product tab.
             */
            function gravacoes_options_product_tab_content() {
                global $post;
                   $poddata = get_post_meta($post->ID, '_gravacoes',true);
                  
                   
                // Note the 'id' attribute needs to match the 'target' parameter set above
                   ?>
<script>
     var f_gravacoes = <?= json_encode($poddata);?>;     
</script>
<div id='gravacoes_options' class='panel woocommerce_options_panel' ng-controller="produtoCtrl"
                       ><div class='options_group'><?php
               
                 woocommerce_wp_select(array(
                     'id' => 'gbgravacao', 
                     'label' => __('Gravação', 'mg_referfriend'), 
                     'placeholder' => '', 
                     'options' => array(                         
                         'silk-screen' => 'Silk Screen', 
                         'tampografia' => 'Tampografia',
                         'impressao-digital' => 'Impressão Digital',
                         'laser' => 'Laser',
                         'transfer' => 'Transfer',
                         'sublimacao' => 'Sublimação',
                         'impressao' => 'Impressão',
                         'decalque' => 'Decalque',
                         'rotulo' => 'Rótulo',
                         ),
                    'custom_attributes' => array(                        
                        'ng-model' => 'gb.gravacao',
                    ),
                     ));
                 
                 
                 woocommerce_wp_select(array(
                     'id' => 'gbgravacao_type', 
                     'label' => __('Unidade', 'mg_referfriend'),                       
                     'options' => array(                         
                         'milheiro' => 'Milheiro', 
                         'unitario' => 'Unitário'
                         ),
                    'custom_attributes' => array(                        
                        'ng-model' => 'gb.type',
                    ),
                     ));
                 

                woocommerce_wp_text_input(array(
                    'id' => '_range_price',
                    'label' => __('Valor ', 'woocommerce'),
                    'desc_tip' => 'true',                    
                    'description' => __('Enter the number of days the gift card is valid for.', 'woocommerce'),
                    'type' => 'text',
                    'custom_attributes' => array(                       
                        'ng-model' => 'gb.price',
                    ),
                ));
 
                ?>

                        <button type="button" ng-click="addGravacao()">Adicionar</button>

                        <table class="table table-hover" style="width: 100%;margin: 20px 10px;">
                            <thead>
                                <tr>
                                    <th style="text-align: left;">Gravação</th>
                                    <th style="text-align: left;">Unidade</th>
                                    <th style="text-align: left;">Valor</th>
                                    <th style="text-align: left;">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="f in gravacoes">
                                    <td>{{f.gravacao}} <input type="hidden" name="gb[{{$index}}][gravacao]" value="{{f.gravacao}}"/></td>
                                    <td>{{f.type}}  <input type="hidden" name="gb[{{$index}}][type]" value="{{f.type}}"/></td>
                                    <td>{{f.price}}  <input type="hidden" name="gb[{{$index}}][price]" value="{{f.price}}"/></td>
                                    <td><button type="button" ng-click="DeleteGravacao(f)">Remover</button></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div><?php
            }
            
            
            
            /**
             * Contents of the gift card options product tab.
             */
            function faixapreco_options_product_tab_content() {
                global $post;
                   $poddata = get_post_meta($post->ID, '_faixa',true);
                  
                   
                // Note the 'id' attribute needs to match the 'target' parameter set above
                   ?>
<script>
     var ffaixa = <?= json_encode($poddata);?>;     
</script>
<div id='faixapreco_options' class='panel woocommerce_options_panel' ng-controller="produtoCtrl">
    <div class='options_group'><?php
               
                
                woocommerce_wp_text_input(array(
                    'id' => '_range_qtd',
                    'label' => __('Quantidade ', 'woocommerce'),
                    'desc_tip' => 'true',                    
                    'description' => __('Enter the number of days the gift card is valid for.', 'woocommerce'),
                    'type' => 'number',
                    'custom_attributes' => array(
                        'min' => '1',
                        'step' => '1',
                        'ng-model' => 'faixa.qtd',
                    ),
                ));

                woocommerce_wp_text_input(array(
                    'id' => '_range_price',
                    'label' => __('Valor ', 'woocommerce'),
                    'desc_tip' => 'true',                    
                    'description' => __('Enter the number of days the gift card is valid for.', 'woocommerce'),
                    'type' => 'text',
                    'custom_attributes' => array(
                        'min' => '1',
                        'step' => '1',
                        'ng-model' => 'faixa.price',
                    ),
                ));

                woocommerce_wp_text_input(array(
                    'id' => '_range_margin',
                    'label' => __('Margem de lucro ', 'woocommerce'),
                    'desc_tip' => 'true',                    
                    'description' => __('Enter the number of days the gift card is valid for.', 'woocommerce'),
                    'type' => 'number',
                    'custom_attributes' => array(
                        'min' => '1',
                        'step' => '1',
                        'ng-model' => 'faixa.margin',
                    ),
                ));
                ?>

                        <button type="button" ng-click="addFaixa()">Adicionar</button>

                        <table class="table table-hover" style="width: 100%;margin: 20px 10px;">
                            <thead>
                                <tr>
                                    <th style="text-align: left;">Quantidade</th>
                                    <th style="text-align: left;">Valor</th>
                                    <th style="text-align: left;">Margem de lucro</th>
                                    <th style="text-align: left;">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="f in faixas">
                                    <td>{{f.qtd}} <input type="hidden" name="faixa[{{$index}}][qtd]" value="{{f.qtd}}"/></td>
                                    <td>{{f.price}}  <input type="hidden" name="faixa[{{$index}}][price]" value="{{f.price}}"/></td>
                                    <td>{{f.margin}}%  <input type="hidden" name="faixa[{{$index}}][margin]" value="{{f.margin}}"/></td>
                                    <td><button type="button" ng-click="DeleteFaixa(f)">Remover</button></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div><?php
            }

           

        }

        new WC_CustomProduct();
    }

    add_action('plugins_loaded', 'init_wc_custom_product_class');
endif;


   add_action('woocommerce_process_product_meta',  'save_giftcard_option_fields');
 /**
             * Save the custom fields.
             */
            function save_giftcard_option_fields($post_id) {
                 
              
                if (isset($_POST['gb'])) :
                    update_post_meta($post_id, '_gravacoes', $_POST['gb']);
                endif;
                if (isset($_POST['faixa'])) :
                    update_post_meta($post_id, '_faixa', $_POST['faixa']);
                endif;
                
                 if ( ! empty( $_POST['_qtd_min'] ) ) {
                        update_post_meta( $post_id, '_qtd_min', esc_attr( $_POST['_qtd_min'] ) );
                }
            }
            
            