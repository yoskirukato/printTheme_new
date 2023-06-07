<?php
    /*
     Template Name: Главная
    */
?>
<?php get_header(); ?>
	<div class="slider hidden-xs">
		<ul>
			<li><a href="//printblog.ru/ostav-otzyv-o-tovare-poluchi-bonus-na-lichnyj-balans"><img src="//printblog.ru/wp-content/themes/printTheme/img/slider/banner_7.png" alt="Оставь отзыв, получи бонус!"></a></li>
			<li><img src="//printblog.ru/wp-content/themes/printTheme/img/slider/banner_1.png" alt="В продаже большой ассортимент техники"></li>
			<li><a href="//printblog.ru/shop/programmnoe-obespechenie/reset-tool/reset-tool-sbros-pampersa-v-printere-epson"><img src="//printblog.ru/wp-content/themes/printTheme/img/slider/banner_3.png" alt="EPSON Reset Tool - сброс памперса Epson за 499руб"></a></li>
			<li><a href="//printblog.ru/product-category/programmnoe-obespechenie/kody-printhelp-i-beschipovaya-proshivka"><img src="//printblog.ru/wp-content/themes/printTheme/img/slider/banner_2.png" alt="Бесчиповая прошивка для Epson через Printhelp"></a></li>
			<li><a href="//printblog.ru/product-category/programmnoe-obespechenie/adjustment-program-epson"><img src="//printblog.ru/wp-content/themes/printTheme/img/slider/banner_4.png" alt="Adjustment program Epson"></a></li>
			<li><a href="//printblog.ru/shop/programmnoe-obespechenie/kod-sbrosa-dlya-printhelp"><img src="//printblog.ru/wp-content/themes/printTheme/img/slider/banner_6.png" alt="Код сброса для Printhelp"></a></li>
			<li><a href="//printblog.ru/kupit-fix-samsungxerox"><img src="//printblog.ru/wp-content/themes/printTheme/img/slider/banner_5.png" alt="Фикс прошивка для принтеров Samsung, Xerox, Dell"></a></li>
		</ul>
	</div>
	<div class="row" style="margin:0;">
	 	<div class="col-md-2 col-xs-6 point-block"><div class="point">
	 		<a href="//printblog.ru/zapisi-bloga" target="blank"><img src="//printblog.ru/wp-content/themes/printTheme/img/blog.png" class="point-image" alt="Статьи блога">
	 		<span class="point-text">Статьи</span></a>
	 	</div></div>
		<div class="col-md-2 col-xs-6 point-block"><div class="point">
			<a href="/fajly" target="blank"><img src="//printblog.ru/wp-content/themes/printTheme/img/folder.png" class="point-image" alt="Файлы">
	 		<span class="point-text">Файлы</span></a>
		</div></div>
		<div class="col-md-2 col-xs-6 point-block"><div class="point">
			<a href="/faq" target="blank"><img src="//printblog.ru/wp-content/themes/printTheme/img/faq.png" class="point-image" alt="Вопросы и ответы">
	 		<span class="point-text">Вопросы / Ответы</span></a>
		</div></div>
		<div class="col-md-2 col-xs-6 point-block"><div class="point">
			<a href="/uslugi" target="blank"><img src="//printblog.ru/wp-content/themes/printTheme/img/uslugi.png" class="point-image" alt="Наши услуги">
	 		<span class="point-text">Услуги</span></a>
		</div></div>
		<div class="col-md-2 col-xs-6 point-block"><div class="point">
			<a href="/otblagodarit-avtora" target="blank"><img src="//printblog.ru/wp-content/themes/printTheme/img/otzivy.png" class="point-image" alt="Отзывы">
	 		<span class="point-text">Отзывы</span></a>
		</div></div>
		<div class="col-md-2 col-xs-6 point-block"><div class="point" style="border-right: none;">
			<a href="/video" target="blank"><img src="//printblog.ru/wp-content/themes/printTheme/img/video.png" class="point-image" alt="Наши видео">
	 		<span class="point-text">Видео</span></a>
		</div></div>			  
	</div>
	<div class="row block bordur">
	  <div class="col-md-4 block" style="border-right:1px solid #e4e3d9;">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Главная 1") ) : ?>
		<?php endif; ?>
	  </div>
	  <div class="col-md-4 block" style="border-right:1px solid #e4e3d9;">
	  	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Главная 2") ) : ?>
		<?php endif; ?>	  	
	  </div>
	  <div class="col-md-4 block" >
	  	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Главная 3") ) : ?>
		<?php endif; ?>	  	
	  </div>
	</div>

	<div class="row block video-block">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Главная видео") ) : ?>
		<?php endif; ?>
	</div>
	<div class="row block product-block">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Главная товары") ) : ?>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>