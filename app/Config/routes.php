<?php

	Router::connect('/registration', array('controller' => 'users','action' => 'registration'));
	Router::connect('/admin/users/:action', array('controller' => 'users','admin' => true));
	Router::connect('/admin', array('controller' => 'pages', 'action' => 'index', 'admin' => true));
	
	Router::connect('/category/test/*', array('controller' => 'categories', 'action' => 'test'));
	Router::connect('/category/*', array('controller' => 'categories', 'action' => 'index'));
	Router::connect('/search', array('controller' => 'discounts', 'action' => 'search'));
	Router::connect('/discount/*', array('controller' => 'discounts', 'action' => 'view'));
	Router::connect('/news', array('controller' => 'news', 'action' => 'index'));
	Router::connect('/news/*', array('controller' => 'news', 'action' => 'view'));
	Router::connect('/', array('controller' => 'discounts', 'action' => 'home'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/page/*', array('controller' => 'pages', 'action' => 'index'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
