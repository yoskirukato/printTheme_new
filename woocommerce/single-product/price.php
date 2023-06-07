<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
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
	exit; // Exit if accessed directly
}

global $product;

?>
<div class="stock-sku-info">
	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
		<span class="sku_wrapper">Код товара: <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>
	<?php endif; ?>
	<div class="stock-up">
		<?php if ( $product->is_in_stock() && $product->get_stock_quantity() ==0 ) {
			echo '<div class="up-in-stock" >В наличии</div>';
			}   
			elseif  ( $product->is_in_stock() ) {
			echo '<div class="up-in-stock" >' . 'В наличии: ' . $product->get_stock_quantity() . ' шт.</div>';
			} 
			else {
				echo '<div class="up-out-in-stock" >Доступно под заказ</div>';
			}
		?>
	</div>
</div>

<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) );?>"><?php echo $product->get_price_html(); ?></p>

<div class="price_bn"><?php
echo 'По безналичному расчёту ' . ($product->get_price() * 0.1 + $product->get_price()) . ' руб. без НДС. <a href="//printblog.ru/oplata-beznal">Подробнее</a>';
?></div>

<p class="curency_cartochka"><strong>Выберите валюту вашей страны:</strong> <?php return_currensy(false);?></p>

	<meta itemprop="price" content="<?php echo esc_attr( $product->get_price() ); ?>" />
	<meta itemprop="priceCurrency" content="<?php echo esc_attr( get_woocommerce_currency() ); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
	<p><strong>Мы принимаем:</strong></p>
	<div style="margin:0 0 10px 0;">
		<img alt="Способы оплаты" title="Способы оплаты" class="cartpayment" src="//printblog.ru/wp-content/themes/printTheme/img/payment/paysystem.png">
	</div>
	<span style="
	border: 1px solid #dadada;
    padding: 5px 10px;
    display: block;
    margin-bottom: 10px;
    background-color: #ffa5001f;
    font-weight: bold;
    font-size: 12px;"><i class="fa fa-truck" aria-hidden="true"></i>   &nbsp;&nbsp;Бесплатная доставка Почтой России при сумме заказа от 5000 руб. (Только по территории РФ и при условии что вес посылки не превышает 1 кг.)</span>