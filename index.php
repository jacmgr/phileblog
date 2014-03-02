<?php

define('PHILE_VERSION',    '0.9.2');
// --------------------------------------------------------------------------
/*
define('ROOT_DIR',         realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('CONTENT_DIR',      ROOT_DIR . 'content' . DIRECTORY_SEPARATOR);
define('CONTENT_EXT',      '.md');
define('LIB_DIR',          ROOT_DIR . 'lib' . DIRECTORY_SEPARATOR);
define('PLUGINS_DIR',      ROOT_DIR . 'plugins' . DIRECTORY_SEPARATOR);
define('THEMES_DIR',       ROOT_DIR . 'themes' . DIRECTORY_SEPARATOR);
define('CACHE_DIR',        LIB_DIR . 'cache' . DIRECTORY_SEPARATOR);
*/
// --------------------------------------------------------------------------

define('SYSTEMFOLDER',     'philesystem');
define('ROOTSITE_DIR',     realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
//define('ROOTSYSTEM_DIR',   realpath(dirname(ROOT_DIR)) . DIRECTORY_SEPARATOR .SYSTEMFOLDER. DIRECTORY_SEPARATOR );

//define('ROOT_DIR',         realpath(dirname(ROOTSITE_DIR)) . DIRECTORY_SEPARATOR .SYSTEMFOLDER. DIRECTORY_SEPARATOR );
define('ROOT_DIR',         realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('ROOTSYSTEM_DIR',   realpath(dirname(ROOT_DIR)) . DIRECTORY_SEPARATOR .SYSTEMFOLDER. DIRECTORY_SEPARATOR );

//define('CONTENT_DIR',      ROOTSITE_DIR . 'content' . DIRECTORY_SEPARATOR);
define('CONTENT_DIR',      ROOT_DIR . 'content' . DIRECTORY_SEPARATOR);
define('CONTENT_EXT',      '.md');
define('LIB_DIR',          ROOTSYSTEM_DIR . 'lib' . DIRECTORY_SEPARATOR);
define('PLUGINS_DIR',      ROOTSYSTEM_DIR . 'plugins' . DIRECTORY_SEPARATOR);
define('THEMES_DIR',       ROOTSYSTEM_DIR . 'themes' . DIRECTORY_SEPARATOR);
define('CACHE_DIR',        LIB_DIR . 'cache' . DIRECTORY_SEPARATOR);


spl_autoload_extensions(".php");
spl_autoload_register(function ($className) {
	$fileName = LIB_DIR . str_replace("\\", DIRECTORY_SEPARATOR, $className) . '.php';
	if (file_exists($fileName)) {
		require_once $fileName;
	}
});

//at shared location now
//require(ROOT_DIR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');
require(ROOTSYSTEM_DIR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

$phileCore = new \Phile\Core();
echo $phileCore->render();
