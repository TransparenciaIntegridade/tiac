<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Candidatura\Controller\Candidatura' => 'Candidatura\Controller\CandidaturaController',
        		
        ),
    ),
		
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'candidatura' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/candidatura[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Candidatura\Controller\Candidatura',
                        'action'     => 'index',
                    ),
                ),
            ),
        		'paginator3' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/candidatura/todas[/:page]',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'Candidatura\Controller\Candidatura',
        								'action'     => 'todas',
        						),
        				),
        		),
        		'paginator2' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/candidatura/distrito[/:id][/:page]',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'Candidatura\Controller\Candidatura',
        								'action'     => 'distrito',
        						),
        				),
        		),
        		'search' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/candidatura/search?q=',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'Candidatura\Controller\Candidatura',
        								'action'     => 'search',
        						),
        				),
        		),
        		'orca' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/candidatura/orca[/:id]',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'Candidatura\Controller\Candidatura',
        								'action'     => 'orca',
        						),
        				),
        		),
        	       		 
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'candidatura' => __DIR__ . '/../view',
        	
        ),
    ),
);