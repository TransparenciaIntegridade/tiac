<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Ranking\Controller\Ranking' => 'Ranking\Controller\RankingController',
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
                    'route'    => '/ranking[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Ranking\Controller\Ranking',
                        'action'     => 'index',
                    ),
                ),
            ),
        		
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'ranking' => __DIR__ . '/../view',
        ),
    ),
);