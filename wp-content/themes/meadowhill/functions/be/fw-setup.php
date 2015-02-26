<?php
/**
 * Framework setup.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/

function meadowhill_get_categories($parent) {	
	$meadowhill_categories = get_categories();
	
	foreach ($meadowhill_categories as $cat) {
		$categories[$cat->term_id] = $cat->name;
	} 
	return($categories);
}
		$categories = meadowhill_get_categories(0);
		$categoriesParents = meadowhill_get_categories(0);
		
	if (count($categories) > 0) {
	foreach ( $categories as $key => $value ) {
			$catids[] = $key;
			$catnames[] = $value;
	}
	}
	if (count($categoriesParents) > 0){
	foreach ( $categoriesParents as $key => $value ) {

		$catidsp[] = $key;
			$catnamesp[] = $value;
		}
} ?>