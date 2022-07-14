<?php

use eftec\bladeone\BladeOne as Blade;

/**
 * It takes a view name, data, and options, and returns a string
 *
 * @param string|null $hmvcView The name of the view file to be rendered.
 * @param array       $data
 * @param array       $options
 * @return string The view is being returned.
 */
if (!function_exists('renderView')) {
	function renderView(string $hmvcView= NULL, array $data = [], array $options = []): string {
		if (empty($hmvcView)){
			throw new RuntimeException('Render view not set');
		}
		$modul_view = 'Modules\Application\\' . basename(service('router')->controllerName()) . '\Views\\' . $hmvcView;
		$data['title'] = $data['title'] ?? NULL;
		return view($modul_view, $data, $options);
	}
}


/**
 * It creates a new instance of the BladeOne class, and then calls the run method on it
 *
 * @param string|null $view_path The path to the view file.
 * @param array       $data      An array of data that will be passed to the view.
 * @return string A string.
 */
if (!function_exists('renderBlade')) {
	function renderBlade(string $view_path = NULL, array $data = []): string {
		if (empty($view_path)){
			throw new RuntimeException('Blade view not set');
		}
		$pathView = [
			ROOTPATH . 'modules\application\\' . basename(service('router')->controllerName()) . '\Views',
			ROOTPATH . 'modules\resources\Blade',
		];
		$pathCache = WRITEPATH . 'cache\blade';
		$data['title'] = $data['title'] ?? NULL;
		try {
			return (new Blade($pathView, $pathCache, Blade::MODE_AUTO))->run($view_path, $data);
		} catch (Exception) {
			throw new RuntimeException('Error creating new instance of BladeOne class.');
		}
	}
}


/**
 * It takes a string, and returns a string
 *
 * @param string filePath The path to the file you want to include.
 * @return string The path to the view file.
 */
if (!function_exists('sourceView')) {
	function sourceView(string $filePath): string {
		return 'Modules\Resources\Views\\' . $filePath;
	}
}


