<form action="<?php echo home_url( '/' ); ?>" id="searchform" class="clear" method="get">
        <input type="search" id="s" name="s" value="<?php echo get_search_query(); ?>" />
        <input type="submit" value="<?php _e("buscar..."); ?>" title="buscar no site" id="searchsubmit" />
</form>


