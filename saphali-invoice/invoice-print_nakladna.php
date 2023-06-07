<?php 
global $order, $order_id, $Saphali_Invoice_RU;
$data = get_option("saphali_invoice_doc_rus_ukraine_nakl", array());
$image = $stamp_image = '';
$thumbnail_id = @$data['thumbnail_id'];
$stamp_thumbnail_id = @ $data['stamp_thumbnail_id'];
if( !is_integer($order->order_date) ) 
$time_order = strtotime( $order->order_date ); 
else 
$time_order = $order->order_date;
//echo '<pre>'; var_dump($order->order_custom_fields);
//$data_order = $Saphali_Invoice->maxsite_the_russian_time(date('j F Y', $time_order)) . ' р.';
if ($thumbnail_id)
	$image = wp_get_attachment_url( $thumbnail_id );
	
if ($stamp_thumbnail_id)
	$stamp_image = wp_get_attachment_url( $stamp_thumbnail_id );
	$its_no_rub = (get_woocommerce_currency() == 'RUR' || get_woocommerce_currency() == 'RUB');
	if(!$its_no_rub) $currency_value = $Saphali_Invoice_RU->get_currency_rate_shipping(get_woocommerce_currency() ,'RUB');
?>
<html>
<head>
    <title>Товарная накладная № <?php echo @$data['prefix'] . ltrim($order->get_order_number(), '#№'); ?></title>
    <style>
    .products td {border-color: black;}
    </style>
</head>
<body>


<table style="width: 171mm; margin-left: 7mm;"border="0" cellspacing='0' cellpadding='0'>
	<?php if(!empty($image)) { ?>
	<tr>
	
		<td colspan="2" style="text-align: center;">
			<img src="<?php echo $image; ?>" />
		</td>
	</tr>
	<?php } ?>
    <tr>
        <td colspan="6" style="text-align: left; font: bold 14pt Arial;border-bottom: 2px solid #000;padding-bottom: 9px;">Товарная накладная № <?php echo @$data['prefix'] . ltrim($order->get_order_number(), '#№'); ?> от <?php echo date("d.m.Y" , $time_order );?></td>
    </tr>
    <tr>
        <td style="width: 33mm; font-weight: normal; vertical-align: top;padding-top: 5px;">Поставщик: </td>
        <td style="text-align: left; font-weight: bold; vertical-align: top;padding-top: 5px;"><?php echo stripcslashes(@$data['postavshik']) ;?></td>
    </tr>
    <tr>
        <td style="font-weight: normal; vertical-align: top; margin:5px 0 0 0;padding-top: 5px;">Покупатель: </td>
        <td style="text-align: left; font-weight: bold; vertical-align: top;padding-top: 5px;"><p><?php if ( version_compare( WOOCOMMERCE_VERSION, '2.1.0', '<' ) ) {
		echo $order->order_custom_fields['_billing_first_name'][0] . ' ' . $order->order_custom_fields['_billing_last_name'][0]; 
		if( !empty($order->order_custom_fields['_billing_first_name'][0] ) && !empty($order->order_custom_fields['_billing_company'][0] )  || !empty($order->order_custom_fields['_billing_last_name'][0] ) && !empty($order->order_custom_fields['_billing_company'][0] )  ) {
			echo ', ';
		} echo $order->order_custom_fields['_billing_company'][0];
		?></p>
                            <?php if(!empty($order->order_custom_fields['_billing_phone'][0])) { ?>тел. <?php echo $order->order_custom_fields['_billing_phone'][0];?> <br /> <?php }
							$adress = trim($order->order_custom_fields['_billing_address_1'][0]);
							$siti = trim($order->order_custom_fields['_billing_city'][0]);
							$state = trim($order->order_custom_fields['_billing_state'][0]);
							$postcode = trim($order->order_custom_fields['_billing_postcode'][0]);
			} else {
		$first_name = get_post_meta( $order->id , '_billing_first_name', true);
		$last_name = get_post_meta( $order->id , '_billing_last_name', true);
		$billing_company = get_post_meta( $order->id , '_billing_company', true);
		echo $first_name . ' ' . $last_name;
		
		if( !empty( $first_name ) && !empty( $billing_company )  || !empty( $last_name ) && !empty( $billing_company )  ) {
			echo ', ';
		} echo $billing_company;
		?></p>
                            <?php 
							$billing_phone = get_post_meta( $order->id , '_billing_phone', true);
							if(!empty($billing_phone)) { ?>тел. <?php echo $billing_phone;?> <br /> <?php }
							$adress = get_post_meta( $order->id , '_billing_address_1', true);
							$adress2 = get_post_meta( $order->id , '_billing_address_2', true);
							$adress = trim($adress . ' ' . $adress2);
							$siti = get_post_meta( $order->id , '_billing_city', true);
							$siti = trim($siti);
							$state = get_post_meta( $order->id , '_billing_state', true);
							$state = trim($state);
							$postcode = get_post_meta( $order->id , '_billing_postcode', true);
							$postcode = trim($postcode);
			}
							 ?>
                        <?php 
						$print_addr = '';
						
						$print_addr .= $adress; 
						if( !empty($adress) && (!empty($siti) ) ) $print_addr .= ', '; $print_addr .= $siti; 
						if(!empty($state) && !empty($siti) || empty($siti) && !empty($adress) && !empty($state) )  $print_addr .= ', '; 
						if(!empty($state)) $print_addr .= $state; 
						if(!empty($siti) && !empty($postcode) || !empty($state) && !empty($postcode) ) $print_addr .= ', '; $print_addr .= $postcode; 
						$print_addr = str_replace("{$postcode}{$state} " . substr($postcode,-2) . ', ' , '', $print_addr);
						echo $print_addr;
						?></td>
    </tr>
    <tr>
        <td style="font-weight: normal; vertical-align: top; margin:5px 0 0 0;padding: 5px 0;">Склад:</td>
        <td style="text-align: left; font-weight: bold; vertical-align: top; margin:5px 0 0 0;padding: 5px 0;"><?php echo stripcslashes(@$data['stock']) ;?></td>
    </tr>

