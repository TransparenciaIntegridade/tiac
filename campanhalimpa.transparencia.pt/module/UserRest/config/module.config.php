<?php
return array (
		'controllers' => array (
				'invokables' => array (
						'UserRest\Controller\UserRest' => 'UserRest\Controller\UserRestController', 
						'UserRest\Controller\CartazRest' => 'UserRest\Controller\CartazRestController',
						'UserRest\Controller\DistritoRest' => 'UserRest\Controller\DistritoRestController',
						'UserRest\Controller\BrindeRest' => 'UserRest\Controller\BrindeRestController',
						'UserRest\Controller\FestaRest'=> 'UserRest\Controller\FestaRestController',
				) 
		),
		
		// The following section is new` and should be added to your file
		'router' => array (
				'routes' => array (
						'user-rest' => array (
								'type' => 'Segment',
								'options' => array (
										'route' => '/user-rest[/:id]',
										'constraints' => array (
												'id' => '[0-9]+' 
										),
										'defaults' => array (
												'controller' => 'UserRest\Controller\UserRest' 
										) 
								) 
						),
						'cartaz-rest' => array (
								'type' => 'Segment',
								'options' => array (
										'route' => '/cartaz-rest[/:id]',
										'constraints' => array (
												'id' => '[0-9]+' 
										),
										'defaults' => array (
												'controller' => 'UserRest\Controller\CartazRest' 
										) 
								) 
						),
						'distrito-rest' => array (
								'type' => 'Segment',
								'options' => array (
										'route' => '/distrito-rest[/:id]',
										'constraints' => array (
												'id' => '[0-9]+'
										),
										'defaults' => array (
												'controller' => 'UserRest\Controller\DistritoRest'
										)
								)
						),
						'brinde-rest' =>  array (
								'type' => 'Segment',
								'options' => array (
										'route' => '/brinde-rest[/:id]',
										'constraints' => array (
												'id' => '[0-9]+'
										),
										'defaults' => array (
												'controller' => 'UserRest\Controller\BrindeRest'
										)
								)
						),
						'festa-rest' =>  array (
								'type' => 'Segment',
								'options' => array (
										'route' => '/festa-rest[/:id]',
										'constraints' => array (
												'id' => '[0-9]+'
										),
										'defaults' => array (
												'controller' => 'UserRest\Controller\FestaRest'
										)
								)
						),
						 
				) 
		),
		'view_manager' => array (
				'strategies' => array (
						'ViewJsonStrategy' 
				) 
		) 
);