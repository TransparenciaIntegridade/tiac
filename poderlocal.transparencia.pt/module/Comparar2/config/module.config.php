<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Comparar2\Controller\Comparar2' => 'Comparar2\Controller\Comparar2Controller',
        ),
    ),
		
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'comparar2' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/comparar2[/:action][/:id][/:id2][/:id3][/:id4][/:id5]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Comparar2\Controller\Comparar2',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'comparar2' => __DIR__ . '/../view',
        ),
    ),
);