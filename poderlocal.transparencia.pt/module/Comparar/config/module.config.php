<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Comparar\Controller\Comparar' => 'Comparar\Controller\CompararController',
        ),
    ),
		
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'distrito' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/comparar[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Comparar\Controller\Comparar',
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