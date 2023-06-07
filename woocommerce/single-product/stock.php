<?php
/**
 * Single Product stock.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/stock.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>


<?php //the_field("статус_поступления_товара"); ?>
<p class="stock <?php echo esc_attr( $class ); ?>"><?php echo wp_kses_post( $availability ); ?></p>


<!-- Выводим поле статуса заказа товара, только если указан статус и если товара нет в наличии. Если товар есть в наличии, поле не выводится-->
<?php if ( $product->is_in_stock() && $product->get_stock_quantity() ==0 ) {
		echo '';
	}   
	elseif  ( $product->is_in_stock() ) {
		echo '';
	} 
	else {?>
		
		<?php if( get_field("статус_поступления_товара") ): ?>
			<div class="info-o-nal"> <?php the_field( "статус_поступления_товара" ); ?> <?php the_field( "планируемая_дата_поступления_товара" ); ?></div>
		<?php endif; ?>

	<?php }
?>
<!-- END Выводим поле статуса заказа товара, только если указан статус и если товара нет в наличии. Если товар есть в наличии, поле не выводится-->



		


