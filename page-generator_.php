<?php
    /*
    Template Name: Для генератора
    */
?>
<?php get_header(); ?>
<div class="col-md-3 sidebar">
			<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Сайдбар генератора')) :?>
			!!! Виджет не установлен !!!
			<?php endif;?>
		</div>
<div class="row content-page">
	  <div class="col-md-9 content">
	  	<?php if(have_posts()):?>
		<?php while(have_posts()):the_post();?>
	  		<h1><?php the_title();?></h1>

				<?php echo "<h3>Выберите прошивку из списка:</h3>"; ?>
				<?php include('include/search-fix.php'); ?>

		<!--
<div class="bs-callout bs-callout-warning">
	<h4>Для доступа к генератору необходима авторизация на сайте</h4>
	<p>Доступ к генератору имеют оптовые покупатели. Для получения доступа, обратитесь к администратору сайта</p>
	<p>Для покупки прошивки без генератора воспользуйтесь формой выше.</p>
</div>
		  -->

<!--открыть доступ к генератору только для зарегистрированных пользователей-->
<?php
if ( is_user_logged_in() ) {
	 the_content(''); 
}
?>
		<?php endwhile;?><?php endif;?>
		<?php if (comments_open()) comments_template();?>
	</div>
</div>
<?php get_footer(); ?>