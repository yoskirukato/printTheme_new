<?php 

function woocustomjs_scripts() {
	wp_enqueue_style( 'woocommerce-custom-style', get_template_directory_uri() . '/css/woocommerce-custom-style.css');
	
	wp_enqueue_script( 'woocommerce-custom-fn', get_template_directory_uri() . '/js/woocommerce-custom-fn.js', array(), time(), true );
	   
	wp_localize_script( 'woocommerce-custom-fn', 'woocommerce_custom',
		array(
			'url' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('send_request_from_client')
		)
	);
	
}
add_action( 'wp_enqueue_scripts', 'woocustomjs_scripts' );

add_action( 'woocommerce_before_checkout_billing_form', 'organisation_checkout_field' );
function organisation_checkout_field( $checkout ) {
	$company = get_user_meta( get_current_user_id(),  'company', 'on' );
    echo '<div id="organisation_checkout_field">';	
    woocommerce_form_field( 'organisation', array(
        'type'    => 'radio',
        'class'   => array('form-row-wide hidden'),
        'label'   =>  '',
		'required'=>true,
	    'options' => array(
			'private_person' => 'Физическое лицо',
			'company' => 'Юридическое лицо (Оргацизация или ИП)'
			)
        ), $company ? 'company' : '');
    echo '</div>';
}

add_action( 'woocommerce_legal_face', 'my_custom_checkout_field_legal_face' );
function my_custom_checkout_field_legal_face( $checkout ) {
	$current_user = wp_get_current_user();
	$user_id = $current_user->ID;

	$company = get_user_meta( $user_id ,  'company', 'on' );
	
    echo '<div class="woocommerce-organisation-fields__field-wrapper" '. (!$company ? 'style="display:none"': '') .'><h3>Реквизиты организации</h3>';

	echo '<div class="organisation-search">';
	echo '<div class="form-group form-row"><input class="input-text organisation-search--input" placeholder="Введите ИНН и нажмите кнопку"><button type="button" class="button alt">Заполнить</button></div>';
	echo '</div>';
	
	woocommerce_form_field( 'organisation_type', array(
		'required'      => true,
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide hidden'),
        'placeholder'   => __('Вид организации'),
    ), get_user_meta( $user_id, 'organisation_type', true ));
	
	woocommerce_form_field( 'organisation_inn', array(
		'required'      => true,
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'placeholder'   => __('ИНН'),
    ), get_user_meta( $user_id, 'organisation_inn', true ));
	
	woocommerce_form_field( 'organisation_kpp', array(
		'required'      => false,
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'placeholder'   => __('КПП'),
    ), get_user_meta( $user_id, 'organisation_kpp', true ));
	
	 woocommerce_form_field( 'organisation_name', array(
		'required'      => true,
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'placeholder'   => __('Наименование организации'),
    ), get_user_meta( $user_id, 'organisation_name', true ));
		

	woocommerce_form_field( 'organisation_address', array(
		'required'      => true,
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'placeholder'   => __('Юридический адрес'),
    ), get_user_meta( $user_id, 'organisation_address', true ));		

    echo '</div>';
} 

add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');
function my_custom_checkout_field_process() {
	$radioVal = $_POST["organisation"];

	if($radioVal == "company") {
		if ( ! $_POST['organisation_name'] ) wc_add_notice( __( '<strong>Наименование организации</strong> является обязательным полем.' ), 'error' );
		if ( ! $_POST['organisation_address'] ) wc_add_notice( __( '<strong>Юридический адрес</strong> является обязательным полем.' ), 'error' );
		
		if ( $_POST['organisation_type'] != 'ИП') {
			if ( ! $_POST['organisation_kpp'] ) wc_add_notice( __( '<strong>КПП</strong> является обязательным полем.' ), 'error' );
		}
		
		if ( ! $_POST['organisation_inn'] ) wc_add_notice( __( '<strong>ИНН</strong> является обязательным полем.' ), 'error' );
	}
}


