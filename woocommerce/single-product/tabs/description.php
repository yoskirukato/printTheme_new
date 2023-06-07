<?php
/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

$heading = esc_html( apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) ) );

?>

<?php if ( $heading ) : ?>
  <h2><?php echo $heading; ?></h2>
<?php endif; ?>

<?php the_content(); ?>

<div class="share-btn-soc">
<p style="text-align: center;font-size: 20px;font-weight: bold;margin-top: 9px;margin-bottom: 15px;">Оцените товар:</p>
			<center><?php if(function_exists('the_ratings')) { the_ratings(); } ?></center>
			<hr style="border-top: 1px solid #dadada;margin: 20px;">
<p style="text-align:center;font-weight: bolder;">Сообщить о товаре в социальных сетях:</p>
	<div class="share-btn">
		<!-- uSocial -->
		<script async src="https://usocial.pro/usocial/usocial.js?v=6.1.4" data-script="usocial" charset="utf-8"></script>
		<div class="uSocial-Share" data-pid="231e7286351ac6255ad3c80e4b582972" data-type="share" data-options="rect,style1,default,absolute,horizontal,size48,eachCounter1,counter0" data-social="telegram,wa,vk,ok,bookmarks,spoiler" data-mobile="vi,wa"></div>
		<!-- /uSocial -->
	</div>
</div>