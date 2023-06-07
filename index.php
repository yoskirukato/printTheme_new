<?php get_header(); ?>
		<?php get_sidebar();?>
	<div class="row blog-page">
	<div class="col-xs-12 epson-tool"> <a href="https://printblog.ru/shop/programmnoe-obespechenie/reset-tool/reset-tool-sbros-pampersa-v-printere-epson" class="eson-t-link"> Сброс памперса в принтере Epson, всего за 499 рублей! </a></div>
				<?php while(have_posts()):the_post();?>
					<div class="col-md-9 content-prev">
				  		<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
				  		<div class="infomin">
				  			<span style="margin-right: 10px;"><span class="iconinfo glyphicon glyphicon-calendar"></span> <?php echo get_the_date(); ?></span>
				  			<span style="margin-right: 10px;"><span class="iconinfo glyphicon glyphicon-folder-open"></span> <?php $category = get_the_category();echo $category[0]->cat_name; ?></span>
							<span style="margin-right: 10px;"><span class="iconinfo glyphicon glyphicon-comment"></span> <?php echo get_comments_number(); ?></span>
				  		</div>
				  	<?php the_content(''); ?>
				  	<a href="<?php the_permalink(); ?>" class="btn btn-success">Читать запись полностью</a>
					</div>
				<?php endwhile;?>	
				<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
	</div>
<?php get_footer(); ?>