add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta', 10,2  );
function my_custom_checkout_field_update_order_meta($order_id, $posted ) {
	$current_user = wp_get_current_user();
	$user_id = $current_user->ID;

	$order = wc_get_order( $order_id );
	
	$radioVal = $_POST["organisation"];
	
	if($radioVal == "company") { 
		update_user_meta( $user_id, 'company', 'on' ); 
	} else { 
		delete_user_meta( $user_id, 'company' );	
	}

    if ( ! empty( $_POST['organisation_name'] ) ) {
		$organisation_name = sanitize_text_field( $_POST['organisation_name'] );
		update_user_meta( $user_id, 'organisation_name', $organisation_name );
		$order->update_meta_data( 'organisation_name', $organisation_name );
	}
    if ( ! empty( $_POST['organisation_address'] ) ) {
		$organisation_address = sanitize_text_field( $_POST['organisation_address'] );
		update_user_meta( $user_id, 'organisation_address',  $organisation_address); 
		$order->update_meta_data( 'organisation_address', $organisation_address );
	}
	if ( ! empty( $_POST['organisation_type'] ) ) {
		$organisation_type = sanitize_text_field( $_POST['organisation_type'] );
		update_user_meta( $user_id, 'organisation_type',  $organisation_type); 
		$order->update_meta_data( 'organisation_type', $organisation_type );
	}
    if ( ! empty( $_POST['organisation_inn'] ) ) { 
		$organisation_inn = sanitize_text_field( $_POST['organisation_inn'] );
		update_user_meta( $user_id, 'organisation_inn',  $organisation_inn);
		$order->update_meta_data( 'organisation_inn', $organisation_inn );
	}
	if ( ! empty( $_POST['organisation_kpp'] ) ) { 
		$organisation_kpp = sanitize_text_field( $_POST['organisation_kpp'] );
		update_user_meta( $user_id, 'organisation_kpp',  $organisation_kpp);
		$order->update_meta_data( 'organisation_kpp', $organisation_kpp );
	}
   
    $order->save();
	
}

add_action( 'woocommerce_order_details_after_customer_details', 'organisation_checkout_field_echo_in_order' );
function organisation_checkout_field_echo_in_order($order) {
	$user_id = get_current_user_id();	
	$user_id_company = get_user_meta( $user_id, 'company', 'on' );
	
	if($user_id_company) {
		
		$organisation_name = get_user_meta( $user_id, 'organisation_name', true ) ;
		$organisation_address = get_user_meta( $user_id, 'organisation_address', true ) ;
		$organisation_inn = get_user_meta( $user_id, 'organisation_inn', true ); 
		$organisation_kpp = get_user_meta( $user_id, 'organisation_kpp', true ); 
		
		echo '<h2>Реквизиты компании</h2>';
		echo 'Наименование: '.$organisation_name.'<br>';
		echo 'Адрес: '.$organisation_address.'<br>';
		echo 'ИНН: '.$organisation_inn.'<br>';
		
		if ($organisation_kpp) {
			echo 'КПП: '.$organisation_kpp.'<br>';
		}
		
		
	}
}

add_action( 'woocommerce_insert_organisation_details', 'organisation_checkout_field_echo_in_order' );


add_action( 'woocommerce_admin_order_data_after_shipping_address', 'organisation_checkout_field_echo_in_admin_order' );
function organisation_checkout_field_echo_in_admin_order($order) {

	$user_id = $order->get_user_id(); 
	$user_id_company = get_user_meta( $user_id, 'company', 'on' );
	
	if($user_id_company) {
		
		
		$organisation_name = stripslashes($order->get_meta('organisation_name'));
		$organisation_address = stripslashes($order->get_meta('organisation_address'));
		$organisation_inn = stripslashes($order->get_meta('organisation_inn'));
		$organisation_kpp = stripslashes($order->get_meta('organisation_kpp'));
		$organisation_type = stripslashes($order->get_meta('organisation_type'));
		
		
		echo '</div></div><div class="clear"></div>';
		echo '<div class="order_data_column_container"><div class="order_data_column_wide">';
		echo '<h3>Реквизиты компании</h3>';
		echo 'Наименование: '.$organisation_name.'<br>';
		echo 'Адрес: '.$organisation_address.'<br>';
		echo 'Вид организации: ' . $organisation_type . '<br>';
		echo 'ИНН: '.$organisation_inn.'<br>';
		
		if ($organisation_kpp) {
			echo 'КПП: '.$organisation_kpp.'<br>';
		}
	}
}

