<?php
return array(
		'invokables' => array(
				// defining it as invokable here, any factory will do too
				'my_image_service' => 'Imagine\Gd\Imagine',
		),
    'controllers' => array(
        'invokables' => array(
            'PostBrinde\Controller\PostBrinde' => 'PostBrinde\Controller\PostBrindeController',
        		
        ),
    ),
		
		
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'postbrinde' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/post-brinde[/:action][/:id][/:id2][/:id3]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'PostBrinde\Controller\PostBrinde',
                        'action'     => 'index',
                    ),
                ),
            ),
        		'paginatorbrinde' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/post-brinde[/:page]',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'PostBrinde\Controller\PostBrinde',
        								'action'     => 'index',
        						),
        				),
        		),
        		
        		'paginatorbrinde2' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/post-brinde/distrito[/:id][/:page]',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'PostBrinde\Controller\PostBrinde',
        								'action'     => 'distrito',
        						),
        				),
        		),
        		
        		'paginatorbrinde3' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/post-brinde/camara[/:id][/:page]',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'PostBrinde\Controller\PostBrinde',
        								'action'     => 'camara',
        						),
        				),
        		),
        		
        		
        		'postbrindemoderate' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/post-brinde/moderate',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'PostBrinde\Controller\PostBrinde',
        								'action'     => 'moderate',
        						),
        				),
        		),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'post-brinde' => __DIR__ . '/../view',
        ),
    ),
);