</table>

<table border="0" cellspacing='0' cellpadding='0' class="products-item">
    <tr style="background: none ; border-color: black; text-align: center; font: 10pt arial; font-weight: bold;">
        <td style="width: 7mm;">№</td>
        <td style="width: 76mm;">Товар</td>
        <td style="width: 8mm;">Количество</td>
        <td style="width: 15mm;">Ед.</td>
        <td style="width: 22mm;">Цена</td>
        <td style="width: 33mm;">Сумма</td>
    </tr>
<?php
$count = 1;
	$woocommerce_calc_taxes = get_option('woocommerce_calc_taxes' );
	$woocommerce_prices_include_tax = get_option('woocommerce_prices_include_tax' );
	$_is_site_tax_enabled = get_option('is_site_tax_enabled' );
	if(isset($order->order_shipping) && $order->order_shipping > 0) {
		$shipping_price = $its_no_rub ? $order->order_shipping : round($order->order_shipping * $currency_value , 2);
	}
foreach($order->get_items() as $item) {

	$is_site_tax_enabled = $_is_site_tax_enabled;
	/* if( $order->order_shipping > 0 && $data['dostavka'] ) {
		$pr_total = $order->order_shipping / ($order->order_total - $order->order_shipping);
		$item['line_subtotal'] = $item['line_subtotal'] * (1 + $pr_total);
		$item['line_tax'] = $item['line_tax'] * (1 + $pr_total);
	} else $order->order_total = $order->order_total - $order->order_shipping; */
	if( method_exists( $order, 'get_total_discount' ) ) $order->order_discount = $order->get_total_discount();
	if($order->order_discount > 0) {
		$pr_total = $order->order_discount / ($order->order_total + $order->order_discount - $shipping_price);
		$item['line_subtotal'] = $item['line_subtotal'] * (1 - $pr_total);
		$item['line_tax'] = $item['line_tax'] * (1 - $pr_total);
	}

	$line_subtotal = $item['line_subtotal'];
	if($woocommerce_calc_taxes == 'no') {
		if($is_site_tax_enabled) {
			$line_subtotal = round($line_subtotal / (1 + (double)str_replace(array(',', '%'), array('.', ''), $is_site_tax_enabled)/100), 2);
			$is_site_tax_enabled = (double)str_replace(array(',', '%'), array('.', ''), $is_site_tax_enabled) / 100 ;
			$item['line_tax'] = round( $item['line_subtotal'] - $line_subtotal, 2);
		}
	} else {
		if($woocommerce_prices_include_tax == 'no' ) {
			$is_site_tax_enabled = $item['line_tax']/$item['line_subtotal'];
			$item['line_subtotal'] = $line_subtotal + $item['line_tax'];
		} else {
			$is_site_tax_enabled = $item['line_tax']/$item['line_subtotal'];
			$item['line_subtotal'] = $line_subtotal + $item['line_tax'];
		}
	}
	$s_tax += $item['line_tax'];
	$s_subtotal += $line_subtotal;
	$item['line_tax'] = round($item['line_tax'], 2);

?>
    <tr style="border-color: black;">
        <td style="text-align: center;font-size: 13px;"><?php echo $count; ?></td>
        <td style="padding: 0 2px 0;font-size: 13px;"><?php echo $item['name'];
			if(class_exists('WC_Order_Item_Meta') ) {
				$item_meta = new WC_Order_Item_Meta( $item['item_meta'] );
				echo $item_meta->display();
			} else {
				if ( $metadata = $item["item_meta"]) {
					foreach($metadata as $k =>  $meta) {
						echo '<dl class="variation"><dt>'.$meta['meta_name'].':</dt><dd>'.$meta['meta_value'].'</dd></dl>';
					}
				}
			}
			$product_id = (isset($item["variation_id"]) && $item["variation_id"] > 0) ? $item["variation_id"] : $item["product_id"] ;
			$sku = get_post_meta( $product_id, '_sku', true ); if(!empty($sku)) echo ' (Арт. ' . $sku . ')';
			
			if( !empty($data['excerpt']) ) {
				$post = get_post($item['product_id']);
				if(!empty( $post->post_excerpt ) ) {
					echo ' <small>[' . apply_filters( 'get_the_excerpt', $post->post_excerpt ) . ']</small>';
				}
			}
		?></td>
        <td style="text-align: right;padding: 0 2px 0;font-size: 13px;"><?php echo $item['qty']; ?></td>
		<td style="padding: 0 2px 0;font-size: 13px;">шт.</td>
        <td style="text-align: right;padding: 0 2px 0;font-size: 13px;"><?php 
		$i_price = $its_no_rub ? $line_subtotal : $line_subtotal * $currency_value;
		echo round(( $i_price / $item['qty']), 2) ; ?></td>
        <td style="text-align: right;padding: 0 2px 0;font-size: 13px;"><?php echo round($i_price, 2); ?></td>
    </tr>
<?php $count++;}
if(isset($order->order_shipping) && $order->order_shipping > 0) {
?>
    <tr style="border-color: black;">
        <td style="text-align: center;font-size: 13px;"><?php echo $count; ?></td>
        <td style="padding: 0 2px 0;font-size: 13px;">Доставка</td>
        <td style="text-align: right;padding: 0 2px 0;font-size: 13px;">1</td> 
		<td style="padding: 0 2px 0;font-size: 13px;">&nbsp;</td>
        <td style="text-align: right;padding: 0 2px 0;font-size: 13px;"><?php echo $shipping_price; ?></td>
        <td style="text-align: right;padding: 0 2px 0;font-size: 13px;"><?php echo $shipping_price; ?></td>
    </tr>
<?php
$count++;
}
 ?>
    </table>

