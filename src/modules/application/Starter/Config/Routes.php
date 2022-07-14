<?php /** @noinspection ALL */

$routes->group('starter', ['namespace' => $hmvcNamespace], function ($routes) {
	$routes->get('/', 'Starter::index');
	$routes->match(['get', 'post'], "(:any)", "Starter::$1");
});