<?php

namespace MsCodev\Hmvc\Config;

use CodeIgniter\Events\Events;

/*
 * --------------------------------------------------------------------
 * Application Events
 * --------------------------------------------------------------------
 * Example: Events::on('create', [$myInstance, 'myMethod']);
 */

Events::on('pre_system', static function () {
	helper('render');
});