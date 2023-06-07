	<div class="row footer">
		<div class="cpwrght">
			<div class="foot-menu">
			<?php wp_nav_menu( array(
						'theme_location'  	=> 'footermenu',
						'menu' 				=> 'footermenu',
						'depth' 			=> 0,
						'container' 		=> false,
						'menu_class' 		=> 'footer-nav',
					));?>
			</div>		
			<div class="payment">Мы принимаем: 
			<img alt="Способы оплаты" title="Способы оплаты" class="logopayment" src="//printblog.ru/wp-content/themes/printTheme/img/payment/paysystem.png">

			</div>		
			<p style="text-align: center;">При копировании любых материалов с сайта, ссылка на первоисточник обязательна!</p>		
			<p style="text-align: center;"><b>Тел.:</b> +7 (978) 797-68-58, <b>E-mail:</b> store@printblog.ru</p>
			<p style="text-align: center;"> Республика Крым, г. Симферополь, <a href="//printblog.ru">printblog.ru</a> © 2011-<?php echo date("Y"); ?></p>
			<center>
				<div class="social-footer">
					
					<a href="https://twitter.com/printbloger" target="_blank"><img src="//printblog.ru/wp-content/themes/printTheme/img/social/twitter.png" alt=""></a>
					<a href="https://vk.com/printblog" target="_blank"><img src="//printblog.ru/wp-content/themes/printTheme/img/social/vk.png" alt=""></a>
					<a href="https://www.youtube.com/user/japodonok" target="_blank"><img src="//printblog.ru/wp-content/themes/printTheme/img/social/youtube.png" alt=""></a>
				</div>
			</center>
		</div>
		<?php wp_footer(); ?>
	</div>
</div>

<link rel="stylesheet" href="/wp-content/themes/printTheme/css/fonts.css" />
<link rel="stylesheet" href="/wp-content/themes/printTheme/css/bbpress.css" />
<link rel="stylesheet" href="/wp-content/themes/printTheme/libs/slider/slider.css" />
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
<script src="//printblog.ru/wp-content/themes/printTheme/js/bootstrap.min.js"></script>
<script src="//printblog.ru/wp-content/themes/printTheme/libs/slider/slider.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<script src="//ulogin.ru/js/ulogin.js"></script> 


