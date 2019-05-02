<?php
	if (! function_exists('menu_active_link'))  {
		function menu_active_link($page_name) {
			if (Request::segment(3) == $page_name) 
				return 'active';
			return;
		}
	}