<table border="0" cellspacing='0' cellpadding='0' class="products">
<?php
$order->order_total = $its_no_rub ? $order->order_total : round($order->order_total * $currency_value , 2); 
if($s_tax) {
?>
    <tr>
        <td style="font: 11pt Arial; font-weight: bold; text-align: right; width:150mm;">Налог:</td>
        <td style="font: bold 11pt Arial; border: medium none; text-align: right; float: right; width: auto; padding-left: 10px;"><?php echo number_format($s_tax, 2, ',', ''); ?></td>
    </tr>
<?php } ?>
    <tr>
        <td style="font: 11pt Arial; font-weight: bold; text-align: right; width:150mm;">Итого:</td>
        <td style="font: bold 11pt Arial; border: medium none; text-align: right; float: right; width: auto; padding-left: 10px;"><?php echo $order->order_total  ; ?></td>
    </tr>
</table>
<table border="0" cellspacing='0' cellpadding='0' style="width: 171mm;margin-top: 15px;margin-left: 7mm;">
    <tr>
        <td style="font: 11pt Arial; font-weight: normal; text-align: left; margin-top: 5px" colspan="2">Всего наименований <?php echo $count - 1; ?>, на сумму <?php 
		$symbol = $its_no_rub ? '&nbsp;' . get_woocommerce_currency_symbol() : '&nbsp;руб.'; 
		echo number_format($order->order_total, 2, '.', '\'') . $symbol; ?> </td>
    </tr>

    <tr>
        <td style="font: bold 11pt Arial; text-align: left; padding-bottom: 10px;" colspan="2"><?php echo Saphali_Num2rub_doc::doit($order->order_total);?></td>
    </tr>
