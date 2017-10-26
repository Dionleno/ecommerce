<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<div class="container register-box"> 
    <div class="col-sm-6 items-register">
        <img src="<?php echo bloginfo('template_url');?>/assets/image/logo.png" class="" alt="Image" style="width: 150px;">
    </div>
    <div class="col-sm-6 text-right items-register" >
        <p>Se você já se cadastrou acesse<br>
            sua conta <a href="<?php echo site_url('login'); ?>" class="fonte_laranja">clicando aqui.</a></p>
    </div>
    <div class="col-sm-12">
        <h4>O acesso a help! shop é concedido a todos os profissionais da help! do Brasil. Caso ainda não tenha recebido sua senha, preencha o seu cadastro abaixo.</h4> 
        <p>Em caso de dúvidas entre em contato através do telefone <span class="fonte_laranja">(11) 5555-5555</span> ou email <span class="fonte_laranja">suporte@helpshop.com.br.</span></p>
    </div>
    <div class="clearfix"></div>

    
    <form method="post" class="register">

			<?php do_action( 'woocommerce_register_form_start' ); ?>
        <legend style="margin-left: 15px;" class="fonte_laranja">Dados pessoais</legend>
 <div class="form-group col-sm-5">
   <label for="reg_username" class="">Nome <span class="required">*</span></label>
   <input type="text" class="form-control" name="username" id="reg_username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" />
  </div>
<div class="form-group col-sm-7">
   <label for="reg_last_name" class="">Sobrenome<span class="required">*</span></label>
   <input type="text" class="form-control" name="billing_last_name" id="reg_last_name" value="<?php echo ( ! empty( $_POST['billing_last_name'] ) ) ? esc_attr( $_POST['billing_last_name'] ) : ''; ?>" />
  </div>
<div class="form-group col-sm-5">
    <label for="reg_email" class="">Email <span class="required">*</span></label>
    <input type="email" class="form-control" name="email" id="reg_email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( $_POST['email'] ) : ''; ?>" />
  </div>

<div class="form-group col-sm-7">
    <label for="reg_billing_phone" class=""><?php _e( 'Telefone', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="form-control" name="billing_phone" id="reg_billing_phone" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>" />
  </div>
 
<legend style="margin-left: 15px;" class="fonte_laranja">Endereço</legend>
<div class="form-group col-sm-5">
    <label for="reg_billing_company" class="">Empresa <span class="required">*</span></label>
    <input type="text" class="form-control" name="billing_company" id="reg_billing_company" value="<?php echo ( ! empty( $_POST['billing_company'] ) ) ? esc_attr( $_POST['billing_company'] ) : ''; ?>" />
  </div>
<div class="form-group col-sm-7">
    <label for="reg_billing_address_1" class="">Endereço <span class="required">*</span></label>
    <input type="text" class="form-control" name="billing_address_1" id="reg_billing_address_1" value="<?php if ( ! empty( $_POST['billing_address_1'] ) ) esc_attr_e( $_POST['billing_address_1'] ); ?>" />
  </div>

<div class="form-group col-sm-5">
    <label for="reg_billing_city" class="">Cidade <span class="required">*</span></label>
    <input type="text" class="form-control" name="billing_city" id="reg_billing_city" value="<?php echo ( ! empty( $_POST['billing_city'] ) ) ? esc_attr( $_POST['billing_city'] ) : ''; ?>" />
  </div>
<div class="form-group col-sm-4">
    <label for="reg_billing_state" class="">Estado <span class="required">*</span></label>
    <input type="text" class="form-control" name="billing_state" id="reg_billing_state" value="<?php echo ( ! empty( $_POST['billing_state'] ) ) ? esc_attr( $_POST['billing_state'] ) : ''; ?>" />
  </div>
<div class="form-group col-sm-3">
    <label for="reg_billing_postcode" class="">CEP <span class="required">*</span></label>
    <input type="text" class="form-control" name="billing_postcode" id="billing_postcode" value="<?php echo ( ! empty( $_POST['billing_postcode'] ) ) ? esc_attr( $_POST['billing_postcode'] ) : ''; ?>" />
  </div>


<legend style="margin-left: 15px;" class="fonte_laranja">Dados de acesso</legend>

<div class="form-group col-sm-4">
    <label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
     <input type="password" class="form-control" name="password" id="reg_password" />
  </div>
<div class="form-group col-sm-4">
    <label for="reg_password_confirme">Confirmar senha <span class="required">*</span></label>
     <input type="password" class="form-control" name="password_confirme" id="reg_password_confirme" />
  </div>

<div class="clearfix"></div> <br>

			<?php do_action( 'woocommerce_register_form' ); ?>

			<p class="woocommerce-FormRow form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<input type="submit" class="woocommerce-Button button btn btn-verde btn-lg" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>" />
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>
</div>
<br/>

 
<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
