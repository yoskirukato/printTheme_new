<?php

$terms = get_terms( array(
    'taxonomy' => 'filter',
    'hide_empty' => false,
    'orderby'=>'name',
    'parent'=>FALSE
) );

global $wp;
$current_url =  home_url( $wp->request );
$pos = strpos($current_url , '/page');
$current_url = substr($current_url,0,$pos);
?>
<form name="sform" id="sform" action="<?php echo $current_url; ?>" method="get">
<input type="hidden" name="search" value="1" />
<table class="table">
  <tr>
    <td style="vertical-align: inherit;">Производитель принтера:</td>
    <td>
      <select required id="printer-brand" name="printer-brand" class="form-control">
      <option value="">Выбрать</option>
      <?php
      foreach($terms as $term) {?>
        <option <?php if(isset($_GET['printer-brand']) && $_GET['printer-brand'] == $term->term_id) { echo 'selected="selected"'; } ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
      <?php } ?>
    </select>
    </td>
  </tr>
  <tr>
    <td style="vertical-align: inherit;">Модель принтера:</td>
    <td>
        <div id="printer-model-block">
          <?php if(isset($_GET['printer-brand']))
          {
              _getPrinterModels($_GET['printer-brand']);
          }
          else
          {?>
          <select required name="printer-model" class="form-control">
            <option value="">Выбрать</option>
          </select>
      <?php } ?>
    </div>
    </td>
  </tr>
  <tr>
    <td colspan="2"><center style="padding-top:20px;"><input type="submit" id="btn_search" value="Поиск прошивки" class="btn btn-success" style="padding:6px 40px;" /></center></td>
  </tr>
</table>
</form>
<?php

if( isset($_GET['search']))
{

  ?>     
    <?php
      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

      $filters = array($_GET['printer-brand']);

      $args = array( 'post_type' => 'product',
      'paged' => $paged,
      'posts_per_page'=>10,
      'tax_query' => array(
          //'relation' => 'AND',
          array(
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    => array( "2217",  "4444" ), //id категории товаров из woocommerce
          ),
          array(
            'taxonomy' => 'filter',
            'field'    => 'term_id',
            'terms'    => array( !empty($_GET['printer-model']) ? $_GET['printer-model'] : $_GET['printer-brand'] ),
          ),
        )

    );
      $the_query = new WP_Query( $args );

      $post_count = $the_query->post_count;


      // The Loop
      if ( $the_query->have_posts() ) {


		$id = '';
      	while ( $the_query->have_posts() ) {
      		$the_query->the_post();

          if($post_count == 1)
          {
            //wp_redirect(get_the_permalink());
            //exit();
          }
			$id = '_' . uniqid();
          ?>
            <div class="bs-callout" style="background-color:#ddf7f1;border-left:3px solid #61d9ab;">
                <center><h4>Перейдите по ссылке для приобретения прошивки:</h4>  </center>        
                <p><center style="font-size:20px;padding-top:10px;"><i class="fa fa-external-link" aria-hidden="true"></i> <a id="<?php echo $id;  ?>" target="_blank" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></center></p>
            </div>
            <hr>
          <?
      	}
        ?> <script type="text/javascript">
			/* <![CDATA[ */
			jQuery('#<?php echo $id; ?>').click(); 
			/* ]]> */
			</script> <?php
		
        wp_reset_postdata();
      } else {
      	?>
          <p>По Вашему запросу ничего не найдено !</p>
        <?php
      }

    ?>

  <?php
  echo paginate_links(
            array('current' => max( 1, $paged),
  	         'total' => $the_query ->max_num_pages)
          ); ?>
  <?
}

?>

<script type="text/javascript">
/* <![CDATA[ */
jQuery('#printer-brand').change(function(){
	var data = {
			action: 'load_printer_models',
			brand: jQuery(this).val()
		};
 	jQuery('#printer-model-block').html('<center>Загрузка ...</center>');
		jQuery.post( models_ajax.url, data, function(response) {
			jQuery('#printer-model-block').html(response);
		});
});
/* ]]> */
</script>
