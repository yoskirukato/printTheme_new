<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="http://printblog.ru/wp-content/themes/printTheme/img/favicon.ico" />
	<link rel="stylesheet" href="http://printblog.ru/wp-content/themes/printTheme/css/bootstrap.min.css" />
	<link rel="stylesheet" href="http://printblog.ru/wp-content/themes/printTheme/css/main.css" />
	<link rel="stylesheet" href="http://printblog.ru/wp-content/themes/printTheme/css/fonts.css" />
	<link rel="stylesheet" href="http://printblog.ru/wp-content/themes/printTheme/css/bbpress.css" />
	<link rel="stylesheet" href="http://printblog.ru/wp-content/themes/printTheme/libs/slider/slider.css" />
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php wp_head(); ?>
</head>
<body>
<div class="container all">
	<nav class="navbar navbar-default navbar-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed navbar-top-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="http://printblog.ru/">Главная</a>
	    </div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<?php wp_nav_menu( array(
						'theme_location'  	=> 'sitemenu',
						'menu' 				=> 'sitemenu',
						'depth' 			=> 0,
						'container' 		=> false,
						'menu_class' 		=> 'nav navbar-nav navbar-head navbar-head-top',
						'walker' 			=> new wp_bootstrap_navwalker()
					));?>
				<!-- Авторизация пользователя -->
				<?php global $user_ID, $user_identity;
					get_currentuserinfo();
					if (!$user_ID): ?>
				<ul class="nav navbar-nav navbar-right nav-autot">
			    	<li><a href="" data-toggle="modal" data-target="#loginsite"><span class="glyphicon glyphicon-user"></span>
					 Войти			    
			    	</a></li>
			    </ul>
				<?php else: ?>
			    <ul class="nav navbar-nav navbar-right nav-autot">
			    	<li><a href="http://printblog.ru/my-account"><span class="glyphicon glyphicon-user"></span>
				<?php echo $user_identity; ?>			
			    	</a></li>
			    </ul>
				<?php endif; ?>
				<!-- Авторизация пользователя КОНЕЦ! -->
			</div>
	  </div>
	</nav>
	<div class="row">
	  <div class="col-md-4"><a href="http://printblog.ru"><img src="http://printblog.ru/wp-content/themes/printTheme/img/printblog_logo_.png" alt="printblog.ru"></a></div>
	  <div class="col-md-4">
	  	<div class="contacts">
	  	<table>
	  		<tbody>
	  			<tr><td><img width="20px" src="http://printblog.ru/wp-content/themes/printTheme/img/Message-50.png" alt="icq"></td><td>printb@bk.ru</td><td><img width="20px" src="http://printblog.ru/wp-content/themes/printTheme/img/Skype-50.png" alt="skype"></td><td>printblogua</td></tr>
	  			<tr><td><img width="20px" src="http://printblog.ru/wp-content/themes/printTheme/img/ICQ-Filled-50.png" alt="icq"></td><td>1323802</td><td><img width="20px" src="http://printblog.ru/wp-content/themes/printTheme/img/Phone-50.png" alt="phone"></td><td>+7 (978) 764-75-85 (viber)</td></tr>		
	  		</tbody>
	  	</table>
	  	</div>
	  </div>
	  <div class="col-md-4">
	  	<?php get_search_form(); ?>
		<div class="callback"><a href="/obratnyj-zvonok" style="border-bottom: 1px dashed #428bca;">Есть вопросы? Мы вам перезвоним!</a></div>
	  </div>
	</div>
<hr>
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
		  'walker' 			=> new wp_bootstrap_navwalker()
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
			      echo '<a href="'.$cart_url.'" class="cart-nav"><span class="icon"><span class="glyphicon glyphicon-shopping-cart"></span></span> Корзина пуста</a>';
			// if single product in cart
			if($qty>1)
			      echo '<a href="'.$cart_url.'" class="cart-nav"><span class="icon"><span class="glyphicon glyphicon-shopping-cart"></span></span> '.$qty.' товаров | '.$total.'</a>';
			// if single product in cart
			if($qty==1)
			      echo '<a href="'.$cart_url.'" class="cart-nav"><span class="icon"><span class="glyphicon glyphicon-shopping-cart"></span></span> 1 товар | '.$total.'</a>';
		?>
      </ul>
    </div>
  </div>
</nav>