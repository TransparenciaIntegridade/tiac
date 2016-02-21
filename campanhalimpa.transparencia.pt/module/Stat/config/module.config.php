<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Stat\Controller\Stat' => 'Stat\Controller\StatController',
        ),
    ),
		'view_helpers' => array(
				'invokables' => array(
						'myHelper' => 'Application\View\Helper\MyHelper',
				),
	),
		
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'stat' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/stat[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Stat\Controller\Stat',
                        'action'     => 'index',
                    ),
                ),
            ),
        		'statdistrito' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/stat/distrito[/:partido]',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'Stat\Controller\Stat',
        								'action'     => 'distrito',
        						),
        				),
        		),
        		
        		'statcamara' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/stat/camara[/:id][/:partido]',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'Stat\Controller\Stat',
        								'action'     => 'camara',
        						),
        				),
        		
        		),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'stat' => __DIR__ . '/../view',
        ),
    ),
);