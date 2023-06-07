<?php get_header(); ?>
<?php get_sidebar();?>
<div class="row content-page">
<div class="col-xs-12 epson-tool"> <a href="https://printblog.ru/shop/programmnoe-obespechenie/reset-tool/reset-tool-sbros-pampersa-v-printere-epson" class="eson-t-link"> Сброс памперса в принтере Epson, всего за 499 рублей! </a></div>
	<div class="col-md-9 content">
	  	<?php if(have_posts()):?>
		<?php while(have_posts()):the_post();?>

			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
	  		<h1><?php the_title();?></h1>
		  		<div class="infomin">
		  			<span style="margin-right: 10px;"><span class="iconinfo glyphicon glyphicon-calendar"></span> <?php echo get_the_date(); ?></span>
		  			<span style="margin-right: 10px;"><span class="iconinfo glyphicon glyphicon-folder-open"></span> <?php $category = get_the_category();echo $category[0]->cat_name; ?></span>
					<span style="margin-right: 10px;"><span class="iconinfo glyphicon glyphicon-comment"></span> <?php echo get_comments_number(); ?></span>
		  		</div>
	  	<?php the_content(''); ?>
		<?php endwhile;?><?php endif;?>
		<div class="social-bottom">
			<p style="text-align: center;font-size: 20px;margin-top: 9px;margin-bottom: 15px;">Оцените статью:</p>
			<center><?php if(function_exists('the_ratings')) { the_ratings(); } ?></center>
			<hr style="border-top: 1px solid #dadada;margin: 10px;">
			<p style="text-align: center;font-size: 20px;margin-top: 15px;margin-bottom: 0;">Поделись с друзьями:</p>
				<div class="share-btn">
					<!-- uSocial -->
					<script async src="https://usocial.pro/usocial/usocial.js?v=6.1.4" data-script="usocial" charset="utf-8"></script>
					<div class="uSocial-Share" data-pid="231e7286351ac6255ad3c80e4b582972" data-type="share" data-options="rect,style1,default,absolute,horizontal,size48,eachCounter1,counter0" data-social="telegram,wa,vk,ok,bookmarks,spoiler" data-mobile="vi,wa"></div>
					<!-- /uSocial -->
				</div>				
			</div>
			<div class="related-post-th">
				<h3 style="background-color: #8FAE1B;padding: 5px 10px;color:white;">Похожие записи:</h3>
				<?php get_related_posts_thumbnails(); ?>
			</div>
			<div class="recent_prod_single">
				<h3 style="background-color: #8FAE1B;padding: 5px 10px;color:white;">Рекомендуемые товары:</h3>
				<?php echo do_shortcode('[featured_products per_page="4" columns="4" orderby="rand"]'); ?>
			</div>

		<?php comments_template('', true ) ?> 
<!--Adsense-->
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-3871840723279614",
    enable_page_level_ads: true
  });
</script>
<!--Конец Adsense-->
	</div>
</div>
<?php get_footer(); ?>