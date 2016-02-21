<?php
return array(
    
		
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'cartaz' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/cartaz[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'PostCartaz\Controller\PostCartaz',
                        'action'     => 'global',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'cartaz' => __DIR__ . '/../view',
        ),
    ),
);