<?php
return array(
	'_root_'  => 'scraps/index',  // The default route
	'_404_'   => 'scraps/404',    // The main 404 route
	'twitter(:any)?'  => 'twitter$1',
	'(:any)'   => 'scraps/$1',
);