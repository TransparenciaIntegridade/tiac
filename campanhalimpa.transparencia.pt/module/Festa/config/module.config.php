<?php
return array(
		'invokables' => array(
				// defining it as invokable here, any factory will do too
				'my_image_service' => 'Imagine\Gd\Imagine',
		),
    'controllers' => array(
        'invokables' => array(
            'Festa\Controller\Festa' => 'Festa\Controller\FestaController',
        		
        ),
    ),
		
		
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'festa' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/festa[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Festa\Controller\Festa',
                        'action'     => 'index',
                    ),
                ),
            ),
        		/*'paginatorbrinde' => array(
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
        		),*/
        		
        		'festacamara' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/festa/camara[/:id][/:page]',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'Festa\Controller\Festa',
        								'action'     => 'camara',
        						),
        				),
        		),
        		
        		
        		'festadistrito' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/festa/distrito[/:id][/:page]',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'Festa\Controller\Festa',
        								'action'     => 'distrito',
        						),
        				),
        		),
        		
        		'festamoderate' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/festa/moderate[/:page]',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'Festa\Controller\Festa',
        								'action'     => 'moderate',
        						),
        				),
        		),
        		'festaup' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/festa/upvote[/:id][/:distrito]',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'Festa\Controller\Festa',
        								'action'     => 'upVote',
        						),
        				),
        		),
        		'festadown' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/festa/downvote[/:id][/:distrito]',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'Festa\Controller\Festa',
        								'action'     => 'downVote',
        						),
        				),
        		),
        		
        		
        		'festaupc' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/festa/upvotec[/:id][/:camara]',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'Festa\Controller\Festa',
        								'action'     => 'upVotec',
        						),
        				),
        		),
        		'festadownc' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/festa/downvotec[/:id][/:camara]',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'Festa\Controller\Festa',
        								'action'     => 'downVotec',
        						),
        				),
        		),
        		
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'festa' => __DIR__ . '/../view',
        ),
    ),
);