<?php $_data = trim(@$data['info']); if(!empty($_data) ) { ?>
    <tr>
        <td style="text-align: left; border-top: 2px solid; font: 11px Arial; padding-top: 2px;" colspan="2"><?php echo wpautop(stripcslashes($data['info'])) ; echo $its_no_rub ? '' : '<br />Курс: 1 '.get_woocommerce_currency().' = '. $currency_value . ' RUB (~ 1/' . round(1/$currency_value, 2) . ')'; ?></td>
    </tr>
<?php } ?>
</table>
<table border="0" cellspacing='0' cellpadding='0' style="width: 171mm;margin-top: 15px;margin-left: 7mm;">
    <tr>
        <td style="font: 10pt Arial; text-align: left; width: 63%;">Отпустил&nbsp;&nbsp; __________________<?php $c = mb_strlen($data['otvetstv']) -11-16;  echo stripcslashes( @$data['otvetstv']) ; for($c;$c<=0;$c++) { echo '&nbsp;';} ?>Получил</td>
		<td style="font: 10pt Arial; text-align: left; border-bottom: 1px solid black; width: 36%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
</table>
<?php if(!empty($stamp_image)) { ?><p class="stamp_image">
<img src="<?php echo $stamp_image;?>" />
</p><?php } ?>
<style text="text/css">
dl.variation {
    display: inline;
    font-size: 12px;
	font-style: italic;
    padding: 0;
}
p.stamp_image img {
    bottom: -80px;
    left: 50px;
    position: absolute;
    z-index: -1;
}
p.stamp_image {
    position: relative;
}
table.products-item {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: -moz-use-text-color;
    border-image: none;
    border-style: solid;
    border-width: 1px 1px 2px 2px;
	
    margin-top: 0;
    width: 171mm;
	margin-left: 7mm;
}

table.products {
    margin-top: 0;
    width: 171mm;
	border: none;
	margin-left: 7mm;
}
p {margin: 0; padding: 0;}
table.products-item td {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: -moz-use-text-color;
    border-image: none;
    border-style: solid solid none none;
    border-width: 1px 1px medium medium;
}
dl.variation dt, dl.variation dd {
    display: inline;
}
dl.variation dd {
    margin-left: 7px;
    padding-left: 0;
}
dl.variation dd:last-child:after {
    content: "";
}
dl.variation dd:after {
    content: ", ";
}
dl.variation dt {
    padding: 0 0 0 10px;
}
p#printPreview {
    padding: 18px;
    text-align: center;
}
#printPreview a {
    color: #106E99;
    text-decoration: none;
}
</style>
