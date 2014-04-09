<?php

$env = getenv('APPLICATION_ENV') ?: 'production';
if ($env != 'production')
{
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
}

$string_key = 'dsfsdf6fwg34sdddfasdf243x';
$congig = array(
    'modules' => array(
		'Main',
	),
	'module_listener_options' => array(
		'module_paths' => array(
			'./module',
			'./vendor',
			//'Main' => './vendor/vivk17/ZF2Module/Main',
			'Main\*' => './vendor/vivk17/ZF2Module',
		),
		'config_cache_enabled' => ($env == 'production'),
		'config_cache_key' => $string_key,

        'module_map_cache_enabled' => ($env == 'production'),
        'module_map_cache_key' => $string_key,

        'cache_dir' => 'data/cache/',
	),
);

$custom_path = dirname(__FILE__).DIRECTORY_SEPARATOR.'custom.config.php';
if (file_exists($custom_path))
{
	include($custom_path);
}

return $congig;