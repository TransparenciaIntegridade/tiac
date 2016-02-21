<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Distrito\Controller\Distrito' => 'Distrito\Controller\DistritoController',
        ),
    ),
		
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'distrito' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/distrito[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Distrito\Controller\Distrito',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'distrito' => __DIR__ . '/../view',
        ),
    ),
);