add_action( 'woocommerce_email_customer_details', 'woocommerce_email_after_order_table_func', 50 );
function woocommerce_email_after_order_table_func() {
	$user_id = get_current_user_id();
	$user_id_company = get_user_meta( $user_id, 'company', 'on' );
	
	if($user_id_company) {
		
		
	?>

	<h3>Реквизиты компании</h3>
	<table>
		<tr>
			<td><strong>Наименование: </strong></td>
			<td><?php echo wptexturize( get_user_meta( $user_id, 'organisation_name', true ) ); ?></td>
		</tr>
		<tr>
			<td><strong>Адрес: </strong></td>
			<td><?php echo wptexturize( get_user_meta( $user_id, 'organisation_address', true ) ); ?></td>
		</tr>
		<tr>
			<td><strong>ИНН: </strong></td>
			<td><?php echo wptexturize( get_user_meta( $user_id, 'organisation_inn', true ) ); ?></td>
		</tr>
		<?php if ($organisation_kpp = get_user_meta( $user_id, 'organisation_kpp', true )) {?>
			<tr>
			<td><strong>КПП: </strong></td>
			<td><?php echo wptexturize( $organisation_kpp ); ?></td>
		</tr>
		<?php }?>
		
	</table>

	<?php
	}
}

add_filter( 'woocommerce_available_payment_gateways', 'kvk_field_cheque_payment_method', 20, 1);
function kvk_field_cheque_payment_method( $gateways ){
if( !is_admin() ) {
    foreach( $gateways as $gateway_id => $gateway ) {

        if( WC()->session->get( 'is_company' ) ){
			if ( $gateway_id !==  'beznal' ) {
				unset( $gateways[$gateway_id] );
			}
        }else{
			unset( $gateways['beznal'] );
		}
    }
    return $gateways;
}
}

// The WordPress Ajax PHP receiver
add_action( 'wp_ajax_kvk_nummer', 'get_ajax_kvk_nummer' );
add_action( 'wp_ajax_nopriv_kvk_nummer', 'get_ajax_kvk_nummer' );
function get_ajax_kvk_nummer() {
	
    if ( $_POST['organisation'] == 'company' ){
        WC()->session->set('is_company', '1');
    } else {
        WC()->session->set('is_company', '0');
    }
    die();
}

// The jQuery Ajax request
add_action( 'wp_footer', 'checkout_kvk_fields_script' );
function checkout_kvk_fields_script() {
    // Only checkout page
    if( is_checkout() && ! is_wc_endpoint_url() ):

    // Remove "is_company" custom WC session on load
    if( WC()->session->get('is_company') ){
        WC()->session->__unset('is_company');
    }
    ?>
    <script type="text/javascript">
        jQuery( function($){
            var a = 'input[name=organisation]';

            // Ajax function
            function checkKvkNummer( value ){
                 $.ajax({
                    type: 'POST',
                    url: wc_checkout_params.ajax_url,
                    data: {
                        'action': 'kvk_nummer',
						'organisation': $('input[name=organisation]:checked').val(),
                        //'organisation': value != '' ? 1 : 0, // чредование значений для валидации text или включения checkbox
                    },
                    success: function (result) {
                        $('body').trigger('update_checkout');
                    }
                });
            }

            // On start
            checkKvkNummer($(a).val());

            // On change event
            $(a).change( function () {
                checkKvkNummer($(this).val());
            });
        });
    </script>
    <?php
    endif;
};


add_filter('woocommerce_product_data_tabs', 'adv_product_settings_tabs' );
function adv_product_settings_tabs( $tabs ){
 
	$tabs['special_by_photo'] = array(
		'label'    => 'Доп. скидка',
		'target'   => 'special_by_photo_product_data',
		'class'    => array(),
		'priority' => 21,
	);
	return $tabs;
 
}
 
/*
 * Tab content
 */
add_action( 'woocommerce_product_data_panels', 'adv_product_product_panels' );
function adv_product_product_panels(){
 
	echo '<div id="special_by_photo_product_data" class="panel woocommerce_options_panel">';
 
	$special_by_photo = get_post_meta( get_the_ID(), 'special_by_photo', true );
	$percent = get_post_meta( get_the_ID(), 'special_by_photo_percent', true );
	
	$field_class = $special_by_photo == 'yes' ? '' : 'hidden';
	
	woocommerce_wp_checkbox( array(
		'id'      => 'special_by_photo',
		'value'   => $special_by_photo,
		'label'   => 'Дополнительная скидка',
		'desc_tip' => true,
		'description' => 'При добавлении фотографии принтера',
	) );
	
	woocommerce_wp_text_input( array(
		'id'                => 'special_by_photo_percent',
		'value'             => $percent ? $percent : 0,
		'label'             => 'Скидка (%)',
		'wrapper_class'		=> $field_class,
		'data_type'			=> 'decimal',
		'description'       => ''
	) );

	echo '<script>
		(function($){
			$(document).ready(function(){
				$("#special_by_photo").on("change", function(){
					if ( $(this).is(":checked")) {
						$(".special_by_photo_percent_field").removeClass("hidden");
					}else{
						$(".special_by_photo_percent_field").addClass("hidden");
					}
				});
			});
		})(jQuery);
	</script>';
	echo '</div>';
 
}
 
