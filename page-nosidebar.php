<?php
    /*
    Template Name: Без сайдбара
    */
?>
<?php get_header(); ?>
<div class="row content-page">
	  <div class="col-md-12 content">
	  	<?php if(have_posts()):?>
		<?php while(have_posts()):the_post();?>
	  		<h1><?php the_title();?></h1>
	  	<?php the_content(''); ?>
		<?php endwhile;?><?php endif;?>
		<?php if (comments_open()) comments_template();?>
	</div>
</div>
<?php get_footer(); ?>