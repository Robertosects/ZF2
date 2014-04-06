<?php
return array(
    'router' => array(
        'routes' => array(
            'Main' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
						'__NAMESPACE__' => 'Main\Controller',
                        'controller' => 'Index',
                        'action'     => 'index',
                    ),
                ),

                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(),
                        ),
                    ),
                ),

			),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
			'Main\Controller\Index' => 'Main\Controller\Index',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../Layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../View/main/index/index.phtml',
            'error/404'               => __DIR__ . '/../View/error/404.phtml',
            'error/index'             => __DIR__ . '/../View/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../View',
        ),
    ),
);
