<!-- Nav tabs -->
<ul class="nav nav-tabs nav-tabs-serch">
  <li class="active"><a href="#search-shop" data-toggle="tab" style="padding: 2px 10px; font-size: 12px;">По магазину</a></li>
  <li><a href="#search-site" data-toggle="tab" style="padding: 2px 10px; font-size: 12px;">По сайту</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="search-shop">
	<?php get_template_part( 'search-shop' );?>
  </div>
  <div class="tab-pane" id="search-site">
  	<?php get_template_part( 'search-blog' ); ?>
  </div>
</div>