<?php 
global $order, $order_id, $Saphali_Invoice_DOC_RUS;
$data = get_option("saphali_invoice_doc_rus_ukraine", array());
$data_check = get_option("saphali_check_doc_rus_ukraine", array());
if( !is_integer($order->order_date) ) 
$time_order = strtotime( $order->order_date ); 
else 
$time_order = $order->order_date;
//$data_order = $Saphali_Invoice_DOC_RUS->maxsite_the_russian_time(date('d.m.Y', $time_order)) . ' г.';
$data_order = $Saphali_Invoice_DOC_RUS->maxsite_the_russian_time(date('j F Y', $time_order)) . ' г.';
$stamp_thumbnail_id = $data_check['stamp_thumbnail_id'];
if ($stamp_thumbnail_id)
	$stamp_image = wp_get_attachment_url( $stamp_thumbnail_id );
if($Saphali_Invoice_DOC_RUS->is_companyname_run_doc_rus === null)
$Saphali_Invoice_DOC_RUS->is_companyname_run_doc_rus = get_option('is_companyname_run_doc_rus' );
$user_id = $order->get_user_id(); 
$user_id_company = get_user_meta( $user_id, 'company', 'on' );
$organisation_inn = get_post_meta( $order_id , 'organisation_inn', true);
$organisation_kpp = get_post_meta( $order_id , 'organisation_kpp', true);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 plus MathML 2.0//EN" "http://www.w3.org/Math/DTD/mathml2/xhtml-math11-f.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head profile="http://dublincore.org/documents/dcmi-terms/">
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8"/>
    <title>СЧЕТ № <?php echo @$data_check['prefix'] . ltrim($order->get_order_number(), '#№'); ?></title>
	<style type="text/css">
		<?php include(saphali_invoice_doc_rus::$plugin_path . 'template/style-check.css'); ?>
	</style>
