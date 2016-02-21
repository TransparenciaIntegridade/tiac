<?php
return array(
		'controllers' => array(
				'invokables' => array(
						'RankingGlobal\Controller\RankingGlobal' => 'RankingGlobal\Controller\RankingGlobalController',
				),
		),
		
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'ranking' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/ranking-global[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'RankingGlobal\Controller\RankingGlobal',
                        'action'     => 'index',
                    ),
                ),
            ),
		
		'rankingindex' => array(
				'type'    => 'segment',
				'options' => array(
						'route'    => '/ranking-global/index[/:page]', 
						'constraints' => array(
								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
								'id'     => '[0-9]+',
						),
						'defaults' => array(
								'controller' => 'RankingGlobal\Controller\RankingGlobal',
								'action'     => 'index',
						),
				),
		),
    ),
 ),		
    'view_manager' => array(
        'template_path_stack' => array(
            'ranking-global' => __DIR__ . '/../view',
        ),
    ),
);