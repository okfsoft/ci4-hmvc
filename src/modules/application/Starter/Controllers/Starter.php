<?php

namespace Modules\Application\Starter\Controllers;

use App\Controllers\BaseController;

class Starter extends BaseController {


	/**
	 * The function `index()` is a public function that returns a string. The string is the result of the function `renderView()` which takes two parameters: `'starter'` and `$data`
	 *
	 * @return string The rendered view.
	 */
	public function index(): string {
		$data['title'] = 'HMVC Default Template Engine';
		return renderView('starter', $data);
	}

	/**
	 * It loads the view file starter.blade.php from the views modules.
	 * Rendering the view using the blade template engine.
	 *
	 * @return string $string view is being returned.
	 */
	public function blade(): string {
		$data['title'] = 'HMVC Blade Template Engine';
		return renderBlade('starter', $data);
	}

}