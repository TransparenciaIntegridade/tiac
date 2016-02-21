<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Camara\Controller\Camara' => 'Camara\Controller\CamaraController',
            
        ),
    ),
		
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'camara2' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/camara[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Camara\Controller\Camara',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'camara' => __DIR__ . '/../view',
        ),
    ),
);