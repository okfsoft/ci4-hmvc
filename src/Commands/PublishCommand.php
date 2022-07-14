<?php

namespace MsCodev\Hmvc\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Autoload;

class PublishCommand extends BaseCommand {
	protected $group = 'HMVC';
	protected $name = 'hmvc:publish';
	protected $usage = 'hmvc:publish';
	protected $description = 'Publish CodeIgniter4 HMVC.';
	protected $options = [
		'-f' => 'Force overwrite all existing files in destination',
	];
	protected mixed $stringConfig;

	/**
	 * @param array $params
	 * @return void
	 * @noinspection ALL
	 */
	public function run(array $params): void {
		$this->copyFolder($this->sourcePath('modules'), $this->destinationPath('modules'));
	}


	function copyfolder($src, $dst) {
		$dir = opendir($src);
		if (!is_dir($dst) && !mkdir($dst, 0777, TRUE) && !is_dir($dst)) {
			CLI::error("Directory was not created {$dst}.");
			return;
		}
		foreach (scandir($src, SCANDIR_SORT_NONE) as $file) {
			if (($file !== '.') && ($file !== '..')) {
				if (is_dir($src . '/' . $file)) {
					$this->copyfolder($src . '/' . $file, $dst . '/' . $file);
				} else {
					copy($src . '/' . $file, $dst . '/' . $file);
				}
			}
		}
		closedir($dir);
	}


	/**
	 * It returns the path of the file.
	 *
	 * @param string $filePath The path to the file you want to create.
	 * @return string The path to the file.
	 */
	private function destinationPath(string $directory): string {
		$path   = $this->fixPath((new Autoload())->psr4[APP_NAMESPACE]);
		return dirname($path) . DIRECTORY_SEPARATOR . $this->fixPath($directory);
	}


	/**
	 * It gets the source path
	 *
	 * @param string $filePath The path to the file that you want to copy.
	 * @return string
	 */
	private function sourcePath(string $filePath): string {
		$sourcePath = $this->fixPath(dirname(__DIR__) . '/' . $filePath);
		if (!is_dir($sourcePath)) {
			CLI::error("Unable to determine {$filePath} file in correct source directory.");
			exit();
		}
		return $sourcePath;
	}


	/**
	 * It fixes the path for the OS.
	 *
	 * @param string $path The path to the file you want to read.
	 * @return string the path with the correct slashes for the OS.
	 */
	private function fixPath(string $path): string {
		if (strtolower(PHP_OS) === 'linux') {
			$fixPath = $path;
		} else {
			$fixPath = str_replace('/', DIRECTORY_SEPARATOR, $path);
		}
		return $fixPath;
	}


}