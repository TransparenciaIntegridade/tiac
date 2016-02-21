<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'BackHome\Controller\BackHome' => 'BackHome\Controller\BackHomeController',
        ),
    ),
		
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'backhome' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/backoffice[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'BackHome\Controller\BackHome',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

       'router' => array(
        'routes' => array(
            'faq' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/faqs',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'BackHome\Controller\BackHome',
                        'action'     => 'faqs',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'backhome' => __DIR__ . '/../view',
        ),
    ),
);