add_action( 'woocommerce_process_product_meta', 'adv_product_save_fields', 10, 2 );
function adv_product_save_fields( $id, $post ){
 
	if( !empty( $_POST['special_by_photo'] ) ) {
		update_post_meta( $id, 'special_by_photo', $_POST['special_by_photo'] );
		update_post_meta( $id, 'special_by_photo_percent', $_POST['special_by_photo_percent'] );
	} else {
		delete_post_meta( $id, 'special_by_photo' );
		delete_post_meta( $id, 'special_by_photo_percent' );
	}
 
}

function getSessionProductAdvPhoto($product_id){
	
	if ( isset($_SESSION['product_' . $product_id . '_add_photo']) ) { 
	
		$image = $_SESSION['product_' . $product_id . '_add_photo'];
		
		$filename = pathinfo($image);
		
		$upload = wp_upload_dir();
		
		$photo_path = '/adv_product_images/' . md5($product_id);
		
		$upload_dir = $upload['baseurl'];
		
		$image_org_path = $photo_path . '/' . $image;
		
		$image_path = $photo_path . '/' . $filename['filename'] .'-70x70.'. $filename['extension'];
		
		if( is_file($upload['basedir'] . $image_org_path)){
			$result =  array( 
				'org' => $upload['baseurl'] . $image_org_path,
				'path' => $upload['basedir'] . $image_org_path,
				'crop' => is_file( $upload['basedir'] . $image_path) ? $upload['baseurl'] . $image_path : $upload['baseurl'] . $image_org_path
			);
			
			return $result;
		}
	
	}
	
	return false;
};

function woocommerce_custom_fields_display(){
	global $post;
	$product = wc_get_product($post->ID);
	$special_by_photo = $product->get_meta('special_by_photo');
	$product_session_image = getSessionProductAdvPhoto($post->ID);

	if ($special_by_photo == 'yes') { 
		$percent = get_post_meta( $post->ID, 'special_by_photo_percent', true );
		$price = $product->get_regular_price();
		$newprice = $price - ($price * ((float) $percent / 100));
		$skidka = $price - $newprice;
		?>
		<div class="description" style="background-color: #fff4e0;">
		<?php echo sprintf('<center style="font-weight: bold;font-size: 15px;margin-bottom: 10px;color: #ff5722;">Можно купить дешевле!</center><p>Для покупки товара за <b>%s</b> со скидкой, в размере <b>%s</b> (скидка <b>%s</b> руб.), необходимо загрузить фотографию шильдика принтера с серийным номером (на обратной стороне устройства)</p>', wc_price($newprice), $percent . '%', $skidka);?>
		
			<?php if ( !$product_session_image ) { ?> 
				<p class="text-center"><a href="#" class="show_more_desc">Показать полностью...</a></p>
				<div class="description-inner description-inner--hidden">
			<?php }else{?>
				<div class="description-inner">
			<?php } ?>
			
				<div class="custom-image">
					<?php if ( $product_session_image ) { ?>
						<div class="custom-image-wrap">
							<span class="loader hidden"></span>
							<img src="<?php echo $product_session_image['crop']; ?>" class="no_lazy img-responsive adv_photo">
						</div>
						<div class="custom-image-btns">
							<ul class="list-unstyled">
								<li><button type="button" data-product_id="<?= $post->ID ?>" class="photo-upload button">Изменить</button></li>
								<li><button type="button" data-product_id="<?= $post->ID ?>" class="remove-product-img button">Удалить</button></li>
							</ul>
						</div>
					<?php }else{ ?>
						<div class="custom-image-wrap hidden">
							<span class="loader hidden"></span>
							<img src="" class="no_lazy img-responsive adv_photo">
						</div>
						<div class="custom-image-btns">
							<ul class="list-unstyled">
								<li><button type="button" data-product_id="<?= $post->ID ?>" class="photo-upload button">Загрузить</button></li>
								<li><button type="button" data-product_id="<?= $post->ID ?>" class="remove-product-img button hidden">Удалить</button></li>
							</ul>
						</div>
					<?php }?>
					
				</div>
				<center><b>Образец фотографии шильдика</b></center>
				<img src='/wp-content/themes/printTheme/img/shildik.png'>
				<p style="font-style: italic;">*Перед отправкой головок, шильдики сверяются по серийным номерам. Если шильдик уже был использован для заказа печатающей головки, скидка будет аннулирована</p>
			</div>
        </div>
		<?php
	}
}

