<?php
return array (
		'modules' => array (
				'Application',
				//'Album',
				'User',
				'Camara',
				//'AlbumRest',
				'Candidatura',
				'BackHome',
				'Distrito',
				'Festa',
				'Cartaz',
				'PostBrinde',
				'PostCartaz',
				'GoogleMaps',
				'Stat',
				'UserRest',
				//'CartazRest',
				//'Autarquicas',
				//'ZendDeveloperTools',
				'DoctrineModule',
				'DoctrineORMModule',
				
				
				
				
				
		),
		'module_listener_options' => array (
				'config_glob_paths' => array (
						'config/autoload/{,*.}{global,local}.php' 
				),
				'module_paths' => array (
						'./module',
						'./vendor' 
				) 
		) 
);
