<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'PostCartaz\Controller\PostCartaz' => 'PostCartaz\Controller\PostCartazController',
        ),
    ),
	
		
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'postcartaz' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/post-cartaz[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'PostCartaz\Controller\PostCartaz',
                        'action'     => 'index',
                    ),
                ),
            ),
        		'paginatorcartaz1' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/post-cartaz[/:page]',
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
        		'paginatorcartaz2' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/post-cartaz/distrito[/:id][/:page]',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'PostCartaz\Controller\PostCartaz',
        								'action'     => 'distrito',
        						),
        				),
        		),
        		'paginatorcartaz3' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/post-cartaz/camara[/:id][/:page]',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'PostCartaz\Controller\PostCartaz',
        								'action'     => 'camara',
        						),
        				),
        		),
        		
        		'postcartazmoderate' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/post-cartaz/moderate[/:page]',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'PostCartaz\Controller\PostCartaz',
        								'action'     => 'moderate',
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