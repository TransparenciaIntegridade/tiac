<?php
return array (
		'modules' => array (
				'Application',
				//'Album',
				'User',
				'Camara',
				//'AlbumRest',
				//'Candidatura',
				'BackHome',
				'Comparar',
				//'Festa',
				'RankingGlobal',
				//'PostBrinde',
				//'PostCartaz',
				//'GoogleMaps',
				'Ranking',
				'UserRest',
				//'CartazRest',
				//'Autarquicas',
				//'ZendDeveloperTools',
				'DoctrineModule',
				'DoctrineORMModule',
				'Ranking2',
				'Comparar2',        
   
				
				
				
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
