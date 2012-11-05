<?php

/**
 * Generate HTML for multi-dimensional menu from MySQL database
 * with ONE QUERY and WITHOUT RECURSION 
 * @author J. Bruni
 */

namespace Menu;

class MenuBuilder
{
	var $items = array();
	var $html  = array();

	/**
	 * Build the HTML for the menu 
	 */
	public static function get_menu_html( $root_id = 0 )
	{
		$html  = array();
		$items = \DB::select()->from('menus')->where('active', 1)->order_by('parent_id', 'asc')->order_by('position', 'asc')->as_assoc()->execute();

		foreach ( $items as $item )
			$children[$item['parent_id']][] = $item;

		// loop will be false if the root has no children (i.e., an empty menu!)
		$loop = !empty( $children[$root_id] );

		// initializing $parent as the root
		$parent = $root_id;
		$parent_stack = array();

		// HTML wrapper for the menu (open)
		$html[] = '<ul class="main-nav">';

		while ( $loop && ( ( $option = each( $children[$parent] ) ) || ( $parent > $root_id ) ) )
		{
			if ( $option === false )
			{
				$parent = array_pop( $parent_stack );

				// HTML for menu item containing childrens (close)
				$html[] = str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 ) . '</ul>';
				$html[] = str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 ) . '</li>';
			}
			elseif ( !empty( $children[$option['value']['id']] ) )
			{
				$tab = str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 );

				// HTML for menu item containing childrens (open)
				$html[] = sprintf(
					'%1$s<li><a class="menu" href="%2$s">%3$s</a>',
					$tab,   // %1$s = tabulation
					$option['value']['link'],   // %2$s = link (URL)
					$option['value']['name']   // %3$s = title
				); 
				$html[] = $tab . "\t" . '<ul class="menu-dropdown">';

				array_push( $parent_stack, $option['value']['parent_id'] );
				$parent = $option['value']['id'];
			}
			else
				// HTML for menu item with no children (aka "leaf") 
				$html[] = sprintf(
					'%1$s<li><a href="%2$s">%3$s</a></li>',
					str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 ),   // %1$s = tabulation
					$option['value']['link'],   // %2$s = link (URL)
					$option['value']['name']   // %3$s = title
				);
		}

		// HTML wrapper for the menu (close)
		$html[] = "</ul>";

		return implode($html);
	}

	/**
	 * get sort menu provides a sortable menu for the admin interface
	 */

	public static function get_sort_menu($root_id = 0)
	{
		$html  = array();
		$items = \DB::select()->from('menus')->order_by('parent_id', 'asc')->order_by('position', 'asc')->as_assoc()->execute();

		foreach ( $items as $item )
			$children[$item['parent_id']][] = $item;

		// loop will be false if the root has no children (i.e., an empty menu!)
		$loop = !empty( $children[$root_id] );

		// initializing $parent as the root
		$parent = $root_id;
		$parent_stack = array();

		// HTML wrapper for the menu (open)
		$html[] = "<ul class='sortable'>";

		while ( $loop && ( ( $option = each( $children[$parent] ) ) || ( $parent > $root_id ) ) )
		{
			if ( $option === false )
			{
				$parent = array_pop( $parent_stack );

				// HTML for menu item containing childrens (close)
				$html[] = str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 ) . '</ul>';
				$html[] = str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 ) . '</li>';
			}
			elseif ( !empty( $children[$option['value']['id']] ) )
			{
				$tab = str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 );

				// HTML for menu item containing childrens (open)
				$html[] = sprintf(
					'%1$s<li id="list_%4$s"><div><a href="%2$s" id="item_%4$s">%3$s</a><a href="" onclick="return false" id="%4$s" class="edit"> edit</a><a href="" onclick="return false" id="%4$s" class="delete"> delete</a></div>',
					$tab,   // %1$s = tabulation
					$option['value']['link'],   // %2$s = link (URL)
					$option['value']['name'],   // %3$s = title
					$option['value']['id']		// %4$s = id 
				); 
				$html[] = $tab . "\t" . '<ul>';

				array_push( $parent_stack, $option['value']['parent_id'] );
				$parent = $option['value']['id'];
			}
			else
				// HTML for menu item with no children (aka "leaf") 
				$html[] = sprintf(
					'%1$s<li id="list_%4$s"><div><a href="%2$s" id="list_%4$s">%3$s</a><a href="%2$s" value="%3$s" onclick="return false" id="%4$s" class="edit"> edit</a><a href="" onclick="return false" id="%4$s" class="delete"> delete</a></div></li>',
					str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 ),   // %1$s = tabulation
					$option['value']['link'],   // %2$s = link (URL)
					$option['value']['name'],   // %3$s = title
					$option['value']['id']		// %4$s = id 
				);
		}

		// HTML wrapper for the menu (close)
		$html[] = "</ul>";

		return implode($html);
	  }









}

?>