<script>
jQuery("body").delegate("#billing_state", 'change', function(){
    if( jQuery(this).val() == "КРЫМ РЕСПУБЛИКА" ) {
        if( jQuery("#s2id_billing_state").is('div') ) {
            jQuery("#s2id_billing_state").before('<span class="info_state">Для указания <strong>Симферополя</strong> или <strong>Севастополя</strong> нужно выбрать здесь Симферополь или Севастополь.</span>');
            if( 480 > jQuery(window).width() ) {
                jQuery('label[for="billing_state"]').css({'margin-bottom': '47px'});
                jQuery(".info_state").css({'position': 'absolute', 'width': '100%', 'margin-top': '-52px'});
            } else {
                jQuery('label[for="billing_state"]').css({'margin-bottom': '5px'});
                jQuery('label[for="billing_postcode"]').css({'margin-bottom': '5px'});    
                jQuery(".info_state").css({'position': 'absolute', 'width': '46%', 'margin-top': '-55px'});
            }
        } else {
            jQuery(this).before('<span class="info_state">Для указания <strong>Симферополя</strong> или <strong>Севастополя</strong> нужно выбрать здесь Симферополь или Севастополь.</span>');
            if( 480 > jQuery(window).width() ) {
                jQuery('label[for="billing_state"]').css({'margin-bottom': '47px'});
                jQuery(".info_state").css({'position': 'absolute', 'width': '50%', 'margin-top': '-52px'});                
            } else {
                jQuery('label[for="billing_state"]').css({'margin-bottom': '5px'});
                jQuery('label[for="billing_postcode"]').css({'margin-bottom': '5px'});
                jQuery(".info_state").css({'position': 'absolute', 'width': '46%','margin-top': '-55px'});
            }
        }
        
        jQuery(".info_state").hide().show('slow');
        
        
 
    } else {
        jQuery(".info_state").remove();
        if( jQuery("#s2id_billing_state").is('div') )
            jQuery('label[for="billing_state"], label[for="billing_postcode"]').css({'margin-bottom': '0'});
        else {
            jQuery('label[for="billing_state"]').css({'margin-bottom': '0'});
            jQuery('label[for="billing_postcode"]').css({'margin-bottom': '0'});
        }
    }
});
</script>
	
			
<!-- ---------------------Модальные окна ---------------------- -->
	<div class="modal fade" id="loginsite">
	  <div class="modal-dialog" style="width: 400px;">
	    <div class="modal-content" style="max-width:400px;">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Авторизация на сайте</h4>
	      </div>
	      <div class="modal-body">
			<?php  /* Панель входа на сайт */
								global $user_ID, $user_identity;
								wp_get_current_user();
								if (!$user_ID): ?>			
									<?php 
										$args = array(
											'echo'           => true,
											'redirect'       => site_url( $_SERVER['REQUEST_URI'] ), 
											'form_id'        => 'loginform',
											'label_username' => __( 'Адрес e-mail или логин' ),
											'label_password' => __( 'Password' ),
											'label_remember' => __( 'Remember Me' ),
											'label_log_in'   => __( 'Log In' ),
											'id_username'    => 'user_login',
											'id_password'    => 'user_pass',
											'id_remember'    => 'remember',
											'id_submit'      => 'wp-submit',
											'remember'       => true,
											'value_username' => NULL,
											'value_remember' => false 
										);
									wp_login_form( $args ); ?>

			<!-- --<button type="button" class="btn btn-warning">Регистрация</button>-->
			<center><i class="fa fa-key" aria-hidden="true"></i> <a href="//printblog.ru/my-account/lost-password">Забыли пароль?</a></center>
			<hr>
			<p>Только зарегистрированным пользователям доступны <a href="//printblog.ru/discount">накопительные скидки</a> и другие преимущества нашего сайта</p>
			<a href="//printblog.ru/my-account" class="btn btn-warning btn-register" style="width: 100%">Регистрация</a>
			<br>
			<?php else: ?>
				Добро пожаловать, <?php echo $user_identity; ?>
			    <a href="<?php echo wp_logout_url( get_permalink() ); ?>">Выйти</a>
			    <hr>
			    <?php wp_register( $before = '<div class="btn btn-warning btn-register">', $after = '</div>', $echo = true ); ?>
			<?php endif; ?>
				<hr>
				<p>Также у вас есть возможность авторизоваться на сайте с помощью социальных сетей:<br></p>
			<?php echo get_ulogin_panel($panel = 0, $with_label = false, $is_logining = false, $id=''); ?>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>	        
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<div class="modal fade" id="callback">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Закажите обратный звонок</h4>
	      </div>
	      <div class="modal-body">

	        

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

    
<!-- снипет поиска -->
<script async type='application/ld+json'>{"@context":"\/\/schema.org","@type":"WebSite","@id":"#website","url":"\/\/printblog.ru\/","name":"printblog","potentialAction":{"@type":"SearchAction","target":"\/\/printblog.ru\/?s={search_term_string}","query-input":"required name=search_term_string"}}</script>
<!-- снипет поиска -->

<!--Popover для вывода режима работы-->    
<script async type="text/javascript">
	jQuery( document ).ready(function( $ ) {
		$(function(){
		    $('[rel="popover"]').popover({
		        container: 'body',
		        html: true,
		        content: function () {
		            var clone = $($(this).data('popover-content')).clone(true).removeClass('hide');
		            return clone;
		        }
		    }).click(function(e) {
		        e.preventDefault();
		    });
		});
	});	
</script>
<!--Popover для вывода режима работы-->   


<!-- Плавное раскрытие подрубрик в сайдбаре -->    
<script async>
	jQuery( document ).ready(function( $ ) {
	$('.product-categories .cat-parent').children('a').click(function() {
		  $(this).siblings('.children').slideToggle();
		  return false;
		})
	});	
</script>
<!-- END Плавное раскрытие подрубрик в сайдбаре -->  

