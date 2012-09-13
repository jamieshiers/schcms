<?php
return array(

	// DEFAULT ROUETS
	'_root_'  	=> 'welcome/index',  // The default route
	'_404_'   	=> 'welcome/404',    // The main 404 route
	'home'		=> 'welcome/index',

	// ADMIN ROUTES 
	'admin' => 'admin',
	'admin/(:any)' => 'admin/$1',

	// API ROUTES
	'api/(:any)' => 'api/$1',

	
	// VACANCY PAGES
	'vacancy' => 'vacancy',
	'Vacancy' => 'vacancy',
	'vacancy/[a-zA-Z0-9]+' => 'vacancy/view/$1', 

	// CALENDAR
	'calendar' => 'calendar', 
	'Calendar' => 'calendar',
	'events' => 'events',

	// EVEYTHING ELSE
	'[a-zA-Z0-9_-]+' => 'welcome/pages',
	'[a-zA-Z0-9_-]+/[a-zA-Z0-9_-]+' => 'welcome/pages',


);