<?php get_header(); ?>
<?php get_sidebar();?>
<div class="row content-page content-search">
	<div class="col-md-9 content">
	 <div class="panel panel-info" style="border-radius:0;">
	  <div class="panel-heading" style="background-color: #f8f8f8;">
		<h3 class="panel-title">Информация по вашему запросу</h3>
	  </div>
	    <div class="panel-body">
            <div style="font-weight:bold;">Для вашего поискового запроса найдено результатов - <?php global $wp_query; echo $wp_query->found_posts;?>	</div>
        </div>
	</div>
	  	<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<?php $title = get_the_title(); $keys= explode(" ",$s); $title = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $title); ?>
		<h2><a href="<?php the_permalink(); ?>"><?php echo $title; ?></a></h2>		
		<p><?php the_excerpt(); ?></p>
	<?php endwhile;	else:?>
		<p><?php echo __('Извините, результатов по вашему запросу не найдено', 'pctheme'); ?></p>
	<?php endif; ?>
	<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
	</div>
</div>
<?php get_footer(); ?>