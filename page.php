<?php get_header(); ?>
<?php get_sidebar();?>
<div class="row content-page">
	  <div class="col-md-9 content">
	  <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p class="breadcrumb">','</p>');} ?>
	  	<?php if(have_posts()):?>
		<?php while(have_posts()):the_post();?>
	  		<h1><?php the_title();?></h1>
	  	<?php the_content(''); ?>
		<?php endwhile;?><?php endif;?>
		<?php if (comments_open()) comments_template();?>
	</div>
</div>
<?php get_footer(); ?>