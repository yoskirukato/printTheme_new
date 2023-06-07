<?php get_header(); ?>
	<div class="col-md-3 sidebar woocommerce hidden-xs">
		
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Сайдбар магазина')) :?>
		!!! Виджет не установлен !!!
		<?php endif;?>
	</div>
	<div class="row content-page">  
		<div class="col-xs-12 epson-tool"> <a href="https://printblog.ru/shop/programmnoe-obespechenie/reset-tool/reset-tool-sbros-pampersa-v-printere-epson" class="eson-t-link"> Сброс памперса в принтере Epson, всего за 499 рублей! </a></div>
		
		<div class="col-md-9 content woocommerce">
		<?php include $_SERVER['DOCUMENT_ROOT']."/wp-content/themes/printTheme/information.php";  // подключаем файл выводящий информацию на странице?>
		<?php if ( function_exists('yoast_breadcrumb')){yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumb">','</p>');} ?>

    <!--Вывод формы по условию-->
   <?php if(strpos($_SERVER['REQUEST_URI'], 'roduct-category/proshivk') !== false)  
      echo "<h3>Выберите прошивку из списка:</h3>"; 
    ?>
    <?php if(strpos($_SERVER['REQUEST_URI'], 'roduct-category/proshivk') !== false)
      include('include/search-fix.php'); 
    ?>
   <!--END Вывод формы по условию-->

			<?php woocommerce_content(); ?>
		</div>
	</div>
<?php get_footer(); ?>