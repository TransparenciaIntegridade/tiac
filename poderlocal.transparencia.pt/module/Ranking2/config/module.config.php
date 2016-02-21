<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Ranking2\Controller\Ranking2' => 'Ranking2\Controller\Ranking2Controller',
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
            'ranking2' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/ranking2[/:action][/:id][/:id2][/:id3][/:id4][/:id5]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Ranking2\Controller\Ranking2',
                        'action'     => 'index',
                    ),
                ),
            ),
        		
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'ranking2' => __DIR__ . '/../view',
        ),
    ),
);