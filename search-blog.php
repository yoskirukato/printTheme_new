<form role="search" method="get" action="<?php echo home_url( '/' ) ?>" >
<div class="form-group">
  <div class="input-group">
    <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
    <input type="text" class="form-control" placeholder="Поиск по сайту" value="<?php echo get_search_query() ?>" name="s" id="s" />
    <span class="input-group-btn">
      <button class="btn btn-default" type="submit">Искать</button>
    </span>
    
  </div>
</div>
</form>