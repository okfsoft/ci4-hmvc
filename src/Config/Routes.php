<?php

namespace MsCodev\Hmvc\Config;

/*
 * --------------------------------------------------------------------
 * MsCodev - Modular HMVC Route
 * --------------------------------------------------------------------
 */
$baseModuls = 'modules' . DIRECTORY_SEPARATOR . 'application';
if (file_exists(ROOTPATH . $baseModuls)) {
	$modulesPath = ROOTPATH . $baseModuls . DIRECTORY_SEPARATOR;
	foreach (scandir($modulesPath, SCANDIR_SORT_NONE) as $modulesName) {
		if ($modulesName === '.' || $modulesName === '..') {
			continue;
		}
		if (is_dir($modulesPath . DIRECTORY_SEPARATOR . $modulesName)) {
			$routesModuls = $modulesPath . $modulesName . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'Routes.php';
			if (is_file($routesModuls)) {
				$hmvcNamespace = '\Modules\Application\\' . $modulesName . '\Controllers';
				require $routesModuls;
			}
		}
	}
}