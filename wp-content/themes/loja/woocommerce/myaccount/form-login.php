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

<div class="login-box"> 
    <div class="text-center" style="width: 100%;margin: 0 auto 20px;">
        <img src="<?php echo bloginfo('template_url');?>/assets/image/logo.png" class="" alt="Image" style="width: 160px;">
    </div>
         
         
         <form class="woocommerce-form woocommerce-form-login login" method="post">
             <p style="font-weight: normal;">Digite abaixo seu e-mail e senha já cadastrados na loja.</p>
			<?php do_action( 'woocommerce_login_form_start' ); ?>

             
                  <div class="form-group">
                      <label for="username" class="fonte_laranja"><?php _e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
                        <input type="text" class="form-control" id="" name="username" id="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" placeholder="Email">
                    </div>
             
              <div class="form-group">
                        <label for="password" class="fonte_laranja"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
                        <input type="password" class="form-control" id="" name="password" id="password"  placeholder="Senha">
                        <p class="woocommerce-LostPassword lost_password pull-right">
                            <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" style="font-weight: bold;color: #555555;">Esqueci minha senha.</a>
			</p>
                    </div>
			 
			 

			<?php do_action( 'woocommerce_login_form' ); ?>

             <p class="form-row" style="margin: 15px 0;display: inline-block;width: 100%;">
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<input type="submit" class="woocommerce-Button btn btn-verde btn-block btn-lg" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" />
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline hidden">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php _e( 'Remember me', 'woocommerce' ); ?></span>
				</label>
			</p>
                        <div style="width: 100%;text-align: center;">
                            <strong class="fonte_laranja text-center" style="font-size: 20px;">OU</strong>  
                        </div>
                        <p class="form-row" style="margin: 15px 0;display: inline-block;width: 100%;">
				
                            <a href="<?php echo site_url('register'); ?>" style="font-size: 14px;" class="btn btn-default btn-block btn-lg">Ainda não é cliente? Cadastre-se.</a>
			</p>
                        
                        
			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>
</div>

 
<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