<!-- Открытие корзины при наведении -->
<script async type="text/javascript">
	jQuery( document ).ready(function( $ ) {
		$('#cart-punkt').hover(function () {
			$('.widget_shopping_cart').addClass('widget_shopping_cart-open'); 
		}, function () {
			$('#cart-punkt').data('timer', setTimeout(function () {
				$('.widget_shopping_cart').removeClass('widget_shopping_cart-open'); 
			}, 200));
		});
	});
</script>
<!-- END Открытие корзины при наведении -->


<!--Обновить данные по заказу если метод оплаты "По безналичному расчету"-->
<script async type="text/javascript">
	jQuery( document ).ready(function( $ ) {
$( 'form.checkout' ).on( 'change', 'input[name^="payment_method"]', function() {
	$('body').trigger( 'update_checkout' );
});
})
</script>
<!-- END Обновить данные по заказу если метод оплаты "По безналичному расчету"-->


<!-- Анимация добавления товара в корзину -->
<script async type="text/javascript">
	jQuery( document ).ready(function( $ ) {
	$('.add_to_cart_button').on('click', function(){
		var that = $(this).closest('.product').find('img');
		var bascket = $(".cart-punkt");
		var w = that.width();
		that.clone()
		.css({'width' : w,
		'position' : 'absolute',
		'z-index' : '9999',
		top: that.offset().top,
		left:that.offset().left})
		.appendTo("body")
		.animate({opacity: 0.05,
		left: bascket.offset()['left'],
		top: bascket.offset()['top'],
		width: 20}, 1000, function() {  
		$(this).remove();
		});
	});
	});
</script>
<!--END Анимация добавления товара в корзину -->


<!-- Активация кнопки чекбоксом -->
<script async type="text/javascript">
	jQuery( document ).ready(function( $ ) {
	  $('#ButtSend').prop('disabled', true);
	  $('#agree').change(function() {
		$('#ButtSend').prop('disabled', function(i, val) {
			return !val;
		})
	  });
	})
</script>
<!-- END Активация кнопки чекбоксом -->



<script async type="text/javascript">
	jQuery( document ).ready(function( $ ) {

		$( "#billing_address_1_field" ).after( "<span class='adres-info'>Начните вводить адрес указав название населенного пункта, улицу, дом, квартиру. Выберите из выпадающего списка ваш адрес</span>" );

})
</script>


<!--Фиксированное меню-->
<script async type="text/javascript">  
	jQuery( document ).ready(function( $ ) {
	  // Code that uses jQuery's $ can follow here.

	  $(document).ready(function() {
	  var start_pos=$('#wrap').offset().top;
	   $(window).scroll(function(){
		if ($(window).scrollTop()>=start_pos) {
			if ($('#wrap').hasClass()==false) $('#wrap').addClass('fix-navbar-top');
		}
		else $('#wrap').removeClass('fix-navbar-top');
	   });
	  });

	});
</script>
<!--END Фиксированное меню-->



<script async type="text/javascript">  
	jQuery( document ).ready(function( $ ) {
	  // Code that uses jQuery's $ can follow here.
	  $('#billing_city').one('select2:open', function(e) {
    $('.select2-search--dropdown').addClass('show_tooltip');
}).one('#billing_city').one('select2:close', function(e) {
    $('.select2-search--dropdown').addClass('show_tooltip');
});
});
</script>



<!--Вывод виджета оператора Jivosite только на страницах услуг и товаров-->
<?php $id_post = array("7856", "1176", "3416"); ?>
<?php if (preg_match('/shop/', $_SERVER['REQUEST_URI']))	 
		get_template_part( 'jivosite' );
	else if (preg_match('/product-category/', $_SERVER['REQUEST_URI']))
		get_template_part( 'jivosite' );
	else if (preg_match('/cart/', $_SERVER['REQUEST_URI']))
		get_template_part( 'jivosite' );
	else if (in_array ($post->ID, $id_post))
		get_template_part( 'jivosite' );?>
<!--Вывод виджета оператора Jivosite только на страницах услуг и товаров-->

</body>


</html>
