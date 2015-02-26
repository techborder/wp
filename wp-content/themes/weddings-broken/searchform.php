<?php global $query_string; ?>
<form class="ast-search" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
		<input type="text" value="<?php if($query_string=='') echo __('Search...','sp_webBusiness'); else echo get_search_query(); ?>" id="search" name="s" placeholder="Search..." onclick="if(document.getElementById('search').value=='Search...'){ this.value=''; }" onblur="this.value=!this.value?'Search...':this.value;"/>
		<input type="submit" value="Search" id="search-submit" />
</form>