add_action('woocommerce_before_add_to_cart_button', 'woocommerce_custom_fields_display');

add_action('wp_ajax_delete_adv_photo', 'deleteProductAdvPhoto');
add_action('wp_ajax_nopriv_delete_adv_photo', 'deleteProductAdvPhoto');

function deleteProductAdvPhoto(){
	$product_id = isset($_POST['product_id']) ? (int) $_POST['product_id'] : 0;
	
	if ($product_id && isset($_SESSION['product_' . $product_id . '_add_photo'])) {
		$image = $_SESSION['product_' . $product_id . '_add_photo'];
		
		unset($_SESSION['product_' . $product_id . '_add_photo']);
		
		$upload = wp_upload_dir();
		
		$user_path = '/adv_product_images/' . md5($product_id);
		
		$upload = wp_upload_dir();
		$upload_dir = $upload['basedir'];
		
		$image_path = $upload_dir . $user_path;
		
		if ( is_file( $image_path . '/' . $image)) {
			removeCacheImage($image_path . '/' . $image, $image_path);
		}
		
		$message['messages'] = 'Изображение удалено';
		
		wp_send_json_success( $message );
	}
	
	wp_die();
}
	
add_action('wp_ajax_upload_adv_photo', 'uploadAdvPhotoToProduct');
add_action('wp_ajax_nopriv_upload_adv_photo', 'uploadAdvPhotoToProduct');

function uploadAdvPhotoToProduct(){
	
	$errors = array();
	$product_id = isset($_POST['product_id']) ? (int) $_POST['product_id'] : 0;
	$image = $_FILES['file'];

	if (!empty($image['name']) && is_file($image['tmp_name'])) {
			// Sanitize the filename
			$filename = basename(preg_replace('/[^a-zA-Z0-9\.\-\s+]/', '', html_entity_decode($image['name'], ENT_QUOTES, 'UTF-8')));

			// Validate the filename length
			if ((strlen(utf8_decode($filename)) < 3) || (strlen(utf8_decode($filename)) > 64)) {
				$errors['error'] = 'Имя файла должно быть от 3 до 64 символов!';
			}

			// Allowed file extension types
			$allowed = array();
			
			$filetypes = array('png', 'jpeg', 'jpg');

			foreach ($filetypes as $filetype) {
				$allowed[] = trim($filetype);
			}

			if (!in_array(strtolower(substr(strrchr($filename, '.'), 1)), $allowed)) {
				$errors['error'] = 'Неправильный тип файла!';
			}

			// Allowed file mime types
			$allowed = array();

			$filetypes = array('image/png', 'image/jpeg', 'image/jpg');

			foreach ($filetypes as $filetype) {
				$allowed[] = trim($filetype);
			}

			if (!in_array($image['type'], $allowed)) {
				$errors['error'] = 'Неправильный тип файла!';
			}

			// Check to see if any PHP files are trying to be uploaded
			$content = file_get_contents($image['tmp_name']);

			if (preg_match('/\<\?php/i', $content)) {
				$errors['error'] = 'Неправильный тип файла!';
			}

			// Return any upload error
			if ($image['error'] != UPLOAD_ERR_OK) {
				$errors['error'] = 'Необходимо загрузить файл! ' . $image['error'];
			}
		} else {
			$errors['error'] = 'Необходимо загрузить файл!';
		}

	if ($product_id == 0) {
		$errors['error'] = 'Товар отсутсвует';
	}
	
	if ($errors) {
		wp_send_json_error( $errors );
	}else{

		$upload = wp_upload_dir();
		$upload_dir = $upload['baseurl'];
			
		$user_path = '/adv_product_images/' . md5($product_id);
		
		$old_image = isset($_SESSION['product_' . $product_id . '_add_photo']) ? $_SESSION['product_' . $product_id . '_add_photo'] : false;
		
		$extension = pathinfo($image['name'], PATHINFO_EXTENSION );
		
		$new_filename = cvf_td_generate_random_code( 20 ) . '.' . $extension;
		
		$image_path  = create_new_dir( $user_path );
		
		move_uploaded_file($image['tmp_name'], $image_path . '/' . $new_filename );
		
		if ( $old_image !== false && is_file( $image_path . '/' . $old_image)) {
			removeCacheImage($image_path . '/' . $old_image, $image_path);
		}
		
		$_SESSION['product_' . $product_id . '_add_photo'] = $new_filename;
		
		
		$image_resize = resizeImage($image_path . '/' . $new_filename, $image_path );

		if ($image_resize) {
			$image_resize = $upload_dir .  $user_path . '/' .  $image_resize;
			$message['image'] = $image_resize;
		}else{
			$message['image'] = $upload_dir .  $user_path . '/' . $image_resize;
		}
			
		$message['messages'] = 'Изображение загружено';
	
		
		wp_send_json_success( $message );

	}

	wp_die();
}


