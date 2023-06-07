<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="yandex-verification" content="4822aada75c98314" />
	<link rel="shortcut icon" href="/wp-content/themes/printTheme/img/favicon.ico" />
	<link rel="stylesheet" href="/wp-content/themes/printTheme/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/wp-content/themes/printTheme/css/main.css" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php wp_head(); ?>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
<div class="container all">
	<nav class="navbar navbar-default navbar-top" id="wrap">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed navbar-top-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="//printblog.ru/">Главная</a>
	    </div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<?php wp_nav_menu( array(
						'theme_location'  	=> 'sitemenu',
						'menu' 				=> 'sitemenu',
						'depth' 			=> 0,
						'container' 		=> '',
						'menu_class' 		=> 'nav navbar-nav navbar-head navbar-head-top',
						'walker' 			=> new wp_bootstrap_navwalker()
					));?>
				<!-- Авторизация пользователя -->
				<?php global $user_ID, $user_identity;
					wp_get_current_user();
					if (!$user_ID): ?>
				<ul class="nav navbar-nav navbar-right nav-autot">
			    	<li><a href="" data-toggle="modal" data-target="#loginsite"><span class="glyphicon glyphicon-user"></span>
					 Войти			    
			    	</a></li>
			    </ul>
				<?php else: ?>
			    <ul class="nav navbar-nav navbar-right nav-autot">
			    	<li><a href="//printblog.ru/my-account"><span class="glyphicon glyphicon-user"></span>
				<?php echo $user_identity; ?>			
			    	</a> 
			    	</li>
			    	<li><a title="Выйти из аккаунта" href="<?php echo wp_logout_url( get_permalink() ); ?>"><span class="glyphicon glyphicon-log-out"></span></a></li>

			    </ul>
				<?php endif; ?>
				<!-- Авторизация пользователя КОНЕЦ! -->
			</div>
	  </div>
	</nav>
	<div class="row headinfo">
	  <div class="col-md-4"><a href="//printblog.ru"><img src="//printblog.ru/wp-content/themes/printTheme/img/printblog_logo_.png" alt="printblog.ru"></a></div>
	  <div class="col-md-4">
	  	<div class="contacts">
	  	<table>
	  		<tbody>
	  			<tr><td><img width="20px" src="//printblog.ru/wp-content/themes/printTheme/img/Message-50.png" alt="mail"></td><td>printb@bk.ru</td><td><img width="20px" src="//printblog.ru/wp-content/themes/printTheme/img/Phone-50.png" alt="phone"></td><td>+7 (978) 764-75-85 (viber)</td></tr>
	  		</tbody>
	  	</table>
	  	<div class="rejim-rab"><u><i class="fa fa-clock-o" aria-hidden="true"></i>
			<a href="#" style="text-decoration:none;" rel="popover" data-popover-content="#myPopover" data-trigger="focus" data-placement="bottom">Режим работы</a>
				<div id="myPopover" class="hide">
					<i class="fa fa-clock-o" aria-hidden="true"></i>
 График работы поддержки:
					<p><b>Пн-Пт:</b> с 9:00 до 18:00
					</br><b>Сб-Вс:</b> Выходной</p>

					<p><i class="fa fa-check-square-o" aria-hidden="true"></i>
 Отправка серийных номеров для Adjustment program, осуществляется каждый день:</br>
					с <b>09:00</b> до <b>18:00</b> в течении 5 - 15 мин.</br> 
					с <b>18:00</b> до <b>23:00</b> в течении 1 часа</br>
					с <b>23:00</b> до <b>09:00</b> отправка не производится</br> 
					Мы работаем по московскому времени!</p>

					<p><i class="fa fa-check-square-o" aria-hidden="true"></i>
 Прошивки для принтеров Samsung, Xerox вы можете получить в автоматическом режиме, круглосуточно, моментально после оплаты, сделав <a href="//printblog.ru/product-category/proshivka" style="text-decoration:underline;">заказ через магазин</a></p>

					<p><i class="fa fa-percent" aria-hidden="true"></i>
 Делайте покупки через свой аккаунт на нашем сайте и <a href="//printblog.ru/discount" style="text-decoration:underline;">накапливайте постоянную скидку до 15%</a></p>
				</div>
</u>
		</div>
		<div class="price-xls">
			<i class="fa fa-file-excel-o" aria-hidden="true"></i>
			<a href="//printblog.ru/wp-content/plugins/saphali-export-xls-opt/Price-ON.xls">Скачать прайс</a>
		</div>
	  	
	  	</div>
	  </div>
	  <div class="col-md-4 col-xs-12">
	  	<?php get_search_form(); ?>
		<div class="callback"><a href="/obratnyj-zvonok">Есть вопросы по товару, доставке? Мы вам перезвоним!</a></div>
	  </div>
	</div>
 <nav class="navbar navbar-inverse navbar-store">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <span class="visible-xs" style="color:white;padding:15px;"><span class="glyphicon glyphicon-shopping-cart"></span> Меню магазина</span>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
		<?php /* Primary navigation */
		wp_nav_menu( array(
		  'menu' 			=> 'storemenu',
		  'depth' 			=> 0,
		  'container' 		=> false,
		  'fallback_cb'     => '__return_empty_string',
		  'menu_class' 		=> 'nav navbar-nav navbar-nav-store',
		  'walker' 			=> new wp_bootstrap_navwalker(),
		  ));?>
      <ul class="nav navbar-nav navbar-right cart">
        <?php
			global $woocommerce;
			// get cart quantity
			$qty = $woocommerce->cart->get_cart_contents_count();
			// get cart total
			$total = $woocommerce->cart->get_cart_total();
			// get cart url
			$cart_url = $woocommerce->cart->get_cart_url();
			// if multiple products in cart
			if($qty<1)
			      echo '<a href="'.$cart_url.'" class="cart-nav-clear"><span class="icon"><span class="glyphicon glyphicon-shopping-cart"></span></span> Корзина пуста</a>';
			// if single product in cart
			if($qty>1)
			      echo '<a href="'.$cart_url.'" class="cart-nav"><span class="icon"><span class="glyphicon glyphicon-shopping-cart"></span></span> '.$qty.' товаров <br> '.$total.'</a>';
			// if single product in cart
			if($qty==1)
			      echo '<a href="'.$cart_url.'" class="cart-nav"><span class="icon"><span class="glyphicon glyphicon-shopping-cart"></span></span> 1 товар <br> '.$total.'</a>';
		?>
      </ul>
    </div>
  </div>
</nav>