</head>
<body dir="ltr" style="width:760px; writing-mode:lr-tb; margin: 0 auto"><table border="0" cellspacing="0" cellpadding="0" class="ta1"><colgroup><col width="8"/><col width="24"/><col width="13"/><col width="11"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="19"/><col width="18"/><col width="19"/><col width="19"/><col width="24"/><col width="2"/><col width="22"/><col width="24"/><col width="16"/><col width="8"/><col width="24"/><col width="16"/><col width="8"/><col width="24"/><col width="24"/><col width="24"/><col width="19"/><col width="5"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="13"/><col width="71"/></colgroup><tr class="ro1"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td colspan="37" rowspan="3" style="text-align:center;width:0.2118in; " class="ce2"><p>Внимание! Оплата данного счета означает согласие с условиями поставки товара. Уведомление об оплате </p><p> обязательно, в противном случае не гарантируется наличие товара на складе. Товар отпускается по факту</p><p> прихода денег на р/с Поставщика, самовывозом, при наличии доверенности и паспорта.</p></td><td style="text-align:left;width:0.6362in; " class="ce1"> </td></tr><tr class="ro1"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.6362in; " class="ce1"> </td></tr><tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr><tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1146in; " class="ce1"> </td><td style="text-align:left;width:0.0965in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.1583in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.0173in; " class="ce1"> </td><td style="text-align:left;width:0.1937in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.0437in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1146in; " class="ce1"> </td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr><tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td colspan="19" rowspan="2" style="text-align:left;width:0.2118in; " class="ce4"><p><?php echo $data_check['bank']; ?></p></td><td colspan="5" style="text-align:left;width:0.0173in; " class="ce28"><p>БИК</p></td><td colspan="13" style="text-align:left; width:0.2118in; " class="ce33"><p><?php echo $data_check['bank_bik']; ?></p></td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr><tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td colspan="5" rowspan="2" style="text-align:left;width:0.0173in; " class="ce29"><p>Сч. №</p></td><td colspan="13" rowspan="2" style="text-align:left;width:0.2118in; " class="ce34"><p><?php echo $data_check['account_numb_bank']; ?></p></td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr><tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td colspan="19" style="text-align:left;width:0.2118in; " class="ce5"><p>Банк получателя</p></td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr><tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce6"><p>ИНН</p></td><td colspan="8" style="text-align:left; width:0.2118in; " class="ce24"><p><?php echo $data['inn']; ?></p></td><td colspan="2" style="text-align:left;width:0.2118in; " class="ce6"><p>КПП  </p></td><td colspan="8" style="text-align:left; width:0.2118in; " class="ce24"><p><?php echo $data['kpp']; ?></p></td><td colspan="5" rowspan="4" style="text-align:left;width:0.0173in; " class="ce29"><p>Сч. №</p></td><td colspan="13" rowspan="4" style="text-align:left;width:0.2118in; " class="ce29"><p><?php echo $data_check['account_numb']; ?></p></td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr><tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td colspan="19" rowspan="2" style="text-align:left;width:0.2118in; " class="ce7"><p><?php echo $data['name']; ?></p></td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr><tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr><tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td colspan="19" style="text-align:left;width:0.2118in; " class="ce8"><p>Получатель</p></td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr><tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1146in; " class="ce1"> </td><td style="text-align:left;width:0.0965in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.1583in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.0173in; " class="ce1"> </td><td style="text-align:left;width:0.1937in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.0437in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1146in; " class="ce1"> </td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr><tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td colspan="37" rowspan="2" style="text-align:left;width:0.2118in; " class="ce9"><p>Счет на оплату № <?php echo @$data_check['prefix'] . ltrim($order->get_order_number(), '#№'); ?> от <?php echo $data_order; ?></p></td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr><tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr><tr class="ro3"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td colspan="37" style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.6362in; " class="ce1"> </td></tr><tr class="ro3"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1146in; " class="ce1"> </td><td style="text-align:left;width:0.0965in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.1583in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.0173in; " class="ce1"> </td><td style="text-align:left;width:0.1937in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.0437in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1146in; " class="ce1"> </td><td style="text-align:left;width:0.6362in; " class="ce1"> </td></tr><tr class="ro4"><td style="text-align:left;width:0.0709in; " class="Default"> </td><td colspan="5" style="text-align:left;width:0.2118in; " class="ce12"><p>Поставщик:</p></td><td colspan="32" style="text-align:left;width:0.2118in; " class="ce17"><p><?php echo $data_check['postavshik']; ?></p></td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr>
<tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td colspan="5" style="text-align:left;width:0.2118in; " class="ce12"><p>Покупатель:</p></td><td colspan="32" style="text-align:left;width:0.2118in; " class="ce1"><p><strong><?php 
	//$billing_platelshik_is_grpl = get_post_meta( $order_id , '_billing_platelshik_is_grpl', true);
	if( 0 ) {
		$platelshik = get_post_meta( $order_id , '_billing_platelshik', true);
		if(!empty($platelshik) ) {
			$e = explode('т.', $platelshik); 
			if(sizeof($e) > 1  ) {
				$platelshik = $e[0];
			} else {
				$e = explode('тел.', $platelshik); 
				if(sizeof($e) > 1  ) {
					$platelshik = $e[0];
				} else {
					$e = explode(' тел ', $platelshik); 
					if(sizeof($e) > 1  ) {
						$platelshik = $e[0];
					} else {
						$e = explode('тел:', $platelshik); 
						if(sizeof($e) > 1  ) {
							$platelshik = $e[0];
						}
					}
				}
			}
			echo trim($platelshik, ','); 
		}
		$inn_kpp1 = get_post_meta( $order_id , '_billing_inn', true);
		$inn_kpp2 = get_post_meta( $order_id , '_billing_kpp', true);
		
		$organisation_name = stripslashes($order->get_meta('organisation_name'));
		$organisation_address = stripslashes($order->get_meta('organisation_address'));
		
		if (empty($inn_kpp1)){
			$inn_kpp1 = $organisation_inn;
		} 
		
		if (empty($inn_kpp2)){
			$inn_kpp2 = $organisation_kpp;
		}  
		
		if(!empty($inn_kpp1) && !empty($inn_kpp2) ) {
			$inn_kpp = "{$inn_kpp1}/{$inn_kpp2}";
			echo ', ИНН/КПП: ' . $inn_kpp;
		} else {
			$i_k = get_post_meta( $order_id , $data['inn_pok'], true); if( !empty($i_k) && !empty($data['inn_pok']) ) echo ', ИНН/КПП: ' . get_post_meta( $order_id , $data['inn_pok'], true);	
		}
	} else {
		
		if( !$Saphali_Invoice_DOC_RUS->is_companyname_run_doc_rus ) {
			$first_name = get_post_meta( $order_id , '_billing_first_name', true);
			$middle_name = get_post_meta( $order_id , '_billing_middle_name', true);
			$smiddle_name = get_post_meta( $order_id , '_shipping_middle_name', true);
			$middle_name = $middle_name ? " $middle_name" : '';
			$smiddle_name = $smiddle_name ? " $smiddle_name" : '';
			if( !empty( $first_name ) ) 
				echo get_post_meta( $order_id , '_billing_last_name', true) . ' ' . get_post_meta( $order_id , '_billing_first_name', true) . $middle_name; 
			else 
				echo get_post_meta( $order_id , '_shipping_last_name', true) . ' ' . get_post_meta( $order_id , '_shipping_first_name', true) . $smiddle_name; 
		} else {
			
			
			
			if($user_id_company) {
				$organisation_name = stripcslashes(get_post_meta( $order_id , 'organisation_name', true));
				
				if ($organisation_name) {
					echo $organisation_name . ', ';
				}
			}else{
				$first_name = get_post_meta( $order_id , '_shipping_company', true);
				if( empty( $first_name ) ){
					 echo get_post_meta( $order_id , '_billing_company', true);
				}else{
					 echo $first_name;
				}
			}
			
			
		} 
		
		
		$inn_kpp1 = get_post_meta( $order_id , '_billing_inn', true);
		$inn_kpp2 = get_post_meta( $order_id , '_billing_kpp', true);
		
		if (empty($inn_kpp1)){
			$inn_kpp1 = $organisation_inn;
		} 
		
		if (empty($inn_kpp2)){
			$inn_kpp2 = $organisation_kpp;
		} 

		if(!empty($inn_kpp1) && !empty($inn_kpp2) ) {
			$inn_kpp = "{$inn_kpp1}/{$inn_kpp2}";
			echo 'ИНН/КПП: ' . $inn_kpp . ', ';
		}elseif(!empty($inn_kpp1) && empty($inn_kpp2)){
			echo 'ИНН: ' . $inn_kpp1 . ', ';
		} else {
			$i_k = get_post_meta( $order_id , $data['inn_pok'], true); if( !empty($i_k) && !empty($data['inn_pok']) ) echo 'ИНН/КПП: ' . get_post_meta( $order_id , $data['inn_pok'], true). ', ';	
		}
		
		if($user_id_company) {
			$organisation_address = get_post_meta( $order_id , 'organisation_address', true);
			if ($organisation_address) {
				echo $organisation_address ;
			}
		}else{
			$billing_urid_adres = get_post_meta( $order_id , '_billing_urid_adres', true);
			if( empty($billing_urid_adres) ) {
				$billing_address_1 = get_post_meta( $order_id , '_shipping_address_1', true);
				if(empty( $billing_address_1 ) ) $billing_address_1 = get_post_meta( $order_id , '_billing_address_1', true);
				$billing_address_2 = get_post_meta( $order_id , '_shipping_address_2', true);
				if(empty( $billing_address_2 ) ) $billing_address_2 = get_post_meta( $order_id , '_billing_address_2', true);
				$billing_state = get_post_meta( $order_id , '_shipping_state', true);
				if(empty( $billing_state ) ) $billing_state = get_post_meta( $order_id , '_billing_state', true);
				$billing_city = get_post_meta( $order_id , '_shipping_city', true);
				if(empty( $billing_city ) ) $billing_city = get_post_meta( $order_id , '_billing_city', true);
				$postcode = get_post_meta( $order_id , '_shipping_postcode', true);
				if(empty( $postcode ) ) $postcode = get_post_meta( $order_id , '_billing_postcode', true);
				$billing_address_2 = !empty($billing_address_2) ? ", $billing_address_2" : $billing_address_2;
				$t_pc = "{$billing_address_1}{$billing_address_2}";
				$p_c = !empty($postcode) && ( !empty($billing_city) || !empty($t_pc) || !empty($billing_state) ) ? $postcode . ', ' : $postcode;
				$b_s = !empty($billing_state) && ( !empty($billing_city) || !empty($t_pc) ) ? $billing_state . ', ' : $billing_state;
				$b_c = !empty($billing_city) && !empty($t_pc)  ? 'г.' . str_replace( 'г.', '', $billing_city) . ', ' : $billing_city;
				echo $p_c  . $b_s  . $b_c  . $t_pc; 	
			} else echo $billing_urid_adres;
		}

		
	}
	?></strong></p></td><td class="Default" style="text-align:left;width:0.6362in; ">&nbsp;</td></tr><tr class="ro3"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1146in; " class="ce1"> </td><td style="text-align:left;width:0.0965in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.1583in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.0173in; " class="ce1"> </td><td style="text-align:left;width:0.1937in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.0437in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1146in; " class="ce1"> </td><td style="text-align:left;width:0.6362in; " class="ce1"> </td></tr>
	
	<tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td colspan="2" style="text-align:left;width:0.2118in; " class="ce13"><p>№</p></td><td colspan="18" style="text-align:left;width:0.0965in; " class="ce22"><p>Товары (работы, услуги)</p></td><td colspan="3" style="text-align:left;width:0.1937in; " class="ce22"><p>Кол-во</p></td><td colspan="3" style="text-align:left;width:0.0709in; " class="ce22"><p>Ед.</p></td><td colspan="5" style="text-align:left;width:0.0709in; " class="ce22"><p>Цена</p></td><td colspan="6" style="text-align:left;width:0.0437in; " class="ce37"><p>Сумма</p></td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr>
