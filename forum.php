<?php
    /*
    Template Name: Шаблон форума
    */
?>
<?php get_header(); ?>
<div class="row content-page">
	<div class="col-md-12 content">
	  	<?php if(have_posts()):?>
		<?php while(have_posts()):the_post();?>
		<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p class="breadcrumb">','</p>');} ?>
	  	<?php the_content(''); ?>
		<?php endwhile;?><?php endif;?>
			<div class="recent_prod_single_forum">
				<h3>Рекомендуемые товары:</h3>
				<?php echo do_shortcode('[featured_products per_page="5" columns="5" orderby="rand"]'); ?>
			</div>	
		<?php if (comments_open()) comments_template();?>
	</div>
</div>
<?php get_footer(); ?>