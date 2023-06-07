<?php
    /*
    Template Name: Шаблон магазина
    */
?>
<?php get_header(); ?>
	<div class="col-md-3 sidebar woocommerce hidden-xs">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Сайдбар магазина')) :?>
		!!! Виджет не установлен !!!
		<?php endif;?>
	</div>
<div class="row content-page">
	  <div class="col-md-9 content">
	  	<?php if(have_posts()):?>
		<?php while(have_posts()):the_post();?>
	  		<h1><?php the_title();?></h1>
	  	<?php the_content(''); ?>
		<?php endwhile;?><?php endif;?>
	</div>
</div>

<?php get_footer(); ?>