<?php
	$count = 0; $count_group = 1;
	$all_count = sizeof($order->get_items());
	
	$woocommerce_calc_taxes = get_option('woocommerce_calc_taxes' );
	$woocommerce_prices_include_tax = get_option('woocommerce_prices_include_tax' );
	$_is_site_tax_enabled = get_option('is_site_tax_enabled' );	
	$is_mb = function_exists('mb_strlen');
	$count_str_numb = 0;
	$discount = 0;
	$fee = array();
	foreach($order->get_items('fee') as $_item) {
		if(method_exists($_item, 'get_data') ) {
			$item = $_item->get_data();
			$item['line_total'] = $item['total'];
		} else {
			$item = $_item;
		}
		if( $item['line_total'] < 0 )
			$discount += abs($item['line_total'] );
		else {
			$fee[ $item['name'] ] = $item['line_total'];
		}
	}
	$all_count += sizeof($fee);
	if( method_exists( $order, 'get_total_discount' ) ) $order->order_discount = $order->get_total_discount();
	$order->order_discount += $discount;
	foreach($order->get_items() as $_item) {
		$count++;
		if(method_exists($_item, 'get_data') ) {
			$item = $_item->get_data();
			$item['line_subtotal'] = $item['subtotal'];
			$item['line_tax'] = $item['subtotal_tax'];
			$item['qty'] = $item["quantity"];
			$item['item_meta'] = $item["meta_data"];
		} else {
			$item = $_item;
		}
		$is_site_tax_enabled = $_is_site_tax_enabled;
		if($order->order_discount > 0) {
			$pr_total = $order->order_discount / ($order->order_total + $order->order_discount - $order->order_shipping);
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
		} else{
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
	<tr class="ro5">
	<td style="text-align:left;width:0.0709in; " class="Default"> </td>
	<td colspan="2" style="text-align:right; width:0.2118in; " class="ce14"><p><?php echo $count; ?></p></td>
	<td style="text-align:left;width:0.0965in; " colspan="18" class="ce23"> <?php echo __($item['name']);
			if (version_compare(WOOCOMMERCE_VERSION, '3.0', '<'))
			if(class_exists('WC_Order_Item_Meta') ) {
				$item_meta = new WC_Order_Item_Meta( $item['item_meta'] );
				echo str_replace( array('<p>','</p>'), array('',''), $item_meta->display(false , true) );
				if($is_mb)
				$count_str_numb += ceil( mb_strlen( strip_tags( __($item['name']) . $item_meta->display(false , true) ) ) / 45 );
			} else {
				if ( $metadata = $item["item_meta"]) {
					foreach($metadata as $k =>  $meta) {
						echo '<dl class="variation" style="display:inline;"><dt style="display:inline;">'.strip_tags($meta['meta_name']).':</dt><dd style="display:inline;">' . strip_tags($meta['meta_value']) .'</dd></dl>';
					}
				}
				if($is_mb)
				$count_str_numb += ceil( mb_strlen( strip_tags( __($item['name']) ) ) / 45 );
			} else { if($is_mb) $count_str_numb += ceil( mb_strlen( strip_tags( __($item['name']) ) ) / 45 ); else $count_str_numb++; }
		?> </td>
	<td style="text-align:left;width:0.1937in; " class="ce30"> </td>
	<td style="text-align:left;width:0.2118in; " class="ce31"><?php echo $item['qty']; ?></td>
	<td style="text-align:left;width:0.1409in; " class="ce31"> </td>
	<td style="text-align:left;width:0.0709in; " class="ce32"> </td>
	<td style="text-align:left;width:0.2118in; " class="ce35"><?php 
		$_okei = get_post_meta( $item["product_id"], '_okei', true ); 
		if(!$_okei) $_okei = get_option('is_default_okey_standard', '796');
		 echo saphali_invoice_doc_rus::okey_name($_okei);
		?> </td>
	<td style="text-align:left;width:0.1409in; " class="ce35"> </td>
	<td style="text-align:left;width:0.0709in; " class="ce30"> </td>
	<td style="text-align:left;width:0.2118in; " class="ce31"></td>
	<td style="text-align:left;width:0.2118in; " class="ce31"><?php echo number_format(($line_subtotal / $item['qty']), 2, ',', '') ; ?> </td>
	<td style="text-align:left;width:0.2118in; " class="ce31"> </td>
	<td style="text-align:left;width:0.1673in; " class="ce31"> </td>
	<td style="text-align:left;width:0.0437in; " class="ce30"> </td>
	<td style="text-align:left;width:0.2118in; " class="ce31"></td>
	<td style="text-align:left;width:0.2118in; " class="ce31"><?php  echo number_format($line_subtotal, 2, ',', ''); ?></td>
	<td style="text-align:left;width:0.2118in; " class="ce31"> </td>
	<td style="text-align:left;width:0.2118in; " class="ce31"> </td>
	<td style="text-align:left;width:0.1146in; " class="ce38"> </td>
	<td style="text-align:left;width:0.6362in; " class="Default"> </td>
	</tr>
<?php 
	if( isset($_GET['action']) && $is_mb && ((($count_str_numb) % 12 == 0 && !($count_group > 1) ) || (($count_str_numb) % 32 == 0 && $count_group > 1)) && $count != $all_count) {
		$count_group++;
		$count_str_numb = 0;
		?>
		<tr class="ro3"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.1146in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.0965in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.1673in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.1583in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.1673in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.1673in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.0173in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.1937in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.1409in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.0709in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.1409in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.0709in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.1673in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.0437in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.1146in; " class="ce1"> </td><td style="text-align:left;width:0.6362in; " class="ce1"> </td></tr>
		</table> <p style="page-break-after:always;"></p>
		<table  border="0" cellspacing="0" cellpadding="0" class="ta1">
		<colgroup><col width="8"/><col width="24"/><col width="13"/><col width="11"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="19"/><col width="18"/><col width="19"/><col width="19"/><col width="24"/><col width="2"/><col width="22"/><col width="24"/><col width="16"/><col width="8"/><col width="24"/><col width="16"/><col width="8"/><col width="24"/><col width="24"/><col width="24"/><col width="19"/><col width="5"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="13"/><col width="71"/></colgroup>
		<tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td colspan="2" style="text-align:left;width:0.2118in; " class="ce13"><p>№</p></td><td colspan="18" style="text-align:left;width:0.0965in; " class="ce22"><p>Товары (работы, услуги)</p></td><td colspan="3" style="text-align:left;width:0.1937in; " class="ce22"><p>Кол-во</p></td><td colspan="3" style="text-align:left;width:0.0709in; " class="ce22"><p>Ед.</p></td><td colspan="5" style="text-align:left;width:0.0709in; " class="ce22"><p>Цена</p></td><td colspan="6" style="text-align:left;width:0.0437in; " class="ce37"><p>Сумма</p></td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr>
		<?php
	}
}
	foreach($fee as $name => $t) {
		$count++;
		
		$line_subtotal = $t;
		
		$s_tax += 0;
		$s_subtotal += $line_subtotal;
		$item['line_tax'] = 0;
	?>
	<tr class="ro5">
	<td style="text-align:left;width:0.0709in; " class="Default"> </td>
	<td colspan="2" style="text-align:right; width:0.2118in; " class="ce14"><p><?php echo $count; ?></p></td>
	<td style="text-align:left;width:0.0965in; " colspan="18" class="ce23"> <?php echo $name; ?> </td>
	<td style="text-align:left;width:0.1937in; " class="ce30"> </td>
	<td style="text-align:left;width:0.2118in; " class="ce31">1</td>
	<td style="text-align:left;width:0.1409in; " class="ce31"> </td>
	<td style="text-align:left;width:0.0709in; " class="ce32"> </td>
	<td style="text-align:left;width:0.2118in; " class="ce35">шт</td>
	<td style="text-align:left;width:0.1409in; " class="ce35"> </td>
	<td style="text-align:left;width:0.0709in; " class="ce30"> </td>
	<td style="text-align:left;width:0.2118in; " class="ce31"></td>
	<td style="text-align:left;width:0.2118in; " class="ce31"><?php echo number_format(($line_subtotal ), 2, ',', '') ; ?> </td>
	<td style="text-align:left;width:0.2118in; " class="ce31"> </td>
	<td style="text-align:left;width:0.1673in; " class="ce31"> </td>
	<td style="text-align:left;width:0.0437in; " class="ce30"> </td>
	<td style="text-align:left;width:0.2118in; " class="ce31"></td>
	<td style="text-align:left;width:0.2118in; " class="ce31"><?php  echo number_format($line_subtotal, 2, ',', ''); ?></td>
	<td style="text-align:left;width:0.2118in; " class="ce31"> </td>
	<td style="text-align:left;width:0.2118in; " class="ce31"> </td>
	<td style="text-align:left;width:0.1146in; " class="ce38"> </td>
	<td style="text-align:left;width:0.6362in; " class="Default"> </td>
	</tr>
<?php 
	if( isset($_GET['action']) && $is_mb && ((($count_str_numb) % 12 == 0 && !($count_group > 1) ) || (($count_str_numb) % 32 == 0 && $count_group > 1)) && $count != $all_count) {
		$count_group++;
		$count_str_numb = 0;
		?>
		<tr class="ro3"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.1146in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.0965in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.1673in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.1583in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.1673in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.1673in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.0173in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.1937in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.1409in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.0709in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.1409in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.0709in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.1673in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.0437in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.2118in; " class="ce1"> </td><td style="border-top: solid 1px;text-align:left;width:0.1146in; " class="ce1"> </td><td style="text-align:left;width:0.6362in; " class="ce1"> </td></tr>
		</table> <p style="page-break-after:always;"></p>
		<table  border="0" cellspacing="0" cellpadding="0" class="ta1">
		<colgroup><col width="8"/><col width="24"/><col width="13"/><col width="11"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="19"/><col width="18"/><col width="19"/><col width="19"/><col width="24"/><col width="2"/><col width="22"/><col width="24"/><col width="16"/><col width="8"/><col width="24"/><col width="16"/><col width="8"/><col width="24"/><col width="24"/><col width="24"/><col width="19"/><col width="5"/><col width="24"/><col width="24"/><col width="24"/><col width="24"/><col width="13"/><col width="71"/></colgroup>
		<tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td colspan="2" style="text-align:left;width:0.2118in; " class="ce13"><p>№</p></td><td colspan="18" style="text-align:left;width:0.0965in; " class="ce22"><p>Товары (работы, услуги)</p></td><td colspan="3" style="text-align:left;width:0.1937in; " class="ce22"><p>Кол-во</p></td><td colspan="3" style="text-align:left;width:0.0709in; " class="ce22"><p>Ед.</p></td><td colspan="5" style="text-align:left;width:0.0709in; " class="ce22"><p>Цена</p></td><td colspan="6" style="text-align:left;width:0.0437in; " class="ce37"><p>Сумма</p></td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr>
		<?php
	}
}
if(!empty($order->order_shipping) && $order->order_shipping > 0) {
	$count++;
	$s_subtotal += $order->order_shipping;
	$item['line_tax'] = round($item['line_tax'], 2);
	?>
	<tr class="ro5">
	<td style="text-align:left;width:0.0709in; " class="Default"> </td>
	<td colspan="2" style="text-align:right; width:0.2118in; " class="ce14"><p><?php echo $count; ?></p></td>
	<td style="text-align:left;width:0.0965in; " colspan="18" class="ce23"> Доставка </td>
	<td style="text-align:left;width:0.1937in; " class="ce30"> </td>
	<td style="text-align:left;width:0.2118in; " class="ce31">1</td>
	<td style="text-align:left;width:0.1409in; " class="ce31"> </td>
	<td style="text-align:left;width:0.0709in; " class="ce32"> </td>
	<td style="text-align:left;width:0.2118in; " class="ce35"><?php 
		$_okei = '796';
		 echo saphali_invoice_doc_rus::okey_name($_okei);
		?> </td>
	<td style="text-align:left;width:0.1409in; " class="ce35"> </td>
	<td style="text-align:left;width:0.0709in; " class="ce30"> </td>
	<td style="text-align:left;width:0.2118in; " class="ce31"></td>
	<td style="text-align:left;width:0.2118in; " class="ce31"><?php echo $order->order_shipping; ?> </td>
	<td style="text-align:left;width:0.2118in; " class="ce31"> </td>
	<td style="text-align:left;width:0.1673in; " class="ce31"> </td>
	<td style="text-align:left;width:0.0437in; " class="ce30"> </td>
	<td style="text-align:left;width:0.2118in; " class="ce31"></td>
	<td style="text-align:left;width:0.2118in; " class="ce31"><?php  echo $order->order_shipping; ?></td>
	<td style="text-align:left;width:0.2118in; " class="ce31"> </td>
	<td style="text-align:left;width:0.2118in; " class="ce31"> </td>
	<td style="text-align:left;width:0.1146in; " class="ce38"> </td>
	<td style="text-align:left;width:0.6362in; " class="Default"> </td>
	</tr>
	<?php 
}
?>



	<tr class="ro3"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.1146in; " class="ce15"> </td><td style="text-align:left;width:0.0965in; " class="ce15"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.1673in; " class="ce15"> </td><td style="text-align:left;width:0.1583in; " class="ce15"> </td><td style="text-align:left;width:0.1673in; " class="ce15"> </td><td style="text-align:left;width:0.1673in; " class="ce15"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.0173in; " class="ce15"> </td><td style="text-align:left;width:0.1937in; " class="ce15"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.1409in; " class="ce15"> </td><td style="text-align:left;width:0.0709in; " class="ce15"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.1409in; " class="ce15"> </td><td style="text-align:left;width:0.0709in; " class="ce15"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.1673in; " class="ce15"> </td><td style="text-align:left;width:0.0437in; " class="ce15"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.2118in; " class="ce15"> </td><td style="text-align:left;width:0.1146in; " class="ce15"> </td><td style="text-align:left;width:0.6362in; " class="ce1"> </td></tr><tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1146in; " class="ce1"> </td><td style="text-align:left;width:0.0965in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.1583in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.0173in; " class="ce1"> </td><td style="text-align:left;width:0.1937in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td style="text-align:left;width:0.0709in; " class="ce36"> </td><td style="text-align:left;width:0.2118in; " class="ce36"> </td><td style="text-align:left;width:0.2118in; " class="ce36"> </td><td style="text-align:left;width:0.2118in; " class="ce36"> </td><td style="text-align:left;width:0.1673in; " class="ce36"><p>Итого:</p></td><td style="width: 1.0055in; text-align: center ;" colspan="6" ><p><?php echo number_format($s_subtotal, 2, ',', ''); ?></p></td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr><tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1146in; " class="ce1"> </td><td style="text-align:left;width:0.0965in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.1583in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.0173in; " class="ce1"> </td><td style="text-align:left;width:0.1937in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td colspan="5" style="text-align:right;width:0.8736in; " class="ce36"><p><?php if( empty($is_site_tax_enabled) ) _e('Без налога (НДС)', 'saphali-invoice'); else { $ftax = round($is_site_tax_enabled*100, 2); echo  sprintf(__('В том числе НДС (%s):', 'saphali-invoice'), $ftax . '%'); } ?></p></td><td style="text-align: center" colspan="6"><p><?php if($s_tax > 0) echo number_format($s_tax, 2, ',', ''); else echo '-'; ?> </p></td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr><tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1146in; " class="ce1"> </td><td style="text-align:left;width:0.0965in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.1583in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.0173in; " class="ce1"> </td><td style="text-align:left;width:0.1937in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td style="text-align:left;width:0.0709in; " class="ce36"> </td><td style="text-align:left;width:0.2118in; " class="ce36"> </td><td style="text-align:right;width:0.5909in; " class="ce36" colspan="3"><p>Всего к оплате:</p></td><td style="text-align: center" colspan="6" class=""><?php echo number_format($order->order_total, 2, ',', '');?></td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr><tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td colspan="37" style="text-align:left;width:0.2118in; " class="ce16"><p>Всего наименований <?php echo $count; ?>, на сумму <?php echo number_format($order->order_total, 2, ',', '');?> р. </p></td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr><tr class="ro6"><td style="text-align:left;width:0.0709in; " class="Default"> </td><td colspan="36" style="text-align:left;width:0.2118in; " class="ce17"><p><?php echo Saphali_Num2rub_doc::doit($order->order_total);?></p></td><td style="text-align:left;width:0.1146in; " class="Default"> </td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr><?php if(1) { ?><tr class="ro3"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.1146in; " class="ce11"> </td><td style="text-align:left;width:0.0965in; " class="ce11"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.1673in; " class="ce11"> </td><td style="text-align:left;width:0.1583in; " class="ce11"> </td><td style="text-align:left;width:0.1673in; " class="ce11"> </td><td style="text-align:left;width:0.1673in; " class="ce11"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.0173in; " class="ce11"> </td><td style="text-align:left;width:0.1937in; " class="ce11"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.1409in; " class="ce11"> </td><td style="text-align:left;width:0.0709in; " class="ce11"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.1409in; " class="ce11"> </td><td style="text-align:left;width:0.0709in; " class="ce11"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.1673in; " class="ce11"> </td><td style="text-align:left;width:0.0437in; " class="ce11"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.2118in; " class="ce11"> </td><td style="text-align:left;width:0.1146in; " class="ce11"> </td><td style="text-align:left;width:0.6362in; " class="ce1"> </td></tr><tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1146in; " class="ce1"> </td><td style="text-align:left;width:0.0965in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.1583in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.0173in; " class="ce1"> </td><td style="text-align:left;width:0.1937in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.0437in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1146in; " class="ce1"> </td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr><?php if(isset($data_check['this_is_P']) && $data_check['this_is_P']) { ?><tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce18" colspan="12"><p>Индивидуальный предприниматель</p></td><td style="text-align:left;width:0.1146in; " class="ce1"> </td><td style="text-align:left;width:0.0965in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce26"> </td><td style="text-align:left;width:0.2118in; " class="ce26"> </td><td style="text-align:left;width:0.2118in; " class="ce26"> </td><td style="text-align:left;width:0.2118in; " class="ce26"> </td><td style="text-align:left;width:0.2118in; " class="ce26"> </td><td style="text-align:left;width:0.2118in; " class="ce26"> </td><td style="text-align:left;width:0.2118in; " class="ce26"> </td><td style="text-align:left;width:0.2118in; " class="ce26"> </td><td class="ce1" style="text-align:left;width:0.0965in; "> </td><td colspan="8" style="text-align:left;width:0.2118in; " class="ce27"><p style="text-align:left"><?php echo $data['initial_ip'] ; ?></p></td><td style="text-align:left;width:0.6362in; " class="Default" colspan="6"> </td></tr><?php } else { ?><tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce18"><p>Руководитель</p></td><td style="text-align:left;width:0.1146in; " class="ce1"> </td><td style="text-align:left;width:0.0965in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce26"> </td><td style="text-align:left;width:0.2118in; " class="ce26"> </td><td style="text-align:left;width:0.2118in; " class="ce26"> </td><td style="text-align:left;width:0.2118in; " class="ce26"> </td><td colspan="9" style="text-align:left;width:0.2118in; " class="ce27"><p><?php echo $data['initial_bos'] ; ?></p></td><td style="text-align:left;width:0.0173in; " class="ce1"> </td><td style="text-align:left;width:0.1937in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce18"><p>Бухгалтер</p></td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce26"> </td><td style="text-align:left;width:0.2118in; " class="ce26"> </td><td style="text-align:left;width:0.2118in; " class="ce26"> </td><td colspan="7" style="text-align:left;width:0.1673in; " class="ce27"><p><?php echo $data['initial_buhg'] ; ?></p></td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr><?php } if(!empty($stamp_image)) { ?><tr><td class="ce1" style="text-align:left;width:0.0709in; "> </td><td class="ce18" style="text-align:left;width:0.2118in; "></td><td class="ce1" style="text-align:left;width:0.1146in; "> </td><td class="ce1" style="text-align:left;width:0.0965in; "> </td><td class="ce1" style="text-align:left;width:0.2118in; "> </td><td class="ce1" style="text-align:left;width:0.2118in; "> </td><td class="ce1" style="text-align:left;width:0.2118in; "> </td><td colspan="32"><div class="logo_stamp"><img style="margin: -30px 0 0 <?php if(isset($data_check['this_is_P']) && $data_check['this_is_P']) echo '123'; else echo '-68'; ?>px; position: relative; height: 150px; z-index: -2;opacity: 0.95;" src="<?php echo $stamp_image; ?>" /></div></td></tr><?php } ?><tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1146in; " class="ce1"> </td><td style="text-align:left;width:0.0965in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.1583in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.0173in; " class="ce1"> </td><td style="text-align:left;width:0.1937in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.0437in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1146in; " class="ce1"> </td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr><tr class="ro2"><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1146in; " class="ce1"> </td><td style="text-align:left;width:0.0965in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.1583in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.0173in; " class="ce1"> </td><td style="text-align:left;width:0.1937in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1409in; " class="ce1"> </td><td style="text-align:left;width:0.0709in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1673in; " class="ce1"> </td><td style="text-align:left;width:0.0437in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.2118in; " class="ce1"> </td><td style="text-align:left;width:0.1146in; " class="ce1"> </td><td style="text-align:left;width:0.6362in; " class="Default"> </td></tr><?php } ?></table></body></html>