function resizeImage($image, $path, $w = 70, $h = 70){
	$filename = pathinfo($image);

	$image = wp_get_image_editor( $image );

	if ( ! is_wp_error( $image ) ) {
		$image->resize( $w, $h, true );

		$file_cache_name = sprintf( '%s-%sx%s.%s', $filename['filename'], $w, $h, $filename['extension']);

		$image->save( $path . '/' . $file_cache_name );


		return $file_cache_name;
	}
}

function create_new_dir($dir) {
	$upload = wp_upload_dir();
	$upload_dir = $upload['basedir'];
	$upload_dir = $upload_dir . '/' . $dir;

	if(is_dir($upload_dir)) {
		return $upload_dir;
	}else{
		if ( wp_mkdir_p( $upload_dir ) ){
			return $upload_dir;
		}
	}

	return false;

}

function cvf_td_generate_random_code($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
  
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;
}

function removeCacheImage($image, $path){
	if (is_file($image)){
		$filename = pathinfo($image);
		$cache_file = glob($path . '/' . $filename['filename'] . '*');

		if ($cache_file) {
			foreach ($cache_file as $file) {
				if (file_exists($file)) {
					@unlink($file);
				}
			}
		}
	}
}

add_filter( 'woocommerce_email_attachments', 'webroom_attach_to_wc_emails', 10, 3);
function webroom_attach_to_wc_emails ( $attachments , $email_id, $order ) {

    if ( ! is_a( $order, 'WC_Order' ) || ! isset( $email_id ) ) {
        return $attachments;
    }
	
	if( $email_id == 'new_order' ){
		foreach( $order->get_items() as $item_id => $item ){
			
			$product_id = $item['product_id'];
		
			$special_by_photo = get_post_meta( $product_id, 'special_by_photo', true );
			$product_session_image = getSessionProductAdvPhoto($product_id);
			
		
			if ($special_by_photo == 'yes' && $product_session_image !== false) {
				$file_path = $product_session_image['path'];
			
				$attachments[] = $file_path;
				
			}
			
		}
	}

	return $attachments;
}

function ur_theme_start_session()
{
    if (!session_id()) {
		session_start();
	}      
}
add_action("init", "ur_theme_start_session", 1);

//Проверка наличия товара при оформлении заказа
add_action( 'woocommerce_after_checkout_validation', 'checkout_product_stock_validation', 10, 2);
 
function checkout_product_stock_validation( $fields, $errors ){
 
	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$product_id = $cart_item['product_id'];
		$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

		if ( !$_product->get_virtual() ) {
			$delete_btn =  apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
								'<a href="%s" class="remove_from_cart_button" style="color: red" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">удалить</a>',
								esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
								__( 'Remove this item', 'woocommerce' ),
								esc_attr( $product_id ),
								esc_attr( $cart_item_key ),
								esc_attr( $_product->get_sku() )
							), $cart_item_key );
							
			if ( $_product->get_stock_quantity() <= 0 ){	
				$errors->add( 'validation', sprintf('<strong>Добавленный в заказ товар "%s" закончился, %s его из заказа?</strong>', $_product->get_name(), $delete_btn) );
			}elseif( $_product->get_stock_quantity() < $cart_item['quantity'] ) {
				$errors->add( 'validation', sprintf('<strong>Количество добавленного в заказ товара "%s" недостаточно на складе, %s его из заказа или <a href="%s">изменить количество?</a></strong>', $_product->get_name(), $delete_btn, esc_url( wc_get_cart_url() )) );   
			}
		}
		
		
    }
	 
   
}

add_action( 'woocommerce_checkout_process', 'ts_minimum_order_item_count' );
