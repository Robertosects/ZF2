<?php
if (file_exists('vendor/autoload.php')) // Composer autoloading
{
    $loader = include 'vendor/autoload.php';
}

if (class_exists('Zend\Loader\AutoloaderFactory'))
{
    return;
}

if (is_dir('vendor/ZF2/library'))
{
    $zf2_path = 'vendor/ZF2/library';
}
elseif (getenv('ZF2_PATH')) // Support for ZF2_PATH environment variable or git submodule
{
    $zf2_path = getenv('ZF2_PATH');
}
elseif (get_cfg_var('zf2_path')) // Support for zf2_path directive value
{
    $zf2_path = get_cfg_var('zf2_path');
}
else
{
	$zf2_path = false;
}

if ($zf2_path)
{
    if (isset($loader))
	{
        $loader->add('Zend', $zf2_path);
        $loader->add('ZendXml', $zf2_path);
    }
	else
	{
        include $zf2_path . '/Zend/Loader/AutoloaderFactory.php';
        Zend\Loader\AutoloaderFactory::factory(array(
            'Zend\Loader\StandardAutoloader' => array(
                'autoregister_zf' => true
            )
        ));
    }
}

if (!class_exists('Zend\Loader\AutoloaderFactory'))
{
    throw new RuntimeException('Unable to load ZF2. Run `php composer.phar install` or define a ZF2_PATH environment variable.');
}
